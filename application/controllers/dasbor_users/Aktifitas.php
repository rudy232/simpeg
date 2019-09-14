<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aktifitas extends CI_Controller {

	public function index()
	{	
		$data = array(
			'title' 	=> 	'Input Aktifitas',
			'alt'		=> 	'Beranda',
			'icon'		=> 	'home',
			'sub'		=>	'Input Aktifitas',
			'interface'	=>	'Tambah Aktifitas',
		 	'page'		=>	'dasbor_users/aktifitas/input_aktifitas'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Input_aktifitas.php */
/* Location: ./application/controllers/dasbor_users/Input_aktifitas.php */