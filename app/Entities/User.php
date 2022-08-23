<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity {//Name of my class
    private $user_id;//Propreties who will define my objet
    private $nom;//Propreties who will define my objet
    private $prenom;//Propreties who will define my objet
    private $email;//Propreties who will define my objet
    private $admin;//Propreties who will define my objet

    public function getId(){//Function
        return $this->user_id;
    }
    public function setId(int $user_id){//Function + Type
        $this->user_id= $user_id;
    }

    public function getNom(){//Function
        return $this->nom;
    }
    public function setNom(string $nom){//Function + Type
        $this->nom= $nom;
    }

    public function getPrenom(){//Function
        return $this->prenom;
    }
    public function setPrenom(string $prenom){//Function + Type
        $this->prenom= $prenom;
    }

    public function getEmail(){//Function
        return $this->email;
    }
    public function setEmail(string $email){//Function + Type
        $this->email= $email;
    }
    public function getAdmin(){//Function
        return $this->admin;
    }
    public function setAdmin(string $admin){//Function + Type
        $this->admin= $admin;
    }

}

?>