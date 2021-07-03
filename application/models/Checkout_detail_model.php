<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout_detail_model extends CI_Model
{
    private $_table = 'checkout_detail';

    public function add($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function get()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->order_by('id_detail_trx', 'desc');
        return $this->db->get()->result_array();
    }

    public function getWhere($param)
    {
        $this->db->select('checkout_detail.*, products.id_product, products.name, products.image');
        $this->db->from($this->_table);
        $this->db->join('products', 'products.id_product = checkout_detail.product_id', 'left');
        $this->db->where('trx_id', $param);
        $this->db->order_by('id_detail_trx', 'desc');
        return $this->db->get()->result_array();
    }
}
