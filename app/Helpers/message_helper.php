<?php
use App\Entities\Message;


function transformItemsToObjects($items){
    $objectlist=array();
    foreach($items as $item){
            $objectlist[]=transformItemToObject($item);
        }
    return  $objectlist;
}

function transformItemToObject($item){
    $message=new Message();

    $message->setMessage_id($item['message_id']);
    $message->setMessage_nom_expediteur($item['message_nom']);
    $message->setMessage_email_expediteur($item['message_description']);
    $message->setMessage_genre_expediteur($item['message_prix']);
    $message->setMessage_telephone_expediteur($item['message_publish_accueil']);
    $message->setMessage_text_expediteur($item['message_publish_boutique']);

    return $message;
}

?>