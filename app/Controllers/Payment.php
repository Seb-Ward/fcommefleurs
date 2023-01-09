<?php

namespace App\Controllers;

use Payplug\Exception\PayplugException;
use Payplug\Notification;
use Payplug\Payplug;

class Payment extends BaseController {

    public function index() {
        Payplug::init(array(
            'secretKey' => "sk_live_" . PAYPLUG_PRIVATE_KEY,
            'apiVersion' => PAYPLUG_API_VERSION
        ));
        $email = $this->user->getEmail();
        $basket = $this->getBasket();
        $amount = $basket->getTTCPrice();
        $cust_id = '42710';

        $payment = \Payplug\Payment::create(array(
            'amount'           => $amount * 100, // 1 euro = 100 centimes
            'currency'         => 'EUR',
            'billing'  => array(
                'title'        => 'mr',
                'first_name'   => 'John',
                'last_name'    => 'Watson',
                'email'        => $email,
                'address1'     => '221B Baker Street',
                'postcode'     => 'NW16XE',
                'city'         => 'London',
                'country'      => 'FR',
                'language'     => 'fr'
            ),
            'shipping'  => array(
                'title'         => 'mr',
                'first_name'    => 'John',
                'last_name'     => 'Watson',
                'email'         => $email,
                'address1'      => '221B Baker Street',
                'postcode'      => 'NW16XE',
                'city'          => 'London',
                'country'       => 'FR',
                'language'      => 'fr',
                'delivery_type' => 'BILLING'
            ),
            'hosted_payment'   => array(
                'return_url'     => base_url().'/basket/validate_payment?id='.$cust_id,
                'cancel_url'     => base_url().'/basket/delivery'
            ),
            'notification_url' => base_url().'/payment/notification',
            'metadata'         => array(
                'customer_id'    => $cust_id
            )
        ));

        $payment_url = $payment->hosted_payment->payment_url;
        $payment_id = $payment->id;
        header('Location:' . $payment_url);

    }

    public function notification() {
        $input = file_get_contents('php://input');
        try {
            $resource = Notification::treat($input);
            if ($resource instanceof \Payplug\Resource\Payment && $resource->is_paid) {
                $payment_id = $resource->id;
                $payment_amount = $resource->amount;
                $payment_data = $resource->metadata['customer_id'];
                $payment_state = $resource->is_paid;
                $payment_date = $resource->hosted_payment->paid_at;
            }
        } catch (PayplugException $exception) {
            echo htmlentities($exception);
        }
    }

}