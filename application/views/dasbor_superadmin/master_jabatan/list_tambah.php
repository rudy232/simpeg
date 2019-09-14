<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<?php 
  echo form_open(base_url('dasbor_superadmin/master_jabatan/tambah'));
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
     <input type="hidden" name="panggilan" id="panggilan" class="span5 panggilan" placeholder="Panggilan" required="required">
    <input type="hidden" name="id_pengganti" id="id_pengganti" class="span5 id_pengganti" placeholder="id_pengganti" required="required">
    <table class="table table-bordered">
      <tr>
        <td><label>Nama Jabatan</label></td>
        <td>:</td>
        <td><input type="text" name="nama_jabatan" id="nama_jabatan" class="span5 nama_jabatan" placeholder="Masukan Nama Atasan"/></td>
      </tr>
    </table>
    <input type="submit" name="form_submit" class="btn btn-success" value="TAMBAH" style="float: right;">
  </div>
</div>
</div>
</div>
<?php echo form_close(); ?>
<!--end-Footer-part--> 