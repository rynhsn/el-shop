<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = 'products';

    public $id_product;
    public $name;
    public $price;
    public $image = 'default.jpg';
    public $description;

    public function rules()
    {
        return [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ],

            [
                'field' => 'price',
                'label' => 'Price',
                'rules' => 'numeric'
            ],

            [
                'field' => 'stock',
                'label' => 'Stock',
                'rules' => 'numeric'
            ],

            [
                'field' => 'description',
                'label' => 'Description',
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
        return $this->db->get_where($this->_table, ['id_product' => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_product = uniqid();
        $this->name = $post['name'];
        $this->price = $post['price'];
        $this->stock = $post['stock'];
        $this->description = $post['description'];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_product = $post['id'];
        $this->name = $post['name'];
        $this->price = $post['price'];
        $this->stock = $post['stock'];
        $this->description = $post['description'];
        return $this->db->update($this->_table, $this, array('id_product' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array('id_product' => $id));
    }
}
