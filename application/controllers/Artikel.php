<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Artikel_model');
    }

    public function admin()
    {
        $data['title'] = 'Admin | Manajemen Artikel';
        $data['artikel'] = $this->Artikel_model->getAll();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/artikel/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function tambah()
    {
        if ($this->input->post()) {
            $config['upload_path']   = './assets/img/uploads/artikel/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;

            $this->load->library('upload', $config);
            $foto = '';

            if (!empty($_FILES['foto']['name'])) {
                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('error', 'Gagal upload foto: ' . $this->upload->display_errors());
                    redirect('artikel/admin');
                }
            }

            $slug = url_title($this->input->post('judul'), 'dash', TRUE);

            // Cek apakah judul (slug) sudah ada
            if ($this->Artikel_model->getBySlug($slug)) {
                $this->session->set_flashdata('error', 'Judul artikel sudah ada.');
                redirect('artikel/admin');
            }

            // Format konten agar menjadi paragraf
            $konten = $this->input->post('konten');
            $konten = '<p>' . preg_replace('/\r?\n/', '</p><p>', trim($konten)) . '</p>';


            $data = [
                'judul'      => $this->input->post('judul'),
                'slug'       => $slug,
                'konten'     => $konten,
                'created_at' => date('Y-m-d H:i:s'),
                'foto'       => $foto
            ];

            if ($this->Artikel_model->insert($data)) {
                $this->session->set_flashdata('success', 'Artikel berhasil ditambahkan.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan artikel.');
            }

            redirect('artikel/admin');
        }
    }

    public function edit($id)
    {
        $data['artikel'] = $this->Artikel_model->getById($id);

        if (!$data['artikel']) {
            $this->session->set_flashdata('error', 'Artikel tidak ditemukan.');
            redirect('artikel/admin');
        }

        if ($this->input->post()) {
            $config['upload_path']   = './assets/img/uploads/artikel/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;

            $this->load->library('upload', $config);
            $foto = $data['artikel']['foto'];

            if (!empty($_FILES['foto']['name'])) {
                if ($this->upload->do_upload('foto')) {
                    if ($foto && file_exists('./assets/img/uploads/artikel/' . $foto)) {
                        unlink('./assets/img/uploads/artikel/' . $foto);
                    }
                    $foto = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('error', 'Gagal upload foto: ' . $this->upload->display_errors());
                    redirect('artikel/admin');
                }
            }

            $slug = url_title($this->input->post('judul'), 'dash', TRUE);
            $konten = '<p>' . preg_replace('/\r?\n/', '</p><p>', trim($this->input->post('konten'))) . '</p>';

            $update = [
                'judul'  => $this->input->post('judul'),
                'slug'   => $slug,
                'konten' => $konten,
                'foto'   => $foto
            ];

            // Pengecekan apakah ada perubahan data
            if (
                $update['judul'] == $data['artikel']['judul'] &&
                $update['konten'] == $data['artikel']['konten'] &&
                $update['foto'] == $data['artikel']['foto']
            ) {

                $this->session->set_flashdata('info', 'Tidak ada perubahan pada artikel.');
            } else {
                if ($this->Artikel_model->update($id, $update)) {
                    $this->session->set_flashdata('success', 'Artikel berhasil diperbarui.');
                } else {
                    $this->session->set_flashdata('error', 'Gagal memperbarui artikel.');
                }
            }

            redirect('artikel/admin');
        }
    }

    public function delete($id)
    {
        $artikel = $this->Artikel_model->getById($id);
        if (!$artikel) {
            $this->session->set_flashdata('error', 'Artikel tidak ditemukan.');
            redirect('artikel/admin');
        }

        if ($artikel['foto'] && file_exists('./assets/img/uploads/artikel/' . $artikel['foto'])) {
            unlink('./assets/img/uploads/artikel/' . $artikel['foto']);
        }

        if ($this->Artikel_model->delete($id)) {
            $this->session->set_flashdata('success', 'Artikel berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus artikel.');
        }

        redirect('artikel/admin');
    }
}
