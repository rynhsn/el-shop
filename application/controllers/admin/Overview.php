<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller {

    public function index(){

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebar');
        $this->load->view('_partials/navbar');
        $this->load->view('admin/overview');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/scrolltop');
        $this->load->view('_partials/modal');
        $this->load->view('_partials/js');
    }
}