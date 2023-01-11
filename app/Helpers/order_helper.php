<?php

use App\Entities\Address;
use App\Entities\Categorie;
use App\Entities\Customer;
use App\Entities\Gender;
use App\Entities\Order;
use App\Entities\Product;

function transformItemsToObjects($items){
    $objectlist = array();
    foreach ($items as $item){
        if (isset($objectlist[$item->id])) {
            $product_list = $objectlist[$item->id]->getProductList();
            $product_list[] = createProductObject($item);
            $objectlist[$item->id]->setProductList($product_list);
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
    $order->setOrderDate($item->order_date);
    $order->setPaymentDate($item->payment_date);
    $order->setSendingDate($item->sending_date);

    /* CUSTOMER SETUP START */
    $customer_gender = new Gender();
    if (isset($item->short_description)) {
        $customer_gender->setShortDescription($item->short_description);
    }
    if (isset($item->long_description)) {
        $customer_gender->setLongDescription($item->long_description);
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
    $customer = new Customer();
    $customer->setId($item->customer_id);
    $customer->setGender($customer_gender);
    $customer->setName($item->customer_first_name);
    $customer->setSurname($item->customer_last_name);
    $customer->setEmail($item->customer_email);
    $customer->setPhone($item->customer_phone);
    $customer->setAddress($customer_address);
    $order->setCustomer($customer);
    /* CUSTOMER SETUP END */

    /* RECIPIENT SETUP START */
    $recipient_gender = new Gender();
    if (isset($item->recipient_gender)) {
        $recipient_gender->setShortDescription($item->recipient_gender);
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
    $recipient = new Customer();
    $recipient->setGender($recipient_gender);
    $recipient->setName($item->recipient_first_name);
    $recipient->setSurname($item->recipient_last_name);
    $recipient->setEmail($item->recipient_email);
    $recipient->setPhone($item->recipient_phone);
    $recipient->setAddress($recipient_address);
    $order->setRecipient($recipient);
    /* RECIEPIENT SETUP END */


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
    $product->setPrice($item->product_);


    $product->setCategorie($item->image_bin);
    return $product;
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