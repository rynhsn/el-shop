<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------

  public function trxYear()
  {
    $this->db->select('YEAR(tgl_trx) AS year');
    $this->db->from('checkout');
    $this->db->join('checkout_detail', 'checkout_detail.trx_id = checkout.id_trx', 'left');
    $this->db->where('status_trx', 'Success');
    $this->db->group_by('YEAR(tgl_trx)');
    $this->db->order_by('YEAR(tgl_trx)', 'asc');
    return $this->db->get()->result_array();
  }

  public function trxByDay($from, $to)
  {
    $this->db->select('*');
    $this->db->from('checkout');
    $this->db->join('checkout_detail', 'checkout_detail.trx_id = checkout.id_trx', 'left');
    $this->db->where('tgl_trx >=', $from);
    $this->db->where('tgl_trx <=', $to);
    $this->db->where('status_trx', 'Success');
    $this->db->order_by('tgl_trx', 'asc');
    return $this->db->get()->result_array();
  }

  public function trxByMonth($year, $from, $to)
  {
    $this->db->select('*');
    $this->db->from('checkout');
    $this->db->join('checkout_detail', 'checkout_detail.trx_id = checkout.id_trx', 'left');
    $this->db->where('YEAR(tgl_trx)', $year);
    $this->db->where('MONTH(tgl_trx) >=', $from);
    $this->db->where('MONTH(tgl_trx) <=', $to);
    $this->db->where('status_trx', 'Success');
    $this->db->order_by('tgl_trx', 'asc');
    return $this->db->get()->result_array();
  }

  public function trxByYear($year)
  {
    $this->db->select('*');
    $this->db->from('checkout');
    $this->db->join('checkout_detail', 'checkout_detail.trx_id = checkout.id_trx', 'left');
    $this->db->where('YEAR(tgl_trx)', $year);
    $this->db->where('status_trx', 'Success');
    $this->db->order_by('tgl_trx', 'asc');
    return $this->db->get()->result_array();
  }



  // ------------------------------------------------------------------------

}

/* End of file Report_model.php */
/* Location: ./application/models/Report_model.php */