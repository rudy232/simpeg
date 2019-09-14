<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti_model extends CI_Model {
	
	//http://localhost/asimpeg/dasbor_admin/cuti/list (Menampilkan data cuti pegawai)
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('data_cuti');
		$this->db->order_by('awal','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_superadmin/cuti/list (Menampilkan data cuti pegawai)
	public function listing_all()
	{
		$this->db->select('*');
		$this->db->from('data_cuti');
		$this->db->order_by('id_cuti','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function filter_search()
	{
		$tahun=$_POST['tahun'];
		$status=$_POST['status'];
		$status_print = $_POST['status_print'];
		$unit_kerja = $_POST['unit_kerja'];

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

		if($status_print!=""){
			$and3="AND status_print='$status_print'";
		}else{
			$and3="";
		}

		if($unit_kerja!=""){
			$and4="AND unit_kerja='$unit_kerja'";
		}else{
			$and4="";
		}

		$q= $this->db->query("SELECT * FROM data_cuti WHERE nama!='' ".$and." ".$and2." ".$and3." ".$and4." ");
		return $q->result();	
	}

	public function filter_listing_all()
	{
		$tahun=$_POST['tahun'];
		$status=$_POST['status'];
		//$unit_kerja = $_POST['status_unit_kerja'];

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

		/*if($unit_kerja!=""){
			$and3="AND unit_kerja='$unit_kerja'";
		}else{
			$and3="";
		}*/

		$q= $this->db->query("SELECT * FROM data_cuti WHERE  nama!='' ".$and." ".$and2." ");
		return $q->result();	
	}

	public function filter_data_cuti()
	{
		$tahun=$_POST['tahun'];
		$status=$_POST['status'];
		$unit_kerja=$_POST['unit_kerja'];

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


		$q= $this->db->query("SELECT * FROM data_cuti WHERE nama!='' ".$and." ".$and2." ".$and3." ");
		return $q->result();	
	}

	public function print_by_id($id_cuti){
		$this->db->select('*');
		$this->db->from('data_cuti');
		$this->db->join('data_pegawai','data_cuti.id_data_pegawai=data_pegawai.id_data_pegawai','LEFT');
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
	/*public function get_id_pegawai($id_data_pegawai)
	{
		$this->db->select('*');
		$this->db->from('data_cuti');
		$this->db->where('id_data_pegawai',$id_data_pegawai);
		$this->db->order_by('id_cuti','DESC');
		$query = $this->db->get();
		return $query->result();
	}*/

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

	public function riwayat_cuti($id_data_pegawai)
	{
		$this->db->select('*');
		$this->db->from('data_cuti');
		$this->db->where('id_data_pegawai',$id_data_pegawai);
		$this->db->like('tahun',date('Y'));
		$this->db->order_by('id_cuti','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_admin/cuti/edit (update data cuti detail pegawai)
	public function update($data)
	{
		$this->db->where('id_cuti',$data['id_cuti']);
		$this->db->update('data_cuti',$data);
	}
	
	public function update_cuti($data_cuti)
	{
		$this->db->where('id_data_pegawai',$data_cuti['id_data_pegawai']);
		$this->db->update('data_cuti',$data_cuti);
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
	
	//listing_setting_cuti by id unit kerja
	public function setting_kuota_byid($id_kuota){
		$this->db->select('*');
		$this->db->from('data_kuota_cuti');
		$this->db->where('id_kuota',$id_kuota);
		$query = $this->db->get();
		return $query->row();
	}

	//listing_setting_cuti
	public function list_kuota_cuti(){
		$this->db->select('*');
		$this->db->from('data_kuota_cuti');
		$query = $this->db->get();
		return $query->result();
	}

	//listing_setting_surat_cuti
	public function listing_setting_surat_cuti(){
		$this->db->select('*');
		$this->db->from('data_surat_cuti');
		$query = $this->db->get();
		return $query->row();
	}

	public function tambah_set_kuota_cuti($data)
	{
		$this->db->insert('data_kuota_cuti',$data);
	}
	
	//update_setting_cuti
	public function editkuota_set_kuota_cuti($data){
		$this->db->where('id_kuota',$data['id_kuota']);
		$this->db->update('data_kuota_cuti',$data);
	}

	//update_setting_cuti
	public function update_setting_cuti($data){
		$this->db->where('nama_unit_kerja',$data['nama_unit_kerja']);
		$this->db->update('data_kuota_cuti',$data);
	}

	//update_setting_cuti
	public function update_setting_cuti_all($data){
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

	public function rentang_tanggal(){
		$this->db->select('*');
		$this->db->from('data_cuti');
		$this->db->order_by('awal','ASC');
		$query = $this->db->get();
		return $query->result();		
	}

}

/* End of file Cuti_model.php */
/* Location: ./application/models/Cuti_model.php */