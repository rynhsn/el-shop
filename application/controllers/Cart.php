<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
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
        $data = null;

        $this->_view('cart', $data);
    }
    public function add($id)
    {
        $post = $this->input->post();

        $product = $this->product->getById($id);

        // proses masukkan ke cart
        $data = array(
            'id'      => $product['id_product'],
            'qty'     => 1,
            'price'   => $product['price'],
            'name'    => $product['name'],
            'options' => array('image' => $product['image'])
        );

        $this->cart->insert($data);
        redirect(base_url('cart'));
    }

    public function _view($page, $data)
    {
        $data['site']   = $this->config_model->get();
        $data['items']  = $this->cart->contents();

        $this->load->view('home/_partials/header', $data);
        $this->load->view('home/_partials/navbar', $data);
        $this->load->view('home/' . $page, $data);
        $this->load->view('home/_partials/footer', $data);
    }
}
