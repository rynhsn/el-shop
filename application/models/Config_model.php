<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Config_model extends CI_Model
{
    private $_table = 'config';

    public function get()
    {
        return $this->db->get($this->_table)->row_array();
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->site_name        = $post['site_name'];
        $this->tagline          = $post['tagline'];
        $this->email            = $post['email'];
        $this->website          = $post['website'];
        $this->keywords         = $post['keywords'];
        $this->metatext         = $post['metatext'];
        $this->phone            = $post['phone'];
        $this->address          = $post['address'];
        $this->description      = $post['description'];
        $this->payment_account  = $post['payment_account'];

        return $this->db->update($this->_table, $this, array('id_config' => $id));
    }

    public function updateLogo($id)
    {
        $post = $this->input->post();
        $this->site_name = $post['site_name'];
        if (!empty($_FILES['image']['name'])) {
            $this->logo = $this->_uploadImage();
            $this->_thumbnail();
        } else {
            $this->logo = $post['old_image'];
        }
        return $this->db->update($this->_table, $this, array('id_config' => $id));
    }

    public function updateIcon($id)
    {
        $post = $this->input->post();
        $this->site_name = $post['site_name'];
        if (!empty($_FILES['image']['name'])) {
            $this->icon = $this->_uploadIcon();
            $this->_thumbnail();
        } else {
            $this->icon = $post['old_image'];
        }
        return $this->db->update($this->_table, $this, array('id_config' => $id));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = 'logo';
        $config['overwrite']            = true;
        $config['max_size']             = 2048; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data('file_name');
        }

        return $this->upload->display_errors();
    }

    private function _uploadIcon()
    {
        $config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = 'icon';
        $config['overwrite']            = true;
        $config['max_size']             = 2048; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data('file_name');
        }

        return $this->upload->display_errors();
    }

    private function _thumbnail()
    {
        $thumbs = array('upload_thumb' => $this->upload->data());


        $config['image_library']    = 'gd2';
        $config['source_image']     = './assets/img/' . $thumbs['upload_thumb']['file_name'];

        // lokasi thumbnail
        $config['new_image']        = './assets/img/thumbs/';
        $config['create_thumb']     = TRUE;
        $config['maintain_ratio']   = TRUE;
        $config['width']            = 250;
        $config['height']           = 250;
        $config['thumb_marker']     = '';

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
    }

    public function nav_product()
    {
        $this->db->select('products.*, 
                            categories.category, 
                            categories.category_slug');
        $this->db->from('products');
        $this->db->join('categories', 'products' . '.category_id = ' . 'categories' . '.id_category', 'left');
        $this->db->group_by('category_id');
        $this->db->order_by('sort', 'asc');
        return $this->db->get()->result_array();
    }

    public function rules()
    {
        return [
            [
                'field' => 'site_name',
                'label' => 'Site Name',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'tagline',
                'label' => 'Tagline',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ],
            [
                'field' => 'website',
                'label' => 'Website',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'keywords',
                'label' => 'Keywords',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'metatext',
                'label' => 'Meta Text',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'phone',
                'label' => 'Phone',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'payment_account',
                'label' => 'Payment Account',
                'rules' => 'trim'
            ]
        ];
    }
}
