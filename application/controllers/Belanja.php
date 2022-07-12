<?php
class Belanja extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Ayo Belanja";
        $data['heading'] = "Belanja";
        $data['produk'] = $this->Produk_model->getAllProduk();

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

    public function tambahKeranjang($id)
    {
        //$id = $this->uri->segment(3);
        $produk = $this->Produk_model->find($id);
        $data = array(
            'id' => $produk->id_produk,
            'qty' => 1,
            'price' => $produk->harga_diskon,
            'name' => $produk->nama_produk
        );
        $this->cart->insert($data);
        redirect('belanja');
    }

    public function detail_keranjang()
    {
        $data['judul'] = "Keranjang";
        $data['heading'] = "Keranjang";
        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('templates/templates-user/topbar');
        $this->load->view('templates/templates-user/breadcrumbs', $data);
        $this->load->view('templates/templates-user/keranjang');
        $this->load->view('templates/templates-user/footer');
    }
    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('home');
    }
    public function hapus($id)
    {
        $where = array('id_brg' => $id);
        $this->Produk_model->hapus_data($where, 'produk');
        redirect('data_barang/detail_keranjang');
    }
    public function pembayaran()
    {
        $data['judul'] = "Pembayaran";
        $data['heading'] = "Pembayaran";
        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('templates/templates-user/topbar');
        $this->load->view('templates/templates-user/breadcrumbs', $data);
        $this->load->view('templates/templates-user/pembayaran');
        $this->load->view('templates/templates-user/footer');
    }
    public function proses_pesanan()
    {
        $data['judul'] = "Proses Pesanan";
        $data['heading'] = "Proses Pesanan";
        $is_processed = $this->Transaksi_model->index();
        if ($is_processed) {
            $this->cart->destroy();
            $this->load->view('templates/templates-user/header', $data);
            $this->load->view('templates/templates-user/topbar');
            $this->load->view('templates/templates-user/breadcrumbs', $data);
            $this->load->view('templates/templates-user/proses_pesanan');
            $this->load->view('templates/templates-user/footer');
        } else {
            echo "Maaf Pesanan anda gagal diproses !";
        }
    }
    public function detail($id_brg)
    {
        $data['produk'] = $this->Produk_model->detail_brg($id_brg);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_barang', $data);
        $this->load->view('templates/footer');
    }
    public function cari()
    {
        $keyword = $_POST['keyword'];
        // var_dump($keyword);
        $barang['produk'] = $this->Produk_model->ambil_data($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('search', $barang);
        $this->load->view('templates/footer');
    }
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['produk'] = $this->Produk_model->get_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('search', $data);
        $this->load->view('templates/footer');
    }

    public function daftar_order()
    {
        $data['judul'] = "Daftar Pesanan";
        $data['heading'] = "Daftar Pesanan";

        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('templates/templates-user/topbar');
        $this->load->view('templates/templates-user/breadcrumbs', $data);
        $this->load->view('templates/templates-user/daftar_order');
        $this->load->view('templates/templates-user/footer');
    }
}
