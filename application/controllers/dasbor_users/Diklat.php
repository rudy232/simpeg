<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diklat extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$list_nama_atasan 	= $this->pegawai_model->listing_nama_atasan_all();
		$list_pegawai 		= $this->pegawai_model->listing();
		$unit_kerja			= $this->pegawai_model->unit_kerja();
		$usulan_diklat 			= $this->diklat_model->usulan_diklat_user();
		$data = array(
			'title' 				=> 	'Perencanaan Diklat (Data hasil permintaan user)',
			'alt'					=> 	'Beranda',
			'icon'					=> 	'home',
			'sub'					=>	'Dashbor',
			'interface'				=>	'Data Perencanaan Diklat',
			'list_nama_atasan'		=>	$list_nama_atasan,
			'list_pegawai'			=>	$list_pegawai,
			'unit_kerja'			=>	$unit_kerja,
			'usulan_diklat'			=>	$usulan_diklat,
		 	'page'					=>	'dasbor_users/diklat/usulan_diklat'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function tambah_usulan_diklat ()
	{
		$i = $this->input;
		$nama_pengaju 		= $this->session->userdata('nama');
		$nama_atasan 		= $i->post('nama_atasan');
		$nama_diklat 		= $i->post('nama_diklat');
		$nama_peserta 		= $i->post('nama_peserta');
		$unit_kerja 		= $i->post('unit_kerja');
		$waktu_pelaksanaan 	= $i->post('waktu_pelaksanaan');
		$biaya_pelatihan 	= str_replace(".", "", $i->post('biaya_pelatihan'));
		$nama_penyelenggara = $i->post('nama_penyelenggara');
		$lokasi_pelatihan 	= $i->post('lokasi_pelatihan');

		foreach ($nama_peserta as $key => $nama_peserta) {
			$data[] = array(	
				'pengaju'			=>	$nama_pengaju,
				'nama_atasan'		=>	$nama_atasan,
				'nama_diklat'		=>	$nama_diklat,
				'nama_peserta'		=>	$nama_peserta,
				'unit_kerja'		=>	$unit_kerja,
				'waktu_pelaksanaan'	=>	$waktu_pelaksanaan,
				'biaya_pelatihan'	=>	$biaya_pelatihan,
				'nama_penyelenggara'=>	$nama_penyelenggara,
				'lokasi_pelatihan'	=>	$lokasi_pelatihan,
				'tanggal'			=>	date("Y-m-d"),
			 );

			//var_dump($data[$key]);
		}
		$this->db->insert_batch('data_diklat',$data);
		//$this->diklat_model->tambah_usulan_diklat($data);
		$this->session->set_flashdata('notifval', 'Data Usulan Diklat dengan nama pelatihan <strong>'.$i->post('nama_diklat').'</strong> Berhasil di Tambahkan');
		redirect('dasbor_users/diklat','refresh');
	}

	public function dok_pelatihan ()
	{
		$nama_diklat = $this->diklat_model->ditinct_diklat_user();
		$data = array(
			'title'			=> 	'Upload Dokumen Pelatihan',
			'alt'			=> 	'Beranda',
			'icon'			=> 	'home',
			'sub'			=>	'Dok Pelatihan',
			'interface'		=>	'Upload Dokumen Pelatihan',
			'nama_diklat'	=>	$nama_diklat,
			'page' 			=> 'dasbor_users/diklat/dok_pelatihan', 
		);

		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function upload_spj_diklat()
	{
		$i = $this->input;
		$data_diklat =explode("-", $i->post('nama_diklat'));
 
		$config =  array(
              'upload_path'     => "./uploads/",
              'allowed_types'   => "gif|jpg|png|jpeg|pdf",
              'encrypt_name'    => False, // 
              'max_size'        => "50000",  // ukuran file gambar
              'max_height'      => "9680",
              'max_width'       => "9024"
                               );

		 $this->upload->initialize($config);
         $this->load->library('upload',$config);
        for ($x=1; $x <=6 ; $x++) { 
            if(!empty($_FILES['file_name'.$x]['name'])){
                if(!$this->upload->do_upload('file_name'.$x))
                    $this->upload->display_errors();  
                else
                    $data_spj[] = array( "dok".$x => str_replace(" ", "_", $_FILES['file_name'.$x]['name']) );
            }
        }
        $json_data = json_encode($data_spj);


    	$data = array(
			'id_data_diklat' 		=> $data_diklat[0],
			'id_data_pegawai' 		=> $data_diklat[1],
			'id_master_pelatihan' 	=> 0,
			'penyelenggara' 		=> $data_diklat[2],
			'anggaran' 				=> $i->post('anggaran'),
			'biaya' 				=> $i->post('biaya_pelatihan'),
			'uraian'				=> $i->post('uraian'),
			'status_dok'			=> 0,
			'lokasi'				=> $i->post('lokasi'),
			'tanggal_sertifikat'	=> $i->post('tanggal_pelatihan'),
			'tanggal_sertifikat2'	=> $i->post('tanggal_pelatihan2'),
			'jam_mulai'				=> $i->post('jam_mulai'),
			'jam_selesai'			=> $i->post('jam_selesai'),
			'negara'				=> 'Indonesia',
			'spj_img'				=> $json_data,
		);
		$this->diklat_model->upload_spj_diklat($data);
		$this->session->set_flashdata('notifval', 'Dokumen Berhasil di Upload');
		redirect('dasbor_users/diklat/dok_pelatihan','refresh');
	}     
}

/* End of file Diklat.php */
/* Location: ./application/controllers/dasbor_users/Diklat.php */