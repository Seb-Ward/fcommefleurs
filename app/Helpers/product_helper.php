<?php

use App\Entities\Categorie;
use App\Entities\Product;
use App\Entities\Tax;
use App\Entities\Image;

function transformItemsToObjects($items){
    $objectlist = array();
    foreach ($items as $item) {
        if (isset($objectlist[$item->id])) {
            $image_list = $objectlist[$item->id]->getImageList();
            $image_list[] = createImageObject($item);
            $objectlist[$item->id]->setImageList($image_list);
        } else {
            $objectlist[$item->id] = transformItemToObject($item);
        }
    }
    return  $objectlist;
}
function transformItemToObject($item) {
    $product = new Product();
    $product->setId($item->id);
    $product->setName($item->name);
    $product->setDescription($item->description);
    $product->setPrice($item->price);
    $product->setTax(createTaxObject($item));
    $product->setQuantity($item->quantity);
    $image_list = array();
    if (($image = createImageObject($item)) != null) {
        $image_list[] = $image;
    }
    $categorie = new Categorie();
    $categorie->setId($item->categorie_id);
    $categorie->setName($item->categorie_name);
    $product->setImageList($image_list);
    $product->setCategorie($categorie);
    $product->setHomePage($item->home_page);

    return $product;
}

function createTaxObject($item) {
    $tax = new Tax();
    $tax->setId($item->tax_id);
    $tax->setDescription($item->tax_description);
    $tax->setPercentage($item->percentage);
    return $tax;
}

function createImageObject($item) {
    if ($item->image_id == null) {
        return null;
    }
    $image = new Image();
    $image->setId($item->image_id);
    $image->setName($item->image_name);
    $image->setSize($item->image_size);
    $image->setType($item->image_type);
    $image->setBin($item->image_bin);
    return $image;
}

?>