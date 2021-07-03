<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shipping extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('checkout_model', 'checkout');
        is_logged_in();
    }

    private function _view($param, $data)
    {
        $data['delivery']  = $this->checkout->getWhere('status_trx', 'Delivery')->result_array();

        $this->load->view('kurir/_partials/head', $data);
        $this->load->view('kurir/_partials/sidebar', $data);
        $this->load->view('kurir/_partials/navbar', $data);
        $this->load->view('kurir/' . $param, $data);
        $this->load->view('kurir/_partials/footer', $data);
        $this->load->view('kurir/_partials/scrolltop', $data);
        $this->load->view('kurir/_partials/modal', $data);
        $this->load->view('kurir/_partials/js', $data);
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $data['transactions'] = $this->checkout->getWhere('status_trx', 'Delivery')->result_array();


        $this->_view('shipping', $data);
    }

    public function finish($param)
    {
        if (!$param) redirect('kurir/delivery');

        $this->status_trx = 'Arrived';
        $this->db->update('checkout', $this, array('id_trx' => $param));

        $this->session->set_flashdata('message', 'Berhasil, Pesanan telah sampai di tujuan!');
        redirect('kurir/shipping');
    }
}
