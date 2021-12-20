<?php defined('BASEPATH') OR exit('No direct script access allowed');

class T_jadwaldokter extends CI_Model
{
    private $_table = "t_log_jadwal_dokter";
    public $id;

    public function getAll($id_dokter,$id_klinik)
    {
        return $this->db->get_where($this->_table, ["id_dokter" => $id_dokter, "id_klinik" => $id_klinik])->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }
}