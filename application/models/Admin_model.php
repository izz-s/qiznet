<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function get_admin($username, $password)
    {
        // ambil data admin dari database
        $this->db->where('username', $username);
        $this->db->where('password', md5($password)); // hash pw pake md5
        $query = $this->db->get('admin');
        return $query->row_array();
    }

    public function hitung_data($table)
    {
        return $this->db->count_all($table);
    }
}
