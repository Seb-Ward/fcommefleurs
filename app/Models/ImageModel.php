<?php

namespace App\Models;

 
class ImageModel extends ParentModel {
    protected $table = 'image';
    protected $allowedFields = ['name','size','type','product_id','bin'];
}
