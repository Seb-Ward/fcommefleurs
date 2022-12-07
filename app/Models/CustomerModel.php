<?php

namespace App\Models;

class CustomerModel extends ParentModel {
    protected $table = 'customer';
    protected $allowedFields = ['gender_id', 'society_name', 'name', 'surname', 'email', 'phone', 'address', 'address_bis', 'zipcode', 'city', 'reset_password'];

    public function update_password($id, $password) {
        $dbQuery = $this->db->table($this->table);
        return $dbQuery->update(array('password' => $password, 'reset_password' => null), array($this->primaryKey => $id));
    }
}