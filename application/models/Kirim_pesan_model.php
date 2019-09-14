<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kirim_pesan_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function kirim_pesan_user($data){
		$this->db->insert('data_kirim_pesan',$data);
	}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('data_kirim_pesan');
		$this->db->where('id_data_pegawai',$this->session->userdata('id_user'));
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		return $query->result();	
	}

	public function detail_pesan($id_pesan)
	{
		error_reporting(0);
		$this->db->select('*');
		$this->db->from('data_kirim_pesan');
		$this->db->where('id',$id_pesan);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_status($baca){
		$this->db->where('id',$baca['id']);
		$this->db->update('data_kirim_pesan',$baca);
	}

}

/* End of file Kirim_pesan_model.php */
/* Location: ./application/models/Kirim_pesan_model.php */