<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Product extends Entity
{
    private int $id;
    private string $name;
    private string $description;
    private float $price;
    private ?Tax $tax;
    private ?array $image_list;
    private ?int $quantity;
    private Categorie $categorie;
    private bool $home_page;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return Tax
     */
    public function getTax(): Tax
    {
        return $this->tax;
    }

    /**
     * @param Tax $tax
     */
    public function setTax(Tax $tax): void
    {
        $this->tax = $tax;
    }

    /**
     * @return array|null
     */
    public function getImageList(): ?array
    {
        return $this->image_list;
    }

    /**
     * @param array|null $image_list
     */
    public function setImageList(?array $image_list): void
    {
        $this->image_list = $image_list;
    }

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int|null $quantity
     */
    public function setQuantity(?int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return Categorie
     */
    public function getCategorie(): Categorie
    {
        return $this->categorie;
    }

    /**
     * @param Categorie $categorie
     */
    public function setCategorie(Categorie $categorie): void
    {
        $this->categorie = $categorie;
    }

    /**
     * @return bool
     */
    public function isHomePage(): bool
    {
        return $this->home_page;
    }

    /**
     * @param bool $home_page
     */
    public function setHomePage(bool $home_page): void
    {
        $this->home_page = $home_page;
    }

}