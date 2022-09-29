<?php

namespace App\Controllers;
use App\Models\ProductModel;


class Home extends BaseController
{
    public function index()
    {
        helper('product');
        $productModel = new ProductModel();

        $this->data['title'] = "Offrir & Décorer";
        $this->data['page'] = "home";

        $this->data['content'] = view('home',array(
            'product_list'=> transformItemsToObjects($productModel->getProduct())
        ));
        return view('application', $this->data);
    }
}
