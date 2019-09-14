<?php 
  if($this->session->flashdata('notifval')){
    echo '<div class="alert alert-success alert-block">';
    echo $this->session->flashdata('notifval');
    echo '</div>';
    date_default_timezone_set("Asia/Jakarta");
  }

  if($this->session->flashdata('notiffail')){
    echo '<div class="alert alert-danger alert-block">';
    echo $this->session->flashdata('notiffail');
    echo '</div>';
    date_default_timezone_set("Asia/Jakarta");
  }
  echo form_open(base_url('dasbor_users/cuti/edit'));
?>
<div class="row-fluid">
<div class="widget-box">
<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#tab1">Data Edit Cuti</a></li>
  </ul>
  </div>
<div class="widget-content tab-content">
  <div id="tab1" class="tab-pane active">
    <table class="table table-bordered">
        <input type="hidden" name="id_cuti" id="id_cuti" class="span5 id_cuti" value="<?php echo $data_cuti->id_cuti ?>" />
        <input type="hidden" name="id_pengganti" id="id_pengganti" class="span5 id_pengganti" placeholder="id_pengganti" required="required" value="<?php echo $data_cuti->id_pengganti ?>">
        <input type="hidden" name="tanggal_pengajuan" id="tanggal_pengajuan" class="span5 tanggal_pengajuan" value="<?php echo $data_cuti->tanggal_pengajuan ?>" readonly/>
        <input type="hidden" name="bulan_surat" id="bulan_surat" class="span5 bulan_surat" value="<?php echo $data_cuti->bulan_surat ?>" readonly/>
      <tr>
        <td><label>Nama</label></td>
        <td>:</td>
        <td><input type="text" name="nama" id="nama" class="span5 nama" value="<?php echo $data_cuti->nama ?>" /></td>
      </tr>
      <tr>
        <td><label>Gender</label></td>
        <td>:</td>
        <td>
        <select name="gender" id="gender" class="span5 gender">
          <option value="l" <?php if($data_cuti->gender=="l"){ echo "selected"; } ?>>Laki-Laki</option>
          <option value="p" <?php if($data_cuti->gender=="p"){ echo "selected"; } ?>>Perempuan</option>
        </select>
        </td>
      </tr>
      <tr>
        <td><label>Panggilan</label></td>
        <td>:</td>
        <td>
        <select name="panggilan" id="panggilan" class="span5 panggilan">
          <option value="Sdra" <?php if($data_cuti->panggilan=="Sdra"){ echo "selected"; } ?>>Saudara</option>
          <option value="Sdri" <?php if($data_cuti->panggilan=="Sdri"){ echo "selected"; } ?>>Saudari</option>
        </select>
        </td>
      </tr>
      <?php 
        if($data_cuti->nip==""){
          echo "";
        }else{
      ?>
      <tr>
        <td><label>NIP</label></td>
        <td>:</td>
        <td><input type="text" name="nip" id="nip" class="span5 nip" value="<?php echo $data_cuti->nip ?>" /></td>
      </tr>
      <tr>
        <td><label>NRK</label></td>
        <td>:</td>
        <td><input type="text" name="nrk" id="nrk" class="span5 nrk" value="<?php echo $data_cuti->nrk ?>" /></td>
      </tr>
      <tr>
        <td><label>Pangkat</label></td>
        <td>:</td>
        <td><input type="text" name="pangkat" id="pangkat" class="span5 pangkat" value="<?php echo $data_cuti->pangkat ?>" /></td>
      </tr>
      <tr>
        <td><label>Golongan</label></td>
        <td>:</td>
        <td><input type="text" name="golongan" id="golongan" class="span5 golongan" value="<?php echo $data_cuti->golongan ?>" /></td>
      </tr>
      <tr>
        <td><label>Jabatan</label></td>
        <td>:</td>
        <td><input type="text" name="jabatan" id="jabatan" class="span5 jabatan" value="<?php echo $data_cuti->jabatan ?>" /></td>
      </tr>
      <?php
        }
      ?>
      <tr>
        <td><label>Unit Kerja</label></td>
        <td>:</td>
        <td><input type="text" name="unit_kerja" id="unit_kerja" class="span5 unit_kerja" readonly  required="required" value="<?php echo $data_cuti->unit_kerja ?>"></td>
      </tr>
      <tr>
        <td><label>Lama Cuti (Hari)</label></td>
        <td>:</td>
        <td>
          <select name="lama_angka" id="lama_angka" class="span5 lama_angka">
          <option value="<?php echo $data_cuti->lama_angka ?>"><?php echo $data_cuti->lama_angka ?> Hari</option>
          <?php
            for($x=1;$x<=12;$x++){
          ?>
            <option value="<?php echo $x ?>"><?php echo $x." Hari"; ?></option>
          <?php
            }
          ?>
          </select>
        </td>
      </tr>
      <tr>
        <td><label>Jumlah Hari Libur</label></td>
        <td>:</td>
        <td>
          <select name='hari_libur' id="hari_libur" class="span5" required="required" data-placeholder="Masukan Jumlah Hari Libur">
            <option value="<?php echo $data_cuti->jml_hari_libur ?>"><?php echo $data_cuti->jml_hari_libur ?></option>
          <?php 
            for($x=0; $x<=10; $x++){
              echo "<option value='".$x."'>".$x." Hari</option>";
            } 
          ?>
        </select>
        </td> 
      </tr>
      <tr>
        <td><label>Tanggal Hari Libur</label></td>
        <td>:</td>
        <td id="list_hari_libur">
        <?php 
        foreach ($list_hari_libur as $list_hari_libur) {
        ?>
        <input type="text" id="list_hari_libur" name="list_hari_libur[]" autocomplete="off" required placeholder="Masukan Tanggal Libur" class="span5" value="<?php echo $list_hari_libur->tanggal_libur ?>" readonly />
        <?php
        }
        ?>
        <div id="errmsghrlbr"></div>
        </td>
      </tr>
      <tr>
        <td><label>Awal Cuti</label></td>
        <td>:</td>
        <td><input type="text" name="awal" id="awal" class="datepicker span5 awal" data-date-format="dd-mm-yyyy" value="<?php echo date("d-m-Y",strtotime($data_cuti->awal)) ?>" /></td>
      </tr>
      <tr>
        <td><label>Lokasi</label></td>
        <td>:</td>
        <td><input type="text" name="lokasi" id="lokasi" class="span5 lokasi" value="<?php echo $data_cuti->lokasi ?>" /></td>
      </tr>
      <tr>
        <td><label>Nomor Hp</label></td>
        <td>:</td>
        <td><input type="text" name="nomor" id="nomor" class="span5 nomor" value="<?php echo $data_cuti->nomor ?>" required /><div id="errmsg"></div></td>
      </tr>
      <tr>
        <td><label>Pejabat Pengganti</label></td>
        <td>:</td>
        <td>
        <select name="pengganti" id="pengganti" class="span5 pengganti" data-placeholder="Pilih Pejabat Pengganti">
          <option value="<?php echo $data_cuti->pengganti ?>"><?php echo $data_cuti->pengganti ?></option>
        <?php
          foreach ($list_pegawai as $list_pegawai) {
        ?>
          <option value="<?php echo $list_pegawai->nama ?>" nip="<?php echo $list_pegawai->nip ?>" id_pengganti="<?php echo $list_pegawai->id_data_pegawai ?>" pangkat="<?php echo $list_pegawai->pangkat ?>"><?php echo $list_pegawai->nama ?></option>
        <?php
          }
        ?>
        </select>
        </td>
      </tr>
      <?php 
        if($data_cuti->nip==""){
          echo "";
        }else{
      ?>
      <tr>
        <td><label>NIP Pengganti</label></td>
        <td>:</td>
        <td><input type="text" name="nip_pengganti" id="nip_pengganti" class="span5 nip_pengganti" value="<?php echo $data_cuti->nip_pengganti ?>"/></td>
      </tr>
      <tr>
        <td><label>Pangkat Pengganti</label></td>
        <td>:</td>
        <td><input type="text" name="pangkat_pengganti" id="pangkat_pengganti" class="span5 pangkat_pengganti" value="<?php echo $data_cuti->pangkat_pengganti ?>"/></td>
      </tr>
      <?php
        }
      ?>
      <tr>
        <td><label>Atasan Langsung</label></td>
        <td>:</td>
        <td>
          <select name="atasan_langsung" id="atasan_langsung" class="span5 atasan_langsung" data-placeholder="Pilih Atasan Langsung">
            <option value="<?php echo $data_cuti->atasan_langsung ?>"><?php echo $data_cuti->atasan_langsung ?></option>
          <?php 
          $i =0;
          foreach ($list_nama_atasan as $list_nama_atasan) {
          $i++;
          ?>
            <option value="<?php echo $list_nama_atasan->nama_atasan ?>" nip="<?php echo $list_nama_atasan->nip ?>" ><?php echo $i.". ".$list_nama_atasan->nama_atasan ?></option>
          <?php
          }
          ?>
          </select>
        </td>
      </tr>
      <tr>
        <td><label>NIP Atasan</label></td>
        <td>:</td>
        <td><input type="text" name="nip_atasan" id="nip_atasan" class="span5 nip_atasan" value="<?php echo $data_cuti->nip_atasan ?>"/></td>
      </tr>
      <tr>
        <td><label>Sisa Cuti</label></td>
        <td>:</td>
        <td><input type="text" name="sisa_cuti" id="sisa_cuti" class="span5 sisa_cuti" value="<?php echo $data_cuti->sisa_cuti ?>" readonly /></td>
      </tr>
      <tr>
        <td><label>Total Cuti</label></td>
        <td>:</td>
        <td><input type="text" name="total_cuti" id="total_cuti" class="span5 total_cuti" value="<?php echo $data_cuti->total_cuti ?>" readonly /></td>
      </tr>
    </table>
    <input type="submit" name="form_submit" class="btn btn-success" value="SIMPAN" style="float: right;">
  </div>
</div>
</div>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
        //Mengambil nip dan nrk dan pangkat dari form pengajuan cuti halaman dasbor_superadmin/cuti/listing tambah
    $('#nama').change(function(){
      var id_pegawai = $(this).find(':selected').attr('id_pegawai');
      var nip=$(this).find(':selected').attr('nip');
      var nrk=$(this).find(':selected').attr('nrk');
      var pangkat=$(this).find(':selected').attr('pangkat');
      var jabatan=$(this).find(':selected').attr('jabatan');
      var golongan=$(this).find(':selected').attr('golongan');
      var unit_kerja=$(this).find(':selected').attr('unit_kerja');
      if(nip==""){
        $('#nip').attr('readonly','readonly').val("");
        $('#nrk').attr('readonly','readonly').val("");
        $('#pangkat').attr('readonly','readonly').val("");
        $('#jabatan').val(jabatan);
        $('#test').val(id_pegawai);
        $('#unit_kerja').attr('readonly','readonly').val(unit_kerja);
      }else{
        $('#nip').removeAttr('readonly').val(nip);
        $('#nrk').removeAttr('readonly').val(nrk);
        $('#pangkat').removeAttr('readonly').val(pangkat);
        $('#jabatan').val(jabatan);
        $('#test').val(id_pegawai);
        $('#golongan').val(golongan);
        $('#unit_kerja').attr('readonly','readonly').val(unit_kerja);
      }
    });

    $('#pengganti').change(function(){
      var nip     = $(this).find(':selected').attr('nip');
      var pangkat = $(this).find(':selected').attr('pangkat');
      var id_pengganti  = $(this).find(':selected').attr('id_pengganti');
      if(nip==""){
        $('#nip_pengganti').attr('readonly','readonly').val("");
        $('#pangkat_pengganti').attr('readonly','readonly').val("");
         $('#id_pengganti').val(id_pengganti);
      }else{
        $('#nip_pengganti').removeAttr('readonly').val(nip);
        $('#pangkat_pengganti').removeAttr('readonly').val(pangkat);
         $('#id_pengganti').val(id_pengganti);
      }
    });

    $('#atasan_langsung').change(function(){
      var nip     = $(this).find(':selected').attr('nip');
      $('#nip_atasan').val(nip);
    });

    //input form tambah cuti numeric
    $("#nomor").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsg").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });

    //input form tambah cuti numeric
    $("#nip_pengganti").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsgnippengganti").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });

    //input form tambah cuti numeric
    $("#nip").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsgnip").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });

    //input form tambah cuti numeric
    $("#nrk").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsgnrk").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });

    $('#gender').change(function(){
      var gender = $(this).find(':selected').val();
      if(gender=="l"){
        $('#panggilan').val("Sdra");
      }else{
        $('#panggilan').val("Sdri");
      }
    });

    $('#hari_libur').change(function(){
      var jml_hr_lbr = $('#hari_libur').find(':selected').val();
      var container = $('<div />');
      if(jml_hr_lbr==0){
        container.append('<div class="form-group"><label class="col-md-3"></label><label class="col-md-1">Tanggal Libur </label><div class="col-md-3"><input type="text" id="list_hari_libur" name="list_hari_libur[]" autocomplete="off" required placeholder="Masukan Tanggal Libur" class="span5" value="0" readonly />');
      }else{
        for(i=1; i<=jml_hr_lbr; i++){
          container.append('<div class="form-group"><label class="col-md-3"></label><label class="col-md-1">Tanggal Libur '+i+'</label><div class="col-md-3"><input type="text" id="list_hari_libur" name="list_hari_libur[]" autocomplete="off" required placeholder="Masukan Tanggal Libur" class="span5" />');
        }
      }
      $('#list_hari_libur').html(container);
    });

    //input form tambah cuti numeric
    $("#list_hari_libur").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsghrlbr").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });
</script>