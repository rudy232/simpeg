<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_log extends CI_Model {
 
    public function save_log($param)
    {
        $sql        = $this->db->insert_string('tabel_log',$param);
        $ex         = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }

    public function data_log()
    {
    	$this->db->select('*');
    	$this->db->from('tabel_log');
    	$this->db->join('data_pegawai','tabel_log.log_user=data_pegawai.nopeg','LEFT');
    	$this->db->order_by('log_time','DESC');
    	$query = $this->db->get();
    	return $query->result();
    }

     public function data_nama_user()
    {
    	$this->db->select('DISTINCT(log_user)');
    	$this->db->from('tabel_log');
    	$query = $this->db->get();
    	return $query->result();
    }

    public function filter_search()
	{
		$log_user = $_POST['log_user'];
		$log_tanggal = $_POST['log_tanggal'];

		if($log_user!=""){
			$and="AND log_user='$log_user'";
		}else{
			$and="";
		}

		if($log_tanggal!=""){
			$and2="AND log_time LIKE '%$log_tanggal%'";
		}else{
			$and2="";
		}


		$q= $this->db->query("SELECT * FROM tabel_log a JOIN data_pegawai b ON a.log_user=b.nopeg WHERE log_id!='' ".$and." ".$and2." ");
		return $q->result();	
	}
}