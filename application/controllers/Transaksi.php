<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }

    public function index()
    {
        $data['judul'] = "Transaksi";
        $data['user'] = $this->User_model->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->Transaksi_model->tampil_data();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_transaksi)
    {
        $data['judul'] = "Detail Transaksi";
        $data['user'] = $this->User_model->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->Transaksi_model->ambil_id_transaksi($id_transaksi);
        $data['pesanan'] = $this->Transaksi_model->ambil_id_pesanan($id_transaksi);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detail_transaksi', $data);
        $this->load->view('templates/footer');
    }
}
