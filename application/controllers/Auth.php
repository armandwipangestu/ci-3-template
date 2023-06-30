<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
    }

    public function index()
    {
        $this->_sudahLogin();
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            "required" => "Email tidak boleh kosong",
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            "required" => "Password tidak boleh kosong",
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = getenv('APP_NAME') . " - Masuk";
            $this->load->view('layout/header', $data);
            $this->load->view('auth/login');
        } else {
            $this->_masuk();
        }
    }

    private function _masuk()
    {
        $email = htmlspecialchars($this->input->post('email'), true);
        $password = $this->input->post('password');

        $user = $this->db->get_where('user_data', ['email' => $email])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                if ($user['role_id'] == 1) {
                    redirect('admin');
                } else {
                    redirect('user');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger ml-4 mr-4 neu-brutalism">Password salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger ml-4 mr-4 neu-brutalism">Email belum terdaftar</div>');
            redirect('auth');
        }
    }

    private function _sudahLogin()
    {
        if ($this->session->userdata('role_id') == 1) {
            redirect('admin');
        }
        if ($this->session->userdata('role_id') == 2) {
            redirect('user');
        }
    }

    public function daftar()
    {
        $this->_sudahLogin();
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Tidak boleh kosong']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user_data.email]', [
            'required' => 'Tidak boleh kosong',
            'is_unique' => 'Sudah digunakan'
        ]);
        $this->form_validation->set_rules('password', 'Kata Sandi', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Tidak boleh kosong',
            'matches' => '',
            'min_length' => 'Terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Konfirmasi Kata Sandi', 'required|trim|matches[password]', [
            'required' => 'Tidak boleh kosong',
            'matches' => 'Tidak sama',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = getenv("APP_NAME") . " - Daftar";
            $this->load->view('layout/header', $data);
            $this->load->view('auth/daftar');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'date_created' => time()
            ];

            $this->db->insert('user_data', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mr-4 neu-brutalism">Akun berhasil dibuat! Silahkan Masuk</div>');
            redirect('auth');
        }
    }

    public function keluar()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mr-4 neu-brutalism">Anda telah keluar!</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $data['title'] = 'ERROR';
        $data['error_code'] = "403";
        $data['error_message'] = "Access Fobidden";
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('auth/blocked', $data);
        $this->load->view('layout/footer');
    }
}
