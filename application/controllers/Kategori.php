<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek_login();
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['judul'] = "Kategori Produk";
        $data['user'] = $this->User_model->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->Kategori_model->getKategori()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kategori/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Kategori';
        $data['user'] = $this->User_model->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->Kategori_model->getKategori()->result_array();

        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required', [
            'required' => 'Nama Kategori harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kategori/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Kategori_model->tambahKategori();
            $this->session->set_flashdata('flash', 'berhasil ditambahkan');
            redirect('kategori');
        }
    }

    public function hapusKategori($id)
    {
        $this->Kategori_model->hapusDataKategori($id);
        $this->session->set_flashdata('flash,dihapus');
        redirect('kategori');
    }

    public function ubahKategori($id)
    {
        $data['judul'] = 'Ubah Kategori';
        $data['user'] = $this->User_model->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->Kategori_model->getKategoriById($id);

        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required', [
            'required' => 'Nama Kategori harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kategori/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Kategori_model->ubahDataKategori();
            $this->session->set_flashdata('flash', 'berhasil diubah');
            redirect('kategori');
        }
    }

    public function exportToPdf()
    {
        $data['judul'] = "Data kategori produk Toko Orchidku";
        $data['kategori'] = $this->Kategori_model->getAllKategori();
        $this->load->library('dompdf_gen');
        $this->load->view('kategori/cetak-kategori', $data);
        $paper_size = '4 cm'; // ukuran kertas
        $orientation = 'potrait'; //tipe format kertas potrait atau landscape 
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation); //Convert to PDF 
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Data kategori produk.pdf", array('Attachment' => 0)); // nama file pdf yang di hasilkan
    }

    public function accesories()
    {
        $data['accesories'] = $this->Kategori_model->getAccesories()->result();
        $data['judul'] = "Accesories";
        $data['heading'] = "Accesories";

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
        $this->load->view('templates/templates-user/accesories', $data);
        $this->load->view('templates/templates-user/footer', $data);
    }

    public function hijab()
    {
        $data['hijab'] = $this->Kategori_model->getHijab()->result();
        $data['judul'] = "Hijab";
        $data['heading'] = "Hijab";

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
        $this->load->view('templates/templates-user/hijab', $data);
        $this->load->view('templates/templates-user/footer', $data);
    }

    public function muslimah()
    {
        $data['muslimah'] = $this->Kategori_model->getMuslimah()->result();
        $data['judul'] = "Muslimah";
        $data['heading'] = "Muslimah";

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
        $this->load->view('templates/templates-user/muslimah', $data);
        $this->load->view('templates/templates-user/footer', $data);
    }

    public function kids()
    {
        $data['judul'] = "Kids";
        $data['kids'] = $this->Kategori_model->getKids()->result();
        $data['heading'] = "Kids";

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
        $this->load->view('templates/templates-user/kids', $data);
        $this->load->view('templates/templates-user/footer', $data);
    }
}
