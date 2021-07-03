<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Overview extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('category_model', 'category');
        // $this->load->model('product_model', 'product');
        // $this->load->model('image_model', 'image');
        $this->load->model('user_model', 'user');
        $this->load->model('account_model', 'account');
        $this->load->model('checkout_model', 'checkout');
        $this->load->model('checkout_detail_model', 'checkout_detail');
        is_logged_in();
    }

    public function index()
    {
        $email              = $this->session->userdata('email');
        $data['user']       = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('overview', $data);
    }

    public function history($param = null)
    {
        $email              = $this->session->userdata('email');
        $data['user']       = $this->db->get_where('users', ['email' => $email])->row_array();
        $data['history']    = $this->checkout->getWhere('user_id', $data['user']['id_user'])->result_array();

        if ($param) {
            $data['trx']    = $this->checkout->getWhere('id_trx', $param)->row_array();

            if ($data['user']['id_user'] != $data['trx']['user_id']) {
                redirect('auth/blocked');
            }

            $data['detail']        = $this->checkout_detail->getWhere($data['trx']['id_trx']);
            $this->_view('history_detail', $data);
        } else {
            $this->_view('history', $data);
        }
    }

    public function profile()
    {
        $email              = $this->session->userdata('email');
        $data['user']       = $this->db->get_where('users', ['email' => $email])->row_array();

        $validation = $this->form_validation;
        $validation->set_rules($this->user->rulesUpdate());


        if ($validation->run()) {

            $this->user->update();

            $this->session->set_flashdata('message', 'Your profile has been update.');
            redirect('member/profile');
        }

        $this->_view('profile', $data);
    }

    public function changepassword()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[6]|matches[new_password1]');
        $this->form_validation->set_rules('new_password1', 'Repeat Password', 'trim|required|min_length[6]|matches[new_password]');

        if ($this->form_validation->run()) {
            # code...
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('wrong', 'Wrong password!');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('wrong', 'New Password cannot be the same as current password!');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $data['user']['email']);
                    $this->db->update('users');
                    $this->session->set_flashdata('message', 'Your password has been changed!');
                }
            }
        }

        $this->_view('change-password', $data);
    }

    public function payout($param)
    {
        $email              = $this->session->userdata('email');
        $data['user']       = $this->db->get_where('users', ['email' => $email])->row_array();

        if (!$param) redirect($data['user']['role']);

        $data['accounts']   = $this->account->getAll();
        $data['trx']        = $this->checkout->getById($param);


        $validation = $this->form_validation;
        $validation->set_rules($this->checkout->rulesPay());

        if ($validation->run()) {

            $this->checkout->update($param);

            $this->session->set_flashdata('message', 'Thank you, we will process your order soon.');
            redirect('member/history');
        }

        $this->_view('payout', $data);
    }

    public function accept($param)
    {
        if (!$param) redirect('member/history');

        $this->status_trx = 'Success';
        $this->db->update('checkout', $this, array('id_trx' => $param));

        $this->session->set_flashdata('message', 'Order has been received, happy shopping :)');
        redirect('member/history');
    }

    public function _view($page, $data)
    {
        $data['site']        = $this->config_model->get();

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/navbar', $data);
        $this->load->view('member/' . $page, $data);
        $this->load->view('_partials/footer', $data);
    }
}
