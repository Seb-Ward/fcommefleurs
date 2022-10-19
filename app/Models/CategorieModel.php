<?php

namespace App\Models;

use CodeIgniter\Model;

class CategorieModel extends Model {
    protected $DBGroup = 'default';

    protected $table = 'categorie';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['name'];
    protected $createdField = null;
    protected $updatedField = null;

    function insertCategorie($data){
        $dbQuery = $this->db->table($this->table);
        if (!$dbQuery->insert($data)) {
            return false;
        }
        return $this->db->insertID();
    }

    function updateCategorie($id, $data){
        $dbQuery = $this->db->table($this->table);
        return $dbQuery->update($data, array($this->primaryKey => $id));
    }

    function deleteCategorie($id){
        $dbQuery = $this->db->table($this->table);
        return $dbQuery->delete(array($this->primaryKey => $id));
    }

    function getCategorie($id = null){
        $dbQuery = $this->db->table($this->table);
        if ($id != null) {
            $dbQuery->where($this->primaryKey, $id);
            return $dbQuery->get()->getRowObject();
        }
        return $dbQuery->orderBy("name", "DESC")->get()->getResultObject();
    }
}