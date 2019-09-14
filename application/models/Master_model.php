<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//Tamabah Master Atasan
	public function tambah_master_atasan($data)
	{
		$this->db->insert('master_atasan',$data);
	}

	//listing list_edit
	public function listing($id_master_atasan)
	{
		$this->db->select('*');
		$this->db->from('master_atasan');
		$this->db->where('id_atasan',$id_master_atasan);
		$query = $this->db->get();
		return $query->row();
	}
	//edit data master atasan
	public function edit_master_atasan($data)
	{
		$this->db->where('id_atasan',$data['id_atasan']);
		$this->db->update('master_atasan',$data);
	}
	//Hapus data master atasan
	public function hapus_master_atasan($data)
	{
		$this->db->where('id_atasan',$data['id_atasan']);
		$this->db->delete('master_atasan',$data);
	}

	//Tamabah Master Jabatan
	public function tambah_master_jabatan($data)
	{
		$this->db->insert('master_jabatan',$data);
	}

	public function master_atasan()
	{
		$this->db->select('*');
		$this->db->from('master_atasan');
		$query = $this->db->get();
		return $query->result();
	}

	//listing list_edit jabatan
	public function listing_jabatan($id_master_jabatan)
	{
		$this->db->select('*');
		$this->db->from('master_jabatan');
		$this->db->where('id_jabatan',$id_master_jabatan);
		$query = $this->db->get();
		return $query->row();
	}
	//edit data master jabatan
	public function edit_master_jabatan($data)
	{
		$this->db->where('id_jabatan',$data['id_jabatan']);
		$this->db->update('master_jabatan',$data);
	}
	//Hapus data master Jabatan
	public function hapus_master_jabatan($data)
	{
		$this->db->where('id_jabatan',$data['id_jabatan']);
		$this->db->delete('master_jabatan',$data);
	}

	//Tamabah Master Unit Kerja
	public function tambah_master_unit_kerja($data)
	{
		$this->db->insert('master_unit_kerja',$data);
	}

	//listing list_edit Unit Kerja
	public function listing_unit_kerja($id_master_unit_kerja)
	{
		$this->db->select('*');
		$this->db->from('master_unit_kerja');
		$this->db->where('id_unit_kerja',$id_master_unit_kerja);
		$query = $this->db->get();
		return $query->row();
	}

	//edit data master Unit Kerja
	public function edit_master_unit_kerja($data)
	{
		$this->db->where('id_unit_kerja',$data['id_unit_kerja']);
		$this->db->update('master_unit_kerja',$data);
	}
	//Hapus data master Unit Kerja
	public function hapus_master_unit_kerja($data)
	{
		$this->db->where('id_unit_kerja',$data['id_unit_kerja']);
		$this->db->delete('master_unit_kerja',$data);
	}

	//Tamabah Master Pelatihan
	public function tambah_master_pelatihan($data)
	{
		$this->db->insert('master_pelatihan',$data);
	}

	//listing list_edit pelatihan
	public function listing_pelatihan($id_master_pelatihan)
	{
		$this->db->select('*');
		$this->db->from('master_pelatihan');
		$this->db->where('id_pelatihan',$id_master_pelatihan);
		$query = $this->db->get();
		return $query->row();
	}

	//edit data master pelatihan
	public function edit_master_pelatihan($data)
	{
		$this->db->where('id_pelatihan',$data['id_pelatihan']);
		$this->db->update('master_pelatihan',$data);
	}

	//Hapus data master pelatihan
	public function hapus_master_pelatihan($data)
	{
		$this->db->where('id_pelatihan',$data['id_pelatihan']);
		$this->db->delete('master_pelatihan',$data);
	}
}

/* End of file Master_model.php */
/* Location: ./application/models/Master_model.php */