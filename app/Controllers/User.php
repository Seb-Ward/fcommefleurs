<?php

namespace App\Controllers;
use App\Models\UserModel;

class User extends AdminController
{

    public function index()
    {
        $this->customer();
    }

    public function customer($id = null)
    {
        helper('user');
        $userModel = new UserModel();
        $userList = $userModel->getUser($id, array("admin" => null));

        $this->data['title'] = "Liste des utilisateurs";
        $this->data['page'] = "customer_list";

        $this->data['content'] = view('admin/customer_list', array(
            "customer_list" => $userList
        ));
        return view('application', $this->data);
    }

    public function admin($id = null)
    {
        helper('user');
        $userModel = new UserModel();
        $adminList = $userModel->getUser($id, array("admin" => 1));

        $this->data['title'] = "Liste des administrateurs";
        $this->data['page'] = "admin_list";

        $this->data['content'] = view('admin/admin_list', array(
            "admin_list" => $adminList
        ));
        return view('application', $this->data);
    }
}
