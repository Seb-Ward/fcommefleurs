<?php

namespace App\Entities;


use CodeIgniter\Entity\Entity;
use DateTime;

class Basket extends Entity {
    private array $product_list = array();
    private float $ship_price = 0;
    private float $HT_price = 0;
    private float $TVA = 0;
    private float $TTC_price = 0;
    private Card $card;
    private DateTime $delivery_date;
     

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
     * @return float
     */
    public function getShipPrice(): float
    {
        return $this->ship_price;
    }

    /**
     * @param float $ship_price
     */
    public function setShipPrice(float $ship_price): void
    {
        $this->ship_price = $ship_price;
    }

    /**
     * @return float
     */
    public function getHTPrice(): float
    {
        return $this->HT_price;
    }

    /**
     * @param float $ht_price
     */
    public function setHTPrice(float $ht_price): void
    {
        $this->HT_price = $ht_price;
    }

    /**
     * @return float|
     */
    public function getTVA(): float
    {
        return $this->TVA;
    }

    /**
     * @param float $tva
     */
    public function setTVA(float $tva): void
    {
        $this->TVA = $tva;
    }

    /**
     * @return float
     */
    public function getTTCPrice(): float
    {
        return $this->TTC_price;
    }

    /**
     * @param float $ttc_price
     */
    public function setTTCPrice(float $ttc_price): void
    {
        $this->TTC_price = $ttc_price;
    }

    /**
     * @return Card
     */
    public function getCard(): Card
    {
        return $this->card;
    }

    /**
     * @param Card $card
     */
    public function setCard(Card $card): void
    {
        $this->card = $card;
    }

        /**
     * @return DateTime
     */
    public function getDeliveryDate(): DateTime
    {
        return $this->delivery_date;
    }

    /**
     * @param DateTime $date
     */
    public function setdeliveryDate(DateTime $date): void
    {
        $this->delivery_date = $date;
    }

}
