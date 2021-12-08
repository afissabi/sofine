<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pasien extends CI_Model
{
    private $_table = "m_pasien";

    public $id_layanan;

    public function rules()
    {
        return [
            ['field' => 'id_layanan',
            'label' => 'id_layanan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getCountIdMember()
    {
        $this->db->select_max('id');
        $this->db->from('m_pasien');
        $query = $this->db->get();
        if($query->num_rows() > 0){
           return $query->row('id');        
        }else{
           return 1;
        }
    }

    public function viewByNik($nik){
        $this->db->where('nik', $nik);
        $result = $this->db->get('m_pasien')->row(); // Tampilkan data siswa berdasarkan NIK
        
        return $result; 
    }

}