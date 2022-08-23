<?php
use App\Entities\Produit;
use App\Entities\Taxe;
use App\Entities\Image;


function transformItemsToObjects($items){
    $objectlist=array();
    foreach($items as $item){
            $objectlist[]=transformItemToObject($item);
        }
    return  $objectlist;
}
function transformItemToObject($item){
   $taxe=new Taxe();
   $taxe->setId($item['taxe_id']);
   $taxe->setDescription($item['taxe_description']);
   $taxe->setPourcentage($item['taxe_pourcentage']);

   $image=new Image();
   $image->setImage_id($item['image_id']);
   $image->setImage_nom($item['image_nom']);
   $image->setImage_taille($item['image_taille']);
   $image->setImage_type($item['image_type']);
   $image->setImage_bin($item['image_bin']);

    $produit=new Produit();
    $produit->setProduit_id($item['produit_id']);
    $produit->setProduit_nom($item['produit_nom']);
    $produit->setProduit_description($item['produit_description']);
    $produit->setProduit_prix($item['produit_prix']);
    $produit->setTaxe($taxe);
    $produit->setImage($image);
    $produit->setProduit_publish_accueil($item['produit_publish_accueil']);
    $produit->setProduit_publish_boutique($item['produit_publish_boutique']);

    return $produit;
}

?>