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

    private function _view($param, $param1)
    {
        $this->load->view('kurir/_partials/head', $param1);
        $this->load->view('kurir/_partials/sidebar', $param1);
        $this->load->view('kurir/_partials/navbar', $param1);
        $this->load->view('kurir/' . $param, $param1);
        $this->load->view('kurir/_partials/footer', $param1);
        $this->load->view('kurir/_partials/scrolltop', $param1);
        $this->load->view('kurir/_partials/modal', $param1);
        $this->load->view('kurir/_partials/js', $param1);
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('overview', $data);
    }
}
