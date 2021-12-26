<?php defined('BASEPATH') OR exit('No direct script access allowed');

class T_jadwal_tidak_rutin extends CI_Model
{
    private $_table = "t_jadwal_dokter_tidak_rutin";
    public $id;

    public function getAll($id_dokter,$id_klinik)
    {
        return $this->db->get_where($this->_table, ["id_dokter" => $id_dokter, "id_klinik" => $id_klinik])->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function getByTanggal($id_dokter,$id_klinik,$tanggal)
    {
        return $this->db->get_where($this->_table, ["id_dokter" => $id_dokter, "id_klinik" => $id_klinik, "tanggal" => $tanggal])->row();
    }
}