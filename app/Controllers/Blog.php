<?php

namespace App\Controllers;
use App\Models\ProductModel;


class Blog extends BaseController
{
    public function index()
    {
        helper('produit');
        $produitModel=new ProductModel();

        $this->data['title'] = "blog";
        $this->data['page'] = "blog";

        $this->data['content'] = view('blog',array(
            'produit_list'=> transformItemsToObjects($produitModel->getProduct())
        ));
        return view('application', $this->data);
    }
}