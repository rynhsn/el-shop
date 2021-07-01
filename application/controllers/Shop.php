<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model', 'category');
        $this->load->model('product_model', 'product');
        $this->load->model('image_model', 'image');
        $this->load->model('user_model', 'user');
    }

    public function index()
    {
        $email              = $this->session->userdata('email');
        $data['user']       = $this->db->get_where('users', ['email' => $email])->row_array();

        // $data['categories']   = $this->product->getCat();
        $total              = $this->product->total();

        $this->load->library('pagination');

        $config['base_url']         = base_url('shop');
        $config['total_rows']       = $total['total'];
        $config['use_page_numbers']  = true;
        $config['per_page']         = 9;
        $config['uri_segment']      = 2;
        $config['num_links']        = 5;
        $config['full_tag_open'] = '<div class="row mr-5 float-right custom-pagination">';
        $config['full_tag_close'] = '</div>';
        $config['num_tag_open'] = '<div class="col-sm-0 custom-pagination">';
        $config['num_tag_close'] = '</div>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<div class="col-sm-0 custom-pagination">';
        $config['first_tag_close'] = '</div>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<div class="col-sm-0 custom-pagination">';
        $config['last_tag_close'] = '</div>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<div class="col-sm-0 custom-pagination">';
        $config['next_tag_close'] = '</div>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<div class="col-sm-0 custom-pagination">';
        $config['prev_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<strong>';
        $config['cur_tag_close'] = '</strong>';
        $config['first_url']        = base_url('shop/');

        $this->load->library('pagination');

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) * $config['per_page'] : 0;

        $data['products']   = $this->product->getProduct($config['per_page'], $page);
        $data['page']       = $this->pagination->create_links();

        $this->_view('shop', $data);
    }

    public function category($param)
    {
        $email              = $this->session->userdata('email');
        $data['user']       = $this->db->get_where('users', ['email' => $email])->row_array();

        $data['category']   = $this->category->getBySlug($param);
        $id                 = $data['category']['id_category'];

        $total              = $this->product->totalCategory($id);

        $this->load->library('pagination');

        $config['base_url']         = base_url('shop/category/' . $data['category']['category_slug']);
        $config['total_rows']       = $total['total'];
        $config['use_page_numbers']  = true;
        $config['per_page']         = 9;
        $config['uri_segment']      = 4;
        $config['num_links']        = 5;
        $config['full_tag_open'] = '<div class="row mr-5 float-right custom-pagination">';
        $config['full_tag_close'] = '</div>';
        $config['num_tag_open'] = '<div class="col-sm-0 custom-pagination">';
        $config['num_tag_close'] = '</div>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<div class="col-sm-0 custom-pagination">';
        $config['first_tag_close'] = '</div>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<div class="col-sm-0 custom-pagination">';
        $config['last_tag_close'] = '</div>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<div class="col-sm-0 custom-pagination">';
        $config['next_tag_close'] = '</div>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<div class="col-sm-0 custom-pagination">';
        $config['prev_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<strong>';
        $config['cur_tag_close'] = '</strong>';
        $config['first_url']        = base_url('shop/category/' . $data['category']['category_slug']);

        $this->load->library('pagination');

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? ($this->uri->segment(4) - 1) * $config['per_page'] : 0;

        $data['products']   = $this->product->getCategory($id, $config['per_page'], $page);
        $data['page']       = $this->pagination->create_links();


        $this->_view('shop', $data);
    }

    public function product_detail($param)
    {
        $email              = $this->session->userdata('email');
        $data['user']       = $this->db->get_where('users', ['email' => $email])->row_array();

        $data['product']    = $this->product->getBySlug($param);
        $data['images']     = $this->image->getWhere($data['product']['id_product']);
        $data['related']    = $this->product->home();

        // var_dump($product);
        // die;

        $this->_view('detail-shop', $data);
    }

    public function _view($page, $data)
    {
        $data['site']        = $this->config_model->get();
        $data['nav_product'] = $this->config_model->nav_product();

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/navbar', $data);
        $this->load->view('home/' . $page, $data);
        $this->load->view('_partials/footer', $data);
    }
}
