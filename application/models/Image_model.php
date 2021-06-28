<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Image_model extends CI_Model
{
    private $_table = 'product_images';

    public $id_image;
    public $image_title;

    public function rules()
    {
        return [
            [
                'field' => 'image_title',
                'label' => 'Title',
                'rules' => 'trim|required'
            ]
        ];
    }

    public function getWhere($id)
    {
        return $this->db->get_Where($this->_table, ['product_id' => $id])->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_Where($this->_table, ['id_image' => $id])->row_array();
    }

    public function add($id)
    {
        $post = $this->input->post();
        $this->id_image = uniqid();
        $this->product_id = $id;
        $this->image_title = $post['image_title'];
        $this->image = $this->_uploadImage();
        $this->_thumbnail();
        return $this->db->insert($this->_table, $this);
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array('id_image' => $id));
    }


    private function _uploadImage()
    {
        $config['upload_path']          = './assets/img/products/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id_image;
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
