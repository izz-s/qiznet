<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumentasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dokumentasi_model');
        $this->load->helper(['form', 'url']);

        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }
    }

    public function admin()
    {
        $data['title'] = 'Admin | Manajemen Dokumentasi';
        $data['dokumentasi'] = $this->Dokumentasi_model->get_all_with_images();

        // Kirim semua gambar berdasarkan dokumentasi_id
        foreach ($data['dokumentasi'] as $dok) {
            $dok->images = $this->Dokumentasi_model->get_images_by_dokumentasi($dok->id);
        }

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/dokumentasi/index', $data);
        $this->load->view('admin/templates/footer');
    }


    public function tambah()
    {
        $judul = $this->input->post('judul');
        $deskripsi = $this->input->post('deskripsi');
        $created_at = date('Y-m-d H:i:s');

        $insert_data = [
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'created_at' => $created_at
        ];

        $dokumentasi_id = $this->Dokumentasi_model->insert($insert_data);

        $config['upload_path']   = './assets/img/uploads/dokumentasi/';
        $config['allowed_types'] = '*';
        $config['max_size']      = 2048;

        $this->load->library('upload', $config);
        $files = $_FILES;
        $count = count($_FILES['images']['name']);

        $upload_data = [];

        for ($i = 0; $i < $count; $i++) {
            $_FILES['images']['name']     = $files['images']['name'][$i];
            $_FILES['images']['type']     = $files['images']['type'][$i];
            $_FILES['images']['tmp_name'] = $files['images']['tmp_name'][$i];
            $_FILES['images']['error']    = $files['images']['error'][$i];
            $_FILES['images']['size']     = $files['images']['size'][$i];

            if ($this->upload->do_upload('images')) {
                $file_data = $this->upload->data();
                $upload_data[] = [
                    'dokumentasi_id' => $dokumentasi_id,
                    'image' => 'assets/img/uploads/dokumentasi/' . $file_data['file_name']
                ];
            }
        }

        if (!empty($upload_data)) {
            $this->Dokumentasi_model->insert_images($upload_data);
        }

        $this->session->set_flashdata('success', 'Dokumentasi berhasil ditambahkan!');
        redirect('dokumentasi/admin');
    }

    public function edit($id)
    {
        // Ambil data lama dari database
        $old_data = $this->db->get_where('dokumentasi', ['id' => $id])->row_array();

        $judul = $this->input->post('judul');
        $deskripsi = $this->input->post('deskripsi');

        $data_changed = false;
        $upload_errors = [];

        // Cek perubahan judul/deskripsi
        if ($judul != $old_data['judul'] || $deskripsi != $old_data['deskripsi']) {
            $this->db->update('dokumentasi', ['judul' => $judul, 'deskripsi' => $deskripsi], ['id' => $id]);
            $data_changed = true;
        }

        // Konfigurasi upload
        $config['upload_path']   = './assets/img/uploads/dokumentasi/';
        $config['allowed_types'] = '*';
        $config['max_size']      = 2048;

        $this->load->library('upload', $config);
        $files = $_FILES;
        $count = count($_FILES['images']['name']);

        $upload_data = [];

        for ($i = 0; $i < $count; $i++) {
            if (!empty($files['images']['name'][$i])) {
                $_FILES['images']['name']     = $files['images']['name'][$i];
                $_FILES['images']['type']     = $files['images']['type'][$i];
                $_FILES['images']['tmp_name'] = $files['images']['tmp_name'][$i];
                $_FILES['images']['error']    = $files['images']['error'][$i];
                $_FILES['images']['size']     = $files['images']['size'][$i];

                if ($this->upload->do_upload('images')) {
                    $file_data = $this->upload->data();
                    $upload_data[] = [
                        'dokumentasi_id' => $id,
                        'image' => 'assets/img/uploads/dokumentasi/' . $file_data['file_name']
                    ];
                    $data_changed = true;
                } else {
                    $upload_errors[] = $this->upload->display_errors('', '');
                }
            }
        }

        if (!empty($upload_data)) {
            $this->Dokumentasi_model->insert_images($upload_data);
        }

        // Tampilkan flashdata sesuai kondisi
        if (!empty($upload_errors)) {
            $this->session->set_flashdata('error', 'Gagal mengunggah beberapa gambar: ' . implode(', ', $upload_errors));
        } elseif ($data_changed) {
            $this->session->set_flashdata('success', 'Dokumentasi berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('info', 'Tidak ada yang diedit.');
        }

        redirect('dokumentasi/admin');
    }


    public function hapus_gambar($id)
    {
        $gambar = $this->Dokumentasi_model->get_image_by_id($id);
        if ($gambar) {
            $file_path = FCPATH . $gambar->image;
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            $this->db->where('id', $id);
            $this->db->delete('dokumentasi_gambar');

            $this->session->set_flashdata('success', 'Gambar berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gambar tidak ditemukan.');
        }

        redirect('dokumentasi/admin');
    }

    public function hapus_gambar_bulk($id)
    {
        $images = $this->Dokumentasi_model->get_images_by_dokumentasi($id);
        foreach ($images as $img) {
            $file_path = FCPATH . $img->image;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
        $this->db->where('dokumentasi_id', $id);
        $this->db->delete('dokumentasi_gambar');
        $this->db->where('id', $id);
        $this->db->delete('dokumentasi');

        $this->session->set_flashdata('success', 'Dokumentasi berhasil dihapus beserta semua gambarnya.');
        redirect('dokumentasi/admin');
    }
}
