<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()	{

		//Validasi login
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('username', 'username', 'trim|required',
								array(	'required' => 'Username Harus di Isi'));

		$this->form_validation->set_rules('password', 'password', 'trim|required',
								array(	'required' => 'Password Harus Di Isi'));

		if($this->form_validation->run()){
			$this->simple_admin->login($username,$password,base_url('dasbor_admin/dasbor'), base_url('login'));
		}

		$data=array('title' => 'Sistem Kepegawaian RSUD Cilincing');
		$this->load->view('login', $data, FALSE);
		
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */