<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek_login();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Metode Pembayaran";
        $data['user'] = $this->User_model->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['bank'] = $this->Bank_model->getBank()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('bank/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Metode Pembayaran';
        $data['user'] = $this->User_model->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['bank'] = $this->Bank_model->getBank()->result_array();

        $this->form_validation->set_rules('id_bank', 'ID Bank', 'required', [
            'required' => 'ID Bank harus diisi'
        ]);
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required', [
            'required' => 'Nama Bank harus diisi'
        ]);
        $this->form_validation->set_rules('no_rek', 'Nomor Rekening', 'trim|required|numeric', [
            'required' => 'Nama produk harus diisi',
            'numeric' => 'Nomor rekening harus berupa angka'
        ]);
        $this->form_validation->set_rules('atas_nama_pemilik', 'Atas Nama', 'required', [
            'required' => 'Atas nama harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('bank/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Bank_model->tambahBank();
            $this->session->set_flashdata('flash', 'Berhasil ditambahkan');
            redirect('bank');
        }
    }

    public function hapusBank($id)
    {
        $this->Bank_model->hapusDataBank($id);
        $this->session->set_flashdata('flash,"Dihapus');
        redirect('bank');
    }

    public function ubahBank($id)
    {
        $data['judul'] = 'Ubah Metode Pembayaran';
        $data['user'] = $this->User_model->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['bank'] = $this->Bank_model->getBankById($id);

        $this->form_validation->set_rules('id_bank', 'ID Bank', 'required', [
            'required' => 'ID Bank harus diisi'
        ]);
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required', [
            'required' => 'Nama Bank harus diisi'
        ]);
        $this->form_validation->set_rules('no_rek', 'Nomor Rekening', 'trim|required|numeric', [
            'required' => 'Nama produk harus diisi',
            'numeric' => 'Nomor rekening harus berupa angka'
        ]);
        $this->form_validation->set_rules('atas_nama_pemilik', 'Atas Nama', 'required', [
            'required' => 'Atas nama harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('bank/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Bank_model->ubahDataBank();
            $this->session->set_flashdata('flash', 'Berhasil ditambahkan');
            redirect('bank');
        }
    }

    public function exportToPdf()
    {
        $data['judul'] = "Data metode pembayaran Toko Orchidku";
        $data['bank'] = $this->Bank_model->getAllBank();
        $this->load->library('dompdf_gen');
        $this->load->view('bank/cetak-bank', $data);
        $paper_size = '4 cm'; // ukuran kertas
        $orientation = 'potrait'; //tipe format kertas potrait atau landscape 
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation); //Convert to PDF 
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Data bank.pdf", array('Attachment' => 0)); // nama file pdf yang di hasilkan
    }
}
