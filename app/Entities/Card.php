<?php

namespace App\Entities;


use CodeIgniter\Entity\Entity;


class Card extends Entity {
    private string $message;
    private string $signature;


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

        /**
     * @return string
     */
    public function getSignature(): string
    {
        return $this->signature;
    }

    /**
     * @param string 
     */
    public function setSignature(string $signature): void
    {
        $this->signature = $signature;
    }
}