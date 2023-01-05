<?php

namespace App\Controllers;

use App\Models\ProductModel;
use DateTime;

class Basket extends BaseController {
    public function index()
    {
        $this->data['title'] = "Panier";
        $this->data['page'] = "basket";
        $basket = $this->getBasket();
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
                $basket = $this->calculateBasket($basket);
                $basket->setDeliveryDate(new DateTime());
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
        $this->ajax_response['message'] = "Les informations du produit sont manquantes";
        $productToRemove = $this->request->getPost()['product_id'] ?? null;
        if ($productToRemove != null) {
            $this->ajax_response['message'] = "Il n'y a aucun produit a supprimer";
            $productBasket = $basket->getProductList();
            if (!empty($productBasket)) {
                $this->ajax_response['message'] = "Le produit demandé n'a pas été trouvé";
                foreach ($productBasket as $key => $product) {
                    if ($product->getId() == $productToRemove) {
                        unset($productBasket[$key]);
                        $basket->setProductList($productBasket);
                        $basket = $this->calculateBasket($basket);
                        $this->session->set('basket', $basket);
                        $this->ajax_response['message'] = "Le produit à bien été supprimé";
                        $this->ajax_response['success'] = true;
                        break;
                    }
                }
            }
        }
        echo json_encode($this->ajax_response);
    }

    private function calculateBasket($basket) {
        $productList = $basket->getProductList();
        $ttc = 0;
        $tax = null;
        foreach ($productList as $product) {
            $ttc += $product->getPrice();
            if (is_null($tax) && !is_null($product->getTax())) {
                $tax = $product->getTax();
            }
        }
        if ($ttc > 0) {
            $shipPrice = 9.95;
            $basket->setTTCPrice($ttc + $shipPrice);
            $tva = $ttc * ($tax->getPercentage() / 100);
            $basket->setTVA($tva);
            $basket->setHTPrice($ttc - $tva);
            $basket->setShipPrice($shipPrice);
        } else {
            $basket->setTTCPrice(0);
            $basket->setTVA(0);
            $basket->setHTPrice(0);
            $basket->setShipPrice(0);
        }
        return $basket;
    }

    public function join_message()
    {
        $basket = $this->getBasket();
        if (empty($basket->getProductList())) {
            return redirect()->to("/home");
        }
        $this->data['title'] = "Panier";
        $this->data['page'] = "basket";
        $message = null;
        if (!empty($basket->getMessage())) {
            $message = $basket->getMessage();
        }
        $this->data['content'] = view('joinmessage', array(
            'message' => $message
        ));
        return view('application', $this->data);
    }

    public function add_message(){
        $join_message = $this->request->getPost();
        if (isset($join_message['message']) && !empty($join_message['message'])) {
            $basket = $this->getBasket();
            $basket->setMessage($join_message['message']);
            $this->session->set('basket', $basket);
            $this->ajax_response['success'] = true;
        } else {
            $this->ajax_response['message'] = "Message manquant";
        }
        echo json_encode($this->ajax_response);
    }

    public function delivery() {
        $this->data['title'] = "Adresse de livraison";
        $this->data['page'] = "delivery_address";
        $basket = $this->getBasket();
        if (empty($basket->getProductList())) {
            return redirect()->to("/home");
        }
        $deliveryData = array(
            'basket' => $basket
        );
        $this->data['content'] = view('delivery', $deliveryData);
        return view('application', $this->data);
    }

    

}