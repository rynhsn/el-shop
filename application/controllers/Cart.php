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
    public function add()
    {
        $post = $this->input->post();

        $id = $post['id'];
        $qty = $post['qty'];
        $price = $post['price'];
        $name = $post['name'];
        $image = $post['image'];
        $redirect = $post['redirect_page'];

        // proses masukkan ke cart
        $data = array(
            'id'      => $id,
            'qty'     => $qty,
            'price'   => $price,
            'name'    => $name,
            'options'    => array('image' => $image)
        );

        $this->cart->insert($data);

        redirect($redirect);
    }

    public function _view($page, $data)
    {
        $data['site'] = $this->config_model->get();

        $this->load->view('home/_partials/header', $data);
        $this->load->view('home/_partials/navbar', $data);
        $this->load->view('home/' . $page, $data);
        $this->load->view('home/_partials/footer', $data);
    }
}
