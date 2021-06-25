<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = 'products';
    private $_join = 'categories';

    public $id_product;
    public $category_id;
    public $name;
    public $price;
    public $stock;
    public $image = 'product.jpg';
    public $desc_product;

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
                'rules' => 'required|numeric'
            ],

            [
                'field' => 'stock',
                'label' => 'Stock',
                'rules' => 'required|numeric'
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
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join($this->_join, $this->_table . '.category_id = ' . $this->_join . '.id_category');
        return $this->db->get()->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ['id_product' => $id])->row_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_product = uniqid();
        $this->category_id = $post['category'];
        $this->name = $post['name'];
        $this->price = $post['price'];
        $this->stock = $post['stock'];
        $this->image = $this->_uploadImage();
        $this->desc_product = $post['description'];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_product = $post['id'];
        $this->name = $post['name'];
        $this->category_id = $post['category'];
        $this->price = $post['price'];
        $this->stock = $post['stock'];
        if (!empty($_FILES['image']['name'])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post['old_image'];
        }
        $this->desc_product = $post['description'];
        return $this->db->update($this->_table, $this, array('id_product' => $post['id']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array('id_product' => $id));
    }


    private function _uploadImage()
    {
        $config['upload_path']          = './assets/img/products/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id_product;
        $config['overwrite']            = true;
        $config['max_size']             = 2048; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data('file_name');
        }

        return 'product.jpg';
    }

    private function _deleteImage($id)
    {
        $product = $this->getById($id);
        if ($product['image'] != 'product.jpg') {
            $filename = explode('.', $product['image'])[0];
            return array_map('unlink', glob(FCPATH . "assets/img/products/$filename.*"));
        }
    }
}
