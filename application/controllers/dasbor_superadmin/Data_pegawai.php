<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data_pegawai extends CI_Controller {

	public function index()
	{
		$data_pegawai = $this->pegawai_model->listing_nonpns();
		$jabatan = "Non PNS";
		$data = array(
			'title' 	=> 	'Data Pegawai',
			'alt'		=> 	'Beranda',
			'icon'		=> 	'home',
			'sub'		=>	'Dashbor',
			'interface'	=>	'Data Pegawai '.$jabatan,
			'data_pegawai'	=>	$data_pegawai,
		 	'page'		=>	'dasbor_superadmin/list'
		 );
		$this->session->set_flashdata('jabatan', $jabatan);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function update_status()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$status 	= $this->input->post('status');
		$mas_ker_akh= $this->input->post('mas_ker_akh');
		$data = array(
			'id_data_pegawai' 	=> $id_pegawai,
			'status'			=> $status,
			'masa_kerja_akhir'  => $mas_ker_akh
		);
		
		$this->pegawai_model->update_status($data);
	}

	public function list_upload()
	{
		$data = array(
			'title' 	=> 	'Tambah Atau Upload Data Pegawai',
			'alt'		=> 	'Beranda',
			'icon'		=> 	'home',
			'sub'		=>	'Dashbor',
			'interface'	=>	'Data Pegawai ',
		 	'page'		=>	'dasbor_superadmin/list_upload'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function tambah_pegawai(){
		$list_pegawai = $this->pegawai_model->listing();
		$list_nama_atasan = $this->pegawai_model->listing_nama_atasan_all();
		$jabatan = $this->pegawai_model->jabatan();
		$golongan = $this->pegawai_model->golongan();
		$pangkat = $this->pegawai_model->golongan();
		$status_tunjangan = $this->pegawai_model->status_tunjangan();
		$unit_kerja = $this->pegawai_model->unit_kerja();
		$data = array(
			'title' 			=> 	'Tambah Data Pegawai',
			'alt'				=> 	'Beranda',
			'icon'				=> 	'home',
			'sub'				=>	'Tambah Data Pegawai',
			'interface'			=>	'Tambah Data Pegawai',
			'list_pegawai'		=>	$list_pegawai,
			'list_nama_atasan'	=>	$list_nama_atasan,
			'jabatan'			=>	$jabatan,
			'golongan'			=>	$golongan,
			'pangkat'			=>	$pangkat,
			'status_tunjangan'	=>	$status_tunjangan,
			'unit_kerja'		=>	$unit_kerja,
		 	'page'				=>	'dasbor_superadmin/tambah_pegawai/list'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function proses_tambah_pegawai($jabatan){
		if($jabatan=='Null'){
		    $direct = 'dasbor_superadmin/data_pegawai/tambah_pegawai';
		}else if($jabatan == "PNS"){
			$direct = 'dasbor_superadmin/data_pegawai/pegawai_pns';
		}else if($jabatan=="Spesialis"){
			$direct = 'dasbor_superadmin/data_pegawai/dokter_spesialis';
		}else if ($jabatan=="Dokter%20Umum"){
			$direct = 'dasbor_superadmin/data_pegawai/dokter_umum';
		}else if ($jabatan=="Non%20PNS"){
			$direct = 'dasbor_superadmin/data_pegawai';
		}else if ($jabatan=="Security"){
			$direct = 'dasbor_superadmin/data_pegawai/security';
		}else if ($jabatan=="Cleaning%20Service"){
			$direct = 'dasbor_superadmin/data_pegawai/cleaning_service';
		}

		$data = array(
			'id_atasan' 		=> 	$_POST['id_atasan'],
			'nama'				=>	$_POST['nama'],
			'nip'				=>	$_POST['nip_pegawai'],
			'nrk'				=>	$_POST['nrk_pegawai'],
			'nopeg'				=>	$_POST['nopeg'],
			'password'			=>	sha1($_POST['password']),
			'akses_level'		=>	$_POST['level_user'],
			'pangkat'			=>	$_POST['pangkat_pegawai'],
			'golongan_ruang'	=>	$_POST['golongan_pegawai'],
			'tahun_masa_kerja'	=>	$_POST['tahun_masa_kerja'],
			'bulan_masa_kerja'	=>	$_POST['bulan_masa_kerja'],
			'jabatan'			=>	$_POST['jabatan'],
			'jenis_kelamin'		=>	$_POST['gender'],
			'tempat_lhr'		=>	$_POST['tempat_lhr'],
			'tgl_lahir'			=>	date("Y-m-d",strtotime($_POST['tgl_lahir'])),
			'alamat'			=>	$_POST['alamat'],
			'pendidikan_trkh'	=>	$_POST['pendidikan_trkh'],
			'no_rekening'		=>	$_POST['no_rekening'],
			'no_ktp'			=>	$_POST['no_ktp'],
			'no_npwp'			=>	$_POST['no_npwp'],
			'no_hp'				=>	$_POST['no_hp'],
			'gaji'				=>	$_POST['gaji'],
			'tkd'				=>	$_POST['tkd'],
			'jenis_tunjangan'	=>	$_POST['status_tunjangan'],
			'unit_kerja'		=>	$_POST['unit_kerja'],
			'email'				=>	$_POST['email'],
			'tanggal_daftar'	=>	date("Y-m-d",strtotime($_POST['tanggal_daftar']))
		 	);
 
		$this->session->set_flashdata('notifval', 'Data Pegawai ' .$_POST['nama']. ' Berhasil di Tambahkan');
		$this->pegawai_model->tambah_data_pegawai($data);
		helper_log("add", $this->session->flashdata('notifval'));
		redirect(base_url($direct),'refresh');
	}

	public function pegawai_pns()
	{
		$data_pegawai = $this->pegawai_model->listing_data_pns();
		$jabatan = "PNS";
		$data = array(
			'title' 	=> 	'Data Pegawai',
			'alt'		=> 	'Beranda',
			'icon'		=> 	'home',
			'sub'		=>	'Dashbor',
			'interface'	=>	'Data Pegawai '.$jabatan,
			'data_pegawai'	=>	$data_pegawai,
		 	'page'		=>	'dasbor_superadmin/list_pns'
		 );
		$this->session->set_flashdata('jabatan', $jabatan);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function dokter_spesialis()
	{
		$data_pegawai = $this->pegawai_model->listing_data_spesialis();
		$jabatan = "Spesialis";
		$data = array(
			'title' 	=> 	'Data Pegawai',
			'alt'		=> 	'Beranda',
			'icon'		=> 	'home',
			'sub'		=>	'Dashbor',
			'interface'	=>	'Data Pegawai '.$jabatan,
			'data_pegawai'	=>	$data_pegawai,
		 	'page'		=>	'dasbor_superadmin/list_dokter_spesialis'
		 );
		$this->session->set_flashdata('jabatan', $jabatan);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function dokter_umum()
	{
		$data_pegawai = $this->pegawai_model->listing_dokter_umum();
		$jabatan = "Dokter Umum";
		$data = array(
			'title' 	=> 	'Data Pegawai',
			'alt'		=> 	'Beranda',
			'icon'		=> 	'home',
			'sub'		=>	'Dashbor',
			'interface'	=>	'Data Pegawai '.$jabatan,
			'data_pegawai'	=>	$data_pegawai,
		 	'page'		=>	'dasbor_superadmin/list_dokter_spesialis'
		 );
		$this->session->set_flashdata('jabatan', $jabatan);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function security()
	{
		$data_pegawai = $this->pegawai_model->listing_security();
		$jabatan = "Security";
		$data = array(
			'title' 	=> 	'Data Pegawai',
			'alt'		=> 	'Beranda',
			'icon'		=> 	'home',
			'sub'		=>	'Dashbor',
			'interface'	=>	'Data Pegawai '.$jabatan,
			'data_pegawai'	=>	$data_pegawai,
		 	'page'		=>	'dasbor_superadmin/list_security'
		 );
		$this->session->set_flashdata('jabatan', $jabatan);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function cleaning_service()
	{
		$data_pegawai = $this->pegawai_model->listing_cleaning_service();
		$jabatan = "Cleaning Service";
		$data = array(
			'title' 	=> 	'Data Pegawai',
			'alt'		=> 	'Beranda',
			'icon'		=> 	'home',
			'sub'		=>	'Dashbor',
			'interface'	=>	'Data Pegawai '.$jabatan,
			'data_pegawai'	=>	$data_pegawai,
		 	'page'		=>	'dasbor_superadmin/list_cleaning_service'
		 );
		$this->session->set_flashdata('jabatan', $jabatan);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function detail($id_data_pegawai)
	{
		error_reporting(0);
		$data_pegawai = $this->pegawai_model->listing_by($id_data_pegawai);
		$data_pegawai_keluarga = $this->pegawai_model->listing_keluarga($id_data_pegawai);
		$data_riwayat_jabatan = $this->pegawai_model->listing_jabatan($id_data_pegawai);
		$data_pendidikan = $this->pegawai_model->listing_pendidikan($id_data_pegawai);
		$data_pelatihan = $this->pegawai_model->listing_pelatihan($id_data_pegawai);
		$data_checlist_diklat = $this->pegawai_model->listing_checlist_diklat($id_data_pegawai);
		$data_penghargaan = $this->pegawai_model->listing_penghargaan($id_data_pegawai);
		$data_hukuman = $this->pegawai_model->listing_hukuman($id_data_pegawai);
		$data_mou = $this->pegawai_model->listing_mou($id_data_pegawai);
		$data = array(
			'title' 				=> 	'Data Pegawai',
			'alt'					=> 	'Beranda',
			'icon'					=> 	'home',
			'sub'					=>	'Data Pegawai',
			'interface'				=>	'Detail Data Pegawai',
			'data_pegawai'			=>	$data_pegawai,
			'data_pegawai_keluarga'	=>	$data_pegawai_keluarga,
			'data_riwayat_jabatan'	=>	$data_riwayat_jabatan,
			'data_pendidikan'		=>	$data_pendidikan,
			'data_pelatihan'		=>	$data_pelatihan,
			'data_checlist_diklat'	=>	$data_checlist_diklat,
			'data_penghargaan'		=>	$data_penghargaan,
			'data_hukuman'			=>	$data_hukuman,
			'data_mou'				=>	$data_mou,
		 	'page'					=>	'dasbor_superadmin/detail'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function list_edit($id_data_pegawai)
	{
		$data_pegawai = $this->pegawai_model->listing_by($id_data_pegawai);
		$status_tunjangan = $this->pegawai_model->status_tunjangan();
		$list_nama_atasan = $this->pegawai_model->listing_nama_atasan_all();
		$golongan = $this->pegawai_model->golongan();
		$pangkat = $this->pegawai_model->golongan();
		$jabatan = $this->pegawai_model->jabatan();
		$unit_kerja = $this->pegawai_model->unit_kerja();
		$data = array(
			'title' 			=> 	'Data Pegawai',
			'alt'				=> 	'Beranda',
			'icon'				=> 	'home',
			'sub'				=>	'Edit Pegawai',
			'interface'			=>	'List Edit Data Pegawai',
			'data_pegawai'		=>	$data_pegawai,
			'status_tunjangan'	=>	$status_tunjangan,
			'list_nama_atasan'	=>	$list_nama_atasan,
			'golongan'			=>	$golongan,
			'pangkat'			=>	$pangkat,
			'jabatan'			=>	$jabatan,
			'unit_kerja'		=>	$unit_kerja,
		 	'page'				=>	'dasbor_superadmin/list_edit'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function edit($id_data_pegawai,$jabatan)
	{

		if($jabatan == "PNS"){
			$direct = 'dasbor_superadmin/data_pegawai/pegawai_pns';
		}else if($jabatan=="Spesialis"){
			$direct = 'dasbor_superadmin/data_pegawai/dokter_spesialis';
		}else if ($jabatan=="Dokter%20Umum"){
			$direct = 'dasbor_superadmin/data_pegawai/dokter_umum';
		}else if ($jabatan=="Non%20PNS"){
			$direct = 'dasbor_superadmin/data_pegawai';
		}else if ($jabatan=="Security"){
			$direct = 'dasbor_superadmin/data_pegawai/security';
		}else if ($jabatan=="Cleaning%20Service"){
			$direct = 'dasbor_superadmin/data_pegawai/cleaning_service';
		}
		
		$data = array(
			'id_data_pegawai'	=>	$id_data_pegawai,
			'id_atasan' 		=> 	$_POST['id_atasan'],
			'nama'				=>	$_POST['nama'],
			'nip'				=>	$_POST['nip_pegawai'],
			'nrk'				=>	$_POST['nrk_pegawai'],
			'nopeg'				=>	$_POST['nopeg'],
			'password'			=>	sha1($_POST['password']),
			'akses_level'		=>	$_POST['level_user'],
			'pangkat'			=>	$_POST['pangkat_pegawai'],
			'golongan_ruang'	=>	$_POST['golongan_pegawai'],
			'tahun_masa_kerja'	=>	$_POST['tahun_masa_kerja'],
			'bulan_masa_kerja'	=>	$_POST['bulan_masa_kerja'],
			'jabatan'			=>	$_POST['jabatan'],
			'jenis_kelamin'		=>	$_POST['gender'],
			'tempat_lhr'		=>	$_POST['tempat_lhr'],
			'tgl_lahir'			=>	date("Y-m-d",strtotime($_POST['tgl_lahir'])),
			'alamat'			=>	$_POST['alamat'],
			'pendidikan_trkh'	=>	$_POST['pendidikan_trkh'],
			'no_rekening'		=>	$_POST['no_rekening'],
			'no_ktp'			=>	$_POST['no_ktp'],
			'no_npwp'			=>	$_POST['no_npwp'],
			'no_hp'				=>	$_POST['no_hp'],
			'gaji'				=>	$_POST['gaji'],
			'tkd'				=>	$_POST['tkd'],
			'jenis_tunjangan'	=>	$_POST['status_tunjangan'],
			'unit_kerja'		=>	$_POST['unit_kerja'],
			'email'				=>	$_POST['email'],
			'tanggal_daftar'	=>	date("Y-m-d",strtotime($_POST['tanggal_daftar']))
		 	);
		
		$data_cuti = array(
			'id_data_pegawai'	=>	$id_data_pegawai,
			'nama'				=>	$_POST['nama'],
			'nip'				=>	$_POST['nip_pegawai'],
			'nrk'				=>	$_POST['nrk_pegawai'],
			'pangkat'			=>	$_POST['pangkat_pegawai'],
			'golongan'	=>	$_POST['golongan_pegawai'],
			'jabatan'			=>	$_POST['jabatan'],
			'nomor'				=>	$_POST['no_hp'],
			'unit_kerja'		=>	$_POST['unit_kerja']
		 	);
		
		$this->cuti_model->update_cuti($data_cuti);
		$this->pegawai_model->update($data);
		$this->session->set_flashdata('notifval', 'Data <strong>'.$_POST['nama'].'</strong> Berhasil Di Edit');
		helper_log("edit", $this->session->flashdata('notifval'));
		redirect(base_url($direct),'refresh');
	}

	public function keluarga($id_data_keluarga,$id_data_pegawai)
	{	
		$data_keluarga_pegawai = $this->pegawai_model->listing_edit_keluarga($id_data_keluarga,$id_data_pegawai);
		$v=$this->form_validation;
		$v->set_rules(	'nama_anggota_keluarga', 'Nama Keluarga', 'required|max_length[50]',
						array(	'required' 	=> 'Nama Keluarga Tidak Boleh Kosong',
								'max_length'=> 'Maksimal 50 Karakter')
						);
		if($v->run()){
			$i=$this->input;
			$data = array(	'id_data_keluarga'		=>	$id_data_keluarga,
							'nama_anggota_keluarga' => 	$i->post('nama_anggota_keluarga'),
							'no_ktp_keluarga'		=>	$i->post('no_ktp'),
							'no_kk'					=>	$i->post('no_kk'),
							'tanggal_lahir'			=>	$i->post('tanggal_lahir'),
							'status_kawin'			=>	$i->post('status_kawin'),
							'uraian'				=>	$i->post('uraian'),
							'pekerjaan'				=>	$i->post('pekerjaan'));
			$this->pegawai_model->update_keluarga_pegawai($data);
			$this->session->set_flashdata('notifval', 'Data Keluarga '.$data_keluarga_pegawai->nama_anggota_keluarga.' Berhasil Di Edit');
			helper_log("edit", $this->session->flashdata('notifval'));
			redirect(base_url('dasbor_superadmin/dasbor/detail/').$id_data_pegawai,'refresh');
		}
		$data_keluarga_pegawai = $this->pegawai_model->listing_edit_keluarga($id_data_keluarga,$id_data_pegawai);
		$data = array(
			'title' 			=> 	'Data Keluarga Pegawai',
			'alt'				=> 	'Beranda',
			'icon'				=> 	'home',
			'sub'				=>	'Edit Data Keluarga Pegawai',
			'interface'			=>	'List Edit Data Keluarga Pegawai',
			'data_keluarga_pegawai'		=>	$data_keluarga_pegawai,
		 	'page'				=>	'dasbor_superadmin/data_keluarga/list_edit_keluarga'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function jabatan($id_riwayat_jabatan,$id_data_pegawai)
	{	
		$data_riwayat_jabatan = $this->pegawai_model->listing_edit_riwayat_jabatan($id_riwayat_jabatan,$id_data_pegawai);
		$v=$this->form_validation;
		$v->set_rules(	'uraian', 'Uraian', 'required',
						array(	'required' 	=> 'Uraian Tidak Boleh Kosong')
						);
		if($v->run()){
			$i=$this->input;
			$data = array(	'id_riwayat_jabatan'	=>	$id_riwayat_jabatan,
							'penempatan'			=> 	$i->post('penempatan'),
							'uraian'				=>	$i->post('uraian'),
							'nomor_sk'				=>	$i->post('nomor_sk'),
							'tanggal_sk'			=>	$i->post('tanggal_sk'),
							'tanggal_mulai'			=>	$i->post('tanggal_mulai'),
							'tanggal_selesai'		=>	$i->post('tanggal_selesai'),
							'lokasi'				=>	$i->post('lokasi'));
			$this->pegawai_model->update_riwayat_jabatan($data);
			$this->session->set_flashdata('notifval', 'Data Jabatan Berhasil Di Edit');
			helper_log("edit", $this->session->flashdata('notifval'));
			redirect(base_url('dasbor_superadmin/data_pegawai/detail/').$id_data_pegawai,'refresh');
		}
		$data_riwayat_jabatan = $this->pegawai_model->listing_edit_riwayat_jabatan($id_riwayat_jabatan,$id_data_pegawai);
		$data = array(
			'title' 				=> 	'Data Jabatan Pegawai',
			'alt'					=> 	'Beranda',
			'icon'					=> 	'home',
			'sub'					=>	'Edit Data Jabatan Pegawai',
			'interface'				=>	'List Edit Data Jabatan Pegawai',
			'data_riwayat_jabatan'	=>	$data_riwayat_jabatan,
		 	'page'					=>	'dasbor_superadmin/data_jabatan/list_edit_jabatan'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function pelatihan($id_data_pelatihan,$id_data_pegawai)
	{	
		error_reporting(0);
		$submit_data = $this->input->post("submit_form");
		if($submit_data=="EDIT"){
			$i=$this->input;
			$data = array(	'id_data_pelatihan'		=>	$id_data_pelatihan,
							'penyelenggara'			=>	$i->post('penyelenggara'),
							'biaya'					=>	$i->post('biaya'),
							'uraian'				=>	$i->post('uraian_pelatihan'),
							'lokasi'				=> 	$i->post('lokasi'),
							'tanggal_sertifikat'	=>	$i->post('tanggal_sertifikat'),
							'jam_mulai'				=>	$i->post('jam_mulai'),
							'jam_selesai'			=>	$i->post('jam_selesai'),
							'negara'				=>	$i->post('negara')
							);
			$this->pegawai_model->update_data_pelatihan($data);
			$this->session->set_flashdata('notifval', 'Data Pelatihan Berhasil Di Edit');
			helper_log("edit", $this->session->flashdata('notifval'));
			redirect(base_url('dasbor_superadmin/data_pegawai/detail/').$id_data_pegawai,'refresh');
		}else if ($submit_data=="CHECKLIST") {
			$i=$this->input;

			if($i->post('surat_tugas')=="Sudah"){
				$point =10;
			}else{
				$point =0;
			}

			if($i->post('materi_pelatihan')=="Sudah"){
				$point2 =10;
			}else{
				$point2 =0;
			}

			if($i->post('sertifikat')=="Sudah"){
				$point3 =10;
			}else{
				$point3 =0;
			}

			if($i->post('kwetansi_materai')=="Sudah"){
				$point4 =10;
			}else{
				$point4 =0;
			}

			if($i->post('daftar_hadir')=="Sudah"){
				$point5 =10;
			}else{
				$point5 =0;
			}

			$status_dok = $point+$point2+$point3+$point4+$point5;

			$data = array(
				'id_data_pelatihan'	=>	$id_data_pelatihan,
				'status_dok' 		=> $status_dok );

			$data2 = array(	'id_data_pelatihan'		=>	$id_data_pelatihan,
							'id_data_pegawai '		=>	$id_data_pegawai,
							'undangan '				=>	$i->post('undangan'),
							'disposisi '			=>	$i->post('disposisi'),
							'surat_tugas '			=> 	$i->post('surat_tugas'),
							'dokumentasi_foto'		=>	$i->post('dokumentasi_foto'),
							'materi_pelatihan'		=>	$i->post('materi_pelatihan'),
							'notulensi'				=>	$i->post('notulensi'),
							'laporan_hasil_diklat'	=>	$i->post('laporan_hasil_diklat'),
							'sertifikat'			=>	$i->post('sertifikat'),
							'kwetansi_materai'		=>	$i->post('kwetansi_materai'),
							'daftar_hadir'			=>	$i->post('daftar_hadir'),
							'surat_pernyataan'		=>	$i->post('surat_pernyataan')
							);

			$this->pegawai_model->update_data_pelatihan($data);
			$this->pegawai_model->insert_data_ckilist_diklat($data2);
			$this->session->set_flashdata('notifval', 'Data Pelatihan Berhasil Di Edit');
			helper_log("edit", $this->session->flashdata('notifval'));
			redirect(base_url('dasbor_superadmin/data_pegawai/detail/').$id_data_pegawai,'refresh');
		}else if ($submit_data=="UPDATECHECKLIST") {
			$i=$this->input;


			if($i->post('surat_tugas')=="Sudah"){
				$point =10;
			}else{
				$point =0;
			}

			if($i->post('materi_pelatihan')=="Sudah"){
				$point2 =10;
			}else{
				$point2 =0;
			}

			if($i->post('sertifikat')=="Sudah"){
				$point3 =10;
			}else{
				$point3 =0;
			}

			if($i->post('kwetansi_materai')=="Sudah"){
				$point4 =10;
			}else{
				$point4 =0;
			}

			if($i->post('daftar_hadir')=="Sudah"){
				$point5 =10;
			}else{
				$point5 =0;
			}

			$status_dok = $point+$point2+$point3+$point4+$point5;

			$data = array(
				'id_data_pelatihan'	=>	$id_data_pelatihan,
				'status_dok' 		=> $status_dok );
			
			$data2 = array(	'id_data_pelatihan'		=>	$id_data_pelatihan,
							'id_data_pegawai '		=>	$id_data_pegawai,
							'undangan '				=>	$i->post('undangan'),
							'disposisi '			=>	$i->post('disposisi'),
							'surat_tugas '			=> 	$i->post('surat_tugas'),
							'dokumentasi_foto'		=>	$i->post('dokumentasi_foto'),
							'materi_pelatihan'		=>	$i->post('materi_pelatihan'),
							'notulensi'				=>	$i->post('notulensi'),
							'laporan_hasil_diklat'	=>	$i->post('laporan_hasil_diklat'),
							'sertifikat'			=>	$i->post('sertifikat'),
							'kwetansi_materai'		=>	$i->post('kwetansi_materai'),
							'daftar_hadir'			=>	$i->post('daftar_hadir'),
							'surat_pernyataan'		=>	$i->post('surat_pernyataan')
							);

			$this->pegawai_model->update_data_pelatihan($data);
			$this->pegawai_model->update_data_ckilist_diklat($data2);
			$this->session->set_flashdata('notifval', 'Data Pelatihan Berhasil Di Edit');
			helper_log("edit", $this->session->flashdata('notifval'));
			redirect(base_url('dasbor_superadmin/data_pegawai/detail/').$id_data_pegawai,'refresh');
		}
		$data_riwayat_pelatihan = $this->pegawai_model->listing_edit_data_pelatihan($id_data_pelatihan,$id_data_pegawai);
		$data_riwayat_data_checklist_diklat = $this->pegawai_model->listing_edit_data_checklist_diklat($id_data_pelatihan,$id_data_pegawai);
		$data = array(
			'title' 							=> 	'Data Pelatihan Pegawai',
			'alt'								=> 	'Beranda',
			'icon'								=> 	'home',
			'sub'								=>	'Edit Data Pelatihan Pegawai',
			'interface'							=>	'List Edit Data Pelatihan Pegawai',
			'data_riwayat_pelatihan'			=>	$data_riwayat_pelatihan,
			'data_riwayat_data_checklist_diklat'=>	$data_riwayat_data_checklist_diklat,
		 	'page'								=>	'dasbor_superadmin/data_pelatihan/list_edit_pelatihan'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function pelatihan2($id_data_pelatihan,$id_data_pegawai)
	{	
		error_reporting(0);
		$submit_data = $this->input->post("submit_form");
		if($submit_data=="EDIT"){
			$i=$this->input;
			$data = array(	'id_data_pelatihan'		=>	$id_data_pelatihan,
							'penyelenggara'			=>	$i->post('penyelenggara'),
							'biaya'					=>	$i->post('biaya'),
							'uraian'				=>	$i->post('uraian_pelatihan'),
							'lokasi'				=> 	$i->post('lokasi'),
							'tanggal_sertifikat'	=>	$i->post('tanggal_sertifikat'),
							'jam_mulai'				=>	$i->post('jam_mulai'),
							'jam_selesai'			=>	$i->post('jam_selesai'),
							'negara'				=>	$i->post('negara')
							);
			$this->pegawai_model->update_data_pelatihan($data);
			$this->session->set_flashdata('notifval', 'Data Pelatihan Berhasil Di Edit');
			helper_log("edit", $this->session->flashdata('notifval'));
			redirect(base_url('dasbor_superadmin/laporan_diklat').$id_data_pegawai,'refresh');
		}else if ($submit_data=="CHECKLIST") {
			$i=$this->input;

			if($i->post('surat_tugas')=="Sudah"){
				$point =10;
			}else{
				$point =0;
			}

			if($i->post('materi_pelatihan')=="Sudah"){
				$point2 =10;
			}else{
				$point2 =0;
			}

			if($i->post('sertifikat')=="Sudah"){
				$point3 =10;
			}else{
				$point3 =0;
			}

			if($i->post('kwetansi_materai')=="Sudah"){
				$point4 =10;
			}else{
				$point4 =0;
			}

			if($i->post('daftar_hadir')=="Sudah"){
				$point5 =10;
			}else{
				$point5 =0;
			}

			$status_dok = $point+$point2+$point3+$point4+$point5;

			$data = array(
				'id_data_pelatihan'	=>	$id_data_pelatihan,
				'status_dok' 		=> $status_dok );

			$data2 = array(	'id_data_pelatihan'		=>	$id_data_pelatihan,
							'id_data_pegawai '		=>	$id_data_pegawai,
							'undangan '				=>	$i->post('undangan'),
							'disposisi '			=>	$i->post('disposisi'),
							'surat_tugas '			=> 	$i->post('surat_tugas'),
							'dokumentasi_foto'		=>	$i->post('dokumentasi_foto'),
							'materi_pelatihan'		=>	$i->post('materi_pelatihan'),
							'notulensi'				=>	$i->post('notulensi'),
							'laporan_hasil_diklat'	=>	$i->post('laporan_hasil_diklat'),
							'sertifikat'			=>	$i->post('sertifikat'),
							'kwetansi_materai'		=>	$i->post('kwetansi_materai'),
							'daftar_hadir'			=>	$i->post('daftar_hadir'),
							'surat_pernyataan'		=>	$i->post('surat_pernyataan')
							);

			$this->pegawai_model->update_data_pelatihan($data);
			$this->pegawai_model->insert_data_ckilist_diklat($data2);
			$this->session->set_flashdata('notifval', 'Data Pelatihan Berhasil Di Edit');
			helper_log("edit", $this->session->flashdata('notifval'));
			redirect(base_url('dasbor_superadmin/laporan_diklat'),'refresh');
		}else if ($submit_data=="UPDATECHECKLIST") {
			$i=$this->input;


			if($i->post('surat_tugas')=="Sudah"){
				$point =10;
			}else{
				$point =0;
			}

			if($i->post('materi_pelatihan')=="Sudah"){
				$point2 =10;
			}else{
				$point2 =0;
			}

			if($i->post('sertifikat')=="Sudah"){
				$point3 =10;
			}else{
				$point3 =0;
			}

			if($i->post('kwetansi_materai')=="Sudah"){
				$point4 =10;
			}else{
				$point4 =0;
			}

			if($i->post('daftar_hadir')=="Sudah"){
				$point5 =10;
			}else{
				$point5 =0;
			}

			$status_dok = $point+$point2+$point3+$point4+$point5;

			$data = array(
				'id_data_pelatihan'	=>	$id_data_pelatihan,
				'status_dok' 		=> $status_dok );
			
			$data2 = array(	'id_data_pelatihan'		=>	$id_data_pelatihan,
							'id_data_pegawai '		=>	$id_data_pegawai,
							'undangan '				=>	$i->post('undangan'),
							'disposisi '			=>	$i->post('disposisi'),
							'surat_tugas '			=> 	$i->post('surat_tugas'),
							'dokumentasi_foto'		=>	$i->post('dokumentasi_foto'),
							'materi_pelatihan'		=>	$i->post('materi_pelatihan'),
							'notulensi'				=>	$i->post('notulensi'),
							'laporan_hasil_diklat'	=>	$i->post('laporan_hasil_diklat'),
							'sertifikat'			=>	$i->post('sertifikat'),
							'kwetansi_materai'		=>	$i->post('kwetansi_materai'),
							'daftar_hadir'			=>	$i->post('daftar_hadir'),
							'surat_pernyataan'		=>	$i->post('surat_pernyataan')
							);

			$this->pegawai_model->update_data_pelatihan($data);
			$this->pegawai_model->update_data_ckilist_diklat($data2);
			$this->session->set_flashdata('notifval', 'Data Pelatihan Berhasil Di Edit');
			helper_log("edit", $this->session->flashdata('notifval'));
			redirect(base_url('dasbor_superadmin/laporan_diklat'),'refresh');
		}
		$data_riwayat_pelatihan = $this->pegawai_model->listing_edit_data_pelatihan($id_data_pelatihan,$id_data_pegawai);
		$data_riwayat_data_checklist_diklat = $this->pegawai_model->listing_edit_data_checklist_diklat($id_data_pelatihan,$id_data_pegawai);
		$data = array(
			'title' 							=> 	'Data Pelatihan Pegawai',
			'alt'								=> 	'Beranda',
			'icon'								=> 	'home',
			'sub'								=>	'Edit Data Pelatihan Pegawai',
			'interface'							=>	'List Edit Data Pelatihan Pegawai',
			'data_riwayat_pelatihan'			=>	$data_riwayat_pelatihan,
			'data_riwayat_data_checklist_diklat'=>	$data_riwayat_data_checklist_diklat,
		 	'page'								=>	'dasbor_superadmin/data_pelatihan/list_edit_pelatihan2'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}


	// Delete
	public function delete($id_data_pegawai,$jabatan,$nama){
		$nama_pegawai = str_replace('%20', ' ', $nama);
	if($jabatan == "PNS"){
			$direct = 'dasbor_superadmin/data_pegawai/pegawai_pns';
		}else if($jabatan=="Spesialis"){
			$direct = 'dasbor_superadmin/data_pegawai/dokter_spesialis';
		}else if ($jabatan=="Dokter%20Umum"){
			$direct = 'dasbor_superadmin/data_pegawai/dokter_umum';
		}else if ($jabatan=="Non%20PNS"){
			$direct = 'dasbor_superadmin/data_pegawai';
		}else if ($jabatan=="Security"){
			$direct = 'dasbor_superadmin/data_pegawai/security';
		}else if ($jabatan=="Cleaning%20Service"){
			$direct = 'dasbor_superadmin/data_pegawai/cleaning_service';
		}
		$data = array('id_data_pegawai' => $id_data_pegawai);
		$this->pegawai_model->delete($data);
		$this->session->set_flashdata('notifval', '<h4 class="alert-heading">Sukses!</h4> data pegawai '.$nama_pegawai.' berhasil di Hapus');
		helper_log("hapus", $this->session->flashdata('notifval'));
		redirect(base_url($direct),'refresh');	
	}

	public function delete_keluarga($id_data_keluarga,$id_data_pegawai){
		$data = array('id_data_keluarga' => $id_data_keluarga);
		$this->pegawai_model->delete_keluarga($data);
		$this->session->set_flashdata('notifval', '<h4 class="alert-heading">Sukses!</h4> berhasil di Hapus');
		helper_log("hapus", $this->session->flashdata('notifval'));
		redirect(base_url('dasbor_superadmin/data_pegawai/detail/'.$id_data_pegawai),'refresh');	
	}

	public function delete_jabatan($id_data_jabatan,$id_data_pegawai){
		$data = array('id_riwayat_jabatan' => $id_data_jabatan);
		$this->pegawai_model->delete_jabatan($data);
		$this->session->set_flashdata('notifval', '<h4 class="alert-heading">Sukses!</h4> berhasil di Hapus');
		helper_log("hapus", $this->session->flashdata('notifval'));
		redirect(base_url('dasbor_superadmin/data_pegawai/detail/'.$id_data_pegawai),'refresh');	
	}

	public function delete_pendidikan($id_data_pendidikan,$id_data_pegawai){
		$data = array('id_data_pendidikan' => $id_data_pendidikan);
		$this->pegawai_model->delete_pendidikan($data);
		$this->session->set_flashdata('notifval', '<h4 class="alert-heading">Sukses!</h4> berhasil di Hapus');
		helper_log("hapus", $this->session->flashdata('notifval'));
		redirect(base_url('dasbor_superadmin/data_pegawai/detail/'.$id_data_pegawai),'refresh');	
	}

	public function delete_pelatihan($id_data_pelatihan,$id_data_pegawai){
		$data = array('id_data_pelatihan' => $id_data_pelatihan);
		$this->pegawai_model->delete_pelatihan($data);
		$this->pegawai_model->delete_ckilist_diklat($data);
		$this->session->set_flashdata('notifval', '<h4 class="alert-heading">Sukses!</h4> berhasil di Hapus');
		helper_log("hapus", $this->session->flashdata('notifval'));
		redirect(base_url('dasbor_superadmin/data_pegawai/detail/'.$id_data_pegawai),'refresh');	
	}

	public function delete_penghargaan($id_data_penghargaan,$id_data_pegawai){
		$data = array('id_data_penghargaan' => $id_data_penghargaan);
		$this->pegawai_model->delete_penghargaan($data);
		$this->session->set_flashdata('notifval', '<h4 class="alert-heading">Sukses!</h4> berhasil di Hapus');
		helper_log("hapus", $this->session->flashdata('notifval'));
		redirect(base_url('dasbor_superadmin/data_pegawai/detail/'.$id_data_pegawai),'refresh');	
	}

	public function delete_hukuman($id_hukuman,$id_data_pegawai){
		$data = array('id_hukuman' => $id_hukuman);
		$this->pegawai_model->delete_hukuman($data);
		$this->session->set_flashdata('notifval', '<h4 class="alert-heading">Sukses!</h4> berhasil di Hapus');
		helper_log("hapus", $this->session->flashdata('notifval'));
		redirect(base_url('dasbor_superadmin/data_pegawai/detail/'.$id_data_pegawai),'refresh');	
	}
	
	public function delete_mou($id_mou,$id_data_pegawai){
		$data = array('id_mou' => $id_mou);
		$this->pegawai_model->delete_mou($data);
		$this->session->set_flashdata('notifval', '<h4 class="alert-heading">Sukses!</h4> berhasil di Hapus');
		helper_log("hapus", $this->session->flashdata('notifval'));
		redirect(base_url('dasbor_superadmin/data_pegawai/detail/'.$id_data_pegawai),'refresh');	
	}

	public function tambah($id_data_pegawai)
	{	
		$v=$this->form_validation;
		$submit_data = $this->input->post("submit_form");
		if($submit_data=="TAMBAH KELUARGA"){
			$i=$this->input;
			$data = array(	'id_data_pegawai'		=>	$id_data_pegawai,
							'nama_anggota_keluarga' => 	$i->post('nama_anggota_keluarga'),
							'no_ktp_keluarga'		=>	$i->post('no_ktp'),
							'no_kk'					=>	$i->post('no_kk'),
							'tanggal_lahir'			=>	$i->post('tanggal_lahir'),
							'status_kawin'			=>	$i->post('status_kawin'),
							'uraian'				=>	$i->post('uraian'),
							'pekerjaan'				=>	$i->post('pekerjaan'));
			$this->pegawai_model->tambah_keluarga_pegawai($data);
			$this->session->set_flashdata('notifval', 'Data Keluarga Berhasil Di Tambahkan');
			helper_log("add", $this->session->flashdata('notifval'));
			redirect(base_url('dasbor_superadmin/data_pegawai/detail/'.$id_data_pegawai),'refresh');
		}else if($submit_data=="TAMBAH JABATAN"){
			$i=$this->input;
			$data = array(	'id_data_pegawai'	=>	$id_data_pegawai,
							'id_master_jabatan'	=>	$i->post('id_master_jabatan'),
							'id_unit_kerja'		=>	$i->post('id_unit_kerja'),
							'status'			=> 	$i->post('status'),
							'penempatan'		=>	$i->post('penempatan'),
							'uraian'			=>	$i->post('uraian'),
							'nomor_sk'			=>	$i->post('nomor_sk'),
							'tanggal_sk'		=>	$i->post('tanggal_sk'),
							'tanggal_mulai'		=>	$i->post('tanggal_mulai'),
							'tanggal_selesai'	=>	$i->post('tanggal_selesai'),
							'lokasi'			=>	$i->post('lokasi')
							);
			$this->pegawai_model->tambah_riwayat_jabatan($data);
			$this->session->set_flashdata('notifval', 'Data Riwayat Jabatan Berhasil Di Tambahkan');
			helper_log("add", $this->session->flashdata('notifval'));
			redirect(base_url('dasbor_superadmin/data_pegawai/detail/'.$id_data_pegawai),'refresh');			
		}else if($submit_data=="TAMBAH PENDIDIKAN"){
			$i=$this->input;
			$data = array(	'id_data_pegawai'		=>	$id_data_pegawai,
							'id_master_pendidikan'	=>	$i->post('id_master_pendidikan'),
							'jurusan_pendidikan'	=>	$i->post('jurusan'),
							'teknik_non_teknik'		=>	$i->post('teknik_non_teknik'),
							'sekolah'				=>	$i->post('sekolah'),
							'tempat_sekolah'		=>	$i->post('tempat_sekolah'),
							'nomor_sttb'			=>	$i->post('nomor_sttb'),
							'tanggal_sttb'			=>	$i->post('tanggal_sttb'),
							'nomor_str'				=>	$i->post('nomor_str'),
							'tanggal_exp_str'		=>	$i->post('tanggal_exp_str'),
							'nomor_sip'				=>	$i->post('nomor_sip'),
							'tanggal_exp_sip'		=>	$i->post('tanggal_exp_sip'),
							'tanggal_lulus'			=>	$i->post('tanggal_lulus')
							);
			$this->pegawai_model->tambah_riwayat_pendidikan($data);
			$this->session->set_flashdata('notifval', 'Data Riwayat Pendidikan Berhasil Di Tambahkan');
			helper_log("add", $this->session->flashdata('notifval'));
			redirect(base_url('dasbor_superadmin/data_pegawai/detail/'.$id_data_pegawai),'refresh');			
		}else if($submit_data=="TAMBAH PELATIHAN"){
			$i=$this->input;
			$data = array(	'id_data_pegawai'		=>	$id_data_pegawai,
							'id_master_pelatihan'	=>	$i->post('id_master_pelatihan'),
							'penyelenggara'			=>	$i->post('penyelenggara'),
							'anggaran'				=>	$i->post('anggaran'),
							'biaya'					=>	$i->post('biaya'),
							'uraian'				=>	$i->post('uraian_pelatihan'),
							'lokasi'				=> 	$i->post('lokasi'),
							'tanggal_sertifikat'	=>	$i->post('tanggal_sertifikat'),
							'tanggal_sertifikat2'	=>	$i->post('tanggal_sertifikat2'),
							'jam_mulai'				=>	$i->post('jam_mulai'),
							'jam_selesai'			=>	$i->post('jam_selesai'),
							'negara'				=>	$i->post('negara')
							);

			$this->pegawai_model->tambah_riwayat_pelatihan($data);
			$this->session->set_flashdata('notifval', 'Data Riwayat Pelatihan Berhasil Di Tambahkan');
			helper_log("add", $this->session->flashdata('notifval'));
			redirect(base_url('dasbor_superadmin/data_pegawai/detail/'.$id_data_pegawai),'refresh');			
		}else if($submit_data=="TAMBAH PENGHARGAAN"){
			$i=$this->input;
			$data = array(	'id_data_pegawai'		=>	$id_data_pegawai,
							'id_master_penghargaan'	=>	$i->post('id_master_penghargaan'),
							'uraian'				=>	$i->post('uraian'),
							'nomor_sk'				=> 	$i->post('nomor_sk'),
							'tanggal_sk'			=>	$i->post('tanggal_sk_penghargaan')
							);
			$this->pegawai_model->tambah_riwayat_penghargaan($data);
			$this->session->set_flashdata('notifval', 'Data Riwayat Penghargaan Berhasil Di Tambahkan');
			helper_log("add", $this->session->flashdata('notifval'));
			redirect(base_url('dasbor_superadmin/data_pegawai/detail/'.$id_data_pegawai),'refresh');			
		}else if($submit_data=="TAMBAH HUKUMAN"){
			$i=$this->input;
			$data = array(	'id_data_pegawai'		=>	$id_data_pegawai,
							'id_master_hukuman'		=>	$i->post('id_master_hukuman'),
							'uraian'				=>	$i->post('uraian'),
							'nomor_sk'				=> 	$i->post('nomor_sk'),
							'tanggal_mulai'			=> 	$i->post('tanggal_mulai'),
							'tanggal_selesai'		=> 	$i->post('tanggal_selesai'),
							'masa_berlaku'			=> 	$i->post('masa_berlaku'),
							'tanggal_sk'			=>	$i->post('tanggal_sk_hukuman'),
							'pejabat_menetapkan'	=>	$i->post('pejabat_menetapkan')
							);
			$this->pegawai_model->tambah_riwayat_hukuman($data);
			$this->session->set_flashdata('notifval', 'Data Riwayat Hukuman Berhasil Di Tambahkan');
			helper_log("add", $this->session->flashdata('notifval'));
			redirect(base_url('dasbor_superadmin/data_pegawai/detail/'.$id_data_pegawai),'refresh');			
		}else if($submit_data=="TAMBAH DATA MOU"){
			$i=$this->input;
			$data = array(	'id_data_pegawai'		=>	$id_data_pegawai,
							'nomor_mou'				=>	$i->post('nomor_mou'),
							'tanggal_mou'			=>	date("Y-m-d",strtotime($i->post('tanggal_mou')))
							);
			$this->pegawai_model->tambah_riwayat_mou($data);
			$this->session->set_flashdata('notifval', 'Data Riwayat Hukuman Berhasil Di Tambahkan');
			helper_log("add", $this->session->flashdata('notifval'));
			redirect(base_url('dasbor_superadmin/data_pegawai/detail/'.$id_data_pegawai),'refresh');			
		}
		$riwayat_jabatan = $this->pegawai_model->jabatan();
		$unit_kerja = $this->pegawai_model->unit_kerja();
		$riwayat_pendidikan = $this->pegawai_model->pendidikan();
		$riwayat_pelatihan = $this->pegawai_model->pelatihan();
		$riwayat_penghargaan = $this->pegawai_model->penghargaan();
		$riwayat_hukuman = $this->pegawai_model->hukuman();
		$listing_nama_atasan = $this->pegawai_model->listing_nama_atasan_all();
		$data = array(
			'title' 				=> 	'Data Keluarga Pegawai',
			'alt'					=> 	'Beranda',
			'icon'					=> 	'home',
			'sub'					=>	'Tambah Data Pegawai',
			'interface'				=>	'List Tambah Data Pegawai',
		 	'page'					=>	'dasbor_superadmin/tambah_data/list',
		 	'riwayat_jabatan'		=>	$riwayat_jabatan,
		 	'riwayat_pendidikan'	=>	$riwayat_pendidikan,
		 	'riwayat_pelatihan'		=>	$riwayat_pelatihan,
		 	'riwayat_penghargaan'	=>	$riwayat_penghargaan,
		 	'riwayat_hukuman'		=>	$riwayat_hukuman,
		 	'listing_nama_atasan'	=>	$listing_nama_atasan,
		 	'unit_kerja'			=>	$unit_kerja
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file data_pegawai.php */
/* Location: ./application/controllers/dasbor_superadmin/data_pegawai.php */