<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perencanaan_diklat extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$usulan_diklat 			= $this->diklat_model->usulan_diklat();
		$nama_diklat 			= $this->diklat_model->ditinct_diklat();
		$usulan_penyelenggara	= $this->diklat_model->usulan_penyelenggara();
		$usulan_pelatihan		= $this->diklat_model->usulan_pelatihan();
		$nama_atasan			= $this->master_model->master_atasan();
		$data = array(
			'title' 				=> 	'Perencanaan Diklat (Data hasil permintaan user)',
			'alt'					=> 	'Beranda',
			'icon'					=> 	'home',
			'sub'					=>	'Dashbor',
			'interface'				=>	'Data Perencanaan Diklat',
			'nama_diklat'			=>	$nama_diklat,
			'usulan_diklat'			=>	$usulan_diklat,
			'usulan_penyelenggara'	=>	$usulan_penyelenggara,
			'usulan_pelatihan'		=>	$usulan_pelatihan,
			'nama_atasan'			=>	$nama_atasan,
		 	'page'					=>	'dasbor_superadmin/diklat/perencanaan_diklat'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}	

	//laporan cuti filter_search
	public function filter_search(){
		
		$tanggal_awal 	= $_POST['tanggal_awal'];
		$tanggal_akhir 	= $_POST['tanggal_akhir'];
		$penyelenggara 	= $_POST['penyelenggara'];
		$nama_pelatihan = $_POST['nama_pelatihan'];
		$nama_atasan 	= $_POST['nama_atasan'];

		if($_POST['submit']=="Export ke Excel"){
			$data['usulan_diklat'] 	= $this->diklat_model->filter_search_usulan_diklat();		
			$data['nama_diklat'] 	= $this->diklat_model->ditinct_diklat();		
			$this->load->view('dasbor_superadmin/diklat/eksport_excel_perencana_diklat',$data);
		}else if($_POST['submit']=="GO!"){
			$usulan_diklat 			= $this->diklat_model->filter_search_usulan_diklat();
			$usulan_penyelenggara	= $this->diklat_model->usulan_penyelenggara();
			$usulan_pelatihan		= $this->diklat_model->usulan_pelatihan();
			$nama_atasan			= $this->master_model->master_atasan();
			$nama_diklat 			= $this->diklat_model->ditinct_diklat();

			$data = array(
				'title' 				=> 	'Data Laporan Cuti',
				'alt'					=> 	'Laporan',
				'icon'					=> 	'home',
				'sub'					=>	'Laporan Cuti',
				'interface'				=>	'Halaman Laporan Pegawai',
				'nama_diklat'			=>	$nama_diklat,
				'usulan_diklat'			=>	$usulan_diklat,
				'usulan_penyelenggara'	=>	$usulan_penyelenggara,
				'usulan_pelatihan'		=>	$usulan_pelatihan,
				'nama_atasan'			=>	$nama_atasan,
			 	'page'					=>	'dasbor_superadmin/diklat/perencanaan_diklat'
			 );

			$this->session->set_flashdata('tanggal_awal', $tanggal_awal);
			$this->session->set_flashdata('tanggal_akhir', $tanggal_akhir);
			$this->session->set_flashdata('penyelenggara', $penyelenggara);
			$this->session->set_flashdata('nama_pelatihan', $nama_pelatihan);
			$this->session->set_flashdata('nama_atasan', $nama_atasan);
			$this->load->view('layout/wrapper', $data, FALSE);
		}			
	}

	public function ajukan_diklat()
	{
		$id = $this->input->post('id');
		var_dump($id);
		foreach ($id as $k => $id) 
		{
			$query = $this->db->query('UPDATE data_diklat SET status_diklat="Menunggu" WHERE id_diklat="'.$id.'" ');
		}
	}

	public function setujui_diklat()
	{
		$id = $this->input->post('id');
		var_dump($id);
		foreach ($id as $k => $id) 
		{
			$query = $this->db->query('UPDATE data_diklat SET status_diklat="Setujui" WHERE id_diklat="'.$id.'" ');
		}
	}	

	public function tolak_diklat()
	{
		$id = $this->input->post('id');
		var_dump($id);
		foreach ($id as $k => $id) 
		{
			$query = $this->db->query('UPDATE data_diklat SET status_diklat="Tolak" WHERE id_diklat="'.$id.'" ');
		}
	}

	public function hapus_diklat()
	{
		$id = $this->input->post('id');
		var_dump($id);
		foreach ($id as $k => $id) 
		{
			$query = $this->db->query('DELETE FROM data_diklat WHERE id_diklat="'.$id.'" ');
		}
	}

	public function pendaftaran_peserta()
	{
		$id = $this->input->post('id');
		foreach($id as $id)
		{
			$tampil_data = $this->db->query("SELECT * FROM data_diklat a JOIN data_pegawai b on a.nama_peserta=b.nama WHERE a.id_diklat = '".$id."'");
			$result = $tampil_data->result();
			$data = array(
				'result'			=>	$result,
			 );

			 $this->load->view('dasbor_superadmin/diklat/pendaftaran_peserta', $data, FALSE);	
		}
	}

}

/* End of file Perencanaan_diklat.php */
/* Location: ./application/controllers/dasbor_superadmin/Perencanaan_diklat.php */