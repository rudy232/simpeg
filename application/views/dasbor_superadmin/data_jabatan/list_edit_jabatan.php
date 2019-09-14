<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<div class="span5">  
  <div class="widget-box">   
    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>jabatan-info</h5>
    </div> 
    <form class="form-horizontal" method="post" action="<?php echo base_url('dasbor_admin/dasbor/jabatan/').$data_riwayat_jabatan->id_riwayat_jabatan.'/'.$data_riwayat_jabatan->id_data_pegawai ?>" name="basic_validate" id="basic_validate" novalidate="novalidate">
      <div class="control-group">
        <label class="control-label">Status</label>
        <div class="controls">
          <input type="text" name="status" value="<?php echo $data_riwayat_jabatan->status ?>" id="required" readonly>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Penempatan</label>
        <div class="controls">
          <input type="text" name="penempatan" value="<?php echo $data_riwayat_jabatan->penempatan ?>" id="required" readonly>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Uraian</label>
        <div class="controls">
          <input type="text" name="uraian" value="<?php echo $data_riwayat_jabatan->uraian ?>" id="required">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Nomor SK</label>
        <div class="controls">
          <input type="text" name="nomor_sk" value="<?php echo $data_riwayat_jabatan->nomor_sk ?>" id="date">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Tanggal SK</label>
        <div class="controls">
          <input type="text" name="tanggal_sk" value="<?php echo $data_riwayat_jabatan->tanggal_sk ?>" id="required">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Tanggal Mulai</label>
        <div class="controls">
          <input type="text" name="tanggal_mulai" value="<?php echo $data_riwayat_jabatan->tanggal_mulai ?>" id="required">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Tanggal Selesai</label>
        <div class="controls">
          <input type="text" name="tanggal_selesai" value="<?php echo $data_riwayat_jabatan->tanggal_selesai ?>" id="required">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Lokasi</label>
        <div class="controls">
          <input type="text" name="lokasi" value="<?php echo $data_riwayat_jabatan->lokasi ?>" id="required">
        </div>
      </div>
      <div class="form-actions">
        <input type="submit" name="submit_form" value="SAVE" class="btn btn-success">
      </div>
    </form>
  </div>
</div>