<?php

namespace App\Controllers;
use App\Models\ProductModel;


class Tribute extends BaseController
{
    
    public function product(int $id) {
        helper('product');
        $productModel = new ProductModel();
        $this->data['page'] = "product_page";
        $product = transformItemsToObjects($productModel->getProduct($id))[$id];
        if ($product != null) {
            $this->data['title'] = $product->getName();
            $this->data['content'] = view('product_page',array(
                'product'=> $product
            ));
        }
        return view('application', $this->data);
    }
}
