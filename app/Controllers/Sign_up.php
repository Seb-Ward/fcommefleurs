<?php

namespace App\Controllers;

class Sign_up extends BaseController
{

    public function index() {
        if ($this->data['connected']) {
            return redirect()->to('/home');
        }
        $this->data['title'] = "S'inscrire";
        $this->data['page'] = "sign_up";
        $this->data['content'] = view('sign_up');
        return view('application', $this->data);
    }       

    public function save_customer() {

        
        echo json_encode($this->ajax_response);
    }
}
