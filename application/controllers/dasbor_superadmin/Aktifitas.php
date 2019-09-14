<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aktifitas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('aktifitas_model');
	}

	// Menampilka daftar kegitan looping pada uraian tugas
	public function daftar_uraiantugas()
	{
		$data_kegiatan = $this->aktifitas_model->listing_admin();
		$daftar_kegiatan = $this->aktifitas_model->listing_admin();
		$data = array(	'alt'				=> 	'Beranda',
						'icon'				=> 	'home',
						'sub'				=>	'Daftar Aktifitas Umum',
						'title'				=>	'Daftar Aktifitas Umum',
						'interface'			=>	'Halaman Daftar Aktifitas Umum',
						'data_kegiatan'		=>	$data_kegiatan,
						'daftar_kegiatan'	=>	$daftar_kegiatan,
						'page'				=>	'dasbor_superadmin/aktifitas/daftar_kegiatan' );
		$this->load->view('layout/wrapper', $data, FALSE);	
	}

	// Tambah data kegiatan aktifitas
	public function tambah_aktifitas()
	{
		$v = $this->form_validation;
		$v->set_rules('nama_aktifitas', 'Nama Aktifitas', 'trim|required',
						array(	'required'	=>	'Nama Kegiatan Harus Di Isi',
								'trim'		=>	'Spasi Telah Di Hapus'));

		$v->set_rules('waktu_efektif', 'Waktu Efektif', 'trim|required|numeric',
						array(	'required'	=>	'Field Waktu Efektif Wajib Di Isi',
								'numeric'	=>	'Format Data <strong> Waktu Efektif </strong> Harus Berupa Nomor',
								'trim'		=>	'Spasi Telah Di Hapus'));


		$v->set_rules('jabatan', 'Nama Jabatan', 'trim|required',
						array(	'required'	=>	'Nama Jabatan Harus Di Isi',
								'trim'		=>	'Spasi Telah Di Hapus'));


		if($v->run()==FALSE){
			$jabatan = $this->aktifitas_model->listing_jabatan();
			$data = array(	
							'alt'				=> 	'Beranda',
							'icon'				=> 	'home',
							'sub'				=>	'Tambah Aktifitas Umum',
							'title'				=>	'Tambah Aktifitas Umum',
							'interface'			=>	'Halaman Daftar Aktifitas Umum',
							'notif'				=>	'Tambah Aktifitas Aktifitas Umum',
							'jabatan'			=>	$jabatan,
							'page'				=>	'dasbor_superadmin/aktifitas/tambah_aktifitas' );
			$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			$i=$this->input;
			$data = array(	'nama_jabatan' 		 =>	$i->post('jabatan'),
							'nama_aktifitas'	 =>	$i->post('nama_aktifitas'),
							'satuan_hasil'		 =>	$i->post('satuan_kegiatan'),
							'waktu_efektif'		 =>	$i->post('waktu_efektif'),
							'waktu_efektif_kerja'=>	$i->post('satuan_waktu_efektif'),
							'deskripsi_aktifitas'=>	nl2br(strip_tags($i->post('deskripsi')))
							);

			$tambah_aktifitas = $this->aktifitas_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Berhasil Di Tambahkan');
			redirect(base_url('dasbor_superadmin/aktifitas/tambah_aktifitas'),'refresh');
		}
	}

	// Tambah data kegiatan aktifitas
	public function edit_aktifitas($id)
	{
		$v = $this->form_validation;
		$v->set_rules('nama_aktifitas', 'Nama Aktifitas', 'trim|required',
						array(	'required'	=>	'Nama Kegiatan Harus Di Isi',
								'trim'		=>	'Spasi Telah Di Hapus'));

		$v->set_rules('waktu_efektif', 'Waktu Efektif', 'trim|required|numeric',
						array(	'required'	=>	'Field Waktu Efektif Wajib Di Isi',
								'numeric'	=>	'Format Data <strong> Waktu Efektif </strong> Harus Berupa Nomor',
								'trim'		=>	'Spasi Telah Di Hapus'));


		$v->set_rules('jabatan', 'Nama Jabatan', 'trim|required',
						array(	'required'	=>	'Nama Jabatan Harus Di Isi',
								'trim'		=>	'Spasi Telah Di Hapus'));


		if($v->run()==FALSE){
			$aktifitas_row = $this->aktifitas_model->listing_aktifitas_row($id);
			$jabatan = $this->aktifitas_model->listing_jabatan();
			$data = array(	
							'alt'				=> 	'Beranda',
							'icon'				=> 	'home',
							'sub'				=>	'Tambah Aktifitas Umum',
							'title'				=>	'Tambah Aktifitas Umum',
							'interface'			=>	'Halaman Daftar Aktifitas Umum',
							'notif'				=>	'Tambah Aktifitas Aktifitas Umum',
							'aktifitas_row'		=>	$aktifitas_row,
							'jabatan'			=>	$jabatan,
							'page'				=>	'dasbor_superadmin/aktifitas/edit_aktifitas' );
			$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			$i=$this->input;
			$data = array(	'id'				 => $id,	
							'nama_jabatan' 		 =>	$i->post('jabatan'),
							'nama_aktifitas'	 =>	$i->post('nama_aktifitas'),
							'satuan_hasil'		 =>	$i->post('satuan_kegiatan'),
							'waktu_efektif'		 =>	$i->post('waktu_efektif'),
							'waktu_efektif_kerja'=>	$i->post('satuan_waktu_efektif'),
							'deskripsi_aktifitas'=>	nl2br(strip_tags($i->post('deskripsi')))
							);

			$tambah_aktifitas = $this->aktifitas_model->edit_aktifitas($data);
			$this->session->set_flashdata('sukses', 'Data Berhasil Di Tambahkan');
			redirect(base_url('dasbor_superadmin/aktifitas/edit_aktifitas/'.$id),'refresh');
		}
	}

	// Delete aktifitas umum
	public function delete_aktifitasumum($id){
		$data = array('id' => $id);
		$this->aktifitas_model->delete_aktifitasumum($data);
		$this->session->set_flashdata('sukses', '<h4 class="alert-heading">Sukses!</h4>Data berhasil di Hapus');
		redirect(base_url('dasbor_superadmin/aktifitas/daftar_kegiatan'),'refresh');	
	}
	
}

/* End of file Aktifitas.php */
/* Location: ./application/controllers/dasbor_superadmin/Aktifitas.php */