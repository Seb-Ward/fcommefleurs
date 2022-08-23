<?php

namespace App\Entities;


use CodeIgniter\Entity\Entity;


class Commande extends Entity {//Name of my class
//Propreties who will define my objet
    private $commande_ref;
    private $user;
    private $produit_list;
    private $montant_total;
    private $option_livraison;
    private $commande_date;
    private $date_envoi;



public function getCommande_ref(){//Function
    return $this->commande_ref;
}
public function getUser(){
    return $this->user;
}
public function getProduit_list(){//Function
    return $this->produit_list;
}
public function setProduit_list($produit_list){//Function
    $this->produit_list=$produit_list;
}
public function getMontant_total(){//Function
    return $this->montant_total;
}
public function setMontant_total(float $montant_total){//Function
   $this->montant_total=$montant_total;
}
public function getOption_livraison(){//Function
    return $this->option_livraison;
}
public function setOption_livraison(Option_livraison $option_livraison){//Function
   $this->option_livraison=$option_livraison;
}
public function getCommande_date(){//Function
    return $this->commande_date;
}
public function getDate_envoi(){//Function
    return $this->date_envoi;
}
}