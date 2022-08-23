<?php

namespace App\Models;
use CodeIgniter\Model;

 
class UserModel extends Model {

        protected $DBGroup = 'default';

        protected $table = 'user';
        protected $primaryKey = 'user_id';
        protected $returnType = 'array';
        protected $allowedFields = ['nom','prenom','email','admin'];
        protected $createdField = null;
        protected $updatedField = null;

        public function getUser($id=null,$data=array()){
            $dbQuery = $this->db->table($this->table);
            if ($id != null) {
                $dbQuery->where('user_id', $id);
            } else if (!empty($data)) {
                foreach ($data as $key => $value) {
                    $dbQuery->where($key, $value);
                }
            }
            return $dbQuery->select("*")->get()->getRowObject();

        }

}