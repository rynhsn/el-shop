<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table = 'users';

    public $id_user;
    public $full_name;
    public $username;
    public $email;
    public $password;
    public $image = 'default.jpg';
    public $role;
    public $is_active;

    public function rulesAdd()
    {
        return [
            [
                'field' => 'full_name',
                'label' => 'Full Name',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|is_unique[users.username]'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|is_unique[users.email]'
            ]
        ];
    }

    public function rulesUpdate()
    {
        return [
            [
                'field' => 'full_name',
                'label' => 'Full Name',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ['id_user' => $id])->row_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_user = uniqid();
        $this->full_name = htmlspecialchars($post['full_name']);
        $this->username = htmlspecialchars($post['username']);
        $this->email = htmlspecialchars($post['email']);
        $this->role = htmlspecialchars($post['role']);
        $this->image;
        $this->password = password_hash($this->role, PASSWORD_DEFAULT);
        $this->is_active = 1;
        $this->date_created = now();
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->db->set('id_user', $post['id']);
        $this->db->set('full_name', htmlspecialchars($post['full_name']));
        $this->db->set('username', htmlspecialchars($post['username']));
        $this->db->set('email', htmlspecialchars($post['email']));
        $this->db->set('role', htmlspecialchars($post['role']));
        $this->db->set('is_active', $post['is_active']);

        if (!empty($_FILES['image']['name'])) {
            $this->db->set('image', $this->_uploadImage());
        } else {
            $this->db->set('image', $post['old_image']);
        }
        $this->db->where('id_user', $post['id']);
        return $this->db->update($this->_table);
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array('id_user' => $id));
    }


    private function _uploadImage()
    {
        $config['upload_path']          = './assets/img/users/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id_user;
        $config['overwrite']            = true;
        $config['max_size']             = 2048; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data('file_name');
        }

        return 'user.jpg';
    }

    private function _deleteImage($id)
    {
        $user = $this->getById($id);
        if ($user->image != 'user.jpg') {
            $filename = explode('.', $user->image)[0];
            return array_map('unlink', glob(FCPATH . 'assets/img/users/$filename.*'));
        }
    }

    public function editpassword($id)
    {
        // $id = $this->input->post['id'];
        $this->db->set('password', password_hash($this->input->post['password'], PASSWORD_DEFAULT));
        $this->db->where('id_user', $id);
        return $this->db->update('users');
    }
}
