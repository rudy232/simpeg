<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<div class="row-fluid">
<div class="widget-box">
<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5><?php  echo $title?></h5>
  </div>
  <div class="widget-content padding">
	<form action="<?php echo base_url();?>excel/upload/" method="post" enctype="multipart/form-data">
	  <div class="form-group">
	    <a class="btn btn-success" href="<?php echo base_url('dasbor_superadmin/data_pegawai/tambah_pegawai') ?>">TAMBAH DATA</a> ATAU <input class="form-control" type="file" name="file"/> <input type="submit" value="Upload Excel" class="btn btn-success" /> <a class="btn btn-success" href="<?php echo base_url('assets/upload_excel/download/Format Data Pegawai.xlsx') ?>">Download Format Table Excel</a>
	  </div>
	</form>
	</div>
</div>
</div>