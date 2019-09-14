<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kirim_pesan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kirim_pesan_model');
	}

	public function index(){
		$data_pegawai = $this->pegawai_model->listing();
		$data = array(
				'title' 					=> 	'Kirim Pesan',
				'alt'						=> 	'Penolakan',
				'icon'						=> 	'home',
				'sub'						=>	'Kirim Pesan',
				'interface'					=>	'Halaman Kirim Pesan',
				'data_pegawai'				=>	$data_pegawai,
			 	'page'						=>	'dasbor_superadmin/pesan/list'
			 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function kirim_pesan_pegawai($id_cuti){
		$data_cuti = $this->cuti_model->kirim_pesan($id_cuti);
		$data = array(
				'title' 					=> 	'Alasan Penolakan',
				'alt'						=> 	'Penolakan',
				'icon'						=> 	'home',
				'sub'						=>	'Kirim alasan Penolakan',
				'interface'					=>	'Halaman Alasan Penolakan',
			 	'data_cuti'					=>	$data_cuti,
			 	'page'						=>	'dasbor_superadmin/cuti/kirim_pesan'
			 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function kirim_data($id_cuti){
		$id_data_pegawai = $_POST['id_data_pegawai'];
		$data = array(
				'id_cuti'			=> 	$id_cuti,
				'id_data_pegawai'	=> 	$id_data_pegawai,
				'bulan_surat'		=> 	$_POST['bulan_surat'],
				'judul'				=> 	$_POST['judul'],
				'dari'				=> 	$_POST['dari'],
				'ke'				=> 	$_POST['ke'],
				'jenis_pesan'		=> 	$_POST['jenis_pesan'],
				'status_baca'		=>	'Belum',
				'isi_pesan'			=> 	strip_tags($_POST['isi_pesan'])
			 );
		$this->kirim_pesan_model->kirim_pesan_user($data);
		$this->session->set_flashdata('notival', 'Berhasil Kirim Pesan');
		redirect(base_url('dasbor_superadmin/cuti_pegawai'),'refresh');
	}

	public function kirim_pesan(){
		$data = array(
				'id_data_pegawai'	=> 	$_POST['id_data_pegawai'],
				'bulan_surat'		=> 	$_POST['bulan_surat'],
				'judul'				=> 	$_POST['judul'],
				'dari'				=> 	$_POST['dari'],
				'ke'				=> 	$_POST['ke'],
				'jenis_pesan'		=> 	$_POST['jenis_pesan'],
				'status_baca'		=>	'Belum',
				'isi_pesan'			=> 	strip_tags($_POST['isi_pesan'])
			 );
		$this->kirim_pesan_model->kirim_pesan_user($data);
		$this->session->set_flashdata('notival', 'Berhasil Kirim Pesan');
		redirect(base_url('dasbor_superadmin/kirim_pesan'),'refresh');
	}

	public function inbox()
	{
		$list_pesan = $this->kirim_pesan_model->listing();
		$data = array(
			'title' 			=> 	'Inbox',
			'subtitle'			=>	'<span class="icon-envelope"></span> Inbox',
			'alt'				=> 	'Pesan',
			'icon'				=> 	'home',
			'sub'				=>	'Pesan',
			'interface'			=>	'Halaman Listing Pesan',
			'list_pesan'		=>	$list_pesan,
		 	'page'				=>	'dasbor_superadmin/pesan/listing'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);		
	}

	public function detail_pesan($id_pesan)
	{
		$isi_pesan = $this->kirim_pesan_model->detail_pesan($id_pesan);
		
		$baca = array(
			'id' 			=> 	$id_pesan,
			'status_baca' 	=>	'Sudah'
		);

		$data = array(
			'title' 			=> 	'Data Detail Pesan',
			'alt'				=> 	'Pesan',
			'icon'				=> 	'home',
			'sub'				=>	'Pesan',
			'interface'			=>	'Halaman Detail Pesan',
			'isi_pesan'			=>	$isi_pesan,
		 	'page'				=>	'dasbor_superadmin/pesan/list_detail'
		 );
		
		$this->kirim_pesan_model->update_status($baca);
		$this->load->view('layout/wrapper', $data, FALSE);	
	}

}

/* End of file Kirim_pesan.php */
/* Location: ./application/controllers/dasbor_superadmin/Kirim_pesan.php */
