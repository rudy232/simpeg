<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data_pegawai extends CI_Controller {

	public function index()
	{
		$data_pegawai = $this->pegawai_model->listing_nonpns();
		$data = array(
			'title' 	=> 	'Data Pegawai',
			'alt'		=> 	'Beranda',
			'icon'		=> 	'home',
			'sub'		=>	'Dashbor',
			'interface'	=>	'Dashbor Admin',
			'data_pegawai'	=>	$data_pegawai,
		 	'page'		=>	'dasbor_admin/list'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function proses_tambah_pegawai(){
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
		$this->pegawai_model->tambah_data_pegawai($data);
		redirect(base_url('dasbor_admin/data_pegawai'),'refresh');
	}

	public function pegawai_pns()
	{
		$data_pegawai = $this->pegawai_model->listing_data_pns();
		$data = array(
			'title' 	=> 	'Data Pegawai',
			'alt'		=> 	'Beranda',
			'icon'		=> 	'home',
			'sub'		=>	'Dashbor',
			'interface'	=>	'Dashbor Admin',
			'data_pegawai'	=>	$data_pegawai,
		 	'page'		=>	'dasbor_admin/list_pns'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function dokter_spesialis()
	{
		$data_pegawai = $this->pegawai_model->listing_data_spesialis();
		$data = array(
			'title' 	=> 	'Data Pegawai',
			'alt'		=> 	'Beranda',
			'icon'		=> 	'home',
			'sub'		=>	'Dashbor',
			'interface'	=>	'Dashbor Admin',
			'data_pegawai'	=>	$data_pegawai,
		 	'page'		=>	'dasbor_admin/list_dokter_spesialis'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function dokter_umum()
	{
		$data_pegawai = $this->pegawai_model->listing_dokter_umum();
		$data = array(
			'title' 	=> 	'Data Pegawai',
			'alt'		=> 	'Beranda',
			'icon'		=> 	'home',
			'sub'		=>	'Dashbor',
			'interface'	=>	'Dashbor Admin',
			'data_pegawai'	=>	$data_pegawai,
		 	'page'		=>	'dasbor_admin/list_dokter_spesialis'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function detail($id_data_pegawai)
	{
		$data_pegawai = $this->pegawai_model->listing_by($id_data_pegawai);
		$data_pegawai_keluarga = $this->pegawai_model->listing_keluarga($id_data_pegawai);
		$data_riwayat_jabatan = $this->pegawai_model->listing_jabatan($id_data_pegawai);
		$data_pendidikan = $this->pegawai_model->listing_pendidikan($id_data_pegawai);
		$data_pelatihan = $this->pegawai_model->listing_pelatihan($id_data_pegawai);
		$data_penghargaan = $this->pegawai_model->listing_penghargaan($id_data_pegawai);
		$data_hukuman = $this->pegawai_model->listing_hukuman($id_data_pegawai);
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
			'data_penghargaan'		=>	$data_penghargaan,
			'data_hukuman'			=>	$data_hukuman,
		 	'page'					=>	'dasbor_admin/detail'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function edit($id_data_pegawai)
	{
		$submit_data = $this->input->post("submit_form");
		$i=$this->input;
		if($submit_data=="SAVE"){
			$data = array(	'id_data_pegawai'	=>	$id_data_pegawai,
							'nip'			 	=>	$i->post('nip'),
							'nama'				=>	$i->post('nama'),
							'tempat_lhr'		=>	$i->post('tempat_lhr'),
							'tgl_lahir'			=>	$i->post('tgl_lahir'),
							'pendidikan_trkh'	=>	$i->post('pendidikan_trkh'),
							'no_ktp'			=>	$i->post('no_ktp'),
							'no_npwp'			=>	$i->post('no_npwp'),
							'no_hp'				=>	$i->post('no_hp'),
							'gaji'				=>	$i->post('gaji'),
							'tkd'				=>	$i->post('tkd'),
							'jenis_tunjangan'	=>	$i->post('status_tunjangan'),
							'no_rekening'		=>	$i->post('no_rekening'),
							'jenis_kelamin'		=>	$i->post('jenis_kelamin'),
							'tkd'				=>	$i->post('tkd'),
							'alamat'			=>	$i->post('alamat')
							);
			$this->pegawai_model->update($data);
			$this->session->set_flashdata('notifval', 'Data '.$i->post('nama').' Berhasil Di Edit');
			redirect(base_url('dasbor_admin/dasbor'),'refresh');
		}else{
		
		$data_pegawai = $this->pegawai_model->listing_by($id_data_pegawai);
		$status_tunjangan = $this->pegawai_model->status_tunjangan();
		$data = array(
			'title' 			=> 	'Data Pegawai',
			'alt'				=> 	'Beranda',
			'icon'				=> 	'home',
			'sub'				=>	'Edit Pegawai',
			'interface'			=>	'List Edit Data Pegawai',
			'data_pegawai'		=>	$data_pegawai,
			'status_tunjangan'	=>	$status_tunjangan,
		 	'page'				=>	'dasbor_admin/list_edit'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
		}
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
			redirect(base_url('dasbor_admin/dasbor/detail/').$id_data_pegawai,'refresh');
		}
		$data_keluarga_pegawai = $this->pegawai_model->listing_edit_keluarga($id_data_keluarga,$id_data_pegawai);
		$data = array(
			'title' 			=> 	'Data Keluarga Pegawai',
			'alt'				=> 	'Beranda',
			'icon'				=> 	'home',
			'sub'				=>	'Edit Data Keluarga Pegawai',
			'interface'			=>	'List Edit Data Keluarga Pegawai',
			'data_keluarga_pegawai'		=>	$data_keluarga_pegawai,
		 	'page'				=>	'dasbor_admin/data_keluarga/list_edit_keluarga'
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
			redirect(base_url('dasbor_admin/dasbor/detail/').$id_data_pegawai,'refresh');
		}
		$data_riwayat_jabatan = $this->pegawai_model->listing_edit_riwayat_jabatan($id_riwayat_jabatan,$id_data_pegawai);
		$data = array(
			'title' 				=> 	'Data Jabatan Pegawai',
			'alt'					=> 	'Beranda',
			'icon'					=> 	'home',
			'sub'					=>	'Edit Data Jabatan Pegawai',
			'interface'				=>	'List Edit Data Jabatan Pegawai',
			'data_riwayat_jabatan'	=>	$data_riwayat_jabatan,
		 	'page'					=>	'dasbor_admin/data_jabatan/list_edit_jabatan'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}


	// Delete
	public function delete($id_data_pegawai){
		$data = array('id_data_pegawai' => $id_data_pegawai);
		$this->pegawai_model->delete($data);
		$this->session->set_flashdata('notifval', '<h4 class="alert-heading">Sukses!</h4> berhasil di Hapus');
		redirect(base_url('dasbor_admin/data_pegawai'),'refresh');	
	}

	public function delete_keluarga($id_data_keluarga,$id_data_pegawai){
		$data = array('id_data_keluarga' => $id_data_keluarga);
		$this->pegawai_model->delete_keluarga($data);
		$this->session->set_flashdata('notifval', '<h4 class="alert-heading">Sukses!</h4> berhasil di Hapus');
		redirect(base_url('dasbor_admin/data_pegawai/detail/'.$id_data_pegawai),'refresh');	
	}

	public function delete_jabatan($id_data_jabatan,$id_data_pegawai){
		$data = array('id_riwayat_jabatan' => $id_data_jabatan);
		$this->pegawai_model->delete_jabatan($data);
		$this->session->set_flashdata('notifval', '<h4 class="alert-heading">Sukses!</h4> berhasil di Hapus');
		redirect(base_url('dasbor_admin/data_pegawai/detail/'.$id_data_pegawai),'refresh');	
	}

	public function delete_pendidikan($id_data_pendidikan,$id_data_pegawai){
		$data = array('id_data_pendidikan' => $id_data_pendidikan);
		$this->pegawai_model->delete_pendidikan($data);
		$this->session->set_flashdata('notifval', '<h4 class="alert-heading">Sukses!</h4> berhasil di Hapus');
		redirect(base_url('dasbor_admin/data_pegawai/detail/'.$id_data_pegawai),'refresh');	
	}

	public function delete_pelatihan($id_data_pelatihan,$id_data_pegawai){
		$data = array('id_data_pelatihan' => $id_data_pelatihan);
		$this->pegawai_model->delete_pelatihan($data);
		$this->session->set_flashdata('notifval', '<h4 class="alert-heading">Sukses!</h4> berhasil di Hapus');
		redirect(base_url('dasbor_admin/data_pegawai/detail/'.$id_data_pegawai),'refresh');	
	}

	public function delete_penghargaan($id_data_penghargaan,$id_data_pegawai){
		$data = array('id_data_penghargaan' => $id_data_penghargaan);
		$this->pegawai_model->delete_penghargaan($data);
		$this->session->set_flashdata('notifval', '<h4 class="alert-heading">Sukses!</h4> berhasil di Hapus');
		redirect(base_url('dasbor_admin/data_pegawai/detail/'.$id_data_pegawai),'refresh');	
	}

	public function delete_hukuman($id_hukuman,$id_data_pegawai){
		$data = array('id_hukuman' => $id_hukuman);
		$this->pegawai_model->delete_hukuman($data);
		$this->session->set_flashdata('notifval', '<h4 class="alert-heading">Sukses!</h4> berhasil di Hapus');
		redirect(base_url('dasbor_admin/data_pegawai/detail/'.$id_data_pegawai),'refresh');	
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
			redirect(base_url('dasbor_admin/dasbor/detail/'.$id_data_pegawai),'refresh');
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
			redirect(base_url('dasbor_admin/dasbor/detail/'.$id_data_pegawai),'refresh');			
		}else if($submit_data=="TAMBAH PENDIDIKAN"){
			$i=$this->input;
			$data = array(	'id_data_pegawai'		=>	$id_data_pegawai,
							'id_master_pendidikan'	=>	$i->post('id_master_pendidikan'),
							'jurusan_pendidikan'	=>	$i->post('jurusan'),
							'uraian'				=> 	$i->post('uraian'),
							'teknik_non_teknik'		=>	$i->post('teknik_non_teknik'),
							'sekolah'				=>	$i->post('sekolah'),
							'tempat_sekolah'		=>	$i->post('tempat_sekolah'),
							'nomor_sttb'			=>	$i->post('nomor_sttb'),
							'tanggal_sttb'			=>	$i->post('tanggal_sttb'),
							'tanggal_lulus'			=>	$i->post('tanggal_lulus')
							);
			$this->pegawai_model->tambah_riwayat_pendidikan($data);
			$this->session->set_flashdata('notifval', 'Data Riwayat Pendidikan Berhasil Di Tambahkan');
			redirect(base_url('dasbor_admin/dasbor/detail/'.$id_data_pegawai),'refresh');			
		}else if($submit_data=="TAMBAH PELATIHAN"){
			$i=$this->input;
			$data = array(	'id_data_pegawai'		=>	$id_data_pegawai,
							'id_master_pelatihan'	=>	$i->post('id_master_pelatihan'),
							'uraian'				=>	$i->post('uraian'),
							'lokasi'				=> 	$i->post('lokasi'),
							'tanggal_sertifikat'	=>	$i->post('tanggal_sertifikat'),
							'jam_pelatihan'			=>	$i->post('jam_pelatihan'),
							'negara'				=>	$i->post('negara')
							);
			$this->pegawai_model->tambah_riwayat_pelatihan($data);
			$this->session->set_flashdata('notifval', 'Data Riwayat Pelatihan Berhasil Di Tambahkan');
			redirect(base_url('dasbor_admin/dasbor/detail/'.$id_data_pegawai),'refresh');			
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
			redirect(base_url('dasbor_admin/dasbor/detail/'.$id_data_pegawai),'refresh');			
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
			redirect(base_url('dasbor_admin/dasbor/detail/'.$id_data_pegawai),'refresh');			
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
		 	'page'					=>	'dasbor_admin/tambah_data/list',
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
/* Location: ./application/controllers/Dasbor_admin/data_pegawai.php */