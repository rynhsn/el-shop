<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('checkout_model');
        is_logged_in();
    }

    private function _view($page, $data)
    {
        $data['unconfirm']  = $this->checkout_model->getWhere('status_trx', 'Waiting for Confirmation')->result_array();
        $data['proccess']   = $this->checkout_model->getWhere('status_trx', 'In Proccess')->result_array();

        $this->load->view('admin/_partials/head', $data);
        $this->load->view('admin/_partials/sidebar', $data);
        $this->load->view('admin/_partials/navbar', $data);
        $this->load->view('admin/user/' . $page, $data);
        $this->load->view('admin/_partials/footer', $data);
        $this->load->view('admin/_partials/scrolltop', $data);
        $this->load->view('admin/_partials/modal', $data);
        $this->load->view('admin/_partials/js', $data);
    }

    public function index()
    {
        $data['users'] = $this->user_model->getAll();

        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('list', $data);
    }

    public function add()
    {
        $user = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rulesAdd());

        if ($validation->run()) {
            $user->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/users/add');
        }

        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('new_form', $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/users');

        $user = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rulesUpdate());

        if ($validation->run()) {
            $user->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data['user'] = $user->getById($id);
        if (!$data['user']) show_404();


        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('edit_form', $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->user_model->delete($id)) {
            $this->session->set_flashdata('message', 'Berhasil dihapus');
            redirect(site_url('admin/users'));
        }
    }

    public function active($id, $status)
    {
        if ($status == 'activate') {
            $this->is_active = 1;
            $this->db->update('users', $this, array('id_user' => $id));
            $this->session->set_flashdata('message', 'Berhasil diaktifkan');
        } elseif ($status == 'inactivate') {
            $this->is_active = 0;
            $this->db->update('users', $this, array('id_user' => $id));
            $this->session->set_flashdata('message', 'Berhasil dinonaktifkan');
        }
        redirect('admin/users');
    }

    public function editpass($id)
    {
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');

        if ($this->form_validation->run()) {
            $this->user_model->editpassword($id);
            $this->session->set_flashdata('message', 'Password berhasil diubah');
        } else {
            $this->session->set_flashdata('error', 'Password gagal diubah, pastikan lebih dari 6 karakter!');
        }
        redirect('admin/users');
    }
}
