<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Pdf');
	}

	public function index()
	{
		$data_cuti = $this->cuti_model_admin->listing();
		$kuota_cuti = $this->cuti_model_admin->listing_setting_cuti();
		$data_sisa_cuti = $this->cuti_model_admin->listing_sisa_cuti();
		$listing_all = $this->cuti_model_admin->listing_all();
		$data = array(
			'title' 			=> 	'Data Pegawai Cuti',
			'title_sisa_cuti'	=> 	'Data Sisa Kuota Cuti / Tanggal',
			'title_list_all'	=>	'List Data Seluruh Pegawai Yang Mengajukan Cuti Bulan '.date("m-Y"),
			'alt'				=> 	'Beranda',
			'icon'				=> 	'home',
			'sub'				=>	'Cuti',
			'interface'			=>	'Halaman Cuti',
			'data_cuti'			=>	$data_cuti,
			'kuota_cuti'		=>	$kuota_cuti,
			'data_sisa_cuti'	=>	$data_sisa_cuti,
			'listing_all'		=>	$listing_all,
		 	'page'				=>	'dasbor_admin/cuti/list'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);	
	}
	//halaman detail cuti/detail
	public function detail($id_data_pegawai,$id_cuti)
	{
		$data_cuti = $this->cuti_model_admin->listing_detail($id_cuti);
		$hitory_cuti = $this->cuti_model_admin->hitory_cuti_byid($id_data_pegawai);
		$data = array(
			'title' 	=> 	'Data Detail Cuti',
			'alt'		=> 	'Beranda',
			'icon'		=> 	'home',
			'sub'		=>	'Cuti',
			'interface'	=>	'Halaman Detail Cuti Pegawai',
			'data_cuti'	=>	$data_cuti,
			'hitory_cuti'	=>	$hitory_cuti,
		 	'page'		=>	'dasbor_admin/cuti/detail'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);	
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
		 	'page'				=>	'dasbor_admin/cuti/listing_tambah'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
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
		
		
		$this->db->like('awal', $tahun.'-'.$bulan);
		$this->db->where('unit_kerja', $i->post('unit_kerja'));
		$result = $this->db->get('data_cuti');
		$errorCode = false;
		$msg = '';
		$nama = '';
		foreach ($result->result() as $v) {
			for ($hitung = 0; $hitung < $v->lama_angka; $hitung++) {
				$h_hari = substr($v->awal, 8, 2);
				$h_bulan = substr($v->awal, 5, 2);
				$h_tahun = substr($v->awal, 0, 4);
				if ((bool) $strs[$h_tahun.'-'.$h_bulan.'-'.($h_hari + $hitung)]) {
					$errorCode = true;
					$msg .= $strs[$h_tahun.'-'.$h_bulan.'-'.($h_hari + $hitung)].', ';
					$nama = $v->nama;
				}
			}
		}
		
		$msg = rtrim($msg, ', ');
		$msg = explode(', ', $msg);
		if(!empty($msg)){
			$msgArray = $msg;
			$msg ="";
			foreach ($msgArray as $v) {
				$msg .= date("d F Y", strtotime($v)).', ';
			}
		}
		$msg = rtrim($msg, ', ');
		
		$this->db->like('awal', date('Y-m'));
		$cek_dataBulanIni = $this->db->get('data_cuti');
		if ($cek_dataBulanIni) {
			$cek_hari = false;
			$dataResult = array();
			$kuotaCuti = $this->db->query('SELECT * FROM data_kuota_cuti');
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
					if (count($dataDate) == $jmlKuota->jml_kuota && count($dataDate) >= $jmlKuota->jml_kuota) {
						$cek_hari = true;
						$dataResult[] = $dataDate;
						$message .= '<b style="color:red">'.$dataDate[0].'</b>, ';
					}
				}
				
				$message = rtrim($message, ', ');
				$message .= ' telah terpakai';
			}
		}

		
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
		
		$this->db->select('(IF(SUM(sisa_cuti > 18), 18, sisa_cuti)) AS counts');
		$this->db->where('nama', $i->post('nama'));
		$this->db->where('unit_kerja', $i->post('unit_kerja'));
		$re2 = $this->db->get('data_cuti')->result();
		$counts = $re2[0]->counts + 12;
		$max = 18;
		if ($counts > $max || $counts === $max) {
			$counts = $max;
		} else {
			$counts = $counts;
		}
		
		$cuti = $counts - $i->post('lama_angka');

		$id_data_pegawai = $i->post('id_data_pegawai');
		$data_cuti = $this->cuti_model->get_id_pegawai($id_data_pegawai);
		
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
			'tahun'				=>	date("m-Y",strtotime($i->post('awal'))),
			'real_time'			=>	date("Y-m-d")
		 );
		
		// Validasi Cuti Berdasarkan Unit kerja dan tanggal cuti yang sama
		$row = $this->db->query('SELECT * FROM data_cuti WHERE unit_kerja="'.$data['unit_kerja'].'" AND akhir BETWEEN "'.$data['akhir'].'" AND "'.date("Y-m-d",strtotime("+".($data['lama_angka']-1)." day",strtotime($data['awal']))).'" ');
		$rule_cuti = $row->row();
		// Validasi berdasarkan jumlah kuota pegawai
		$count = $this->db->query('SELECT * FROM data_cuti WHERE awal="'.$data['awal'].'" ');
		// data dinamis jumlah kuota pegawai yang berhak cuti
		$kuota_cuti = $this->db->query('SELECT * FROM data_kuota_cuti WHERE nama_unit_kerja="'.$data['unit_kerja'].'"');
		$jml_kuota = $kuota_cuti->row();
		// Validasi pengambilan cuti di izinkan jika sudah longkap 1 bulan
		$longkap = $this->db->query('SELECT * FROM data_cuti WHERE nama="'.$data['nama'].'" ');
		$longkap_data = $longkap->row();
		//mengambil data sisa cuti
		$sisa_cuti = $this->db->query('SELECT * FROM data_cuti WHERE id_data_pegawai="'.$data['id_data_pegawai'].'" ORDER BY id_cuti DESC ');
		$get_sisa_cuti = $sisa_cuti->row();
		//tidak dapat mengambil nama pengganti cuti yang sedang menggantikan cuti orang lain
		//$pengganti = $this->db->query('SELECT * FROM data_cuti WHERE id_pengganti="'.$data['id_pengganti'].'" ');
		//$rule_pengganti = $pengganti->row();
		//mengambil tanggal awal DESC
		$tanggal_awal = $this->cuti_model->tangal_awal($id_data_pegawai);
		
		//Tidak bisa cuti dalam 1 unit kerja
		if ($row->num_rows() >= $jml_kuota->jml_cuti) {
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4> Maaf anda tidak bisa cuti dalam satu unit kerja di waktu yang bersamaan. Cuti pada tanggal <strong>'.date("d F Y",strtotime(date("Y-m-d",strtotime($rule_cuti->awal)))).'</strong> s/d <strong>'.date("d F Y",strtotime(date("Y-m-d",strtotime($rule_cuti->akhir)))).'</strong> telah di gunakan oleh <strong>'.$rule_cuti->nama.'</strong>');
			redirect(base_url('dasbor_admin/cuti_pegawai'),'refresh');
		//Tidak dapat cuti melebihin kuota cuti / hari
		} else if($count->num_rows() >= $jml_kuota->jml_kuota) {
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4>Maaf anda tidak dapat mengajukan cuti, Kuota Sudah Terpenuhi, Hubungi atasan langsung anda jika alasan cuti anda penting');
			redirect(base_url('dasbor_admin/cuti_pegawai'),'refresh');
		//Tidak dapat cuti ketika sisa cuti adalah 0	
		} else if ($sisa_cuti->num_rows()>0 AND date('y')==date('y',strtotime($i->post('awal'))) AND $get_sisa_cuti->sisa_cuti==0){
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4>Maaf anda tidak dapat mengajukan cuti, Sisa Cuti anda adalah 0');
			redirect(base_url('dasbor_admin/cuti_pegawai'),'refresh');
		//tidak dapat cuti jika pengganti cuti sedang mengggantikan cuti orang lain
		} else if ($longkap->num_rows() > $jml_kuota->batas_pengajuan AND date("Y-m-d",strtotime($data['awal'])) <= date("Y-m-d",strtotime("+".$jml_kuota->batas_pengajuan." months",strtotime($tanggal_awal->awal))) ) {
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4>Maaf anda sudah mengajukan cuti di bulan '.date("F Y",strtotime($tanggal_awal->awal)).' atau sebelumnya. Silahkan ajukan kembali di bulan '.date("F Y",strtotime("+2 months",strtotime($tanggal_awal->awal))) );
			redirect(base_url('dasbor_admin/cuti_pegawai'),'refresh');	
		} else if ($errorCode) { // Cek Data dari dalam 1 unit kerja hanya boleh 1 orang saja
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4> Maaf anda tidak bisa cuti dalam satu unit kerja di waktu yang bersamaan. Cuti pada tanggal <strong>'.$msg.'</strong> telah di gunakan oleh <strong>'.$nama.'</strong>');
			redirect(base_url('dasbor_admin/cuti_pegawai'),'refresh');
		} else if ($cek_hari && count($dataResult) > 0) { // Cek dari seluruh bulan ini apakah ada hari yang sama sesuai jumlah batasan kuota cuti
			$this->session->set_flashdata('notiffail', '<h4 class="alert-heading">Gagal!</h4>Maaf anda tidak dapat mengajukan cuti, Kuota Sudah Terpenuhi, Hubungi atasan langsung anda jika alasan cuti anda penting');
			redirect(base_url('dasbor_admin/cuti_pegawai'),'refresh');
		}else{
			$this->cuti_model_admin->tambah($data);
			$this->session->set_flashdata('notifval', '<h4 class="alert-heading">Sukses!</h4>cuti anda berhasil di tambahkan'.$get_sisa_cuti->nama.' '.$get_sisa_cuti->sisa_cuti);
			redirect(base_url('dasbor_admin/cuti_pegawai'),'refresh');						
		}
	}

	//data cuti filter_search
	public function filter_data_cuti(){
		if($_POST['submit']=="GO!"){
			$data_cuti = $this->cuti_model_admin->filter_data_cuti();
			$data_sisa_cuti = $this->cuti_model_admin->listing_sisa_cuti();
			$listing_all = $this->cuti_model_admin->filter_listing_all();
			$data = array(
				'title' 			=> 	'Data Pegawai Cuti',
				'title_sisa_cuti'	=> 	'Data Sisa Kuota Cuti / Tanggal',
				'title_list_all'	=>	'List Data Seluruh Pegawai Yang Mengajukan Cuti Bulan '.$_POST['tahun'],
				'alt'				=> 	'Beranda',
				'icon'				=> 	'home',
				'sub'				=>	'Cuti',
				'interface'			=>	'Halaman Cuti',
				'data_cuti'			=>	$data_cuti,	
				'data_sisa_cuti'	=>	$data_sisa_cuti,
				'listing_all'		=>	$listing_all,
			 	'page'				=>	'dasbor_admin/cuti/list'
			 );
			$this->load->view('layout/wrapper', $data, FALSE);
		}			
	}

	//update status cuti pegawai
	public function update_status_cuti($id_cuti,$status_cuti){
		$data_cuti = $this->cuti_model_admin->listing_detail($id_cuti);
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
		$this->cuti_model_admin->update_status_cuti($data);
		$this->session->set_flashdata('notifval', 'Status Cuti Berhasil di Update');
		redirect(base_url('dasbor_admin/cuti_pegawai'),'refresh');
	}

}

/* End of file Cuti.php */
/* Location: ./application/controllers/Dasbor_admin/Cuti.php */