<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Accounts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('account_model');
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
        $this->load->view('admin/account/' . $page, $data);
        $this->load->view('admin/_partials/footer', $data);
        $this->load->view('admin/_partials/scrolltop', $data);
        $this->load->view('admin/_partials/modal', $data);
        $this->load->view('admin/_partials/js', $data);
    }

    public function index()
    {
        $data['accounts'] = $this->account_model->getAll();

        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('list', $data);
    }

    public function add()
    {
        $account = $this->account_model;
        $validation = $this->form_validation;
        $validation->set_rules($account->rules());

        if ($validation->run()) {
            $account->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/accounts/add');
        }

        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();
        $this->_view('new_form', $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/accounts');

        $account = $this->account_model;
        $validation = $this->form_validation;
        $validation->set_rules($account->rules());

        if ($validation->run()) {
            $account->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data['account'] = $account->getById($id);

        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('edit_form', $data);
    }

    public function active($id, $status)
    {
        if ($status == 'activate') {
            $this->is_active = 1;
            $this->db->update('accounts', $this, array('id_acc' => $id));
            $this->session->set_flashdata('message', 'Berhasil diaktifkan');
        } elseif ($status == 'inactivate') {
            $this->is_active = 0;
            $this->db->update('accounts', $this, array('id_acc' => $id));
            $this->session->set_flashdata('message', 'Berhasil dinonaktifkan');
        }
        redirect('admin/accounts');
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->account_model->delete($id)) {
            $this->session->set_flashdata('message', 'Berhasil dihapus');
            redirect(site_url('admin/accounts'));
        }
    }
}
