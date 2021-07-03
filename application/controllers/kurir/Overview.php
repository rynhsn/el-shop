<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Overview extends CI_Controller
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

        $this->_view('overview', $data);
    }
}
