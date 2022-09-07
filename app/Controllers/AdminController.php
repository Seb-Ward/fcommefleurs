<?php

namespace App\Controllers;

class AdminController extends BaseController{

    public function index()
    {
        if ($this->user == null || $this->user->admin != 1) {
            return redirect()->to('/connexion');
        } 
    }
}