<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	public function index()
	{
		$query = $this->db->query('SELECT * FROM data_pegawai WHERE id_data_pegawai="'.$this->session->userdata('id_user').'"');
		$row = $query->row();
		if($row->jenis_kelamin=="L"){
			$panggilan = "Bpk";
		}else{
			$panggilan = "Ibu";
		}
		$data = array(
			'title' 	=> 	'Data Pegawai',
			'alt'		=> 	'Beranda',
			'icon'		=> 	'home',
			'sub'		=>	'Selamat datang '.$panggilan.".".$this->session->userdata('nama'),
			'interface'	=>	'Dashbor Admin',
		 	'page'		=>	'dasbor_superadmin/dasbor'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}

/* End of file dasbor_superadmin.php */
/* Location: ./application/controllers/dasbor_superadmin.php */