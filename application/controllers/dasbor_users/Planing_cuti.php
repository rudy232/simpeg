<?php

class Planing_cuti extends CI_Controller {
    public function index() {
    	error_reporting(0);
        $data = array(
			'title' 				=> 	'Data Pegawai',
			'alt'					=> 	'Beranda',
			'icon'					=> 	'home',
			'sub'					=>	'Planing Cuti',
			'interface'				=>	'View Plaining Cuti',
		 	'page'					=>	'dasbor_users/planing_cuti/list'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
    }
}