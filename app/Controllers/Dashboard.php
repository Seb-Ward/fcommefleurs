<?php

namespace App\Controllers;


class Dashboard extends BaseController
{

    public function index()
    {
        if (!$this->isAdminConnected()) {
            return redirect()->to("/connection/");
        }
        $this->data['title'] = "Dashboard";
        $this->data['page'] = "dashboard";
        $this->data['content'] = view(($this->data['admin'] ? "admin" : "customer") . '/dashboard', array());
        return view('application', $this->data);
    }
}