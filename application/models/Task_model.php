<?php
/**
 * Created by PhpStorm.
 * User: Rezwana
 * Date: 13-Feb-19
 * Time: 5:33 PM
 */

class Task_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function getLastID($col, $table)
    {
        return $this->db
            ->select($col)
            ->from($table)
            ->order_by($col, 'DESC')
            ->limit(1)
            ->get()
            ->row();
    }
    public function addData($data,$table)
    {
        return $this->db
            ->insert($table, $data);
    }

    public function taskData($table,$where,$where1=false)
    {
        $this->db
            ->select('task.*,priority.priority_name as priorityName,priority.id as priorityId')
            ->select('project.project_name as projectName')
            ->select('users.name as reportto')
            ->select('completionstatus.id comId,completionstatus.completion_status as completion')
            ->from($table)
            ->join('priority','task.priority=priority.id')
            ->join('project','task.project_id=project.id','left')
            ->join('users','users.id=task.assign_by')
            ->join('completionstatus','task.completion=completionstatus.id')
            ->where($where);
        if($where1){
            $this->db->where($where1);
         }
        return $this->db->get()->result();
    }

    public function editTask($id)
    {
        return $this->db
            ->select('task.*,priority.priority_name as priorityName,project.project_name as projectName,tasktype.type_name as taskName,completion_status')
            ->from('task')
            ->join('priority','task.priority=priority.id')
            ->join('completionstatus','task.completion=completionstatus.id')
            ->join('tasktype','task.type=tasktype.id')
            ->join('project','task.project_id=project.id','left')
            ->where('task.id',$id)
            ->get()
            ->row();
    }

    public function findUser($id,$where)
    {
        return $this->db
            ->select("users.id as id")
            ->from('task')
            ->join('users',$where)
            ->where('task.id',$id)
            ->get()
            ->row();
    }

    public function followup($id)
    {
        return $this->db
            ->select('followup_id')
            ->from('followupdata')
            ->where('task_id', $id)
            ->get()
            ->result();
    }
    public function assignTo($id)
    {
        return $this->db
            ->select('assign_id')
            ->from('assigndata')
            ->where('task_id', $id)
            ->get()
            ->result();
    }
    public function deleteFollowup($id)
    {
        return $this->db
            ->where('task_id', $id)
            ->delete('followupdata');

    }
    public function deleteAssign($id)
    {
        return $this->db
            ->where('task_id', $id)
            ->delete('assigndata');

    }
    public function updateTask($id, $taskData)
    {
        return $this->db
            ->where('id', $id)
            ->update('task', $taskData);

    }
    public function taskId($id)
    {
        return $this->db
            ->select('GROUP_CONCAT(DISTINCT task_id) as task_id')
            ->from('assigndata')
            ->where('assign_id', $id)
            ->get()
            ->row();
    }

    public function findEmail($id)
    {
        return $this->db
            ->select("email,name")
            ->from('users')
            ->where('id',$id)
            ->get()
            ->row();
    }

}