<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('auth/_partial/header');
        $this->load->view('auth/login');
        $this->load->view('auth/_partial/footer');
    }

    public function register()
    {
        $this->form_validation->set_rules('fullname', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password not match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[6]|matches[password1]');

        if ($this->form_validation->run()) {
            echo 'berhasil';
        } else {
            $this->load->view('auth/_partial/header');
            $this->load->view('auth/register');
            $this->load->view('auth/_partial/footer');
        }
    }
}
