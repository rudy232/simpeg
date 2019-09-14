<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti_model_user extends CI_Model {
	

	//http://localhost/asimpeg/dasbor_user/cuti/detail (Menampilkan data history cuti pegawai)
	public function history_cuti()
	{
		$this->db->select('*');
		$this->db->from('data_cuti');
		$this->db->where('data_cuti.id_data_pegawai',$this->session->userdata('id_user'));
		$this->db->order_by('tanggal_pengajuan','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_users/cuti/detail (Menampilkan data cuti detail pegawai)
	public function tag_cuti()
	{
		$this->db->select('*');
		$this->db->from('data_cuti');
		$query = $this->db->get();
		return $query->result();
	}

	public function cuti_unit_kerja($unit_kerja)
	{
		$this->db->select('*');
		$this->db->from('data_cuti');
		$this->db->where('unit_kerja',$unit_kerja);
		$this->db->order_by('id_cuti','DESC');
		$query = $this->db->get();
		return $query->result();
	} 

	//http://localhost/asimpeg/dasbor_users/cuti/detail (Menampilkan data cuti detail pegawai)
	public function listing_detail()
	{
		$this->db->select('*');
		$this->db->from('data_cuti');
		$this->db->where('id_data_pegawai',$this->session->userdata('id_user'));
		$this->db->order_by('id_cuti','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//http://localhost/asimpeg/dasbor_users/cuti/detail (Menampilkan data cuti detail pegawai)
	public function listing_edit($id_cuti)
	{
		$this->db->select('*');
		$this->db->from('data_cuti');
		$this->db->where('id_cuti',$id_cuti);
		$this->db->order_by('id_cuti','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function listing_hari_libur($id_cuti)
	{
		$this->db->select('*');
		$this->db->from('data_cuti');
		$this->db->where('id_cuti',$id_cuti);
		$this->db->order_by('id_cuti','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//listing_setting_cuti
	public function listing_setting_cuti(){
		$this->db->select('*');
		$this->db->from('data_kuota_cuti');
		$query = $this->db->get();
		return $query->row();
	}

	//http://localhost/asimpeg/dasbor_users/cuti/detail (Menampilkan data cuti detail pegawai)
	public function get_id_pegawai($id_data_pegawai)
	{
		$this->db->select('*');
		$this->db->from('data_cuti');
		$this->db->where('id_data_pegawai',$id_data_pegawai);
		$this->db->order_by('id_cuti','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//http://localhost/asimpeg/dasbor_users/cuti/detail (Menampilkan data cuti detail pegawai)
	public function hitory_cuti_byid($id_data_pegawai)
	{
		$this->db->select('*');
		$this->db->from('data_cuti');
		$this->db->where('id_data_pegawai',$id_data_pegawai);
		$this->db->order_by('id_data_pegawai','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_users/cuti/edit (update data cuti detail pegawai)
	public function update($data)
	{
		$this->db->where('id_cuti',$data['id_cuti']);
		$this->db->update('data_cuti',$data);
	}

	//http://localhost/asimpeg/dasbor_users/cuti/tambah (tambah data cuti detail pegawai)
	public function tambah($data)
	{
		$this->db->insert('data_cuti',$data);
	}

	//http://localhost/asimpeg/dasbor_users/cuti/delete (hapus data cuti detail pegawai)
	public function delete($data){
		$this->db->where('id_cuti',$data['id_cuti']);
		$this->db->delete('data_cuti',$data);
	}

	public function check_exist(){
		$this->db->select('*');
		$this->db->from('data_cuti');
		$query = $this->db->get();
		return $query->result();
	}

	public function print_by_id($id_cuti){
		$this->db->select('*');
		$this->db->from('data_cuti');
		$this->db->join('data_pegawai','data_cuti.id_data_pegawai=data_pegawai.id_data_pegawai','LEFT');
		$this->db->where('id_cuti',$id_cuti);
		$query = $this->db->get();	
		return $query->row();	
	}

	//Mengambil tanggal awal
	public function tangal_awal($id_data_pegawai){
		$this->db->select('awal');
		$this->db->from('data_cuti');
		$this->db->where('id_data_pegawai',$id_data_pegawai);
		$this->db->order_by('id_cuti','DESC');
		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file Cuti_model.php */
/* Location: ./application/models/Cuti_model.php */