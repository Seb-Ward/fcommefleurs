<?php

namespace App\Models;

class OrderModel extends ParentModel {
    protected $table = 'ordered';
    protected $allowedFields = ['ref', 'customer_id', 'ship_price', 'tax_value', 'message', 'order_date', 'payment_date', 'sending_date'];

    public function getOrder($id = null, $data = array()) {
        $dbQuery = $this->db->table($this->table);
        $dbQuery->join("customer AS cust","$this->table.customer_id = cust.id",  "inner")
            ->join("gender AS g","cust.gender_id = g.id", "left");
        if ($id != null) {
            $dbQuery->select("$this->table.*, g.long_description, cust.name AS customer_first_name, cust.surname AS customer_last_name, cust.society_name AS customer_society_name, cust.email AS customer_email, cust.phone AS customer_phone, 
            cust.address AS customer_address, cust.address_bis AS customer_address_bis, cust.zipcode AS customer_zipcode, cust.city AS customer_city, op.product_price_ttc, p.name AS product_name, p.description. cat.name AS categorie_name,
            da.society_name AS recipient_society_name, da.first_name AS recipient_first_name, da.last_name AS recipient_last_name, da.address AS recipient_address,
            da.address_bis AS recipient_address_bis, da.zipcode AS recipient_zipcode, da.city AS recipient_city, da.phone AS recipient_phone, da.gender AS recipient_gender")
                ->join("ordered_product AS op", "$this->table.$this->primaryKey = op.ordered_id", "inner")
                ->join("delivery_address AS da", "$this->table.$this->primaryKey = da.ordered_id", "left")
                ->join("product AS p", "op.product_id = p.id", "left")
            ->join("categorie AS cat", "p.categorie_id = cat.id", "inner");
            $dbQuery->where("$this->table.$this->primaryKey", $id);
            return $dbQuery->get()->getResultObject();
        } else {
            $dbQuery->select("$this->table.*, g.short_description, cust.name AS customer_first_name, cust.surname AS customer_last_name, cust.society_name AS customer_society_name");
        }
        if (!empty($data)) {
            $dbQuery->where($data);
        }
        return $dbQuery->get()->getResultObject();
    }


}