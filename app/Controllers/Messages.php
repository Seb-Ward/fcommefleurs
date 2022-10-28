<?php

namespace App\Controllers;
use App\Models\MessageModel;

class Messages extends BaseController{

    public function index(){
        
        helper('message');
        $messagesModel=new MessageModel();
        $messagesList=transformItemsToObjects($messagesModel->getMessage());    
        $this->data['title'] = "Messages";
        $this->data['page'] = "messages_list";
        $this->data['content'] = view('admin/messages_list',array(
            "message_list" =>$messagesList
        ));
        return view('application', $this->data);
    }
    public function delete($id){
        $messageModel=new MessageModel();
        $messageModel->deleteMessage(array('message_id'=>$id));
        return redirect()->to('/messages');
    }
    public function add(){
                    
        $messagesModel=new MessageModel();
        $postParam = $this->request->getPost();
        if (isset($postParam['last_name']) && (isset($postParam['first_name']) && isset($postParam['email']) && isset($postParam['message']) && !empty($postParam['last_name']) && !empty($postParam['first_name']) && !empty($postParam['email']) && !empty($postParam['message']))){
            $data = array(
                "name_sender" => strtoupper($postParam['last_name']) . " ". ucfirst($postParam['first_name']),
                "email_sender" => $postParam['email'], 
                "text_sender" => $postParam['message'], 
            ); 
            if (!$messagesModel->insertMessage($data)){
                $this->ajax_response['message'] = "Une erreur à été rencontré lors de l'ajout du message, veuillez contacter le support.";
            } else {
                $this->ajax_response['success'] = true;
            }
        }
        return json_encode($this->ajax_response);
    }
}