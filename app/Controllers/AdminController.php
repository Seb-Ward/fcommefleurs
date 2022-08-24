<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Entities\User;

class AdminController extends BaseController{

    public function index()
    {
        $user = $this->session->get('user');

        if ($user== null OR $user->admin != 1) {
            return redirect()->to('/connexion');
        } 
    }
}