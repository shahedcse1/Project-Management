<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common');
        $this->load->model('task_model');
    }

    public function create() {
        if (!in_array($this->session->userdata('user_role'), $this->common->meritsRole())) {
            redirect('auth/logout');
        }
        $data['title'] = 'Task Assign';
        $data['menu'] = 'Task';
        $data['submenu'] = 'addTask';
        // all  priority, followUp, reportTo, assignTo, assignBy, taskType, project

        $data['priority'] = $this->common->viewAll('priority');
        $data['followUp'] = $this->common->viewAll('users', '1');
        $data['reportTo'] = $this->common->viewAll('users', '1');
        $data['assignTo'] = $this->db->query("SELECT * FROM users WHERE role IN (2,3)")->result();
        $data['assignBy'] = $this->common->viewAll('users', '1');

        $data['taskType'] = $this->common->viewAll('tasktype');

        $data['project'] = $this->common->viewAll('project');

        /** Assets */
        add_asset("css", "common.css");
        add_assets('js', [
            'datepicker.js',
            'task.js'
        ]);
        $this->load->view('common/header', $data);
        $this->load->view('common/sidebar', $data);
        $this->load->view('task/add', $data);
        $this->load->view('common/footer', $data);
    }

    public function add() {

        if (!in_array($this->session->userdata('user_role'), $this->common->meritsRole())) {
            redirect('auth/logout');
        }
        // set post data for add
        $post['task_name'] = $this->input->post('taskName');
        $task_name = $post['task_name'];
        $post['status'] = (int) $this->input->post('status');
        $post['priority'] = (int) $this->input->post('priority');
        $post['report_to'] = (int) $this->input->post('reportTo');
        $report_id = $post['report_to'];
        $post['assign_by'] = (int) $this->input->post('assignBy');
        $assignname = $this->task_model->findEmail($post['assign_by'])->name;
        $assignto = $this->input->post('assignTo');
        $assigntoid = implode(', ', $assignto);
        $assigntoname = $this->db->query("SELECT group_concat(name) AS name FROM `users` WHERE id IN ($assigntoid)")->row()->name;
        $followup = $this->input->post('followup');
        $followupid = implode(', ', $followup);
        $followupname = $this->db->query("SELECT group_concat(name) AS name FROM `users` WHERE id IN ($followupid)")->row()->name;

        $post['project_id'] = (int) $this->input->post('project');
        $project_id = $post['project_id'];
        $prjectqr = $this->db->query("SELECT project_name FROM project WHERE id='$project_id'")->row();
        if (!empty($prjectqr)):
            $prject_name = $prjectqr->project_name;
        else:
            $prject_name = 'N/A';
        endif;

        $post['type'] = (int) $this->input->post('type');

        //date formatting
        $dateFrom = $this->input->post('date_from');
        $dateTo = $this->input->post('date_to');
        $replaceFrom = str_replace('/', '-', $dateFrom);
        $replaceTo = str_replace('/', '-', $dateTo);
        $rdateForm = date('Y-m-d', strtotime($replaceFrom));
        $rdateTo = date('Y-m-d', strtotime($replaceTo));

        $deadline = date("F j, Y", strtotime($rdateTo));
        $post['completion_startDate'] = $rdateForm;
        $post['completion_endDate'] = $rdateTo;

        // set create date
        $createDate = date('Y-m-d H:i:s');
        $post['created_date'] = $createDate;

        // save created user userpin
        $user_pin = $this->session->userdata('user_pin');
        $post['created_by'] = $user_pin;

        //add to db
        $addTask = $this->common->add('task', $post);
        // Report to mail generate 
        $emailto = $this->task_model->findEmail($report_id)->email;
        $name = $this->task_model->findEmail($report_id)->name;


        require FCPATH . 'vendor/autoload.php';
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("project@meritstec.com", "PMS");
        $email->setSubject('Project Management Email' . $name);
        $email->addTo("$emailto", "PMS");
        $email->addTo("raisul@meritstec.com", "PMS");
        $email->addTo("ahmed.ebc@logicandthoughts.com", "PMS");
        $email->addContent("text/html", "Dear Sir,  <br><br> 
        A new task has been created and here are the details for your kind information .  <br> <br> 
        <b>Project Name: </b>  $prject_name  .<br> 
        <b>Task Name: </b>  $task_name  .<br>
        <b>Reported To: </b>  $name  .<br>
        <b>Assign By: </b>  $assignname  .<br>
        <b>Assign To: </b>  $assigntoname . <br>
        <b>Followup By: </b> $followupname . <br>
        <b>Deadline: </b>  $deadline  . <br> <br> 
        Thanks & Regards,  <br>
        From Project Management Software . <br> <br> 
        (NB: This is an automatic generated email. Please do not reply to this email) ");

        $sendgrid = new \SendGrid('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');

        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }
        //find last inserted id
        $getlastId = $this->task_model->getLastID('id', 'task');

        //add followup data

        foreach ($followup as $val) {
            $follow = [
                'task_id' => $getlastId->id,
                'followup_id' => $val
            ];
            $this->task_model->addData($follow, 'followupdata');
            // followup mail  generate
            $emailto = $this->task_model->findEmail($val)->email;
            $fname = $this->task_model->findEmail($val)->name;

            require FCPATH . 'vendor/autoload.php';
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("project@meritstec.com", "PMS");
            $email->setSubject('Followup New Project' . $fname);
            $email->addTo("$emailto", "PMS");
            $email->addContent("text/html", "Dear Sir,  <br><br> 
        A new task has been created and here are the details for your kind information .  <br> <br> 
        <b>Project Name: </b>  $prject_name  .<br> 
        <b>Task Name: </b>  $task_name  .<br>
        <b>Reported To: </b>  $name  .<br>
        <b>Assign By: </b>  $assignname  .<br>
        <b>Assign To: </b>  $assigntoname . <br>
        <b>Followup By: </b> $followupname . <br>
        <b>Deadline: </b>  $deadline  . <br> <br> 
        Thanks & Regards,  <br>
        From Project Management Software . <br> <br> 
        (NB: This is an automatic generated email. Please do not reply to this email) ");

            $sendgrid = new \SendGrid('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');

            try {
                $response = $sendgrid->send($email);
                print $response->statusCode() . "\n";
                print_r($response->headers());
                print $response->body() . "\n";
            } catch (Exception $e) {
                echo 'Caught exception: ' . $e->getMessage() . "\n";
            }

            //save selected follow up
        }

        //save selected assign to and send mail


        foreach ($assignto as $val) {
            $assign = [
                'task_id' => $getlastId->id,
                'assign_id' => $val
            ];

            $this->task_model->addData($assign, 'assigndata');
            // assignto mail generate.
            $emailto = $this->task_model->findEmail($val)->email;
            $aname = $this->task_model->findEmail($val)->name;

            require FCPATH . 'vendor/autoload.php';
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("project@meritstec.com", "PMS");
            $email->setSubject('New Project Initiated for you' . $aname);
            $email->addTo("$emailto", "PMS");
            $email->addContent("text/html", "Dear OPPS Team,  <br><br> 
        A new task has been created and assigned to you. Please login to your Portal and have a look.  <br> <br> 
        <b>Project Name: </b>  $prject_name  .<br> 
        <b>Task Name: </b>  $task_name  .<br>
        <b>Reported To: </b>  $name  .<br>
        <b>Assign By: </b>  $assignname  .<br>
        <b>Assign To: </b>  $assigntoname . <br>
        <b>Followup By: </b> $followupname . <br>
        <b>Deadline: </b>  $deadline  . <br> <br> 
        Best of Luck ,  <br>
        From Project Admin . <br> <br> 
        (NB: This is an automatic generated email. Please do not reply to this email) ");

            $sendgrid = new \SendGrid('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');

            try {
                $response = $sendgrid->send($email);
                print $response->statusCode() . "\n";
                print_r($response->headers());
                print $response->body() . "\n";
            } catch (Exception $e) {
                echo 'Caught exception: ' . $e->getMessage() . "\n";
            }
            //add  assign to data
        }

        if ($addTask) {
            $this->session->set_userdata('add', 'Task Add successfully and Mail Send to User');
        }
    }

    public function delete() {
        //delete user
        $id = (int) $this->input->post('id');
        $task_id = $id;
        $delete = $this->common->delete('task', $id);
        $this->db->where('task_id', $task_id);
        $this->db->delete('followupdata');

        $this->db->where('task_id', $task_id);
        $this->db->delete('assigndata');
    }

    public function view() {
        if (!in_array($this->session->userdata('user_role'), $this->common->meritsRole())) {
            redirect('auth/logout');
        }
        $data['title'] = 'Task View';
        $data['menu'] = 'Task';
        $data['submenu'] = 'viewTask';
        //view task where completion is not closed
        $role = $this->session->userdata('user_role');
        $data['user'] = $role;
        $id = $this->session->userdata('userid');

        $data['taskList'] = '';
        //get user assign task id
        $taskdata = $this->task_model->taskid($id)->task_id;

        if ($role == '3'):
            if ($taskdata):
                $data['taskList'] = $this->task_model->taskData('task', 'task.completion!="3"', "task.id in ($taskdata)");
            else:
                $data['taskList'] = "";
            endif;
        elseif ($role == '1' || $role == '2'):
            $data['taskList'] = $this->task_model->taskData('task', 'task.completion!="3"');
        endif;

        // add assets
        add_asset("css", "common.css");
        add_asset("css", "jquery.dataTables.min.css");
        add_asset("css", "bootstrap-slider.min.css");
        add_assets('js', [
            'jquery.dataTables.min.js',
            'bootstrap-slider.min.js',
            'datatable.js',
            'task.js'
        ]);
        $this->load->view('common/header', $data);
        $this->load->view('common/sidebar', $data);
        $this->load->view('task/view', $data);
        $this->load->view('common/footer', $data);
    }

    public function edit($id) {
        if (!in_array($this->session->userdata('user_role'), $this->common->meritsRole())) {
            redirect('auth/logout');
        }
        $data['title'] = 'Task Edit';
        $data['menu'] = 'Task';
        $data['submenu'] = 'viewTask';
        //all  priority, followUp, reportTo, assignT, assignBy, taskType, project, completions
        $data['priority'] = $this->common->viewAll('priority');
        $data['followUp'] = $this->common->viewAll('users', '1');
        $data['reportTo'] = $this->common->viewAll('users', '1');
        $data['assignTo'] = $this->db->query("SELECT * FROM users WHERE role IN (2,3)")->result();
        $data['assignBy'] = $this->common->viewAll('users', '1');
        $data['taskType'] = $this->common->viewAll('tasktype');
        $data['project'] = $this->common->viewAll('project');
        $data['completions'] = $this->common->viewAll('completionstatus');


        //find out which assignto are selected under selected user
        $data['allAssignto'] = $this->task_model->assignTo($id);
        $data['allAssigns'] = [];
        //save into array
        foreach ($data['allAssignto'] as $assign) {
            array_push($data['allAssigns'], $assign->assign_id);
        }

        //find out which followups are selected under selected user
        $data['allFollowsup'] = $this->task_model->followup($id);
        $data['allFollows'] = [];
        //save into array
        foreach ($data['allFollowsup'] as $follow) {
            array_push($data['allFollows'], $follow->followup_id);
        }
        //edit form selected user
        $data['assign'] = $this->task_model->findUser($id, "task.assign_by=users.id");
        $data['report'] = $this->task_model->findUser($id, "task.report_to=users.id");
        $data['taskList'] = $this->task_model->editTask($id);

        add_asset("css", "common.css");
        add_asset("css", "bootstrap-slider.min.css");
        add_asset("css", "rating.css");
        add_assets('js', [
            'bootstrap-slider.min.js',
            'task.js',
            'ratingProgress.js'
        ]);
        $this->load->view('common/header', $data);
        $this->load->view('common/sidebar', $data);
        $this->load->view('task/edit', $data);
        $this->load->view('common/footer', $data);
    }

    public function update() {
        if (in_array($this->session->userdata('user_role'), array(1, 2, 3))) :
            //set post data for update
            // set post data for add
            $id = $this->input->post('taskid');
            $post['task_name'] = $this->input->post('taskName');
            $task_name = $post['task_name'];
            $post['status'] = (int) $this->input->post('status');
            $post['priority'] = (int) $this->input->post('priority');
            $post['report_to'] = (int) $this->input->post('reportTo');
            $report_id = $post['report_to'];
            $post['assign_by'] = (int) $this->input->post('assignBy');
            $assignname = $this->task_model->findEmail($post['assign_by'])->name;
            $assignto = $this->input->post('assignTo');
            $assigntoid = implode(', ', $assignto);
            $assigntoname = $this->db->query("SELECT group_concat(name) AS name FROM `users` WHERE id IN ($assigntoid)")->row()->name;
            $followup = $this->input->post('followup');
            $followupid = implode(', ', $followup);
            $followupname = $this->db->query("SELECT group_concat(name) AS name FROM `users` WHERE id IN ($followupid)")->row()->name;

            $post['project_id'] = (int) $this->input->post('project');
            $project_id = $post['project_id'];
            $prjectqr = $this->db->query("SELECT project_name FROM project WHERE id='$project_id'")->row();
            if (!empty($prjectqr)):
                $prject_name = $prjectqr->project_name;
            else:
                $prject_name = 'N/A';
            endif;

            $post['type'] = (int) $this->input->post('type');
            $post['comments'] = $this->input->post('comments');
            $comments = $post['comments'];
            $post['evaluation'] = $this->input->post('rating');
            $post['progress'] = $this->input->post('progress');
            $progress = $post['progress'];
            $post['completion'] = $this->input->post('completion');

//date formatting
            $dateFrom = $this->input->post('date_from');
            $dateTo = $this->input->post('date_to');
            $closeDate = $this->input->post('closeDate');
            if (!empty($closeDate)):
                $closeTo = date('Y-m-d', strtotime($closeDate));
            else:
                $closeTo = "";
            endif;
            $post['closeDate'] = $closeTo;
            $replaceFrom = str_replace('/', '-', $dateFrom);
            $replaceTo = str_replace('/', '-', $dateTo);
            $rdateForm = date('Y-m-d', strtotime($replaceFrom));
            $rdateTo = date('Y-m-d', strtotime($replaceTo));
            $post['completion_startDate'] = $rdateForm;
            $post['completion_endDate'] = $rdateTo;
            $createDate = date('Y-m-d H:i:s');
            $post['created_date'] = $createDate;

            $deadline = date("F j, Y", strtotime($rdateTo));

            //set  creating  userpin
            $user_pin = $this->session->userdata('user_pin');
            $post['created_by'] = $user_pin;

            $emailto = $this->task_model->findEmail($report_id)->email;
            $name = $this->task_model->findEmail($report_id)->name;



            require FCPATH . 'vendor/autoload.php';
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("project@meritstec.com", "PMS");
            $email->setSubject('Project Management Email' . $name);
            $email->addTo("$emailto", "PMS");
            $email->addTo("raisul@meritstec.com", "PMS");
            $email->addTo("ahmed.ebc@logicandthoughts.com", "PMS");
            $email->addContent("text/html", "Dear Sir,  <br> <br>
       The task '$task_name' has been progressded $progress % and here are the details for your kind information .  <br> <br> 
        <b>Project Name: </b>  $prject_name  .<br> 
        <b>Task Name: </b>  $task_name  .<br>
        <b>Reported To: </b>  $name  .<br>
        <b>Assign By: </b>  $assignname  .<br>
        <b>Assign To: </b>  $assigntoname . <br>
        <b>Followup By: </b> $followupname . <br>
        <b>Deadline: </b>  $deadline  . <br><br>
       <b>Progress Remarks: </b>  $comments  . <br> <br> 
        Thanks & Regards,  <br>
        From Project Management Software . <br> <br> 
        (NB: This is an automatic generated email. Please do not reply to this email) ");

            $sendgrid = new \SendGrid('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');

            try {
                $response = $sendgrid->send($email);
                print $response->statusCode() . "\n";
                print_r($response->headers());
                print $response->body() . "\n";
            } catch (Exception $e) {
                echo 'Caught exception: ' . $e->getMessage() . "\n";
            }



            $updateTask = $this->task_model->updateTask($id, $post);

            //delete previous Assignto
            $removeAssign = $this->task_model->deleteAssign($id);
            //delete previous followup
            $removeFollowup = $this->task_model->deleteFollowup($id);
            foreach ($assignto as $val) {
                $assign = [
                    'task_id' => $id,
                    'assign_id' => $val
                ];
                //add new assigns
                $this->task_model->addData($assign, 'assigndata');
            }
            foreach ($followup as $val) {
                $follow = [
                    'task_id' => $id,
                    'followup_id' => $val
                ];
                //add new followups
                $emailto = $this->task_model->findEmail($val)->email;
                $fname = $this->task_model->findEmail($val)->name;
                $this->task_model->addData($follow, 'followupdata');


                require FCPATH . 'vendor/autoload.php';
                $email = new \SendGrid\Mail\Mail();
                $email->setFrom("project@meritstec.com", "PMS");
                $email->setSubject('Project Management Email' . $fname);
                $email->addTo("$emailto", "PMS");
                $email->addContent("text/html", "Dear Sir,  <br> <br>
       The task '$task_name' has been progressded $progress % and here are the details for your kind information .  <br> <br> 
        <b>Project Name: </b>  $prject_name  .<br> 
        <b>Task Name: </b>  $task_name  .<br>
        <b>Reported To: </b>  $name  .<br>
        <b>Assign By: </b>  $assignname  .<br>
        <b>Assign To: </b>  $assigntoname . <br>
        <b>Followup By: </b> $followupname . <br>
        <b>Deadline: </b>  $deadline  . <br><br>
       <b>Progress Remarks: </b>  $comments  . <br> <br> 
        Thanks & Regards,  <br>
        From Project Management Software . <br> <br> 
        (NB: This is an automatic generated email. Please do not reply to this email) ");

                $sendgrid = new \SendGrid('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');

                try {
                    $response = $sendgrid->send($email);
                    print $response->statusCode() . "\n";
                    print_r($response->headers());
                    print $response->body() . "\n";
                } catch (Exception $e) {
                    echo 'Caught exception: ' . $e->getMessage() . "\n";
                }
            }
            if ($updateTask) {
                $this->session->set_userdata('edit', 'Task Edit successfully');
            }

        endif;
    }

    public function close() {
        if (!in_array($this->session->userdata('user_role'), $this->common->meritsRole())) {
            redirect('auth/logout');
        }
        $data['title'] = 'Task Close';
        $data['menu'] = 'Task';
        $data['submenu'] = 'closeTask';
        $id = $this->session->userdata('userid');
        //get user assign task id
        $taskdata = $this->task_model->taskid($id)->task_id;

        // view close tasks
        $role = $this->session->userdata('user_role');
        if ($role == '3'):
            if ($taskdata):
                $data['taskList'] = $this->task_model->taskData('task', 'task.completion="3"', "task.id in ($taskdata)");
            else:
                $data['taskList'] = "";
            endif;
        elseif ($role == '1' || $role == '2'):
            $data['taskList'] = $this->task_model->taskData('task', 'task.completion="3"');
        endif;

        add_asset("css", "jquery.dataTables.min.css");
        add_asset("css", "bootstrap-slider.min.css");
        add_asset("css", "common.css");

        add_assets('js', [
            'jquery.dataTables.min.js',
            'bootstrap-slider.min.js',
            'datatable.js',
            'task.js'
        ]);
        $this->load->view('common/header', $data);
        $this->load->view('common/sidebar', $data);
        $this->load->view('task/closeTask', $data);
        $this->load->view('common/footer', $data);
    }

}
