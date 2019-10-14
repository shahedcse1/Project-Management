<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common');
    }

    function index() {

        if ($this->session->userdata('user_role') != NULL && $this->session->userdata('user_pin') != NULL):

            if ($this->session->userdata('user_role') == '3'):
                redirect('task/view');
            else:
                redirect('dashboard');
            endif;

        else:
            redirect('login');
        endif;
    }

    function login() {
        $this->form_validation->set_rules('useremail', 'useremail', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $uname = $this->input->post('useremail');
        if ($this->form_validation->run() == FALSE):
            $this->session->set_userdata('login_error', 'Please Enter User Email & Password correctly');
            redirect('login');
        else:
            $upass = $this->input->post('password');
            $userstatus = 1;
            $data['name'] = $uname;
            $queryResult = $this->common->login($data);

            if ($queryResult) :
                $userdbstatus = $queryResult->status;
                $this->session->set_userdata('userid', $queryResult->id);
                $this->session->set_userdata('user_name', $queryResult->name);
                $this->session->set_userdata('image_path', $queryResult->image_path);
                //hash password convert
                $random_salt = $queryResult->random_salt;
                $db_hashpass = $queryResult->password;
                $prependwithpass = $random_salt . $upass;
                $hass_password = hash('sha256', $prependwithpass);
                //
                if ($userdbstatus == $userstatus && $hass_password == $db_hashpass):
                    $this->session->set_userdata('user_pin', $queryResult->user_pin);
                    $this->session->set_userdata("user_role", $queryResult->role);
                    redirect('auth');
                else:
                    $this->session->set_userdata('login_error', 'Please Check User email & Password.');

                    redirect('login');
                endif;
            else:
                $this->session->set_userdata('login_error', 'Not a Valid Email.');
                redirect('login');
            endif;
        endif;
    }

    public function signUp() {
        $createDate = date('Y-m-d H:i:s');

        /*         * prepare hash Password */
        $password = $this->input->post('password');
        $random_salt = bin2hex(openssl_random_pseudo_bytes(16));
        $prependwithpass = $random_salt . $password;
        $hass_password = hash('sha256', $prependwithpass);
        /** set post data for add into database */
        $post['random_salt'] = $random_salt;
        $post['password'] = $hass_password;
        $post['name'] = $this->input->post('userName');
        $post['user_pin'] = $this->input->post('userPin');
        $post['phone'] = $this->input->post('phone');
        $post['status'] = 1;
        $post['role'] = 3;
        $post['created_date'] = $createDate;
        $post['created_by'] = $this->input->post('userPin');

        //USer Add
        $addUser = $this->common->add('users', $post);

        if ($addUser) {
            $this->session->set_userdata('sign_up', 'Sign Up successfully');
        }
    }

    function changePassword() {
        if (!in_array($this->session->userdata('user_role'), $this->common->meritsRole())) {
            redirect('auth/logout');
        }
        $data['base_url'] = $this->config->item('base_url');
        $data['title'] = 'Change Password';
        $data['active_menu'] = '';
        $data['active_sub_menu'] = '';
        $this->load->view('common/header', $data);
        $this->load->view('common/sidebar', $data);
        $this->load->view('User_Information/changePassword');
        $this->load->view('common/footer', $data);
    }

    function updatePass() {

        if (!in_array($this->session->userdata('user_role'), $this->common->meritsRole())) :


            $tablename = 'user';
            $loginname = $this->session->userdata('user_pin');
            $cpassword = $this->input->post('cpassword');
            $npassword = $this->input->post('npassword');

            $queryCheckPwd = $this->user_model->checkPassword($loginname, $tablename, $cpassword);
            if ($queryCheckPwd == TRUE) {
                //Password encrytion using random salt using SHA256
                $random_salt = bin2hex(openssl_random_pseudo_bytes(16));
                $prependwithpass = $random_salt . $npassword;
                $hass_password = hash('sha256', $prependwithpass);

                $userdata = array(
                    'random_salt' => $random_salt,
                    'password' => $hass_password
                );
                $updatestatus = $this->user_model->updateuserinfo($userdata, $loginname, $tablename);
                if ($updatestatus == TRUE) {
                    $logdetails = "User: " . $loginname . " Change Password Successfully";
                    //  savelogdata("Change Password", $logdetails);
                    $logdetails = "Change Password Successfully";
                    savelogdata("Update password", $logdetails, $this->session->userdata('user_pin'));
                    $this->session->set_userdata('successfull', 'Password updated successfully !!!');
                } else {
                    $logdetails = "User: " . $loginname . " Change Password Failed";
                    // savelogdata("Change Password", $logdetails);
                    $logdetails = "Password updated fail";
                    savelogdata("Update password", $logdetails, $this->session->userdata('user_pin'));
                    $this->session->set_userdata('failed', 'Password updated fail. Try again !!!');
                }
                redirect('Auth/changePassword');
            } else {
                $this->session->set_userdata('failed', 'Password do not match with your existing password, Please try again !!!');

                $logdetails = "Password do not match with your existing password";
                savelogdata("Update password", $logdetails, $this->session->userdata('user_pin'));
                redirect('Auth/changePassword');
            }
        else:
            $logdetails = "Password update failed";
            savelogdata("Update password", $logdetails, $this->session->userdata('user_pin'));
            redirect('auth');
        endif;
    }

    function logout() {
        if (($this->session->userdata('user_role') != NULL) && ($this->session->userdata('user_name') != NULL || $this->session->userdata('user_pin') != NULL)):

            $logdetails = "Logout successfully";

            $this->session->unset_userdata('userid');
            $this->session->unset_userdata('user_name');
            $this->session->unset_userdata('user_role');
            $this->session->unset_userdata("user_pin");
            $this->session->unset_userdata("image_path");
            $this->session->sess_destroy();
            redirect('auth');
        else:
            redirect('auth');
        endif;
    }

}
