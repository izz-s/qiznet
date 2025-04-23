<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konten_model extends CI_Model
{
    public function get_all()
    {
        return $this->db->get('konten')->result();
    }

    public function tambah($data)
    {
        return $this->db->insert('konten', $data);
    }

    // Fungsi yang diperlukan oleh Admin.php
    public function get_total()
    {
        return $this->db->count_all('konten');
    }
}
