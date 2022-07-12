<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank_model extends CI_Model
{
    public function getBank()
    {
        return $this->db->get('bank');
    }

    public function getAllBank()
    {
        return $this->db->get('bank')->result_array();
    }

    public function getBankById($id)
    {
        return $this->db->get_where('bank', ['id_bank' => $id])->row_array();
    }

    public function cekBank($where)
    {
        return $this->db->get_where('bank', $where);
    }

    public function simpanBank($data = null)
    {
        $this->db->insert('bank', $data);
    }

    public function tambahBank()
    {
        $data = array(
            'id_bank' => $this->input->post('id_bank', true),
            'nama_bank' => $this->input->post('nama_bank', true),
            'no_rek' => $this->input->post('no_rek', true),
            'atas_nama_pemilik' => $this->input->post('atas_nama_pemilik', true)
        );
        $this->db->insert('bank', $data);
    }

    public function hapusDataBank($id)
    {
        $this->db->where('id_bank', $id);
        $this->db->delete('bank');
    }

    public function ubahDataBank()
    {
        $data = array(
            'id_bank' => $this->input->post('id_bank', true),
            'nama_bank' => $this->input->post('nama_bank', true),
            'no_rek' => $this->input->post('no_rek', true),
            'atas_nama_pemilik' => $this->input->post('atas_nama_pemilik', true)
        );

        $this->db->where('id_bank', $this->input->post('id_bank'));
        $this->db->update('bank', $data);
    }

    public function getLimitBank()
    {
        $this->db->limit(5);
        return $this->db->get('bank');
    }
}
