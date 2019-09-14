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
  echo form_open(base_url('dasbor_superadmin/cuti/tambah_cuti_bersalin'));
?>
<div class="row-fluid">
<div class="widget-box">
<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#tab1">Ajukan Cuti</a></li>
  </ul>
</div>
<div class="widget-content tab-content">
  <div id="tab1" class="tab-pane active">
     <input type="hidden" name="panggilan" id="panggilan" class="span5 panggilan" placeholder="Panggilan" required="required">
    <input type="hidden" name="id_pengganti" id="id_pengganti" class="span5 id_pengganti" placeholder="id_pengganti" required="required">
    <table class="table table-bordered">
      <tr>
        <td><label>Bulan Surat</label></td>
        <td>:</td>
        <td><input type="text" name="bulan_surat" id="bulan_surat" class="span5 bulan_surat" placeholder="Masukan Tanggal Pengajuan" value="<?php echo date('F Y') ?>" readonly/></td>
      </tr>
      <tr>
        <td><label>Nama</label></td>
        <td>:</td>
        <td>
          <select name="nama" id="nama" class="span5 nama" placeholder="Masukan Nama" required="required">
            <option></option>
          <?php
          foreach ($all_pegawai as $all_pegawai) {
          ?>
            <option value="<?php echo $all_pegawai->nama ?>" nip="<?php echo $all_pegawai->nip ?>" nrk="<?php echo $all_pegawai->nrk ?>" pangkat="<?php echo $all_pegawai->pangkat ?>" jabatan="<?php echo $all_pegawai->jabatan ?> " id_pegawai="<?php echo $all_pegawai->id_data_pegawai ?> " unit_kerja="<?php echo $all_pegawai->unit_kerja ?>" golongan="<?php echo $all_pegawai->golongan_ruang ?>"><?php echo $all_pegawai->nama ?></option>
          <?php
          }
          ?>
          </select>
          <input type="hidden" name="id_data_pegawai" id="test" />
        </td>
      </tr>
      <tr>
        <td><label>NIP</label></td>
        <td>:</td>
        <td><input type="text" name="nip" id="nip" class="span5 nip" placeholder="Masukan NIP PNS"><div id="errmsgnip"></div></td>
      </tr>
      <tr>
        <td><label>NRK</label></td>
        <td>:</td>
        <td><input type="text" name="nrk" id="nrk" class="span5 nrk" placeholder="Masukan Nomor NRK" /><div id="errmsgnrk"></div></td>
      </tr>
      <tr>
        <td><label>Pangkat</label></td>
        <td>:</td>
        <td><input type="text" name="pangkat" id="pangkat" class="span5 pangkat" placeholder="Masukan Pangkat" /></td>
      </tr>
      <tr>
        <td><label>Golongan</label></td>
        <td>:</td>
        <td><input type="text" name="golongan" id="golongan" class="span5 golongan" placeholder="Masukan Golongan" /></td>
      </tr>
      <tr>
        <td><label>Jabatan</label></td>
        <td>:</td>
        <td><input type="text" name="jabatan" id="jabatan" class="span5 jabatan" placeholder="Masukan Jabatan" /></td>
      </tr>
      <tr>
        <td><label>Unit Kerja</label></td>
        <td>:</td>
        <td><input type="text" name="unit_kerja" id="unit_kerja" class="span5 unit_kerja" readonly  required="required"></td>
      </tr>
      <tr>
        <td><label>Lama Cuti (Bulan)</label></td>
        <td>:</td>
        <td>
          <select name="lama_angka" id="lama_angka" class="span5 lama_angka">
          <?php
            for($x=3;$x<=3;$x++){
          ?>
            <option value="<?php echo $x ?>"><?php echo $x." Bulan"; ?></option>
          <?php
            }
          ?>
          </select>
        </td>
      </tr>
      <tr>
        <td><label>Awal Cuti</label></td>
        <td>:</td>
        <td><input type="text" name="awal" data-date="<?php echo date("d-m-Y") ?>" data-date-format="dd-mm-yyyy" value="<?php echo date("d-m-Y") ?>" class="datepicker span5" autocomplete="off"></td>
      </tr>
      <tr>
        <td><label>Akhir Cuti</label></td>
        <td>:</td>
        <td><input type="text" name="akhir" data-date="<?php echo date("d-m-Y") ?>" data-date-format="dd-mm-yyyy" value="<?php echo date("d-m-Y") ?>" class="datepicker span5" autocomplete="off"></td>
      </tr>
      <tr>
        <td><label>Lokasi</label></td>
        <td>:</td>
        <td><input type="text" name="lokasi" id="lokasi" class="span5 lokasi" placeholder="Masukan Lokasi"  required="required"/></td>
      </tr>
      <tr>
        <td><label>Nomor Hp</label></td>
        <td>:</td>
        <td><input type="text" name="nomor" id="nomor" class="span5 nomor" placeholder="Masukan Nomor Handphone"  required="required"/><div id="errmsg"></div></td>
      </tr>
      <tr>
        <td><label>Pejabat Pengganti</label></td>
        <td>:</td>
        <td>
        <select name="pengganti" id="pengganti" class="span5 pengganti" data-placeholder="Pilih Pejabat Pengganti">
          <option></option>
          <option value="-">-</option>
        <?php
          foreach ($list_pegawai as $list_pegawai) {
        ?>
          <option value="<?php echo $list_pegawai->nama ?>" nip="<?php echo $list_pegawai->nip ?>" pangkat="<?php echo $list_pegawai->pangkat ?>" id_pengganti="<?php echo $list_pegawai->id_data_pegawai ?>"><?php echo $list_pegawai->nama ?></option>
        <?php
          }
        ?>
        </select>
        </td>
      </tr>
      <tr>
        <td><label>NIP Pengganti</label></td>
        <td>:</td>
        <td><input type="text" name="nip_pengganti" id="nip_pengganti" class="span5 nip_pengganti" placeholder="Masukan Nomor NIP Pengganti"/><div id="errmsgnippengganti"></div></td>
      </tr>
      <tr>
        <td><label>Pangkat Pengganti</label></td>
        <td>:</td>
        <td><input type="text" name="pangkat_pengganti" id="pangkat_pengganti" class="span5 pangkat_pengganti" placeholder="Masukan Pangkat Pengganti"/></td>
      </tr>
      <tr>
        <td><label>Atasan Langsung</label></td>
        <td>:</td>
        <td>
          <select name="atasan_langsung" id="atasan_langsung" class="span5 atasan_langsung" data-placeholder="Pilih Atasan Langsung">
            <option></option>
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
        <td><input type="text" name="nip_atasan" id="nip_atasan" class="span5 nip_atasan" placeholder="Masukan NIP Atasan" readonly="readonly" /></td>
      </tr>
    </table>
    <input type="submit" name="form_submit" class="btn btn-success" value="TAMBAH" style="float: right;">
  </div>
</div>
</div>
</div>
<?php echo form_close(); ?>
<!--end-Footer-part--> 
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
        $('#golongan').attr('readonly','readonly').val("");
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
      var nip           = $(this).find(':selected').attr('nip');
      var pangkat       = $(this).find(':selected').attr('pangkat');
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
</script>