<?php

namespace App\Models;

 
class ProductModel extends ParentModel {

    protected $table = 'product';
    protected $allowedFields = ['name','description','price','tax_id', 'quantity', 'categorie_id', 'home_page'];

    function getProduct($id = null, $data = array()){
        $dbQuery = $this->db->table($this->table);
        $dbQuery->select("product.*, tax.description AS tax_description, tax.percentage, categorie.name AS categorie_name,
                image.id AS image_id, image.name AS image_name, image.size AS image_size, image.type AS image_type, image.bin AS image_bin")
            ->join("tax","product.tax_id = tax.id",  "inner")
            ->join("image","product.id = image.product_id", "left")
            ->join("categorie", "categorie.id = product.categorie_id", "inner");
        if ($id != null) {
            $dbQuery->where("$this->table.$this->primaryKey", $id);
            return $dbQuery->get()->getResultObject();
        } else if (!empty($data)) {
            $dbQuery->where($data);
        }
        return $dbQuery->get()->getResultObject();
    }
}
