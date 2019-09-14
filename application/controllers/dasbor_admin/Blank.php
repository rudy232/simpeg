<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blank extends CI_Controller {

	public function index()
	{
		$data = array(
			'title' 	=> 	'Data Pegawai',
			'alt'		=> 	'Beranda',
			'icon'		=> 	'home',
			'sub'		=>	'Halaman Tidak DItemukan',
			'interface'	=>	'Tidak Terdapat Halaman',
		 	'page'		=>	'dasbor_admin/blank'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);	
	}

}

/* End of file Blank.php */
/* Location: ./application/controllers/Dasbor_admin/Blank.php */