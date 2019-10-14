<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common');
    }

    public function create()
    {
        if (!in_array($this->session->userdata('user_role'), $this->common->meritsRole())) {
            redirect('auth/logout');
        }
       //create USer Add form
        $data['title'] = 'User Add';
        $data['menu'] = 'admin';
        $data['submenu'] = 'userManage';
        //get all userrole
        $data['userrole'] = $this->common->viewAll('userrole');

        /** Assets */
        add_asset("css", "common.css");
        add_assets('js', [
            'user.js'
        ]);

        $this->load->view('common/header', $data);
        $this->load->view('common/sidebar', $data);
        $this->load->view('admin/add', $data);
        $this->load->view('common/footer', $data);
    }

    public function add()
    {
        if (!in_array($this->session->userdata('user_role'), $this->common->meritsRole())) {
            redirect('auth/logout');
        }
        $post['user_pin'] = $this->input->post('userPin');
        if ($this->common->checkpin($post['user_pin'])) {
            return;
        }

        $createDate = date('Y-m-d H:i:s');
        $user_pin = $this->session->userdata('user_pin');
        /**prepare hash Password */
        $password = $this->input->post('password');
        $random_salt = bin2hex(openssl_random_pseudo_bytes(16));
        $prependwithpass = $random_salt . $password;
        $hass_password = hash('sha256', $prependwithpass);
        /** set post data for add into database*/
        $post['random_salt'] = $random_salt;
        $post['password'] = $hass_password;
        $post['name'] = $this->input->post('userName');
        $post['user_pin'] = $this->input->post('userPin');
        $post['status'] = $this->input->post('status');
        $post['role'] = $this->input->post('userRole');
        $post['phone'] = $this->input->post('mobile');
        $post['email'] = $this->input->post('email');
        $post['created_date'] = $createDate;
        $post['created_by'] = $user_pin;
     // image validation
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imgFile = $_FILES['fileToUpload']['name'];

        if (empty($imgFile)) :
            $post['image_path'] = 'login.png';
        else:
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) :
                $post['image_path'] = basename($_FILES["fileToUpload"]["name"]);
            else:
                $data['error'] = "Sorry, there was an error uploading your file";
            endif;
        endif;


    //USer Add
        $addUser = $this->common->add('users', $post);

        if ($addUser) {
            $this->session->set_userdata('add', 'Add User successfully');
        }

        /** Assets */
        add_asset("css", "common.css");
        add_assets('js', [
            'user.js'
        ]);

    }

    public function view()
    {
        if (!in_array($this->session->userdata('user_role'), $this->common->meritsRole())) {
            redirect('auth/logout');
        }

        $data['title'] = 'User View';
        $data['menu'] = 'admin';
        $data['submenu'] = 'userView';
            //view user
        $data['userList'] = $this->common->getusers('users');

        add_asset("css", "common.css");
        add_asset("css", "jquery.dataTables.min.css");
        add_assets('js', [
            'jquery.dataTables.min.js',
            'datatable.js',
            'user.js',
        ]);


        $this->load->view('common/header', $data);
        $this->load->view('common/sidebar', $data);
        $this->load->view('admin/view', $data);
        $this->load->view('common/footer', $data);
    }

    public function edit()
    {
        if (!in_array($this->session->userdata('user_role'), $this->common->meritsRole())) {
            redirect('auth/logout');
        }

        $id = $this->input->post('id');
        $output = $this->common->edit('users', $id, 'id');
        //edit user set data
        $data['name'] = $output->name;
        $data['password'] = $output->password;
        $data['phone'] = $output->phone;
        $data['role_id'] = $output->role;
        $data['image_path'] = $output->image_path;
        $data['status'] = $output->status;
        $data['user_pin'] = $output->user_pin;
        $data['email'] = $output->email;
        //all userrole
        $data['userrole'] = $this->common->viewAll('userrole');

        echo json_encode($data);

    }

    public function update()
    {

        if (in_array($this->session->userdata('user_role'), array(1, 2, 3))) :

            $id = $this->input->post('id');
            $createDate = date('Y-m-d H:i:s');
            $post['name'] = $this->input->post('userName');
            $post['user_pin'] = $this->input->post('userPin');
            $post['status'] = $this->input->post('status');
            $post['role'] = $this->input->post('userRole');
            $post['phone'] = $this->input->post('mobile');
            $post['email'] = $this->input->post('email');
            $post['created_date'] = $createDate;
            $user_pin = $this->session->userdata('user_pin');
            $post['created_by'] = $user_pin;
            //image validation
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
            //update user
            $update = $this->common->update('users', $id, $post);
            if ($update):
                $this->session->set_userdata('edit', 'User edit Successfully');
            else:
                $this->session->set_userdata('notadd', 'Failed to edit user');
            endif;

            redirect('admin/view');
        else :
            redirect('auth');
        endif;
    }


    public function checkPin()
    {
        //check pin is valid or not
        $userPin = $this->input->post('userPin');
        $userQuery = $this->db
            ->select('user_pin')
            ->from('users')
            ->where('user_pin', $userPin)
            ->get();

        echo $userQuery->num_rows() ? false : true;
    }


    public function checkPinEdit()
    {
        if (!in_array($this->session->userdata('user_role'), $this->common->meritsRole())) {
            redirect('auth/logout');
        }
        $userPin = $this->input->post('userPin');
        $userId = $this->input->post('userId');
     //check pin is valid or not in edit
        $userQuery = $this->db
            ->select('user_pin')
            ->from('users')
            ->where('user_pin', $userPin)
            ->where('id <>', $userId)
            ->get();

        echo $userQuery->num_rows() ? false : true;
    }

    public function passwordChange()
    {
        $userid = (int)$this->input->post('id');
        $password = $this->input->post('password');

        //password change encrytion using random salt using SHA256
        $random_salt = bin2hex(openssl_random_pseudo_bytes(16));
        $prependwithpass = $random_salt . $password;
        $hass_password = hash('sha256', $prependwithpass);
        $update = [
            'random_salt' => $random_salt,
            'password' => $hass_password
        ];

        $updatePass = $this->common->update('users', $userid, $update);

        if ($updatePass) {
            $this->session->set_userdata('updatePassword', 'Password update successfully');
        }

        redirect('admin/view');
    }

    public function delete()
    {
     //delete user
        $id = (int)$this->input->post('id');
        $delete = $this->common->delete('users', $id);
    }

}
