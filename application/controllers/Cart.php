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
    public function add($id = null)
    {
        if ($id) {
            $product    = $this->product->getById($id);
            $id         = $product['id_product'];
            $qty        = 1;
            $price      = $product['price'];
            $name       = $product['name'];
            $image      = $product['image'];
            $redirect_page = base_url('cart');
        } else {
            $post       = $this->input->post();
            $id         = $post['id'];
            $qty        = $post['qty'];
            $price      = $post['price'];
            $name       = $post['name'];
            $image       = $post['image'];
            $redirect_page = $post['redirect_page'];
        }

        // proses masukkan ke cart
        $data = array(
            'id'      => $id,
            'qty'     => $qty,
            'price'   => $price,
            'name'    => $name,
            'options' => array('image' => $image)
        );

        $this->cart->insert($data);
        redirect($redirect_page);
    }

    public function update()
    {
        $num = count($this->input->post('rowid[]'));
        for ($i = 0; $i < $num; $i++) {
            $data[$i] = array(
                'rowid' => $this->input->post('rowid[' . $i . ']'),
                'qty'   => $this->input->post('qty[' . $i . ']')
            );
            $this->cart->update($data[$i]);
        }


        $this->session->set_flashdata('message', 'The cart has been update.');
        redirect(base_url('cart'));
    }

    public function remove($param)
    {
        $this->cart->remove($param);
        $this->session->set_flashdata('message', 'The cart has been remove.');
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
