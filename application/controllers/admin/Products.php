<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('image_model');
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
        $this->load->view('admin/product/' . $page, $data);
        $this->load->view('admin/_partials/footer', $data);
        $this->load->view('admin/_partials/scrolltop', $data);
        $this->load->view('admin/_partials/modal', $data);
        $this->load->view('admin/_partials/js', $data);
    }

    public function index()
    {
        $data['products'] = $this->product_model->getAll();

        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('list', $data);
    }

    public function add()
    {
        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules('id_product', 'Product code', 'trim|required|is_unique[products.id_product]');
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/products/add');
        }

        $data['categories'] = $this->category_model->getAll();

        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('new_form', $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/products');

        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules('id_product', 'Product code', 'trim|required');
        $validation->set_rules($product->rules());


        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil diubah');
        }

        $data['categories'] = $this->category_model->getAll();
        $data['product'] = $product->getById($id);
        if (!$data['product']) show_404();

        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('edit_form', $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->product_model->delete($id)) {
            $this->session->set_flashdata('message', 'Berhasil dihapus');
            redirect(site_url('admin/products'));
        }
    }

    public function images($id)
    {
        $product = $this->product_model;
        $image = $this->image_model;

        $validation = $this->form_validation;
        $validation->set_rules($image->rules());

        if ($validation->run()) {
            $image->add($id);
            $this->session->set_flashdata('message', 'Berhasil disimpan');
            redirect('admin/products/images/' . $id);
        }

        $data['product'] = $product->getById($id);
        $data['images'] = $image->getWhere($id);
        // var_dump($data['images']);
        // die;
        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('images', $data);
    }

    public function delimage($id = null, $id_product = null)
    {
        if (!isset($id)) show_404();

        if ($this->image_model->delete($id)) {
            $this->session->set_flashdata('message', 'Berhasil dihapus');
            redirect(site_url('admin/products/images/' . $id_product));
        }
    }
}
