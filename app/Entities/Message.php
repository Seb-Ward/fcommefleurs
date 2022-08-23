<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Message extends Entity{//Name of my class
    private $message_id;//Propreties who will define my objet
    private $message_nom_expediteur;//Propreties who will define my objet
    private $message_genre_expediteur;//Propreties who will define my objet
    private $message_email_expediteur;//Propreties who will define my objet
    private $message_telephone_expediteur;//Propreties who will define my objet
    private $message_text_expediteur;//Propreties who will define my objet

   
    public function getMessage_id(){//Function
        return $this->message_id;
    }
    public function setMessage_id(int $message_id){//Function + Type
        $this->message_id= $message_id;
    }
    public function getMessage_nom_expediteur(){//Function
        return $this->message_nom_expediteur;
    }
    public function setMessage_nom_expediteur(string $message_nom_expediteur){//Function + Type
        $this->message_nom_expediteur= $message_nom_expediteur;
    }
    public function getMessage_genre_expediteur(){//Function
        return $this->message_genre_expediteur;
    }
    public function setMessage_genre_expediteur(string $message_genre_expediteur){//Function + Type
        $this->message_genre_expediteur= $message_genre_expediteur;
    }
    public function getMessage_email_expediteur(){//Function
        return $this->message_email_expediteur;
    }
    public function setMessage_email_expediteur(string $message_email_expediteur){//Function + Type
        $this->message_email_expediteur= $message_email_expediteur;
    }
    public function getMessage_telephone_expediteur(){//Function
        return $this->message_telephone_expediteur;
    }
    public function setMessage_telephone_expediteur(string $message_telephone_expediteur){//Function + Type
        $this->message_telephone_expediteur= $message_telephone_expediteur;
    }
    public function getMessage_text_expediteur(){//Function
        return $this->message_text_expediteur;
    }
    public function setMessage_text_expediteur(string $message_text_expediteur){//Function + Type
        $this->message_text_expediteur= $message_text_expediteur;
    }
}


?>