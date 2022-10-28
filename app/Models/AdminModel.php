<?php

namespace App\Models;

 
class AdminModel extends ParentModel {

        protected $table = 'admin';
        protected $allowedFields = ['name','surname','nickname', 'reset_password', 'privileges_id', 'actif'];

        public function update_password($id, $password) {
            $dbQuery = $this->db->table($this->table);
            return $dbQuery->update(array('password' => $password, 'reset_password' => false), array($this->primaryKey => $id));
        }
}