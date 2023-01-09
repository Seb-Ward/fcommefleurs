<?php

namespace App\Entities;


use CodeIgniter\Entity\Entity;
use DateTime;


class Order extends Entity {

    private int $id;
    private string $ref;
    private Customer $customer;
    private array $product_list;
    private float $ship_price;
    private float $HT_price;
    private float $TVA;
    private float $TTC_price;
    private string $message;
    private Customer $recipient;
    private DateTime $order_date;
    private DateTime $payment_date;
    private DateTime $sending_date;

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
    public function getRef(): string
    {
        return $this->ref;
    }

    /**
     * @param string $ref
     */
    public function setRef(string $ref): void
    {
        $this->ref = $ref;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     */
    public function setAddress(Address $address): void
    {
        $this->address = $address;
    }

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
     * @param float $HT_price
     */
    public function setHTPrice(float $HT_price): void
    {
        $this->HT_price = $HT_price;
    }

    /**
     * @return float
     */
    public function getTVA(): float
    {
        return $this->TVA;
    }

    /**
     * @param float $TVA
     */
    public function setTVA(float $TVA): void
    {
        $this->TVA = $TVA;
    }

    /**
     * @return float
     */
    public function getTTCPrice(): float
    {
        return $this->TTC_price;
    }

    /**
     * @param float $TTC_price
     */
    public function setTTCPrice(float $TTC_price): void
    {
        $this->TTC_price = $TTC_price;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return Customer
     */
    public function getRecipient(): Customer
    {
        return $this->recipient;
    }

    /**
     * @param Customer $recipient
     */
    public function setRecipient(Customer $recipient): void
    {
        $this->recipient = $recipient;
    }

    /**
     * @return DateTime
     */
    public function getOrderDate(): DateTime
    {
        return $this->order_date;
    }

    /**
     * @param DateTime $order_date
     */
    public function setOrderDate(DateTime $order_date): void
    {
        $this->order_date = $order_date;
    }

    /**
     * @return DateTime
     */
    public function getPaymentDate(): DateTime
    {
        return $this->payment_date;
    }

    /**
     * @param DateTime $payment_date
     */
    public function setPaymentDate(DateTime $payment_date): void
    {
        $this->payment_date = $payment_date;
    }

    /**
     * @return DateTime
     */
    public function getSendingDate(): DateTime
    {
        return $this->sending_date;
    }

    /**
     * @param DateTime $sending_date
     */
    public function setSendingDate(DateTime $sending_date): void
    {
        $this->sending_date = $sending_date;
    }

}