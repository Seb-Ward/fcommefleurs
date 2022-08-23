<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;


class Taxe extends Entity{//Name of my class
    private $id;//Propreties who will define my objet
    private $description;//Propreties who will define my objet
    private $pourcentage;//Propreties who will define my objet

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
    public function getPourcentage(){//Function
        return $this->pourcentage;
    }
    public function setPourcentage($pourcentage){//Function + Type
        $this->pourcentage= $pourcentage;
    }
}


?>