<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function profile_rs()
	{
		$this->db->select('*');
		$this->db->from('profile_rs');
		$query = $this->db->get();
		return $query->row();
	}

	public function logo()
	{
		$this->db->select('logo');
		$this->db->from('profile_rs');
		$query = $this->db->get();
		return $query->row();
	}

	public function edit_profile($data)
	{
		$this->db->update('profile_rs',$data);
	}

	public function edit_logo($data)
	{
		$this->db->update('profile_rs',$data);
	}
	
}

/* End of file Profile_model.php */
/* Location: ./application/models/Profile_model.php */