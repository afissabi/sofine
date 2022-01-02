<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_layanan extends CI_Model
{
    private $_layanan = "m_layanan";

    public $id_layanan;
    public $kode_layanan;
    public $nama_layanan;
    public $keterangan;
    public $dokter;
    public $waktu_layanan;

    public function rules()
    {
        return [
            ['field' => 'kode_layanan',
            'label' => 'Kode Layanan',
            'rules' => 'required'],

            ['field' => 'nama_layanan',
            'label' => 'Nama Layanan',
            'rules' => 'required'],
        ];
    }

    public function getAll()
    {
        return $this->db->get_where($this->_layanan, ["deleted_at" => null])->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_layanan, ["id_layanan" => $id])->row();
    }

}