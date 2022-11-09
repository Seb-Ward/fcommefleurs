<?php

namespace App\Controllers;

class Recaptcha extends BaseController {

    public function _construct()
    {
        $this->load->model('captcha_models');
    }

    function application()
    {
        $this->load->view('captcha');
    }

    function validateCaptcha()
    {
        $postParam = $this->request->getPost();
        if(!empty($postParam) && !empty($postParam['token']))
        {
            $data = array(
                'last_name' => $postParam['last_name'],
                'first_name' => $postParam['first_name'],
                'email' => $postParam['email'],
                'message' => $postParam['message']
            );
            
            $this->ajax_response['success'] = true;
            $this->ajax_response['data'] = $data;
        } else {
            $this->ajax_response['message'] = "Le token est manquant, veuillez ré-essayer";
        }
        echo json_encode($this->ajax_response);
    }

}