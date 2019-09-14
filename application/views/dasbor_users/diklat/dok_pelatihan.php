<?php 
  if($this->session->flashdata('notifval')){
    echo '<div class="alert alert-success alert-block">';
    echo $this->session->flashdata('gagal');
    echo '</div>';
    date_default_timezone_set("Asia/Jakarta");
  }
  echo form_open_multipart('dasbor_users/diklat/upload_spj_diklat');
?>
<div class="row-fluid">
<div class="widget-box">
<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#tab1">Upload Dokumen</a></li>
  </ul>
</div>
<div class="widget-content tab-content">
  <div id="tab1" class="tab-pane active">
    <table class="table table-bordered">
      <tr>
      	<td><label>Nama Diklat</label></td>
      	<td>:</td>
      	<td>
    		<select name="nama_diklat" id="nama_diklat" class="span5 nama_diklat" data-placeholder="Masukan Judul Pelatihan">
      			<option value="">Judul Pelatihan</option>
          		<?php 
          			foreach ($nama_diklat as $nama_diklat) {
          		?>
          			<option lokasi="<?php echo $nama_diklat->lokasi_pelatihan ?>" biaya="<?php echo $nama_diklat->biaya_pelatihan ?>" value="<?php echo $nama_diklat->id_diklat." - ".$nama_diklat->id_data_pegawai." - ".$nama_diklat->nama_penyelenggara." - ".$nama_diklat->nama_diklat ?>"><?php echo $nama_diklat->id_diklat." - ".$nama_diklat->id_data_pegawai." - ".$nama_diklat->nama_penyelenggara." - ".$nama_diklat->nama_diklat ?></option>
          		<?php
          			}
          		?>
    		</select>
      	</td>
      </tr>
      <tr>
      	<td><label>Biaya Pelatihan</label></td>
      	<td>:</td>
      	<td><input type="text" name="biaya_pelatihan" id="biaya_pelatihan" readonly="readonly"></td>
      </tr>
      <tr>
      	<td><label>Lokasi</label></td>
      	<td>:</td>
      	<td><input type="text" name="lokasi" id="lokasi" readonly="readonly"></td>
      </tr>
      <tr>
      	<td><label>Anggaran</label></td>
      	<td>:</td>
      	<td>
      		<select name="anggaran" id="anggaran" readonly="readonly">
      			<option value="BLUD">BLUD</option>	
      		</select>
      	</td>
      </tr>
      <tr>
        <td><label class="control-label">Tanggal Pelatihan</label></td>
        <td>:</td>
        <td>
          <input type="text" name="tanggal_pelatihan" placeholder="Tanggal Pelatihan Mulai" data-date-format="yyyy-mm-dd" class="datepicker span5">
          <br/>
          <br/>
          <input type="text" name="tanggal_pelatihan2" placeholder="Tanggal Pelatihan Akhir" data-date-format="yyyy-mm-dd" class="datepicker span5">
      	</td>
      </tr>
      <tr>
      	<td>Jam Mulai</td>
      	<td>:</td>
      	<td><input type="time" name="jam_mulai" placeholder="Masukan Jam Mulai" ></td>
      </tr>
      <tr>
      	<td>Jam Selesai</td>
      	<td>:</td>
      	<td><input type="time" name="jam_selesai" placeholder="Masukan Jam Selesai" ></td>
      </tr>
      <tr>
      	<td><label>Surat Tugas</label></td>
      	<td>:</td>
      	<td><input type="file" name="file_name1"></td>
      </tr>
      <tr>
      	<td><label>Sertifikat</label></td>
      	<td>:</td>
      	<td><input type="file" name="file_name2"></td>
      </tr>
      <tr>
      	<td><label>Kwetansi Bermaterai</label></td>
      	<td>:</td>
      	<td><input type="file" name="file_name3"></td>
      </tr>
      <tr>
      	<td><label>Materi</label></td>
      	<td>:</td>
      	<td><input type="file" name="file_name4"></td>
      </tr>
      <tr>
      	<td><label>Daftar Hadir</label></td>
      	<td>:</td>
      	<td><input type="file" name="file_name5"></td>
      </tr>
      <tr>
      	<td><label>Notulensi</label></td>
      	<td>:</td>
      	<td><input type="file" name="file_name6"></td>
      </tr>
      <tr>
      	<td><label>Uraian</label></td>
      	<td>:</td>
      	<td><textarea name="uraian"></textarea></td>
      </tr>
    </table>
    <input type="submit" name="upload" class="btn btn-success" value="KIRIM DATA">
  </div>
</div>
</div>
</div>
<div class="row-fluid">
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5><?php  echo $title?></h5>
  </div>
  <div class="widget-content nopadding">
    <table class="table table-bordered data-table">
      <thead>
        <tr>
          <th>Test</th>
        </tr>
      </thead>  
      <tbody>
        <tr>
        	<td>Test</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>
<?php echo form_close() ?>
<script type="text/javascript">
	$('#nama_diklat').change(function (){
		var biaya 	= $(this).find(':selected').attr('biaya');
		var lokasi 	= $(this).find(':selected').attr('lokasi');
		$('#biaya_pelatihan').val(biaya);
		$('#lokasi').val(lokasi);
	});
</script>