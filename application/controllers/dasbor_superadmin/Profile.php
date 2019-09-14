<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{
		$data_profile = $this->profile_model->profile_rs();
		$data = array(
			'title' 			=> 	'Data Profle RS',
			'alt'				=> 	'Beranda',
			'icon'				=> 	'home',
			'sub'				=>	'Profile RS',
			'interface'			=>	'Data Profile RS',
			'data_profile'		=>	$data_profile,
		 	'page'				=>	'dasbor_superadmin/profile/list'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function edit()
	{
		$data_profile = $this->profile_model->profile_rs();
		$data = array(
			'title' 			=> 	'Data Profle RS',
			'alt'				=> 	'Beranda',
			'icon'				=> 	'home',
			'sub'				=>	'Profile RS',
			'interface'			=>	'Data Profile RS',
			'data_profile'		=>	$data_profile,
		 	'page'				=>	'dasbor_superadmin/profile/list_edit'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function prosess_edit()
	{
		$i=$this->input;
		$data = array(
			'nama_rs' 			=> 	$i->post('nama_rs'),
			'alamat_rs'			=> 	$i->post('alamat_rs'),
			'no_telpon'			=> 	$i->post('no_telpon'),
			'email'				=>	$i->post('email'),
			'tanggal_berdiri'	=>	date("Y-m-d",strtotime($i->post('tanggal_berdiri')))
		 );
		$this->profile_model->edit_profile($data);
		$this->session->set_flashdata('notifval', 'Profile Rumah Sakit Berhasil di Ubah');
		redirect(base_url('dasbor_superadmin/profile'),'refresh');
	}

	public function upload_logo()
	{
		$logo = $this->profile_model->logo();
		$config =  array(
              'upload_path'     => "./assets/matrix-admin-package/img/",
              'allowed_types'   => "gif|jpg|png|jpeg",
              'encrypt_name'    => False, // 
              'max_size'        => "50000",  // ukuran file gambar
              'max_height'      => "9680",
              'max_width'       => "9024"
                               );

		 $this->upload->initialize($config);
         $this->load->library('upload',$config);

		if(! $this->upload->do_upload('file_name')) 
		{
			$data=$this->upload->display_errors();
           	$this->session->set_flashdata('gagal', $data);
           	redirect(base_url('dasbor_superadmin/profile'),'refresh');
		}else{
			$upload_data=$this->upload->data();
			$nama_file=$upload_data['file_name'];
			$ukuran_file=$upload_data['file_size'];
			// image editor
			$config['image_library']	= 'gd2';
			$config['source_image'] 	= './assets/matrix-admin-package/img/'.$upload_data['file_name']; 
			$config['new_image'] 		= './assets/matrix-admin-package/img/thumbnail_logo/';
			$config['create_thumb'] 	= TRUE;
			$config['quality'] 			= "100%";
			$config['maintain_ratio'] 	= TRUE;
			$config['width'] 			= 100; // Pixel
			$config['height'] 			= 100; // Pixel
			$config['x_axis'] 			= 0;
			$config['y_axis'] 			= 0;
			$config['thumb_marker'] 	= '';
			$this->image_lib->initialize($config);

			if (!$this->image_lib->resize())
            {
             	$data=$this->image_lib->display_errors();
            	$this->session->set_flashdata('gagal', $data);
           		redirect(base_url('dasbor_superadmin/profile'),'refresh');
            	exit;
            }

            // Hapus gambar lama saat edit dan menyimpan file baru
			if($logo->logo!=""){
				unlink('./assets/matrix-admin-package/img/'.$logo->logo);
				unlink('./assets/matrix-admin-package/img/thumbnail_logo/'.$logo->logo);
				$data = array('logo' => $upload_data['file_name']);
				$this->profile_model->edit_logo($data);
				$this->session->set_flashdata('notifval', 'Logo Berhasil di Upload');
				redirect(base_url('dasbor_superadmin/profile'),'refresh');
			}
		}	
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/dasbor_superadmin/Profile.php */