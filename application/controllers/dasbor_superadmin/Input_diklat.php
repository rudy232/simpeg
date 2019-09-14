<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_diklat extends CI_Controller {

	public function index()
	{
		$list_pegawai 		= $this->pegawai_model->listing();
		$master_pelatihan	= $this->diklat_model->data_nama_pelatihan();
		$data = array(
			'title' 				=> 	'Input Peserta Diklat',
			'alt'					=> 	'Beranda',
			'icon'					=> 	'home',
			'sub'					=>	'Dashbor',
			'interface'				=>	'Data Perencanaan Diklat',
			'list_pegawai'			=>	$list_pegawai,
			'master_pelatihan'		=>	$master_pelatihan,
		 	'page'					=>	'dasbor_superadmin/diklat/input_peserta_diklat.php'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function tambah_peserta_diklat ()
	{
		$i = $this->input;
		$nama_peserta = $i->post('nama_peserta');
		foreach ($nama_peserta as $key => $nama_peserta) {
			$data[] = array('id_data_pegawai'		=>	$nama_peserta,
							'id_master_pelatihan'	=>	$i->post('id_master_pelatihan'),
							'penyelenggara'			=>	$i->post('penyelenggara'),
							'anggaran'				=>	$i->post('anggaran'),
							'biaya'					=>	$i->post('biaya'),
							'uraian'				=>	$i->post('uraian_pelatihan'),
							'lokasi'				=> 	$i->post('lokasi'),
							'tanggal_sertifikat'	=>	$i->post('tanggal_sertifikat'),
							'tanggal_sertifikat2'	=>	$i->post('tanggal_sertifikat2'),
							'jam_mulai'				=>	$i->post('jam_mulai'),
							'jam_selesai'			=>	$i->post('jam_selesai'),
							'negara'				=>	$i->post('negara')
							);

			//var_dump($data[$key]);
		}
		$this->db->insert_batch('data_pelatihan',$data);
		$this->session->set_flashdata('notifval', 'Data Usulan Diklat dengan nama peserta <strong>'.$i->post('nama_peserta').'</strong> Berhasil di Tambahkan');
		redirect('dasbor_superadmin/input_diklat','refresh');
	}
}

/* End of file input_diklat.php */
/* Location: ./application/controllers/dasbor_superadmin/input_diklat.php */