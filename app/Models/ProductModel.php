<?php

namespace App\Models;
use CodeIgniter\Model;

 
class ProductModel extends Model {

    protected $DBGroup = 'default';

    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['name','description','price','tax_id', 'quantity', 'trendy_collection','monthly_offer'];
    protected $createdField = null;
    protected $updatedField = null;

    function insertProduct($data){
        $dbQuery = $this->db->table($this->table);
        if (!$dbQuery->insert($data)) {
            return false;
        }
        return $this->db->insertID();
    }

    function updateProduct($id, $data){
        $dbQuery = $this->db->table($this->table);
        return $dbQuery->update($data, array($this->primaryKey => $id));
    }

    function deleteProduct($id){
        $dbQuery = $this->db->table($this->table);
        return $dbQuery->delete(array($this->primaryKey => $id));
    }

    function getProduct($id = null, $data = array(), $limit = null){
        $dbQuery = $this->db->table($this->table);
        $dbQuery->select("product.*, tax.description AS tax_description, tax.percentage, image.id AS image_id,
                image.name AS image_name, image.size AS image_size, image.type AS image_type, image.bin AS image_bin")
            ->join("tax","product.tax_id = tax.id",  "inner")
            ->join("image","product.id = image.product_id", "left");
        if ($id != null) {
            $dbQuery->where("$this->table.$this->primaryKey", $id);
            return $dbQuery->get()->getRowObject();
        } else if (!empty($data)) {
            $dbQuery->where($data);
        }
        return $dbQuery->get()->getResultObject();
    }
}
