<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->library('session');
    }

    public function admin()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }

        $data['produk'] = $this->Produk_model->get_all_produk_sorted('harga', 'ASC');
        $data['title'] = 'Admin | Manajemen Produk';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/produk/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function simpan()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }

        $gambar = '';
        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = './assets/img/uploads/produk';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['file_name']     = time(); // nama unik
            $config['max_size']      = 2048; // maksimal 2MB

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $gambar = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', 'Upload gambar gagal: ' . $this->upload->display_errors('', ''));
                redirect('produk/admin');
                return;
            }
        }

        $data = [
            'nama_paket'  => $this->input->post('nama_paket'),
            'kecepatan'   => $this->input->post('kecepatan'),
            'deskripsi'   => $this->input->post('deskripsi'),
            'harga'       => preg_replace('/[^0-9]/', '', $this->input->post('harga')), // hilangkan format rupiah
            'fasilitas'   => $this->input->post('fasilitas'),
            'populer'     => $this->input->post('populer') ? 1 : 0,
            'link_pesan'  => $this->input->post('link_pesan'),
            'foto'        => $gambar
        ];

        if ($this->Produk_model->tambah_produk($data)) {
            $this->session->set_flashdata('success', 'Produk berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Produk gagal ditambahkan.');
        }
        redirect('produk/admin');
    }

    public function update($id)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }

        $produk_lama = $this->Produk_model->get_produk_by_id($id);
        $gambar = $produk_lama['foto']; // default pakai foto lama
        $upload_error = '';
        $gambar_diubah = false;

        // Cek apakah ada upload file
        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = './assets/img/uploads/produk';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['file_name']     = time();
            $config['max_size']      = 2048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                // Hapus foto lama
                if ($gambar && file_exists('./assets/img/uploads/produk/' . $gambar)) {
                    unlink('./assets/img/uploads/produk/' . $gambar);
                }
                $gambar = $this->upload->data('file_name');
                $gambar_diubah = true;
            } else {
                $upload_error = $this->upload->display_errors('', '');
            }
        }

        // Ambil inputan baru
        $data = [
            'nama_paket'  => $this->input->post('nama_produk'),
            'kecepatan'   => $this->input->post('kecepatan'),
            'deskripsi'   => $this->input->post('deskripsi'),
            'harga'       => preg_replace('/[^0-9]/', '', $this->input->post('harga')),
            'fasilitas'   => $this->input->post('fasilitas'),
            'populer'     => $this->input->post('populer') ? 1 : 0,
            'link_pesan'  => $this->input->post('link_pesan'),
            'foto'        => $gambar
        ];

        // Bandingkan data baru dan data lama
        $data_lama = [
            'nama_paket'  => $produk_lama['nama_paket'],
            'kecepatan'   => $produk_lama['kecepatan'],
            'deskripsi'   => $produk_lama['deskripsi'],
            'harga'       => $produk_lama['harga'],
            'fasilitas'   => $produk_lama['fasilitas'],
            'populer'     => $produk_lama['populer'],
            'link_pesan'  => $produk_lama['link_pesan'],
            'foto'        => $produk_lama['foto']
        ];

        if (!empty($upload_error)) {
            $this->session->set_flashdata('error', 'Upload gambar gagal: ' . $upload_error);
        } elseif ($data != $data_lama || $gambar_diubah) {
            $this->Produk_model->update_produk($id, $data);
            $this->session->set_flashdata('success', 'Produk berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('info', 'Tidak ada yang diubah.');
        }

        redirect('produk/admin');
    }


    public function hapus($id)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }

        if ($this->Produk_model->hapus_produk($id)) {
            $this->session->set_flashdata('success', 'Produk berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Produk gagal dihapus.');
        }
        redirect('produk/admin');
    }
}
