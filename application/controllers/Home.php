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
        // $data['categories'] = $this->category->getAll();
        $data['products'] = $this->product->home();
        // $data = null;
        if ($this->session->userdata('email')) {
            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        }

        $this->_view('index', $data);
    }

    public function shop()
    {
        // $data['categories'] = $this->category->getAll();
        $data['products'] = $this->product->home();

        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('users', ['email' => $email])->row_array();


        $this->_view('shop', $data);
    }
    public function shop_detail()
    {
        // $data['categories'] = $this->category->getAll();
        // $data['products'] = $this->product->home();


        // if ($sort) {
        //     $data['products'] = $this->product->getWhere('category_id', $sort)->result_array();
        //     $data['total_product'] = $this->product->getWhere('category_id', $sort)->num_rows();
        // } else {
        //     $data['products'] = $this->product->getAll();
        //     $data['total_product'] = $this->db->get('products')->num_rows();
        // }

        // $data['products'] = $this->product->getAll();
        // $data['total_product'] = $this->db->get('products')->num_rows();


        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('detail-shop', $data);
    }

    public function blogs()
    {
        // $data['categories'] = $this->category->getAll();
        // $data['products'] = $this->product->getAll();

        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('blogs', $data);
    }
    public function blog_detail()
    {
        // $data['categories'] = $this->category->getAll();
        // $data['products'] = $this->product->getAll();

        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('blog-detail', $data);
    }

    public function about()
    {
        // $data['categories'] = $this->category->getAll();
        // $data['products'] = $this->product->getAll();

        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('about', $data);
    }

    public function contact()
    {
        // $data['categories'] = $this->category->getAll();
        // $data['products'] = $this->product->getAll();

        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('contact', $data);
    }

    public function _view($page, $data)
    {
        $data['site'] = $this->config_model->get();
        $data['nav_product'] = $this->config_model->nav_product();

        $this->load->view('home/_partials/header', $data);
        $this->load->view('home/_partials/navbar', $data);
        $this->load->view('home/' . $page, $data);
        $this->load->view('home/_partials/footer', $data);
    }
}
