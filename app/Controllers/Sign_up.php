<?php

namespace App\Controllers;

use App\Models\CustomerModel;

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
        $postParam = $this->request->getPost();
        if (isset($postParam['email']) && isset($postParam['password']) && isset($postParam['confirm_password']) && !empty($postParam['email']) && !empty($postParam['password']) && !empty($postParam['confirm_password'])) {
            if ($postParam['password'] == $postParam['confirm_password']){
                $data = array(); 
                foreach ($postParam as $key => $value) {
                    if ($key != 'confirm_password' && !empty($value)) {
                        if ($key == "password") {
                            $data[$key] = password_hash($value, PASSWORD_DEFAULT);
                        } else {
                            $data[$key] = $value;
                        }
                    }
                }
                if (isset($data['address']) && (!isset($data['zipcode']) || !isset($data['city']))) {
                    $this->ajax_response['message'] = "Veuillez compléter les informations relative à l'adresse.";
                } else {
                    $customerModel=new CustomerModel();
                    if (!$customerModel->insertData($data)){
                        $this->ajax_response['message'] = "Une erreur a été rencontré lors de l'ajout du customer, veuillez contacter le support.";
                    } else {
                        $this->ajax_response['success'] = true;
                    }
                }
            }
        }
        return json_encode($this->ajax_response);
    }
}
