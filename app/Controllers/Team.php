<?php

namespace App\Controllers;

class Team extends BaseController
{
    public function index()
    {
        $this->data['title'] = "L'équipe";
        $this->data['page'] = "team";
        $this->data['content'] = view('team');
        return view('application', $this->data);
    }
}