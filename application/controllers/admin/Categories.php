<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
    }

    public function index()
    {
        $data['categories'] = $this->category_model->getAll();

        $this->load->view('admin/_partials/head');
        $this->load->view('admin/_partials/sidebar');
        $this->load->view('admin/_partials/navbar');
        $this->load->view('admin/category/list', $data);
        $this->load->view('admin/_partials/footer');
        $this->load->view('admin/_partials/scrolltop');
        $this->load->view('admin/_partials/modal');
        $this->load->view('admin/_partials/js');
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

        $this->load->view('admin/_partials/head');
        $this->load->view('admin/_partials/sidebar');
        $this->load->view('admin/_partials/navbar');
        $this->load->view('admin/category/new_form');
        $this->load->view('admin/_partials/footer');
        $this->load->view('admin/_partials/scrolltop');
        $this->load->view('admin/_partials/modal');
        $this->load->view('admin/_partials/js');
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

        $this->load->view('admin/_partials/head');
        $this->load->view('admin/_partials/sidebar');
        $this->load->view('admin/_partials/navbar');
        $this->load->view('admin/category/edit_form', $data);
        $this->load->view('admin/_partials/footer');
        $this->load->view('admin/_partials/scrolltop');
        $this->load->view('admin/_partials/modal');
        $this->load->view('admin/_partials/js');
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