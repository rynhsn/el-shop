<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
    private $_table = 'categories';

    public $id_category;
    public $category;

    public function rules()
    {
        return [
            [
                'field' => 'category',
                'label' => 'Category',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ['id_category' => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        // $this->id_category = uniqid();
        $this->category = $post['category'];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_category = $post['id'];
        $this->category = $post['category'];
        return $this->db->update($this->_table, $this, array('id_category' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array('id_category' => $id));
    }
}
