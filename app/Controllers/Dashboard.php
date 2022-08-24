<?php

namespace App\Controllers;
use App\Models\ProduitModel;


class Dashboard extends BaseController
{
    public function index()
    {
        $user = $this->session->get('user');
        $isAdmin= $user != null && $user->admin == 1;
        $data = array(
            'title' => "Dashboard",
            'page'=>"dashboard",
            'content' => view(($isAdmin?"admin":"customer").'/dashboard', array()),
            'connected' => $user != null,
            'admin' => $isAdmin,
        );
        return view('application', $data);
    }
}