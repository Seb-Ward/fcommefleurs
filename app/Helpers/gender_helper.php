<?php
use App\Entities\Gender;

function transformItemsToObjects($items){
    $objectlist = array();
    foreach ($items as $item){
        $objectlist[]=transformItemToObject($item);
    }
    return  $objectlist;
}

function transformItemToObject($item){
    $gender = new Gender();
    $gender->setId($item->id);
    $gender->setShortDescription($item->short_description);
    $gender->setLongDescription($item->long_description);
    return $gender;
}

?>