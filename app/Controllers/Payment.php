<?php

namespace App\Controllers;

use FCommeFleursException;
use Payplug\Exception\PayplugException;
use Payplug\Notification;
use Payplug\Payplug;

class Payment extends BaseController {

    public function index() {
        $payplug = Payplug::init(array(
            'secretKey' => "sk_live_" . PAYPLUG_PRIVATE_KEY,
            'apiVersion' => PAYPLUG_API_VERSION
        ));
        $email = 'john.watson@example.net';
        $amount = 33;
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
                'country'      => 'GB',
                'language'     => 'en'
            ),
            'shipping'  => array(
                'title'         => 'mr',
                'first_name'    => 'John',
                'last_name'     => 'Watson',
                'email'         => $email,
                'address1'      => '221B Baker Street',
                'postcode'      => 'NW16XE',
                'city'          => 'London',
                'country'       => 'GB',
                'language'      => 'en',
                'delivery_type' => 'BILLING'
            ),
            'hosted_payment'   => array(
                'return_url'     => 'https://example.net/return?id='.$cust_id,
                'cancel_url'     => 'https://example.net/cancel?id='.$cust_id
            ),
            'notification_url' => 'https://example.net/notifications?id='.$cust_id,
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
                $payment_state = $resource->is_paid;
                $payment_date = $resource->hosted_payment->paid_at;
                $payment_amount = $resource->amount;
                $payment_data = $resource->metadata['customer_id'];
            }
        } catch (PayplugException $exception) {
            echo htmlentities($exception);
        }
    }

}