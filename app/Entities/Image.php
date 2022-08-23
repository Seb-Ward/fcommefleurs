<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;


class Image extends Entity{//Name of my class
    private $image_id;//Propreties who will define my objet
    private $image_nom;//Propreties who will define my objet
    private $image_taille;//Propreties who will define my objet
    private $image_type;//Propreties who will define my objet
    private $image_bin;//Propreties who will define my objet


    public function getImage_id(){//Function
        return $this->image_id;
    }
    public function setImage_id(int $image_id){//Function + Type
        $this->image_id= $image_id;
    }
    public function getImage_nom(){//Function
        return $this->image_nom;
    }
    public function setImage_nom(string $image_nom){//Function + Type
        $this->image_nom= $image_nom;
    } 
    public function getImage_taille(){//Function
        return $this->image_taille;
    }
    public function setImage_taille(string $image_taille){//Function + Type
        $this->image_taille= $image_taille;
    } 
    public function getImage_type(){//Function
        return $this->image_type;
    }
    public function setImage_type(string $image_type){//Function + Type
        $this->image_type= $image_type;
    } 
    public function getImage_bin(){//Function
        return $this->image_bin;
    }
    public function setImage_bin(string $image_bin){//Function + Type
        $this->image_bin= $image_bin;
    } 
  
    
 
}


?>