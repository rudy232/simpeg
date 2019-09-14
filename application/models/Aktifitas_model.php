<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aktifitas_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	// Menampilkan data looping level admin uraian tugas
	public function listing_admin(){
		$this->db->select('*');
		$this->db->from('aktifitasumum');
		$query = $this->db->get();
		return $query->result();
	}

	// Menampilkan data looping jabatan
	public function listing_jabatan(){
		$this->db->select('*');
		$this->db->from('master_jabatan');
		$query = $this->db->get();
		return $query->result();
	}

	// Menampilkan data looping jabatan Row
	public function listing_aktifitas_row($id){
		$this->db->select('*');
		$this->db->from('aktifitasumum');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}
	
	//insert data aktifitas umum
	public function tambah($data){
		$this->db->insert('aktifitasumum',$data);
	}

	// Edit : untuk edit data table aktifitasumum
	public function edit_aktifitas($data){
		$this->db->where('id',$data['id']);
		$this->db->update('aktifitasumum',$data);
	}

	// Delete : untuk delete data aktifitas kegiatan
	public function delete_aktifitasumum($data){
		$this->db->where('id',$data['id']);
		$this->db->delete('aktifitasumum',$data);
	}
}

/* End of file Aktifitas_model.php */
/* Location: ./application/models/Aktifitas_model.php */