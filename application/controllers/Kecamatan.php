<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kecamatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek_login();
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['judul'] = "Data Kecamatan";
        $data['user'] = $this->User_model->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kecamatan'] = $this->Kecamatan_model->getKecamatan()->result_array();

        if ($this->input->post('keyword')) {
            $data['kecamatan'] = $this->Kecamatan_model->cariDataKecamatan();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kecamatan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = "Tambah Kecamatan";
        $data['user'] = $this->User_model->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kecamatan'] = $this->Kecamatan_model->getKecamatan()->result_array();

        $this->form_validation->set_rules('nama_kecamatan', 'Nama Kecamatan', 'required|unique', [
            'required' => 'Nama kecamatan harus diisi',
            'unique' => 'Data kecamatan sudah ada'
        ]);
        $this->form_validation->set_rules('ongkos_kirim', 'Ongkos Kirim', 'trim|required|numeric', [
            'required' => 'Ongkos kirim harus diisi',
            'numeric' => 'Ongkos kirim harus berupa angka'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kecamatan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Kecamatan_model->tambahKecamatan($data);
            $this->session->set_flashdata('flash', 'berhasil ditambahkan');
            redirect('kecamatan');
        }
    }

    public function hapusKecamatan($id)
    {
        $this->Kecamatan_model->hapusDataKecamatan($id);
        $this->session->set_flashdata('flash,"Dihapus');
        redirect('kecamatan');
    }

    public function ubahKecamatan($id)
    {
        $data['judul'] = 'Ubah Data Kecamatan';
        $data['user'] = $this->User_model->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kecamatan'] = $this->Kecamatan_model->getKecamatanById($id);

        $this->form_validation->set_rules('nama_kecamatan', 'Nama Kecamatan', 'required', [
            'required' => 'Nama kecamatan harus diisi'
        ]);
        $this->form_validation->set_rules('ongkos_kirim', 'Ongkos Kirim', 'trim|required|numeric', [
            'required' => 'Nama kecamatan harus diisi',
            'numeric' => 'Ongkos kirim harus berupa angka'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kecamatan/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Kecamatan_model->ubahDataKecamatan();
            $this->session->set_flashdata('flash', 'Berhasil Diubah');
            redirect('kecamatan');
        }
    }

    public function exportToPdf()
    {
        $data['judul'] = "Data kecamatan & ongkir Toko Orchidku";
        $data['kecamatan'] = $this->Kecamatan_model->getAllKecamatan();
        $this->load->library('dompdf_gen');
        $this->load->view('kecamatan/cetak-kecamatan', $data);
        $paper_size = '4 cm'; // ukuran kertas
        $orientation = 'potrait'; //tipe format kertas potrait atau landscape 
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation); //Convert to PDF 
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Data ongkir kecamatan.pdf", array('Attachment' => 0)); // nama file pdf yang di hasilkan
    }
}
