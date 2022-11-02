<?php

namespace App\Controllers;

use App\Models\Captcha;

class Captcha extends CI_Controller {

    public function _construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('captcha_models');
    }

    function application()
    {
        $this->load->view('captcha')
    }

    function validate()
    {
        $captcha_response = trim($this->input->post('g-recaptcha-response'));

        if($captcha_response !='')
        {
            $keySecret='';
            $check=array(
                secret => $keySecret
            )
        }
        else 
        {
            $this->session->set_flashdata('message','Validation échoué, ré-essayez');

            redirect('captcha');
        }
    }

}