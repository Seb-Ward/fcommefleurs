<?php

namespace App\Controllers;

class Contact extends BaseController
{
    public function index()
    {
        $this->data['title'] = "Nous contacter";
        $this->data['page'] = "contact";
        $this->data['content'] = view('contact', array("user" => $this->user));
        return view('application', $this->data);
    }
}
