<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', 'user');
        is_logged_in();
    }

    private function _view($page, $data)
    {
        $this->load->view('kurir/_partials/head', $data);
        $this->load->view('kurir/_partials/sidebar', $data);
        $this->load->view('kurir/_partials/navbar', $data);
        $this->load->view('kurir/' . $page, $data);
        $this->load->view('kurir/_partials/footer', $data);
        $this->load->view('kurir/_partials/scrolltop', $data);
        $this->load->view('kurir/_partials/modal', $data);
        $this->load->view('kurir/_partials/js', $data);
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->form_validation->set_rules($this->user->rulesUpdate());

        if ($this->form_validation->run()) {
            $this->user->update();

            $this->session->set_flashdata('message', 'Your profile has been update.');
            redirect('kurir/profile');
        }

        $this->_view('profile', $data);
    }
}
