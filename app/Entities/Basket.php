<?php

namespace App\Entities;


use CodeIgniter\Entity\Entity;


class Basket extends Entity {
    private array $product_list = array();
    private ?float $ship_price;
    private ?float $HT_price;
    private ?float $TVA;
    private ?float $TTC_price;

    /**
     * @return array
     */
    public function getProductList(): array
    {
        return $this->product_list;
    }

    /**
     * @param array $product_list
     */
    public function setProductList(array $product_list): void
    {
        $this->product_list = $product_list;
    }

    /**
     * @return float|null
     */
    public function getShipPrice(): ?float
    {
        return $this->ship_price;
    }

    /**
     * @param float|null $ship_price
     */
    public function setShipPrice(?float $ship_price): void
    {
        $this->ship_price = $ship_price;
    }

    /**
     * @return float|null
     */
    public function getHTPrice(): ?float
    {
        return $this->HT_price;
    }

    /**
     * @param float|null $ht_price
     */
    public function setHTPrice(?float $ht_price): void
    {
        $this->HT_price = $ht_price;
    }

    /**
     * @return float|null
     */
    public function getTVA(): ?float
    {
        return $this->TVA;
    }

    /**
     * @param float|null $tva
     */
    public function setTVA(?float $tva): void
    {
        $this->TVA = $tva;
    }

    /**
     * @return float|null
     */
    public function getTTCPrice(): ?float
    {
        return $this->TTC_price;
    }

    /**
     * @param float|null $ttc_price
     */
    public function setTTCPrice(?float $ttc_price): void
    {
        $this->TTC_price = $ttc_price;
    }

}
