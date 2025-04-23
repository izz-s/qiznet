<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Artikel_model');
        $this->load->model('Produk_model');
        $this->load->model('Dokumentasi_model');
        $this->load->model('About_model');
        $this->load->helper('text');
    }

    public function index()
    {
        $data['about'] = $this->About_model->get_data();
        $data['artikel'] = $this->Artikel_model->getAll();
        $data['produk'] = $this->Produk_model->get_all_produk_sorted('harga', 'ASC');
        $data['dokumentasi_group'] = $this->Dokumentasi_model->get_all();
        $this->load->view('template/partials/header');
        $this->load->view('main/index', $data); // kirim data ke index
        $this->load->view('template/partials/navbar');
        $this->load->view('template/partials/footer');
    }

    public function like($id)
    {
        $ip = $this->input->ip_address();
        $cek = $this->db->get_where('likes', [
            'dokumentasi_id' => $id,
            'user_ip' => $ip
        ])->row();

        if (!$cek) {
            $this->db->insert('likes', [
                'dokumentasi_id' => $id,
                'user_ip' => $ip
            ]);
        }

        // cek apakah request-nya ajax
        if ($this->input->is_ajax_request()) {
            echo json_encode(['status' => 'success']);
        } else {
            // Redirect kalau bukan ajax
            redirect('index.php#documentation');
        }
    }

    public function kirim_komentar()
    {
        $data = [
            'dokumentasi_id' => $this->input->post('dokumentasi_id'),
            'nama' => $this->input->post('nama'),
            'isi_komentar' => $this->input->post('isi_komentar')
        ];
        $this->db->insert('komentar', $data);
        redirect('index.php#documentation');
    }
}
