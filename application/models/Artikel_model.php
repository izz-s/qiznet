<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('artikel')->result_array();
    }

    public function getBySlug($slug)
    {
        return $this->db->get_where('artikel', ['slug' => $slug])->row_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('artikel', ['id' => $id])->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('artikel', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('artikel', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('artikel', ['id' => $id]);
    }
}
