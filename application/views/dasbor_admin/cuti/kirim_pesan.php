<?php 
  if($this->session->flashdata('notifval')){
    echo '<div class="alert alert-success alert-block">';
    echo $this->session->flashdata('notifval');
    echo '</div>';
    date_default_timezone_set("Asia/Jakarta");
  }
  echo form_open(base_url('dasbor_admin/kirim_pesan/kirim_data/'.$data_cuti->id_cuti));
  if($data_cuti->nip==0){
    $nomor = $data_cuti->nopeg;
  }else{
    $nomor = $data_cuti->nrk;
  }
?>
<div class="row-fluid">
<div class="widget-box">
<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#tab1"><?php echo $title ?></a></li>
  </ul>
</div>
<div class="widget-content tab-content">
  <div id="tab1" class="tab-pane active">
    <input type="hidden" name="id_cuti" id="id_cuti" class="span5 id_cuti" placeholder="Masukan Tanggal Pengajuan" value="<?php echo $data_cuti->id_cuti ?>" readonly/>
  	<input type="hidden" name="id_data_pegawai" id="id_data_pegawai" class="span5 id_data_pegawai" placeholder="Masukan Id Pegawai" value="<?php echo $data_cuti->id_data_pegawai ?>" readonly/>
    <h3>Kirim Pesan Ke -> <?php echo $data_cuti->nama ?></h3>
    <table class="table table-bordered">
      <tr>
        <td><label>Bulan Surat</label></td>
        <td>:</td>
        <td><input type="text" name="bulan_surat" id="bulan_surat" class="span5 bulan_surat" placeholder="Masukan Tanggal Pengajuan" value="<?php echo $data_cuti->bulan_surat ?>" readonly/></td>
      </tr>
      <tr>
        <td><label>Judul</label></td>
        <td>:</td>
		<td><input type="text" name="judul" id="judul" class="span5 judul" placeholder="Masukan judul" /></td>
      </tr>
      <tr>
        <td><label>Dari</label></td>
        <td>:</td>
		    <td>
          <select name="dari" id="dari" class="span5 dari" data-placeholder="Pesan Dari ?">
            <option value="Atasan Langsung">Atasan Langsung</option>
            <option value="Pejabat Cuti">Pejabat Cuti</option>
            <option value="Admin">Admin</option>
          </select>
        </td>
      </tr>
      <tr>
        <td><label>Ke</label></td>
        <td>:</td>
		    <td><input type="text" name="ke" id="ke" class="span5 ke" placeholder="Masukan Admin" value="<?php echo $nomor ?>" readonly/></td>
      </tr>
      <tr>
        <td><label>Jenis Pesan</label></td>
        <td>:</td>
		    <td>
          <select name="jenis_pesan" class="span5">
			       <option value="Pengumuman">Pengumuman</option>
			       <option value="Permohonan Maaf">Permohonan Maaf</option>
			       <option value="Perintah">Perintah Atasan</option>
		      </select>
         </td>
      </tr>
      <tr>
      	<td><label>Isi Pesan</label></td>
      	<td>:</td>
      	<td><textarea name="isi_pesan" rows="6" class="span7"></textarea></td>
      </tr>
      <tr>
      	<td></td>
      	<td></td>
      	<td><input type="submit" name="submit" value="KIRIM ALASAN" class="btn btn-success"></textarea></td>
      </tr>
    </table>
 </div>
</div>
</div>
</div>
<?php echo form_close(); ?>