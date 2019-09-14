<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diklat_model extends CI_Model {

	public function laporan_diklat()
	{
		$this->db->select('*,data_pelatihan.id_data_pegawai as id_update_pegawai,data_pelatihan.id_data_pelatihan as id_update_pelatihan');
		$this->db->from('data_pelatihan');
		$this->db->join('data_pegawai','data_pelatihan.id_data_pegawai=data_pegawai.id_data_pegawai');
		$this->db->join('master_pelatihan','data_pelatihan.id_master_pelatihan=master_pelatihan.id_pelatihan','LEFT');
		$this->db->join('data_ckilist_diklat','data_pelatihan.id_data_pelatihan=data_ckilist_diklat.id_data_pelatihan','LEFT');
		$this->db->order_by('tanggal_sertifikat','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function dokumen_diklat($id_data_pegawai,$id_data_diklat)
	{
		$this->db->select('*');
		$this->db->from('data_pelatihan');
		$this->db->join('data_pegawai','data_pelatihan.id_data_pegawai=data_pegawai.id_data_pegawai');
		$this->db->where('data_pelatihan.id_data_pegawai',$id_data_pegawai);
		$this->db->where('data_pelatihan.id_data_diklat',$id_data_diklat);
		$query = $this->db->get();
		return $query->row();
	}

	public function print_dokumen_diklat($id_data_pegawai,$id_data_diklat)
	{
		$this->db->select('*');
		$this->db->from('data_pelatihan');
		$this->db->join('data_pegawai','data_pelatihan.id_data_pegawai=data_pegawai.id_data_pegawai');
		$this->db->where('data_pelatihan.id_data_pegawai',$id_data_pegawai);
		$this->db->where('data_pelatihan.id_data_diklat',$id_data_diklat);
		$this->db->where('data_pelatihan.id_data_diklat',$id_data_diklat);
		$query = $this->db->get();
		return $query->row();
	}

	public function data_pelatihan()
	{
		$this->db->select('DISTINCT(penyelenggara)');
		$this->db->from('data_pelatihan');
		$query = $this->db->get();
		return $query->result();
	}

	public function data_nama_pelatihan()
	{
		$this->db->select('*');
		$this->db->from('master_pelatihan');
		$query = $this->db->get();
		return $query->result();
	}	

	public function filter_search()
	{
		$tanggal_awal = $_POST['tanggal_awal'];
		$tanggal_akhir = $_POST['tanggal_akhir'];
		$penyelenggara=$_POST['penyelenggara'];
		$anggaran=$_POST['anggaran'];
		$nama_pelatihan = $_POST['nama_pelatihan'];

		if($penyelenggara!=""){
			$and="AND penyelenggara='$penyelenggara'";
		}else{
			$and="";
		}

		if($anggaran!=""){
			$and2="AND anggaran='$anggaran'";
		}else{
			$and2="";
		}

		if($tanggal_awal!=""){
			$and3 = "AND tanggal_sertifikat BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
		}else{
			$and3="";
		}

		if($nama_pelatihan!=""){
			$and4 = "AND id_master_pelatihan='$nama_pelatihan' ";
		}else{
			$and4="";
		}


		$q= $this->db->query("SELECT *,a.id_data_pegawai as id_update_pegawai,a.id_data_pelatihan as id_update_pelatihan FROM data_pelatihan a JOIN data_pegawai b ON a.id_data_pegawai=b.id_data_pegawai LEFT JOIN master_pelatihan c ON a.id_master_pelatihan=c.id_pelatihan LEFT JOIN data_ckilist_diklat d ON a.id_data_pelatihan=d.id_data_pelatihan WHERE a.id_data_pelatihan!='' ".$and." ".$and2." ".$and3." ".$and4." ");
		return $q->result();	
	}

	public function tambah_usulan_diklat($data)
	{
		$this->db->insert('data_diklat',$data);
	}

	public function usulan_diklat()
	{
		$this->db->select('*');
		$this->db->from('data_diklat');
		$query = $this->db->get();
		return $query->result();
	}

	public function ditinct_diklat()
	{
		$this->db->select('nama_diklat, COUNT(nama_diklat) as count_peserta,biaya_pelatihan,id_diklat');
		$this->db->from('data_diklat');
		$this->db->group_by('nama_diklat');
		$query = $this->db->get();
		return $query->result();
	}

	public function ditinct_diklat_user()
	{
		$this->db->select('*');
		$this->db->from('data_diklat');
		$this->db->join('data_pegawai','data_diklat.nama_peserta=data_pegawai.nama');
		$this->db->where('nama_peserta',$this->session->userdata('nama'));
		$query = $this->db->get();
		return $query->result();
	}

	public function upload_spj_diklat($data)
	{
		$this->db->insert('data_pelatihan',$data);
	}


	public function usulan_diklat_user()
	{
		$this->db->select('*');
		$this->db->from('data_diklat');
		$this->db->where('unit_kerja',$this->session->userdata('unit_kerja'));
		$query = $this->db->get();
		return $query->result();
	}

	public function usulan_penyelenggara()
	{
		$this->db->select('DISTINCT(nama_penyelenggara)');
		$this->db->from('data_diklat');
		$query = $this->db->get();
		return $query->result();
	}

	public function usulan_pelatihan()
	{
		$this->db->select('DISTINCT(nama_diklat)');
		$this->db->from('data_diklat');
		$query = $this->db->get();
		return $query->result();
	}

	public function filter_search_usulan_diklat()
	{
		$tanggal_awal 	= $_POST['tanggal_awal'];
		$tanggal_akhir 	= $_POST['tanggal_akhir'];
		$penyelenggara 	=$_POST['penyelenggara'];
		$nama_pelatihan = $_POST['nama_pelatihan'];
		$nama_atasan 	= $_POST['nama_atasan'];

		if($penyelenggara!=""){
			$and="AND nama_penyelenggara='$penyelenggara'";
		}else{
			$and="";
		}

		if($tanggal_awal!=""){
			$and2 = "AND tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
		}else{
			$and2="";
		}

		if($nama_pelatihan!=""){
			$and3 = "AND nama_diklat='$nama_pelatihan' ";
		}else{
			$and3="";
		}

		if($nama_atasan!=""){
			$and4 = "AND nama_atasan='$nama_atasan' ";
		}else{
			$and4 ="";
		}

		$q= $this->db->query("SELECT * FROM data_diklat WHERE id_diklat!='' ".$and." ".$and2." ".$and3." ".$and4." ");
		return $q->result();	
	}
}

/* End of file Diklat_model.php */
/* Location: ./application/models/Diklat_model.php */