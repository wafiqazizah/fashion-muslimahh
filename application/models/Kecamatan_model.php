<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kecamatan_model extends CI_Model
{
    public function getKecamatan()
    {
        return $this->db->get('kecamatan');
    }

    public function getAllKecamatan()
    {
        return $this->db->get('kecamatan')->result_array();
    }

    public function getKecamatanById($id)
    {
        return $this->db->get_where('kecamatan', ['id_kecamatan' => $id])->row_array();
    }

    public function countAllKecamatan()
    {
        return $this->db->get('kecamatan')->num_rows();
    }

    public function tambahKecamatan()
    {
        $data = array(
            'id_kecamatan' => $this->input->post('id_kecamatan', true),
            'nama_kecamatan' => $this->input->post('nama_kecamatan', true),
            'ongkos_kirim' => $this->input->post('ongkos_kirim', true)
        );
        $this->db->insert('kecamatan', $data);
    }

    public function hapusDataKecamatan($id)
    {
        $this->db->where('id_kecamatan', $id);
        $this->db->delete('kecamatan');
    }

    public function ubahDataKecamatan()
    {
        $data = array(
            'id_kecamatan' => $this->input->post('id_kecamatan', true),
            'nama_kecamatan' => $this->input->post('nama_kecamatan', true),
            'ongkos_kirim' => $this->input->post('ongkos_kirim', true)
        );

        $this->db->where('id_kecamatan', $this->input->post('id_kecamatan'));
        $this->db->update('kecamatan', $data);
    }

    public function cariDataKecamatan()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->or_like('nama_kecamatan', $keyword);


        return $this->db->get('kecamatan')->result_array();
    }

    public function GetOngkir($kecamatan)
    {
        return $this->db->query("select ongkos_kirim from kecamatan where nama_kecamatan='$kecamatan'");
    }
}
