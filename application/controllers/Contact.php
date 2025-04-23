<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Contact_model');

        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }
    }

    //fungsi kirim pesan di form kontak halaman user
    public function submit_form()
    {
        $data = array(
            'name' => $this->input->post('name', TRUE),
            'email' => $this->input->post('email', TRUE),
            'subject' => $this->input->post('subject', TRUE),
            'message' => $this->input->post('message', TRUE)
        );

        if ($this->Contact_model->insert_message($data)) {
            echo 'OK'; // AJAX akan membaca ini sebagai sukses
        } else {
            echo 'Gagal mengirim pesan!'; // AJAX akan menangani error
        }
    }

    // Fungsi untuk menampilkan halaman kontak
    public function contact_messages()
    {
        $data['title'] = 'Admin | Manajemen Kontak Pesan';
        $data['messages'] = $this->Contact_model->get_all_messages();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/contact_messages', $data);
        $this->load->view('admin/templates/footer');
    }

    // Fungsi untuk membalas di halaman manajemen kontak admin
    public function send_reply($id)
    {
        $this->load->model('Contact_model');
        $message = $this->Contact_model->get_message_by_id($id);

        if (empty($message)) {
            show_404();
        }

        $email_to = $this->input->post('email');
        $subject  = $this->input->post('subject');
        $reply    = $this->input->post('reply');

        $this->load->library('email');
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'qiznetnetwork@gmail.com', // Ganti dengan email kamu
            'smtp_pass' => 'orvuutwlimypafpt',        // Ganti dengan password kamu
            'smtp_crypto' => 'ssl',
            'mailtype'  => 'html',
            'newline'   => "\r\n",
            'crlf'      => "\r\n",
            'charset'   => 'utf-8'
        ];
        $this->email->initialize($config);

        $this->email->from('pratamafaiz1010@gmail.com', 'Admin Qiznet');
        $this->email->to($email_to);
        $this->email->subject($subject);
        $this->email->message(nl2br($reply));

        if ($this->email->send()) {
            $this->Contact_model->mark_as_replied($id);
            $this->session->set_flashdata('success', 'Balasan berhasil dikirim.');
        } else {
            echo $this->email->print_debugger(); // Debug error
            exit; // Stop biar bisa lihat errornya
            $this->session->set_flashdata('error', 'Gagal mengirim email.');
        }


        redirect('contact/contact_messages');
    }

    // Fungsi untuk menghapus pesan berdasarkan ID
    public function delete_message($id)
    {
        // Cek id, apakah valid
        if ($this->Contact_model->delete_message($id)) {
            $this->session->set_flashdata('success', 'Pesan berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus pesan. Mungkin ID tidak ditemukan.');
        }
        redirect('contact/contact_messages');
    }
}
