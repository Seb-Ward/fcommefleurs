<?php

namespace App\Models;
use CodeIgniter\Model;

 
class ProductModel extends Model {

        protected $DBGroup = 'testing';

        protected $table = 'product';
        protected $primaryKey = 'id';
        protected $returnType = 'array';
        protected $allowedFields = ['name','description','price','taxe_id','image_id','publish_home_page','publish_shop_page'];
        protected $createdField = null;
        protected $updatedField = null;



  function insertProduct($data){
        $this->db->table($this->table)->insert($data);//new way to insert a product in the data base
        return $this->db->insertID();
  }      
  function updateProduct($data){
        $this->db->table($this->table)->update($data);//new way to update a product in the data base
  }  
  function deleteProduct($data){
        $this->db->table($this->table)->delete($data);//new way to delete a product in the data base
  }  
  
  function getProduct($id = null){
        $dbQuery = $this->db->table($this->table);
          if ($id != null) {
                  $dbQuery->where($this->primaryKey, $id);
          }
          return $dbQuery->select("*")
                ->join("taxe","product.taxe_id=taxe.id")
                ->join("image","product.image_id=image.id")->get()->getResultArray();


  }
}
