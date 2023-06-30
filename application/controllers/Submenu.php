<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submenu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_sudah_masuk();
    }

    public function index()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required', [
            'required' => 'Title tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('menu_id', 'Menu', 'required', [
            'required' => 'Menu tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('url', 'Url', 'required', [
            'required' => 'Alamat Url tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('icon', 'Icon', 'required', [
            'required' => 'Nama Icon tidak boleh kosong',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('submenu/index', $data);
            $this->load->view('layout/footer');
        } else {

            $sub_menu = $this->input->post('title');
            $data = [
                'menu_id' => htmlspecialchars($this->input->post('menu_id', true)),
                'title' => htmlspecialchars($this->input->post('title', true)),
                'url' => htmlspecialchars($this->input->post('url', true)),
                'icon' => htmlspecialchars($this->input->post('icon', true)),
            ];

            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success neu-brutalism mb-4">Submenu <b>' . $sub_menu . '</b> berhasil ditambahkan!</div>');
            redirect('submenu');
        }
    }

    public function ubah()
    {
        $this->form_validation->set_rules('title', 'Title', 'required', [
            'required' => 'Title tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('menu_id', 'Menu', 'required', [
            'required' => 'Menu tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('url', 'Url', 'required', [
            'required' => 'Alamat Url tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('icon', 'Icon', 'required', [
            'required' => 'Nama Icon tidak boleh kosong',
        ]);

        if ($this->form_validation->run() == false) {
        } else {
            $id = htmlspecialchars($this->input->post('id', true));

            $data = [
                'title' => htmlspecialchars($this->input->post('title')),
                'menu_id' => htmlspecialchars($this->input->post('menu_id')),
                'url' => htmlspecialchars($this->input->post('url')),
                'icon' => htmlspecialchars($this->input->post('icon')),
            ];

            $this->db->where('id', $id);
            $this->db->update('user_sub_menu', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success neu-brutalism mb-4">Submenu <b>' . $data['title'] . '</b> berhasil diubah!</div>'
            );
            redirect("submenu");
        }
    }

    public function hapus()
    {
        $sub_menu_id = $this->uri->segment(3);
        $sub_menu_name = $this->db->get_where('user_sub_menu', ['id' => $sub_menu_id])->row_array()['title'];
        $this->db->where('id', $sub_menu_id);
        $this->db->delete('user_sub_menu');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger neu-brutalism mb-4">Submenu <b>' . $sub_menu_name . '</b> berhasil dihapus!</div>'
        );
        redirect('submenu');
    }

    public function get_submenu($id)
    {
        $submenu = $this->db->query('SELECT 
        `user_sub_menu`.*, `user_menu`.menu 
        FROM user_sub_menu JOIN user_menu ON `user_sub_menu`.menu_id = `user_menu`.id WHERE `user_sub_menu`.id = ' . $id . '')->row();

        $menus = $this->db->query('SELECT id, menu FROM user_menu')->result();

        $submenu->menus = $menus;

        exit(json_encode((array)$submenu));
    }
}
