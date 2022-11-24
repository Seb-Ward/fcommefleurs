<?php

namespace App\Controllers;

use \App\Entities\Product;
use App\Models\ProductModel;

class Basket extends BaseController {
    public function index()
    {
        $this->data['title'] = "Panier";
        $this->data['page'] = "basket";
        $basket = $this->session->get('basket') ?? new \App\Entities\Basket();
        $basketData = array(
            'basket' => $basket
        );
        $this->data['content'] = view('basket', $basketData);
        return view('application', $this->data);
    }

    public function add() {
        $basket = $this->getBasket();
        $productToAdd = $this->request->getPost();
        if (isset($productToAdd['product_id']) && !empty($productToAdd['product_id'])) {
            helper('product');
            $product_id = $productToAdd['product_id'];
            $productModel = new ProductModel();
            $product = transformItemsToObjects($productModel->getProduct($product_id))[$product_id];
            if (!is_null($product)) {
                $productBasket = $basket->getProductList();
                $productBasket[] = $product;
                $basket->setProductList($productBasket);
                $this->calculateBasket($basket);
                $this->session->set('basket', $basket);
                $this->ajax_response['message'] = "Panier mis à jour";
                $this->ajax_response['success'] = true;
            } else {
                $this->ajax_response['message'] = "Produit non identifié";
            }
        } else {
            $this->ajax_response['message'] = 'Données fournis incorrect, veuillez contacter le support';
        }
        echo json_encode($this->ajax_response);
    }

    public function remove() {
        $basket = $this->getBasket();
        $productToRemove = $this->request->getPost();
        $this->ajax_response['message'] = "Il n'y a aucun produit a supprimer";
        $productBasket = $basket->getProductList();
        if (!empty($productBasket)) {
            $this->ajax_response['message'] = "Le produit demandé n'a pas été trouvé";
            foreach ($productBasket as $key => $product) {
                if ($product->getId() === $productToRemove['product_id']) {
                    unset($productBasket[$key]);
                    $basket->setProductList($productBasket);
                    $this->calculateBasket($basket);
                    $this->session->set('basket', $basket);
                    $this->ajax_response['message'] = "Le produit à bien été supprimé";
                    $this->ajax_response['success'] = true;
                    break;
                }
            }
        }
        echo json_encode($this->ajax_response);
    }

    private function getBasket() {
        $basket = $this->session->get('basket');
        if (is_null($basket)){
            $basket = new \App\Entities\Basket();
            $basket->setShipPrice(9.95);
        }
        return $basket;
    }

    private function calculateBasket($basket) {
        $productList = $basket->getProductList();
        $ttc = $basket->getShipPrice();
        $tax = null;
        foreach ($productList as $product) {
            $ttc += $product->getPrice();
            if (is_null($tax) && !is_null($product->getTax())) {
                $tax = $product->getTax();
            }
        }
        $basket->setTTCPrice($ttc);
        $tva = $ttc * ($tax->getPercentage() / 100);
        $basket->setTVA($tva);
        $basket->setHTPrice($ttc - $tva);
    }

}