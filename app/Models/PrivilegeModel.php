<?php

namespace App\Models;
use CodeIgniter\Model;


class PrivilegeModel extends Model {

    protected $DBGroup = 'default';

    protected $table = 'privileges';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['role'];
    protected $createdField = null;
    protected $updatedField = null;

    public function getPrivilege($id = null){
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