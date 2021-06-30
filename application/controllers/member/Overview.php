<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Overview extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model', 'category');
        $this->load->model('product_model', 'product');
        $this->load->model('image_model', 'image');
        $this->load->model('user_model', 'user');
        is_logged_in();
    }

    public function index()
    {
        $email              = $this->session->userdata('email');
        $data['user']       = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('profile', $data);
    }

    public function _view($page, $data)
    {
        $data['site']        = $this->config_model->get();
        $data['nav_product'] = $this->config_model->nav_product();

        $this->load->view('home/_partials/header', $data);
        $this->load->view('home/_partials/navbar', $data);
        $this->load->view('home/' . $page, $data);
        $this->load->view('home/_partials/footer', $data);
    }
}
