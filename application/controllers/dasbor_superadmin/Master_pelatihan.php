<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_pelatihan extends CI_Controller {

	public function index()
	{
		$pelatihan = $this->pegawai_model->pelatihan();
		$data = array(
			'title' 		=> 	'Listing pelatihan',
			'alt'			=> 	'Beranda',
			'icon'			=> 	'home',
			'sub'			=>	'pelatihan',
			'interface'		=>	'Listing pelatihan',
			'pelatihan'	=>	$pelatihan,
		 	'page'			=>	'dasbor_superadmin/master_pelatihan/list'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);		
	}

	public function list_tambah()
	{
		$data = array(
			'title' 		=> 	'Tambah Nama Pelatihan',
			'alt'			=> 	'Beranda',
			'icon'			=> 	'home',
			'sub'			=>	'unit_kerja',
			'interface'		=>	'Tambah Data unit_kerja',
		 	'page'			=>	'dasbor_superadmin/master_pelatihan/list_tambah'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);		
	}

	public function tambah() 
	{
		$i=$this->input;
		$data = array('nama_pelatihan'	=>	$i->post('nama_pelatihan'));
		$this->master_model->tambah_master_pelatihan($data);
		$this->session->set_flashdata('notifval', '<strong>'.$i->post('nama_pelatihan').'</strong> Berhasil Di Tambahkan ');
		helper_log("add", "menambahkan data pelatihan");
		redirect(base_url('dasbor_superadmin/master_pelatihan'),'refresh');
	}

	public function list_edit($id_master_pelatihan)
	{
		$master_pelatihan = $this->master_model->listing_pelatihan($id_master_pelatihan);
		$data = array(
			'title' 		=> 	'Edit Data',
			'alt'			=> 	'Beranda',
			'icon'			=> 	'home',
			'sub'			=>	'atasan',
			'interface'		=>	'Edit Data',
			'master_pelatihan'	=>	$master_pelatihan,
		 	'page'			=>	'dasbor_superadmin/master_pelatihan/list_edit'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);		
	}

	public function edit($id_master_pelatihan) 
	{
		$i=$this->input;
		$data = array(
			'id_pelatihan'		=>	$id_master_pelatihan,
			'nama_pelatihan'	=>	$i->post('nama_pelatihan')
		);
		$this->master_model->edit_master_pelatihan($data);
		$this->session->set_flashdata('notifval', '<strong>'.$i->post('nama_pelatihan').'</strong> Berhasil Di Edit ');
		helper_log("edit", $this->session->flashdata('notifval'));
		redirect(base_url('dasbor_superadmin/master_pelatihan'),'refresh');
	}

	public function hapus($id_master_pelatihan) 
	{
		$i=$this->input;
		$data = array('id_pelatihan'	=>	$id_master_pelatihan );
		$this->master_model->hapus_master_pelatihan($data);
		$this->session->set_flashdata('notifval', 'Data Master pelatihan Berhasil Di Hapus ');
		helper_log("hapus", $this->session->flashdata('notifval'));
		redirect(base_url('dasbor_superadmin/master_pelatihan'),'refresh');
	}

}

/* End of file Master_pelatihan.php */
/* Location: ./application/controllers/Dasbor_admin/Master_pelatihan.php */