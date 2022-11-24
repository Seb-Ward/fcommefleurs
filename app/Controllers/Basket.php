<?php

namespace App\Controllers;

use App\Models\CategorieModel;
use App\Models\ImageModel;
use App\Models\ProductModel;

class Basket extends BaseController {
    public function index()
    {
        $this->data['title'] = "Panier";
        $this->data['page'] = "basket";

        $basketData = array(
            'product_list' => array()
        );
        $this->data['content'] = view('basket', $basketData);
        return view('application', $this->data);
    }
}