<?php

namespace App\Controllers;

use App\Models\OrderModel;

class Order extends BaseController {

    public function index() {
        helper("order");
        $orderModel = new OrderModel();
        if (is_null($this->user)) {
            return redirect()->to("/connection/");
        } else if (!$this->isAdminConnected()) {
            $orderList = transformItemsToObjects($orderModel->getOrderByCustomerId($this->user->getId()));
            $this->data['title'] = "Historique des commandes";
            $this->data['page'] = "order_list";
            $this->data['content'] = view('customer_order',array(
                "order_list" => $orderList
            ));
        } else {

            $orderList = transformItemsToObjects($orderModel->getOrder(null, array(
                "sending_date IS NULL" => null
            )));
            $this->data['title'] = "Gestion des commandes";
            $this->data['page'] = "order_list";
            $this->data['content'] = view('admin/ordered_list',array(
                "order_list" => $orderList
            ));
        }
        return view('application', $this->data);
    }

    public function info($id) {

    }

}