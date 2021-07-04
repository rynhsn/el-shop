<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reports extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('report_model', 'reports');
        $this->load->model('product_model', 'products');
        $this->load->model('checkout_model');
        is_logged_in();
    }

    private function _view($page, $data)
    {
        $email = $this->session->userdata('email');
        $data['brainware'] = $this->db->get_where('users', ['email' => $email])->row_array();

        $data['unconfirm']  = $this->checkout_model->getWhere('status_trx', 'Waiting for Confirmation')->result_array();
        $data['proccess']   = $this->checkout_model->getWhere('status_trx', 'In Proccess')->result_array();

        $this->load->view('admin/_partials/head', $data);
        $this->load->view('admin/_partials/sidebar', $data);
        $this->load->view('admin/_partials/navbar', $data);
        $this->load->view('admin/report/' . $page, $data);
        $this->load->view('admin/_partials/footer', $data);
        $this->load->view('admin/_partials/scrolltop', $data);
        $this->load->view('admin/_partials/modal', $data);
        $this->load->view('admin/_partials/js', $data);
    }

    public function index()
    {
        $data = null;
        $this->_view('index', $data);
    }

    public function transactions($param = null)
    {
        $data['site']       = $this->config_model->get();

        // Laporan berdasarkan Tanggal
        $data['years'] = $this->reports->trxYear();

        $data['year']   = $this->input->post('year');
        $data['from']   = $this->input->post('from');
        $data['to']     = $this->input->post('to');


        if ($param == 'daily') {
            $data['trx'] = $this->reports->trxByDay($data['from'], $data['to']);

            $html = $this->load->view('admin/report/transaction-print', $data, true);
            $mpdf = new \Mpdf\Mpdf();
            // Write some HTML code:
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
            // 
        } elseif ($param == 'monthly') {
            // 
            $data['trx'] = $this->reports->trxByMonth($data['year'], $data['from'], $data['to']);

            $html = $this->load->view('admin/report/transaction-print', $data, true);
            $mpdf = new \Mpdf\Mpdf();
            // Write some HTML code:
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
            // 
        } elseif ($param == 'annual') {
            $data['trx'] = $this->reports->trxByYear($data['year']);

            $html = $this->load->view('admin/report/transaction-print', $data, true);
            $mpdf = new \Mpdf\Mpdf();
            // Write some HTML code:
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

        $this->_view('transaction', $data);
    }
}
