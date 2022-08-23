<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Admin extends Entity{//Name of my class
    private $id;//Propreties who will define my objet
    private $user;//Propreties who will define my objet
    private $message_list;//Propreties who will define my objet
   
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
    public function getMessage_list(){//Function
        return $this->message_list;
    }
    public function setMessage_list(string $message_list){//Function + Type
        $this->message_list= $message_list;
    }
}

?>