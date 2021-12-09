<?php
//defined('BASEPATH ') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_global');
		$this->load->model("m_layanan");
		$this->load->model("m_pegawai");
		$this->load->model("m_pasien");
		$this->load->model("t_registrasi");
		$this->load->model("t_spam");
	}

	public function index()
	{	
		$obj_date = new DateTime();
		$timestamp = $obj_date->format('Y-m-d H:i:s');
		$tanggal = $obj_date->format('Y-m-d');
		
		// echo "<pre>";
		// print_r ($data);
		// echo "</pre>";
		// exit;

		$data['content'] = 'v_home';

		$this->load->view('v_template', $data, FALSE);
	}

	public function pilih_layanan()
	{
		$content = 'v_register';

		$data = [
			'content' =>  $content,
			'layanan' => $this->m_layanan->getAll(),
		];

		$this->load->view('v_template', $data);
	}

	public function save_layanan()
    {
        $spam = $this->t_spam;

		$spam->save();
		$this->session->set_flashdata('success', 'Berhasil disimpan');

		// $content = 'v_pilihdokter';
		$id_spam =  $this->t_spam->getCountIdMember();
		$data = [
			'id_spam' =>  $this->t_spam->getCountIdMember(),
		];
		
		redirect(base_url()."home/pilih_dokter/".$id_spam);
		// $this->load->view('v_template', $data);
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

	public function save_dokter()
    {
        $spam = $this->t_spam;

		$spam->savedokter();
		$this->session->set_flashdata('success', 'Berhasil disimpan');

		$id_spam =  $this->t_spam->getCountIdMember();

		$data = [
			'id_spam' =>  $this->t_spam->getCountIdMember(),
		];
		
		redirect(base_url()."home/pilih_jadwal/".$id_spam);
    }

	public function pilih_jadwal($id_spam)
    {
		$content = 'v_pilihjadwal';
		$spam = $this->t_spam->getById($id_spam);
		$layanan = $this->m_layanan->getById($spam->id_layanan);
		$dokter = $this->m_pegawai->getById($spam->id_pegawai);
 
		$data = [
			'content' =>  $content,
			'layanan' =>  $layanan,
			'dokter'  =>  $dokter,
			'spam' 	  => $this->t_spam->getById($id_spam),
		];
		
		$this->load->view('v_template', $data);
    }

	public function save_jadwal()
    {
        $spam = $this->t_spam;

		$spam->savejadwal();
		$this->session->set_flashdata('success', 'Berhasil disimpan');

		$id_spam =  $this->t_spam->getCountIdMember();

		$data = [
			'id_spam' =>  $this->t_spam->getCountIdMember(),
		];
		
		redirect(base_url()."home/konfirmasi_pendaftaran/".$id_spam);
    }

	public function konfirmasi()
    {
        $spam = $this->t_spam;
		$pasien = $this->m_pasien;
		$regis = $this->t_registrasi;

		$spam->savekonfirmasi();
		$pasien->savepasien();
		$regis->saveregis();
		$this->session->set_flashdata('success', 'Berhasil disimpan');

		$id_spam =  $this->t_registrasi->getCountIdMember();

		$data = [
			'id_spam' =>  $this->t_spam->getCountIdMember(),
		];
		
		redirect(base_url()."home/konfirmasi_pendaftaran/".$id_spam);
    }

	public function konfirmasi_pendaftaran($id_spam)
    {
		$content = 'v_konfirmasi';
		$spam = $this->t_spam->getById($id_spam);
		$layanan = $this->m_layanan->getById($spam->id_layanan);
		$dokter = $this->m_pegawai->getById($spam->id_pegawai);
 
		$data = [
			'content' =>  $content,
			'layanan' =>  $layanan,
			'dokter'  =>  $dokter,
			'spam' 	  => $this->t_spam->getById($id_spam),
		];
		
		$this->load->view('v_template', $data);
    }

	public function thanks($id_spam)
    {
		$content = 'v_thanks';
		$spam = $this->t_spam->getById($id_spam);
		$layanan = $this->m_layanan->getById($spam->id_layanan);
		$dokter = $this->m_pegawai->getById($spam->id_pegawai);
 
		$data = [
			'content' =>  $content,
			'layanan' =>  $layanan,
			'dokter'  =>  $dokter,
			'spam' 	  => $this->t_spam->getById($id_spam),
		];
		
		$this->load->view('v_template', $data);
    }

	public function save_register()
    {
		$obj_date = new DateTime();
		$timestamp = $obj_date->format('Y-m-d H:i:s');

		$id_pasien = $this->input->post('id_pasien');
		$tanggal_reg = $this->input->post('tanggal');
		$jam_reg = $this->input->post('jam');
		$id_pegawai = $this->input->post('id_pegawai');
		$kpx = $this->input->post('kpx');

		$no_reg = $this->t_registrasi->get_kode_reg();

		$registrasi = [
			'id_pasien' => $id_pasien,
			'tanggal_reg' => $tanggal_reg,
			'jam_reg' => $jam_reg,
			'id_pegawai' => $id_pegawai,
			'no_reg' => $no_reg,
		];

		$this->t_registrasi->save($registrasi);
		$this->session->set_flashdata('success', 'Berhasil disimpan');
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
		
		if($kpx = 2){
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
			'id_pasien' => $id_pasien,
			'tanggal_reg' => $tanggal_reg,
			'jam_reg' => $jam_reg,
			'id_pegawai' => $id_pegawai,
		];

			$registrasi['id'] = $this->t_registrasi->get_max_id();
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
			$retval['status'] = true;
			$retval['pesan'] = $pesan;
		}

		echo json_encode($retval);

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

	public function list_layanan()
	{
		$content = 'v_register';

		$data = [
			'content' =>  $content,
			'layanan' => $this->m_layanan->getAll(),
		];

		$output = [
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->m_layanan->count_all(),
			"recordsFiltered" => $this->m_layanan->count_filtered(),
			"data" => $data
		];
		
		echo json_encode($data);
	}


	public function oops()
	{	
		$this->load->view('login/view_404');
	}

	public function bulan_indo($bulan)
	{
		$arr_bulan =  [
			1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
		];

		return $arr_bulan[(int) $bulan];
	}

	private function generate_kode_ref() {

		$chars = array(
			'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
			'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
			'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
			'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
			'0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
		);
	
		shuffle($chars);
	
		$num_chars = count($chars) - 1;
		$token = '';
	
		for ($i = 0; $i < 8; $i++){ // <-- $num_chars instead of $len
			$token .= $chars[mt_rand(0, $num_chars)];
		}
	
		return $token;
	}


}
