<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Listing : display all data JOIN Table
	public function listing(){
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$this->db->join('users','users.id_user = data_pegawai.id_user');
		$this->db->where('username_admin',$this->session->userdata('username_admin'));
		$this->db->order_by('data_pegawai.nama','DSC');
		$query = $this->db->get();
		return $query->result();
	}
	

	//Listing : display all data JOIN Table
	public function listing_profile(){
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$this->db->join('users','users.username_admin = data_pegawai.nip');
		$this->db->where('data_pegawai.nip',$this->session->userdata('username_admin'));
		$query = $this->db->get();
		return $query->result();
	}

	//Listing : display data JOIN Table halaman user dasbor
	public function user_aktifitas_tugas(){
		$this->db->select('*');
		$this->db->from('aktifitas_tugas');
		$this->db->join('users','users.username_admin = aktifitas_tugas.nip_data_pegawai');
		$this->db->where('aktifitas_tugas.nip_data_pegawai',$this->session->userdata('username_admin'));
		$this->db->where('aktifitas_tugas.tanggal_tugas',date('Y-m-27'));
		$this->db->where('aktifitas_tugas.tanggal_tugas',date('Y-m-26'));
		$this->db->order_by('aktifitas_tugas.tanggal_tugas','DESC');
		$this->db->order_by('aktifitas_tugas.jam_mulai','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function nip_profile(){
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$this->db->where('nip_data_pegawai',$this->session->userdata('username_admin'));
		$query = $this->db->get();
		return $query->result();
	}

	//Listing : display data by date
	public function search($search){
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$this->db->join('users','users.id_user = data_pegawai.id_user');
		$this->db->like('data_pegawai.nama', $search);
		$this->db->where('users.username_admin',$this->session->userdata('username_admin'));
		$this->db->or_like('data_pegawai.nip', $search);
		$this->db->where('data_pegawai.id_data_pegawai', $search);
		$query = $this->db->get();
		return $query->result();
	}

	//Listing : display data by date
	public function search_post($search_post){
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$this->db->join('users','users.id_user = data_pegawai.id_user');
		$this->db->like('data_pegawai.nama', $search_post);
		$this->db->or_like('data_pegawai.nip', $search_post);
		$this->db->group_by('data_pegawai.id_data_pegawai');
		$query = $this->db->get();
		return $query->result();
	}

	public function listing_user(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('id_user','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Tambah : Untuk Insert Data
	public function tambah($data){
		$this->db->insert('users', $data);
	}

	// Edit : untuk edit data table users
	public function edit($data){
		$this->db->where('id_user',$data['id_user']);
		$this->db->update('users',$data);
	}


	// Delete : untuk delete data user
	public function delete($data){
		$this->db->where('id_user',$data['id_user']);
		$this->db->delete('users',$data);
	}
	
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */