<?php

namespace App\Models;
use CodeIgniter\Model;

 
class AdminModel extends Model {

        protected $DBGroup = 'default';

        protected $table = 'admin';
        protected $primaryKey = 'id';
        protected $returnType = 'array';
        protected $allowedFields = ['name','surname','nickname', 'reset_password', 'privileges_id', 'actif'];
        protected $createdField = null;
        protected $updatedField = null;

        public function getAdmin($id=null,$data=array()){
            $dbQuery = $this->db->table($this->table);
            $dbQuery->select("admin.*, privileges.role")
                    ->join('privileges', "privileges_id = privileges.id", "inner");
            if ($id != null) {
                return $dbQuery->where($this->primaryKey, $id)
                               ->get()
                               ->getRowObject();
            } else if (!empty($data)) {
                foreach ($data as $key => $value) {
                    $dbQuery->where($key, $value);
                }
            }
            return $dbQuery->get()->getResultObject();
        }

        public function update_password($id, $password) {
            $dbQuery = $this->db->table($this->table);
            return $dbQuery->update(array('password' => $password, 'reset_password' => false), array($this->primaryKey => $id));
        }
}