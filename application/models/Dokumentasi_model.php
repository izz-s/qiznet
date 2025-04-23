<?php
class Dokumentasi_model extends CI_Model
{
    public function get_all()
    {
        $this->db->select('d.id, d.judul, d.created_at, MIN(dg.image) AS image, d.deskripsi');
        $this->db->from('dokumentasi d');
        $this->db->join('dokumentasi_gambar dg', 'd.id = dg.dokumentasi_id', 'left');
        $this->db->group_by('d.id, d.judul, d.created_at');
        $this->db->order_by('d.created_at', 'DESC');
        return $this->db->get()->result();
    }

    public function get_all_with_images()
    {
        $this->db->select('d.id, d.judul, d.created_at, MIN(dg.image) AS image, d.deskripsi');
        $this->db->from('dokumentasi d');
        $this->db->join('dokumentasi_gambar dg', 'd.id = dg.dokumentasi_id', 'left');
        $this->db->group_by('d.id, d.judul, d.created_at');
        $this->db->order_by('d.created_at', 'ASC');
        return $this->db->get()->result();
    }

    public function get_images_by_dokumentasi($dokumentasi_id)
    {
        return $this->db->get_where('dokumentasi_gambar', ['dokumentasi_id' => $dokumentasi_id])->result();
    }


    public function insert($data)
    {
        $this->db->insert('dokumentasi', $data);
        return $this->db->insert_id();
    }

    public function insert_images($images)
    {
        return $this->db->insert_batch('dokumentasi_gambar', $images);
    }

    public function get_image_by_id($id)
    {
        return $this->db->get_where('dokumentasi_gambar', ['id' => $id])->row();
    }

    public function delete_images_by_dokumentasi($dokumentasi_id)
    {
        $this->db->select('image');
        $images = $this->db->get_where('dokumentasi_gambar', ['dokumentasi_id' => $dokumentasi_id])->result();

        foreach ($images as $image) {
            if (file_exists($image->image)) {
                unlink($image->image);
            }
        }
        $this->db->delete('dokumentasi_gambar', ['dokumentasi_id' => $dokumentasi_id]);
        $remaining_images = $this->db->get_where('dokumentasi_gambar', ['dokumentasi_id' => $dokumentasi_id])->result();
        if (empty($remaining_images)) {
            $this->db->update('dokumentasi', ['status' => 'no_image'], ['id' => $dokumentasi_id]);
        }
    }


    public function delete_image($id)
    {
        $this->db->delete('dokumentasi_gambar', ['id' => $id]);
    }
}
