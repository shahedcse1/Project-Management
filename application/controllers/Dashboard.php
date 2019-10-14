<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common');
    }
    public function index()
    {
        if (!in_array($this->session->userdata('user_role'), $this->common->meritsRole())) {
            redirect('auth/logout');
        }
        $data['title'] = 'Dashboard';
        $data['menu'] = 'dashboard';
        //task status individually count
        $data['progress'] =$this->common->countTotal('1');
        $data['complete'] = $this->common->countTotal('2');
        $data['closed'] = $this->common->countTotal('3');
        $data['total'] = $this->common->countTotal();
        //active and inactive task
        $data['activeTask'] = $this->common->countData('task','1')->total;
        $data['inactiveTask'] = $this->common->countData('task','2')->total;
        //total project ,active and inactive project
        $data['project'] = $this->common->countData('project');
        $data['activeProject'] = $this->common->countData('project','1')->total;
        $data['inactiveProject'] = $this->common->countData('project','2')->total;
        //total user ,active and inactive users
        $data['users'] = $this->common->countData('users');
        $data['activeUsers'] = $this->common->countData('users','1')->total;
        $data['inactiveUsers'] = $this->common->countData('users','2')->total;
        add_asset("css", "common.css");

         //add asset
        add_assets('js', [
            'flot.bundle.js',
            'justgage/raphael-2.1.4.min.js',
            'justgage/justgage.js'

        ]);
        $this->load->view('common/header',$data);
        $this->load->view('common/sidebar',$data);
        $this->load->view('dashboard',$data);
        $this->load->view('common/footer',$data);
        $this->load->view('chart',$data);
    }

}
