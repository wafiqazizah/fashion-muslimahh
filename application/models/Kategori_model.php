<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    public function getKategori()
    {
        return $this->db->get('kategori');
    }

    public function getAllKategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function getKategoriById($id)
    {
        return $this->db->get_where('kategori', ['id_kategori' => $id])->row_array();
    }

    public function cekKategori($where)
    {
        return $this->db->get_where('kategori', $where);
    }

    public function simpanKategori($data = null)
    {
        $this->db->insert('kategori', $data);
    }

    public function tambahKategori()
    {
        $data = array(
            'kategori' => $this->input->post('kategori', true)
        );
        $this->db->insert('kategori', $data);
    }

    public function hapusDataKategori($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
    }

    public function ubahDataKategori()
    {
        $data = array(
            'id_kategori' => $this->input->post('id_kategori', true),
            'kategori' => $this->input->post('kategori', true)
        );

        $this->db->where('id_kategori', $this->input->post('id_kategori'));
        $this->db->update('kategori', $data);
    }

    //join
    public function joinKategoriProduk($where)
    {
        $this->db->select('');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori');
        $this->db->where($where);
        return $this->db->get();
    }

    public function getLimitProduk()
    {
        $this->db->limit(5);
        return $this->db->get('produk');
    }

    public function getAccesories()
    {
        return $this->db->get_where('produk', array('id_kategori' => 9));
    }

    // public function getDataAccesories($id_produk)
    // {
    //     $result = $this->db->where('id_produk', $id_produk)->get('produk');
    //     if ($result->num_rows() > 0) {
    //         return $result->result();
    //     } else {
    //         return false;
    //     }
    // }

    public function getHijab()
    {
        return $this->db->get_where('produk', array('id_kategori' => 8));
    }

    public function getMuslimah()
    {
        return $this->db->get_where('produk', array('id_kategori' => 6));
    }

    public function getKids()
    {
        return $this->db->get_where('produk', array('id_kategori' => 10));
    }
}
