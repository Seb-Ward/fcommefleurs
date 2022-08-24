<?php

namespace App\Controllers;
use App\Models\ProduitModel;

class Product extends AdminController{

    public function index(){
        
        helper('produit');
        $produitModel=new ProduitModel();
        $productList=transformItemsToObjects($produitModel->getProduit());
        
        $data = array(
            'title' => "Product",
            'page'=>"product_list",
            'content' => view('admin/product_list',array(
            "product_list" =>$productList
            ))

        );
        return view('application', $data);
    }
}