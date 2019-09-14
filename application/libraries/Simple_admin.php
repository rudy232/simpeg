<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_admin {
	
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
		$this->CI->load->model('pegawai_model');
	}
	
	// Login
	public function login($username_admin, $password) {
		// Query untuk pencocokan data
		$query = $this->CI->db->query('SELECT * FROM data_pegawai WHERE nopeg="'.$username_admin.'" AND password="'.sha1($password).'" OR nrk="'.$username_admin.'" AND password="'.sha1($password).'"');
										
		// Jika ada hasilnya
		if($query->num_rows() == 1) {
			$row 	= $this->CI->db->query('SELECT * FROM data_pegawai WHERE nrk="'.$username_admin.'" OR nopeg="'.$username_admin.'" ');
			$admin 	= $row->row();
			$id_user 	= $admin->id_data_pegawai;
			$id_atasan 	= $admin->id_atasan;
			$nama	= $admin->nama;
			$level	= $admin->akses_level;
			$jabatan	= $admin->jabatan;
			$unit_kerja	= $admin->unit_kerja;
			// $_SESSION['username_admin'] = $username_admin;
			$this->CI->session->set_userdata('username_admin', $username_admin); 
			$this->CI->session->set_userdata('level', $level); 
			$this->CI->session->set_userdata('nama', $nama); 
			$this->CI->session->set_userdata('jabatan', $jabatan); 
			$this->CI->session->set_userdata('unit_kerja', $unit_kerja); 
			$this->CI->session->set_userdata('id_login', uniqid(rand()));
			$this->CI->session->set_userdata('id_user', $id_user);
			$this->CI->session->set_userdata('id_atasan', $id_atasan);

			// Masukan fata json ke log.txt

			$id_user	= $this->CI->session->userdata('id_user');
			$user = $this->CI->pegawai_model->detail($id_user);

			// Kalau benar di redirect
			if($this->CI->session->userdata('level')=="Superadmin"){
				helper_log("login", "Berhasil Login dengan level superadmin");
				redirect(base_url('dasbor_superadmin/dasbor'));
			}else if($this->CI->session->userdata('level')=="Admin"){
				helper_log("login", "Berhasil Login dengan level Admin");
				redirect(base_url('dasbor_admin/cuti_pegawai'));
			}else{
				helper_log("login", "Berhasil Login dengan level User");
				redirect(base_url('dasbor_users/dasbor/detail'));
			}
		}else{
			$this->CI->session->set_flashdata('sukses','Oopss.. Username/password salah');
			helper_log("login", $this->CI->session->flashdata('sukses'));
			redirect(base_url('login'));
		}
		return false;
	}
	
	// Cek login
	public function cek_login() {
		if($this->CI->session->userdata('username_admin') == '' && $this->CI->session->userdata('level')=='') {
			helper_log("login", $this->CI->session->flashdata('sukses'));
			helper_log("login", "gagal Login karena akses halaman yang membutuhkan validasi user");
			redirect(base_url('login'));
		}	
	}

	// Cek login
	public function cek_login_superadmin() {
		if($this->CI->session->userdata('level')!='Superadmin') {
			$this->CI->session->set_flashdata('sukses','Nampaknya anda sedang melakukan tindakan yang mencurigakan sistem, mohon untuk tidak melakukan hal - hal yang dapat merugikan pihak lain');
			helper_log("login", $this->CI->session->flashdata('sukses'));
			redirect(base_url('login'));
		}	
	}
	
	
	
	// Logout
	public function logout() {

		// Masukan fata json ke report_logout.txt

		// Masukan fata json ke log.txt

		$id_user	= $this->CI->session->userdata('id_user');
		$user = $this->CI->pegawai_model->detail($id_user);
		helper_log("logout", "Berhasil Logout");
		$this->CI->session->unset_userdata('username_admin');
		$this->CI->session->unset_userdata('level');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('id_login');
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->set_flashdata('sukses','Terimakasih, Anda berhasil logout');
		redirect(base_url('login'));
	}
	
}