<?php

namespace App\Models;
use CodeIgniter\Model;

 
class MessageModel extends Model {

        protected $DBGroup = 'testing';

        protected $table = 'message';
        protected $primaryKey = 'message_id';
        protected $returnType = 'array';
        protected $allowedFields = ['message_nom_expediteur','message_genre_expediteur','message_email_expediteur','message_telephone_expediteur','message_text_expediteur'];
        protected $createdField = null;
        protected $updatedField = null;



  function insertMessage($data){
        $this->db->table($this->table)->insert($data);//new way to insert a product in the data base
        return $this->db->insertID();
  }      
  
  function deleteMessage($data){
        $this->db->table($this->table)->delete($data);//new way to delete a product in the data base
  }  
  
  function getMessage($id = null){
        $dbQuery = $this->db->table($this->table);
          if ($id != null) {
                  $dbQuery->where('message_id', $id);
          }
          return $dbQuery->select("*")
                ->get()->getResultArray();


  }
}