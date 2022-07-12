<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
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
                    $this->load->view('templates/templates-user/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert"> User Belum diaktivasi</div>');
                $this->load->view('templates/templates-user/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert"> Email Tidak Terdaftar</div>');
            $this->load->view('templates/templates-user/login');
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Password Salah
          </div>');
        //redirect('auth'); 

    }

    function index()
    {
        $data['judul'] = "Toko Orchidku";
        $data['random_active'] = $this->Produk_model->getRandomProduk();
        $data['accesories'] = $this->Kategori_model->getAccesories()->result_array();
        $data['hijab'] = $this->Kategori_model->getHijab()->result_array();
        $data['muslimah'] = $this->Kategori_model->getMuslimah()->result_array();
        $data['kids'] = $this->Kategori_model->getKids()->result_array();

        //jika sudah login dan jika belum login
        if ($this->session->userdata('email')) {
            $user = $this->User_model->cekData(['email' => $this->session->userdata('email')])->row_array();

            $data['user'] = $user['username'];

            $this->load->view('templates/templates-user/header', $data);
            $this->load->view('templates/templates-user/topbar', $data);
            $this->load->view('templates/templates-user/index', $data);
            $this->load->view('templates/templates-user/footer', $data);
        } else {
            $data['user'] = 'Pengunjung';
            $this->load->view('templates/templates-user/header', $data);
            $this->load->view('templates/templates-user/topbar', $data);
            $this->load->view('templates/templates-user/index', $data);
            $this->load->view('templates/templates-user/footer', $data);
        }
    }

    public function contact()
    {
        $data['judul'] = "Kontak kami";
        $data['heading'] = "Kontak kami";

        if ($this->session->userdata('email')) {
            $user = $this->User_model->cekData(['email' => $this->session->userdata('email')])->row_array();

            $data['user'] = $user['username'];
        } else {
            $data['user'] = 'Pengunjung';
        }

        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('templates/templates-user/topbar', $data);
        $this->load->view('templates/templates-user/breadcrumbs', $data);
        $this->load->view('templates/templates-user/contact', $data);
        $this->load->view('templates/templates-user/footer', $data);
    }

    public function cara_belanja()
    {
        $data['judul'] = "Cara Belanja";
        $data['heading'] = "Cara Belanja";

        if ($this->session->userdata('email')) {
            $user = $this->User_model->cekData(['email' => $this->session->userdata('email')])->row_array();

            $data['user'] = $user['username'];
        } else {
            $data['user'] = 'Pengunjung';
        }

        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('templates/templates-user/topbar', $data);
        $this->load->view('templates/templates-user/breadcrumbs', $data);
        $this->load->view('templates/templates-user/cara-belanja', $data);
        $this->load->view('templates/templates-user/footer', $data);
    }

    public function belanja()
    {
        $data['judul'] = "Ayo Belanja";
        $data['heading'] = "Belanja";

        if ($this->session->userdata('email')) {
            $user = $this->User_model->cekData(['email' => $this->session->userdata('email')])->row_array();

            $data['user'] = $user['username'];
        } else {
            $data['user'] = 'Pengunjung';
        }

        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('templates/templates-user/topbar', $data);
        $this->load->view('templates/templates-user/breadcrumbs', $data);
        $this->load->view('templates/templates-user/sidebar', $data);
        $this->load->view('templates/templates-user/belanja', $data);
        $this->load->view('templates/templates-user/footer', $data);
    }

    public function detail($id)
    {
        $id = $this->uri->segment(3);
        $data['judul'] = "Detail Produk";
        $data['heading'] = "Detail Produk";
        $data['produk'] = $this->Produk_model->getProdukById($id);

        if ($this->session->userdata('email')) {
            $user = $this->User_model->cekData(['email' => $this->session->userdata('email')])->row_array();

            $data['user'] = $user['username'];
        } else {
            $data['user'] = 'Pengunjung';
        }

        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('templates/templates-user/topbar', $data);
        $this->load->view('templates/templates-user/breadcrumbs', $data);
        $this->load->view('templates/templates-user/detail', $data);
        $this->load->view('templates/templates-user/footer', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('password');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Telah Logout </div>');
        redirect('');
    }
}
