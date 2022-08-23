<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Produit extends Entity {//Name of my class
    private $produit_id;//Propreties who will define my objet
    private $produit_nom;//Propreties who will define my objet
    private $produit_description;//Propreties who will define my objet
    private $produit_prix;//Propreties who will define my objet
    private $taxe;
    private $image;//Propreties who will define my objet
    private $produit_publish_accueil;
    private $produit_publish_boutique;


    public function getProduit_id(){//Function
        return $this->produit_id;
    }
    public function setProduit_id(int $produit_id){//Function + Type
        $this->produit_id= $produit_id;
    }
    public function getProduit_nom(){//Function
        return $this->produit_nom;
    }
    public function setProduit_nom(string $produit_nom){//Function + Type
        $this->produit_nom= $produit_nom;
    }
    public function getProduit_description(){//Function
        return $this->produit_description;
    }
    public function setProduit_description(string $produit_description){//Function + Type
        $this->produit_description= $produit_description;
    }
    public function getProduit_prix(){//Function
        return $this->produit_prix;
    }
    public function setProduit_prix(float $produit_prix){//Function + Type
        $this->produit_prix= $produit_prix;
    }
    public function getTaxe(){//Function
        return $this->taxe;
    }
    public function setTaxe(Taxe $taxe){//Function + Type
         $this->taxe= $taxe;
    }
    public function getImage(){//Function
        return $this->image;
    }
    public function setImage(Image $image){//Function + Type
        $this->image= $image;
    }
    public function getProduit_publish_accueil(){
        return $this->produit_publish_accueil;
    }
    public function setProduit_publish_accueil($produit_publish_accueil){
        $this->produit_publish_accueil= $produit_publish_accueil;
    }
    public function getProduit_publish_boutique(){
        return $this->produit_publish_boutique;
    }
    public function setProduit_publish_boutique($produit_publish_boutique){
        $this->produit_publish_boutique= $produit_publish_boutique;
    }
}


?>