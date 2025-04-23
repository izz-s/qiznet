<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengunjung_model extends CI_Model
{
    public function get_total()
    {
        return $this->db->count_all('pengunjung');
    }

    public function get_recent_visitors()
    {
        return $this->db->order_by('waktu', 'DESC')->limit(5)->get('pengunjung')->result();
    }

    public function catat_kunjungan($ip)
    {
        $this->db->insert('pengunjung', ['ip_address' => $ip, 'waktu' => date('Y-m-d H:i:s')]);
    }
}
