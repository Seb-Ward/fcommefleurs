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
            'trendy_collection'=> transformItemsToObjects($productModel->getProduct(null,array("trendy_collection"=>true,"home_page"=>true))),
            'monthly_offer'=> transformItemsToObjects($productModel->getProduct(null,array("monthly_offer"=>true,"home_page"=>true)))
        ));
        return view('application', $this->data);
    }
}
