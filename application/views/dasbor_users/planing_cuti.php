<?php 
  if($this->session->flashdata('notifval')){
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('notifval');
    echo '</div>';
    date_default_timezone_set("Asia/Jakarta");
  }
  if($this->session->flashdata('notiffail')){
    echo '<div class="alert alert-danger">';
    echo $this->session->flashdata('notiffail');
    echo '</div>';
    date_default_timezone_set("Asia/Jakarta");
  }
?>
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5>Manfaatkan planing cuti anda berdasarkan informasi di bawah ini, dengan demikian akan memudahkan anda dalam memutuskan pengambilan tanggal cuti</h5>
  </div>
</div>
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5>Daftar Cuti Rekan Kerja Dalam 1 Unit Kerja</h5>
  </div>
  <div class="widget-content padding">
    <?php 
    echo form_open(base_url('dasbor_admin/cuti/filter_tanggal'));
    ?>
    <!--<div id="search">
      <input type="text" class="datepicker span5 form-control" data-date-format="dd-mm-yyyy" placeholder="Tanggal Awal"/>
      <input type="text" class="datepicker span5 form-control" data-date-format="dd-mm-yyyy" placeholder="Tanggal Akhir"/>
      <button type="submit" name="filter_tanggal" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
    </div>-->
    <table class="table table-bordered data-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Rekan Kerja</th>
          <th>Tanggal Awal Cuti</th>
          <th>Tanggal Akhir Cuti</th>
          <th>Pengganti</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no=0;
        foreach ($cuti_unit_kerja as $cuti_unit_kerja) {
        $no++;
        ?>
        <tr>
          <td><?php echo $no; ?></td> 
          <td><?php echo $cuti_unit_kerja->nama  ?></td>  
          <td><?php echo tgl_indo(date("Y-m-d",strtotime($cuti_unit_kerja->awal)))  ?></td>  
          <td><?php echo tgl_indo(date("Y-m-d",strtotime($cuti_unit_kerja->akhir)))  ?></td>   
          <td><?php echo $cuti_unit_kerja->pengganti ?></td>   
          <td><?php echo $cuti_unit_kerja->status ?></td>   
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <?php echo form_close(); ?>
  </div>
</div>
<?php 
function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  
  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun
 
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>
<script type="text/javascript">
        //Mengambil nip dan nrk dan pangkat dari form pengajuan cuti halaman dasbor_admin/cuti/listing tambah
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
      container.append('<div class="form-group"><label class="col-md-3"></label><label class="col-md-1">Tanggal Libur</label><div class="col-md-3"><input type="text" id="list_hari_libur" name="list_hari_libur[]" autocomplete="off" required placeholder="Masukan Tanggal Libur" class="span5" value="0" readonly />');
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

    //date picker setting
    $("#ambil_bulan").datepicker( {
        format: "mm-yyyy",
        viewMode: "months", 
        minViewMode: "months"
    });
</script>
