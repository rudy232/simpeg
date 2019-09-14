<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model_user extends CI_Model 
{	
	 
	//http://localhost/asimpeg/dasbor_admin/dasbor (Menampilkan data pegawai)
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_admin/list (Menampilkan data pegawai)
	public function listing_nonpns()
	{
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$this->db->where('nip','');
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_admin/list_pns (Menampilkan data pegawai)
	public function listing_data_pns()
	{
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$this->db->where('nopeg','');
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_admin/list_dokter_spesialis (Menampilkan data pegawai)
	public function listing_data_spesialis()
	{
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$this->db->where('pendidikan_trkh','SPESIALIS');
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_admin/list_dokter_umum (Menampilkan data pegawai)
	public function listing_dokter_umum()
	{
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$this->db->where('jabatan','Dokter Umum');
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_admin/dasbor (Menampilkan data pegawai)
	public function listing_pegawai()
	{
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$this->db->join('master_atasan','master_atasan.id_atasan=data_pegawai.id_atasan');
		$this->db->where('id_data_pegawai',$this->session->userdata('id_user'));
		$query = $this->db->get();
		return $query->row();
	}

	//http://localhost/asimpeg/dasbor_users/detail_cuti
	public function listing_nama()
	{
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$this->db->where('unit_kerja',$this->session->userdata('unit_kerja'));
		$this->db->where('nama !=',$this->session->userdata('nama'));
		$query = $this->db->get();
		return $query->result();
	}

	//http://localhost/asimpeg/dasbor_users/detail_cuti
	public function listing_nama_atasan()
	{
		$this->db->select('*');
		$this->db->from('master_atasan');
		$this->db->where('id_atasan',$this->session->userdata('id_atasan'));
		$query = $this->db->get();
		return $query->row();
	}

	//http://localhost/asimpeg/dasbor_users/detail_cuti
	public function listing_nama_atasan_all()
	{
		$this->db->select('*');
		$this->db->from('master_atasan');
		$query = $this->db->get();
		return $query->result();
	}

//http://localhost/asimpeg/dasbor_users/detail_cuti
	public function listing_nama_jabatan_all()
	{
		$this->db->select('*');
		$this->db->from('master_jabatan');
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

	//http://localhost/asimpeg/dasbor_admin/dasbor/detail/ (Menampilkan data detail pegawai)
	public function listing_by()
	{
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$this->db->where('id_data_pegawai',$this->session->userdata('id_user'));
		$query = $this->db->get();
		return $query->row();
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


	//Edit data riwayat jabatan
	public function update_riwayat_jabatan($data)
	{
		$this->db->where('id_riwayat_jabatan',$data['id_riwayat_jabatan']);
		$this->db->update('data_jabatan',$data);
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
		$query = $this->db->get();
		return $query->result();
	}
	//http://localhost/asimpeg/dasbor_admin/dasbor/detail/ (Menampilkan data detail hukuman)
	public function listing_hukuman($id_data_pegawai)
	{
		$this->db->select('*');
		$this->db->from('data_hukuman');
		$this->db->join('data_pegawai','data_pegawai.id_data_pegawai=data_hukuman.id_data_pegawai');
		$this->db->join('master_hukuman','master_hukuman.id_hukuman=data_hukuman.id_master_hukuman');
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