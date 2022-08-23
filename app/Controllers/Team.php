<?php

namespace App\Controllers;

class Team extends BaseController
{
    public function index()
    {

        $user = $this->session->get('user');
        $data = array(
            'title' => "L'équipe",
            'page'=>"equipe",
            'content' => view('team'),
            'connected' => $user != null,
            'admin' => $user != null && $user->admin == 1
        );
        return view('application', $data);
    }
}