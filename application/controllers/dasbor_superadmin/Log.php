<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

	public function index()
	{
		$data_log = $this->m_log->data_log();
		$data_nama_user = $this->m_log->data_nama_user();
		$data = array(
			'title' 				=> 	'Log Aktifitas',
			'alt'					=> 	'Beranda',
			'icon'					=> 	'home',
			'sub'					=>	'Dashbor',
			'interface'				=>	'Data Log Aktifitas',
			'data_log'				=>	$data_log,
			'data_nama_user'		=>	$data_nama_user,
		 	'page'					=>	'dasbor_superadmin/log'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//laporan cuti filter_search
	public function filter_search(){
		$log_user 		= $_POST['log_user'];
		$log_tanggal 	= $_POST['log_tanggal'];
		if($_POST['submit']=="Export ke Excel"){
			$data['data_log'] = $this->m_log->filter_search();		
			$this->load->view('dasbor_superadmin/log/eksport_excel',$data);
		}else if($_POST['submit']=="GO!"){
			$data_log = $this->m_log->filter_search();
			$data_nama_user = $this->m_log->data_nama_user();
			$data = array(
				'title' 				=> 	'Data Log Aktifitas',
				'alt'					=> 	'Log',
				'icon'					=> 	'home',
				'sub'					=>	'Laporan Log',
				'interface'				=>	'Halaman Laporan Log Aktifitas',
				'data_log'				=>	$data_log,
				'data_nama_user'		=>	$data_nama_user,
			 	'page'					=>	'dasbor_superadmin/log'
			 );
			$this->session->set_flashdata('log_user', $log_user);
			$this->session->set_flashdata('log_tanggal', $log_tanggal);
			$this->load->view('layout/wrapper', $data, FALSE);
		}			
	}

}

/* End of file Log.php */
/* Location: ./application/controllers/dasbor_superadmin/Log.php */