<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_sudah_masuk();
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', "Menu", 'required|is_unique[user_menu.menu]', [
            'required' => 'Nama Menu tidak boleh kosong',
            'is_unique' => 'Menu ' . $this->input->post('menu') .  ' sudah ada!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('layout/footer');
        } else {
            $menu = $this->input->post('menu');
            $this->db->insert('user_menu', ['menu' => $menu]);
            $this->session->set_flashdata('message', '<div class="alert alert-success neu-brutalism mb-4">Menu <b>' . $menu . '</b> berhasil ditambahkan!</div>');
            redirect('menu');
        }
    }

    public function ubah()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', "Menu", 'required|is_unique[user_menu.menu]', [
            'required' => 'Nama Menu tidak boleh kosong',
            'is_unique' => 'Menu ' . $this->input->post('menu') .  ' sudah ada!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('layout/footer');
        } else {
            $id = $this->input->post('id');
            $menu = $this->input->post('menu');
            $menuSebelum = $this->db->get_where('user_menu', ['id' => $id])->row_array();

            $this->db->where('id', $id);
            $this->db->update('user_menu', ['menu' => $menu]);

            $this->session->set_flashdata('message', '<div class="alert alert-warning neu-brutalism mb-4">Menu <b>' . $menuSebelum['menu'] . '</b> berhasil diubah menjadi <b>' . $menu . '</b>!</div>');
            redirect('menu');
        }
    }

    public function hapus()
    {
        $menu_id = $this->uri->segment(3);
        $menu_name = $this->db->get_where('user_menu', ['id' => $menu_id])->row_array()['menu'];
        $this->db->where('id', $menu_id);
        $this->db->delete('user_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-danger neu-brutalism mb-4">Menu <b>' . $menu_name . '</b> berhasil dihapus!</div>');
        redirect("menu");
    }

    public function get_menu($id)
    {
        $menu = $this->db->query('SELECT * FROM user_menu WHERE id = ' . $id . '')->row();
        exit(json_encode((array)$menu));
    }
}
