<?php
// defined('BASEPATH ') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->model('m_global');
        $this->load->model('m_global');
        $this->load->model("m_layanan");
        $this->load->model("m_klinik");
        $this->load->model("m_pegawai");
        $this->load->model("m_pasien");
        $this->load->model("t_registrasi");
        $this->load->model("t_spam");
        $this->load->model("t_jadwaldokter");
        $this->load->library('PHPCalendar');
    }

    public function pilih_dokter($id_spam)
    {
		$content = 'v_pilihdokter';
		$spam = $this->t_spam->getById($id_spam);
		$layanan = $this->m_layanan->getById($spam->id_layanan);
		$dokter = $this->m_pegawai->getAll();
 
		$data = [
			'content' =>  $content,
			'layanan' =>  $layanan,
			'dokter'  =>  $dokter,
			'spam' 	  => $this->t_spam->getById($id_spam),
		];
		
		$this->load->view('v_template', $data);
    }
    public function index()
    {
        $content = 'daftar/v_home';
        $klinik = $this->m_klinik->getAll();

        $data = [
            'content' => $content,
            'klinik' => $klinik,
        ];
        
        $this->load->view('v_template', $data, FALSE);
    }

    public function layanan($id)
	{
		$content = 'daftar/v_layanan';
        $klinik = $this->m_klinik->getById($id);
		$data = [
			'content' =>  $content,
            'klinik' =>  $klinik,
			'layanan' => $this->m_layanan->getAll(),
		];

		$this->load->view('v_template', $data);
	}

    public function dokter($id, $id_layanan)
	{
		$content = 'daftar/v_dokter';
        $klinik = $this->m_klinik->getById($id);
        $layanan = $this->m_layanan->getById($id_layanan);
		$explode_dokter = explode(',', $layanan->dokter);
		foreach($explode_dokter as $value){
			$valuedokter  = $this->m_pegawai->getById($value);
		}

		$data = [
			'content' =>  $content,
            'klinik'  =>  $klinik,
            'layanan' =>  $layanan,
			'dokter_list' => $explode_dokter,
			'dokter'  => $this->m_pegawai->getAll(),
		];

		$this->load->view('v_template', $data);
	}

    public function konfirmasi($value, $id_layanan, $id_log)
	{
		$content = 'daftar/v_konfirmasi';
        $jadwal = $this->t_jadwaldokter->getById($id_log);
        $layanan = $this->m_layanan->getById($id_layanan);
        $klinik = $this->m_klinik->getById($jadwal->id_klinik);
        $dokter = $this->m_pegawai->getById($jadwal->id_dokter);

		$data = [
			'content' =>  $content,
            'jadwal'  =>  $jadwal,
            'layanan' =>  $layanan,
            'jam'     =>  $value,
            'klinik'  =>  $klinik,
            'dokter'  =>  $dokter,
		];

		$this->load->view('v_template', $data);
	}

    public function jadwal($id, $id_layanan, $id_dokter)
	{
		$content = 'daftar/v_jadwal';
        $klinik = $this->m_klinik->getById($id);
        $layanan = $this->m_layanan->getById($id_layanan);
        $dokter = $this->m_pegawai->getById($id_dokter);
        $data_calendar = $this->t_jadwaldokter->getAll($id_dokter,$id);
		$calendar = array();

        foreach ($data_calendar as $key => $val) 
		{
			$calendar[] = array(
                'id' 	=> intval($val->id), 
				'title' => date_format( date_create($val->tanggal) ,"d"),
				'start' => date_format( date_create($val->tanggal) ,"Y-m-d"),
				'color' => '#00e12a',
			);
		}

        $data = array();

		$data = [
			'content' =>  $content,
            'klinik'  =>  $klinik,
            'layanan' =>  $layanan,
            'dokter'  =>  $dokter,
			'dokter'  => $this->m_pegawai->getAll(),
            'get_data'=> json_encode($calendar),
		];

		$this->load->view('v_template', $data);
	}

    public function pilihjam($id_layanan)
    {
            $res = null;
            $id = $this->input->post('id');
		
            $pasien = $this->t_jadwaldokter->getById($id);
            $layanan = $this->m_layanan->getById($id_layanan);

            // Tampilkan Keseluruhan Jam di hari yang dipilih
            $starttime = $pasien->jam_mulai;
            $endtime = $pasien->jam_akhir;
            $duration = $layanan->waktu_layanan;

            $array_of_time = array ();
            $start_time    = strtotime ($starttime);
            $end_time      = strtotime ($endtime);

            $add_mins  = $duration * 60;

            while ($start_time <= $end_time)
            {
                $array_of_time[] = date ("H:i", $start_time);
                $start_time += $add_mins;
            } 

            foreach($array_of_time as $value){
                // Pengecekan jam di tanggal dan klinik yang dipilih
                $cek = $this->t_registrasi->cekJam($value,$pasien->id_klinik,$pasien->tanggal);

                if($cek != null){
                    $res .= '<a href="" onclick="return false;" class="btn btn-danger" style="margin-left:5px;margin-bottom:5px;width: 125px;">'. $value . ' WIB';
                }else{
                    $res .= '<a href=' . base_url() . "pendaftaran/konfirmasi/" . $value . "/" . $id_layanan . "/" . $id . ' class="btn btn-success" style="margin-left:5px;margin-bottom:5px;width: 125px;">' . $value . ' WIB';
                }
                
            }
            
            header('Content-Type: application/json');
            echo json_encode($res);
    }

    public function search(){
		// Ambil data NIK yang dikirim via ajax post
		$nik = $this->input->post('nik');
		
		$pasien = $this->m_pasien->viewByNik($nik);
		
		if( ! empty($pasien)){ // Jika data pasien ada/ditemukan
		  // Buat sebuah array
		  $callback = array(
			'status' => 'success', // Set array status dengan success
			'id_pasien' => $pasien->id,
			'nama' => $pasien->nama,
			'no_rm' => $pasien->no_rm,
			'tempat_lahir' => $pasien->tempat_lahir,
			'tanggal_lahir' => $pasien->tanggal_lahir,
			'jenis_kelamin' => $pasien->jenis_kelamin,
			'suku' => $pasien->suku,
			'pekerjaan' => $pasien->pekerjaan,
			'alamat_rumah' => $pasien->alamat_rumah,
			'telp' => $pasien->telp_rumah,
			'alamat_kantor' => $pasien->alamat_kantor,
			'hp' => $pasien->hp,
		  );
		}else{
		  $callback = array('status' => 'failed'); // set array status dengan failed
		}
		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}

    public function simpan_data()
	{
		$obj_date = new DateTime();
		$timestamp = $obj_date->format('Y-m-d H:i:s');
		$kpx = $this->input->post('kpx');

		if($kpx == 1){
			$id_pasien = $this->input->post('id_pasien');
		}else{
			$id_pasien = $this->m_pasien->get_max_id_pasien();
		}
		
		$tanggal_reg = $this->input->post('tanggal');
		$jam_reg = $this->input->post('jam');
		$id_pegawai = $this->input->post('id_pegawai');
		$id_klinik = $this->input->post('id_klinik');
		$id_layanan = $this->input->post('id_layanan');
		
		if($kpx == 2){
			$nama = trim(strtoupper($this->input->post('nama2')));
			$tempat_lahir = $this->input->post('tempat_lahir2');
			$tanggal_lahir = $this->input->post('tgl_lahir2');
			$nik = $this->input->post('nik2');
			$jenis_kelamin = $this->input->post('jenis_kelamin2');
			$suku = $this->input->post('suku2');
			$pekerjaan = $this->input->post('kerja2');
			$alamat_rumah = $this->input->post('alamat_rumah2');
			$telp_rumah = $this->input->post('telp2');
			$alamat_kantor = $this->input->post('alamat_kantor2');
			$hp = $this->input->post('hp2');

			$pasien = [
				'nama' => $nama,
				'tempat_lahir' => $tempat_lahir,
				'tanggal_lahir' => $tanggal_lahir,
				'nik' => $nik,
				'jenis_kelamin' => $jenis_kelamin,
				'suku' => $suku,
				'pekerjaan' => $pekerjaan,
				'alamat_rumah' => $alamat_rumah,
				'telp_rumah' => $telp_rumah,
				'alamat_kantor' => $alamat_kantor,
				'hp' => $hp,
				'is_aktif' => 1,
			];	

			$pasien['id'] = $id_pasien;
			$pasien['no_rm'] = $this->m_pasien->get_kode_rm(substr($nama,0,2));
			$pasien['created_at'] = $timestamp;

			$insert = $this->m_pasien->save($pasien);
		}

		$registrasi = [
			'id_klinik' => $id_klinik,
			'id_layanan' => $id_layanan,
			'id_pasien' => $id_pasien,
			'tanggal_reg' => $tanggal_reg,
			'jam_reg' => $jam_reg,
			'id_pegawai' => $id_pegawai,
		];

			$id = $this->t_registrasi->get_max_id();
			$registrasi['id'] = $id;
			$registrasi['no_reg'] = $this->t_registrasi->get_kode_reg();
			$registrasi['created_at'] = $timestamp;
			$insert = $this->t_registrasi->save($registrasi);
			$pesan = 'Sukses Menambah data Registrasi';
				
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			$retval['status'] = false;
			$retval['pesan'] = 'Gagal memproses Data Registrasi';
		}else{
			$this->db->trans_commit();
			try {
				$regist = $this->t_registrasi->get_regist($id);
				$this->load->library('Api_wa');
				$wa = new Api_wa;
				$nomor = $regist->hp;
				$message = 'Hallo Bapak/ibu *'.$regist->nama.'* kami telah menerima pendaftaran anda pada klinik *'.$regist->nama_klinik.'* yang beralamat pada '.$regist->alamat_klinik.' Pada tanggal '.$regist->tanggal_reg.' Pukul '.$regist->jam_reg.' Harap datang tepat waktu. Terimakasih atas kepercayaan anda :)';
				$hasil = $wa->send($nomor, $message);
				
			} catch (Exception $e) {
			// exception is raised and it'll be handled here
			// $e->getMessage() contains the error message
			}
			$retval['status'] = true;
			$retval['pesan'] = $pesan;
		}

		echo json_encode($retval);

	}
    
	public function thanks()
    {
		$content = 'daftar/v_thanks';
 
		$data = [
			'content' =>  $content,
		];
		
		$this->load->view('v_template', $data);
    }

    public function v_tempat()
    {
        
            $res = null;

            $datas = $this->m_klinik->getAll();
            
            foreach($datas as $value){
                $res .= "<div class='col-lg-4'>
                            <div class='card-service wow fadeInUp'>
                            <div class='body'>
                                <h5 class='text-secondary'>" . $value->nama_klinik . "</h5>
                                <p>We help you define your SEO objective & develop a realistic strategy with you</p>
                                <a href='service.html' class='btn btn-primary'>Read More</a>
                            </div>
                            </div>
                        </div>";
            }
        
               //add the header here
                header('Content-Type: application/json');
                echo json_encode( $res );

            // return \Response::json([
            //     "status"   => "success",
            //     "response" => $res,
            // ]);
    }
}