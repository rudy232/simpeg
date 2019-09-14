<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_penghargaan extends CI_Controller {

	public function index()
	{
		$penghargaan = $this->pegawai_model->penghargaan();
		$data = array(
			'title' 		=> 	'Listing Penghargaan',
			'alt'			=> 	'Beranda',
			'icon'			=> 	'home',
			'sub'			=>	'Penghargaan',
			'interface'		=>	'Listing Penghargaan',
			'penghargaan'	=>	$penghargaan,
		 	'page'			=>	'dasbor_admin/master_penghargaan/list'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);			
	}

}

/* End of file Master_penghargaan.php */
/* Location: ./application/controllers/Dasbor_admin/Master_penghargaan.php */