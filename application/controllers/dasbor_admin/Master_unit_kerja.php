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
		 	'page'			=>	'dasbor_admin/master_unit_kerja/list'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);		
	}

}

/* End of file Master_unit_kerja.php */
/* Location: ./application/controllers/Dasbor_admin/Master_unit_kerja.php */