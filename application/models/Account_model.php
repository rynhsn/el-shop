<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account_model extends CI_Model
{
    private $_table = 'accounts';

    public $id_acc;
    public $bank_name;
    public $acc_num;
    public $owner_name;
    public $image = 'default.jpg';

    public function rules()
    {
        return [
            [
                'field' => 'bank_name',
                'label' => 'Bank Name',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'acc_num',
                'label' => 'Account Number',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'owner_name',
                'label' => 'Owner Name',
                'rules' => 'trim|required'
            ]
        ];
    }

    public function getAll()
    {
        $this->db->from($this->_table);
        $this->db->order_by('bank_name', 'asc');
        return $this->db->get()->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ['id_acc' => $id])->row_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->bank_name = $post['bank_name'];
        $this->acc_num = $post['acc_num'];
        $this->owner_name = $post['owner_name'];
        $this->is_active = $post['is_active'];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_acc = $post['id'];
        $this->bank_name = $post['bank_name'];
        $this->acc_num = $post['acc_num'];
        $this->owner_name = $post['owner_name'];
        $this->is_active = $post['is_active'];
        return $this->db->update($this->_table, $this, array('id_acc' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array('id_acc' => $id));
    }
}
