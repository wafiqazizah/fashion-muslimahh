<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authuser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Halaman Login';
            $this->load->view('templates/templates-user/header', $data);
            $this->load->view('templates/templates-user/topbar', $data);
            $this->load->view('templates/templates-user/login', $data);
            $this->load->view('templates/templates-user/footer', $data);
        } else {
            //validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // jika usernya ada
        if ($user) {
            // jika user aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];

                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('home');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert"> Password Salah</div>');
                    redirect('authuser');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert"> User Belum diaktivasi</div>');
                redirect('authuser');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert"> Email Tidak Terdaftar</div>');
            redirect('authuser');
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password Salah</div>');
        redirect('authuser');
    }

    public function registration()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('nm_user', 'Fullname', 'required');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[user.email]',
            [
                'is_unique' => 'This email has already registered!'
            ]
        );
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Registrasi';

            $this->load->view('templates/templates-user/header', $data);
            $this->load->view('templates/templates-user/topbar', $data);
            $this->load->view('templates/templates-user/registration', $data);
            $this->load->view('templates/templates-user/footer', $data);
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'nm_user' => htmlspecialchars($this->input->post('nm_user', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'image' => 'default.jpg',
                'role_id' => 2,
                'is_active' => 1,
                'tgl_daftar' => time()
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil disimpan silahkan login</div>');
            redirect('authuser');
        }
    }

    public function blok()
    {
        $this->load->view('auth/blok');
    }

    public function gagal()
    {
        $this->load->view('auth/gagal');
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('password');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Telah Logout </div>');
        redirect('auth');
    }
}
