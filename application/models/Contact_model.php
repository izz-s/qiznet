<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact_model extends CI_Model
{

    public function insert_message($data)
    {
        return $this->db->insert('contact_messages', $data);
    }

    // Ambil semua data pesan
    public function get_all_messages()
    {
        $this->db->order_by('created_at', 'DESC'); // Urutkan berdasarkan waktu
        return $this->db->get('contact_messages')->result(); // Ambil semua pesan
    }

    public function get_message_by_id($id)
    {
        return $this->db->get_where('contact_messages', ['id' => $id])->row();
    }

    public function mark_as_replied($id)
    {
        $this->db->where('id', $id);
        $this->db->update('contact_messages', ['is_replied' => 1]);
    }

    // Hapus pesan berdasarkan ID
    public function delete_message($id)
    {
        return $this->db->delete('contact_messages', array('id' => $id));
    }
}
