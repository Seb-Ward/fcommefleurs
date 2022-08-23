<?php

namespace App\Controllers;

class Contact extends BaseController
{
    public function index()
    {

        $user = $this->session->get('user');
        $data = array(
            'title' => "Nous contacter",
            'page'=>"contact",
            'content' => view('contact', array("user"=>$user)),
            'connected' => $user != null,
            'admin' => $user != null && $user->admin == 1  );
        return view('application', $data);
    }
}
