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
    $message->setMessage_id($item['message_id']);
    $message->setMessage_nom_expediteur($item['message_nom_expediteur']);
    $message->setMessage_email_expediteur($item['message_email_expediteur']);
    $message->setMessage_genre_expediteur($item['message_genre_expediteur']);
    $message->setMessage_telephone_expediteur($item['message_telephone_expediteur']);
    $message->setMessage_text_expediteur($item['message_text_expediteur']);
    return $message;
}

?>