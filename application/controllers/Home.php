<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model', 'category');
        $this->load->model('product_model', 'product');
        $this->load->model('user_model', 'user');
    }

    public function index()
    {
        $data['categories'] = $this->category->getAll();
        $data['products'] = $this->product->getAll();

        if ($this->session->userdata('email')) {
            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        }

        $this->_view('index', $data);
    }

    public function shop()
    {
        $data['categories'] = $this->category->getAll();
        $data['products'] = $this->product->getAll();

        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('shop', $data);
    }
    public function shop_detail()
    {
        $data['categories'] = $this->category->getAll();
        $data['products'] = $this->product->getAll();

        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('detail-shop', $data);
    }

    public function blogs()
    {
        $data['categories'] = $this->category->getAll();
        $data['products'] = $this->product->getAll();

        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('blogs', $data);
    }

    public function about()
    {
        $data['categories'] = $this->category->getAll();
        $data['products'] = $this->product->getAll();

        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('about', $data);
    }

    public function contact()
    {
        $data['categories'] = $this->category->getAll();
        $data['products'] = $this->product->getAll();

        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('contact', $data);
    }

    public function _view($page, $data)
    {
        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/navbar', $data);
        $this->load->view($page, $data);
        $this->load->view('_partials/footer', $data);
    }
}
