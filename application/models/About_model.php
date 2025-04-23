<?php
defined('BASEPATH') or exit('No direct script access allowed');
class About_model extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('about')->row();
    }

    public function update_data($data)
    {
        $this->db->update('about', $data, ['id' => 1]);
    }
}
