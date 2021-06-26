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
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run()) {
            $this->_login();
        } else {
            $this->load->view('auth/_partial/header');
            $this->load->view('auth/login');
            $this->load->view('auth/_partial/footer');
        }
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
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success rounded-pill" role="alert">
                    Congratulation! your account has been created.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('login');
        } else {
            // echo 'salah';
            $this->load->view('auth/_partial/header');
            $this->load->view('auth/register');
            $this->load->view('auth/_partial/footer');
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger rounded-pill" role="alert">
                    This email is not registered!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('login');
        }
    }
}
