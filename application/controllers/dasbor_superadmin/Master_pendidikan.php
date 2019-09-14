<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_pendidikan extends CI_Controller {

	public function index()
	{
		$pendidikan = $this->pegawai_model->pendidikan();
		$data = array(
			'title' 		=> 	'Listing Pendidikan',
			'alt'			=> 	'Beranda',
			'icon'			=> 	'home',
			'sub'			=>	'Pendidikan',
			'interface'		=>	'Listing Pendidikan',
			'pendidikan'	=>	$pendidikan,
		 	'page'			=>	'dasbor_admin/master_pendidikan/list'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);		
	}

}

/* End of file Master_pendidikan.php */
/* Location: ./application/controllers/Dasbor_admin/Master_pendidikan.php */