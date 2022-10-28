<?php

namespace App\Models;


class MessageModel extends ParentModel {
    protected $table = 'message';
    protected $allowedFields = ['name_sender','email_sender','text_sender'];
}