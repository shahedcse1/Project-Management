<?php

class Project_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function projectData($table) {
        return $this->db
                        ->select('project.*,priority.id as priorityId ,priority.priority_name as priorityName')
                        ->from($table)
                        ->join('priority', 'project.priority=priority.id')
                        ->order_by('project_name', 'ASC')
                        ->get()
                        ->result();
    }

}
