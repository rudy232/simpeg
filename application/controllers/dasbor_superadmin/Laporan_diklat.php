<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_diklat extends CI_Controller {
	public $inner;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Pdf');
	}

	public function index()
	{
		$data_diklat = $this->diklat_model->laporan_diklat();
		$data_pelatihan = $this->diklat_model->data_pelatihan();
		$data_nama_pelatihan = $this->diklat_model->data_nama_pelatihan();
		$data = array(
			'title' 				=> 	'Laporan Diklat',
			'alt'					=> 	'Beranda',
			'icon'					=> 	'home',
			'sub'					=>	'Dashbor',
			'interface'				=>	'Data Laporan Diklat',
			'data_diklat'			=>	$data_diklat,
			'data_pelatihan'		=>	$data_pelatihan,
			'data_nama_pelatihan'	=>	$data_nama_pelatihan,
		 	'page'					=>	'dasbor_superadmin/diklat/laporan_diklat'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//laporan cuti filter_search
	public function filter_search(){
		$tanggal_awal = $_POST['tanggal_awal'];
		$tanggal_akhir = $_POST['tanggal_akhir'];
		$penyelenggara = $_POST['penyelenggara'];
		$nama_pelatihan = $_POST['nama_pelatihan'];
		$anggaran = $_POST['anggaran'];
		if($_POST['submit']=="Export ke Excel"){
			$data['data_diklat'] = $this->diklat_model->filter_search();		
			$this->load->view('dasbor_superadmin/diklat/eksport_excel',$data);
		}else if($_POST['submit']=="GO!"){
			$data_diklat = $this->diklat_model->filter_search();
			$data_pelatihan = $this->diklat_model->data_pelatihan();
			$data_nama_pelatihan = $this->diklat_model->data_nama_pelatihan();
			$data = array(
				'title' 				=> 	'Data Laporan Cuti',
				'alt'					=> 	'Laporan',
				'icon'					=> 	'home',
				'sub'					=>	'Laporan Cuti',
				'interface'				=>	'Halaman Laporan Pegawai',
				'data_diklat'			=>	$data_diklat,
				'data_pelatihan'		=>	$data_pelatihan,
				'data_nama_pelatihan'	=>	$data_nama_pelatihan,
			 	'page'					=>	'dasbor_superadmin/diklat/laporan_diklat'
			 );
			$this->session->set_flashdata('tanggal_awal', $tanggal_awal);
			$this->session->set_flashdata('tanggal_akhir', $tanggal_akhir);
			$this->session->set_flashdata('penyelenggara', $penyelenggara);
			$this->session->set_flashdata('anggaran', $anggaran);
			$this->load->view('layout/wrapper', $data, FALSE);
		}			
	}

	public function dokumen_diklat($id_data_pegawai,$id_data_diklat)
	{
		error_reporting(0);
		$data_diklat = $this->diklat_model->dokumen_diklat($id_data_pegawai,$id_data_diklat);
		$data = array(
			'title' 				=> 	'Laporan Diklat',
			'alt'					=> 	'Beranda',
			'icon'					=> 	'home',
			'sub'					=>	'Dashbor',
			'interface'				=>	'Data Laporan Diklat',
			'data_diklat'			=>	$data_diklat,
		 	'page'					=>	'dasbor_superadmin/diklat/dokumen_diklat'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function pdf_file($id_data_pegawai,$id_data_diklat)
	{
		$data_diklat = $this->diklat_model->print_dokumen_diklat($id_data_pegawai,$id_data_diklat);
		$data = array('data_diklat' => $data_diklat );
		$this->load->view('dasbor_superadmin/diklat/spj_tampil_pdf',$data);
	}

}

/* End of file Laporan_diklat.php */
/* Location: ./application/controllers/dasbor_superadmin/Laporan_diklat.php */