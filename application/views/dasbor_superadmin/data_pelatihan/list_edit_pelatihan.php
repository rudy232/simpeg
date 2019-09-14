<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<div class="span5">  
  <div class="widget-box">   
    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Data Pelatihan -> <?php echo $data_riwayat_pelatihan->nama ?></h5>
    </div> 
    <form class="form-horizontal" method="post" action="<?php echo base_url('dasbor_superadmin/data_pegawai/pelatihan/').$data_riwayat_pelatihan->id_data_pelatihan.'/'.$data_riwayat_pelatihan->id_data_pegawai ?>" name="basic_validate" id="basic_validate" novalidate="novalidate">
      <div class="control-group">
        <label class="control-label">Penyelenggara</label>
        <div class="controls">
          <input type="text" name="penyelenggara" placeholder="Masukan Nama Penyelenggara" value="<?php echo $data_riwayat_pelatihan->penyelenggara ?>" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Biaya</label>
        <div class="controls">
          <input type="number" name="biaya" placeholder="Masukan Biaya Pelatihan" value="<?php echo $data_riwayat_pelatihan->biaya ?>" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Uraian</label>
        <div class="controls">
          <input type="text" name="uraian_pelatihan" placeholder="Masukan Uraian" value="<?php echo $data_riwayat_pelatihan->uraian ?>" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Lokasi</label>
        <div class="controls">
          <input type="text" name="lokasi" placeholder="Masukan Lokasi" value="<?php echo $data_riwayat_pelatihan->lokasi ?>" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Tanggal Sertifikat</label>
        <div class="controls">
          <input type="text" name="tanggal_sertifikat" placeholder="Masukan Tanggal Sertifikat" data-date-format="dd-mm-yyyy" class="datepicker" autocomplete="off" value="<?php echo $data_riwayat_pelatihan->tanggal_sertifikat ?>" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Jam Mulai</label>
        <div class="controls">
          <input type="time" name="jam_mulai" placeholder="Masukan Jam Mulai" value="<?php echo $data_riwayat_pelatihan->jam_mulai ?>" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Jam Selesai</label>
        <div class="controls">
          <input type="time" name="jam_selesai" placeholder="Masukan Tempat Sekolah" value="<?php echo $data_riwayat_pelatihan->jam_selesai ?>" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Negara</label>
        <div class="controls">
          <input type="text" name="negara" placeholder="Masukan Negara" value="<?php echo $data_riwayat_pelatihan->negara ?>" />
        </div>
      </div>
      <div class="form-actions">
        <input type="submit" name="submit_form" value="EDIT" class="btn btn-success">
      </div>
    </form>
  </div>
</div>
<div class="span5">  
  <div class="widget-box">   
    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Data Kelengkapan Diklat</h5>
    </div> 
    <form class="form-horizontal" method="post" action="<?php echo base_url('dasbor_superadmin/data_pegawai/pelatihan/').$data_riwayat_pelatihan->id_data_pelatihan.'/'.$data_riwayat_pelatihan->id_data_pegawai ?>" name="basic_validate" id="basic_validate" novalidate="novalidate">
      <input type="hidden" name="id_data_pelatihan" value="<?php echo $data_riwayat_pelatihan->id_data_pelatihan ?>" required />
      <input type="hidden" name="id_data_pegawai" value="<?php echo $data_riwayat_pelatihan->id_data_pegawai ?>" required />
      <div class="control-group">
        <label class="control-label">Undangan</label>
        <div class="controls">
          Sudah <input type="radio" name="undangan" value="Sudah" /> Belum <input type="radio" name="undangan" value="Belum" checked="checked" /> 
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Disposisi</label>
        <div class="controls">
          Sudah <input type="radio" name="disposisi" value="Sudah" /> Belum <input type="radio" name="disposisi" value="Belum" checked="checked" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><strong>Surat Tugas</strong></label>
        <div class="controls">
          Sudah <input type="radio" name="surat_tugas" value="Sudah" checked="checked" /> Belum <input type="radio" name="surat_tugas" value="Belum" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Dokumentasi Foto</label>
        <div class="controls">
          Sudah <input type="radio" name="dokumentasi_foto" value="Sudah" /> Belum <input type="radio" name="dokumentasi_foto" value="Belum" checked="checked" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><strong>Materi Pelatihan</strong></label>
        <div class="controls">
          Sudah <input type="radio" name="materi_pelatihan" value="Sudah" checked="checked" /> Belum <input type="radio" name="materi_pelatihan" value="Belum" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Notulensi</label>
        <div class="controls">
          Sudah <input type="radio" name="notulensi" value="Sudah" /> Belum <input type="radio" name="notulensi" value="Belum" checked="checked" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Laporan Hasil Diklat</label>
        <div class="controls">
          Sudah <input type="radio" name="laporan_hasil_diklat" value="Sudah" /> Belum <input type="radio" name="laporan_hasil_diklat" value="Belum" checked="checked" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><strong>Sertifikat</strong></label>
        <div class="controls">
          Sudah <input type="radio" name="sertifikat" value="Sudah" checked="checked" /> Belum <input type="radio" name="sertifikat" value="Belum" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><strong>Kwetansi</strong></label>
        <div class="controls">
          Sudah <input type="radio" name="kwetansi_materai" value="Sudah" checked="checked" /> Belum <input type="radio" name="kwetansi_materai" value="Belum" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><strong>Daftar Hadir</strong></label>
        <div class="controls">
          Sudah <input type="radio" name="daftar_hadir" value="Sudah" checked="checked" /> Belum <input type="radio" name="daftar_hadir" value="Belum" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Surat Pernyataan</label>
        <div class="controls">
          Sudah <input type="radio" name="surat_pernyataan" value="Sudah" /> Belum <input type="radio" name="surat_pernyataan" value="Belum" checked="checked" />
        </div>
      </div>
      <div class="form-actions">
        <?php 
          if($data_riwayat_data_checklist_diklat->surat_tugas=="Sudah" || $data_riwayat_data_checklist_diklat->undangan=="Sudah" || $data_riwayat_data_checklist_diklat->disposisi=="Sudah" || $data_riwayat_data_checklist_diklat->dokumentasi_foto=="Sudah" || $data_riwayat_data_checklist_diklat->materi_pelatihan=="Sudah" || $data_riwayat_data_checklist_diklat->notulensi=="Sudah" || $data_riwayat_data_checklist_diklat->laporan_hasil_diklat=="Sudah" || $data_riwayat_data_checklist_diklat->sertifikat=="Sudah" || $data_riwayat_data_checklist_diklat->kwetansi_materai=="Sudah" || $data_riwayat_data_checklist_diklat->daftar_hadir=="Sudah" || $data_riwayat_data_checklist_diklat->surat_pernyataan=="Sudah"){
          ?>
          <input type="submit" name="submit_form" value="UPDATECHECKLIST" class="btn btn-primary">
          <?php
          }else{
        ?>
          <input type="submit" name="submit_form" value="CHECKLIST" class="btn btn-success">
        <?php
          }
        ?>
      </div>
    </form>
  </div>
</div>