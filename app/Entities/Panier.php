<?php

namespace App\Entities;


use CodeIgniter\Entity\Entity;


class Panier extends Entity{//Name of my class
    private $produit_list;//Propreties who will define my objet

    public function getProduit_list(){//Function
        return $this->produit_list;
    }
    public function ajouter_produit(Produit $produit){
        if($this->produit_list==null){
            $this->produit_list=array();
            }
            $this->produit_list[$produit->getProduit_id()]=$produit;
    }
    public function modifier_produit(Produit $produit){
        $this->produit_list[$produit->getProduit_id()]=$produit;

    }
    
    public function supprimer_produit(Produit $produit){
      unset($this->produit_list[$produit->getProduit_id()]);
    }
}


?>