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
		$this->load->model("m_user");
		$this->load->model("m_data_medik");
        $this->load->model("m_pasien");
        $this->load->model("t_registrasi");
        $this->load->model("t_spam");
        $this->load->model("t_jadwaldokter");
		$this->load->model("t_jadwal_rutin");
		$this->load->model("t_jadwal_tidak_rutin");
        $this->load->library('PHPCalendar');
		$this->load->library('secure');
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
		
		foreach ($klinik as $key => $value) {
			$value->e_id  = $this->secure->encrypt_url($value->id);
		}

        $data = [
            'content' => $content,
            'klinik' => $klinik,
        ];
        
        $this->load->view('v_template', $data, FALSE);
    }

    public function layanan($encrypt_id)
	{
		$content = 'daftar/v_layanan';
		$id = $this->secure->decrypt_url($encrypt_id);
		$layanan = $this->m_layanan->getAll();

		foreach ($layanan as $key => $value) {
			$value->e_id  = $this->secure->encrypt_url($value->id_layanan);
		}

		$data = [
			'content' => $content,
            'klinik'  => $encrypt_id,
			'layanan' => $layanan,
		];

		$this->load->view('v_template', $data);
	}

    public function dokter($encrypt_id, $encrypt_id_layanan)
	{
		$content = 'daftar/v_dokter';
		$id = $this->secure->decrypt_url($encrypt_id);
		$id_layanan = $this->secure->decrypt_url($encrypt_id_layanan);
        $layanan = $this->m_layanan->getById($id_layanan);
		$explode_dokter = explode(',', $layanan->dokter);
		
		// foreach($explode_dokter as $key => $value){
		// 	// $valuedokter  = $this->m_pegawai->getById($value);
		// }

		$data = [
			'content' =>  $content,
			'klinik'  => $encrypt_id,
            'layanan' =>  $encrypt_id_layanan,
			'dokter_list' => $explode_dokter,
			'dokter'  => $this->m_pegawai->getAll(),
		];

		$this->load->view('v_template', $data);
	}

    public function konfirmasi($encrypt_value, $encrypt_id_layanan, $encrypt_id_klinik, $encrypt_id_dokter, $encrypt_tanggal)
	{
		$content = 'daftar/v_konfirmasi';
		$value = $this->secure->decrypt_url($encrypt_value);
		$id_layanan = $this->secure->decrypt_url($encrypt_id_layanan);
		$id_klinik = $this->secure->decrypt_url($encrypt_id_klinik);
		$id_dokter = $this->secure->decrypt_url($encrypt_id_dokter);
		$tanggal = $this->secure->decrypt_url($encrypt_tanggal);
        // $jadwal = $this->t_jadwaldokter->getById($id_log);
        $layanan = $this->m_layanan->getById($id_layanan);
        $klinik = $this->m_klinik->getById($id_klinik);
        $dokter = $this->m_pegawai->getById($id_dokter);
		$user  = $this->m_user->getById($id_dokter);

		$start_time    = strtotime ($value);
		$add_mins  = $layanan->waktu_layanan * 60;
        $plus = $start_time + $add_mins;
		$estimasi = date ("H:i", $plus);

		$dayList = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
		);

		$hari = $dayList[date_format(date_create($tanggal), "D")];

		$data = [
			'content' 	=>  $content,
            'tanggal'  	=>  $tanggal,
            'layanan' 	=>  $layanan,
            'jam'     	=>  $value,
			'hari'     	=>  $hari,
			'user'     	=>  $user,
			'estimasi'  =>  $estimasi,
            'klinik'  	=>  $klinik,
            'dokter'  	=>  $dokter,
		];

		$this->load->view('v_template', $data);
	}

    public function jadwal($encrypt_id, $encrypt_id_layanan, $encrypt_id_dokter)
	{
		$content = 'daftar/v_jadwal';
		$id = $this->secure->decrypt_url($encrypt_id);
		$id_layanan = $this->secure->decrypt_url($encrypt_id_layanan);
		$id_dokter = $this->secure->decrypt_url($encrypt_id_dokter);
        $klinik = $this->m_klinik->getById($id);
        $layanan = $this->m_layanan->getById($id_layanan);
        $dokter = $this->m_pegawai->getById($id_dokter);
        // $data_calendar = $this->t_jadwaldokter->getAll($id_dokter,$id);
		$calendar = array();

		// Menentukan Tanggal 1 Bulan
		$sebulan = mktime(0,0,0,date("n"),date("j")+30,date("Y"));
		$semua   = date("d-m-Y", $sebulan);
		$begin 	 = new DateTime(date('Y-m-d'));
		$end 	 = new DateTime($semua);

		$interval = DateInterval::createFromDateString('1 day');
		$period = new DatePeriod($begin, $interval, $end);

		$dayList = array(
			'Sun' => 'minggu',
			'Mon' => 'senin',
			'Tue' => 'selasa',
			'Wed' => 'rabu',
			'Thu' => 'kamis',
			'Fri' => 'jumat',
			'Sat' => 'sabtu'
		);
		
        foreach ($period as $val) 
		{
			$hari = $dayList[$val->format("D")];
			$tanggal = $val->format('Y-m-d');
			// Cek apakah tanggal tersebut merupakan tanggal tidak rutin ?
			$tdk_rutin = $this->t_jadwal_tidak_rutin->getByTanggal($id_dokter,$id,$tanggal);

			$prei = $this->t_jadwal_tidak_rutin->getByLibur($id_dokter, $id, $tanggal);
			
			// Cek apakah hari pada tanggal tersebut merupakan jadwal rutin ?
			$rutin = $this->t_jadwal_rutin->getByHari($id_dokter,$id,$hari);
			
			// $podo = $prei == $rutin->hari;

			if($tdk_rutin != null){
				$calendar[] = array(
					'id' 	 => intval($tdk_rutin->id),
					'title' => date_format( date_create($tdk_rutin->tanggal) ,"d"),
					'rutin' => intval(1),
					'start' => date_format( date_create($tdk_rutin->tanggal) ,"Y-m-d"),
					'color' => '#00e12a',
				);
			}elseif($rutin != null && $prei != null){
				$dinoprei = $dayList[date_format(date_create($prei->tanggal), "D")];
				if($dinoprei == $rutin->hari){
					
				}
			} elseif ($rutin != null) {	
				$calendar[] = array(
					'id' 	=> intval($rutin->id),
					'title' => $val->format("d"),
					'rutin' => intval(2),
					'start' => $val->format('Y-m-d'),
					'color' => '#00e12a',
				);
			}
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
			$rutin = $this->input->post('rutin');

			$mil = $this->input->post('tanggal');
			$seconds = $mil / 1000;
			$tanggal = date("Y-m-d", $seconds);;

			if($rutin == 1){
				$jadwal = $this->t_jadwal_tidak_rutin->getById($id);
			}else{
				$jadwal = $this->t_jadwal_rutin->getById($id);
			}

            $rutin = $this->t_jadwal_rutin->getById($id);
            $layanan = $this->m_layanan->getById($id_layanan);

            // Tampilkan Keseluruhan Jam di hari yang dipilih
            $starttime = $rutin->jam_mulai;
            $endtime = $rutin->jam_akhir;
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
				$cek = $this->t_registrasi->getAllDaftar($value,$jadwal->id_klinik,$tanggal);
				

				if($cek != null){
					$res .= '<a href="" onclick="return false;" class="btn btn-danger" style="margin-left:5px;margin-bottom:5px;width: 125px;background-color: #cfcfcf;border-color: #cfcfcf;">'. $value . ' WIB';
				}else{
					$res .= '<a href=' . base_url() . "pendaftaran/konfirmasi/" . $this->secure->encrypt_url($value) . "/" . $this->secure->encrypt_url($id_layanan) . "/" . $this->secure->encrypt_url($jadwal->id_klinik) . "/" . $this->secure->encrypt_url($jadwal->id_dokter) . "/" . $this->secure->encrypt_url($tanggal) . ' class="btn btn-success" style="margin-left:5px;margin-bottom:5px;width: 125px;">' . $value . ' WIB';
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
		$estimasi = $this->input->post('estimasi');
		$id_pegawai = $this->input->post('id_pegawai');
		$id_klinik = $this->input->post('id_klinik');
		$id_layanan = $this->input->post('id_layanan');
		$penyakit_jantung = $this->input->post('penyakit_jantung');
		$diabetes = $this->input->post('diabetes');
		$haemopilia = $this->input->post('haemopilia');
		$hepatitis = $this->input->post('hepatitis');
		$gastring = $this->input->post('gastring');
		$hamil = $this->input->post('hamil');
		$penyakit_lainnya = $this->input->post('penyakit_lainnya');

		$medik = [
			'penyakit_jantung' => $penyakit_jantung,
			'diabetes' => $diabetes,
			'haemopilia' => $haemopilia,
			'hepatitis' => $hepatitis,
			'gastring' => $gastring,
			'hamil' => $hamil,
			'penyakit_lainnya' => $penyakit_lainnya,
		];

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

			$medik['id'] = $this->m_data_medik->get_max_id_medik();
			$medik['id_pasien'] = $id_pasien;
			$medik['created_at'] = $timestamp;

			$insert = $this->m_data_medik->save($medik);
		}else{
			$cek_medik = $this->m_data_medik->get_by_condition(['id_pasien' => $id_pasien], true);
			$medik['updated_at'] = $timestamp;

			$where = ['id' => $cek_medik->id];
			$update = $this->m_data_medik->update($where, $medik);
		}

		$registrasi = [
			'id_klinik' => $id_klinik,
			'id_layanan' => $id_layanan,
			'id_pasien' => $id_pasien,
			'tanggal_reg' => $tanggal_reg,
			'jam_reg' => $jam_reg,
			'estimasi_selesai' => $estimasi,
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
				// $regist = $this->t_registrasi->get_regist($id);
				// $this->load->library('Api_wa');
				// $wa = new Api_wa;
				// $nomor = $regist->hp;
				// $message = 'Hallo Bapak/ibu *'.$regist->nama.'* Berikut adalah detail registrasi anda  *'.$regist->nama_klinik.'* yang beralamat pada '.$regist->alamat_klinik.' Pada tanggal '.$regist->tanggal_reg.' Pukul '.$regist->jam_reg.' Harap datang tepat waktu. Terimakasih atas kepercayaan anda :)';
				// $hasil = $wa->send($nomor, $message);
				
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