<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<?php 
echo form_open(base_url('dasbor_superadmin/cuti/tambah_list_set_kuota_cuti'));
?>
<div class="row-fluid">
<div class="widget-box">
<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#tab1">Tentukan / Kunci Jumlah Maksimal Kuota Cuti</a></li>
  </ul>
</div>
<div class="widget-content tab-content">
  <div id="tab1" class="tab-pane active">
     <input type="hidden" name="panggilan" id="panggilan" class="span5 panggilan" placeholder="Panggilan" required="required">
    <input type="hidden" name="id_pengganti" id="id_pengganti" class="span5 id_pengganti" placeholder="id_pengganti" required="required">
    <table class="table table-bordered">
      <tr>
        <td><label>Nama Unit Kerja</label></td>
        <td>:</td>
        <td>
          <select name="nama_unit_kerja" id="nama_unit_kerja" class="span5 nama_unit_kerja" data-placeholder="Masukan Nama Unit Kerja">
            <option></option>
            <?php
            foreach ($unit_kerja as $unit_kerja) {
            ?>
            <option value="<?php echo $unit_kerja->nama_unit_kerja ?>"><?php echo $unit_kerja->nama_unit_kerja ?></option>
            <?php
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td><label>Maksimal Jumlah Kuota Pegawai Cuti / Hari</label></td>
        <td>:</td>
        <td><input type="text" name="kuota_cuti_seluruh_pegawai" id="kuota_cuti_seluruh_pegawai" class="span5 kuota_cuti_seluruh_pegawai" placeholder="Masukan Jumlah Maksimal Kuota Cuti Seluruh Pegawai"><div id="errmsg"></div></td>
      </tr>
      <tr>
        <td><label>Maksimal Pengajuan Cuti Kembali Setelah Berapa Bulan ?</label></td>
        <td>:</td>
        <td><input type="text" name="longkap_pengajuan_cuti" id="longkap_pengajuan_cuti" class="span5 longkap_pengajuan_cuti" placeholder="Masukan Maksimal Longkap Pengajuan Cuti"><div id="errmsg2"></div></td>
      </tr>
      <tr>
        <td><label>Jumlah Pegawai Yang Di Izinkan Cuti Dalam Satu Unit Kerja ?</label></td>
        <td>:</td>
        <td><input type="text" name="jumlah_pegawai_diijinkan_cuti" id="jumlah_pegawai_diijinkan_cuti" class="span5 jumlah_pegawai_diijinkan_cuti" placeholder="Masukan Jumlah Pegawai Yang di Izinkan cuti dalam 1 unit kerja"><div id="errmsg3"></div></td>
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
  //input form tambah cuti numeric
    $("#kuota_cuti_seluruh_pegawai").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsg").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });
    $("#longkap_pengajuan_cuti").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsg2").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });
    $("#jumlah_pegawai_diijinkan_cuti").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsg3").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });
</script>