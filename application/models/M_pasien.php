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

    public function save($data)
	{
		return $this->db->insert($this->_table, $data);	
	}

    // function get_kode_rm($str){
	// 	// $q = $this->db->query("select MAX(RIGHT(no_rm,6)) as kode_max from ".$this->table."");
	// 	$q = $this->db->query("select REPLACE(MAX(RIGHT(no_rm,6)),'.','') as kode_max from ".$this->_table."	where no_rm like '".$str."%'");
	// 	$kd_fix = "";
	// 	if($q->num_rows()>0){
	// 		foreach($q->result() as $k){
	// 			$tmp = ((int)$k->kode_max)+1;
	// 			//memberi tambahan padding angka 0 dalam 4 string 
	// 			$kd = sprintf("%04s", $tmp); 
	// 			// insert string pada huruf ke dua dan param 0 (false untuk hapus lanjutannya)
	// 			$kd_fix = substr_replace($kd,".",2,0);
	// 		}
	// 	}else{
	// 		$kd_fix = "00.01";
	// 	}
	// 	return $str.'.'.$kd_fix;
	// }

    function get_kode_rm($str, $thn, $bln)
    {
        $q = $this->db->query("select REPLACE(MAX(RIGHT(no_rm,4)),'.','') as kode_max from " . $this->_table . "	where no_rm like '" . $str . "%'");

        $kd_fix = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kode_max) + 1;
                //memberi tambahan padding angka 0 dalam 14 string 
                $kd_fix = sprintf("%04s", $tmp);
            }
        } else {
            $kd_fix = "0001";
        }

        return $str . '.' . $thn . '.' . $bln . '.' . $kd_fix;
    }

	public function get_max_id_pasien()
	{
		$q = $this->db->query("SELECT MAX(id) as kode_max from ".$this->_table."");
		$kd = "";
		if($q->num_rows()>0){
			$kd = $q->row();
			return (int)$kd->kode_max + 1;
		}else{
			return '1';
		} 
	}


}