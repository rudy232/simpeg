<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<?php 
 
  if($this->session->flashdata('notifval')){
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('notifval');
    echo '</div>';

  }
  echo form_open(base_url('dasbor_superadmin/profile/prosess_edit'));
?>
<div class="row-fluid">
<div class="widget-box">
<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#tab1">Edit Data Profile Rumah Sakit</a></li>
  </ul>
</div>
<div class="widget-content tab-content">
  <div id="tab1" class="tab-pane active">
    <table class="table table-bordered">
      <tr>
        <td><label>Nama Rumah Sakit</label></td>
        <td>:</td>
        <td><input type="text" name="nama_rs" id="nama_rs" class="span5 nama_rs" placeholder="Masukan Nama RS" value="<?php echo $data_profile->nama_rs ?>" /></td>
      </tr>
      <tr>
        <td><label>Alamat Rumah Sakit</label></td>
        <td>:</td>
        <td>
          <textarea name="alamat_rs" id="nip" class="span5 alamat_rs" placeholder="Masukan Alamat Rumah Sakit"><?php echo strip_tags($data_profile->alamat_rs,'<br/>') ?></textarea>
        </td>
      </tr>
      <tr>
        <td><label>No Telpon</label></td>
        <td>:</td>
        <td><input type="text" name="no_telpon" id="no_telpon" class="span5 no_telpon" placeholder="Masukan Nomor Nomor Telpon" value="<?php echo $data_profile->no_telpon ?>" /><div id="errmsgno_telpon"></div></td>
      </tr>
      <tr>
        <td><label>Email</label></td>
        <td>:</td>
        <td><input type="text" name="email" id="email" class="span5 email" placeholder="Masukan Email" value="<?php echo $data_profile->email ?>" /></td>
      </tr>
      <tr>
        <td><label>Masa Tahun Berdiri</label></td>
        <td>:</td>
        <td><input type="text" data-date-format="dd-mm-yyyy" name="tanggal_berdiri" id="tanggal_berdiri" class="span5 tanggal_berdiri datepicker" placeholder="Masukan tanggal_berdiri" value="<?php echo date("d-m-Y",strtotime($data_profile->tanggal_berdiri)) ?>" /></td>
      </tr>
    </table>
    <input type="submit" name="form_submit" class="btn btn-success" value="SIMPAN" style="float: right;">
  </div>
</div>
</div>
</div>
<?php echo form_close(); ?>
<!--end-Footer-part--> 
<script type="text/javascript">

    //input form tambah cuti numeric
    $("#no_telpon").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsgno_telpon").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });
</script>