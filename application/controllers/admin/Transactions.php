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
        // $this->load->model('config_model', 'config');
        $this->load->helper('string');

        is_logged_in();
    }

    private function _view($page, $data)
    {
        $data['unconfirm']  = $this->checkout->getWhere('status_trx', 'Waiting for Confirmation')->result_array();
        $data['proccess']   = $this->checkout->getWhere('status_trx', 'In Proccess')->result_array();

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
        $data['account'] = $this->account->getById($data['trx']['acc_id']);

        $this->_view('detail', $data);
    }

    public function print($param)
    {
        $email = $this->session->userdata('email');
        $data['brainware']  = $this->db->get_where('users', ['email' => $email])->row_array();

        $data['site']       = $this->config_model->get();

        $data['trx']        = $this->checkout->getById($param);
        $data['transactions'] = $this->checkout_detail->getWhere($param);
        $data['account']    = $this->account->getById($data['trx']['acc_id']);

        $this->load->view('admin/transaction/print', $data);
    }

    public function pdf($param)
    {
        $email = $this->session->userdata('email');
        $data['brainware']  = $this->db->get_where('users', ['email' => $email])->row_array();

        $data['site']       = $this->config_model->get();

        $data['trx']        = $this->checkout->getById($param);
        $data['transactions'] = $this->checkout_detail->getWhere($param);
        $data['account']    = $this->account->getById($data['trx']['acc_id']);

        $html = $this->load->view('admin/transaction/print', $data, true);
        $mpdf = new \Mpdf\Mpdf();
        // Write some HTML code:
        $mpdf->WriteHTML($html);
        // Output a PDF file directly to the browser
        $mpdf->Output();
    }

    public function resi($param)
    {
        $email = $this->session->userdata('email');
        $data['brainware']  = $this->db->get_where('users', ['email' => $email])->row_array();

        $data['site']       = $this->config_model->get();

        $data['trx']        = $this->checkout->getById($param);
        $data['transactions'] = $this->checkout_detail->getWhere($param);
        $data['account']    = $this->account->getById($data['trx']['acc_id']);

        $html = $this->load->view('admin/transaction/resi', $data, true);
        // load Mpdf
        $mpdf = new \Mpdf\Mpdf();
        // header
        $mpdf->SetHTMLHeader('
            <div style="text-align: left; font-weight: bold;">
                <img src="' . base_url('assets/img/' . $data['site']['logo']) . '" style="height:50px; width:auto;" />
            </div>');
        // footer
        $mpdf->SetHTMLFooter('
            <div style="padding:10px 20px; background-color:gray; color:white; font-size:12px;">
                Address : ' . $data['site']['site_name'] . ' (' . $data['site']['address'] . ') 
                <br> 
                Phone : ' . $data['site']['phone'] . '
            </div>');
        // Write some HTML code:
        $mpdf->WriteHTML($html);

        $file_name = url_title($data['site']['site_name'], 'dash', 'true') . '-' . $data['trx']['id_trx'] . '.pdf';
        // Output a PDF file directly to the browser
        $mpdf->Output($file_name, 'I');
    }

    public function proccess($param)
    {
        if (!$param) redirect('admin/transactions');


        $items  = $this->checkout_detail->getWhere($param);
        $item   = count($items);
        // var_dump($items);
        // var_dump($item);
        // die;
        for ($i = 0; $i < $item; $i++) {
            $id = $items[$i]['product_id'];

            $product  = $this->db->get_where('products', ['id_product' => $id])->row_array();
            $qty = $product['stock'] - $items[$i]['qty'];

            $this->db->set('stock', $qty);
            $this->db->where('id_product', $id);
            $this->db->update('products');
        }

        $this->db->update('checkout', ['status_trx' => 'In Proccess'], array('id_trx' => $param));
        $this->session->set_flashdata('message', 'Berhasil, pesanan siap dikirim!');
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
