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
        $join = array(
            array("table" => "privileges", "cond" => "privileges_id = privileges.id", "type" => "inner")
        );
        $adminList = transformItemsToObjects($adminModel->getData(null, null, "admin.*, privileges.role", $join));
        $this->data['title'] = "Gestion des administrateurs";
        $this->data['page'] = "admin_list";

        $this->data['content'] = view('admin/admin_list',array(
            "admin_list" => $adminList
        ));
        return view('application', $this->data);
    }
}