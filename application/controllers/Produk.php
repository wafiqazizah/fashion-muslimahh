<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek_login();
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['judul'] = "Data Produk";
        $data['user'] = $this->User_model->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['produk'] = $this->Produk_model->joinKategoriProduk('produk', 'kategori', 'kategori.id_kategori=produk.id_kategori')->result();
        $data['kategori'] = $this->Kategori_model->getKategori()->result_array();


        //library pagination
        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost/fashion-muslimah/produk/index';
        $config['total_rows'] = $this->Produk_model->countAllProduk();
        $config['per_page'] = 5;

        //styling
        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul><nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        //initialize
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['produk'] = $this->Produk_model->getProduk($config['per_page'], $data['start']);
        if ($this->input->post('keyword')) {
            $data['produk'] = $this->Produk_model->cariDataProduk();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('produk/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = "Tambah Produk";
        $data['user'] = $this->User_model->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['produk'] = $this->Produk_model->getAllProduk();
        $data['kategori'] = $this->Kategori_model->getKategori()->result_array();
        $this->load->library('pagination');

        $this->form_validation->set_rules('id_produk', 'Id Produk', 'trim|required', [
            'required' => 'ID produk harus diisi'
        ]);
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', [
            'required' => 'Nama produk harus diisi'
        ]);
        $this->form_validation->set_rules('id_kategori', 'Id Kategori', 'trim|required', [
            'required' => 'Kategori harus diisi'
        ]);
        $this->form_validation->set_rules('harga_awal', 'Harga Awal', 'trim|required|numeric', [
            'required' => 'Harga awal produk harus diisi',
            'numeric' => 'Yang anda masukan bukan angka'
        ]);
        $this->form_validation->set_rules('harga_diskon', 'Harga Diskon', 'trim|required|numeric', [
            'required' => 'Harga diskon harus diisi',
            'numeric' => 'Yang anda masukan bukan angka'
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'trim|required|numeric', [
            'required' => 'Jumlah stok produk harus diisi',
            'numeric' => 'Yang anda masukan bukan angka'
        ]);
        $this->form_validation->set_rules('size', 'Size', 'trim|required', [
            'required' => 'Size produk harus diisi'
        ]);
        $this->form_validation->set_rules('deskripsi_produk', 'Deskripsi Produk', 'required', [
            'required' => 'Keterangan produk harus diisi'
        ]);

        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './images/produk/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('produk/index', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data();
                $image = $gambar['file_name'];
            } else {
                $gambar = '';
            }

            $data = array(
                'id_produk' => $this->input->post('id_produk', true),
                'nama_produk' => $this->input->post('nama_produk', true),
                'id_kategori' => $this->input->post('id_kategori', true),
                'harga_awal' => $this->input->post('harga_awal', true),
                'harga_diskon' => $this->input->post('harga_diskon', true),
                'stok' => $this->input->post('stok', true),
                'size' => $this->input->post('size', true),
                'deskripsi_produk' => $this->input->post('deskripsi_produk', true),
                'gambar' => $image
            );

            $this->Produk_model->simpanProduk($data);
            $this->session->set_flashdata('flash', 'berhasil ditambahkan');
            redirect('produk');
        }
    }

    public function hapusProduk($id)
    {
        $this->Produk_model->hapusDataProduk($id);
        $this->session->set_flashdata('flash,"dihapus');
        redirect('produk');
    }

    public function ubahProduk()
    {
        $data['judul'] = 'Ubah Data Produk';
        $data['user'] = $this->User_model->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['produk'] = $this->Produk_model->produkWhere(['id_produk' => $this->uri->segment(3)])->result_array();
        $kategori = $this->Kategori_model->joinKategoriProduk(['produk.id_produk' => $this->uri->segment(3)])->result_array();
        foreach ($kategori as $k) {
            $data['id'] = $k['id_kategori'];
            $data['k'] = $k['kategori'];
        }
        $data['kategori'] = $this->Kategori_model->getKategori()->result_array();

        $this->form_validation->set_rules('id_produk', 'Id Produk', 'trim|required', [
            'required' => 'ID produk harus diisi'
        ]);
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required', [
            'required' => 'Nama produk harus diisi'
        ]);
        $this->form_validation->set_rules('id_kategori', 'Id Kategori', 'trim|required', [
            'required' => 'Kategori harus diisi'
        ]);
        $this->form_validation->set_rules('harga_awal', 'Harga Awal', 'trim|required|numeric', [
            'required' => 'Harga awal produk harus diisi',
            'numeric' => 'Yang anda masukan bukan angka'
        ]);
        $this->form_validation->set_rules('harga_diskon', 'Harga Diskon', 'trim|required|numeric', [
            'required' => 'Harga diskon harus diisi',
            'numeric' => 'Yang anda masukan bukan angka'
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'trim|required|numeric', [
            'required' => 'Jumlah stok produk harus diisi',
            'numeric' => 'Yang anda masukan bukan angka'
        ]);
        $this->form_validation->set_rules('size', 'Size', 'trim|required', [
            'required' => 'Size produk harus diisi'
        ]);
        $this->form_validation->set_rules('deskripsi_produk', 'Deskripsi Produk', 'trim|required', [
            'required' => 'Keterangan produk harus diisi'
        ]);

        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './images/produk/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1200';
        $config['max_height'] = '1600';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('produk/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data();
                unlink('images/produk/' . $this->input->post('old_pict', TRUE));
                $image = $gambar['file_name'];
            } else {
                $image = $this->input->post('old_pict', TRUE);
            }

            $data = array(
                'id_produk' => $this->input->post('id_produk', true),
                'nama_produk' => $this->input->post('nama_produk', true),
                'id_kategori' => $this->input->post('id_kategori', true),
                'harga_awal' => $this->input->post('harga_awal', true),
                'harga_diskon' => $this->input->post('harga_diskon', true),
                'stok' => $this->input->post('stok', true),
                'size' => $this->input->post('size', true),
                'deskripsi_produk' => $this->input->post('deskripsi_produk', true),
                'gambar' => $image
            );

            $this->Produk_model->ubahDataProduk($data, ['id_produk' => $this->input->post('id_produk')]);
            $this->session->set_flashdata('flash', 'diubah');
            redirect('produk');
        }
    }

    public function exportToPdf()
    {
        $data['judul'] = "Data produk Toko Orchidku";
        $data['produk'] = $this->Produk_model->getAllProduk();
        $this->load->library('dompdf_gen');
        $this->load->view('produk/cetak-produk', $data);
        $paper_size = '4 cm'; // ukuran kertas
        $orientation = 'potrait'; //tipe format kertas potrait atau landscape 
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation); //Convert to PDF 
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Data produk.pdf", array('Attachment' => 0)); // nama file pdf yang di hasilkan
    }
}
