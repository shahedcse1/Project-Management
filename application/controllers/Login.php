<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('common');
    }

    public function index()
    {

        //if user is valid than login or  redirect to dashboard
        if ($this->session->userdata('user_role') != NULL && $this->session->userdata('user_pin') != NULL) {
            redirect('dashboard');
        } else {
            $data['title'] = 'User Login';
            $data['userrole'] = $this->common->viewuser('userrole','1');
            /** Rendering Views */
            $this->load->view('login', $data);
        }
    }

}
