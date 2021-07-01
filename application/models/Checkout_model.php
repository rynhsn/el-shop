<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout_model extends CI_Model
{
    private $_table = 'checkout';

    public $id_trx;

    public function rules()
    {
        return [
            [
                'field' => 'nama_penerima',
                'label' => 'Full Name',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'no_hp_penerima',
                'label' => 'Phone',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'prov',
                'label' => 'Province',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'kab_kota',
                'label' => 'Town / City',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'kecamatan',
                'label' => 'District',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'kode_pos',
                'label' => 'Postcode / ZIP',
                'rules' => 'trim'
            ],
            [
                'field' => 'alamat_lengkap',
                'label' => 'Shipping Address',
                'rules' => 'trim|required'
            ]
        ];
    }

    public function rulesPay()
    {
        return [
            [
                'field' => 'bank_pelanggan',
                'label' => 'Bank Name',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'rekening_pembayaran',
                'label' => 'Alias',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'rekening_pelanggan',
                'label' => 'Account Number',
                'rules' => 'trim|required'
            ]
        ];
    }

    public function add()
    {
        $post = $this->input->post();
        $this->id_trx = $post['id_trx'];
        $this->user_id = $post['user_id'];
        $this->nama_penerima = $post['nama_penerima'];
        $this->no_hp_penerima = $post['no_hp_penerima'];
        $this->kecamatan = $post['kecamatan'];
        $this->kab_kota = $post['kab_kota'];
        $this->prov = $post['prov'];
        $this->kode_pos = $post['kode_pos'];
        $this->alamat_lengkap = $post['alamat_lengkap'];
        $this->tgl_trx = $post['tgl_trx'];
        $this->total = $post['total'];
        $this->status_trx = 'Waiting Payment';
        $this->status_bayar = 0;

        return $this->db->insert($this->_table, $this);
    }


    public function update($id)
    {
        $post = $this->input->post();
        $this->id_trx = $id;
        $this->status_trx = 'Waiting for Confirmation';
        $this->status_bayar = 1;
        $this->bank_pelanggan = $post['bank_pelanggan'];
        $this->rekening_pelanggan = $post['rekening_pelanggan'];
        $this->rekening_pembayaran = $post['rekening_pembayaran'];
        $this->bukti_bayar = $this->_uploadImage();

        $this->db->where('id_trx', $id);
        return $this->db->update($this->_table);
    }

    public function get()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result_array();
    }

    public function getById($param)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('id_trx', $param);
        return $this->db->get()->row_array();
    }

    public function getWhere($param, $param1)
    {
        $this->db->select('checkout.*, COUNT(checkout_detail.qty) AS total_item');
        $this->db->from($this->_table);
        $this->db->where($param, $param1);
        $this->db->join('checkout_detail', 'checkout_detail.trx_id = checkout.id_trx', 'left');
        $this->db->group_by('id');
        $this->db->order_by('id', 'desc');
        return $this->db->get();
    }


    private function _uploadImage()
    {
        $config['upload_path']          = './assets/img/products/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id_trx;
        $config['overwrite']            = true;
        $config['max_size']             = 2048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data('file_name');
        }

        return null;
    }
}
