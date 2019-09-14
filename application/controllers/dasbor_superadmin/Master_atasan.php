<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_atasan extends CI_Controller {

	public function index()
	{
		$atasan = $this->pegawai_model->atasan();
		$data = array(
			'title' 		=> 	'Listing Atasan',
			'alt'			=> 	'Beranda',
			'icon'			=> 	'home',
			'sub'			=>	'atasan',
			'interface'		=>	'Listing Atasan',
			'atasan'		=>	$atasan,
		 	'page'			=>	'dasbor_superadmin/master_atasan/list'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);		
	}

	public function list_tambah()
	{
		$data = array(
			'title' 		=> 	'Tambah Data',
			'alt'			=> 	'Beranda',
			'icon'			=> 	'home',
			'sub'			=>	'atasan',
			'interface'		=>	'Tambah Data',
		 	'page'			=>	'dasbor_superadmin/master_atasan/list_tambah'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);		
	}

	public function tambah() 
	{
		$i=$this->input;
		$data = array(
			'nama_atasan'	=>	$i->post('nama_atasan'), 
			'nip' 			=>	$i->post('nip'),
			'nrk' 			=>	$i->post('nrk'),
			'jabatan' 		=>	$i->post('pangkat'),
			'golongan' 		=>	$i->post('golongan'),
			'jabatan' 		=>	$i->post('jabatan')
		);
		$this->master_model->tambah_master_atasan($data);
		$this->session->set_flashdata('notifval', '<strong>'.$i->post('nama_atasan').'</strong> Berhasil Di Tambahkan Sebagai Atasan ');
		redirect(base_url('dasbor_superadmin/master_atasan'),'refresh');
	}

	public function list_edit($id_master_atasan)
	{
		$master_atasan = $this->master_model->listing($id_master_atasan);
		$data = array(
			'title' 		=> 	'Edit Data',
			'alt'			=> 	'Beranda',
			'icon'			=> 	'home',
			'sub'			=>	'atasan',
			'interface'		=>	'Edit Data',
			'master_atasan'	=>	$master_atasan,
		 	'page'			=>	'dasbor_superadmin/master_atasan/list_edit'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);		
	}

	public function edit($id_master_atasan) 
	{
		$i=$this->input;
		$data = array(
			'id_atasan'		=>	$id_master_atasan,
			'nama_atasan'	=>	$i->post('nama_atasan'), 
			'nip' 			=>	$i->post('nip'),
			'nrk' 			=>	$i->post('nrk'),
			'jabatan' 		=>	$i->post('pangkat'),
			'golongan' 		=>	$i->post('golongan'),
			'jabatan' 		=>	$i->post('jabatan')
		);
		$this->master_model->edit_master_atasan($data);
		$this->session->set_flashdata('notifval', '<strong>'.$i->post('nama_atasan').'</strong> Berhasil Di Edit ');
		redirect(base_url('dasbor_superadmin/master_atasan'),'refresh');
	}

	public function hapus($id_master_atasan) 
	{
		$i=$this->input;
		$data = array('id_atasan'	=>	$id_master_atasan );
		$this->master_model->hapus_master_atasan($data);
		$this->session->set_flashdata('notifval', 'Data Master Atasan Berhasil Di Hapus ');
		redirect(base_url('dasbor_superadmin/master_atasan'),'refresh');
	}

}

/* End of file Master_hukuman.php */
/* Location: ./application/controllers/Dasbor_admin/Master_hukuman.php */