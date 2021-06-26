<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model', 'category');
        $this->load->model('product_model', 'product');
    }

    public function index()
    {
        $data['categories'] = $this->category->getAll();

        $this->_view('index', $data);
    }

    public function shop()
    {
        $data['categories'] = $this->category->getAll();
        $data['products'] = $this->product->getAll();

        $this->_view('shop', $data);
    }

    public function _view($page, $data)
    {
        $this->load->view('customer/_partials/header', $data);
        $this->load->view('customer/_partials/navbar', $data);
        $this->load->view('customer/' . $page, $data);
        $this->load->view('customer/_partials/footer', $data);
    }
}