<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_klinik extends CI_Model
{
    private $klinik = "m_klinik";

    public $id;
    public $nama_klinik;
    public $alamat;
    public $telp;

    public function getAll()
    {
        return $this->db->get($this->klinik)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->klinik, ["id" => $id])->row();
    }
    
}