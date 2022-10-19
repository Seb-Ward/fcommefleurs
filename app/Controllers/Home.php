<?php

namespace App\Controllers;
use App\Models\ProductModel;


class Home extends BaseController
{
    public function index()
    {
        helper('product');
        $productModel = new ProductModel();

        $this->data['page'] = "home";
        $this->data['content'] = view('home',array(
            'trendy_collection'=> transformItemsToObjects($productModel->getProduct(null,array("categorie_id"=>1,"home_page"=>true))),
            'monthly_offer'=> transformItemsToObjects($productModel->getProduct(null,array("categorie_id"=>2,"home_page"=>true)))
        ));
        return view('application', $this->data);
    }
}
