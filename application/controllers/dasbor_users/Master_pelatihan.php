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
		 	'page'			=>	'dasbor_admin/master_pelatihan/list'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);		
	}

}

/* End of file Master_pelatihan.php */
/* Location: ./application/controllers/Dasbor_admin/Master_pelatihan.php */