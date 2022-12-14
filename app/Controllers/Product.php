<?php

namespace App\Controllers;

use App\Models\CategorieModel;
use App\Models\ImageModel;
use App\Models\ProductModel;

class Product extends BaseController {

    public function index(){
        if (!$this->isAdminConnected()) {
            return redirect()->to("/connection/");
        }
        helper('product');
        $productModel = new ProductModel();
        $productList = transformItemsToObjects($productModel->getProduct(null, null, true));
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
            $product = transformItemsToObjects($productModel->getProduct($id))[$id];
        }
        $this->data['content'] = view('admin/edit_product', array(
            "product" => $product,
            "categories_list" => $this->data["shopCategorie"]
        ));
        return view('application', $this->data);
    }

    public function remove() {
        $postParam = $this->request->getPost();
        if (isset($postParam['product_id']) && $postParam['product_id'] > 0) {
            $productModel = new ProductModel();
            if (!$productModel->deleteData($postParam['product_id'])) {
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
            $data = array(
                "name" => $postParam['product_name'], 
                "description" => $postParam['product_description'], 
                "price" => (float) $postParam['product_price'], 
                "tax_id" => 1,
                "quantity" => $postParam['quantity'] ?? null,
                "categorie_id" => $postParam['categorie'] ?? 4,
                "home_page" => isset($postParam['home_page'])
            );
            $productModel = new ProductModel();
            if (isset($postParam['product_id']) && $postParam['product_id'] != 0) {
                if (!$productModel->updateData($postParam['product_id'], $data)){
                    $this->ajax_response['message'] = "Une erreur à été rencontré lors de la mise à jour du produit, veuillez contacter le support.";
                } else {
                    if (!$this->processImage($postParam['product_id'])) {
                        $this->ajax_response['message'] = "Une erreur à été rencontré lors de la mise à jour de l'image du produit, veuillez contacter le support.";
                    } else {
                        $this->ajax_response['success'] = true;
                    }
                }
            } else {
                if (($product_id = $productModel->insertData($data))){
                    if (!$this->processImage($product_id)) {
                        $this->ajax_response['message'] = "Une erreur à été rencontré lors de l'ajout de l'image du produit, veuillez contacter le support.";
                    } else {
                        $this->ajax_response['success'] = true;
                    }
                } else{
                    $this->ajax_response['message'] = "Une erreur à été rencontré lors de l'ajout du produit, veuillez contacter le support.";
                }
            }
        } else{
          $this->ajax_response['message'] = "Veuillez remplir tous les champs requis";
        }
        echo json_encode($this->ajax_response);
    }

    public function remove_image() {
        $postParam = $this->request->getPost();
        if (isset($postParam['id'])) {
            $imageModel = new ImageModel();
            if ($imageModel->deleteData($postParam['id'])) {
                $this->ajax_response['success'] = true;
                $this->ajax_response['message'] = "L'image à bien été supprimées";
            } else {
                $this->ajax_response['message'] = "Une erreur est survenu lors de la suppression de l'image";
            }
        } else {
            $this->ajax_response['message'] = "Identifiant de l'image inconnu, veuillez contacter le support";
        }
        echo json_encode($this->ajax_response);
    }

    private function checkImage() {
        $files = $this->request->getFiles();
        foreach ($files as $file) {
            if (empty($file->getClientName())
                || $file->getSize() > 1024
                || !in_array($file->guessExtension(), array('png', 'jpg', 'jpeg'))) {
                return false;
            }
        }
        return true;
    }

    private function processImage($product_id) {
        if ($imagefile = $this->request->getFiles()) {
            $imageModel = new ImageModel();
            foreach ($imagefile['images'] as $image) {
                if ($image->isValid()) {
                    $dataImage = array(
                        "name" => $image->getRandomName(),
                        "size" => $image->getSize(),
                        "type" => $image->guessExtension(),
                        "bin" => file_get_contents($image->getTempName()),
                        "product_id" => $product_id
                    );
                    if (!$imageModel->insertData($dataImage)) {
                        return false;
                    }
                }
            }
        }
        return true;
    }
}
