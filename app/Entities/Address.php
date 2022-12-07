<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Address extends Entity {

    private string $address;
    private ?string $additional_address;
    private string $zipcode;
    private string $city;

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string|null
     */
    public function getAdditionalAddress(): ?string
    {
        return $this->additional_address;
    }

    /**
     * @param string|null $additional_address
     */
    public function setAdditionalAddress(?string $additional_address): void
    {
        $this->additional_address = $additional_address;
    }

    /**
     * @return string
     */
    public function getZipcode(): string
    {
        return $this->zipcode;
    }

    /**
     * @param string $zipcode
     */
    public function setZipcode(string $zipcode): void
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

}