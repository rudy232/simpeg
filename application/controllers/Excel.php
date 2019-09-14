<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
	}

	//upload file excel
	public function upload(){
		$fileName = $this->input->post('file', TRUE);
		$config['upload_path'] = 'assets/upload_excel'; 
		$config['file_name'] = $fileName;
		$config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
		$config['max_size'] = 10000;

		$this->load->library('upload', $config);
		$this->upload->initialize($config); 

	if (!$this->upload->do_upload('file')) {	
		$error = array('error' => $this->upload->display_errors());
		$this->session->set_flashdata('notifail','Ada kesalahan dalam upload! pastikan anda sudah memilih file'); 
		redirect(base_url('dasbor_superadmin/data_pegawai'),'refresh');
	} else {
		$media = $this->upload->data();
		$inputFileName = 'assets/upload_excel/'.$media['file_name'];

		try {
			$inputFileType = IOFactory::identify($inputFileName);
			$objReader = IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($inputFileName);
		} catch(Exception $e) {
			die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
		}

		$sheet = $objPHPExcel->getSheet(0);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();
		for ($row = 8; $row <= $highestRow; $row++){  
			$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
			NULL,
			TRUE,
			FALSE);
		    //Sesuaikan sama nama kolom tabel di database                                
		     $data[] = array(
		     	"id_data_pegawai"	=>	$rowData[0][0],	
		     	"id_atasan"			=>	$rowData[0][1],	
		        "nama"				=> 	$rowData[0][2],
		        "nip"				=> 	$rowData[0][3],
		        "nrk"				=> 	$rowData[0][4],
		        "nopeg"				=> 	$rowData[0][5],
		        "password"			=> 	$rowData[0][6],
		        "akses_level"		=> 	$rowData[0][7],
		        "pangkat"			=> 	$rowData[0][8],
		        "golongan_ruang"	=> 	$rowData[0][9],
		        "tahun_masa_kerja"	=> 	$rowData[0][10],
		        "bulan_masa_kerja"	=> 	$rowData[0][11],
		        "jabatan"			=> 	$rowData[0][12],
		        "jenis_kelamin"		=> 	$rowData[0][13],
		        "tempat_lhr"		=> 	$rowData[0][14],
		        "tgl_lahir"			=> 	$rowData[0][15],
		        "alamat"			=> 	$rowData[0][16],
		        "pendidikan_trkh"	=> 	$rowData[0][17],
		        "no_rekening"		=> 	$rowData[0][18],
		        "no_ktp"			=> 	$rowData[0][19],
		        "no_npwp"			=> 	$rowData[0][20],
		        "no_hp"				=> 	$rowData[0][21],
		        "gaji"				=> 	$rowData[0][22],
		        "tkd"				=> 	$rowData[0][23],
		        "jenis_tunjangan"	=> 	$rowData[0][24],
		        "unit_kerja"		=> 	$rowData[0][25],
		        "gambar"			=> 	$rowData[0][26],
		        "email"				=> 	$rowData[0][27],
		        "tanggal_daftar"	=> 	$rowData[0][28]
		    );
			} 
			//sesuaikan nama dengan nama tabel
		    $this->db->insert_batch("data_pegawai",$data);
		    $this->session->set_flashdata('notifval','Berhasil upload ...!!'); 
			redirect(base_url('dasbor_admin/data_pegawai'),'refresh');
		}  
	} 
}

/* End of file Excel.php */
/* Location: ./application/controllers/admin/Excel.php */