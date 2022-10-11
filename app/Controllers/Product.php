<?php

namespace App\Controllers;

use App\Models\ImageModel;
use App\Models\ProductModel;

class Product extends BaseController {

    public function index(){
        if (!$this->isAdminConnected()) {
            return redirect()->to("/connection/");
        }
        helper('product');
        $productModel = new ProductModel();
        $productList = transformItemsToObjects($productModel->getProduct());

        $this->data['title'] = "Produit";
        $this->data['page'] = "product_list";

        $this->data['content'] = view('admin/product_list',array(
            "product_list" => $productList
        ));
        return view('application', $this->data);
    }

    public function edit($id = null) {
        if (!$this->isAdminConnected()) {
            return redirect()->to("/connection/");
        }

        $this->data['title'] = "Edition produit";
        $this->data['page'] = "edit_product";
        $product = null;
        if ($id != null && $id > 0) {
            helper('product');
            $productModel = new ProductModel();
            $product = transformItemToObject($productModel->getProduct($id));
        }
        $this->data['content'] = view('admin/edit_product', array(
            "product" => $product
        ));
        return view('application', $this->data);
    }

    public function remove() {
        $postParam = $this->request->getPost();
        if (isset($postParam['product_id']) && $postParam['product_id'] > 0) {
            $productModel = new ProductModel();
            if (!$productModel->deleteProduct($postParam['product_id'])) {
                $this->ajax_response['message'] = "Une erreur est survenu lors de la suppression du produit, veuillez contacter le support";                
            } else {
                $this->ajax_response['success'] = true;
                $this->ajax_response['message'] = "Le produit a bien été supprimé";
            }
        }
        echo json_encode($this->ajax_response);
    }

    public function edit_process() {
        $postParam = $this->request->getPost();
        if (isset($postParam['product_name']) && isset($postParam['product_description']) && isset($postParam['product_price']) && !empty($postParam['product_name']) && !empty($postParam['product_description']) && !empty($postParam['product_price'])) {
            $data=array(
                "name" => $postParam['product_name'], 
                "description" => $postParam['product_description'], 
                "price" => (float) $postParam['product_price'], 
                "tax_id" => 1,
                "quantity" => $postParam['quantity'] ?? null,
                "trendy_collection" => isset($postParam['trendy_collection']) ? true : false,
                "monthly_offer" => isset($postParam['monthly_offer']) ? true : false
            );

            $update = (isset($postParam['product_id']) && $postParam['product_id'] != 0);
            $productModel = new ProductModel();
            if ($update) {
                if (!$productModel->updateProduct($postParam['product_id'], $data)){
                    $this->ajax_response['message']  = "Une erreur à été rencontré lors de la mise à jour du produit, veuillez contacter le support.";  
                } else{
                    if (!$this->processImage($postParam['product_id'], $update)) {
                        $this->ajax_response['message']  = "Une erreur à été rencontré lors de la mise à jour de l'image du produit, veuillez contacter le support.";
                    } else {
                        $this->ajax_response['success']  = true;    
                    }
                    $this->ajax_response['success']  = true;  
                }
            } else {
                $this->ajax_response['data'] = $data;
                if (($product_id = $productModel->insertProduct($data)) != false){
                    if (!$this->processImage($product_id)) {
                        $this->ajax_response['message']  = "Une erreur à été rencontré lors de l'ajout de l'image du produit, veuillez contacter le support.";
                    } else {
                        $this->ajax_response['success']  = true;    
                    }
                } else{
                    $this->ajax_response['message']  = "Une erreur à été rencontré lors de l'ajout du produit, veuillez contacter le support.";
                }
            }
        } else{
          $this->ajax_response['message']  = "Veuillez remplir tous les champs requis";
        } 

        echo json_encode($this->ajax_response);
    } 

    private function processImage($product_id, $update = false) {
        $file = $this->request->getFile('image');
        if ($file != null) {
            $dataImage = array(
                "name" => $file->getRandomName(),
                "size" => $file->getSize(),
                "type" => $file->guessExtension(),
                "bin" => file_get_contents($file->getTempName()),
                "product_id" => $product_id
            );
            $imageModel = new ImageModel();
            return $imageModel->insertImage($dataImage);
        }
        $this->ajax_response['message'] = "Veuillez par la suite ajouter une image";
        return true;
    }
}
