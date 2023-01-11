<?php

use App\Entities\Address;
use App\Entities\Categorie;
use App\Entities\Customer;
use App\Entities\Gender;
use App\Entities\Image;
use App\Entities\Order;
use App\Entities\Product;

function transformItemsToObjects($items){
    $objectlist = array();
    foreach ($items as $item){
        if (isset($objectlist[$item->id])) {
            $product_list = $objectlist[$item->id]->getProductList();
            $product_list[] = createProductObject($item);
            $objectlist[$item->id]->setProductList($product_list);
            unset($product_list);
        } else {
            $objectlist[$item->id] = transformItemToObject($item);
        }
    }
    return  $objectlist;
}

function transformItemToObject($item){
    $order = new Order();

    $order->setId($item->id);
    $order->setShipPrice(9.95);
    $order->setTTCPrice($item->price_ttc);
    $order->setRef($item->ref);
    $order->setTVA($item->tax_value);
    $order->setHTPrice($item->price_ttc - ($item->price_ttc * ($item->tax_value / 100)));
    $order->setMessage($item->message);
    $order->setOrderDate(convertStringToDateTime($item->order_date));
    $order->setPaymentDate(convertStringToDateTime($item->payment_date));
    $order->setSendingDate(convertStringToDateTime($item->sending_date));

    /* CUSTOMER SETUP START */
    $customer = new Customer();
    $customer->setId($item->customer_id);
    $customer_gender = new Gender();
    if (isset($item->short_description)) {
        $customer_gender->setShortDescription($item->short_description);
    }
    if (isset($item->long_description)) {
        $customer_gender->setLongDescription($item->long_description);
    }
    $customer->setGender($customer_gender);
    unset($customer_gender);
    $customer->setName($item->customer_first_name);
    $customer->setSurname($item->customer_last_name);
    if (isset($item->customer_email)) {
        $customer->setEmail($item->customer_email);
    }
    if (isset($item->customer_phone)) {
        $customer->setPhone($item->customer_phone);
    }
    $customer_address = new Address();
    if (isset($item->customer_address)) {
        $customer_address->setAddress($item->customer_address);
        if (isset($item->customer_address_bis)) {
            $customer_address->setAdditionalAddress($item->customer_address_bis);
        }
        $customer_address->setZipcode($item->customer_zipcode);
        $customer_address->setCity($item->customer_city);
    }
    $customer->setAddress($customer_address);
    unset($customer_address);
    $order->setCustomer($customer);
    unset($customer);
    /* CUSTOMER SETUP END */

    /* RECIPIENT SETUP START */
    if (isset($item->recipient_first_name)) {
        $recipient = new Customer();
        $recipient_gender = new Gender();
        if (isset($item->recipient_gender)) {
            $recipient_gender->setShortDescription($item->recipient_gender);
        }
        $recipient->setGender($recipient_gender);
        unset($recipient_gender);
        $recipient->setName($item->recipient_first_name);
        $recipient->setSurname($item->recipient_last_name);
        if (isset($item->recipient_email)) {
            $recipient->setEmail($item->recipient_email);
        }
        if (isset($item->recipient_phone)) {
            $recipient->setPhone($item->recipient_phone);
        }
        $recipient_address = new Address();
        if (isset($item->recipient_address)) {
            $recipient_address->setAddress($item->recipient_address);
            if (isset($item->recipient_address_bis)) {
                $recipient_address->setAdditionalAddress($item->recipient_address_bis);
            }
            $recipient_address->setZipcode($item->recipient_zipcode);
            $recipient_address->setCity($item->recipient_city);
        }
        $recipient->setAddress($recipient_address);
        unset($recipient_address);
        $order->setRecipient($recipient);
        unset($recipient);
    }
    /* RECIEPIENT SETUP END */

    if (isset($item->product_id)) {
        $order->setProductList(array(createProductObject($item)));
    }

    return $order;
}

function createProductObject($item)
{
    if (!isset($item->product_id) || $item->product_id == null) {
        return null;
    }
    $product = new Product();
    $product->setId($item->product_id);
    $product->setName($item->product_name);
    $product->setDescription($item->product_description);
    $product->setPrice($item->product_price_ttc);
    $categorie = new Categorie();
    $categorie->setId($item->categorie_id);
    $categorie->setName($item->categorie_name);
    $product->setCategorie($categorie);
    unset($categorie);
    return $product;
}

function convertStringToDateTime(?string $date): DateTime|bool|null
{
    if (is_null($date)) {
        return null;
    }
    return DateTime::createFromFormat("Y-m-d H:i:s", $date);
}

function createImageObject($item) {
    if ($item->image_id == null) {
        return null;
    }
    $image = new Image();
    $image->setId($item->image_id);
    $image->setName($item->image_name);
    $image->setSize($item->image_size);
    $image->setType($item->image_type);
    $image->setBin($item->image_bin);
    return $image;
}