<?php
/**
 * Created by PhpStorm.
 * User: Rezwana
 * Date: 11-Feb-19
 * Time: 12:12 PM
 */

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common');
    }
    public function profile()
    {
        if (!in_array($this->session->userdata('user_role'), $this->common->meritsRole())) {
            redirect('auth/logout');
        }
        $data['title'] = 'User Profile';
        $data['menu'] = 'profile';
        $data['submenu'] = 'userProfile';
        $data['title'] = 'User Profile';
        $userpin=$this->session->userdata('user_pin');
        $userid= (int)$this->common->userId($userpin)->id;
        $data['profile'] = $this->common->userInfo($userid);

        /** Assets */
        add_asset("css", "common.css");
        add_assets('js', [
            'user.js'
        ]);

        $this->load->view('common/header',$data);
        $this->load->view('common/sidebar',$data);
        $this->load->view('admin/profile',$data);
        $this->load->view('common/footer',$data);
    }

    public function personalInfo(){

        if (in_array($this->session->userdata('user_role'), array(1, 2, 3))) :

            $id = (int)$this->input->post('userid');
            $createDate = date('Y-m-d H:i:s');
            $post['name'] = $this->input->post('userName');
            $post['user_pin'] = $this->input->post('userPin');
            $post['status'] = $this->input->post('status');
            $post['phone'] = $this->input->post('mobile');
            $post['email'] = $this->input->post('email');
            $post['created_date'] = $createDate;
            $user_pin = $this->session->userdata('user_pin');
            $post['created_by'] = $user_pin;
            $update=$this->common->update('users',$id,$post);

            if($update):
                $this->session->set_userdata('personal','Personal Info Changes  Successfully');
            endif;
            redirect('profile/profile');
        else :
            redirect('auth');
        endif;
    }
    public function imageChange(){

        if (in_array($this->session->userdata('user_role'), array(1, 2, 3))) :

            $id = $this->input->post('userid');
            $createDate = date('Y-m-d H:i:s');



            $post['created_date'] = $createDate;
            $user_pin = $this->session->userdata('user_pin');
            $post['created_by'] = $user_pin;
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $imgFile = $_FILES['fileToUpload']['name'];


            if (empty($imgFile)) :
                $post = $post;
            else:
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) :
                    $post['image_path'] = basename($_FILES["fileToUpload"]["name"]);
                else:
                    $data['error'] = "Sorry, there was an error uploading your file";
                endif;
            endif;
            $image=$this->common->update('users',$id,$post);
            if($image):
                $this->session->set_userdata('imageChange','Image update Successfully');
            endif;

            redirect('profile/profile');
        else :
            redirect('auth');
        endif;
    }

    public function personalPassword()
    {
        $userid     = (int)$this->input->post('userid');
        $password = $this->input->post('new-password');

        /**
         * Password encrytion using random salt using SHA256
         */
        $random_salt = bin2hex(openssl_random_pseudo_bytes(16));
        $prependwithpass = $random_salt.$password;
        $hass_password = hash('sha256', $prependwithpass);
        $update = [
            'random_salt' => $random_salt,
            'password' => $hass_password
        ];

        $updatePass = $this->common->update('users',$userid, $update);

        if ($updatePass) {
            $this->session->set_userdata('updatePassword', 'Password update successfully');
        }

        redirect('profile/profile');
    }


}