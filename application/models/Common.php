<?php

class Common extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function meritsRole() {
        return [1, 2, 3, 4];
    }

    public function viewAll($table, $where = false) {
        $this->db
                ->select('*')
                ->from($table);
        if ($where) {
            $this->db
                    ->where('role', $where);
        }
        return $this->db->get()->result();
    }

    public function viewuser($table, $role) {
        return $this->db
                        ->select('*')
                        ->from($table)
                        ->where('id!=', $role)
                        ->get()
                        ->result();
    }

    public function getusers($table) {
        return $this->db
                        ->select('users.*,userrole.role_name as roleName')
                        ->from($table)
                        ->join('userrole', 'users.role=userrole.id')
                        ->order_by('name', 'ASC')
                        ->get()
                        ->result();
    }

    public function add($table, $data) {

        return $this->db->insert($table, $data);
    }

    public function edit($table, $id, $col) {

        return $this->db->select('*')
                        ->where($col, $id)
                        ->get($table)->row();
    }

    public function fetchResult($table, $id, $col) {

        return $this->db->select('*')
                        ->where($col, $id)
                        ->get($table)->result();
    }

    public function login($uname) {
        $query = "select id,name, random_salt, password, user_pin,role,status,image_path  from users where email = ?";
        $queryResult = $this->db->query($query, $uname);
        if ($queryResult->num_rows() > 0):
            return $queryResult->row();
        endif;
    }

    public function update($table, $id, $update) {


        return $this->db->where('id', $id)
                        ->update($table, $update);
    }

    public function countTotal($completion = false) {
        $this->db
                ->select('COUNT(1) as total')
                ->from('task');

        if ($completion) {
            $this->db
                    ->where('completion', $completion);
        }

        $list = $this->db
                ->get();

        return $list->row()->total;
    }

    public function delete($table, $id) {

        return $this->db
                        ->where('id', $id)
                        ->delete($table);
    }

    public function checkpin($userPin) {
        return $this->db
                        ->select('COUNT(1) as total')
                        ->from('users')
                        ->where('user_pin', $userPin)
                        ->get()
                        ->row()
                ->total;
    }

    public function userData() {

        $this->db->select("users.*, role_name ");
        $this->db->from('users');
        $this->db->join('userrole', 'users.role= userrole.id');
        $queryStr = $this->db->get()->result();
        return $queryStr;
    }

    public function userId($userpin) {

        return $this->db
                        ->select('id')
                        ->from('users')
                        ->where('user_pin', $userpin)
                        ->get()
                        ->row();
    }

    public function userInfo($userid) {

        $this->db->select("*")
                ->from('users')
                ->where('id', $userid);
        $queryStr = $this->db->get()->row();
        return $queryStr;
    }

    public function countData($table, $data = false) {
        $this->db
                ->select('COUNT(id) as total')
                ->from($table);
        if ($data) {
            $this->db
                    ->where('status', $data);
        }
        return $this->db->get()->row();
    }

}
