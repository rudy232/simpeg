<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_hukuman extends CI_Controller {

	public function index()
	{
		$hukuman = $this->pegawai_model->hukuman();
		$data = array(
			'title' 		=> 	'Listing hukuman',
			'alt'			=> 	'Beranda',
			'icon'			=> 	'home',
			'sub'			=>	'hukuman',
			'interface'		=>	'Listing hukuman',
			'hukuman'	=>	$hukuman,
		 	'page'			=>	'dasbor_admin/master_hukuman/list'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);		
	}

}

/* End of file Master_hukuman.php */
/* Location: ./application/controllers/Dasbor_admin/Master_hukuman.php */