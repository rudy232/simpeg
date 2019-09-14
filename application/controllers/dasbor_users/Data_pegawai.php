<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pegawai extends CI_Controller {

	public function tambah()
	{	
		$id_data_pegawai = $this->session->userdata('id_user');
		$v=$this->form_validation;
		$submit_data = $this->input->post("submit_form");
		if($submit_data=="TAMBAH KELUARGA"){
			$i=$this->input;
			$data = array(	'id_data_pegawai'		=>	$id_data_pegawai,
							'nama_anggota_keluarga' => 	$i->post('nama_anggota_keluarga'),
							'status_keluarga' 		=> 	$i->post('status_keluarga'),
							'no_ktp_keluarga'		=>	$i->post('no_ktp'),
							'no_kk'					=>	$i->post('no_kk'),
							'tanggal_lahir'			=>	$i->post('tanggal_lahir'),
							'status_kawin'			=>	$i->post('status_kawin'),
							'uraian'				=>	$i->post('uraian'),
							'pekerjaan'				=>	$i->post('pekerjaan'));
			$this->pegawai_model->tambah_keluarga_pegawai($data);
			$this->session->set_flashdata('notifval', 'Data Keluarga Berhasil Di Tambahkan');
			helper_log("add", $this->session->flashdata('notifval'));
			redirect(base_url('dasbor_users/dasbor/detail'),'refresh');
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
			redirect(base_url('dasbor_users/dasbor/detail'),'refresh');			
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
			redirect(base_url('dasbor_users/dasbor/detail'),'refresh');			
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
			redirect(base_url('dasbor_users/dasbor/detail'),'refresh');			
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
			redirect(base_url('dasbor_users/dasbor/detail'),'refresh');			
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
			redirect(base_url('dasbor_users/dasbor/detail'),'refresh');			
		}else if($submit_data=="TAMBAH DATA MOU"){
			$i=$this->input;
			$data = array(	'id_data_pegawai'		=>	$id_data_pegawai,
							'nomor_mou'				=>	$i->post('nomor_mou'),
							'tanggal_mou'			=>	date("Y-m-d",strtotime($i->post('tanggal_mou')))
							);
			$this->pegawai_model->tambah_riwayat_mou($data);
			$this->session->set_flashdata('notifval', 'Data Riwayat Hukuman Berhasil Di Tambahkan');
			helper_log("add", $this->session->flashdata('notifval'));
			redirect(base_url('dasbor_users/dasbor/detail'),'refresh');			
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
		 	'page'					=>	'dasbor_users/tambah_data/list',
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

/* End of file Data_pegawai.php */
/* Location: ./application/controllers/dasbor_users/Data_pegawai.php */