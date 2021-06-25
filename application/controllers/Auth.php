<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', 'user');
    }

    public function index()
    {
        $this->load->view('auth/_partial/header');
        $this->load->view('auth/login');
        $this->load->view('auth/_partial/footer');
    }

    public function register()
    {
        $this->form_validation->set_rules('full_name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[users.email]',
            [
                'is_unique' => 'This email has already registered!'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[6]|matches[password1]',
            [
                'matches' => 'Password not match!',
                'min_length' => 'Password too short!'
            ]
        );
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password]');

        if ($this->form_validation->run()) {
            $this->user->save();
            $this->session->set_flashdata('message', 'Congratulation! your account has been created.');
            redirect('login');
        } else {
            // echo 'salah';
            $this->load->view('auth/_partial/header');
            $this->load->view('auth/register');
            $this->load->view('auth/_partial/footer');
        }
    }
}
