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
		 	'page'			=>	'dasbor_admin/master_jabatan/list'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Dasbor_admin.php */
/* Location: ./application/controllers/Dasbor_admin.php */