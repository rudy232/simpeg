<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_jabatan extends CI_Controller {

	public function index()
	{
		$jabatan = $this->pegawai_model->jabatan();
		$data = array(
			'title' 		=> 	'Listing Jabatan',
			'alt'			=> 	'Beranda',
			'icon'			=> 	'home',
			'sub'			=>	'Jabatan',
			'interface'		=>	'Listing Jabatan',
			'jabatan'		=>	$jabatan,
		 	'page'			=>	'dasbor_superadmin/master_jabatan/list'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function list_tambah()
	{
		$data = array(
			'title' 		=> 	'Tambah Data Jabatan',
			'alt'			=> 	'Beranda',
			'icon'			=> 	'home',
			'sub'			=>	'Jabatan',
			'interface'		=>	'Tambah Data Jabatan',
		 	'page'			=>	'dasbor_superadmin/master_jabatan/list_tambah'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);		
	}

	public function tambah() 
	{
		$i=$this->input;
		$data = array('nama_jabatan'	=>	$i->post('nama_jabatan'));
		$this->master_model->tambah_master_jabatan($data);
		$this->session->set_flashdata('notifval', '<strong>'.$i->post('nama_jabatan').'</strong> Berhasil Di Tambahkan ');
		redirect(base_url('dasbor_superadmin/master_jabatan'),'refresh');
	}

	public function list_edit($id_master_jabatan)
	{
		$master_jabatan = $this->master_model->listing_jabatan($id_master_jabatan);
		$data = array(
			'title' 		=> 	'Edit Data',
			'alt'			=> 	'Beranda',
			'icon'			=> 	'home',
			'sub'			=>	'atasan',
			'interface'		=>	'Edit Data',
			'master_jabatan'	=>	$master_jabatan,
		 	'page'			=>	'dasbor_superadmin/master_jabatan/list_edit'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);		
	}

	public function edit($id_master_jabatan) 
	{
		$i=$this->input;
		$data = array(
			'id_jabatan'	=>	$id_master_jabatan,
			'nama_jabatan'	=>	$i->post('nama_jabatan')
		);
		$this->master_model->edit_master_jabatan($data);
		$this->session->set_flashdata('notifval', '<strong>'.$i->post('nama_atasan').'</strong> Berhasil Di Edit ');
		redirect(base_url('dasbor_superadmin/master_jabatan'),'refresh');
	}

	public function hapus($id_master_jabatan) 
	{
		$i=$this->input;
		$data = array('id_jabatan'	=>	$id_master_jabatan );
		$this->master_model->hapus_master_jabatan($data);
		$this->session->set_flashdata('notifval', 'Data Master Jabatan Berhasil Di Hapus ');
		redirect(base_url('dasbor_superadmin/master_jabatan'),'refresh');
	}

}

/* End of file Dasbor_admin.php */
/* Location: ./application/controllers/Dasbor_admin.php */