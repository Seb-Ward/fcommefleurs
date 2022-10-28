<?php

namespace App\Models;
use CodeIgniter\Model;

 
class MessageModel extends Model {

        protected $DBGroup = 'default';

        protected $table = 'message';
        protected $primaryKey = 'id';
        protected $returnType = 'array';
        protected $allowedFields = ['name_sender','email_sender','text_sender'];
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