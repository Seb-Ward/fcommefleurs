<?php

namespace App\Models;
use CodeIgniter\Model;


class ParentModel extends Model {

    protected $DBGroup = 'default';

    protected $table = null;
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [];
    protected $createdField = null;
    protected $updatedField = null;

    function insertData($data) {
        $dbQuery = $this->db->table($this->table);
        if (!$dbQuery->insert($data)) {
            return false;
        }
        return $this->db->insertID();
    }

    function updateData($id, $data) {
        $dbQuery = $this->db->table($this->table);
        return $dbQuery->update($data, array($this->primaryKey => $id));
    }

    function deleteData($id) {
        $dbQuery = $this->db->table($this->table);
        return $dbQuery->delete(array($this->primaryKey => $id));
    }

    function getData($id = null, $where = array(), $select = "*", $joinList = array(), $orderBy = array()) {
        $dbQuery = $this->db->table($this->table);
        $dbQuery->select($select);
        if (!empty($joinList)) {
            foreach ($joinList as $join) {
                if (isset($join['table']) && isset($join['cond']) && isset($join['type'])) {
                    $dbQuery->join($join['table'], $join['cond'], $join['type']);
                }
            }
        }
        if ($id != null) {
            return $dbQuery->where($this->table.$this->primaryKey, $id)->get()->getRowObject();
        } elseif (!empty($where)) {
            $dbQuery->where($where);
        }
        if (!empty($orderBy)) {
            foreach ($orderBy as $field => $direction) {
                $dbQuery->orderBy($field, $direction);
            }
        }
        return $dbQuery->get()->getResultObject();
    }
}