<?php 
  if($this->session->flashdata('notival')){
    echo '<div class="alert alert-success alert-block">';
    echo $this->session->flashdata('notival');
    echo '</div>';
    date_default_timezone_set("Asia/Jakarta");
  }
  echo form_open(base_url('dasbor_users/pesan/kirim_pesan'));
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
  	<input type="hidden" name="id_data_pegawai" id="id_data_pegawai" class="span5 id_data_pegawai" placeholder="Id Pegawai" readonly/>
    <h3>Kirim Pesan </h3>
    <table class="table table-bordered">
      <tr>
        <td><label>Bulan Surat</label></td>
        <td>:</td>
        <td><input type="text" name="bulan_surat" id="bulan_surat" class="span5 bulan_surat" placeholder="Masukan Tanggal Pengajuan" value="<?php echo date('F Y') ?>" readonly/></td>
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
          <select name="dari" id="dari" class="span5 dari">
            <option value="<?php echo $dari->nama ?>"><?php echo $dari->nama ?></option>
          </select>
        </td>
      </tr>
      <tr>
        <td><label>Ke</label></td>
        <td>:</td>
		    <td>
          <select name="ke" id="ke" class="span5 ke" data-placeholder="Masukan Admin">
            <option></option>
            <?php
            foreach ($data_pegawai as $data_pegawai) {
            ?>
            <option value="<?php echo $data_pegawai->id_data_pegawai ?>"><?php echo $data_pegawai->nama ?></option>
            <?php
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td><label>Jenis Pesan</label></td>
        <td>:</td>
		    <td>
          <select name="jenis_pesan" class="span5">
			       <option value="Pembatalan Cuti">Pembatalan Cuti</option>
			       <option value="Butuh Informasi">Butuh Informasi</option>
			       <option value="Lainya">Lainya</option>
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
<script type="text/javascript">
  $('#ke').change(function(){
    var id_data_pegawai = $(this).val();
    $('#id_data_pegawai').val(id_data_pegawai);
  });
</script>