<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<?php 
  echo form_open(base_url('dasbor_superadmin/master_unit_kerja/tambah'));
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
    <table class="table table-bordered">
      <tr>
        <td><label>Nama Unit Kerja</label></td>
        <td>:</td>
        <td><input type="text" name="nama_unit_kerja" id="nama_unit_kerja" class="span5 nama_unit_kerja" placeholder="Masukan Nama Jabatan"/></td>
      </tr>
    </table>
    <input type="submit" name="form_submit" class="btn btn-success" value="TAMBAH" style="float: right;">
  </div>
</div>
</div>
</div>
<?php echo form_close(); ?>
<!--end-Footer-part--> 