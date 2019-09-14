<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {


	public function detail()
	{
		$id_data_pegawai= $this->session->userdata('id_user');
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
		 	'page'					=>	'dasbor_users/detail'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function edit()
	{
		$id_data_pegawai= $this->session->userdata('id_user');
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
			helper_log("edit", $this->session->flashdata('notifval'));
			redirect(base_url('dasbor_users/dasbor'),'refresh');
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
		 	'page'				=>	'dasbor_users/list_edit'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
		}
	}

	public function keluarga($id_data_keluarga)
	{	
		$data_keluarga_pegawai = $this->pegawai_model->listing_edit_keluarga($id_data_keluarga);
		$v=$this->form_validation;
		$v->set_rules(	'nama_anggota_keluarga', 'Nama Keluarga', 'required|max_length[50]',
						array(	'required' 	=> 'Nama Keluarga Tidak Boleh Kosong',
								'max_length'=> 'Maksimal 50 Karakter')
						);
		if($v->run()){
			$i=$this->input;
			$data = array(	'id_data_keluarga'		=>	$id_data_keluarga,
							'nama_anggota_keluarga' => 	$i->post('nama_anggota_keluarga'),
							'no_ktp'				=>	$i->post('no_ktp'),
							'no_kk'					=>	$i->post('no_kk'),
							'tanggal_lahir'			=>	$i->post('tanggal_lahir'),
							'status_kawin'			=>	$i->post('status_kawin'),
							'uraian'				=>	$i->post('uraian'),
							'pekerjaan'				=>	$i->post('pekerjaan'));
			$this->pegawai_model->update_keluarga_pegawai($data);
			$this->session->set_flashdata('notifval', 'Data Keluarga '.$data_keluarga_pegawai->nama.' Berhasil Di Edit');
			helper_log("edit", $this->session->flashdata('notifval'));
			redirect(base_url('dasbor_users/dasbor/detail'),'refresh');
		}
		$data_keluarga_pegawai = $this->pegawai_model->listing_edit_keluarga($id_data_keluarga);
		$data = array(
			'title' 			=> 	'Data Keluarga Pegawai',
			'alt'				=> 	'Beranda',
			'icon'				=> 	'home',
			'sub'				=>	'Edit Data Pegawai',
			'interface'			=>	'List Edit Data Keluarga Pegawai',
			'data_keluarga_pegawai'		=>	$data_keluarga_pegawai,
		 	'page'				=>	'dasbor_users/data_keluarga/list_edit_keluarga'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file dasbor_users.php */
/* Location: ./application/controllers/dasbor_users.php */