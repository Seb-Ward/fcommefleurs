<?php
use App\Entities\Message;

function transformItemsToObjects($items){
    $objectlist = array();
    foreach ($items as $item){
        $objectlist[]=transformItemToObject($item);
    }
    return  $objectlist;
}

function transformItemToObject($item){
    $message = new Message();
    $message->setId($item->id);
    $message->setName_sender($item->name_sender);
    $message->setEmail_sender($item->email_sender);
    $message->setPhone_sender($item->phone_sender);
    $message->setText_sender($item->text_sender);
    return $message;
}

?>