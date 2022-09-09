<?php

namespace App\Controllers;
use App\Models\MessageModel;

class Messages extends AdminController{

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
}