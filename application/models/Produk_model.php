<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{
    public function getAllProduk()
    {
        return $this->db->get('produk')->result_array();
    }

    public function getProduk($limit, $start)
    {
        return $this->db->get('produk', $limit, $start)->result_array();
    }

    public function produkWhere($where)
    {
        return $this->db->get_where('produk', $where);
    }

    public function getDataWhere($table, $where)
    {
        $this->db->where($where);
        return $this->db->get($table);
    }

    public function getProdukById($id)
    {
        return $this->db->get_where('produk', ['id_produk' => $id])->result_array();
    }

    public function getRandomProduk()
    {
        return $this->db->query("select a.*,b.* from produk a join kategori b on a.id_kategori=b.id_kategori order by RAND('id_produk') asc")->result_array();
    }

    public function countAllProduk()
    {
        return $this->db->get('produk')->num_rows();
    }

    public function simpanProduk($data = null)
    {
        $this->db->insert('produk', $data);
    }

    public function hapusDataProduk($id)
    {
        $this->db->where('id_produk', $id);
        $this->db->delete('produk');
    }

    public function ubahDataProduk($data = null, $where = null)
    {
        $this->db->update('produk', $data, $where);
    }

    public function joinKategoriProduk($table, $tbljoin, $join)
    {
        $this->db->join($tbljoin, $join);
        return $this->db->get($table);
    }

    public function cariDataProduk()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->or_like('nama_produk', $keyword);
        $this->db->or_like('harga_awal', $keyword);
        $this->db->or_like('stok', $keyword);

        return $this->db->get('produk')->result_array();
    }

    public function find($id)
    {
        $result = $this->db->where('id_produk', $id)
            ->limit(1)
            ->get('produk');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
}
