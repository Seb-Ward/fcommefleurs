<?php

namespace App\Controllers;
use App\Models\ProductModel;


class Home extends BaseController
{
    public function index()
    {
        helper('produit');
        $produitModel=new ProductModel();

        $this->data['title'] = "Offrir & Décorer";
        $this->data['page'] = "home";

        $this->data['content'] = view('home',array(
            'produit_list'=> transformItemsToObjects($produitModel->getProduct())
        ));
        return view('application', $this->data);
    }
}
