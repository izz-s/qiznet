<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Contact_model');
        $this->load->library('session');
    }

    public function index($kata_unik = null)
    {
        $kata_rahasia = 'atminganteng1010'; // kata unik

        if ($kata_unik !== $kata_rahasia) {
            show_404();
            return;
        }

        // Anti-cache
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Pragma: no-cache");

        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin/dashboard');
        }

        $this->load->view('admin/login_admin');
    }

    public function block_access()
    {
        show_404();
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->Admin_model->get_admin($username, $password);

        if ($admin) {
            $this->session->set_userdata([
                'admin_logged_in' => true,
                'admin_name' => $admin['nama']
            ]);
            redirect('admin/dashboard');
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah!');
            redirect('admin');
        }
    }

    public function dashboard()
    {

        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/atminganteng1010');
            return;
        }

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Pragma: no-cache");
        $this->output->set_header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

        $data['admin_name'] = $this->session->userdata('admin_name');
        $data['jumlah_produk'] = $this->Admin_model->hitung_data('produk');
        $data['jumlah_artikel'] = $this->Admin_model->hitung_data('artikel');
        $data['jumlah_dokumentasi'] = $this->Admin_model->hitung_data('dokumentasi');
        $data['jumlah_pesan'] = $this->Admin_model->hitung_data('contact_messages');
        $data['title'] = 'Admin | Dashboard';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/dashboard_admin', $data);
        $this->load->view('admin/templates/footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        redirect('admin/atminganteng1010'); // kata unik
    }
}
