<?php

namespace App\Controllers;


class Dashboard extends AdminController
{

    public function index()
    {
        $this->data['title'] = "Dashboard";
        $this->data['page'] = "dashboard";
        $this->data['content'] = view(($this->data['admin'] ? "admin" : "customer") . '/dashboard', array());
        return view('application', $this->data);
    }
}