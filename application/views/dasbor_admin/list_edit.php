<div class="span5">  
  <div class="widget-box">   
    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Personal-info</h5>
    </div> 
    <form class="form-horizontal" method="post" action="<?php echo base_url('dasbor_admin/data_non_pns/edit/').$data_pegawai->id_data_pegawai ?>" name="basic_validate" id="basic_validate" novalidate="novalidate">
      <div class="control-group">
        <label class="control-label">No Pegawai</label>
        <div class="controls">
          <input type="text" name="nip" value="<?php echo $data_pegawai->nopeg ?>" id="required">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Nama Pegawai</label>
        <div class="controls">
          <input type="text" name="nama" value="<?php echo $data_pegawai->nama ?>" id="required">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Tempat Lahir</label>
        <div class="controls">
          <input type="text" name="tempat_lhr" value="<?php echo $data_pegawai->tempat_lhr ?>" id="required">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Tanggal Lahir</label>
        <div class="controls">
          <input type="text" name="tgl_lahir" value="<?php echo $data_pegawai->tgl_lahir ?>" id="date">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Nomor KTP</label>
        <div class="controls">
          <input type="text" name="no_ktp" value="<?php echo $data_pegawai->no_ktp ?>" id="required">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Nomor NPWP</label>
        <div class="controls">
          <input type="text" name="no_npwp" value="<?php echo $data_pegawai->no_npwp ?>" id="required">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Nomor HP</label>
        <div class="controls">
          <input type="text" name="no_hp" value="<?php echo $data_pegawai->no_hp ?>" id="required">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">TKD</label>
        <div class="controls">
          <input type="text" name="tkd" value="<?php echo $data_pegawai->tkd ?>" id="required">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Nomor Rekening</label>
        <div class="controls">
          <input type="text" name="no_rekening" value="<?php echo $data_pegawai->no_rekening ?>" id="required">
        </div>
      </div>
    </div>
  </div>
<div class="span5 form-horizontal">  
  <div class="widget-box">   
    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Personal-info</h5>
    </div> 
      <div class="control-group">
        <label class="control-label">Jenis Kelamin</label>
        <div class="controls">
          <select name="jenis_kelamin" id="required" style="width: 220px;">
            <option value="Laki-Laki"<?php if($data_pegawai->jenis_kelamin=="Laki-Laki"){ echo "selected"; } ?>>Laki-Laki</option>
            <option value="Perempuan"<?php if($data_pegawai->jenis_kelamin=="Perempuan"){ echo "selected"; } ?>>Perempuan</option>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">TKD</label>
        <div class="controls">
          <input type="text" name="tkd" value="<?php echo $data_pegawai->tkd ?>" id="required">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Status Tunjangan</label>
        <div class="controls">
          <select name="jenis_tunjangan" id="jenis_tunjangan">
            <option>---> Pilih Data Status Tunjangan <---</option>
            <?php 
              foreach ($status_tunjangan as $status_tunjangan) {
                echo "<option value='".$status_tunjangan->sd."' data-status='".$status_tunjangan->status."' data-pendidikan='SD'> Masa Kerja ".$status_tunjangan->masa_kerja." Tahun ".$status_tunjangan->status." SD</option>";
                echo "<option value='".$status_tunjangan->smp."' data-status='".$status_tunjangan->status."' data-pendidikan='SMP'> Masa Kerja ".$status_tunjangan->masa_kerja." Tahun ".$status_tunjangan->status." SMP</option>";
                echo "<option value='".$status_tunjangan->slta_smk_smkf."' data-status='".$status_tunjangan->status."' data-pendidikan='SLTA'> Masa Kerja ".$status_tunjangan->masa_kerja." Tahun ".$status_tunjangan->status." SLTA</option>";
                echo "<option value='".$status_tunjangan->smk."' data-status='".$status_tunjangan->status."' data-pendidikan='SMK'> Masa Kerja ".$status_tunjangan->masa_kerja." Tahun ".$status_tunjangan->status." SMK</option>"; 
                echo "<option value='".$status_tunjangan->smkf."' data-status='".$status_tunjangan->status."' data-pendidikan='SMKF'> Masa Kerja ".$status_tunjangan->masa_kerja." Tahun ".$status_tunjangan->status." SMKF</option>";
                echo "<option value='".$status_tunjangan->d3_d4."' data-status='".$status_tunjangan->status."' data-pendidikan='D3'> Masa Kerja ".$status_tunjangan->masa_kerja." Tahun ".$status_tunjangan->status." D3</option>";
                echo "<option value='".$status_tunjangan->d4."' data-status='".$status_tunjangan->status."' data-pendidikan='D4'> Masa Kerja ".$status_tunjangan->masa_kerja." Tahun ".$status_tunjangan->status." D4</option>";
                echo "<option value='".$status_tunjangan->s1."' data-status='".$status_tunjangan->status."' data-pendidikan='S1'> Masa Kerja ".$status_tunjangan->masa_kerja." Tahun ".$status_tunjangan->status." S1</option>";
                echo "<option value='".$status_tunjangan->profesi."' data-status='".$status_tunjangan->status."' data-pendidikan='PROFESI'> Masa Kerja ".$status_tunjangan->masa_kerja." Tahun ".$status_tunjangan->status." PROFESI</option>";
                echo "<option value='".$status_tunjangan->s3."' data-status='".$status_tunjangan->status."' data-pendidikan='S3'> Masa Kerja ".$status_tunjangan->masa_kerja." Tahun ".$status_tunjangan->status." S3</option>";
              }
            ?>
          </select>
        </div>
      </div>
      <div class="control-group">
      <label class="control-label">Status</label>
      <div class="controls">
        <input type="text" name="status_tunjangan" id="status_tunjangan" placeholder="Masukan jenis_tunjangan" readonly="readonly" required="required" value="<?php echo $data_pegawai->jenis_tunjangan ?>">
      </div>
      </div>
      <div class="control-group">
      <label class="control-label">Gaji</label>
      <div class="controls">
        <input type="text" name="gaji" class="form-control" id="get" placeholder="Masukan Gaji" readonly="readonly" required="required" value="<?php echo $data_pegawai->gaji ?>">
      </div>
      </div>
      <div class="control-group">
      <label class="control-label">Pendidikan</label>
      <div class="controls">
        <input type="text" name="pendidikan_trkh" class="form-control" id="pendidikan" placeholder="Masukan Pendidikan" readonly="readonly" required="required" value="<?php echo $data_pegawai->pendidikan_trkh ?>">
      </div>
      </div>
      <div class="control-group">
        <label class="control-label">Alamat</label>
        <div class="controls">
          <textarea name="alamat" id="required"><?php echo $data_pegawai->alamat ?>"</textarea>
        </div>
      </div>
      <div class="form-actions">
        <input type="submit" name="submit_form" value="SAVE" class="btn btn-success">
      </div>
    </form>
  </div>
</div>