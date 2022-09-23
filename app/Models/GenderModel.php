<?php

namespace App\Models;
use CodeIgniter\Model;


class GenderModel extends Model {

    protected $DBGroup = 'default';

    protected $table = 'gender';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['short_description', 'long_description'];
    protected $createdField = null;
    protected $updatedField = null;

    public function getGender($id = null){
        $dbQuery = $this->db->table($this->table);
        $dbQuery->select("*");
        if ($id != null) {
            return $dbQuery->where($this->primaryKey, $id)
                ->get()
                ->getRowObject();
        }
        return $dbQuery->get()->getResultObject();
    }
}