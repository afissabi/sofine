<?php defined('BASEPATH') OR exit('No direct script access allowed');

class T_registrasi extends CI_Model
{
    private $_table = "t_registrasi";

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

    public function save($data)
	{
		return $this->db->insert($this->_table, $data);	
	}

    public function saveregis()
    {
        $post = $this->input->post();
        $this->id_pasien = $post["id_pasien"];
        $this->id_pegawai = $post["id_pegawai"];
        $this->tanggal_reg = $post["tanggal"];
        $this->jam_reg = $post["jam"];

        return $this->db->insert($this->_table, $this);
    }

    public function getCountIdMember()
    {
        $this->db->select_max('id');
        $this->db->from('t_registrasi');
        $query = $this->db->get();
        if($query->num_rows() > 0){
           return $query->row('id');        
        }else{
           return 1;
        }
    }

    function get_kode_reg(){
		$q = $this->db->query("select REPLACE(MAX(RIGHT(no_reg,15)),'.','') as kode_max from ".$this->table."");
		$kd_fix = "";
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$tmp = ((int)$k->kode_max)+1;
				//memberi tambahan padding angka 0 dalam 12 string 
				$kd = sprintf("%012s", $tmp);
				// insert string pada huruf ke dua dan param 0 (false untuk hapus lanjutannya)
				for ($i=3; $i <= 9; $i+=3) { 
					if($i == 3){
						$kd_fix = substr_replace($kd,".",$i,0);
					}else if($i == 6){
						$kd_fix = substr_replace($kd_fix,".",$i+1,0);
					}else{
						$kd_fix = substr_replace($kd_fix,".",$i+2,0);
					}
				}
			}
		}else{
			$kd_fix = "000.000.000.001";
		}

		return $kd_fix;
	}

	public function get_max_id()
	{
		$q = $this->db->query("SELECT MAX(id) as kode_max from ".$this->table."");
		$kd = "";
		if($q->num_rows()>0){
			$kd = $q->row();
			return (int)$kd->kode_max + 1;
		}else{
			return '1';
		} 
	}


}