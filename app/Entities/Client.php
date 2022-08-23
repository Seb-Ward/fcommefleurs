<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;


class Client extends Entity{//Name of my class
    private $id;//Propreties who will define my objet
    private $user;//Propreties who will define my objet
    private $panier;//Propreties who will define my objet

    public function getId(){//Function
        return $this->id;
    }
    public function setId(int $id){//Function + Type
        $this->id= $id;
    }
    public function getUser(){//Function
        return $this->user;
    }
    public function setUser(User $user){//Function + Type
        $this->user= $user;
    }
    public function getPanier(){//Function
        return $this->panier;
    }
    public function setPanier(string $panier){//Function + Type
        $this->panier= $panier;
    }
}


?>