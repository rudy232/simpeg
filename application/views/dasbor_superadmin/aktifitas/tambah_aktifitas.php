<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<?php 
  if($this->session->flashdata('sukses')){
    echo '<div class="alert alert-success alert-block">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
  }
  echo form_open(base_url('dasbor_superadmin/aktifitas/tambah_aktifitas'));
?>
<div class="row-fluid">
<div class="widget-box">
<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#tab1">Tambah Daftar Aktifitas Umum</a></li>
  </ul>
</div>
<div class="widget-content tab-content">
  <div id="tab1" class="tab-pane active">
    <table class="table table-bordered">
      <input type="hidden" name="id_atasan" id="id_atasan" class="span5 id_atasan" required readonly="readonly" />
      <tr>
        <td><label>Nama Jabatan</label></td>
        <td>:</td>
        <td>
          <select name="jabatan" id="jabatan" class="span5 jabatan" data-placeholder="Masukan Jabatan" required>
            <option></option>
            <?php 
              foreach ($jabatan as $jabatan) {
            ?>
              <option value="<?php echo $jabatan->nama_jabatan ?>"><?php echo $jabatan->nama_jabatan ?></option>
            <?php
              }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td><label>Nama Aktifitas</label></td>
        <td>:</td>
        <td><input type="text" name="nama_aktifitas" id="nama_aktifitas" class="span5 nama_aktifitas" placeholder="Masukan Nama Aktifitas"  required="required"/></td>
      </tr>
      <tr>
        <td><label>Satuan Kegiatan</label></td>
        <td>:</td>
        <td>
        	<select name="satuan_kegiatan" id="satuan_kegiatan" class="span5 satuan_kegiatan" data-placeholder="Masukan Satuan Kegiatan" required>
        		<option value="Kegiatan">Kegiatan</option>
				<option value="Laporan">Laporan</option>
				<option value="Dokumen">Dokumen</option>
				<option value="Data">Data</option>
				<option value="Pasien">Pasien</option>
        	</select>
        </td>
      </tr>
      <tr>
        <td><label>Waktu Efektif (Menit)</label></td>
        <td>:</td>
        <td><input type="text" name="waktu_efektif" id="waktu_efektif" class="span5 waktu_efektif" placeholder="Masukan Waktu Efektif (Menit)"/><br/>Satuan = Menit<div id="errmsgnoktp"></div></td>
      </tr>
      <tr>
        <td><label>Satuan Waktu Efektif</label></td>
        <td>:</td>
        <td>
        	<select name="satuan_waktu_efektif" id="satuan_waktu_efektif" class="span5 satuan_waktu_efektif" data-placeholder="Masukan Satuan Waktu Efektif" required>
        		<option value="hr">Harian</option>
				<option value="mg">Mingguan</option>
				<option value="bln">Bulanan</option>
				<option value="trw">Triwulan</option>
				<option value="smt">Smester</option>
				<option value="thn">Tahun</option>
        	</select>
       	</td>
      </tr>
      <tr>
      	<td><label>Deskripsi</label></td>
        <td>:</td>
      	<td>
      		<textarea name="deskripsi"></textarea>
      	</td>
      </tr>
    </table>
    <input type="submit" name="form_submit" class="btn btn-success" value="TAMBAH" style="float: right;">
  </div>
</div>
</div>
</div>
<?php echo form_close(); ?>
<!--end-Footer-part--> 
<script type="text/javascript">
    //input form tambah pegawai numeric
    $("#waktu_efektif").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsgnoktp").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
    });
</script>