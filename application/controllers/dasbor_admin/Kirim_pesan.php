<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kirim_pesan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kirim_pesan_model');
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
			 	'page'						=>	'dasbor_admin/cuti/kirim_pesan'
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
				'isi_pesan'			=> 	strip_tags($_POST['isi_pesan'])
			 );
		$this->kirim_pesan_model->kirim_pesan_user($data);
		$this->session->set_flashdata('notival', 'Berhasil Kirim Pesan');
		redirect(base_url('dasbor_admin/cuti_pegawai'),'refresh');
	}

}

/* End of file Kirim_pesan.php */
/* Location: ./application/controllers/Dasbor_admin/Kirim_pesan.php */
