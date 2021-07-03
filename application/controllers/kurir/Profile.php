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
        $data['delivery']  = $this->checkout->getWhere('status_trx', 'Delivery')->result_array();

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

    public function changepassword()
    {
        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[6]|matches[new_password1]');
        $this->form_validation->set_rules('new_password1', 'Repeat Password', 'trim|required|min_length[6]|matches[new_password]');

        if ($this->form_validation->run()) {
            # code...
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            if (!password_verify($current_password, $data['brainware']['password'])) {
                $this->session->set_flashdata('wrong', 'Wrong password!');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('wrong', 'New Password cannot be the same as current password!');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $data['brainware']['email']);
                    $this->db->update('users');
                    $this->session->set_flashdata('message', 'Your password has been changed!');
                }
            }
        }

        $this->_view('change-password', $data);
    }
}
