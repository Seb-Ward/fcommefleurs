<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\PrivilegeModel;

class Admin extends BaseController {

    private $select = "admin.*, privileges.role";

    private $join = array(
        array("table" => "privileges", "cond" => "privileges_id = privileges.id", "type" => "inner")
    );

    public function index() {
        if (!$this->isAdminConnected()) {
            return redirect()->to("/connection/");
        }
        helper("admin");
        $adminModel = new AdminModel();
        $adminList = transformItemsToObjects($adminModel->getData(null, null, $this->select, $this->join));
        $this->data['title'] = "Gestion des administrateurs";
        $this->data['page'] = "admin_list";

        $this->data['content'] = view('admin/admin_list',array(
            "admin_list" => $adminList
        ));
        return view('application', $this->data);
    }

    public function create() {
        if (!$this->isAdminConnected()) {
            return redirect()->to("/connection/");
        }
        $this->data['title'] = "Création d'un administrateur";
        $this->data['page'] = "new_admin";
        $privilegeModel = new PrivilegeModel();
        $this->data['content'] = view('admin/new_admin', array(
            "privilege_list" => $privilegeModel->getData()
        ));
        return view('application', $this->data);
    }

    public function profil($id) {
        if (!$this->isAdminConnected()) {
            return redirect()->to("/connection/");
        }
        $this->data['title'] = "Profil administrateur";
        $this->data['page'] = "profil_admin";
        helper("admin");
        $privilegeModel = new PrivilegeModel();
        $adminModel = new AdminModel();
        $this->data['content'] = view('admin/profil_admin', array(
            "admin_info" => transformItemToObject($adminModel->getData($id, null, $this->select, $this->join)),
            "privilege_list" => $privilegeModel->getData()
        ));
        return view('application', $this->data);
    }
}