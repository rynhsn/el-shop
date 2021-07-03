<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = 'products';
    private $_join = 'categories';
    private $_join1 = 'product_images';

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
                'rules' => 'trim|required'
            ],

            [
                'field' => 'price',
                'label' => 'Price',
                'rules' => 'trim|required|numeric'
            ],

            [
                'field' => 'stock',
                'label' => 'Stock',
                'rules' => 'trim|required|numeric'
            ],

            [
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            ]
        ];
    }

    public function home()
    {
        $this->db->select('products.*, categories.category, categories.category_slug, COUNT(product_images.id_image) AS image_total');
        $this->db->from($this->_table);
        $this->db->join($this->_join, $this->_table . '.category_id = ' . $this->_join . '.id_category', 'left');
        $this->db->join($this->_join1, $this->_table . '.id_product = ' . $this->_join1 . '.product_id', 'left');
        $this->db->where('is_active', 1);
        $this->db->where('stock >', 0);
        $this->db->group_by('id_product');
        $this->db->limit(12);
        $this->db->order_by('id_product', 'desc');
        return $this->db->get()->result_array();
    }

    public function getBySlug($param)
    {
        $this->db->select('products.*, categories.category, categories.category_slug, COUNT(product_images.id_image) AS image_total');
        $this->db->from($this->_table);
        $this->db->join($this->_join, $this->_table . '.category_id = ' . $this->_join . '.id_category', 'left');
        $this->db->join($this->_join1, $this->_table . '.id_product = ' . $this->_join1 . '.product_id', 'left');
        $this->db->where('is_active', 1);
        $this->db->where('stock >', 0);
        $this->db->where('product_slug', $param);
        $this->db->group_by('id_product');
        $this->db->order_by('id_product', 'desc');
        return $this->db->get()->row_array();
    }

    public function getProduct($limit, $start)
    {
        $this->db->select('products.*, categories.category, categories.category_slug, COUNT(product_images.id_image) AS image_total');
        $this->db->from($this->_table);
        $this->db->join($this->_join, $this->_table . '.category_id = ' . $this->_join . '.id_category', 'left');
        $this->db->join($this->_join1, $this->_table . '.id_product = ' . $this->_join1 . '.product_id', 'left');
        $this->db->where('is_active', 1);
        $this->db->where('stock >', 0);
        $this->db->group_by('id_product');
        $this->db->limit($limit, $start);
        $this->db->order_by('id_product', 'desc');
        return $this->db->get()->result_array();
    }

    public function getCategory($param, $limit, $start)
    {
        $this->db->select('products.*, categories.category, categories.category_slug, COUNT(product_images.id_image) AS image_total');
        $this->db->from($this->_table);
        $this->db->join($this->_join, $this->_table . '.category_id = ' . $this->_join . '.id_category', 'left');
        $this->db->join($this->_join1, $this->_table . '.id_product = ' . $this->_join1 . '.product_id', 'left');
        $this->db->where('is_active', 1);
        $this->db->where('category_id', $param);
        $this->db->group_by('id_product');
        $this->db->limit($limit, $start);
        $this->db->order_by('id_product', 'desc');
        return $this->db->get()->result_array();
    }

    public function total()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from($this->_table);
        $this->db->where('is_active', 1);
        return $this->db->get()->row_array();
    }

    public function totalCategory($param)
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from($this->_table);
        $this->db->where('is_active', 1);
        $this->db->where('category_id', $param);
        return $this->db->get()->row_array();
    }

    public function getCat()
    {
        $this->db->select('products.*, categories.category, categories.category_slug, COUNT(product_images.id_image) AS image_total');
        $this->db->from($this->_table);
        $this->db->join($this->_join, $this->_table . '.category_id = ' . $this->_join . '.id_category', 'left');
        $this->db->join($this->_join1, $this->_table . '.id_product = ' . $this->_join1 . '.product_id', 'left');
        $this->db->group_by('category_id');
        $this->db->order_by('id_product', 'desc');
        return $this->db->get()->result_array();
    }

    public function getWhere($param, $param1)
    {
        $this->db->get_where('products', [$param => $param1])->result_array();
    }

    public function getAll()
    {
        $this->db->select('products.*, categories.category, categories.category_slug, COUNT(product_images.id_image) AS image_total');
        $this->db->from($this->_table);
        $this->db->join($this->_join, $this->_table . '.category_id = ' . $this->_join . '.id_category', 'left');
        $this->db->join($this->_join1, $this->_table . '.id_product = ' . $this->_join1 . '.product_id', 'left');
        $this->db->group_by('id_product');
        $this->db->order_by('id_product', 'desc');
        return $this->db->get()->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ['id_product' => $id])->row_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_product = $post['id_product'];
        $this->category_id = $post['category'];
        $this->name = $post['name'];
        $this->product_slug = url_title($post['name'], 'dash', TRUE);
        $this->price = $post['price'];
        $this->stock = $post['stock'];
        $this->weight = $post['weight'];
        $this->size = $post['size'];
        $this->is_active = $post['is_active'];
        $this->keywords = $post['keywords'];
        $this->image = $this->_uploadImage();
        $this->_thumbnail();
        $this->desc_product = $post['description'];
        $this->date_created = date('Y-m-d H:i:s');
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_product = $post['id_product'];
        $this->name = $post['name'];
        $this->category_id = $post['category'];
        $this->product_slug = url_title($post['name'], 'dash', TRUE);
        $this->price = $post['price'];
        $this->stock = $post['stock'];
        $this->weight = $post['weight'];
        $this->size = $post['size'];
        $this->is_active = $post['is_active'];
        $this->keywords = $post['keywords'];
        if (!empty($_FILES['image']['name'])) {
            $this->image = $this->_uploadImage();
            $this->_thumbnail();
        } else {
            $this->image = $post['old_image'];
        }
        $this->desc_product = $post['description'];
        return $this->db->update($this->_table, $this, array('id_product' => $post['id_product']));
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

    private function _thumbnail()
    {
        $thumbs = array('upload_thumb' => $this->upload->data());


        $config['image_library']    = 'gd2';
        $config['source_image']     = './assets/img/products/' . $thumbs['upload_thumb']['file_name'];

        // lokasi thumbnail
        $config['new_image']        = './assets/img/products/thumbs/';
        $config['create_thumb']     = TRUE;
        $config['maintain_ratio']   = TRUE;
        $config['width']            = 250;
        $config['height']           = 250;
        $config['thumb_marker']     = '';

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
    }

    private function _deleteImage($id)
    {
        $product = $this->getById($id);
        if ($product['image'] != 'product.jpg') {
            $filename = explode('.', $product['image'])[0];
            array_map('unlink', glob(FCPATH . "assets/img/products/$filename.*"));
            array_map('unlink', glob(FCPATH . "assets/img/products/thumbs/$filename.*"));
            return true;
        }
    }
}
