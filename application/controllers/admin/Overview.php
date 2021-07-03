<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Overview extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model', 'products');
        $this->load->model('checkout_model', 'checkout');
        is_logged_in();
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $year       = date('Y');
        $month      = date('m');
        $monthly    = $this->checkout->getByDate('month(tgl_trx)', $month);
        $annual     = $this->checkout->getByDate('year(tgl_trx)', $year);

        $data['pay']        = $this->checkout->getWhere('status_trx', 'Waiting Payment')->result_array();
        $data['unconfirm']  = $this->checkout->getWhere('status_trx', 'Waiting for Confirmation')->result_array();
        $data['proccess']   = $this->checkout->getWhere('status_trx', 'In Proccess')->result_array();
        $data['delivery']   = $this->checkout->getWhere('status_trx', 'Delivery')->result_array();
        $data['arrived']    = $this->checkout->getWhere('status_trx', 'Arrived')->result_array();
        $data['success']    = $this->checkout->getWhere('status_trx', 'Success')->result_array();

        $data['monthly']    = $monthly['jumlah'];
        $data['annual']     = $annual['jumlah'];

        $this->_view('overview', $data);
    }

    private function _view($page, $data)
    {
        $this->load->view('admin/_partials/head', $data);
        $this->load->view('admin/_partials/sidebar', $data);
        $this->load->view('admin/_partials/navbar', $data);
        $this->load->view('admin/' . $page, $data);
        $this->load->view('admin/_partials/footer', $data);
        $this->load->view('admin/_partials/scrolltop', $data);
        $this->load->view('admin/_partials/modal', $data);
        $this->load->view('admin/_partials/js', $data);
    }
}
