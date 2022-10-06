<?php

namespace App\Models;
use CodeIgniter\Model;

 
class ImageModel extends Model {

    protected $DBGroup = 'default';

    protected $table = 'image';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['name','size','type','product_id','bin'];
    protected $createdField = null;
    protected $updatedField = null;

    function insertImage($data){
        $dbQuery = $this->db->table($this->table);
        return $dbQuery->insert($data);
    }

    function updateImage($id, $data){
        $dbQuery = $this->db->table($this->table);
        return $dbQuery->update($data, array($this->primaryKey => $id));
    }

    function deleteImage($id){
        $dbQuery = $this->db->table($this->table);
        return $dbQuery->delete(array($this->primaryKey => $id));
    }

    function getImage($id = null, $data = array()){
        $dbQuery = $this->db->table($this->table);
        $dbQuery->select("*");
        if ($id != null) {
            $dbQuery->where("$this->table.$this->primaryKey", $id);
            return $dbQuery->get()->getRowObject();
        } else if (!empty($data)) {
            $dbQuery->where($data);
        }
        return $dbQuery->get()->getResultObject();
    }
}
