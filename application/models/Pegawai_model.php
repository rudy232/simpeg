<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model 
{	
	 
	//http://localhost/asimpeg/dasbor_superadmin/dasbor (Menampilkan data pegawai)
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$query = $this->db->get();
		return $query->result();
	}

	public function listing_perempuan()
	{
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$this->db->where('jenis_kelamin','P');
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_superadmin/list (Menampilkan data pegawai)
	public function listing_nonpns()
	{
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$this->db->where('nip','');
		$this->db->where('jabatan !=','security');
		$this->db->where('jabatan !=','cleaning service'); 
		$this->db->where('jabatan !=','Dokter Umum'); 
		$this->db->where('jabatan !=','Dokter Spesialis'); 
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_superadmin/list_pns (Menampilkan data pegawai)
	public function listing_data_pns()
	{
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$this->db->where('nip !=','');
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_superadmin/list_dokter_spesialis (Menampilkan data pegawai)
	public function listing_data_spesialis()
	{
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$this->db->where('jabatan','Dokter Spesialis');
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_superadmin/list_dokter_umum (Menampilkan data pegawai)
	public function listing_dokter_umum()
	{
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$this->db->where('jabatan','Dokter Umum');
		$this->db->where('nip','');
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_superadmin/list_security (Menampilkan data pegawai)
	public function listing_security()
	{
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$this->db->where('jabatan','security');
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_superadmin/list_cleaning_service (Menampilkan data pegawai)
	public function listing_cleaning_service()
	{
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$this->db->where('jabatan','cleaning service');
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_admin/dasbor (Menampilkan data pegawai)
	public function listing_pegawai($id_cuti)
	{
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$this->db->where('id_data_pegawai',$id_cuti);
		$query = $this->db->get();
		return $query->row();
	}

	//http://localhost/asimpeg/dasbor_superadmin/detail_cuti
	public function listing_nama_atasan_all()
	{
		$this->db->select('*');
		$this->db->from('master_atasan');
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_users/detail_cuti
	public function listing_pns()
	{
		$this->db->select('*');
		$this->db->from('master_atasan');
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_admin/master_jabatan (Menampilkan data master jabatan)
	public function atasan()
	{
		$this->db->select('*');
		$this->db->from('master_atasan');
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_admin/master_jabatan (Menampilkan data master jabatan)
	public function jabatan()
	{
		$this->db->select('*');
		$this->db->from('master_jabatan');
		$query = $this->db->get();
		return $query->result();
	}

	public function golongan()
	{
		$this->db->select('*');
		$this->db->from('master_golongan');
		$query = $this->db->get();
		return $query->result();
	}
	//http://localhost/asimpeg/dasbor_admin/master_unit_kerja (Menampilkan data master unit kerja)
	public function unit_kerja()
	{
		$this->db->select('*');
		$this->db->from('master_unit_kerja');
		$query = $this->db->get();
		return $query->result();
	}
	//http://localhost/asimpeg/dasbor_admin/master_pendidikan (Menampilkan data master pendidikan)
	public function pendidikan()
	{
		$this->db->select('*');
		$this->db->from('master_pendidikan');
		$query = $this->db->get();
		return $query->result();
	}
	// /http://localhost/asimpeg/dasbor_admin/master_penghargaan (Menampilkan data master penghargaan)
	public function penghargaan()
	{
		$this->db->select('*');
		$this->db->from('master_penghargaan');
		$query = $this->db->get();
		return $query->result();
	}
	//http://localhost/asimpeg/dasbor_admin/master_pelatihan (Menampilkan data master pelatihan)
	public function pelatihan()
	{
		$this->db->select('*');
		$this->db->from('master_pelatihan');
		$query = $this->db->get();
		return $query->result();
	}
	//http://localhost/asimpeg/dasbor_admin/master_hukuman (Menampilkan data master hukuman)
	public function hukuman()
	{
		$this->db->select('*');
		$this->db->from('master_hukuman');
		$query = $this->db->get();
		return $query->result();
	}
	//http://localhost/asimpeg/dasbor_admin/dasbor/detail/ (Menampilkan data detail pegawai)
	public function listing_by($id_data_pegawai)
	{
		$this->db->select('*,data_pegawai.nip as nip_data_pegawai,data_pegawai.nrk as nrk,data_pegawai.golongan_ruang as golongan,data_pegawai.pangkat as pangkat,data_pegawai.jabatan as jabatan');
		$this->db->from('data_pegawai');
		$this->db->join('master_atasan','data_pegawai.id_atasan=master_atasan.id_atasan');
		$this->db->where('id_data_pegawai',$id_data_pegawai);
		$query = $this->db->get();
		return $query->row();
	}

	//http://localhost/asimpeg/dasbor_admin/dasbor/tambah_pegawai/list (Menambahkan data pegawai)
	public function tambah_data_pegawai($data)
	{
		$this->db->insert('data_pegawai',$data);
	}

	//http://localhost/asimpeg/dasbor_admin/dasbor/keluarga/tambah_keluarga (Menambahkan data keluarga pegawai)
	public function tambah_keluarga_pegawai($data)
	{
		$this->db->insert('data_keluarga',$data);
	}

	//http://localhost/asimpeg/dasbor_admin/dasbor/tambah_data/tambah (Menambahkan data jabatan)
	public function tambah_riwayat_jabatan($data)
	{
		$this->db->insert('data_jabatan',$data);
	}

	//http://localhost/asimpeg/dasbor_admin/dasbor/tambah_data/tambah (Menambahkan data pendidikan)
	public function tambah_riwayat_pendidikan($data)
	{
		$this->db->insert('data_pendidikan',$data);
	}

	//http://localhost/asimpeg/dasbor_admin/dasbor/tambah_data/tambah (Menambahkan data pelatihan)
	public function tambah_riwayat_pelatihan($data)
	{
		$this->db->insert('data_pelatihan',$data);
	}

	//http://localhost/asimpeg/dasbor_admin/dasbor/tambah_data/tambah (Menambahkan data pelatihan)
	public function insert_data_ckilist_diklat($data2)
	{
		$this->db->insert('data_ckilist_diklat',$data2);
	}

	//http://localhost/asimpeg/dasbor_admin/dasbor/tambah_data/tambah (Menambahkan data pelatihan)
	public function tambah_riwayat_penghargaan($data)
	{
		$this->db->insert('data_penghargaan',$data);
	}

	//http://localhost/asimpeg/dasbor_admin/dasbor/tambah_data/tambah (Menambahkan data hukuman)
	public function tambah_riwayat_hukuman($data)
	{
		$this->db->insert('data_hukuman',$data);
	}
	
	//http://localhost/asimpeg/dasbor_admin/dasbor/tambah_data/tambah (Menambahkan data mou)
	public function tambah_riwayat_mou($data)
	{
		$this->db->insert('data_mou',$data);
	}

	//http://localhost/asimpeg/dasbor_admin/dasbor/keluarga/ (Menampilkan list data edit keluarga pegawai)
	public function listing_edit_keluarga($id_data_keluarga,$id_data_pegawai)
	{
		$this->db->select('*');
		$this->db->from('data_keluarga');
		$this->db->where('id_data_keluarga',$id_data_keluarga);
		$this->db->where('id_data_pegawai',$id_data_pegawai);
		$query = $this->db->get();
		return $query->row();
	}

	//http://localhost/asimpeg/dasbor_admin/dasbor/jabatan/ (Menampilkan list data edit riwayat jabatan pegawai)
	public function listing_edit_jabatan($id_riwayat_jabatan,$id_data_pegawai)
	{
		$this->db->select('*');
		$this->db->from('data_jabatan');
		$this->db->where('id_riwayat_jabatan',$id_riwayat_jabatan);
		$this->db->where('id_data_pegawai',$id_data_pegawai);
		$query = $this->db->get();
		return $query->row();
	}

	//http://localhost/asimpeg/dasbor_admin/dasbor/jabatan/ (Menampilkan list data jabatan pegawai)
	public function listing_edit_riwayat_jabatan($id_riwayat_jabatan,$id_data_pegawai)
	{
		$this->db->select('*');
		$this->db->from('data_jabatan');
		$this->db->where('id_riwayat_jabatan',$id_riwayat_jabatan);
		$this->db->where('id_data_pegawai',$id_data_pegawai);
		$query = $this->db->get();
		return $query->row();
	}


	//Edit data keluarga pegawai
	public function update_keluarga_pegawai($data)
	{
		$this->db->where('id_data_keluarga',$data['id_data_keluarga']);
		$this->db->update('data_keluarga',$data);
	}
	//update status aktif pegawai
	public function update_status($data)
	{
		$this->db->where('id_data_pegawai',$data['id_data_pegawai']);
		$this->db->update('data_pegawai',$data);
	}


	//Edit data riwayat jabatan
	public function update_riwayat_jabatan($data)
	{
		$this->db->where('id_riwayat_jabatan',$data['id_riwayat_jabatan']);
		$this->db->update('data_jabatan',$data);
	}

	//http://localhost/asimpeg/dasbor_admin/dasbor/jabatan/ (Menampilkan list data jabatan pegawai)
	public function listing_edit_data_pelatihan($id_data_pelatihan,$id_data_pegawai)
	{
		$this->db->select('*');
		$this->db->from('data_pelatihan');
		$this->db->join('data_pegawai','data_pelatihan.id_data_pegawai=data_pegawai.id_data_pegawai');
		$this->db->where('data_pelatihan.id_data_pelatihan',$id_data_pelatihan);
		$this->db->where('data_pelatihan.id_data_pegawai',$id_data_pegawai);
		$query = $this->db->get();
		return $query->row();
	}

	public function listing_edit_data_checklist_diklat($id_data_pelatihan,$id_data_pegawai)
	{
		$this->db->select('*');
		$this->db->from('data_ckilist_diklat');
		$this->db->where('id_data_pelatihan',$id_data_pelatihan);
		$query = $this->db->get();
		return $query->row();
	}

	//Edit data riwayat pelatihan
	public function update_data_pelatihan($data)
	{
		$this->db->where('id_data_pelatihan',$data['id_data_pelatihan']);
		$this->db->update('data_pelatihan',$data);
	}

	//Edit data riwayat pelatihan
	public function update_data_ckilist_diklat($data2)
	{
		$this->db->where('id_data_pelatihan',$data2['id_data_pelatihan']);
		$this->db->update('data_ckilist_diklat',$data2);
	}

	//http://localhost/asimpeg/dasbor_admin/dasbor/detail/ (Menampilkan data detail keluarga)
	public function listing_keluarga($id_data_pegawai)
	{
		$this->db->select('*');
		$this->db->from('data_keluarga');
		$this->db->join('data_pegawai','data_keluarga.id_data_pegawai=data_pegawai.id_data_pegawai');
		$this->db->where('data_keluarga.id_data_pegawai',$id_data_pegawai);
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_admin/dasbor/delete (hapus data data detail pegawai)
	public function delete($data){
		$this->db->where('id_data_pegawai',$data['id_data_pegawai']);
		$this->db->delete('data_pegawai',$data);
	}

	public function delete_keluarga($data){
		$this->db->where('id_data_keluarga',$data['id_data_keluarga']);
		$this->db->delete('data_keluarga',$data);
	}

	public function delete_jabatan($data){
		$this->db->where('id_riwayat_jabatan',$data['id_riwayat_jabatan']);
		$this->db->delete('data_jabatan',$data);
	}

	public function delete_pendidikan($data){
		$this->db->where('id_data_pendidikan',$data['id_data_pendidikan']);
		$this->db->delete('data_pendidikan',$data);
	}

	public function delete_pelatihan($data){
		$this->db->where('id_data_pelatihan',$data['id_data_pelatihan']);
		$this->db->delete('data_pelatihan',$data);
	}

	public function delete_ckilist_diklat($data){
		$this->db->where('id_data_pelatihan',$data['id_data_pelatihan']);
		$this->db->delete('data_ckilist_diklat',$data);
	}

	public function delete_penghargaan($data){
		$this->db->where('id_data_penghargaan',$data['id_data_penghargaan']);
		$this->db->delete('data_penghargaan',$data);
	}

	public function delete_hukuman($data){
		$this->db->where('id_hukuman',$data['id_hukuman']);
		$this->db->delete('data_hukuman',$data);
	}
	
	public function delete_mou($data){
		$this->db->where('id_mou',$data['id_mou']);
		$this->db->delete('data_mou',$data);
	}


	//http://localhost/asimpeg/dasbor_admin/dasbor/detail/ (Menampilkan data detail jabatan)
	public function listing_jabatan($id_data_pegawai)
	{
		$this->db->select('*');
		$this->db->from('data_jabatan');
		$this->db->join('data_pegawai','data_pegawai.id_data_pegawai=data_jabatan.id_data_pegawai');
		$this->db->join('master_jabatan','master_jabatan.id_jabatan=data_jabatan.id_master_jabatan');
		$this->db->join('master_unit_kerja','master_unit_kerja.id_unit_kerja=data_jabatan.id_unit_kerja');
		$this->db->where('data_pegawai.id_data_pegawai',$id_data_pegawai);
		$query = $this->db->get();
		return $query->result();
	}
	//http://localhost/asimpeg/dasbor_admin/dasbor/detail/ (Menampilkan data detail pendidikan)
	public function listing_pendidikan($id_data_pegawai)
	{
		$this->db->select('*');
		$this->db->from('data_pendidikan');
		$this->db->join('data_pegawai','data_pegawai.id_data_pegawai=data_pendidikan.id_data_pegawai');
		$this->db->join('master_pendidikan','master_pendidikan.id_pendidikan=data_pendidikan.id_master_pendidikan');
		$this->db->where('data_pegawai.id_data_pegawai',$id_data_pegawai);
		$query = $this->db->get();
		return $query->result();
	}
	//http://localhost/asimpeg/dasbor_admin/dasbor/detail/ (Menampilkan data detail pelatihan)
	public function listing_pelatihan($id_data_pegawai)
	{
		$this->db->select('*');
		$this->db->from('data_pelatihan');
		$this->db->join('data_pegawai','data_pegawai.id_data_pegawai=data_pelatihan.id_data_pegawai');
		$this->db->join('master_pelatihan','master_pelatihan.id_pelatihan=data_pelatihan.id_master_pelatihan');
		$this->db->where('data_pegawai.id_data_pegawai',$id_data_pegawai);
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_admin/dasbor/detail/ (Menampilkan data detail pelatihan)
	public function listing_checlist_diklat($id_data_pegawai)
	{
		$this->db->select('*');
		$this->db->from('data_ckilist_diklat');
		$this->db->join('data_pegawai','data_pegawai.id_data_pegawai=data_ckilist_diklat.id_data_pegawai');
		$this->db->join('data_pelatihan','data_ckilist_diklat.id_data_pelatihan=data_pelatihan.id_data_pelatihan');
		$this->db->join('master_pelatihan','data_pelatihan.id_master_pelatihan=master_pelatihan.id_pelatihan');
		$this->db->where('data_ckilist_diklat.id_data_pegawai',$id_data_pegawai);
		$query = $this->db->get();
		return $query->result();
	}
	//http://localhost/asimpeg/dasbor_admin/dasbor/detail/ (Menampilkan data detail penghargaan)
	public function listing_penghargaan($id_data_pegawai)
	{
		$this->db->select('*');
		$this->db->from('data_penghargaan');
		$this->db->join('data_pegawai','data_pegawai.id_data_pegawai=data_penghargaan.id_data_pegawai');
		$this->db->join('master_penghargaan','master_penghargaan.id_penghargaan=data_penghargaan.id_master_penghargaan');
		$this->db->where('data_pegawai.id_data_pegawai',$id_data_pegawai);
		$query = $this->db->get();
		return $query->result();
	}
	//http://localhost/asimpeg/dasbor_admin/dasbor/detail/ (Menampilkan data detail hukuman)
	public function listing_hukuman($id_data_pegawai)
	{
		$this->db->select('*');
		$this->db->from('data_hukuman');
		$this->db->join('data_pegawai','data_pegawai.id_data_pegawai=data_hukuman.id_data_pegawai');
		$this->db->join('master_hukuman','master_hukuman.id_master_hukuman=data_hukuman.id_master_hukuman');
		$this->db->where('data_pegawai.id_data_pegawai',$id_data_pegawai);
		$query = $this->db->get();
		return $query->result();
	}
	//http://localhost/asimpeg/dasbor_admin/dasbor/detail/ (Menampilkan data detail mou)
	public function listing_mou($id_data_pegawai)
	{
		$this->db->select('*');
		$this->db->from('data_mou');
		$this->db->join('data_pegawai','data_pegawai.id_data_pegawai=data_mou.id_data_pegawai');
		$this->db->where('data_pegawai.id_data_pegawai',$id_data_pegawai);
		$query = $this->db->get();
		return $query->result();
	}
	//Edit data pegawai
	public function update($data)
	{
		$this->db->where('id_data_pegawai',$data['id_data_pegawai']);
		$this->db->update('data_pegawai',$data);
	}
	//Menampilkan data option gajih berdasarkan tingkat pendidikan dan status pada halaman edit pegawai
	public function status_tunjangan()
	{
		$this->db->select('*');
		$this->db->from('status_tunjangan');
		$query = $this->db->get();
		return $query->result();
	}	

	//Listing : display data di sortir berdasarkan id
	public function detail($id_user){
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$this->db->where('id_data_pegawai',$id_user);
		$this->db->order_by('id_data_pegawai','DESC');
		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file Pegawai_model.php */
/* Location: ./application/models/Pegawai_model.php */