<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_unit_kerja extends CI_Controller {

	public function index()
	{
		$unit_kerja = $this->pegawai_model->unit_kerja();
		$data = array(
			'title' 		=> 	'Listing Unit Kerja',
			'alt'			=> 	'Beranda',
			'icon'			=> 	'home',
			'sub'			=>	'Unit Kerja',
			'interface'		=>	'Listing Unit Kerja',
			'unit_kerja'	=>	$unit_kerja,
		 	'page'			=>	'dasbor_superadmin/master_unit_kerja/list'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);		
	}

	public function list_tambah()
	{
		$data = array(
			'title' 		=> 	'Tambah Data unit_kerja',
			'alt'			=> 	'Beranda',
			'icon'			=> 	'home',
			'sub'			=>	'unit_kerja',
			'interface'		=>	'Tambah Data unit_kerja',
		 	'page'			=>	'dasbor_superadmin/master_unit_kerja/list_tambah'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);		
	}

	public function tambah() 
	{
		$i=$this->input;
		$data = array('nama_unit_kerja'	=>	$i->post('nama_unit_kerja'));
		$this->master_model->tambah_master_unit_kerja($data);
		$this->session->set_flashdata('notifval', '<strong>'.$i->post('nama_unit_kerja').'</strong> Berhasil Di Tambahkan ');
		redirect(base_url('dasbor_superadmin/master_unit_kerja'),'refresh');
	}

	public function list_edit($id_master_unit_kerja)
	{
		$master_unit_kerja = $this->master_model->listing_unit_kerja($id_master_unit_kerja);
		$data = array(
			'title' 		=> 	'Edit Data',
			'alt'			=> 	'Beranda',
			'icon'			=> 	'home',
			'sub'			=>	'atasan',
			'interface'		=>	'Edit Data',
			'master_unit_kerja'	=>	$master_unit_kerja,
		 	'page'			=>	'dasbor_superadmin/master_unit_kerja/list_edit'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);		
	}

	public function edit($id_master_unit_kerja) 
	{
		$i=$this->input;
		$data = array(
			'id_unit_kerja'	=>	$id_master_unit_kerja,
			'nama_unit_kerja'	=>	$i->post('nama_unit_kerja')
		);
		$this->master_model->edit_master_unit_kerja($data);
		$this->session->set_flashdata('notifval', '<strong>'.$i->post('nama_atasan').'</strong> Berhasil Di Edit ');
		redirect(base_url('dasbor_superadmin/master_unit_kerja'),'refresh');
	}

	public function hapus($id_master_unit_kerja) 
	{
		$i=$this->input;
		$data = array('id_unit_kerja'	=>	$id_master_unit_kerja );
		$this->master_model->hapus_master_unit_kerja($data);
		$this->session->set_flashdata('notifval', 'Data Master unit_kerja Berhasil Di Hapus ');
		redirect(base_url('dasbor_superadmin/master_unit_kerja'),'refresh');
	}

}

/* End of file Master_unit_kerja.php */
/* Location: ./application/controllers/Dasbor_admin/Master_unit_kerja.php */