<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Overview extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();

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
