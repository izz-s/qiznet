<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('About_model');
    }

    public function index()
    {
        $data['about'] = $this->About_model->get_data();
        $data['title'] = 'Admin | Profil';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/about/profil', $data); // ini halaman edit
        $this->load->view('admin/templates/footer');
    }

    public function update()
    {
        $data = [
            'profil' => $this->input->post('profil'),
            'visi' => $this->input->post('visi'),
            'misi' => $this->input->post('misi'),
            'alasan' => $this->input->post('alasan'),
            'profil' => $this->input->post('profil') // Tambahkan ini
        ];

        // proses upload gambar
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = './assets/img/uploads/profil/';
            $config['allowed_types'] = '*';
            $config['max_size'] = 2048;
            $config['file_name'] = 'tentang_kami_' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $data['gambar'] = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('about');
            }
        }

        $this->About_model->update_data($data);
        $this->session->set_flashdata('success', 'Data berhasil diperbarui');
        redirect('about');
    }
}
