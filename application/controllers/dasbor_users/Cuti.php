<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Pdf');
	}

	//halaman detail cuti/detail
	public function detail()
	{
		error_reporting(0);
		$data_cuti = $this->cuti_model_user->listing_detail();
		$data_pegawai = $this->pegawai_model_user->listing_pegawai();
		$list_pegawai = $this->pegawai_model_user->listing_nama();
		$list_nama_atasan = $this->pegawai_model_user->listing_nama_atasan();
		$data_history_cuti = $this->cuti_model_user->history_cuti();
		$kuota_cuti = $this->cuti_model_user->listing_setting_cuti();
		$tag_cuti = $this->cuti_model_user->tag_cuti();
		$unit_kerja = $data_pegawai->unit_kerja;
		$cuti_unit_kerja = $this->cuti_model_user->cuti_unit_kerja($unit_kerja);
		$jabatan = $this->pegawai_model_user->listing_nama_jabatan_all();
		$data = array(
			'title' 			=> 	'Data Detail Cuti',
			'alt'				=> 	'Beranda',
			'icon'				=> 	'home',
			'sub'				=>	'Cuti',
			'interface'			=>	'Halaman Detail Cuti Pegawai',
			'data_cuti'			=>	$data_cuti,
			'data_pegawai'		=>	$data_pegawai,
			'list_pegawai'		=>	$list_pegawai,
			'list_nama_atasan'	=>	$list_nama_atasan,
			'data_history_cuti'	=>	$data_history_cuti,
			'kuota_cuti'		=>	$kuota_cuti,
			'tag_cuti'			=>	$tag_cuti,
			'cuti_unit_kerja'	=>	$cuti_unit_kerja,
			'jabatan'			=>	$jabatan,
		 	'page'				=>	'dasbor_users/cuti/detail'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);	
	}

	//halaman edit cuti/list_tambah
	public function listing_tambah()
	{	
		$data = array(
			'title' 	=> 	'Data Detail Cuti',
			'alt'		=> 	'Beranda',
			'icon'		=> 	'home',
			'sub'		=>	'Cuti',
			'interface'	=>	'Tambah Cuti Pegawai',
		 	'page'		=>	'dasbor_admin/cuti/listing_tambah'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	private function cekTgl($tgl, $append = false) {
		if (!empty($tgl) && $append === true) {
			$this->cek_tgl[] = $tgl;
		} elseif (!empty($tgl) && !$append) {
			$this->cek_tgl = $tgl;
		}
	}
	
	private function cek_empty($data) {
		$iiii = 0;
		$valid = array();
		foreach ($data as $k => $v) {
			foreach ($v as $key => $val) {
				if (!empty($val)) {
					$valid[] = array('nama' => $key, 'tanggal' => $val);
				}
			}
		}
		
		if (empty($valid)) {
			return array();
		} else {
			return $valid;
		}
	}

	//halaman tambah cuti/listing_tambah
	public function tambah()
	{	
		error_reporting(0);
		$this->load->library('Test');
		$i=$this->input;
		$hari = substr($i->post('awal'), 0, 2);
		$bulan = substr($i->post('awal'), 3, 2);
		$tahun = substr($i->post('awal'), 6, 4);
		$tanggal = $tahun.'-'.$bulan.'-'.$hari;
		
		$strs = array();
		for ($nj = 0; $nj < $i->post('lama_angka'); $nj++) {
			$strs[$tahun.'-'.$bulan.'-'.($hari + $nj)] = $tahun.'-'.$bulan.'-'.($hari + $nj);
		}
		$kuota_Cuti = $this->db->query("SELECT * FROM data_kuota_cuti WHERE nama_unit_kerja = ".$this->db->escape($i->post('unit_kerja')));
		$jml_Kuota = $kuota_Cuti->row();
		
		$this->db->where('unit_kerja', $i->post('unit_kerja'));
		$this->db->where('jenis_cuti', 'Cuti Tahunan');
		$this->db->like('awal', $tahun.'-'.$bulan);
		$result = $this->db->get('data_cuti');
		$v_errors = array();
		$msg = '';
		$nama = '';
		foreach ($result->result() as $v) {
			$v_tanggal = array();
			for ($hitung = 0; $hitung < $v->lama_angka; $hitung++) {
				$h_hari = substr($v->awal, 8, 2);
				$h_bulan = substr($v->awal, 5, 2);
				$h_tahun = substr($v->awal, 0, 4);
				if ((bool) $strs[$h_tahun.'-'.$h_bulan.'-'.($h_hari + $hitung)]) {
					$v_tanggal[] = date("d F Y", strtotime($strs[$h_tahun.'-'.$h_bulan.'-'.($h_hari + $hitung)]));
				}
			}
			$v_errors[] = array($v->nama => $v_tanggal);
		}
		
		$v_errors = $this->cek_empty($v_errors);
		
		if ($jml_Kuota->jml_cuti === '0') {
			echo '<script>alert("Mohon set settingan unit kuota cuti, karena jumlah cuti pada unit kerja 0")</script>';
			redirect(base_url('dasbor_users/detail_pegawai'),'refresh');
		}
		$errorCode = count($v_errors) >= $jml_Kuota->jml_cuti;

		//-------------------------------------------------------------------------------------------------------
		$this->db->where('jenis_cuti', 'Cuti Tahunan');
		$this->db->like('awal', $tahun.'-'.$bulan);
		$cek_dataBulanIni = $this->db->get('data_cuti');
		if ($cek_dataBulanIni) {
			$cek_hari = false;
			$dataResult = array();
			$kuotaCuti = $this->db->query("SELECT * FROM data_kuota_cuti WHERE nama_unit_kerja = ".$this->db->escape($i->post('unit_kerja')));
			$jmlKuota = $kuotaCuti->row();
			//var_dump($cek_dataBulanIni->result());
			if ($cek_dataBulanIni->num_rows() > 0) {
				$getDate = array();
				$iii = 0;
				foreach ($cek_dataBulanIni->result() as $rowBulanIni) {
					$k_hari = substr($rowBulanIni->awal, 8, 2);
					$k_bulan = substr($rowBulanIni->awal, 5, 2);
					$k_tahun = substr($rowBulanIni->awal, 0, 4);
					for ($l = 0, $c_a = $rowBulanIni->lama_angka; $l < $c_a; $l++) {
						$getDate[$iii][$k_tahun.'-'.$k_bulan.'-'.($k_hari + $l)] = $k_tahun.'-'.$k_bulan.'-'.($k_hari + $l);
					}
					
					$iii++;
				}
				
				$testGig = array();
				for ($iiii = 0; $iiii < $i->post('lama_angka'); $iiii++) {
					//echo $tahun.'-'.$bulan.'-'.($hari + $iiii).'<br>';
					$testGig[] = $tahun.'-'.$bulan.'-'.($hari + $iiii);
				}
				
				
				$getDataDate = array();
				$hitungLamaHariCuti = 0;
				foreach ($testGig as $setDate) {
					foreach ($getDate as $valDate) {
						if (isset($valDate[$setDate])) {
							$getDataDate[$hitungLamaHariCuti][] = $valDate[$setDate];
							continue;
						}
					}
					
					$hitungLamaHariCuti++;
				}
				$message = 'Tanggal ';
				foreach ($getDataDate as $dataDate) {
					var_dump(count($dataDate) >= $jmlKuota->jml_kuota);
					if (count($dataDate) == $jmlKuota->jml_kuota || count($dataDate) >= $jmlKuota->jml_kuota) {
						$cek_hari = true;
						$dataResult[] = $dataDate;
						$message .= '<b style="color:red">'.$dataDate[0].'</b>, ';
					}
				}
				
				$message = rtrim($message, ', ');
				$message .= ' telah terpakai';
			}
		}
		
		// validasi pengganti cuti
		$this->db->where(array('id_pengganti' => $i->post('id_pengganti'), 'pengganti' => $i->post('pengganti')));
		$this->db->like('awal', $tahun.'-'.$bulan);
		$row_cek = $this->db->get('data_cuti')->result();
		$cek_tanggal = array();
		$nama_pengganti = '';
		$bagian_pemohon ='';
		foreach ($row_cek as $val_cek) {
			$lama_angka = $val_cek->lama_angka;
			$awal = $val_cek->awal;
			$cek_hari = substr($awal, 8, 2);
			$cek_bulan = substr($awal, 5, 2);
			$cek_tahun = substr($awal, 0, 4);
			$nama_pengganti .= $val_cek->pengganti;
			$bagian_pemohon .= $val_cek->nama;
			for ($ik = 0; $ik < $lama_angka; $ik++) {
				$cek_tanggal[][$cek_tahun.'-'.$cek_bulan.'-'.($cek_hari + $ik)] = true;
			}
		}
		   
		$tanggal2 = '';
		for ($nk = 0; $nk < count($cek_tanggal); $nk++) {
			for ($nkk = 0; $nkk < $i->post('lama_angka'); $nkk++) {
				if ($cek_tanggal[$nk][$tahun.'-'.$bulan.'-'.($hari + $nkk)]) {
					$stsError = true;
					foreach ($cek_tanggal[$nk] as $key => $val) {
						$tanggal2 .= date("d F Y", strtotime($key)).', ';
					}
				}
			}
		}
		
		//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		if($i->post('lama_angka')==1){
			$lama_huruf = "Satu"; 
		}else if($i->post('lama_angka')==2){
			$lama_huruf = "Dua";
		}else if($i->post('lama_angka')==3){
			$lama_huruf = "Tiga";
		}else if($i->post('lama_angka')==4){
			$lama_huruf = "Empat";
		}else if($i->post('lama_angka')==5){
			$lama_huruf = "Lima";
		}else if($i->post('lama_angka')==6){
			$lama_huruf = "Enam";
		}else if($i->post('lama_angka')==7){
			$lama_huruf = "Tujuh";
		}else if($i->post('lama_angka')==8){
			$lama_huruf = "Delapan";
		}else if($i->post('lama_angka')==9){
			$lama_huruf = "Sembilan";
		}else if($i->post('lama_angka')==10){
			$lama_huruf = "Sepuluh";
		}else if($i->post('lama_angka')==11){
			$lama_huruf = "Sebeleas";
		}else if($i->post('lama_angka')==12){
			$lama_huruf = "Dua Belas";
		}
		//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		$query_cuti = $this->db->query("SELECT * FROM data_cuti WHERE id_data_pegawai='".$this->session->userdata('id_user')."' order by id_cuti DESC ");
		$row_cuti = $query_cuti->row();
		
		$str_tahun = substr($row_cuti->tahun,3,7);
		$convert_thn = date($str_tahun);
		if(date("Y")-date($convert_thn)==1)
		{
			if($row_cuti->sisa_cuti+12>=18)
			{
				$max =18;
				$cuti = $max-$i->post('lama_angka');
			}else
			{
				$max = $row_cuti->sisa_cuti+12;
				$cuti = $max-$i->post('lama_angka');
			}	
		}else if(date("Y") AND $row_cuti->sisa_cuti==""){
			$max = 12;
			$cuti = $max-$i->post('lama_angka');
		}else{
	        if($row_cuti->sisa_cuti<0)
			{
			    $max = 12;
			    $cuti = $max-$i->post('lama_angka')+$row_cuti->sisa_cuti;    
			}else{
			    $max = $row_cuti->total_cuti;
			    $cuti = $row_cuti->sisa_cuti-$i->post('lama_angka');   
			}
		}

		$id_data_pegawai = $this->session->userdata('id_user');
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		$hari_libur = $_POST['hari_libur'];
		$data = array(
			'id_data_pegawai'	=> 	$id_data_pegawai,
			'id_pengganti'		=> 	$i->post('id_pengganti'),
			'bulan_surat'		=>	$i->post('bulan_surat'),
			'gender'			=>	$i->post('gender'),
			'panggilan'			=>	$i->post('panggilan'),
			'nama'				=>	$i->post('nama'),
			'nip'				=>	$i->post('nip'),
			'nrk'				=>	$i->post('nrk'),
			'pangkat'			=>	$i->post('pangkat'),
			'jabatan'			=>	$i->post('jabatan'),
			'golongan'			=>	$i->post('golongan'),
			'unit_kerja'		=>	$i->post('unit_kerja'),
			'lama_angka'		=>	$i->post('lama_angka'),
			'lama_huruf'		=>	$lama_huruf,
			'awal'				=>	date("Y-m-d",strtotime($i->post('awal'))),
			'bulan_awal'		=>	date("m",strtotime($i->post('awal'))),
			'akhir'				=>	date("Y-m-d",strtotime("+".($i->post('lama_angka')-1+$hari_libur)." day",strtotime($i->post('awal')))),
			'bulan_akhir'		=>	date("m",strtotime("+".($i->post('lama_angka')-1+$hari_libur)." day",strtotime($i->post('awal')))),
			'jml_hari_libur'	=>	$hari_libur,
			'tanggal_libur'		=>	implode(',',$i->post('list_hari_libur')),
			'lokasi'			=>	$i->post('lokasi'),
			'nomor'				=>	$i->post('nomor'),
			'pengganti'			=>	$i->post('pengganti'),
			'nip_pengganti'		=>	$i->post('nip_pengganti'),
			'pangkat_pengganti'	=>	$i->post('pangkat_pengganti'),
			'atasan_langsung'	=>	$i->post('atasan_langsung'),
			'nip_atasan'		=>	$i->post('nip_atasan'),
			'total_cuti'		=>	$max,
			'sisa_cuti'			=>	$cuti,
			'status'			=>	'Menunggu',
			'status_print'		=>	'Belum',
			'status_cuti'		=>	'Cuti',
			'jenis_cuti'		=>	'Cuti Tahunan',
			'alasan_cuti'		=>	$i->post('alasan_cuti'),
			'tahun'				=>	date("m-Y",strtotime($i->post('awal')))
		 );
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		//var_dump($data);
		$id_data_pegawai = $data['id_data_pegawai'];
		$tanggal_awal = $this->cuti_model->tangal_awal($id_data_pegawai);
		$kuota_cuti = $this->db->query('SELECT * FROM data_kuota_cuti WHERE nama_unit_kerja="'.$data['unit_kerja'].'"');// data dinamis jumlah kuota pegawai yang berhak cuti
		$jml_kuota = $kuota_cuti->row();
		$longkap = $this->db->query('SELECT * FROM data_cuti WHERE nama="'.$data['nama'].'" ');// Validasi pengambilan cuti di izinkan jika sudah longkap 1 bulan
		$longkap_data = $longkap->row();
		
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		if($jml_kuota->nama_unit_kerja!=$data['unit_kerja']){//unit kerja di data kuota cuti dan unit kerja di data cuti berbeda
			$this->session->set_flashdata('notiffail','<h4 class="alert-heading">Gagal!</h4> Unit Kerja pada table kuota cuti dan unit kerja pada table data cuti berbeda, silahkan di sesuaikan terlebih dahulu');
			helper_log("add", $this->session->flashdata('notiffail'));
			redirect(base_url('dasbor_users/detail_pegawai'),'refresh');
		} else if ($longkap->num_rows() > $jml_kuota->batas_pengajuan AND date("Y-m-d",strtotime($data['awal'])) <= date("Y-m-d",strtotime("+".$jml_kuota->batas_pengajuan." months",strtotime($tanggal_awal->awal))) ) {
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4>Maaf anda sudah mengajukan cuti di bulan '.date("F Y",strtotime($tanggal_awal->awal)).' atau sebelumnya. Silahkan ajukan kembali di bulan '.date("F Y",strtotime("+2 months",strtotime($tanggal_awal->awal))) );
			helper_log("add", $this->session->flashdata('notiffail'));
			redirect(base_url('dasbor_users/detail_pegawai'),'refresh');	
		} else if (isset($stsError) && !empty($tanggal2)) {
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4>Pengganti atas nama <strong>'.$nama_pengganti.'</strong> sudah menggantikan <strong>'.$bagian_pemohon.'</strong> pada tanggal '.$tanggal2.' ');
			helper_log("add", $this->session->flashdata('notiffail'));
			redirect(base_url('dasbor_users/detail_pegawai'),'refresh');
		}  else if ($errorCode) { // Cek Data dari dalam 1 unit kerja hanya boleh 1 orang saja
			$msg = '';
			foreach ($v_errors as $v_error) {
				//$msg .= 'nama: <strong>'.$v_error['nama'].'</strong> - tanggal: <strong>'.implode(', ', $v_error['tanggal']).'</strong><br>';
				$msg .= 'tanggal <strong>'.implode(', ', $v_error['tanggal']).'</strong> telah di gunakan oleh <strong>'.$v_error['nama'].'</strong>, ';
			}
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4> Maaf anda tidak bisa cuti dalam satu unit kerja di waktu yang bersamaan. Cuti pada '.rtrim($msg, ', '));
			helper_log("add", $this->session->flashdata('notiffail'));
			redirect(base_url('dasbor_users/detail_pegawai'),'refresh');
		} else if ($cek_hari && count($dataResult) > 0) { // Cek dari seluruh bulan ini apakah ada hari yang sama sesuai jumlah batasan kuota cuti
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4>Maaf anda tidak dapat mengajukan cuti, Kuota Sudah Terpenuhi, Hubungi atasan langsung anda jika alasan cuti anda penting');
			helper_log("add", $this->session->flashdata('notiffail'));
			redirect(base_url('dasbor_users/detail_pegawai'),'refresh');
		} else {
			$this->cuti_model_user->tambah($data);
			$this->session->set_flashdata('notifval', '<h4 class="alert-heading">Sukses!</h4>cuti anda berhasil di tambahkan'.$get_sisa_cuti->nama.' '.$get_sisa_cuti->sisa_cuti);
			helper_log("add", $this->session->flashdata('notifval'));
			redirect(base_url('dasbor_users/detail_pegawai'),'refresh');
		}
	}

	//halaman edit cuti/list_edit
	public function listing_edit($id_cuti)
	{	
		$data_cuti = $this->cuti_model_user->listing_edit($id_cuti);
		$list_pegawai = $this->pegawai_model_user->listing_nama();
		$list_nama_atasan = $this->pegawai_model_user->listing_nama_atasan_all();
		$list_hari_libur = $this->cuti_model_user->listing_hari_libur($id_cuti);
		$data = array(
			'title' 			=> 	'Data Detail Cuti',
			'alt'				=> 	'Beranda',
			'icon'				=> 	'home',
			'sub'				=>	'Cuti',
			'interface'			=>	'Halaman Edit Cuti Pegawai',
			'data_cuti'			=>	$data_cuti,
			'list_pegawai'		=>	$list_pegawai,
			'list_nama_atasan'	=>	$list_nama_atasan,
			'list_hari_libur'	=>	$list_hari_libur,
		 	'page'				=>	'dasbor_users/cuti/list_edit'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);	
	}

	//halaman edit cuti/list_edit
	/*public function edit()
	{	
		error_reporting(0);
		$this->load->library('Test');
		$i=$this->input;
		$hari = substr($i->post('awal'), 0, 2);
		$bulan = substr($i->post('awal'), 3, 2);
		$tahun = substr($i->post('awal'), 6, 4);
		$tanggal = $tahun.'-'.$bulan.'-'.$hari;
		
		$strs = array();
		for ($nj = 0; $nj < $i->post('lama_angka'); $nj++) {
			$strs[$tahun.'-'.$bulan.'-'.($hari + $nj)] = $tahun.'-'.$bulan.'-'.($hari + $nj);
		}
		$kuota_Cuti = $this->db->query("SELECT * FROM data_kuota_cuti WHERE nama_unit_kerja = ".$this->db->escape($i->post('unit_kerja')));
		$jml_Kuota = $kuota_Cuti->row();
		
		$this->db->like('awal', $tahun.'-'.$bulan);
		$this->db->where('unit_kerja', $i->post('unit_kerja'));
		$result = $this->db->get('data_cuti');
		$v_errors = array();
		$msg = '';
		$nama = '';
		foreach ($result->result() as $v) {
			$v_tanggal = array();
			for ($hitung = 0; $hitung < $v->lama_angka; $hitung++) {
				$h_hari = substr($v->awal, 8, 2);
				$h_bulan = substr($v->awal, 5, 2);
				$h_tahun = substr($v->awal, 0, 4);
				if ((bool) $strs[$h_tahun.'-'.$h_bulan.'-'.($h_hari + $hitung)]) {
					$v_tanggal[] = date("d F Y", strtotime($strs[$h_tahun.'-'.$h_bulan.'-'.($h_hari + $hitung)]));
				}
			}
			$v_errors[] = array($v->nama => $v_tanggal);
		}
		
		$v_errors = $this->cek_empty($v_errors);
		
		if ($jml_Kuota->jml_cuti === '0') {
			echo '<script>alert("Mohon set settingan unit kuota cuti, karena jumlah cuti pada unit kerja 0")</script>';
			redirect(base_url('dasbor_users/detail_pegawai'),'refresh');
		}
		$errorCode = count($v_errors) >= $jml_Kuota->jml_cuti;

		//-------------------------------------------------------------------------------------------------------
		
		$this->db->like('awal', $tahun.'-'.$bulan);
		$cek_dataBulanIni = $this->db->get('data_cuti');
		if ($cek_dataBulanIni) {
			$cek_hari = false;
			$dataResult = array();
			$kuotaCuti = $this->db->query("SELECT * FROM data_kuota_cuti WHERE nama_unit_kerja = ".$this->db->escape($i->post('unit_kerja')));
			$jmlKuota = $kuotaCuti->row();
			//var_dump($cek_dataBulanIni->result());
			if ($cek_dataBulanIni->num_rows() > 0) {
				$getDate = array();
				$iii = 0;
				foreach ($cek_dataBulanIni->result() as $rowBulanIni) {
					$k_hari = substr($rowBulanIni->awal, 8, 2);
					$k_bulan = substr($rowBulanIni->awal, 5, 2);
					$k_tahun = substr($rowBulanIni->awal, 0, 4);
					for ($l = 0, $c_a = $rowBulanIni->lama_angka; $l < $c_a; $l++) {
						$getDate[$iii][$k_tahun.'-'.$k_bulan.'-'.($k_hari + $l)] = $k_tahun.'-'.$k_bulan.'-'.($k_hari + $l);
					}
					
					$iii++;
				}
				
				$testGig = array();
				for ($iiii = 0; $iiii < $i->post('lama_angka'); $iiii++) {
					//echo $tahun.'-'.$bulan.'-'.($hari + $iiii).'<br>';
					$testGig[] = $tahun.'-'.$bulan.'-'.($hari + $iiii);
				}
				
				
				$getDataDate = array();
				$hitungLamaHariCuti = 0;
				foreach ($testGig as $setDate) {
					foreach ($getDate as $valDate) {
						if (isset($valDate[$setDate])) {
							$getDataDate[$hitungLamaHariCuti][] = $valDate[$setDate];
							continue;
						}
					}
					
					$hitungLamaHariCuti++;
				}
				$message = 'Tanggal ';
				foreach ($getDataDate as $dataDate) {
					var_dump(count($dataDate) >= $jmlKuota->jml_kuota);
					if (count($dataDate) == $jmlKuota->jml_kuota || count($dataDate) >= $jmlKuota->jml_kuota) {
						$cek_hari = true;
						$dataResult[] = $dataDate;
						$message .= '<b style="color:red">'.$dataDate[0].'</b>, ';
					}
				}
				
				$message = rtrim($message, ', ');
				$message .= ' telah terpakai';
			}
		}
		
		// validasi pengganti cuti
		$this->db->where(array('id_pengganti' => $i->post('id_pengganti'), 'pengganti' => $i->post('pengganti')));
		$this->db->like('awal', $tahun.'-'.$bulan);
		$row_cek = $this->db->get('data_cuti')->result();
		$cek_tanggal = array();
		$nama_pengganti = '';
		$bagian_pemohon ='';
		foreach ($row_cek as $val_cek) {
			$lama_angka = $val_cek->lama_angka;
			$awal = $val_cek->awal;
			$cek_hari = substr($awal, 8, 2);
			$cek_bulan = substr($awal, 5, 2);
			$cek_tahun = substr($awal, 0, 4);
			$nama_pengganti .= $val_cek->pengganti;
			$bagian_pemohon .= $val_cek->nama;
			for ($ik = 0; $ik < $lama_angka; $ik++) {
				$cek_tanggal[][$cek_tahun.'-'.$cek_bulan.'-'.($cek_hari + $ik)] = true;
			}
		}
		   
		$tanggal2 = '';
		for ($nk = 0; $nk < count($cek_tanggal); $nk++) {
			for ($nkk = 0; $nkk < $i->post('lama_angka'); $nkk++) {
				if ($cek_tanggal[$nk][$tahun.'-'.$bulan.'-'.($hari + $nkk)]) {
					$stsError = true;
					foreach ($cek_tanggal[$nk] as $key => $val) {
						$tanggal2 .= date("d F Y", strtotime($key)).', ';
					}
				}
			}
		}
		
		//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		if($i->post('lama_angka')==1){
			$lama_huruf = "Satu"; 
		}else if($i->post('lama_angka')==2){
			$lama_huruf = "Dua";
		}else if($i->post('lama_angka')==3){
			$lama_huruf = "Tiga";
		}else if($i->post('lama_angka')==4){
			$lama_huruf = "Empat";
		}else if($i->post('lama_angka')==5){
			$lama_huruf = "Lima";
		}else if($i->post('lama_angka')==6){
			$lama_huruf = "Enam";
		}else if($i->post('lama_angka')==7){
			$lama_huruf = "Tujuh";
		}else if($i->post('lama_angka')==8){
			$lama_huruf = "Delapan";
		}else if($i->post('lama_angka')==9){
			$lama_huruf = "Sembilan";
		}else if($i->post('lama_angka')==10){
			$lama_huruf = "Sepuluh";
		}else if($i->post('lama_angka')==11){
			$lama_huruf = "Sebeleas";
		}else if($i->post('lama_angka')==12){
			$lama_huruf = "Dua Belas";
		}
		//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		$query_cuti = $this->db->query("SELECT * FROM data_cuti WHERE id_data_pegawai='".$i->post('id_data_pegawai')."' order by id_cuti DESC ");
		$row_cuti = $query_cuti->row();
		
		$str_tahun = substr($row_cuti->tahun,3,7);
		$convert_thn = date($str_tahun);
		if(date("Y")-date($convert_thn)==1)
		{
			if($row_cuti->sisa_cuti+12>=18)
			{
				$max =18;
				$cuti = $max-$i->post('lama_angka');
			}else
			{
				$max = $row_cuti->sisa_cuti+12;
				$cuti = $max-$i->post('lama_angka');
			}	
		}else if(date("Y") AND $row_cuti->sisa_cuti==""){
			$max = 12;
			$cuti = $max-$i->post('lama_angka');
		}else{
			$max = $row_cuti->total_cuti;
			$cuti = $row_cuti->sisa_cuti-$i->post('lama_angka');
		}

		$id_data_pegawai = $this->session->userdata('id_user');

		$id_cuti = $i->post('id_cuti');
		$id_data_pegawai = $this->session->userdata('id_user');
		$data_cuti = $this->cuti_model_user->listing_detail($id_cuti);
		if($data_cuti->lama_angka==$_POST['lama_angka']){
			$cuti = $_POST['sisa_cuti'];
		}else{
			$cuti = ($data_cuti->sisa_cuti+$data_cuti->lama_angka)-$_POST['lama_angka'];
		}
		$hari_libur = $_POST['hari_libur'];
		$data = array(
			'id_cuti'			=> 	$id_cuti,
			'id_data_pegawai'	=>	$id_data_pegawai,
			'id_pengganti'		=>	$i->post('id_pengganti'),
			'bulan_surat'		=>	$i->post('bulan_surat'),
			'gender'			=>	$i->post('gender'),
			'panggilan'			=>	$i->post('panggilan'),
			'nama'				=>	$i->post('nama'),
			'nip'				=>	$i->post('nip'),
			'nrk'				=>	$i->post('nrk'),
			'pangkat'			=>	$i->post('pangkat'),
			'jabatan'			=>	$i->post('jabatan'),
			'golongan'			=>	$i->post('golongan'),
			'unit_kerja'		=>	$i->post('unit_kerja'),
			'lama_angka'		=>	$i->post('lama_angka'),
			'lama_huruf'		=>	$lama_huruf,
			'awal'				=>	date("Y-m-d",strtotime($i->post('awal'))),
			'bulan_awal'		=>	date("m",strtotime($i->post('awal'))),
			'akhir'				=>	date("Y-m-d",strtotime("+".($i->post('lama_angka')-1+$hari_libur)." day",strtotime($i->post('awal')))),
			'bulan_akhir'		=>	date("m",strtotime("+".($i->post('lama_angka')-1+$hari_libur)." day",strtotime($i->post('awal')))),
			'jml_hari_libur'	=>	$hari_libur,
			'tanggal_libur'		=>	implode(',',$i->post('list_hari_libur')),
			'lokasi'			=>	$i->post('lokasi'),
			'nomor'				=>	$i->post('nomor'),
			'pengganti'			=>	$i->post('pengganti'),
			'nip_pengganti'		=>	$i->post('nip_pengganti'),
			'pangkat_pengganti'	=>	$i->post('pangkat_pengganti'),
			'atasan_langsung'	=>	$i->post('atasan_langsung'),
			'nip_atasan'		=>	$i->post('nip_atasan'),
			'sisa_cuti'			=>	$cuti,
			'status'			=>	'Menunggu',
			'status_cuti'		=>	'Cuti',
			'tahun'				=>	date("m-Y",strtotime($i->post('awal')))
		 );

		//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		//var_dump($data);
		$id_data_pegawai = $data['id_data_pegawai'];
		$tanggal_awal = $this->cuti_model->tangal_awal($id_data_pegawai);
		$kuota_cuti = $this->db->query('SELECT * FROM data_kuota_cuti WHERE nama_unit_kerja="'.$data['unit_kerja'].'"');// data dinamis jumlah kuota pegawai yang berhak cuti
		$jml_kuota = $kuota_cuti->row();
		$longkap = $this->db->query('SELECT * FROM data_cuti WHERE nama="'.$data['nama'].'" ');// Validasi pengambilan cuti di izinkan jika sudah longkap 1 bulan
		$longkap_data = $longkap->row();
		
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		if($jml_kuota->nama_unit_kerja!=$data['unit_kerja']){//unit kerja di data kuota cuti dan unit kerja di data cuti berbeda
			$this->session->set_flashdata('notiffail','<h4 class="alert-heading">Gagal!</h4> Unit Kerja pada table kuota cuti dan unit kerja pada table data cuti berbeda, silahkan di sesuaikan terlebih dahulu');
			redirect(base_url('dasbor_users/detail_pegawai'),'refresh');
		} else if ($longkap->num_rows() > $jml_kuota->batas_pengajuan AND date("Y-m-d",strtotime($data['awal'])) <= date("Y-m-d",strtotime("+".$jml_kuota->batas_pengajuan." months",strtotime($tanggal_awal->awal))) ) {
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4>Maaf anda sudah mengajukan cuti di bulan '.date("F Y",strtotime($tanggal_awal->awal)).' atau sebelumnya. Silahkan ajukan kembali di bulan '.date("F Y",strtotime("+2 months",strtotime($tanggal_awal->awal))) );
			redirect(base_url('dasbor_users/detail_pegawai'),'refresh');	
		} else if (isset($stsError) && !empty($tanggal2)) {
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4>Pengganti atas nama <strong>'.$nama_pengganti.'</strong> sudah menggantikan <strong>'.$bagian_pemohon.'</strong> pada tanggal '.$tanggal2.' ');
			redirect(base_url('dasbor_users/detail_pegawai'),'refresh');
		}  else if ($errorCode) { // Cek Data dari dalam 1 unit kerja hanya boleh 1 orang saja
			$msg = '';
			foreach ($v_errors as $v_error) {
				//$msg .= 'nama: <strong>'.$v_error['nama'].'</strong> - tanggal: <strong>'.implode(', ', $v_error['tanggal']).'</strong><br>';
				$msg .= 'tanggal <strong>'.implode(', ', $v_error['tanggal']).'</strong> telah di gunakan oleh <strong>'.$v_error['nama'].'</strong>, ';
			}
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4> Maaf anda tidak bisa cuti dalam satu unit kerja di waktu yang bersamaan. Cuti pada '.rtrim($msg, ', '));
			redirect(base_url('dasbor_users/detail_pegawai'),'refresh');
		} else if ($cek_hari && count($dataResult) > 0) { // Cek dari seluruh bulan ini apakah ada hari yang sama sesuai jumlah batasan kuota cuti
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4>Maaf anda tidak dapat mengajukan cuti, Kuota Sudah Terpenuhi, Hubungi atasan langsung anda jika alasan cuti anda penting');
			redirect(base_url('dasbor_users/detail_pegawai'),'refresh');
		}  else{
			$data_cuti = $this->cuti_model_user->update($data);
			$this->session->set_flashdata('notifval', '<h4 class="alert-heading">Sukses!</h4>Data berhasil di Edit');
			redirect(base_url('dasbor_users/cuti/listing_edit/'.$id_cuti),'refresh');
		}
	}*/

	// Delete
	public function delete($id_cuti){
		$data = array('id_cuti' => $id_cuti);
		$this->cuti_model->delete($data);
		$this->session->set_flashdata('notifval', '<h4 class="alert-heading">Sukses!</h4>Data cuti '.$this->session->userdata('nama').' berhasil di Hapus');
		helper_log("hapus", $this->session->flashdata('notifval'));
		redirect(base_url('dasbor_users/detail_pegawai'),'refresh');	
	}


	//laporan cuti by id
	public function print_by_id($id_cuti,$id_data_pegawai){
		$listing_cuti 	= $this->cuti_model_user->print_by_id($id_cuti);
		$hitory_cuti 	= $this->cuti_model->riwayat_cuti($id_data_pegawai);
		$data = array(
			'listing_cuti' => $listing_cuti,
			'hitory_cuti' => $hitory_cuti,
			);	
		$this->load->view('dasbor_users/cuti/print_cuti3',$data);
	}
}

/* End of file Cuti.php */
/* Location: ./application/controllers/Dasbor_admin/Cuti.php */