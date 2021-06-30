<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
    private $_table = 'categories';

    public $id_category;
    public $category;
    public $category_slug;
    public $sort;

    public function rules()
    {
        return [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'sort',
                'label' => 'Sort',
                'rules' => 'trim|required'
            ]
        ];
    }

    public function getAll()
    {
        $this->db->from($this->_table);
        $this->db->order_by('sort', 'asc');
        return $this->db->get()->result_array();
    }

    public function getBySlug($param)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('category_slug', $param);
        return $this->db->get()->row_array();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ['id_category' => $id])->row_array();
    }

    public function save()
    {
        $post = $this->input->post();
        // $this->id_category = uniqid();
        $this->category = $post['name'];
        $this->category_slug = url_title($post['name'], 'dash', TRUE);
        $this->sort = $post['sort'];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_category = $post['id'];
        $this->category = $post['name'];
        $this->category_slug = url_title($post['name'], 'dash', TRUE);
        $this->sort = $post['sort'];
        return $this->db->update($this->_table, $this, array('id_category' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array('id_category' => $id));
    }
}
