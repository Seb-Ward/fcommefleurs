<?php

namespace App\Models;
use CodeIgniter\Model;

 
class ProduitModel extends Model {

        protected $DBGroup = 'default';

        protected $table = 'produit';
        protected $primaryKey = 'produit_id';
        protected $returnType = 'array';
        protected $allowedFields = ['produit_nom','produit_description','produit_prix','taxe_id','image_id','produit_publish_accueil','produit_publish_boutique'];
        protected $createdField = null;
        protected $updatedField = null;



  function insertProduit($data){
        $this->db->table($this->table)->insert($data);//new way to insert a product in the data base
        return $this->db->insertID();
  }      
  function updateProduit($data){
        $this->db->table($this->table)->update($data);//new way to update a product in the data base
  }  
  function deleteProduit($data){
        $this->db->table($this->table)->delete($data);//new way to delete a product in the data base
  }  
  
  function getProduit($id = null){
        $dbQuery = $this->db->table($this->table);
          if ($id != null) {
                  $dbQuery->where('produit_id', $id);
          }
          return $dbQuery->select("*")
                ->join("taxe","produit.taxe_id=taxe.taxe_id")
                ->join("image","produit.image_id=image.image_id")->get()->getResultArray();


  }
}
