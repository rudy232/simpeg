<?php 
if($this->simple_admin->cek_login());
?>
<form class="form-horizontal" method="post" action="<?php echo base_url('dasbor_users/data_pegawai/tambah') ?>" name="basic_validate" id="basic_validate">
<div class="row-fluid">
<div class="span6" style="float: left;">  
  <div class="widget-box">   
    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Info-Keluarga</h5>
    </div> 
      <div class="control-group">
        <label class="control-label">Nama Keluarga</label>
        <div class="controls">
          <input type="text" name="nama_anggota_keluarga" placeholder="Masukan Nama Keluarga" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Status</label>
        <div class="controls">
          <select name="status_keluarga" class="span5">
            <option value="Ayah">Ayah</option>
            <option value="Ibu">Ibu</option>
            <option value="Adik">Adik</option>
            <option value="Kakak">Kakak</option>
            <option value="Suami">Suami</option>
            <option value="Istri">Istri</option>
            <option value="Anak">Anak</option>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">No KTP</label>
        <div class="controls">
          <input type="text" name="no_ktp" placeholder="Masukan No KTP"  class="no_ktp">
          <div id="errmsg"></div>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">No KK</label>
        <div class="controls">
          <input type="text" name="no_kk" placeholder="Masukan No KK"  class="no_kk">
          <div id="errmsg2"></div>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Tanggal Lahir</label>
        <div class="controls">
          <input type="text" name="tanggal_lahir" data-date-format="yyyy-mm-dd" class="datepicker span5" placeholder="Masukan Tanggal Lahir" id="date">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Status Kawin</label>
        <div class="controls">
          <input type="text" name="status_kawin" placeholder="Masukan Status Kawin" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Pekerjaan</label>
        <div class="controls">
          <input type="text" name="pekerjaan" placeholder="Masukan Pekerjaan" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Uraian</label>
        <div class="controls">
          <textarea name="uraian"></textarea>
        </div>
      </div>
      <div class="form-actions">
        <input type="submit" name="submit_form" value="TAMBAH KELUARGA" class="btn btn-success">
      </div>
  </div>
  <!--<div class="widget-box">   
    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Info-Riwayat Jabatan</h5>
    </div> 
    <input type="hidden" name="id_data_pegawai" value="<?php echo $this->uri->segment(4) ?>">
      <div class="control-group">
        <label class="control-label">Nama Jabatan</label>
        <div class="controls">
          <select name="id_master_jabatan"  class="span5">
            <?php foreach ($riwayat_jabatan as $riwayat_jabatan) {
                echo "<option value='".$riwayat_jabatan->id_jabatan."'>".$riwayat_jabatan->nama_jabatan."</option>";
            } ?>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Unit Kerja</label>
        <div class="controls">
          <select name="id_unit_kerja"  class="span5">
            <?php foreach ($unit_kerja as $unit_kerja) {
                echo "<option value='".$unit_kerja->id_unit_kerja."'>".$unit_kerja->nama_unit_kerja."</option>";
            } ?>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Status</label>
        <div class="controls">
          <select name="status"  class="span5">
            <option value="Aktif">Aktif</option>
            <option value="Aktif Sementara">Aktif Sementara</option>
            <option value="Non Aktif">Non Aktif</option>
            <option value="Non Aktif Sementara">Non Aktif Sementara</option>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Penempatan</label>
        <div class="controls">
          <input type="text" name="penempatan" placeholder="Misal : Farmasi / IGD / Lab" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Uraian</label>
        <div class="controls">
          <input type="text" name="uraian" placeholder="Masukan Uraian (Optional)" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Nomor SK</label>
        <div class="controls">
          <input type="text" name="nomor_sk" placeholder="Masukan Nomor SK" id="date" class="nomor_sk">
          <div id="errmsg3"></div>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Tanggal SK</label>
        <div class="controls">
          <input type="text" name="tanggal_sk" placeholder="Masukan Tanggal SK"  data-date-format="yyyy-mm-dd" class="datepicker span5" autocomplete="off">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Tanggal Mulai</label>
        <div class="controls">
          <input type="text" name="tanggal_mulai" placeholder="Masukan Tanggal Mulai"  data-date-format="yyyy-mm-dd" class="datepicker span5" autocomplete="off">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Tanggal Selesai</label>
        <div class="controls">
          <input type="text" name="tanggal_selesai" placeholder="Masukan Tanggal Selesai"  data-date-format="yyyy-mm-dd" class="datepicker span5" autocomplete="off" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Lokasi</label>
        <div class="controls">
          <input type="text" name="lokasi" placeholder="Tempat Bekerja" value="RSUD Cilincing" >
        </div>
      </div>
      <div class="form-actions">
        <input type="submit" name="submit_form" value="TAMBAH JABATAN" class="btn btn-success">
      </div>
  </div>
  <div class="widget-box">   
    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Info-Penghargaan</h5>
    </div> 
    <input type="hidden" name="id_data_pegawai" value="<?php echo $this->uri->segment(4) ?>">
      <div class="control-group">
        <label class="control-label">Penghargaan</label>
        <div class="controls">
          <select name="id_master_penghargaan"  class="span5">
            <?php foreach ($riwayat_penghargaan as $riwayat_penghargaan) {
                echo "<option value='".$riwayat_penghargaan->id_penghargaan."'>".$riwayat_penghargaan->nama_penghargaan."</option>";
            } ?>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Tanggal Sk</label>
        <div class="controls">
          <input type="text" name="tanggal_sk_penghargaan" placeholder="Masukan Tanggal Selesai"  data-date-format="yyyy-mm-dd" class="datepicker span5" autocomplete="off" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Uraian</label>
        <div class="controls">
          <input type="text" name="uraian" placeholder="Masukan Uraian" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Nomor SK</label>
        <div class="controls">
          <input type="text" name="nomor_sk" placeholder="Masukan Tempat Sekolah" >
        </div>
      </div>
      <div class="form-actions">
        <input type="submit" name="submit_form" value="TAMBAH PENGHARGAAN" class="btn btn-success">
      </div>
    </div>
    <div class="widget-box">   
    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Info-MOU</h5>
    </div> 
    <input type="hidden" name="id_data_pegawai" value="<?php echo $this->uri->segment(4) ?>">
      <div class="control-group">
        <label class="control-label">Nomor MOU</label>
        <div class="controls">
          <input type="text" name="nomor_mou" placeholder="Masukan Nomor MOU" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Tanggal MOU</label>
        <div class="controls">
          <input type="text" name="tanggal_mou" placeholder="Masukan Tanggal MOU"  data-date-format="yyyy-mm-dd" class="datepicker span5" autocomplete="off" />
        </div>
      </div>
      <div class="form-actions">
        <input type="submit" name="submit_form" value="TAMBAH DATA MOU" class="btn btn-success">
      </div>
  </div>-->
</div>
<div class="span6" style="float:left;">  
  <div class="widget-box">   
    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Info-Pendidikan</h5>
    </div> 
    <input type="hidden" name="id_data_pegawai" value="<?php echo $this->uri->segment(4) ?>">
      <div class="control-group">
        <label class="control-label">Pendidikan</label>
        <div class="controls">
          <select name="id_master_pendidikan"  class="span5">
            <?php foreach ($riwayat_pendidikan as $riwayat_pendidikan) {
                echo "<option value='".$riwayat_pendidikan->id_pendidikan."'>".$riwayat_pendidikan->nama_pendidikan."</option>";
            } ?>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Sekolah</label>
        <div class="controls">
          <input type="text" name="sekolah" placeholder="Masukan Nama Sekolah" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Alamat Sekolah</label>
        <div class="controls">
          <input type="text" name="tempat_sekolah" placeholder="Masukan Alamat Sekolah" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Jurusan</label>
        <div class="controls">
          <input type="text" name="jurusan" placeholder="Masukan Jurusan" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Tekhik / Non Tekhik</label>
        <div class="controls">
          <input type="text" name="teknik_non_teknik" placeholder="Masukan Teknik Non Teknik" id="date">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Nomor STTB</label>
        <div class="controls">
          <input type="text" name="nomor_sttb" placeholder="Masukan Nomor STTB" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Tanggal STTB</label>
        <div class="controls">
          <input type="text" name="tanggal_sttb" placeholder="Masukan Tanggal STTB"  data-date-format="yyyy-mm-dd" class="datepicker span5" autocomplete="off">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Nomor STR</label>
        <div class="controls">
          <input type="text" name="nomor_str" placeholder="Masukan Nomor STR" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Tanggal Exp STR</label>
        <div class="controls">
          <input type="text" name="tanggal_exp_str" placeholder="Masukan Exp STR"  data-date-format="yyyy-mm-dd" class="datepicker span5" autocomplete="off">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Nomor SIP</label>
        <div class="controls">
          <input type="text" name="nomor_sip" placeholder="Masukan Nomor SIP" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Tanggal Exp SIP</label>
        <div class="controls">
          <input type="text" name="tanggal_exp_sip" placeholder="Masukan Exp SIP"  data-date-format="yyyy-mm-dd" class="datepicker span5" autocomplete="off">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Tanggal Lulus</label>
        <div class="controls">
          <input type="text" name="tanggal_lulus" placeholder="Masukan Tanggal Lulus"  data-date-format="yyyy-mm-dd" class="datepicker span5" autocomplete="off">
        </div>
      </div>
      <div class="form-actions">
        <input type="submit" name="submit_form" value="TAMBAH PENDIDIKAN" class="btn btn-success">
      </div>
  </div>
  <!--<div class="widget-box">   
    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Info-Pelatihan</h5>
    </div> 
    <input type="hidden" name="id_data_pegawai" value="<?php echo $this->uri->segment(4) ?>">
      <div class="control-group">
        <label class="control-label">Pelatihan</label>
        <div class="controls">
          <select name="id_master_pelatihan"  class="span5">
            <?php foreach ($riwayat_pelatihan as $riwayat_pelatihan) {
                echo "<option value='".$riwayat_pelatihan->id_pelatihan."'>".$riwayat_pelatihan->nama_pelatihan."</option>";
            } ?>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Penyelenggara</label>
        <div class="controls">
          <input type="text" name="penyelenggara" placeholder="Masukan Nama Penyelenggara" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Anggaran</label>
        <div class="controls">
          <select name="anggaran">
            <option value="SUBSIDI">SUBSIDI</option>
            <option value="BLUD">BLUD</option>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Biaya</label>
        <div class="controls">
          <input type="number" name="biaya" placeholder="Masukan Biaya Pelatihan" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Uraian</label>
        <div class="controls">
          <input type="text" name="uraian_pelatihan" placeholder="Masukan Uraian" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Lokasi</label>
        <div class="controls">
          <input type="text" name="lokasi" placeholder="Masukan Lokasi">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Tanggal Pelatihan</label>
        <div class="controls">
          <input type="text" name="tanggal_sertifikat" placeholder="Tanggal Pelatihan Mulai" data-date-format="yyyy-mm-dd" class="datepicker span5" autocomplete="off">
          <br/>
          <br/>
          <input type="text" name="tanggal_sertifikat2" placeholder="Tanggal Pelatihan Akhir" data-date-format="yyyy-mm-dd" class="datepicker span5" autocomplete="off">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Jam Mulai</label>
        <div class="controls">
          <input type="time" name="jam_mulai" placeholder="Masukan Jam Mulai" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Jam Selesai</label>
        <div class="controls">
          <input type="time" name="jam_selesai" placeholder="Masukan Tempat Sekolah" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Negara</label>
        <div class="controls">
          <input type="text" name="negara" placeholder="Masukan Negara" />
        </div>
      </div>
      <div class="form-actions">
        <input type="submit" name="submit_form" value="TAMBAH PELATIHAN" class="btn btn-success">
      </div>
  </div>
  <div class="widget-box">   
    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Info-Hukuman</h5>
    </div> 
    <input type="hidden" name="id_data_pegawai" value="<?php echo $this->uri->segment(4) ?>">
      <div class="control-group">
        <label class="control-label">Nama Hukuman</label>
        <div class="controls">
          <select name="id_master_hukuman" >
            <?php foreach ($riwayat_hukuman as $riwayat_hukuman) {
                echo "<option value='".$riwayat_hukuman->id_hukuman."'>".$riwayat_hukuman->nama_hukuman."</option>";
            } ?>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Uraian</label>
        <div class="controls">
          <input type="text" name="uraian" placeholder="Masukan Uraian" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Nomor SK</label>
        <div class="controls">
          <input type="text" name="nomor_sk" placeholder="Masukan Nomor SK" id="date" class="nomor_sk">
          <div id="errmsg3"></div>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Tanggal SK</label>
        <div class="controls">
          <input type="text" name="tanggal_sk_hukuman" placeholder="Masukan Tanggal SK"  data-date-format="yyyy-mm-dd" class="datepicker span5" autocomplete="off">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Tanggal Mulai</label>
        <div class="controls">
          <input type="text" name="tanggal_mulai" placeholder="Masukan Tanggal Mulai"  data-date-format="yyyy-mm-dd" class="datepicker span5" autocomplete="off">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Tanggal Selesai</label>
        <div class="controls">
          <input type="text" name="tanggal_selesai" placeholder="Masukan Tanggal Selesai"  data-date-format="yyyy-mm-dd" class="datepicker span5" autocomplete="off" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Masa Berlaku</label>
        <div class="controls">
          <input type="text" name="masa_berlaku" placeholder="Masukan Masa Berlaku Hukuman"   data-date-format="yyyy-mm-dd" class="datepicker span5" autocomplete="off">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Pejabat Yang Menetapkan</label>
        <div class="controls">
          <select name="pejabat_menetapkan" data-placeholder="Masukan Nama Pejabat Yang Menatapkan" class="span5" >
            <?php 
              foreach ($listing_nama_atasan as $listing_nama_atasan) {
                echo "<option value='".$listing_nama_atasan->nama_atasan."'>".$listing_nama_atasan->nama_atasan."</option>";
              }
            ?>
          </select>
        </div>
      </div>
      <div class="form-actions">
        <input type="submit" name="submit_form" value="TAMBAH HUKUMAN" class="btn btn-success">
      </div>-->
  </div>
</div>
</div>
</form>

<script type="text/javascript">

    //validasi numeric
    $(".no_ktp").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsg").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
    });

    //validasi KK
    $(".no_kk").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsg2").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
    });


</script>