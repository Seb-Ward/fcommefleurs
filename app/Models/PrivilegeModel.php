<?php

namespace App\Models;


class PrivilegeModel extends ParentModel {
    protected $table = 'privileges';
    protected $allowedFields = ['role'];
}