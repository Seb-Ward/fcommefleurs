<?php
use App\Entities\Admin;
use App\Entities\Privilege;

function transformItemsToObjects($items){
    $objectlist = array();
    foreach ($items as $item){
        $objectlist[]=transformItemToObject($item);
    }
    return  $objectlist;
}

function transformItemToObject($item){
    $admin = new Admin();
    $admin->setId($item->id);
    $admin->setName($item->name);
    $admin->setSurname($item->surname);
    $admin->setNickname($item->nickname);
    $admin->setActif($item->actif);
    $admin->setResetPassword($item->reset_password);
    $admin->setPrivilege(new Privilege($item->privileges_id, $item->role));
    return $admin;
}

?>