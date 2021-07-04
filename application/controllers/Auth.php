<?php

use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', 'user');
    }

    public function index()
    {
        if ($this->session->userdata('email')) redirect($this->session->userdata('role'));

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run()) {
            $this->_login();
        } else {
            $this->_view('login');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('full_name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[users.email]',
            [
                'is_unique' => 'This email has already registered!'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[6]|matches[password1]',
            [
                'matches' => 'Password not match!',
                'min_length' => 'Password too short!'
            ]
        );
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password]');

        if ($this->form_validation->run()) {

            $full_name  = $this->input->post('full_name', true);
            $email      = $this->input->post('email', true);
            $password   = $this->input->post('password');
            $param      = explode("@", $email);
            $role       = $this->input->post('role', true);

            $data = [
                'id_user'   => uniqid(),
                'full_name' => htmlspecialchars($full_name),
                'email'     => htmlspecialchars($email),
                'password'  => password_hash($password, PASSWORD_DEFAULT),
                'username'  => $param[0],
                'image'     => 'user.jpg',
                'role'      => htmlspecialchars($role),
                'is_active' => 0,
                'date_created' => date('d-m-Y')
            ];

            // Menyiapkan data token
            $token      = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('users', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success rounded-0" role="alert">
                    Congratulation! your account has been created. Please activate your account.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('login');
        } else {
            // echo 'salah';
            $this->_view('register');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'webdev.rynhsn@gmail.com',
            'smtp_pass' => '@Gpassword00',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $this->load->library('email', $config);

        $this->email->from('webdev.rynhsn@gmail.com', 'Info Engine Lubricant');
        $this->email->to($this->input->post('email', true));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify your account! : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a> <br> This token will expire in 24 hours');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password! : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a> <br> This token will expire in 24 hours');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user   = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('users');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success rounded-0" role="alert">
                            ' . $email . ' has been activated. Please login!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>'
                    );
                    redirect('login');
                } else {
                    $this->db->delete('users', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger rounded-0" role="alert">
                            Activation failed! Token expired.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>'
                    );
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger rounded-0" role="alert">
                        Activation failed! Invalid token.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
                );
                redirect('login');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger rounded-0" role="alert">
                    Activation failed! Wrong email.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('login');
        }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {

                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->session->set_userdata('reset_email', $email);
                    $this->changePassword();
                } else {
                    $this->db->delete('users', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger rounded-0" role="alert">
                            Reset password failed! Token expired.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>'
                    );
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger rounded-0" role="alert">
                        Reset password failed! Invalid token.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
                );
                redirect('login');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger rounded-0" role="alert">
                    Reset password failed! Wrong email.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('login');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) redirect('login');

        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|matches[password1]');
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password]');

        if ($this->form_validation->run()) {
            $password   = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $email      = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('users');

            $this->session->unset_userdata('reset_email');
            $this->db->delete('user_token', ['email' => $email]);


            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success rounded-0" role="alert">
                    Password has been changed! please login.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('login');
        }

        $this->_view('change-password');
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role' => $user['role']
                    ];
                    $this->session->set_userdata($data);
                    $this->db->query('UPDATE users SET last_login= now() WHERE id_user="' . $user['id_user'] . '"');

                    if ($user['role'] == 'admin') {
                        redirect('admin');
                    } else if ($user['role'] == 'kurir') {
                        redirect('kurir');
                    } else {
                        redirect('member');
                    }
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger rounded-0" role="alert">
                        Wrong password!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
                    );
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger rounded-0" role="alert">
                    This email has not been activated!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
                );
                redirect('login');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger rounded-0" role="alert">
                    This email is not registered!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');;
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger rounded-0" role="alert">
                You have been logged out!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>'
        );
        redirect();
    }

    public function forgotpassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run()) {
            $email = $this->input->post('email');
            $user = $this->db->get_where('users', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token      = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);

                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success rounded-0" role="alert">
                        Please check your email to reset your password!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
                );
                redirect('forgot-password');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger rounded-0" role="alert">
                        Email is not registered or activated!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
                );
                redirect('forgot-password');
            }
        }
        $this->_view('forgot-password');
    }

    public function blocked()
    {
        $data['role'] = $this->session->userdata('role');
        $this->load->view('auth/blocked', $data);
    }

    private function _view($page, $data = null)
    {

        $email              = $this->session->userdata('email');
        $data['user']       = $this->db->get_where('users', ['email' => $email])->row_array();
        $data['site']       = $this->config_model->get();

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/navbar', $data);
        $this->load->view('auth/' . $page, $data);
        $this->load->view('_partials/footer', $data);
    }
}
