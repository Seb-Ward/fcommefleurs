<?php

namespace App\Controllers;
use App\Models\ProductModel;

class Product extends BaseController {

    public function index(){
        if (!$this->isAdminConnected()) {
            return redirect()->to("/connection/");
        }
        helper('product');
        $produitModel = new ProductModel();
        $productList = transformItemsToObjects($produitModel->getProduct());

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
            $produitModel = new ProductModel();
            $product = transformItemToObject($produitModel->getProduct($id));
        }
        $this->data['content'] = view('admin/edit_product', array(
            "product" => $product
        ));
        return view('application', $this->data);
    }

    public function remove() {
        $this->ajax_response['success'] = true;
        $this->ajax_response['message'] = "Le produit a bien été supprimé";
        echo json_encode($this->ajax_response);
    }
    public function add() {
        $postParam = $this->request->getPost();
        if (isset($postParam['produit_nom']) && isset($postParam['produit_description']) && isset($postParam['produit_prix']) && !empty($postParam['produit_nom']) && !empty($postParam['produit_description'])&& !empty($postParam['produit_prix'])) {
            $data=array(
                "name" => $postParam['produit_nom'], 
                "description" => $postParam['produit_description'], 
                "price" => $postParam['produit_prix'], 
            );
            $produitModel = new ProductModel();
            if (!$produitModel->insertProduct($data)){
                $this->ajax_response['message']  = "Problème technique, contacter le support. Merci";  
            }
            else{
                $this->ajax_response['success']  = true;  
            }
        }
        else{
          $this->ajax_response['message']  = "veuillez remplir tous les champs requis";
        } 

        echo json_encode($this->ajax_response);
    } 
}
