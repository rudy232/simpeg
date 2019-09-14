<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti_model_admin extends CI_Model {
	
	//http://localhost/asimpeg/dasbor_admin/cuti/list (Menampilkan data cuti pegawai)
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('data_cuti');
		$this->db->where('atasan_langsung',$this->session->userdata('nama'));
		$this->db->order_by('id_cuti','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_admin/cuti/list (Menampilkan data cuti pegawai)
	public function listing_all()
	{
		$this->db->select('*');
		$this->db->from('data_cuti');
		$this->db->order_by('id_cuti','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function listing_sisa_cuti()
	{
		$this->db->select('*');
		$this->db->from('data_cuti');
		$this->db->where('nama',$this->session->userdata('nama'));
		$this->db->order_by('id_cuti','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function filter_data_cuti()
	{
		$tahun=$_POST['tahun'];
		$status=$_POST['status'];
		$unit_kerja = $_POST['status_unit_kerja'];

		if($tahun!=""){
			$and="AND tahun='$tahun'";
		}else{
			$and="";
		}

		if($status!=""){
			$and2="AND status='$status'";
		}else{
			$and2="";
		}

		if($unit_kerja!=""){
			$and3="AND unit_kerja='$unit_kerja'";
		}else{
			$and3="";
		}

		$q= $this->db->query("SELECT * FROM data_cuti WHERE  nama!='' AND atasan_langsung='".$this->session->userdata('nama')."' ".$and." ".$and2." ".$and3." ");
		return $q->result();	
	}

	public function filter_listing_all()
	{
		$tahun=$_POST['tahun'];
		$status=$_POST['status'];
		$unit_kerja = $_POST['status_unit_kerja'];

		if($tahun!=""){
			$and="AND tahun='$tahun'";
		}else{
			$and="";
		}

		if($status!=""){
			$and2="AND status='$status'";
		}else{
			$and2="";
		}

		if($unit_kerja!=""){
			$and3="AND unit_kerja='$unit_kerja'";
		}else{
			$and3="";
		}

		$q= $this->db->query("SELECT * FROM data_cuti WHERE  nama!='' ".$and." ".$and2." ".$and3." ");
		return $q->result();	
	}

	public function print_by_id($id_cuti){
		$this->db->select('*');
		$this->db->from('data_cuti');
		$this->db->where('id_cuti',$id_cuti);
		$query = $this->db->get();	
		return $query->row();	
	}

	public function laporan_cuti()
	{
		$this->db->select('*');
		$this->db->from('data_cuti');
		$this->db->where('tahun',date('m-Y'));
		$this->db->order_by('tanggal_pengajuan','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_user/cuti/detail (Menampilkan data history cuti pegawai)
	public function history_cuti()
	{
		$this->db->select('*');
		$this->db->from('data_cuti');
		$this->db->where('id_data_pegawai',$this->session->userdata('id_user'));
		$this->db->order_by('tanggal_pengajuan','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_admin/cuti/detail (Menampilkan data cuti detail pegawai)
	public function listing_detail($id_cuti)
	{
		$this->db->select('*');
		$this->db->from('data_cuti');
		$this->db->where('id_cuti',$id_cuti);
		$this->db->order_by('id_cuti','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function kirim_pesan($id_cuti)
	{
		$this->db->select('*');
		$this->db->from('data_cuti');
		$this->db->join('data_pegawai','data_pegawai.id_data_pegawai=data_cuti.id_data_pegawai');
		$this->db->where('id_cuti',$id_cuti);
		$this->db->order_by('id_cuti','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//http://localhost/asimpeg/dasbor_admin/cuti/detail (Menampilkan data cuti detail pegawai)
	public function get_id_pegawai($id_data_pegawai)
	{
		$this->db->select('*');
		$this->db->from('data_cuti');
		$this->db->where('id_data_pegawai',$id_data_pegawai);
		$this->db->order_by('id_cuti','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//http://localhost/asimpeg/dasbor_admin/cuti/detail (Menampilkan data cuti detail pegawai)
	public function hitory_cuti_byid($id_data_pegawai)
	{
		$this->db->select('*');
		$this->db->from('data_cuti');
		$this->db->where('id_data_pegawai',$id_data_pegawai);
		$this->db->order_by('id_data_pegawai','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_admin/cuti/edit (update data cuti detail pegawai)
	public function update($data)
	{
		$this->db->where('id_cuti',$data['id_cuti']);
		$this->db->update('data_cuti',$data);
	}

	//http://localhost/asimpeg/dasbor_admin/cuti/tambah (tambah data cuti detail pegawai)
	public function tambah($data)
	{
		$this->db->insert('data_cuti',$data);
	}

	//http://localhost/asimpeg/dasbor_admin/cuti/delete (hapus data cuti detail pegawai)
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

	public function update_status_cuti($data){
		$this->db->where('id_cuti',$data['id_cuti']);
		$this->db->update('data_cuti',$data);
	}

	//listing_setting_cuti
	public function listing_setting_cuti(){
		$this->db->select('*');
		$this->db->from('data_kuota_cuti');
		$query = $this->db->get();
		return $query->row();
	}

	//listing_setting_surat_cuti
	public function listing_setting_surat_cuti(){
		$this->db->select('*');
		$this->db->from('data_surat_cuti');
		$query = $this->db->get();
		return $query->row();
	}

	//update_setting_cuti
	public function update_setting_cuti($data){
		$this->db->update('data_kuota_cuti',$data);
	}

	//update_setting_surat_cuti
	public function update_setting_surat_cuti($data){
		$this->db->update('data_surat_cuti',$data);
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