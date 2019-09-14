<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller {
	public $inner;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Pdf');
	}

	public function index()
	{
		$data_cuti = $this->cuti_model->listing();
		$rentang_tanggal = $this->cuti_model->rentang_tanggal();
		$kuota_cuti = $this->cuti_model->listing_setting_cuti();
		$listing_all = $this->cuti_model->listing_all();
		$unit_kerja = $this->pegawai_model->unit_kerja();
		$cuti_setujui = $this->db->where('status','Setujui')->count_all_results("data_cuti");
		$cuti_menunggu = $this->db->where('status','Menunggu')->count_all_results("data_cuti");
		$cuti_tolak = $this->db->where('status','Tolak')->count_all_results("data_cuti");
		$data = array(
			'title' 			=> 	'Data Pegawai Cuti',
			'title_filter'		=>	'Filter Data',
			'title_list_all'	=>	'Data Seluruh Pegawai Yang Mengajukan Cuti',
			'title_sisa_cuti'	=> 	'Data Sisa Kuota Cuti / Tanggal',
			'alt'				=> 	'Beranda',
			'icon'				=> 	'home',
			'sub'				=>	'Cuti',
			'interface'			=>	'Halaman Cuti',
			'data_cuti'			=>	$data_cuti,
			'kuota_cuti'		=>	$kuota_cuti,
			'rentang_tanggal'	=>	$rentang_tanggal,
			'listing_all'		=>	$listing_all,
			'cuti_setujui'		=>	$cuti_setujui,	
			'cuti_menunggu'		=>	$cuti_menunggu,	
			'cuti_tolak'		=>	$cuti_tolak,
			'unit_kerja'		=>	$unit_kerja,
		 	'page'				=>	'dasbor_superadmin/cuti/list'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);	
	}
	public function format_surat(){
		$data = array(
			'title' 	=> 	'Sample Format Surat Cuti',
			'alt'		=> 	'Beranda',
			'icon'		=> 	'home',
			'sub'		=>	'Format Surat',
			'interface'	=>	'Halaman Sample Format Surat',
		 	'page'		=>	'dasbor_superadmin/cuti/format_surat'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	//halaman detail cuti/detail
	public function detail($id_data_pegawai,$id_cuti)
	{
		$data_cuti = $this->cuti_model->listing_detail($id_cuti);
		$hitory_cuti = $this->cuti_model->hitory_cuti_byid($id_data_pegawai);
		$data = array(
			'title' 	=> 	'Data Detail Cuti',
			'alt'		=> 	'Beranda',
			'icon'		=> 	'home',
			'sub'		=>	'Cuti',
			'interface'	=>	'Halaman Detail Cuti Pegawai',
			'data_cuti'	=>	$data_cuti,
			'hitory_cuti'	=>	$hitory_cuti,
		 	'page'		=>	'dasbor_superadmin/cuti/detail'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);	
	}

	public function block_tgl_cuti()
	{
		$data = array(
			'title' 	=> 	'Block Tanggal Cuti',
			'alt'		=> 	'Beranda',
			'icon'		=> 	'home',
			'sub'		=>	'Block Tanggal Cuti',
			'interface'	=>	'Halaman Block Tanggal Pengajuan Cuti',
		 	'page'		=>	'dasbor_superadmin/cuti/block_tgl_cuti'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);	
	}

	public function proses_block_tgl_cuti()
	{
		$tanggal_merah 			= $this->input->post('tanggal_merah');
		$tanggal_cuti_bersama 	= $this->input->post('tanggal_cuti_bersama');

		$data = array(
			'tanggal_libur' 		=> 	date("Y-m-d",strtotime($tanggal_merah)),
			'tanggal_cuti_bersama'	=>	date("Y-m-d",strtotime($tanggal_cuti_bersama))
		);

		$this->db->insert('tanggal_merah',$data);
	}


	//halaman edit cuti/list_tambah
	public function listing_tambah()
	{	
		$list_pegawai = $this->pegawai_model->listing();
		$list_nama_atasan = $this->pegawai_model->listing_nama_atasan_all();
		$list_nip = $this->pegawai_model->listing_pns();
		$all_pegawai = $this->pegawai_model->listing();
		$nrk = $this->pegawai_model->listing();
		$data = array(
			'title' 			=> 	'Data Detail Cuti',
			'alt'				=> 	'Beranda',
			'icon'				=> 	'home',
			'sub'				=>	'Cuti',
			'list_pegawai'		=>	$list_pegawai,
			'list_nama_atasan'	=>	$list_nama_atasan,
			'list_nip'			=>	$list_nip,
			'all_pegawai'		=>	$all_pegawai,
			'nrk'				=>	$nrk,
			'interface'			=>	'Tambah Cuti Pegawai',
		 	'page'				=>	'dasbor_superadmin/cuti/listing_tambah'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//halaman edit cuti/cuti_bersalin
	public function cuti_bersalin()
	{	
		$list_pegawai = $this->pegawai_model->listing();
		$list_nama_atasan = $this->pegawai_model->listing_nama_atasan_all();
		$list_nip = $this->pegawai_model->listing_pns();
		$all_pegawai = $this->pegawai_model->listing_perempuan();
		$nrk = $this->pegawai_model->listing();
		$data = array(
			'title' 			=> 	'Data Detail Cuti',
			'alt'				=> 	'Beranda',
			'icon'				=> 	'home',
			'sub'				=>	'Cuti',
			'list_pegawai'		=>	$list_pegawai,
			'list_nama_atasan'	=>	$list_nama_atasan,
			'list_nip'			=>	$list_nip,
			'all_pegawai'		=>	$all_pegawai,
			'nrk'				=>	$nrk,
			'interface'			=>	'Tambah Cuti Pegawai',
		 	'page'				=>	'dasbor_superadmin/cuti/cuti_bersalin'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//halaman edit cuti/cuti_alasan_penting
	public function cuti_alasan_penting()
	{	
		$list_pegawai = $this->pegawai_model->listing();
		$list_nama_atasan = $this->pegawai_model->listing_nama_atasan_all();
		$list_nip = $this->pegawai_model->listing_pns();
		$all_pegawai = $this->pegawai_model->listing();
		$nrk = $this->pegawai_model->listing();
		$data = array(
			'title' 			=> 	'Data Detail Cuti',
			'alt'				=> 	'Beranda',
			'icon'				=> 	'home',
			'sub'				=>	'Cuti',
			'list_pegawai'		=>	$list_pegawai,
			'list_nama_atasan'	=>	$list_nama_atasan,
			'list_nip'			=>	$list_nip,
			'all_pegawai'		=>	$all_pegawai,
			'nrk'				=>	$nrk,
			'interface'			=>	'Tambah Cuti Pegawai',
		 	'page'				=>	'dasbor_superadmin/cuti/cuti_alasan_penting'
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
		$hari_libur = isset($_POST['hari_libur']) ? $_POST['hari_libur'] : 0;
		$this->load->library('Test');
		$i=$this->input;
		$hari = substr($i->post('awal'), 0, 2);
		$bulan = substr($i->post('awal'), 3, 2);
		$tahun = substr($i->post('awal'), 6, 4);
		$tanggal = $tahun.'-'.$bulan.'-'.$hari;
		
		$strs = array();
		for ($nj = 0; $nj < ($i->post('lama_angka') + $hari_libur); $nj++) {
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
			for ($hitung = 0; $hitung < ($v->lama_angka + $v->jml_hari_libur); $hitung++) {
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
			redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
		}
		$errorCode = count($v_errors) >= $jml_Kuota->jml_cuti;

		//-------------------------------------------------------------------------------------------------------
		$this->db->where('jenis_cuti', 'Cuti Tahunan');
		$this->db->like('awal', $tahun.'-'.$bulan);
		$this->db->where('jenis_cuti !=', 'Cuti Bersalin');
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
					for ($l = 0, $c_a = ($rowBulanIni->lama_angka + $rowBulanIni->jml_hari_libur); $l < $c_a; $l++) {
						$getDate[$iii][$k_tahun.'-'.$k_bulan.'-'.($k_hari + $l)] = $k_tahun.'-'.$k_bulan.'-'.($k_hari + $l);
					}
					
					$iii++;
				}
				
				$testGig = array();
				for ($iiii = 0; $iiii < ($i->post('lama_angka') + $hari_libur); $iiii++) {
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
			for ($ik = 0; $ik < ($lama_angka + $val_cek->jml_hari_libur); $ik++) {
				$cek_tanggal[][$cek_tahun.'-'.$cek_bulan.'-'.($cek_hari + $ik)] = true;
			}
		}
		   
		$tanggal2 = '';
		for ($nk = 0; $nk < count($cek_tanggal); $nk++) {
			for ($nkk = 0; $nkk < ($i->post('lama_angka') + $hari_libur); $nkk++) {
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
	        if($row_cuti->sisa_cuti<0)
			{
			    $max = 12;
			    $cuti = $max-$i->post('lama_angka')+$row_cuti->sisa_cuti;    
			}else{
			    $max = $row_cuti->total_cuti;
			    $cuti = $row_cuti->sisa_cuti-$i->post('lama_angka');   
			}
		}

		/*$id_data_pegawai = $i->post('id_data_pegawai');
		$data_cuti = $this->cuti_model->get_id_pegawai($id_data_pegawai);*/
		//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		$hari_libur = $_POST['hari_libur'];
		$data = array(
			'id_data_pegawai'	=> 	$i->post('id_data_pegawai'),
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
			'tahun'				=>	date("m-Y",strtotime($i->post('awal'))),
			'real_time'			=>	date("Y-m-d")
		 );
		//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		//var_dump($data);
		$id_data_pegawai = $data['id_data_pegawai'];
		$tanggal_awal = $this->cuti_model->tangal_awal($id_data_pegawai);
		$kuota_cuti = $this->db->query('SELECT * FROM data_kuota_cuti WHERE nama_unit_kerja="'.$data['unit_kerja'].'"');// data dinamis jumlah kuota pegawai yang berhak cuti
		$jml_kuota = $kuota_cuti->row();
		$longkap = $this->db->query('SELECT * FROM data_cuti WHERE nama="'.$data['nama'].'" ');// Validasi pengambilan cuti di izinkan jika sudah longkap 1 bulan
		$longkap_data = $longkap->row();
		$tanggal_block = $this->db->query('SELECT * FROM tanggal_merah');		
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		$tanggal_arr = [];
		foreach ($tanggal_block->result() as $row) {
			if(strtotime(date("Y-m-d"))>strtotime($row->tanggal_libur))
			{
				$tanggal_arr[] = [true,'Limit' => $row->tanggal_libur, 'msg' => 'Gagal Cuti'];
			}
			else
			{
				$tanggal_arr[] = [false,'Limit' => $row->tanggal_libur, 'msg' => 'Berhasil Cuti'];	
			}
		}

		$get_disable_date = [];
		$get_enable_date = [];
		foreach ($tanggal_arr as $v) {
			if($v[0])
			{
				$get_enable_date[] = $v;
			}
			else
			{
				$get_disable_date[] = $v;
			}
		}

		//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		if($jml_kuota->nama_unit_kerja!=$data['unit_kerja']){//unit kerja di data kuota cuti dan unit kerja di data cuti berbeda
			$this->session->set_flashdata('notiffail','<h4 class="alert-heading">Gagal!</h4> Unit Kerja pada table kuota cuti dan unit kerja pada table data cuti berbeda, silahkan di sesuaikan terlebih dahulu');
			redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
		} else if ($longkap->num_rows() > $jml_kuota->batas_pengajuan AND date("Y-m-d",strtotime($data['awal'])) <= date("Y-m-d",strtotime("+".$jml_kuota->batas_pengajuan." months",strtotime($tanggal_awal->awal))) ) {
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4>Maaf anda sudah mengajukan cuti di bulan '.date("F Y",strtotime($tanggal_awal->awal)).' atau sebelumnya. Silahkan ajukan kembali di bulan '.date("F Y",strtotime("+2 months",strtotime($tanggal_awal->awal))) );
			redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');	
		} else if (isset($stsError) && !empty($tanggal2)) {
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4>Pengganti atas nama <strong>'.$nama_pengganti.'</strong> sudah menggantikan <strong>'.$bagian_pemohon.'</strong> pada tanggal '.$tanggal2.' ');
			redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
		}  else if ($errorCode) { // Cek Data dari dalam 1 unit kerja hanya boleh 1 orang saja
			$msg = '';
			foreach ($v_errors as $v_error) {
				//$msg .= 'nama: <strong>'.$v_error['nama'].'</strong> - tanggal: <strong>'.implode(', ', $v_error['tanggal']).'</strong><br>';
				$msg .= 'tanggal <strong>'.implode(', ', $v_error['tanggal']).'</strong> telah di gunakan oleh <strong>'.$v_error['nama'].'</strong>, ';
			}
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4> Maaf anda tidak bisa cuti dalam satu unit kerja di waktu yang bersamaan. Cuti pada '.rtrim($msg, ', '));
			redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
		} else if(count($get_disable_date)>0){
			$get_message = [];
			foreach ($get_disable_date as $v) {
			    $get_message[] = $v['limit'] . ' ' . $v['msg'];
			}
			$this->session->set_flashdata('notiffail',implode($get_message, ', '));
			redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
		} else if ($cek_hari && count($dataResult) > 0) { // Cek dari seluruh bulan ini apakah ada hari yang sama sesuai jumlah batasan kuota cuti
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4>Maaf anda tidak dapat mengajukan cuti, Kuota Sudah Terpenuhi, Hubungi atasan langsung anda jika alasan cuti anda penting');
			redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
		} else {
			$this->cuti_model->tambah($data);
			$this->session->set_flashdata('notifval', '<h4 class="alert-heading">Sukses!</h4>cuti anda berhasil di tambahkan'.$get_sisa_cuti->nama.' '.$get_sisa_cuti->sisa_cuti);
			helper_log("add", $this->session->flashdata('notifval'));
			redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');						
		}
	}

	//halaman tambah cuti/cuti_bersalin
	public function tambah_cuti_bersalin()
	{	
		error_reporting(0);
		//-------------------------------------------------------------------------------------------------------
		
		// validasi pengganti cuti
		$i=$this->input;
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
			for ($ik = 0; $ik < ($lama_angka + $val_cek->jml_hari_libur); $ik++) {
				$cek_tanggal[][$cek_tahun.'-'.$cek_bulan.'-'.($cek_hari + $ik)] = true;
			}
		}
		   
		$tanggal2 = '';
		for ($nk = 0; $nk < count($cek_tanggal); $nk++) {
			for ($nkk = 0; $nkk < ($i->post('lama_angka') + $hari_libur); $nkk++) {
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
		$data = array(
			'id_data_pegawai'	=> 	$i->post('id_data_pegawai'),
			'id_pengganti'		=> 	$i->post('id_pengganti'),
			'bulan_surat'		=>	$i->post('bulan_surat'),
			'gender'			=>	'p',
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
			'akhir'				=>	date("Y-m-d",strtotime($i->post('akhir'))),
			'bulan_akhir'		=>	date("m",strtotime($i->post('akhir'))),
			'lokasi'			=>	$i->post('lokasi'),
			'nomor'				=>	$i->post('nomor'),
			'pengganti'			=>	$i->post('pengganti'),
			'nip_pengganti'		=>	$i->post('nip_pengganti'),
			'pangkat_pengganti'	=>	$i->post('pangkat_pengganti'),
			'atasan_langsung'	=>	$i->post('atasan_langsung'),
			'nip_atasan'		=>	$i->post('nip_atasan'),
			'total_cuti'		=>	0,
			'sisa_cuti'			=>	0,
			'status'			=>	'Menunggu',
			'status_print'		=>	'Belum',
			'status_cuti'		=>	'Cuti',
			'jenis_cuti'		=>	'Cuti Bersalin',
			'tahun'				=>	date("m-Y",strtotime($i->post('awal'))),
			'real_time'			=>	date("Y-m-d")
		 );

		//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		if (isset($stsError) && !empty($tanggal2)) {
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4>Pengganti atas nama <strong>'.$nama_pengganti.'</strong> sudah menggantikan <strong>'.$bagian_pemohon.'</strong> pada tanggal '.$tanggal2.' ');
			redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
		}else {
			$this->cuti_model->tambah($data);
			$this->session->set_flashdata('notifval', '<h4 class="alert-heading">Sukses!</h4>cuti anda berhasil di tambahkan'.$get_sisa_cuti->nama.' '.$get_sisa_cuti->sisa_cuti);
			helper_log("add", $this->session->flashdata('notifval'));
			redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');						
		}
	}

	//halaman tambah cuti/cuti_bersalin
	public function tambah_cuti_alasan_penting()
	{	
		error_reporting(0);
		$hari_libur = isset($_POST['hari_libur']) ? $_POST['hari_libur'] : 0;
		$this->load->library('Test');
		$i=$this->input;
		$hari = substr($i->post('awal'), 0, 2);
		$bulan = substr($i->post('awal'), 3, 2);
		$tahun = substr($i->post('awal'), 6, 4);
		$tanggal = $tahun.'-'.$bulan.'-'.$hari;
		
		$strs = array();
		for ($nj = 0; $nj < ($i->post('lama_angka') + $hari_libur); $nj++) {
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
			for ($hitung = 0; $hitung < ($v->lama_angka + $v->jml_hari_libur); $hitung++) {
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
			redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
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
					for ($l = 0, $c_a = ($rowBulanIni->lama_angka + $rowBulanIni->jml_hari_libur); $l < $c_a; $l++) {
						$getDate[$iii][$k_tahun.'-'.$k_bulan.'-'.($k_hari + $l)] = $k_tahun.'-'.$k_bulan.'-'.($k_hari + $l);
					}
					
					$iii++;
				}
				
				$testGig = array();
				for ($iiii = 0; $iiii < ($i->post('lama_angka') + $hari_libur); $iiii++) {
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
			for ($ik = 0; $ik < ($lama_angka + $val_cek->jml_hari_libur); $ik++) {
				$cek_tanggal[][$cek_tahun.'-'.$cek_bulan.'-'.($cek_hari + $ik)] = true;
			}
		}
		   
		$tanggal2 = '';
		for ($nk = 0; $nk < count($cek_tanggal); $nk++) {
			for ($nkk = 0; $nkk < ($i->post('lama_angka') + $hari_libur); $nkk++) {
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

		/*$id_data_pegawai = $i->post('id_data_pegawai');
		$data_cuti = $this->cuti_model->get_id_pegawai($id_data_pegawai);*/
		//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		$hari_libur = $_POST['hari_libur'];
		$data = array(
			'id_data_pegawai'	=> 	$i->post('id_data_pegawai'),
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
			'total_cuti'		=>	$row_cuti->total_cuti,
			'sisa_cuti'			=>	$row_cuti->sisa_cuti,
			'status'			=>	'Menunggu',
			'status_print'		=>	'Belum',
			'status_cuti'		=>	'Cuti',
			'jenis_cuti'		=>	'Cuti Alasan Penting',
			'alasan_cuti'		=>	$i->post('alasan_cuti'),
			'tahun'				=>	date("m-Y",strtotime($i->post('awal'))),
			'real_time'			=>	date("Y-m-d")
		 );
		//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		//var_dump($data);
		$id_data_pegawai = $data['id_data_pegawai'];
		$tanggal_awal = $this->cuti_model->tangal_awal($id_data_pegawai);
		$kuota_cuti = $this->db->query('SELECT * FROM data_kuota_cuti WHERE nama_unit_kerja="'.$data['unit_kerja'].'"');// data dinamis jumlah kuota pegawai yang berhak cuti
		$jml_kuota = $kuota_cuti->row();
		$longkap = $this->db->query('SELECT * FROM data_cuti WHERE nama="'.$data['nama'].'" ');// Validasi pengambilan cuti di izinkan jika sudah longkap 1 bulan
		$longkap_data = $longkap->row();
		$tanggal_block = $this->db->query('SELECT * FROM tanggal_merah');		
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		$tanggal_arr = [];
		foreach ($tanggal_block->result() as $row) {
			if(strtotime(date("Y-m-d"))>strtotime($row->tanggal_libur))
			{
				$tanggal_arr[] = [true,'Limit' => $row->tanggal_libur, 'msg' => 'Gagal Cuti'];
			}
			else
			{
				$tanggal_arr[] = [false,'Limit' => $row->tanggal_libur, 'msg' => 'Berhasil Cuti'];	
			}
		}

		$get_disable_date = [];
		$get_enable_date = [];
		foreach ($tanggal_arr as $v) {
			if($v[0])
			{
				$get_enable_date[] = $v;
			}
			else
			{
				$get_disable_date[] = $v;
			}
		}

		//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		if($jml_kuota->nama_unit_kerja!=$data['unit_kerja']){//unit kerja di data kuota cuti dan unit kerja di data cuti berbeda
			$this->session->set_flashdata('notiffail','<h4 class="alert-heading">Gagal!</h4> Unit Kerja pada table kuota cuti dan unit kerja pada table data cuti berbeda, silahkan di sesuaikan terlebih dahulu');
			redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
		} else if ($longkap->num_rows() > $jml_kuota->batas_pengajuan AND date("Y-m-d",strtotime($data['awal'])) <= date("Y-m-d",strtotime("+".$jml_kuota->batas_pengajuan." months",strtotime($tanggal_awal->awal))) ) {
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4>Maaf anda sudah mengajukan cuti di bulan '.date("F Y",strtotime($tanggal_awal->awal)).' atau sebelumnya. Silahkan ajukan kembali di bulan '.date("F Y",strtotime("+2 months",strtotime($tanggal_awal->awal))) );
			redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');	
		} else if (isset($stsError) && !empty($tanggal2)) {
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4>Pengganti atas nama <strong>'.$nama_pengganti.'</strong> sudah menggantikan <strong>'.$bagian_pemohon.'</strong> pada tanggal '.$tanggal2.' ');
			redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
		}  else if ($errorCode) { // Cek Data dari dalam 1 unit kerja hanya boleh 1 orang saja
			$msg = '';
			foreach ($v_errors as $v_error) {
				//$msg .= 'nama: <strong>'.$v_error['nama'].'</strong> - tanggal: <strong>'.implode(', ', $v_error['tanggal']).'</strong><br>';
				$msg .= 'tanggal <strong>'.implode(', ', $v_error['tanggal']).'</strong> telah di gunakan oleh <strong>'.$v_error['nama'].'</strong>, ';
			}
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4> Maaf anda tidak bisa cuti dalam satu unit kerja di waktu yang bersamaan. Cuti pada '.rtrim($msg, ', '));
			redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
		} else if ($cek_hari && count($dataResult) > 0) { // Cek dari seluruh bulan ini apakah ada hari yang sama sesuai jumlah batasan kuota cuti
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4>Maaf anda tidak dapat mengajukan cuti, Kuota Sudah Terpenuhi, Hubungi atasan langsung anda jika alasan cuti anda penting');
			redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
		} else if(count($get_disable_date)>0){
			$get_message = [];
			foreach ($get_disable_date as $v) {
			    $get_message[] = $v['limit'] . ' ' . $v['msg'];
			}
			$this->session->set_flashdata('notiffail',implode($get_message, ', '));
			redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
		}else {
			$this->cuti_model->tambah($data);
			$this->session->set_flashdata('notifval', '<h4 class="alert-heading">Sukses!</h4>cuti anda berhasil di tambahkan'.$get_sisa_cuti->nama.' '.$get_sisa_cuti->sisa_cuti);
			helper_log("add", $this->session->flashdata('notifval'));
			redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');						
		}
	}

	// Halaman Total Cuti Pegawai
	public function total_cuti() {
		$data = array(
			'title' 				=> 	'Data Total Cuti Pegawai',
			'alt'					=> 	'Beranda',
			'icon'					=> 	'home',
			'sub'					=>	'Total Cuti Pegawai',
			'interface'				=>	'Total Cuti Pegawai',
		 	'page'					=>	'dasbor_superadmin/cuti/total_cuti'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	
	//halaman edit cuti/list_edit
	public function listing_edit($id_cuti)
	{	
		$data_cuti = $this->cuti_model->listing_detail($id_cuti);
		$list_pegawai = $this->pegawai_model->listing();
		$list_nama_atasan = $this->pegawai_model->listing_nama_atasan_all();
		$data = array(
			'title' 			=> 	'Data Detail Cuti',
			'alt'				=> 	'Beranda',
			'icon'				=> 	'home',
			'sub'				=>	'Cuti',
			'interface'			=>	'Halaman Edit Cuti Pegawai',
			'data_cuti'			=>	$data_cuti,
			'list_pegawai'		=>	$list_pegawai,
			'list_nama_atasan'	=>	$list_nama_atasan,
		 	'page'				=>	'dasbor_superadmin/cuti/list_edit'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);	
	}

	//halaman edit cuti/list_edit
	public function edit()
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
			redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
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
		$query_cuti = $this->db->query("SELECT * FROM data_cuti WHERE id_cuti='".$i->post('id_cuti')."' ");
		$row_cuti = $query_cuti->row();
		
		if($row_cuti->lama_angka!=$i->post('lama_angka')){
			$sisacuti = $row_cuti->lama_angka+$row_cuti->sisa_cuti-$i->post('lama_angka');
		}else if($row_cuti->lama_angka==$i->post('lama_angka')){
			$sisacuti =$row_cuti->sisa_cuti;
		}

		//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		$hari_libur = $_POST['hari_libur'];
		$data = array(
			'id_cuti'			=>	$i->post('id_cuti'),
			'id_data_pegawai'	=> 	$i->post('id_data_pegawai'),
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
			'sisa_cuti'			=>	$sisacuti,
			'status'			=>	'Menunggu',
			'status_print'		=>	'Belum',
			'status_cuti'		=>	'Cuti',
			'tahun'				=>	date("m-Y",strtotime($i->post('awal'))),
			'real_time'			=>	date("Y-m-d")
		 );
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		if($jml_Kuota->nama_unit_kerja!=$i->post('unit_kerja')){//unit kerja di data kuota cuti dan unit kerja di data cuti berbeda
			$this->session->set_flashdata('notiffail','<h4 class="alert-heading">Gagal!</h4> Unit Kerja pada table kuota cuti dan unit kerja pada table data cuti berbeda, silahkan di sesuaikan terlebih dahulu');
			redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
		} else if (isset($stsError) && !empty($tanggal2)) {
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4>Pengganti atas nama <strong>'.$nama_pengganti.'</strong> sudah menggantikan <strong>'.$bagian_pemohon.'</strong> pada tanggal '.$tanggal2.' ');
			redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
		} else if ($errorCode) { // Cek Data dari dalam 1 unit kerja hanya boleh 1 orang saja
			$msg = '';
			foreach ($v_errors as $v_error) {
				//$msg .= 'nama: <strong>'.$v_error['nama'].'</strong> - tanggal: <strong>'.implode(', ', $v_error['tanggal']).'</strong><br>';
				$msg .= 'tanggal <strong>'.implode(', ', $v_error['tanggal']).'</strong> telah di gunakan oleh <strong>'.$v_error['nama'].'</strong>, ';
			}
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4> Maaf anda tidak bisa cuti dalam satu unit kerja di waktu yang bersamaan. Cuti pada '.rtrim($msg, ', '));
			redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
		} else if ($cek_hari && count($dataResult) > 0) { // Cek dari seluruh bulan ini apakah ada hari yang sama sesuai jumlah batasan kuota cuti
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4>Maaf anda tidak dapat mengajukan cuti, Kuota Sudah Terpenuhi, Hubungi atasan langsung anda jika alasan cuti anda penting');
			redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
		} else{
			$data_cuti = $this->cuti_model->update($data);
			$this->session->set_flashdata('notifval', '<h4 class="alert-heading">Sukses!</h4>Data berhasil di Edit '.$sisacuti);
			redirect(base_url('dasbor_superadmin/cuti/listing_edit/'.$i->post('id_cuti')),'refresh');
		}
	}

	// Delete
	public function delete($id_cuti,$nama){
		$data = array('id_cuti' => $id_cuti);
		$nama_pegawai = str_replace('%20', ' ', $nama);
		$this->cuti_model->delete($data);
		$this->session->set_flashdata('notifval', '<h4 class="alert-heading">Sukses!</h4>Data Cuti ' .$nama_pegawai. ' berhasil di Hapus');
		helper_log("hapus", $this->session->flashdata('notifval'));
		redirect(base_url('dasbor_superadmin/cuti'),'refresh');	
	}

	//laporan cuti
	public function laporan_cuti(){
		$listing_cuti = $this->cuti_model->laporan_cuti();
		$data = array(
			'title' 	=> 	'Data Laporan Cuti',
			'alt'		=> 	'Laporan',
			'icon'		=> 	'home',
			'sub'		=>	'Laporan Cuti',
			'interface'	=>	'Halaman Laporan Pegawai',
			'listing_cuti'	=>	$listing_cuti,
		 	'page'		=>	'dasbor_superadmin/cuti/laporan_cuti'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);			
	}

	//laporan cuti filter_search
	public function filter_search(){
		$tahun = $_POST['tahun'];
		$status = $_POST['status'];
		$status_print = $_POST['status_print'];
		if($_POST['submit']=="Export ke Excel"){
			$data['listing_cuti'] = $this->cuti_model->filter_search();		
			$this->load->view('dasbor_superadmin/cuti/eksport_excel',$data);
		}else if($_POST['submit']=="Print PDF"){
			$listing_cuti = $this->cuti_model->filter_search();
			$data = array('listing_cuti' => $listing_cuti, );	
			$this->load->view('dasbor_superadmin/cuti/print_pdf',$data);
		}else if($_POST['submit']=="GO!"){
			$listing_cuti = $this->cuti_model->filter_search();
			$data = array(
				'title' 	=> 	'Data Laporan Cuti',
				'alt'		=> 	'Laporan',
				'icon'		=> 	'home',
				'sub'		=>	'Laporan Cuti',
				'interface'	=>	'Halaman Laporan Pegawai',
				'listing_cuti'	=>	$listing_cuti,
			 	'page'		=>	'dasbor_superadmin/cuti/laporan_cuti'
			 );
			$this->session->set_flashdata('tahun', $tahun);
			$this->session->set_flashdata('status', $status);
			$this->session->set_flashdata('status_print', $status_print);
			$this->load->view('layout/wrapper', $data, FALSE);
		}			
	}

	//data cuti filter_search
	public function filter_data_cuti(){
		if($_POST['submit']=="GO!"){
			$data_cuti = $this->cuti_model->filter_data_cuti();
			$rentang_tanggal = $this->cuti_model->rentang_tanggal();
			$kuota_cuti = $this->cuti_model->listing_setting_cuti();
			$unit_kerja = $this->pegawai_model->unit_kerja();
			if($_POST['tahun'] AND $_POST['unit_kerja'] AND $_POST['status']){
				$date = 'Bulan '.$_POST['tahun'];
				$filter_by = '<span class="alert alert-success">Filter Pencaharian Berdasarkan Tahun : '.$_POST['tahun'].' -> Status : '.$_POST['status'].' -> Unit Kerja : '.$_POST['unit_kerja'].'</span>'; 
				$cuti_setujui = $this->db->where('status','Setujui')->where('tahun',$_POST['tahun'])->where('unit_kerja',$_POST['unit_kerja'])->count_all_results("data_cuti");
				$cuti_menunggu = $this->db->where('status','Menunggu')->where('tahun',$_POST['tahun'])->where('unit_kerja',$_POST['unit_kerja'])->count_all_results("data_cuti");
				$cuti_tolak = $this->db->where('status','Tolak')->where('tahun',$_POST['tahun'])->where('unit_kerja',$_POST['unit_kerja'])->count_all_results("data_cuti");
			}else if($_POST['tahun'] AND $_POST['status']){
				$date = 'Bulan '.$_POST['tahun'];
				$filter_by = '<span class="alert alert-success">Filter Pencaharian Berdasarkan Tahun : '.$_POST['tahun'].' -> Status : '.$_POST['status'].'</span>'; 
				$cuti_setujui = $this->db->where('status','Setujui')->where('tahun',$_POST['tahun'])->count_all_results("data_cuti");
				$cuti_menunggu = $this->db->where('status','Menunggu')->where('tahun',$_POST['tahun'])->count_all_results("data_cuti");
				$cuti_tolak = $this->db->where('status','Tolak')->where('tahun',$_POST['tahun'])->count_all_results("data_cuti");
			}else if($_POST['status'] AND $_POST['unit_kerja']){
				$date = 'Bulan '.$_POST['tahun'];
				$filter_by = '<span class="alert alert-success">Filter Pencaharian Berdasarkan Status : '.$_POST['status'].' -> Unit Kerja : '.$_POST['unit_kerja'].'</span>'; 
				$cuti_setujui = $this->db->where('status','Setujui')->where('unit_kerja',$_POST['unit_kerja'])->count_all_results("data_cuti");
				$cuti_menunggu = $this->db->where('status','Menunggu')->where('unit_kerja',$_POST['unit_kerja'])->count_all_results("data_cuti");
				$cuti_tolak = $this->db->where('status','Tolak')->where('unit_kerja',$_POST['unit_kerja'])->count_all_results("data_cuti");
			}else if($_POST['unit_kerja'] AND $_POST['tahun']){
				$date = 'Bulan '.$_POST['tahun'];
				$filter_by = '<span class="alert alert-success">Filter Pencaharian Berdasarkan Tahun : '.$_POST['tahun'].' -> Unit Kerja : '.$_POST['unit_kerja'].'</span>'; 
				$cuti_setujui = $this->db->where('status','Setujui')->where('tahun',$_POST['tahun'])->where('unit_kerja',$_POST['unit_kerja'])->count_all_results("data_cuti");
				$cuti_menunggu = $this->db->where('status','Menunggu')->where('tahun',$_POST['tahun'])->where('unit_kerja',$_POST['unit_kerja'])->count_all_results("data_cuti");
				$cuti_tolak = $this->db->where('status','Tolak')->where('tahun',$_POST['tahun'])->where('unit_kerja',$_POST['unit_kerja'])->count_all_results("data_cuti");
			}else if($_POST['tahun']){
				$date = 'Bulan '.$_POST['tahun'];
				$filter_by = '<span class="alert alert-success">Filter Pencaharian Berdasarkan Tahun : '.$_POST['tahun'].'</span>'; 
				$cuti_setujui = $this->db->where('status','Setujui')->where('tahun',$_POST['tahun'])->count_all_results("data_cuti");
				$cuti_menunggu = $this->db->where('status','Menunggu')->where('tahun',$_POST['tahun'])->count_all_results("data_cuti");
				$cuti_tolak = $this->db->where('status','Tolak')->where('tahun',$_POST['tahun'])->count_all_results("data_cuti");
			}else if($_POST['status']){
				$date = 'Bulan '.$_POST['tahun'];
				$filter_by = '<span class="alert alert-success">Filter Pencaharian Berdasarkan Status : '.$_POST['status'].'</span>'; 
				$cuti_setujui = $this->db->where('status','Setujui')->count_all_results("data_cuti");
				$cuti_menunggu = $this->db->where('status','Menunggu')->count_all_results("data_cuti");
				$cuti_tolak = $this->db->where('status','Tolak')->count_all_results("data_cuti");
			}else if($_POST['unit_kerja']){
				$date = 'Bulan '.$_POST['tahun'];
				$filter_by = '<span class="alert alert-success">Filter Pencaharian Berdasarkan Unit Kerja : '.$_POST['unit_kerja'].'</span>'; 
				$cuti_setujui = $this->db->where('status','Setujui')->where('unit_kerja',$_POST['unit_kerja'])->count_all_results("data_cuti");
				$cuti_menunggu = $this->db->where('status','Menunggu')->where('unit_kerja',$_POST['unit_kerja'])->count_all_results("data_cuti");
				$cuti_tolak = $this->db->where('status','Tolak')->where('unit_kerja',$_POST['unit_kerja'])->count_all_results("data_cuti");
			}else{
				$filter_by = '<span class="alert alert-success">Filter Pencaharian Berdasarkan Tahun : '.$_POST['tahun'].' -> Status : '.$_POST['status'].' -> Unit Kerja : '.$_POST['unit_kerja'].'</span>'; 
				$date = "";
				$cuti_setujui = $this->db->where('status','Setujui')->count_all_results("data_cuti");
				$cuti_menunggu = $this->db->where('status','Menunggu')->count_all_results("data_cuti");
				$cuti_tolak = $this->db->where('status','Tolak')->count_all_results("data_cuti");
			}

			$data = array(
				'title' 			=> 	'Data Pegawai Cuti '.$date,
				'title_filter'		=> 	$filter_by,
				'title_sisa_cuti'	=> 	'Data Sisa Kuota Cuti / Tanggal',
				'title_list_all'	=>	'Data Seluruh Pegawai Yang Mengajukan Cuti '.$_POST['tahun'],
				'alt'				=> 	'Beranda',
				'icon'				=> 	'home',
				'sub'				=>	'Cuti',
				'interface'			=>	'Halaman Cuti',
				'data_cuti'			=>	$data_cuti,
				'kuota_cuti'		=>	$kuota_cuti,
				'rentang_tanggal'	=>	$rentang_tanggal,	
				'cuti_setujui'		=>	$cuti_setujui,
				'cuti_menunggu'		=>	$cuti_menunggu,
				'cuti_tolak'		=>	$cuti_tolak,
				'unit_kerja'		=>	$unit_kerja,	
			 	'page'				=>	'dasbor_superadmin/cuti/list'
			 );
			$this->load->view('layout/wrapper', $data, FALSE);
		}else if($_POST['submit']=="HAPUS"){
			$ids = $this->input->post('id_cuti');
			if($ids==""){
				$this->session->set_flashdata('notiffail', 'Data Gagal di Hapus Silahkan Pilih Data Yang Mau di Hapus Terlebih dahulu');
				redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
			}else{
				for ($i=0; $i < count($ids) ; $i++) { 
					$this->db->where('id_cuti', $ids[$i]);
					$this->db->delete('data_cuti');
					$this->session->set_flashdata('notifval', 'Data Berhasil di Hapus');
				}
				redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
			}
		}else if($_POST['submit']=="SETUJUI"){
			$ids = $this->input->post('id_cuti');
			if($ids==""){
				$this->session->set_flashdata('notiffail', 'Data Gagal di Hapus Silahkan Pilih Data Yang Mau di Hapus Terlebih dahulu');
				redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
			}else{
				for ($i=0; $i < count($ids) ; $i++) 
				{
					$data[]= array(
						'id_cuti' 	=> 	$ids[$i], 
						'status'	=>	'Setujui',
					);

				}
				$this->db->update_batch('data_cuti', $data,'id_cuti'); 
				$this->session->set_flashdata('notifval', 'Data Berhasil di Update');
				redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
			}
		}else if($_POST['submit']=="MENUNGGU"){
			$ids = $this->input->post('id_cuti');
			if($ids==""){
				$this->session->set_flashdata('notiffail', 'Data Gagal di Hapus Silahkan Pilih Data Yang Mau di Hapus Terlebih dahulu');
				redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
			}else{
				for ($i=0; $i < count($ids) ; $i++) 
				{
					$data[]= array(
						'id_cuti' 	=> 	$ids[$i], 
						'status'	=>	'Menunggu',
					);

				}
				$this->db->update_batch('data_cuti', $data,'id_cuti'); 
				$this->session->set_flashdata('notifval', 'Data Berhasil di Update');
				redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
			}
		}else if($_POST['submit']=="TOLAK"){
			$ids = $this->input->post('id_cuti');
			if($ids==""){
				$this->session->set_flashdata('notiffail', 'Data Gagal di Hapus Silahkan Pilih Data Yang Mau di Hapus Terlebih dahulu');
				redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
			}else{
				for ($i=0; $i < count($ids) ; $i++) 
				{
					$data[]= array(
						'id_cuti' 	=> 	$ids[$i], 
						'status'	=>	'Tolak',
					);

				}
				$this->db->update_batch('data_cuti', $data,'id_cuti'); 
				$this->session->set_flashdata('notifval', 'Data Berhasil di Update');
				redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
			}
		}		
	}


	//laporan cuti by id
	public function print_by_id($id_cuti,$id_data_pegawai){
		$listing_cuti 	= $this->cuti_model->print_by_id($id_cuti);
		$hitory_cuti 	= $this->cuti_model->riwayat_cuti($id_data_pegawai);
		$data = array(
			'listing_cuti' => $listing_cuti,
			'hitory_cuti' => $hitory_cuti,
			);	
		$this->load->view('dasbor_superadmin/cuti/print_cuti3',$data);		
	}

	//laporan cuti by id
	public function print_by_id2($id_cuti){
		$listing_cuti = $this->cuti_model->print_by_id($id_cuti);
		$data = array('listing_cuti' => $listing_cuti, );	
		$this->load->view('dasbor_superadmin/cuti/print_cuti2',$data);		
	}
	
	//laporan cuti by id
	public function print_by_id3($id_cuti){
		$listing_cuti = $this->cuti_model->print_by_id($id_cuti);
		$data = array('listing_cuti' => $listing_cuti, );	
		$this->load->view('dasbor_superadmin/cuti/print_cuti4',$data);		
	}

	//update status cuti pegawai
	public function update_status_cuti($id_cuti,$status_cuti){
		$data_cuti = $this->cuti_model->listing_detail($id_cuti);
		$refound = $data_cuti->total_cuti-$data_cuti->sisa_cuti;
		$refound_update = $refound+$data_cuti->sisa_cuti;
		if($status_cuti=="Tolak"){
			$data = array(
				'id_cuti' 	=>	$id_cuti,
				'status'	=>	$status_cuti,
				'sisa_cuti'	=>	$refound_update	
				);
		}else{
			$data = array(
				'id_cuti' 	=>	$id_cuti,
				'status'	=>	$status_cuti
				);
		}
		$this->cuti_model->update_status_cuti($data);
		$this->session->set_flashdata('notifval', 'Status Cuti Berhasil di Update');
		helper_log("edit", $this->session->flashdata('notifval'));
		redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
	}

	public function update_status_print()
	{	
		$id_cuti = $_POST['id_cuti'];
		$status_print = $_POST['status_print'];
		$data = array(
			'id_cuti' 		=>	$id_cuti,
			'status_print'	=>	$status_print
		 );
		$this->db->where('id_cuti',$data['id_cuti']);
		$this->db->update('data_cuti',$data);
		$this->session->set_flashdata('notifval', 'Status print Berhasil di Update');
		helper_log("edit", $this->session->flashdata('notifval'));
		redirect(base_url('dasbor_superadmin/cuti_pegawai/laporan_cuti'),'refresh');
	}

	//setting cuti pegawai
	public function setting_cuti(){
		error_reporting(0);
		$data_setting = $this->cuti_model->listing_setting_cuti();
		$data_setting_surat_cuti = $this->cuti_model->listing_setting_surat_cuti();
		$unit_kerja = $this->pegawai_model->unit_kerja();
		$list_kuota_cuti = $this->cuti_model->list_kuota_cuti();
		$data = array(
				'title' 					=> 	'Setting Informasi Cuti',
				'title2' 					=> 	'Setting Informasi Surat Cuti PDF',
				'title3' 					=> 	'Contoh Langsung Perubahan Data Surat Cuti',
				'alt'						=> 	'Setting',
				'icon'						=> 	'home',
				'sub'						=>	'Setting Informasi Cuti',
				'interface'					=>	'Halaman Setting Cuti',
			 	'data_setting'				=>	$data_setting,
			 	'data_setting_surat_cuti'	=>	$data_setting_surat_cuti,
			 	'unit_kerja'				=>	$unit_kerja,
			 	'list_kuota_cuti'			=>	$list_kuota_cuti,
			 	'page'						=>	'dasbor_superadmin/cuti/setting_cuti'
			 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//tambah_list_setting_kuota
	public function tambah_list_setting_kuota(){
		$unit_kerja = $this->pegawai_model->unit_kerja();
		$data = array(
				'title' 					=> 	'Setting Informasi Kuota',
				'alt'						=> 	'Setting',
				'icon'						=> 	'home',
				'sub'						=>	'Setting Informasi Kuota',
				'interface'					=>	'Halaman Setting Informasi Kuota Cuti',
				'unit_kerja'				=>	$unit_kerja,
			 	'page'						=>	'dasbor_superadmin/cuti/list_set_kuota_cuti'
			 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function tambah_list_set_kuota_cuti(){
		$data = array(
			'nama_unit_kerja' 	=> $_POST['nama_unit_kerja'],
			'jml_kuota' 		=> $_POST['kuota_cuti_seluruh_pegawai'],
			'batas_pengajuan'	=> $_POST['longkap_pengajuan_cuti'],
			'jml_cuti' 			=> $_POST['jumlah_pegawai_diijinkan_cuti']
			 );
		$this->cuti_model->tambah_set_kuota_cuti($data);
		$this->session->set_flashdata('notifval', 'Berhasil Menambahkan Data Setting Kuota Cuti');
		helper_log("add", $this->session->flashdata('notifval'));
		redirect(base_url('dasbor_superadmin/pengaturan_cuti'),'refresh');
	}
	
	public function edit_list_set_kuota_cuti($id_kuota){
		$data = array(
			'id_kuota'			=> $id_kuota,
			'nama_unit_kerja' 	=> $_POST['nama_unit_kerja'],
			'jml_kuota' 		=> $_POST['kuota_cuti_seluruh_pegawai'],
			'batas_pengajuan'	=> $_POST['longkap_pengajuan_cuti'],
			'jml_cuti' 			=> $_POST['jumlah_pegawai_diijinkan_cuti']
			 );
		$this->cuti_model->editkuota_set_kuota_cuti($data);
		$this->session->set_flashdata('notifval', 'Berhasil Edit Data Setting Kuota Cuti');
		helper_log("edit", $this->session->flashdata('notifval'));
		redirect(base_url('dasbor_superadmin/pengaturan_cuti'),'refresh');
	}
	
	public function select_jml_unit()
	{
		$nama_unit_kerja = $_POST['nama_unit_kerja'];
	  	$jum_unit=$this->db->where('unit_kerja',$nama_unit_kerja)->count_all_results('data_pegawai');
	  	//hitung jumlah kuota cuti / unit kerja berdasarkan rumus total pegawai / unit kerja *5%
	  	$jml_orang = $jum_unit;
	  	$rumus = $jml_orang*5/100;
	  	$hasil = $rumus;
	  	echo json_encode($hasil);
	}

	//update setting cuti pegawai
	public function update_setting_cuti(){
		error_reporting(0);
		if($_POST['update_data']=="SETTING KUOTA"){
			$data = array(
						'batas_pengajuan'	=>	$_POST['batas_pengajuan'],
						'nama_unit_kerja'	=>	$_POST['unit_kerja'],
						'jml_cuti'			=>	$_POST['jml_cuti']
				 );
			if($data['nama_unit_kerja']==""){
				$this->session->set_flashdata('notifail', 'Setting Cuti Gagal Unit kerja Harap Di Pilih, Jika Ingin Set untuk seluruh unit kerja silahkan tekan tombol Set Untuk Semua');
				redirect(base_url('dasbor_superadmin/cuti/setting_cuti'),'refresh');	
			}else{
				$this->cuti_model->update_setting_cuti($data);
				$this->session->set_flashdata('notifval', 'Setting Cuti Berhasil di Ubah');
				redirect(base_url('dasbor_superadmin/cuti/setting_cuti'),'refresh');
			}
		}else if($_POST['update_data']=="SET UNTUK SEMUA"){
			$data = array(
						'jml_kuota'			=>	$_POST['jml_kuota'],
						'batas_pengajuan'	=>	$_POST['batas_pengajuan'],
						'jml_cuti'			=>	$_POST['jml_cuti']
				 );
			$this->cuti_model->update_setting_cuti_all($data);
			$this->session->set_flashdata('notifval', 'Setting Cuti Berhasil di Ubah');
			redirect(base_url('dasbor_superadmin/cuti/setting_cuti'),'refresh');
		}else if($_POST['update_data']=="SETTING SURAT CUTI"){
			$data = array(
						'lampiran'				=>	$_POST['lampiran'],
						'nomor_surat'			=>	$_POST['nomor_surat'],
						'tanggal_surat'			=>	$_POST['tanggal_surat'],
						'pejabat_rumah_sakit'	=>	$_POST['pejabat_rumah_sakit'],
						'dari_wilayah'			=>	$_POST['dari_wilayah'],
						'wilayah'				=>	$_POST['wilayah'],
						'satuan_organisasi'		=>	$_POST['satuan_organisasi'],
						'jenis_cuti'			=>	$_POST['jenis_cuti'],
						'isi_line_1'			=>	$_POST['isi_line_1'],
						'isi_line_2'			=>	$_POST['isi_line_2'],
						'isi_line_3'			=>	$_POST['isi_line_3'],
						'isi_line_4'			=>	$_POST['isi_line_4'],
						'isi_line_5'			=>	$_POST['isi_line_5'],
						'isi_line_6'			=>	$_POST['isi_line_6'],
						'isi_line_7'			=>	$_POST['isi_line_7'],
						'isi_line_8'			=>	$_POST['isi_line_8'],
						'isi_line_9'			=>	$_POST['isi_line_9'],
						'isi_line_10'			=>	$_POST['isi_line_10'],
						'isi_line_11'			=>	$_POST['isi_line_11'],
						'isi_line_12'			=>	$_POST['isi_line_12'],
						'isi_line_13'			=>	$_POST['isi_line_13'],
						'isi_line_14'			=>	$_POST['isi_line_14']
				 );
			$this->cuti_model->update_setting_surat_cuti($data);
			$this->session->set_flashdata('notifval', 'Setting Cuti Berhasil di Ubah');
			redirect(base_url('dasbor_superadmin/cuti/setting_cuti'),'refresh');
		}else if($_POST['update_data']=="SETTING SURAT CUTI BARU"){
			$data = array(
						'isi_line_14'			=>	$_POST['nama_kasubag'],
						'isi_line_15'			=>	$_POST['nip_kasubag']
				 );

			$this->cuti_model->update_setting_surat_cuti($data);
			$this->session->set_flashdata('notifval', 'Setting Cuti Berhasil di Ubah');
			redirect(base_url('dasbor_superadmin/cuti/setting_cuti'),'refresh');
		}
	}
	
	//edit kuota cuti / unit kerja
	public function edit_kuota($id_kuota){
		$data_setting = $this->cuti_model->setting_kuota_byid($id_kuota);
		$unit_kerja = $this->pegawai_model->unit_kerja();
		$data = array(
				'title' 					=> 	'Setting Kupta / Unit Kerja',
				'alt'						=> 	'Setting',
				'icon'						=> 	'home',
				'sub'						=>	'Setting Kuota Cuti',
				'interface'					=>	'Halaman Setting Kuota Cuti',
			 	'data_setting'				=>	$data_setting,
			 	'unit_kerja'				=>	$unit_kerja,
			 	'page'						=>	'dasbor_superadmin/cuti/edit_kuota_cuti'
			 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	public function view() {
		$columns = array(
			0 => '',
			1 => 'tanggal_pengajuan',
			2 => 'gender',
			3 => 'nama',
			4 => 'awal',
			5 => 'akhir',
			6 => 'jml_hari_libur',
			7 => 'tanggal_libur',
			8 => 'nomor',
			9 => 'pengganti',
			10 => 'total_cuti',
			11 => 'lama_angka',
			12 => 'sisa_cuti',
			13 => '',
			14 => '',
		);
		
		$all = $this->db->get('data_cuti');
		if (!empty($this->security->xss_clean($_POST['search']['value']))) {
			$this->db->or_like('tanggal_pengajuan', $this->security->xss_clean($_POST['search']['value']));
			$this->db->or_like('gender', $this->security->xss_clean($_POST['search']['value']));
			$this->db->or_like('nama', $this->security->xss_clean($_POST['search']['value']));
			$this->db->or_like('awal', $this->security->xss_clean($_POST['search']['value']));
			$this->db->or_like('akhir', $this->security->xss_clean($_POST['search']['value']));
			$this->db->or_like('jml_hari_libur', $this->security->xss_clean($_POST['search']['value']));
			$this->db->or_like('tanggal_libur', $this->security->xss_clean($_POST['search']['value']));
			$this->db->or_like('nomor', $this->security->xss_clean($_POST['search']['value']));
			$this->db->or_like('pengganti', $this->security->xss_clean($_POST['search']['value']));
			$this->db->or_like('total_cuti', $this->security->xss_clean($_POST['search']['value']));
			$this->db->or_like('lama_angka', $this->security->xss_clean($_POST['search']['value']));
			$this->db->or_like('sisa_cuti', $this->security->xss_clean($_POST['search']['value']));
			
			$all = $this->db->get('data_cuti');
			
			$this->db->or_like('tanggal_pengajuan', $this->security->xss_clean($_POST['search']['value']));
			$this->db->or_like('gender', $this->security->xss_clean($_POST['search']['value']));
			$this->db->or_like('nama', $this->security->xss_clean($_POST['search']['value']));
			$this->db->or_like('awal', $this->security->xss_clean($_POST['search']['value']));
			$this->db->or_like('akhir', $this->security->xss_clean($_POST['search']['value']));
			$this->db->or_like('jml_hari_libur', $this->security->xss_clean($_POST['search']['value']));
			$this->db->or_like('tanggal_libur', $this->security->xss_clean($_POST['search']['value']));
			$this->db->or_like('nomor', $this->security->xss_clean($_POST['search']['value']));
			$this->db->or_like('pengganti', $this->security->xss_clean($_POST['search']['value']));
			$this->db->or_like('total_cuti', $this->security->xss_clean($_POST['search']['value']));
			$this->db->or_like('lama_angka', $this->security->xss_clean($_POST['search']['value']));
			$this->db->or_like('sisa_cuti', $this->security->xss_clean($_POST['search']['value']));
			
			$this->db->order_by($columns[$this->security->xss_clean($_POST['order'][0]['column'])], $this->security->xss_clean($_POST['order'][0]['dir']));
			$this->db->limit($this->security->xss_clean($_POST['length']), $this->security->xss_clean($_POST['start']));
		} else {
			$this->db->order_by($columns[$this->security->xss_clean($_POST['order'][0]['column'])], $this->security->xss_clean($_POST['order'][0]['dir']));
			$this->db->limit($this->security->xss_clean($_POST['length']), $this->security->xss_clean($_POST['start']));
		}
		$data = array();
        $notResult = $this->db->get('data_cuti');
        $totalData = $all->num_rows();
        $totalFiltered = $totalData;
		$i = 1;
		
			
		
		
		foreach ($notResult->result() as $row_cuti) {
			$nested = array();
			
			$url = base_url('dasbor_superadmin/detail_pegawai/'.$row_cuti->id_data_pegawai.'/'.$row_cuti->id_cuti);
          	$url_edit = base_url('dasbor_superadmin/cuti/listing_edit/'.$row_cuti->id_cuti);
          	$url_menunggu = base_url('dasbor_superadmin/cuti/update_status_cuti/'.$row_cuti->id_cuti.'/Menunggu');
          	$url_setujui = base_url('dasbor_superadmin/cuti/update_status_cuti/'.$row_cuti->id_cuti.'/Setujui');
          	$url_tolak = base_url('dasbor_superadmin/cuti/update_status_cuti/'.$row_cuti->id_cuti.'/Tolak');
          	$url_kirim_pesan = base_url('dasbor_superadmin/kirim_pesan/kirim_pesan_pegawai/'.$row_cuti->id_cuti);
			
			$btn = '<div class="btn-group">';

			if($row_cuti->status=="Menunggu"){
				$btn .= '<a class="btn btn-warning">'.$row_cuti->status.'</a>';
				$btn .= '<button data-toggle="dropdown" class="btn btn-warning btn-dropdown dropdown-toggle"><span class="caret"></span></button>';
			}else if($row_cuti->status=="Setujui"){
				$btn .= '<a class="btn btn-success">'.$row_cuti->status.'</a>';
				$btn .= '<button data-toggle="dropdown" class="btn btn-success btn-dropdown dropdown-toggle"><span class="caret"></span></button>';
			}else if($row_cuti->status=="Tolak"){
				$btn .= '<a class="btn btn-danger">'.$row_cuti->status.'</a>';
				$btn .= '<button data-toggle="dropdown" class="btn btn-danger btn-dropdown dropdown-toggle"><span class="caret"></span></button>';
			}

			if ($row_cuti->status == "Tolak") {
				$btn .= '<ul class="dropdown-menu">';
				$btn .= '  <li><a href="<?php echo $url_kirim_pesan ?>" >Kirim Alasan Penolakan</a></li>';
				$btn .= '</ul>';

			} else {
				$btn .= '<ul class="dropdown-menu">';
				$btn .= '  <li><a href="'.$url_menunggu.'" >Menunggu</a></li>';
				$btn .= '  <li><a href="'.$url_setujui.'" >Setujui</a></li>';
				$btn .= '  <li><a href="'.$url_tolak.'" >Tolak</a></li>';
				$btn .= '</ul>';
			}
			
			$btn .= '</div>';
			
			$btn_a = '
				<div class="btn-group">
				  <a href="'.$url.'" class="btn btn-info">Detail</a>
				  <button data-toggle="dropdown" class="btn btn-info dropdown-toggle"><span class="caret"></span></button>
				  <ul class="dropdown-menu ">
					<li><a href="'.$url_edit.'" >Edit Data</a></li>
					<li><a href="#" data-toggle="modal" data-target="#Delete'.$i.'">Hapus Data</a></li>
				  </ul>
				</div>
			';
			
			$btn_a .= '
				<div class="modal fade" id="Delete'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">Hapus Data?</h4>
						</div>
						<div class="modal-body">

							<p class="alert alert-warning">Yakin ingin menghapus data <strong>'.$row_cuti->nama.'</strong></p>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

							<a href="'.base_url('dasbor_superadmin/cuti/delete/'.$row_cuti->id_cuti).'" class="btn btn-danger">
							<i class="fa fa-trash-o"></i> Ya, Hapus data ini</a>
						</div>
					</div>
				</div>
				</div>
			';
			
			$nested[] = $i;
          	$nested[] = date("d F Y",strtotime($row_cuti->tanggal_pengajuan));
          	$nested[] = $row_cuti->gender;
          	$nested[] = $row_cuti->nama;
          	$nested[] = date("d F Y", strtotime($row_cuti->awal));
          	$nested[] = date("d F Y", strtotime($row_cuti->akhir));
          	$nested[] = $row_cuti->jml_hari_libur;
          	$nested[] = $row_cuti->tanggal_libur;
          	$nested[] = $row_cuti->nomor;
          	$nested[] = $row_cuti->pengganti;
          	$nested[] = $row_cuti->total_cuti;
          	$nested[] = $row_cuti->lama_angka;
          	$nested[] = $row_cuti->sisa_cuti;
			$nested[] = $btn;
			$nested[] = $btn_a;
			
			$i++;
			$data[] = $nested;
		}
		
		$data_json = array(
            "draw" => intval($this->security->xss_clean($_POST['draw'])),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );
        echo json_encode($data_json);
	} 
	
	public function viewLaporan_cuti() {
		$columns = array(
			0 => '',
			1 => 'nama',
			2 => 'unit_kerja',
			3 => 'tanggal_pengajuan',
			4 => 'awal',
			5 => 'lama_angka',
			6 => 'tahun',
			7 => 'status',
		);
		
		$all = $this->db->get('data_cuti');
		if (!empty($this->security->xss_clean($_POST['search']['value']))) {
			$this->db->or_like('tanggal_pengajuan', $this->security->xss_clean($_POST['search']['value']));
			
			$field = array('nama', 'unit_kerja', 'tanggal_pengajuan', 'awal', 'akhir', 'lama_angka', 'tahun', 'status');
			foreach ($field as $item) {
				$this->db->or_like($item, $this->security->xss_clean($_POST['search']['value']));
			}
			$all = $this->db->get('data_cuti');
			
			$field = array('nama', 'unit_kerja', 'tanggal_pengajuan', 'awal', 'akhir', 'lama_angka', 'tahun', 'status');
			foreach ($field as $item) {
				$this->db->or_like($item, $this->security->xss_clean($_POST['search']['value']));
			}
			
			$this->db->order_by($columns[$this->security->xss_clean($_POST['order'][0]['column'])], $this->security->xss_clean($_POST['order'][0]['dir']));
			$this->db->limit($this->security->xss_clean($_POST['length']), $this->security->xss_clean($_POST['start']));
		} else {
			
			$this->db->order_by($columns[$this->security->xss_clean($_POST['order'][0]['column'])], $this->security->xss_clean($_POST['order'][0]['dir']));
			$this->db->limit($this->security->xss_clean($_POST['length']), $this->security->xss_clean($_POST['start']));
		}
		
		$data = array();
        $notResult = $this->db->get('data_cuti');
        $totalData = $all->num_rows();
        $totalFiltered = $totalData;
		$i = 1;
		
		foreach ($notResult->result() as $row_cuti) {
			$nested = array();
			
			if ($row_cuti->status_print == "Belum"){
				$status_print = "<i class='btn btn-danger icon-remove status_print_sudah' id_cuti='".$row_cuti->id_cuti."' status_print='Sudah'></i>";
			} else {
				$status_print = "<i class='btn btn-success icon-print status_print_belum' id_cuti='".$row_cuti->id_cuti."' status_print='Belum'></i>";
			}
			
			$nested[] = $i;
			$nested[] = $row_cuti->nama;
			$nested[] = $row_cuti->unit_kerja;
			$nested[] = date("d F Y",strtotime($row_cuti->tanggal_pengajuan));
			$nested[] = date("d F Y",strtotime($row_cuti->awal))." s/d ".date("d F Y",strtotime($row_cuti->akhir));
			$nested[] = $row_cuti->lama_angka.' Hari';
			$nested[] = $row_cuti->tahun;
			$nested[] = '<a class="btn btn-default">'.$row_cuti->status.'</a>';
			$nested[] = '
				<td style="text-align: center;">
		      		'.$status_print.'
		      	</td>
			';
			$nested[] = '<a class="btn btn-danger" href="'.base_url('dasbor_superadmin/cuti/print_by_id/'.$row_cuti->id_cuti).'" target="_blank">Print Cuti</a>';
			
			$i++;
			$data[] = $nested;
		}
		
		$data_json = array(
            "draw" => intval($this->security->xss_clean($_POST['draw'])),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );
        echo json_encode($data_json);
	}
}

/* End of file Cuti.php */
/* Location: ./application/controllers/Dasbor_admin/Cuti.php */