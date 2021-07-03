<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('checkout_detail_model', 'checkout_detail');
        $this->load->model('checkout_model', 'checkout');
        $this->load->model('category_model', 'category');
        $this->load->model('product_model', 'product');
        $this->load->model('user_model', 'user');
        $this->load->helper('string');
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
            $redirect_page = base_url('shop/cart');
        } else {
            $post       = $this->input->post();
            $id         = $post['id'];
            $qty        = $post['qty'];
            $price      = $post['price'];
            $name       = $post['name'];
            $image       = $post['image'];
            $redirect_page = $post['redirect_page'];

            $product    = $this->product->getById($id);
            if ($product['stock'] < $this->input->post('qty')) {
                $this->session->set_flashdata('message', 'Qty cannot be more than stock.');
                redirect('shop/detail/' . $product['product_slug']);
            }
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
        redirect('shop/cart');
    }

    public function remove($param)
    {
        $this->cart->remove($param);
        $this->session->set_flashdata('message', 'The cart has been remove.');
        redirect('shop/cart');
    }


    public function check_out()
    {
        $email              = $this->session->userdata('email');
        $data['user']       = $this->db->get_where('users', ['email' => $email])->row_array();
        $data['trx_code']   = 'TRX' . date('dmY') . strtoupper(random_string('alnum', 8));

        $items  = $this->cart->contents();

        if ($items) {

            $validation = $this->form_validation;
            $validation->set_rules($this->checkout->rules());
            if ($validation->run()) {
                $this->checkout->add();

                foreach ($items as $item) {
                    $data = array(
                        'trx_id' => $this->input->post('id_trx'),
                        'product_id' => $item['id'],
                        'price' => $item['price'],
                        'qty' => $item['qty'],
                        'sub_total' => $item['subtotal']
                    );
                    $this->checkout_detail->add($data);
                }
                $this->cart->destroy();
                $this->session->set_flashdata('message', 'Checkout success.');
                redirect('member/history');
            }

            if (!$email) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-warning rounded-pill" role="alert">
                    Please login for checkout!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
                );
                redirect('login');
            }

            $this->_view('check-out', $data);
        } else {
            redirect('shop');
        }
    }

    public function _view($page, $data)
    {
        $email              = $this->session->userdata('email');
        $data['user']       = $this->db->get_where('users', ['email' => $email])->row_array();

        $data['site']   = $this->config_model->get();
        $data['items']  = $this->cart->contents();

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/navbar', $data);
        $this->load->view('home/' . $page, $data);
        $this->load->view('_partials/footer', $data);
    }
}
