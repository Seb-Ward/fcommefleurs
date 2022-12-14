<?php

namespace App\Entities;


use CodeIgniter\Entity\Entity;


class Card extends Entity {
    private string $message;


    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string 
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
}