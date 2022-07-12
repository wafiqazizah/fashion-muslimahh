<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');

        $transaksi = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'tgl_transaksi' => date('Y-m-d H:i:s'),
            'batas_bayar' => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
        );
        $this->db->insert('transaksi', $transaksi);
        $id_transaksi = $this->db->insert_id();

        foreach ($this->cart->contents as $item) {
            $data = array(
                'id_transaksi' => $id_transaksi,
                'id_produk' => $item['id'],
                'nama_produk' => $item['name'],
                'jumlah' => $item['qty'],
                'harga' => $item['price'],
            );
            $this->db->insert('detail_transaksi', $data);
        }
        return TRUE;
    }

    public function tampil_data()
    {
        $result = $this->db->get('transaksi');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function ambil_id_transaksi($id_transaksi)
    {
        $result = $this->db->where('id_transaksi', $id_transaksi)->limit(1)->get('transaksi');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }

    public function ambil_id_pesanan($id_transaksi)
    {
        $result = $this->db->where('id_transaksi', $id_transaksi)->get('detail_transaksi');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
