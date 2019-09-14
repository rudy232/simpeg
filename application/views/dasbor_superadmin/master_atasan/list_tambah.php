<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<?php 
  echo form_open(base_url('dasbor_superadmin/master_atasan/tambah'));
?>
<div class="row-fluid">
<div class="widget-box">
<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#tab1">Tambah Data Master Atasan</a></li>
  </ul>
</div>
<div class="widget-content tab-content">
  <div id="tab1" class="tab-pane active">
     <input type="hidden" name="panggilan" id="panggilan" class="span5 panggilan" placeholder="Panggilan" required="required">
    <input type="hidden" name="id_pengganti" id="id_pengganti" class="span5 id_pengganti" placeholder="id_pengganti" required="required">
    <table class="table table-bordered">
      <tr>
        <td><label>Nama Atasan</label></td>
        <td>:</td>
        <td><input type="text" name="nama_atasan" id="nama_atasan" class="span5 nama_atasan" placeholder="Masukan Nama Atasan"/></td>
      </tr>
      <tr>
        <td><label>NIP</label></td>
        <td>:</td>
        <td><input type="text" name="nip" id="nip" class="span5 nip" placeholder="Masukan NIP PNS"><div id="errmsgnip"></div></td>
      </tr>
      <tr>
        <td><label>NRK</label></td>
        <td>:</td>
        <td><input type="text" name="nrk" id="nrk" class="span5 nrk" placeholder="Masukan Nomor NRK" /><div id="errmsgnrk"></div></td>
      </tr>
      <tr>
        <td><label>Pangkat</label></td>
        <td>:</td>
        <td><input type="text" name="pangkat" id="pangkat" class="span5 pangkat" placeholder="Masukan Pangkat" /></td>
      </tr>
      <tr>
        <td><label>Golongan</label></td>
        <td>:</td>
        <td><input type="text" name="golongan" id="golongan" class="span5 golongan" placeholder="Masukan Golongan" /></td>
      </tr>
      <tr>
        <td><label>Jabatan</label></td>
        <td>:</td>
        <td><input type="text" name="jabatan" id="jabatan" class="span5 jabatan" placeholder="Masukan Jabatan" /></td>
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
    $("#nomor").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsg").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });

    //input form tambah cuti numeric
    $("#nip").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsgnip").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });

    //input form tambah cuti numeric
    $("#nrk").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsgnrk").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });
</script>