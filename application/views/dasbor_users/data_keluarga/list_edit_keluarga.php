<div class="span5">  
  <div class="widget-box">   
    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Keluarga-info</h5>
    </div> 
    <form class="form-horizontal" method="post" action="<?php echo base_url('dasbor_users/dasbor/keluarga') ?>" name="basic_validate" id="basic_validate" novalidate="novalidate">
      <div class="control-group">
        <label class="control-label">Nama Keluarga</label>
        <div class="controls">
          <input type="text" name="nama_anggota_keluarga" value="<?php echo $data_keluarga_pegawai->nama_anggota_keluarga ?>" id="required">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">No KTP</label>
        <div class="controls">
          <input type="text" name="no_ktp" value="<?php echo $data_keluarga_pegawai->no_ktp ?>" id="required">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">No KK</label>
        <div class="controls">
          <input type="text" name="no_kk" value="<?php echo $data_keluarga_pegawai->no_kk ?>" id="required">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Tanggal Lahir</label>
        <div class="controls">
          <input type="text" name="tanggal_lahir" value="<?php echo $data_keluarga_pegawai->tanggal_lahir ?>" id="date">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Status Kawin</label>
        <div class="controls">
          <input type="text" name="status_kawin" value="<?php echo $data_keluarga_pegawai->status_kawin ?>" id="required">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Pekerjaan</label>
        <div class="controls">
          <input type="text" name="pekerjaan" value="<?php echo $data_keluarga_pegawai->pekerjaan ?>" id="required">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Uraian</label>
        <div class="controls">
          <textarea name="uraian">
            <?php echo $data_keluarga_pegawai->uraian ?>
          </textarea>
        </div>
      </div>
      <div class="form-actions">
        <input type="submit" name="submit_form" value="SAVE" class="btn btn-success">
      </div>
    </form>
  </div>
</div>