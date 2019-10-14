<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common');
        $this->load->model('project_model');
    }

    public function create() {
        if (!in_array($this->session->userdata('user_role'), $this->common->meritsRole())) {
            redirect('auth/logout');
        }
        $data['title'] = 'Project Add';
        $data['menu'] = 'project';
        $data['submenu'] = 'addProject';
        //all priority
        $data['priority'] = $this->common->viewAll('priority');

        /** Assets */
        add_asset("css", "common.css");
        add_assets('js', [
            'project.js'
        ]);
        $this->load->view('common/header', $data);
        $this->load->view('common/sidebar', $data);
        $this->load->view('project/add', $data);
        $this->load->view('common/footer', $data);
    }

    public function add() {
        if (!in_array($this->session->userdata('user_role'), $this->common->meritsRole())) {
            redirect('auth/logout');
        }

        //set post data for add
        $createDate = date('Y-m-d H:i:s');
        $post['project_name'] = $this->input->post('project_name');
        $post['status'] = $this->input->post('status');
        $post['priority'] = $this->input->post('priority');
        $post['location'] = $this->input->post('location');
        $post['description'] = $this->input->post('description');
        $post['created_date'] = $createDate;
        $user_pin = $this->session->userdata('user_pin');
        $post['created_by'] = $user_pin;

        $target_dir = "files/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $file = $_FILES['fileToUpload']['name'];
        //check image
        if (empty($file)) :
            $post['file_name'] = '';
        else:
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) :
                $post['file_name'] = basename($_FILES["fileToUpload"]["name"]);
            else:
                $data['error'] = "Sorry, there was an error uploading your file";
            endif;
        endif;
        //add project
        $addProject = $this->common->add('project', $post);

        if ($addProject) {
            $this->session->set_userdata('add', 'Project add successfully');
        }
    }

    public function delete() {
        //delete user
        $id = (int) $this->input->post('id');
        $delete = $this->common->delete('project', $id);
    }

    public function view() {
        if (!in_array($this->session->userdata('user_role'), $this->common->meritsRole())) {
            redirect('auth/logout');
        }
        $data['title'] = 'Project View';
        $data['menu'] = 'project';
        $data['submenu'] = 'viewProject';
        //view all project data
        $data['projectList'] = $this->project_model->projectData('project');

        //assets
        add_asset("css", "common.css");
        add_asset("css", "jquery.dataTables.min.css");
        add_assets('js', [
            'jquery.dataTables.min.js',
            'datatable.js',
            'project.js'
        ]);

        $this->load->view('common/header', $data);
        $this->load->view('common/sidebar', $data);
        $this->load->view('project/view', $data);
        $this->load->view('common/footer', $data);
    }

    public function edit() {
        if (!in_array($this->session->userdata('user_role'), $this->common->meritsRole())) {
            redirect('auth/logout');
        }

        $id = $this->input->post('id');
        $output = $this->common->edit('project', $id, 'id');
        // edited field set
        $data['project_name'] = $output->project_name;
        $data['status'] = $output->status;
        $data['location'] = $output->location;
        $data['description'] = $output->description;
        $data['priority'] = $output->priority;
        $data['file_name'] = $output->file_name;
        //view all priority
        $data['prioritylist'] = $this->common->viewAll('priority');

        echo json_encode($data);
    }

    public function update() {

        if (in_array($this->session->userdata('user_role'), array(1, 2, 3))) :


            $id = $this->input->post('projectid');
            $createDate = date('Y-m-d H:i:s');
            // set post data for update
            $post['project_name'] = $this->input->post('project_name');
            $post['status'] = $this->input->post('status');
            $post['priority'] = $this->input->post('priority');
            $post['location'] = $this->input->post('location');
            $post['description'] = $this->input->post('description');
            $post['created_date'] = $createDate;
            $user_pin = $this->session->userdata('user_pin');
            $post['created_by'] = $user_pin;
            // change image
            $target_dir = "files/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $imgFile = $_FILES['fileToUpload']['name'];
            if (empty($imgFile)) :
                $post = $post;
            else:
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) :
                    $post['file_name'] = basename($_FILES["fileToUpload"]["name"]);
                else:
                    $data['error'] = "Sorry, there was an error uploading your file";
                endif;
            endif;
            //update project
            $update = $this->common->update('project', $id, $post);
            if ($update):
                $this->session->set_userdata('edit', 'Project edit Successfully');
            else:
                $this->session->set_userdata('notadd', 'Failed to edit Project');
            endif;

            redirect('project/view');
        else :
            redirect('auth');
        endif;
    }

}
