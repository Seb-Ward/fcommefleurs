<?php

namespace App\Controllers;
use App\Models\ProduitModel;


class Home extends BaseController
{
    public function index()
    {
        helper('produit');
        $produitModel=new ProduitModel();

        $user = $this->session->get('user');
        $data = array(
            'title' => "Offrir & Décorer",
            'page'=>"home",
            'content' => view('home',array(
                'produit_list'=> transformItemsToObjects($produitModel->getProduit())
            )),
            'connected' => $user != null,
            'admin' => $user != null && $user->admin == 1
        );
        return view('application', $data);
    }
}
