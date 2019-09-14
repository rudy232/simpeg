<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<?php 
  if($this->session->flashdata('notifval')){
    echo '<div class="alert alert-success alert-block">';
    echo $this->session->flashdata('notifval');
    echo '</div>';
    date_default_timezone_set("Asia/Jakarta");
  }
  echo form_open(base_url('dasbor_superadmin/data_pegawai/edit/'.$this->uri->segment(4).'/'.$this->uri->segment(5)));
?>
<div class="row-fluid">
<div class="widget-box">
<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#tab1">Edit Data Pegawai</a></li>
  </ul>
</div>
<div class="widget-content tab-content">
  <div id="tab1" class="tab-pane active">
    <table class="table table-bordered">
      <input type="hidden" name="id_data_pegawai" id="id_data_pegawai" class="span5 id_data_pegawai" required readonly="readonly" value="<?php echo $data_pegawai->id_data_pegawai ?>" />
      <input type="hidden" name="id_atasan" id="id_atasan" class="span5 id_atasan" required readonly="readonly" value="<?php echo $data_pegawai->id_atasan ?>" />
      <tr>
        <td><label>Atasan Langsung</label></td>
        <td>:</td>
        <td>
          <select name="atasan_langsung" id="atasan_langsung" class="span5 atasan_langsung" data-placeholder="Pilih Atasan Langsung" required>
            <option value="<?php echo $data_pegawai->id_atasan ?>" id_atasan="<?php echo $data_pegawai->id_atasan ?>"><?php echo $data_pegawai->nama_atasan ?></option>
          <?php 
          $i =0;
          foreach ($list_nama_atasan as $list_nama_atasan) {
          $i++;
          ?>
            <option value="<?php echo $list_nama_atasan->nama_atasan ?>" id_atasan="<?php echo $list_nama_atasan->id_atasan ?>" ><?php echo $i.". ".$list_nama_atasan->nama_atasan ?></option>
          <?php
          }
          ?>
          </select>
        </td>
      </tr>
      <tr>
        <td><label>Nama</label></td>
        <td>:</td>
        <td><input type="text" name="nama" id="nama" class="span5 nama" placeholder="Masukan Nama Pegawai" value="<?php echo $data_pegawai->nama ?>" /></td>
      </tr>
      <tr>
        <td><label>Jenis Kelamin</label></td>
        <td>:</td>
        <td>
        <select name="gender" id="gender" class="span5 gender" data-placeholder="Jenis Kelamin">
          <option></option>
          <option value="L"<?php if($data_pegawai->jenis_kelamin=='L'){ echo "selected";} ?>>Laki-Laki</option>
          <option value="P"<?php if($data_pegawai->jenis_kelamin=='P'){ echo "selected";} ?>>Perempuan</option>
        </select>
        </td>
      </tr>
      <?php if($data_pegawai->nip_data_pegawai!=""){
      ?>
      <tr>
        <td><label>NIP</label></td>
        <td>:</td>
        <td><input type="text" name="nip_pegawai" id="nip_pegawai" class="span5 nip_pegawai" placeholder="NIP Pegawai" value="<?php echo $data_pegawai->nip_data_pegawai ?>" /><br/><span class="btn btn-danger">Lewati inputan NIP jika bukan PNS</span><div id="errmsg"></div></td>
      </tr>
      <tr>
        <td><label>NRK</label></td>
        <td>:</td>
        <td><input type="text" name="nrk_pegawai" id="nrk_pegawai" class="span5 nrk_pegawai" placeholder="NRK Pegawai" value="<?php echo $data_pegawai->nrk ?>" /><br/><span class="btn btn-danger">Lewati inputan NRK jika bukan PNS</span><div id="errmsgnrk"></div></td>
      </tr>
      <tr>
        <td><label>Golongan</label></td>
        <td>:</td>
        <td>
          <select name="golongan_pegawai" id="golongan_pegawai" class="span5 golongan_pegawai" data-placeholder="Masukan Golongan Pegawai">
            <option value="<?php echo $data_pegawai->golongan_ruang ?>"><?php echo $data_pegawai->golongan_ruang ?></option>
            <?php 
              foreach ($golongan as $golongan) {
            ?>
              <option value="<?php echo $golongan->golongan ?>"><?php echo $golongan->golongan ?></option>
            <?php
              }
            ?>
          </select><br/><br/><span class="btn btn-danger">Lewati inputan golongan jika bukan PNS</span>
        </td>
      </tr>
      <tr>
        <td><label>Pangkat</label></td>
        <td>:</td>
        <td>
          <select name="pangkat_pegawai" id="pangkat_pegawai" class="span5 pangkat_pegawai" data-placeholder="Masukan Pangkat Pegawai">
            <option value="<?php echo $data_pegawai->pangkat ?>"><?php echo $data_pegawai->pangkat ?></option>
            <?php 
              foreach ($pangkat as $pangkat) {
            ?>
              <option value="<?php echo $pangkat->pangkat ?>"><?php echo $pangkat->pangkat ?></option>
            <?php
              }
            ?>
          </select><br/><br/><span class="btn btn-danger">Lewati inputan pangkat jika bukan PNS</span>
        </td>
      </tr>
      <tr>
      <?php }else{ 
      ?>
      <tr style="display: none;">
        <td><label>NIP</label></td>
        <td>:</td>
        <td><input type="text" name="nip_pegawai" id="nip_pegawai" class="span5 nip_pegawai" placeholder="NIP Pegawai" value="<?php echo $data_pegawai->nip_data_pegawai ?>" /><br/><span class="btn btn-danger">Lewati inputan NIP jika bukan PNS</span><div id="errmsg"></div></td>
      </tr>
      <tr style="display: none;">
        <td><label>NRK</label></td>
        <td>:</td>
        <td><input type="text" name="nrk_pegawai" id="nrk_pegawai" class="span5 nrk_pegawai" placeholder="NRK Pegawai" value="<?php echo $data_pegawai->nrk ?>" /><br/><span class="btn btn-danger">Lewati inputan NRK jika bukan PNS</span><div id="errmsgnrk"></div></td>
      </tr>
      <tr style="display: none;">
        <td><label>Golongan</label></td>
        <td>:</td>
        <td>
          <select name="golongan_pegawai" id="golongan_pegawai" class="span5 golongan_pegawai" data-placeholder="Masukan Golongan Pegawai">
            <option value="<?php echo $data_pegawai->golongan_ruang ?>"><?php echo $data_pegawai->golongan_ruang ?></option>
            <?php 
              foreach ($golongan as $golongan) {
            ?>
              <option value="<?php echo $golongan->golongan ?>"><?php echo $golongan->golongan ?></option>
            <?php
              }
            ?>
          </select><br/><br/><span class="btn btn-danger">Lewati inputan golongan jika bukan PNS</span>
        </td>
      </tr>
      <tr style="display: none;">
        <td><label>Pangkat</label></td>
        <td>:</td>
        <td>
          <select name="pangkat_pegawai" id="pangkat_pegawai" class="span5 pangkat_pegawai" data-placeholder="Masukan Pangkat Pegawai">
            <option value="<?php echo $data_pegawai->pangkat ?>"><?php echo $data_pegawai->pangkat ?></option>
            <?php 
              foreach ($pangkat as $pangkat) {
            ?>
              <option value="<?php echo $pangkat->pangkat ?>"><?php echo $pangkat->pangkat ?></option>
            <?php
              }
            ?>
          </select><br/><br/><span class="btn btn-danger">Lewati inputan pangkat jika bukan PNS</span>
        </td>
      </tr>
      <tr>
      <?php } ?>
      <tr>
        <td><label>Jabatan</label></td>
        <td>:</td>
        <td>
          <select name="jabatan" id="jabatan" class="span5 jabatan" data-placeholder="Masukan Jabatan" required>
            <option value="<?php echo $data_pegawai->jabatan ?>"><?php echo $data_pegawai->jabatan ?></option>
            <?php 
              foreach ($jabatan as $jabatan) {
            ?>
              <option value="<?php echo $jabatan->nama_jabatan ?>"><?php echo $jabatan->nama_jabatan ?></option>
            <?php
              }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td><label>No Pegawai / Username</label></td>
        <td>:</td>
        <td><input type="text" name="nopeg" id="nopeg" class="span5 nopeg" placeholder="Masukan Nomor Pegawai" value="<?php echo $data_pegawai->nopeg ?>"><div id="errmsgnopeg"></div></td>
      </tr>
      <tr>
        <td><label>Password</label></td>
        <td>:</td>
        <td><input type="password" name="password" id="password" class="span5 password" placeholder="Masukan password" value="<?php echo $data_pegawai->password ?>" /></td>
      </tr>
      <tr>
        <td><label>Level User</label></td>
        <td>:</td>
        <td>
          <select name="level_user" id="level_user" class="span5 level_user" data-placeholder="Masukan Level Akses User" required>
            <option></option>
            <option value="Superadmin"<?php if($data_pegawai->akses_level=="Superadmin"){echo "selected";} ?>>Super Admin</option>
            <option value="Admin"<?php if($data_pegawai->akses_level=="Admin"){echo "selected";} ?>>Admin</option>
            <option value="User"<?php if($data_pegawai->akses_level=="User"){echo "selected";} ?>>User</option>
          </select>
        </td>
      </tr>
      <tr>
        <td><label>Email</label></td>
        <td>:</td>
        <td><input type="text" name="email" id="email" class="span5 email" placeholder="Masukan Alamat Email" value="<?php echo $data_pegawai->email ?>"></td>
      </tr>
      <tr>
        <td><label>Unit Kerja</label></td>
        <td>:</td>
        <td>
          <select name="unit_kerja" id="unit_kerja" class="span5 unit_kerja" data-placeholder="Masukan Unit Kerja" required>
            <option value="<?php echo $data_pegawai->unit_kerja ?>"><?php echo $data_pegawai->unit_kerja ?></option>
            <?php 
              foreach ($unit_kerja as $unit_kerja) {
            ?>
              <option value="<?php echo $unit_kerja->nama_unit_kerja ?>"><?php echo $unit_kerja->nama_unit_kerja ?></option>
            <?php
              }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td><label>Tanggal Masuk Kerja</label></td>
        <td>:</td>
        <td><input type="text" name="tanggal_daftar" data-date="<?php echo date("d-m-Y") ?>" data-date-format="dd-mm-yyyy" class="datepicker span5" autocomplete="off" value="<?php echo $data_pegawai->tanggal_daftar ?>"></td>
      </tr>
      <tr>
        <td><label>Tahun Masa Kerja</label></td>
        <td>:</td>
        <td><input type="text" name="tahun_masa_kerja" id="tahun_masa_kerja" class="span5 tahun_masa_kerja" placeholder="Masukan Tahun Masa Kerja" value="<?php echo $data_pegawai->tahun_masa_kerja ?>" required /><br/><span class="btn btn-danger">Masukan angka 0 jika belum ada 1 tahun masa kerja</span><div id="errmsgtahun_masa_kerja"></div></td>
      </tr>
      <tr>
        <td><label>Bulan Masa Kerja</label></td>
        <td>:</td>
        <td><input type="text" name="bulan_masa_kerja" id="bulan_masa_kerja" class="span5 bulan_masa_kerja" placeholder="Masukan Bulan Masa Kerja" value="<?php echo $data_pegawai->bulan_masa_kerja ?>" /><br/><span class="btn btn-danger">Masukan angka 0 jika belum ada 1 tahun masa kerja</span><div id="errmsgbulan_masa_kerja"></div></td>
      </tr>
      <tr>
        <td><label>Tempat Lahir</label></td>
        <td>:</td>
        <td><input type="text" name="tempat_lhr" id="tempat_lhr" class="span5 tempat_lhr" placeholder="Masukan Tempat Lahir" value="<?php echo $data_pegawai->tempat_lhr ?>" required="required"/></td>
      </tr>
      <tr>
        <td><label>Tanggal Lahir</label></td>
        <td>:</td>
        <td><input type="text" name="tgl_lahir" data-date="<?php echo date("d-m-Y") ?>" data-date-format="dd-mm-yyyy" class="datepicker span5" autocomplete="off" value="<?php echo $data_pegawai->tgl_lahir ?>"></td>
      </tr>
      <tr>
        <td><label>Alamat</label></td>
        <td>:</td>
        <td><input type="text" name="alamat" id="alamat" class="span5 alamat" placeholder="Masukan Alamat Lengkap" value="<?php echo $data_pegawai->alamat ?>" required="required"/></td>
      </tr>
      <tr>
        <td><label>Nomor Rekening</label></td>
        <td>:</td>
        <td><input type="text" name="no_rekening" id="no_rekening" class="span5 no_rekening" placeholder="Masukan Nomor Rekening" value="<?php echo $data_pegawai->no_rekening ?>" /><br/><span class="btn btn-danger">Lewati inputan nomor rekening jika belum memiliki rekening</span><div id="errmsgnorekening"></div></td>
      </tr>
      <tr>
        <td><label>Nomor KTP</label></td>
        <td>:</td>
        <td><input type="text" name="no_ktp" id="no_ktp" class="span5 no_ktp" placeholder="Masukan Nomor KTP" value="<?php echo $data_pegawai->no_ktp ?>" /><br/><span class="btn btn-danger">Lewati inputan nomor ktp jika belum memiliki ktp</span><div id="errmsgnoktp"></div></td>
      </tr>
      <tr>
        <td><label>Nomor NPWP</label></td>
        <td>:</td>
        <td><input type="text" name="no_npwp" id="no_npwp" class="span5 no_npwp" placeholder="Masukan Nomor NPWP" value="<?php echo $data_pegawai->no_npwp ?>" /><br/><span class="btn btn-danger">Lewati inputan nomor npwp jika belum memiliki npwp</span><div id="errmsgnonpwp"></div></td>
      </tr>
      <tr>
        <td><label>Nomor HP</label></td>
        <td>:</td>
        <td><input type="text" name="no_hp" id="no_hp" class="span5 no_hp" placeholder="Masukan Nomor HP" value="<?php echo $data_pegawai->no_hp ?>" /><br/><span class="btn btn-danger">Lewati inputan nomor hp jika belum memiliki hp</span><div id="errmsgnohp"></div></td>
      </tr>
      <tr>
        <td><label>Jenis Tunjangan</label></td>
        <td>:</td>
        <td>
          <select name="jenis_tunjangan" id="jenis_tunjangan" class="span5 jenis_tunjangan" data-placeholder="Masukan Jenis Tunjangan">
            <option></option>
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
        </td>
      </tr>
      <tr>
        <td><label>Status Tunjangan</label></td>
        <td>:</td>
        <td><input type="text" name="status_tunjangan" id="status_tunjangan" class="span5 status_tunjangan" readonly value="<?php echo $data_pegawai->jenis_tunjangan ?>" required="required"></td>
      </tr>
      <tr>
        <td><label>Pendidikan Terakhir</label></td>
        <td>:</td>
        <td><input type="text" name="pendidikan_trkh" id="pendidikan_trkh" class="span5 pendidikan_trkh" readonly value="<?php echo $data_pegawai->pendidikan_trkh ?>" required="required"></td>
      </tr>
      <tr>
        <td><label>Gaji</label></td>
        <td>:</td>
        <td><input type="text" name="gaji" id="gaji" class="span5 gaji" readonly value="<?php echo $data_pegawai->gaji ?>" required="required"></td>
      </tr>
      <tr>
        <td><label>TKD</label></td>
        <td>:</td>
        <td><input type="text" name="tkd" id="tkd" class="span5 tkd"><br/><span class="btn btn-danger">Lewati inputan TKD jika belum bisa ditentukan</span><div id="errmsgtkd"></div></td>
      </tr>
    </table>
    <input type="submit" name="form_submit" class="btn btn-success" value="EDIT" style="float: right;">
  </div>
</div>
</div>
</div>
<?php echo form_close(); ?>
<!--end-Footer-part--> 
<script type="text/javascript">
  //data atasan
    $('#atasan_langsung').change(function(){
      var id_atasan = $(this).find(':selected').attr('id_atasan');
      $('#id_atasan').val(id_atasan);
    });

    //nomor pegawai input form tambah cuti numeric
    $("#nopeg").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsgnopeg").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });

    //input form tambah pegawai numeric
    $("#nip_pegawai").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsg").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });


    //input form tambah pegawai numeric
    $("#nrk_pegawai").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsgnrk").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });

    //input form tambah pegawai numeric
    $("#tahun_masa_kerja").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsgtahun_masa_kerja").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });

    //input form tambah pegawai numeric
    $("#bulan_masa_kerja").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsgbulan_masa_kerja").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });
    //input form tambah pegawai numeric
    $("#no_rekening").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsgnorekening").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });
    //input form tambah pegawai numeric
    $("#no_ktp").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsgnoktp").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });
    //input form tambah pegawai numeric
    $("#no_npwp").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsgnonpwp").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });
    //input form tambah pegawai numeric
    $("#no_hp").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsgnohp").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });
    //input form tambah pegawai numeric
    $("#gaji").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsggaji").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });
    //input form tambah pegawai numeric
    $("#tkd").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsgtkd").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });

    //Passing result data on change halaman tambah pegawai bawahan
    $('#jenis_tunjangan').change(function(){
      gaji=$(this).val();
      status_tunjangan=$(this).find(':selected').data('status');
      pendidikan_trkh=$(this).find(':selected').attr('data-pendidikan');
      $('#gaji').val(gaji);
      $('#status_tunjangan').val(status_tunjangan);
      $('#pendidikan_trkh').val(pendidikan_trkh);
    });
</script>