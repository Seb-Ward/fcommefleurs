<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Admin extends Entity{//Name of my class
    private $id;//Propreties who will define my objet
    private $name;//Propreties who will define my objet
    private $surname;//Propreties who will define my objet
    private $nickname;//Propreties who will define my objet
    private $reset_password;//Propreties who will define my objet
    private $privileges;//Propreties who will define my objet
    private $actif;//Propreties who will define my objet
   
    public function getId(){//Function
        return $this->id;
    }
    public function setId(int $id){//Function + Type
        $this->id= $id;
    }
    public function getName(){//Function
        return $this->name;
    }
    public function setName($name){//Function + Type
        $this->name= $name;
    }
    public function getSurname(){//Function
        return $this->surname;
    }
    public function setSurname($surname){//Function + Type
        $this->surname= $surname;
    }
    public function getNickname(){//Function
        return $this->nickname;
    }
    public function setNickname($nickname){//Function + Type
        $this->nickname= $nickname;
    }
    public function getReset_password(){//Function
        return $this->reset_password;
    }
    public function setReset_password($reset_password){//Function + Type
        $this->reset= $reset_password;
    }

    public function getPrivileges(){//Function
        return $this->privileges;
    }
    public function setPrivileges($privileges){//Function + Type
        $this->privileges = $privileges;
    }
    public function isActif(){//Function
        return $this->actif;
    }
    public function setActif($actif){//Function + Type
        $this->actif= $actif;
    }
}

?>