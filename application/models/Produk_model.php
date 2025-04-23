<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{
    public function get_all_produk()
    {
        return $this->db->get('produk')->result();
    }

    public function get_produk_by_id($id)
    {
        return $this->db->get_where('produk', ['id' => $id])->row_array();
    }

    public function tambah_produk($data)
    {
        return $this->db->insert('produk', $data);
    }

    public function update_produk($id, $data)
    {
        return $this->db->update('produk', $data, ['id' => $id]);
    }

    public function hapus_produk($id)
    {
        return $this->db->delete('produk', ['id' => $id]);
    }

    public function get_all_produk_sorted($order_column, $order_direction = 'ASC')
    {
        $this->db->order_by($order_column, $order_direction);
        $query = $this->db->get('produk');
        return $query->result();
    }
}
