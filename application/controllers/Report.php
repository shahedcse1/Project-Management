<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common');
        $this->load->model('task_model');
    }

    public function index() {
        if (!in_array($this->session->userdata('user_role'), $this->common->meritsRole())) {
            redirect('auth/logout');
        }
        $data['title'] = 'Merits Technologies Ltd.';
        $data['menu'] = 'report';

        //all project,priority report to ,assign to,assign from assign by,completions
        $data['project'] = $this->common->viewAll('project');
        $data['priority'] = $this->common->viewAll('priority');
        $data['reportTo'] = $this->common->viewAll('users', '1');
        $data['assignBy'] = $this->common->viewAll('users', '1');
        $data['completions'] = $this->common->viewAll('completionstatus');

        //set post data
        $project = $this->input->post('project');
        $priority = $this->input->post('priority');
        $reportTo = $this->input->post('reportTo');
        $assignBy = $this->input->post('assignBy');
        $completion = $this->input->post('completion');
        $dateForm = $this->input->post('date-form');
        $dateTo = $this->input->post('date-to');

        $data['projectId'] = $data['priorityId'] = $data['report_to'] = $data['assign_by'] = $data['completion'] = $data['dateForm'] = $data['dateTo'] = '';
        //if post any
        if ($this->input->post()):
            $data['projectId'] = $project;
            $data['priorityId'] = $priority;
            $data['report_to'] = $reportTo;
            $data['assign_by'] = $assignBy;
            $data['completion'] = $completion;
            $data['dateForm'] = $dateForm;
            $data['dateTo'] = $dateTo;
            //check which value is post
            if ($project != '' && $project != 'all'):
                $where = "task.project_id=$project and task.status='1'";
            elseif ($priority != '' && $priority != 'all'):
                $where = "task.priority=$priority and task.status='1'";
            elseif ($reportTo != '' && $reportTo != 'all'):
                $where = "task.report_to=$reportTo and task.status='1'";
            elseif ($assignBy != '' && $assignBy != 'all'):
                $where = "task.assign_by=$assignBy and task.status='1'";
                $id = false;
            elseif ($completion != '' && $completion != 'all'):
                $where = "task.completion=$completion and task.status='1'";
            elseif ($project == 'all' || $priority == 'all' || $assignBy == 'all' || $reportTo == 'all' || $completion == 'all'):
                $where = "task.status='1'";
            elseif ($dateForm != '' && $dateTo != ''):
                //date formatting
                $replaceFrom = str_replace('/', '-', $dateForm);
                $replaceTo = str_replace('/', '-', $dateTo);
                $rdateForm = date("Y-m-d", strtotime($replaceFrom));
                $rdateTo = date("Y-m-d", strtotime($replaceTo));
                $where = "task.closeDate BETWEEN '$rdateForm' AND '$rdateTo' ";
            else:
                //date formatting
                $dateFrom = date('Y-m-d', strtotime(' -30 days'));
                $dateTo = date('Y-m-d');
                $rdateForm = date("d-M-Y", strtotime($dateFrom));
                $rdateTo = date("d-M-Y", strtotime($dateTo));
                $data['dateForm'] = $rdateForm;
                $data['dateTo'] = $rdateTo;
                $where = "task.closeDate BETWEEN '$dateFrom' AND '$dateTo' ";
            endif;
        else:
            //date formatting
            $dateFrom = date('Y-m-d', strtotime(' -30 days'));
            $dateTo = date('Y-m-d');
            $rdateForm = date("d-M-Y", strtotime($dateFrom));
            $rdateTo = date("d-M-Y", strtotime($dateTo));
            $data['dateForm'] = $rdateForm;
            $data['dateTo'] = $rdateTo;
            $where = "task.closeDate BETWEEN '$dateFrom' AND '$dateTo' ";
        endif;

        //show result
        $data['report'] = $this->task_model->taskData('task', $where);


        add_asset("css", "common.css");
        add_asset("css", "jquery.dataTables.min.css");
        add_asset("css", "buttons.dataTables.min.css");
        add_assets('js', [
            'datepicker.js',
            'jquery.dataTables.min.js',
            'Export/dataTables.buttons.min.js',
            'Export/buttons.flash.min.js',
            'Export/jszip.min.js',
            'Export/pdfmake.min.js',
            'Export/vfs_fonts.js',
            'Export/buttons.html5.min.js',
            'Export/buttons.print.min.js',
            'report.js'
        ]);
        $this->load->view('common/header', $data);
        $this->load->view('common/sidebar', $data);
        $this->load->view('report/report', $data);
        $this->load->view('common/footer', $data);
    }

}
