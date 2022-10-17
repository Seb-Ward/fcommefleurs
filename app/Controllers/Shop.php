<?php

namespace App\Controllers;
use App\Models\ProductModel;


class Shop extends BaseController
{
    public function index()
    {
        helper('product');
        $productModel=new ProductModel();

        $this->data['title'] = "Boutique";
        $this->data['page'] = "shop";

        $this->data['content'] = view('shop',array(
            'product_list'=> transformItemsToObjects($productModel->getProduct())
        ));
        return view('application', $this->data);
    }

    public function product(int $id) {
        helper('product');
        $productModel=new ProductModel();
        $product = transformItemToObject($productModel->getProduct($id));
        if ($product != null) {
            $this->data['title'] = $product->getName();
            $this->data['page'] = "product_page";
    
            $this->data['content'] = view('product_page',array(
                'product'=> $product
            ));
            return view('application', $this->data);
        } else {

        }
    }
}
