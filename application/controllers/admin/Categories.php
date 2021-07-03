<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('checkout_model');
        is_logged_in();
    }

    private function _view($page, $data)
    {
        $data['unconfirm']  = $this->checkout_model->getWhere('status_trx', 'Waiting for Confirmation')->result_array();
        $data['proccess']   = $this->checkout_model->getWhere('status_trx', 'In Proccess')->result_array();

        $this->load->view('admin/_partials/head', $data);
        $this->load->view('admin/_partials/sidebar', $data);
        $this->load->view('admin/_partials/navbar', $data);
        $this->load->view('admin/category/' . $page, $data);
        $this->load->view('admin/_partials/footer', $data);
        $this->load->view('admin/_partials/scrolltop', $data);
        $this->load->view('admin/_partials/modal', $data);
        $this->load->view('admin/_partials/js', $data);
    }

    public function index()
    {
        $data['categories'] = $this->category_model->getAll();

        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('list', $data);
    }

    public function add()
    {
        $category = $this->category_model;
        $validation = $this->form_validation;
        $validation->set_rules($category->rules());

        if ($validation->run()) {
            $category->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/categories/add');
        }

        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();
        $this->_view('new_form', $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/categories');

        $category = $this->category_model;
        $validation = $this->form_validation;
        $validation->set_rules($category->rules());

        if ($validation->run()) {
            $category->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data['category'] = $category->getById($id);
        if (!$data['category']) show_404();


        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('edit_form', $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->category_model->delete($id)) {
            $this->session->set_flashdata('message', 'Berhasil dihapus');
            redirect(site_url('admin/categories'));
        }
    }
}
