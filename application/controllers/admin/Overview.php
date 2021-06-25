<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Overview extends CI_Controller
{

    public function index()
    {

        $this->load->view('admin/_partials/head');
        $this->load->view('admin/_partials/sidebar');
        $this->load->view('admin/_partials/navbar');
        $this->load->view('admin/overview');
        $this->load->view('admin/_partials/footer');
        $this->load->view('admin/_partials/scrolltop');
        $this->load->view('admin/_partials/modal');
        $this->load->view('admin/_partials/js');
    }
}
