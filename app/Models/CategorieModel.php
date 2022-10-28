<?php

namespace App\Models;


class CategorieModel extends ParentModel {
    protected $table = 'categorie';
    protected $allowedFields = ['name'];
}