<?php

namespace App\Models;


class GenderModel extends ParentModel {
    protected $table = 'gender';
    protected $allowedFields = ['short_description', 'long_description'];
}