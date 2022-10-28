<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController {

    public function index() {
        if (!$this->isAdminConnected()) {
            return redirect()->to("/connection/");
        }
        helper("admin");
        $adminModel = new AdminModel();
        $adminList = transformItemsToObjects($adminModel->getAdmin());
        $this->data['title'] = "Gestion des administrateurs";
        $this->data['page'] = "admin_list";

        $this->data['content'] = view('admin/admin_list',array(
            "admin_list" => $adminList
        ));
        return view('application', $this->data);
    }
}