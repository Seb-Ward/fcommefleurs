<?php

namespace App\Controllers;
use App\Models\ProductModel;

class Product extends AdminController{

    public function index(){
        
        helper('produit');
        $produitModel=new ProductModel();
        $productList=transformItemsToObjects($produitModel->getProduct());
                
        $this->data['title'] = "Product";
        $this->data['page'] = "product_list";

        $this->data['content'] = view('admin/product_list',array(
            "product_list" => $productList
        ));
        return view('application', $this->data);
    }
    public function edit($id = 0){
        
        $this->data['title'] = "Edition produit";
        $this->data['page'] = "edit_product";

        $this->data['content'] = view('admin/edit_product',array());
        return view('application', $this->data);
    }
}