<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;


class Option_livraison extends Entity{//Name of my class
    private $id;//Propreties who will define my objet
    private $description;//Propreties who will define my objet
    private $montant;//Propreties who will define my objet

    public function getId(){//Function
        return $this->id;
    }
    public function setId(int $id){//Function + Type
        $this->id= $id;
    }
    public function getDescription(){//Function
        return $this->description;
    }
    public function setDescription($description){//Function + Type
        $this->description= $description;
    }
    public function getMontant(){//Function
        return $this->montant;
    }
    public function setMontant($montant){//Function + Type
        $this->montant= $montant;
    }
}


?>