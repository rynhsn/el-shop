<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Config extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('config_model');
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
        $this->load->view('admin/config/' . $page, $data);
        $this->load->view('admin/_partials/footer', $data);
        $this->load->view('admin/_partials/scrolltop', $data);
        $this->load->view('admin/_partials/modal', $data);
        $this->load->view('admin/_partials/js', $data);
    }

    public function index()
    {
        $config = $this->config_model;
        $data['config'] = $config->get();

        $validation = $this->form_validation;
        $validation->set_rules($config->rules());

        // var_dump($data['config']['id_config']);
        // die;
        if ($validation->run()) {
            $config->update($data['config']['id_config']);
            $this->session->set_flashdata('message', 'Berhasil disimpan');
            redirect('admin/config');
        }

        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('basic', $data);
    }

    public function logo()
    {
        $config = $this->config_model;
        $data['config'] = $config->get();

        $validation = $this->form_validation;
        $validation->set_rules('site_name', 'Site Name', 'trim|required');

        // var_dump($data['config']['id_config']);
        // die;
        if ($validation->run()) {
            $config->updateLogo($data['config']['id_config']);
            $this->session->set_flashdata('message', 'Berhasil disimpan');
            redirect('admin/config/logo');
        }

        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('logo', $data);
    }

    public function icon()
    {
        $config = $this->config_model;
        $data['config'] = $config->get();

        $validation = $this->form_validation;
        $validation->set_rules('site_name', 'Site Name', 'trim|required');

        // var_dump($data['config']['id_config']);
        // die;
        if ($validation->run()) {
            $config->updateIcon($data['config']['id_config']);
            $this->session->set_flashdata('message', 'Berhasil disimpan');
            redirect('admin/config/icon');
        }

        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $this->_view('icon', $data);
    }
}
