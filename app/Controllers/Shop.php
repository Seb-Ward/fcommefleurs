<?php

namespace App\Controllers;
use App\Models\ProductModel;


class Shop extends BaseController
{
    public function index($categorieId = 1)
    {
        helper('product');
        $productModel = new ProductModel();

        $this->data['title'] = "Boutique";
        $this->data['page'] = "shop";

        $dataShop = array(
            'product_list'=> transformItemsToObjects($productModel->getProduct(null, array("categorie_id" => $categorieId), true)
        ));
        if ($categorieId == 1) {
            $dataShop['description'] = 'Notre selection du moment';
        }
        if ($categorieId == 2) {
            $dataShop['description'] = '"Offres du mois"
            Le coin des bonnes affaires';
        }
        if ($categorieId == 3) {
            $dataShop['description'] = 'Ils se sont dit oui! Voici quelques exemples de produits que nous pouvons confectionner pour votre grand jour.Rendez-vous sur notre page <a href="/contact">contact</a> pour que nous puissions confectionner les compositions florales qui vous accompagnerons dans ce grand moment.';
        }
        if ($categorieId == 4) {
            $dataShop['description'] = 'Autres';
        }
        if ($categorieId == 5) {
            $dataShop['description'] = 'Un hommage est toujours un moment difficile. Nous compatissons avec votre douleurs et nous sommes là pour vous accompagner afin de trouver le bouquet de fleurs qui correspondrait. Voici un coix de bouquets, mais si vous souhaiter qqchose de plus personnalisé remplisser votre besoin sur notre page <a href="/contact">contact</a>.';
        }
        if ($categorieId == 6) {
            $dataShop['description'] = 'Pour les amoureux';
        }
        $this->data['content'] = view('shop', $dataShop);
        return view('application', $this->data);
    }

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
