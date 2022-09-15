<?php

namespace App\Controllers;
use App\Models\ProductModel;


class Shop extends BaseController
{
    public function index()
    {
        helper('produit');
        $produitModel=new ProductModel();

        $this->data['title'] = "boutique";
        $this->data['page'] = "shop";

        $this->data['content'] = view('shop',array(
            'produit_list'=> transformItemsToObjects($produitModel->getProduct())
        ));
        return view('application', $this->data);
    }
}
