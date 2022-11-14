<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Message extends Entity{
    private int $id;
    private string $name_sender;
    private string $email_sender;
    private ?string $phone_sender;
    private string $text_sender;

    public function getId(): int {
        return $this->id;
    }
    public function setId(int $id){
        $this->id= $id;
    }
    public function getName_sender(): string{
        return $this->name_sender;
    }
    public function setName_sender(string $name_sender){
        $this->name_sender= $name_sender;
    }
    public function getEmail_sender(): string{
        return $this->email_sender;
    }
    public function setEmail_sender(string $email_sender){
        $this->email_sender= $email_sender;
    }
    public function getText_sender(): string{
        return $this->text_sender;
    }
    public function setPhone_sender(?string $phone_sender){
        $this->phone_sender= $phone_sender;
    }
    public function getPhone_sender(): ?string{
        return $this->phone_sender;
    }
    public function setText_sender(string $text_sender){
        $this->text_sender= $text_sender;
    }
  
}


?>