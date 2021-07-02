<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transactions extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('checkout_model', 'checkout');
        $this->load->model('checkout_detail_model', 'checkout_detail');
        $this->load->model('account_model', 'account');
        $this->load->helper('string');

        is_logged_in();
    }

    private function _view($page, $data)
    {
        $this->load->view('admin/_partials/head', $data);
        $this->load->view('admin/_partials/sidebar', $data);
        $this->load->view('admin/_partials/navbar', $data);
        $this->load->view('admin/transaction/' . $page, $data);
        $this->load->view('admin/_partials/footer', $data);
        $this->load->view('admin/_partials/scrolltop', $data);
        $this->load->view('admin/_partials/modal', $data);
        $this->load->view('admin/_partials/js', $data);
    }
    public function index()
    {
        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $data['transactions'] = $this->checkout->get();

        $this->_view('list', $data);
    }

    public function detail($param)
    {
        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();
        $data['trx'] = $this->checkout->getById($param);
        $data['transactions'] = $this->checkout_detail->getWhere($param);

        $this->_view('detail', $data);
    }

    public function proccess($param)
    {
        if (!$param) redirect('admin/transactions');

        $this->db->update('checkout', ['status_trx' => 'In Proccess'], array('id_trx' => $param));
        $this->session->set_flashdata('message', 'Berhasil, segera dikirim!');
        redirect('admin/transactions/detail/' . $param);
    }

    public function send($param)
    {
        if (!$param) redirect('admin/transactions');

        $this->status_trx = 'Delivery';
        $this->kode_resi = date('dmY') . strtoupper(random_string('alnum', 6));
        $this->db->update('checkout', $this, array('id_trx' => $param));
        $this->session->set_flashdata('message', 'Berhasil, Kode resi telah ditambahkan!');
        redirect('admin/transactions/detail/' . $param);
    }
}

/* End of file Transactions.php and path /application/controllers/admin/Transaction.php */
