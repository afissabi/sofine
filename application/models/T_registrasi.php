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

	public function cekJam($jam, $id_klinik,  $tanggal)
    {
        return $this->db->get_where($this->_table, ["jam_reg" => $jam, "id_klinik" => $id_klinik,  "tanggal_reg" => '2021-12-19' ])->row();
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
		$q = $this->db->query("select REPLACE(MAX(RIGHT(no_reg,15)),'.','') as kode_max from ".$this->_table."");
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
		$q = $this->db->query("SELECT MAX(id) as kode_max from ".$this->_table."");
		$kd = "";
		if($q->num_rows()>0){
			$kd = $q->row();
			return (int)$kd->kode_max + 1;
		}else{
			return '1';
		} 
	}

    public function getSelectedData($table,$datawhere,$data_like=null, $datawhere_or = null, $datawhere1=null,$wherein=null,$where_in=null,$in=null,$where_sekda=null,$datalike_or=null,$not_in=null,$not_like=null)
    {
        $this->db->select('*');
        if ($datawhere != null) {
            $this->db->where($datawhere);
        }
        if ($data_like != null) {
           $this->db->like($data_like,false,'after');
        }
        if ($datawhere_or != null) {
            $this->db->or_where($datawhere_or);
        }
        if ($datawhere1 != null) {
            $this->db->where($datawhere1);
        }
     //SEMENTARA UNTUK MENAMPILKAN KATEGORI SURAT YANG HANYA SUDAH ADA FORMNYA
        if ($wherein != null) {
            $this->db->where_in('id_kategori',$wherein);
        }

        if ($where_in != null) {
            $this->db->where_in('id_laporan',$where_in);
        }

        if ($in != null) {
            $this->db->where_in('id_detail',$in);
        }

        if ($where_sekda != null) {
            $this->db->where_in('id_jabatan',$where_sekda);
        }

        if ($datalike_or != null) {
            $this->db->or_like($datalike_or);
        }

        if($not_in != null){
            $this->db->where_not_in($not_in);
        }

        if($not_like != null){
            $this->db->not_like($not_like);
        }

        return $this->db->get($table);
    }

    public function get_regist($id_reg)
    {
        $this->db->select('r.*, p.*, k.nama_klinik, k.alamat as alamat_klinik');
        $this->db->from('t_registrasi r');
        $this->db->join('m_pasien p', 'p.id=r.id_pasien');
        $this->db->join('m_klinik k', 'k.id=r.id_klinik');
        $this->db->where('r.id', $id_reg);
        $query = $this->db->get();
        return $query->row();

    }


}