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
<div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb"> <a href="#"> <i class="icon-time"><?php echo $data_cuti->sisa_cuti; ?></i>Sisa Cuti</a> </li>
        <li class="bg_lb"> <a href="#"> <i class="icon-gift"><?php echo $data_cuti->total_cuti; ?></i> Total Cuti</a> </li>
        <li class="bg_lg"> <a href="#"> <i class="icon-check"><?php echo $this->db->where('status','Setujui')->where('id_data_pegawai',$this->session->userdata('id_user'))->count_all_results("data_cuti"); ?></i>Cuti Yang disetujui</a> </li>
        <li class="bg_ly"> <a href="#"> <i class="icon-warning-sign"><?php echo $this->db->where('status','Menunggu')->where('id_data_pegawai',$this->session->userdata('id_user'))->count_all_results("data_cuti"); ?></i>Cuti Yang Menunggu</a> </li>
        <li class="bg_lr"> <a href="#"> <i class="icon-eject"><?php echo $this->db->where('status','Tolak')->where('id_data_pegawai',$this->session->userdata('id_user'))->count_all_results("data_cuti"); ?></i>Cuti Yang Ditolak</a> </li>
      </ul>
    </div>
</div>
<form action="<?php echo base_url('dasbor_users/cuti/tambah') ?>" name="form" id="form" method="POST">
<div class="row-fluid">
<div class="widget-box">
<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#tab1">Cuti Terbaru</a></li>
    <li><a data-toggle="tab" href="#tab2">Pengajuan</a></li>
    <li><a data-toggle="tab" href="#tab3">History</a></li>
  </ul>
</div>
<div class="widget-content tab-content">
  <div id="tab1" class="tab-pane active">
    <table class="table table-bordered">
      <tr>
        <td>Tanggal Pengajuan</td>
        <td>:</td>
        <td><?php if($data_cuti->tanggal_pengajuan==""){echo "Belum Terdapat Data Cuti";}else{echo tgl_indo(date("Y-m-d", strtotime($data_cuti->tanggal_pengajuan)));} ?></td>
      </tr>
      <tr>
        <td>Bulan Surat</td>
        <td>:</td>
        <td><?php if($data_cuti->bulan_surat==""){echo "Belum Terdapat Data Cuti";}else{echo tgl_indo(date('Y-m',strtotime($data_cuti->bulan_surat)));} ?></td>
      </tr>
      <tr>
        <td>Gender</td>
        <td>:</td>
        <td><?php if($data_cuti->gender=="l"){ echo "Laki-Laki"; }else{ echo "Perempuan"; } ?></td>
      </tr>
      <tr>
        <td>Panggilan</td>
        <td>:</td>
        <td><?php if($data_cuti->panggilan=="Sdra"){ echo "Saudara"; }else{ echo "Saudari"; } ?></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?php echo $data_cuti->nama ?></td>
      </tr>
      <tr>
        <td>NIP</td>
        <td>:</td>
        <td><?php echo $data_cuti->nip ?></td>
      </tr>
      <tr>
        <td>NRK</td>
        <td>:</td>
        <td><?php echo $data_cuti->nrk ?></td>
      </tr>
      <tr>
        <td>Pangkat</td>
        <td>:</td>
        <td><?php echo $data_cuti->pangkat ?></td>
      </tr>
      <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td><?php echo $data_cuti->jabatan ?></td>
      </tr>
      <tr>
        <td>Lama Cuti Angka</td>
        <td>:</td>
        <td><?php if($data_cuti->lama_angka==""){echo "Belum Terdapat Data Cuti";}else{echo $data_cuti->lama_angka." Hari";} ?></td>
      </tr>
      <tr>
        <td>Lama Cuti Huruf</td>
        <td>:</td>
        <td><?php if($data_cuti->lama_huruf==""){echo "Belum Terdapat Data Cuti";}else{echo $data_cuti->lama_huruf." Hari";}  ?></td>
      </tr>
      <tr>
        <td>Awal Cuti</td>
        <td>:</td>
        <td><?php if($data_cuti->awal==""){echo "Belum Terdapat Data Cuti";}else{echo tgl_indo(date('Y-m-d',strtotime($data_cuti->awal)));} ?></td>
      </tr>
      <tr>
        <td>Akhir Cuti</td>
        <td>:</td>
        <td><?php if($data_cuti->akhir==""){echo "Belum Terdapat Data Cuti";}else{echo tgl_indo(date('Y-m-d',strtotime($data_cuti->akhir)));} ?></td>
      </tr>
      <tr>
        <td>Lokasi</td>
        <td>:</td>
        <td><?php echo $data_cuti->lokasi ?></td>
      </tr>
      <tr>
        <td>Nomor Hp</td>
        <td>:</td>
        <td><?php echo $data_cuti->nomor ?></td>
      </tr>
      <tr>
        <td>Pejabat Pengganti</td>
        <td>:</td>
        <td><?php echo $data_cuti->pengganti ?></td>
      </tr>
      <tr>
        <td>NIP Pengganti</td>
        <td>:</td>
        <td><?php echo $data_cuti->nip_pengganti ?></td>
      </tr>
      <tr>
        <td>Pangkat Pengganti</td>
        <td>:</td>
        <td><?php echo $data_cuti->pangkat_pengganti ?></td>
      </tr>
      <tr>
        <td>Atasan Langsung</td>
        <td>:</td>
        <td><?php echo $data_cuti->atasan_langsung ?></td>
      </tr>
      <tr>
        <td>NIP Atasan</td>
        <td>:</td>
        <td><?php echo $data_cuti->nip_atasan ?></td>
      </tr>
    </table>
  </div>
  <div id="tab2" class="tab-pane">
    <input type="hidden" name="id_pengganti" id="id_pengganti" class="span5 id_pengganti" placeholder="id_pengganti" required="required">
    <table class="table table-bordered">
      <tr>
        <td><label>Bulan Surat</label></td>
        <td>:</td>
        <td><input type="text" name="bulan_surat" id="bulan_surat" class="span5 bulan_surat" value="<?php echo date("F Y"); ?>" readonly/></td>
      </tr>
      <tr>
        <td><label>Gender</label></td>
        <td>:</td>
        <td>
        <select name="gender" id="gender" class="span5 gender" style="width:100%;">
          <option value="l" <?php if($data_pegawai->jenis_kelamin=="L"){ echo "selected"; } ?>>Laki-Laki</option>
          <option value="p" <?php if($data_pegawai->jenis_kelamin=="P"){ echo "selected"; } ?>>Perempuan</option>
        </select>
        </td>
      </tr>
      <tr>
        <td><label>Panggilan</label></td>
        <td>:</td>
        <td>
        <select name="panggilan" id="panggilan" class="span5 panggilan" style="width:100%;">
          <option value="Sdra" <?php if($data_pegawai->jenis_kelamin=="L"){ echo "selected"; } ?>>Saudara</option>
          <option value="Sdri" <?php if($data_pegawai->jenis_kelamin=="P"){ echo "selected"; } ?>>Saudari</option>
        </select>
        </td>
      </tr>
      <tr>
        <td><label>Nama</label></td>
        <td>:</td>
        <td><input type="text" name="nama" id="nama" class="span5 nama" value="<?php echo $data_pegawai->nama ?>" readonly /></td>
      </tr>
      <tr>
        <td><label>NIP</label></td>
        <td>:</td>
        <td><input type="text" name="nip" id="nip" class="span5 nip" value="" /><br/><i class="btn btn-danger">Input Form Untuk PNS</i></td>
      </tr>
      <tr>
        <td><label>NRK</label></td>
        <td>:</td>
        <td><input type="text" name="nrk" id="nrk" class="span5 nrk" value="" /><br/><i class="btn btn-danger">Input Form Untuk PNS</i></td>
      </tr>
      <tr>
        <td><label>Pangkat</label></td>
        <td>:</td>
        <td><input type="text" name="pangkat" id="pangkat" class="span5 pangkat" value="" /><br/><i class="btn btn-danger">Input Form Untuk PNS</i></td>
      </tr>
      <tr>
        <td><label>Golongan</label></td>
        <td>:</td>
        <td><input type="text" name="golongan" id="golongan" class="span5 golongan" value="" /><br/><i class="btn btn-danger">Input Form Untuk PNS</i></td>
      </tr>
      <tr>
        <td><label>Jabatan</label></td>
        <td>:</td>
        <td>
          <select name="jabatan" id="jabatan" class="span5 jabatan" data-placeholder="Masukan Jabatan Anda" style="width:100%;">
            <option></option>
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
        <td><label>Unit Kerja RSUD Cilincing</label></td>
        <td>:</td>
        <td><input type="text" name="unit_kerja" id="unit_kerja" class="span5 unit_kerja" readonly  required="required" value="<?php echo $data_pegawai->unit_kerja ?>"></td>
      </tr>
      <tr>
        <td><label>Lama Cuti (Hari)</label></td>
        <td>:</td>
        <td>
          <select name="lama_angka" id="lama_angka" class="span5 lama_angka" data-placeholder="Masukan Lama Hari Cuti" required style="width:100%;">
          <option></option>
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
          <select name='hari_libur' class="span5" id="hari_libur" required="required" data-placeholder="Masukan Jumlah Hari Libur" required style="width:100%;">
            <option></option>
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
        <td id="list_hari_libur"><div id="errmsghrlbr"></div></td>
      </tr>
      <tr>
        <td><label>Awal Cuti</label></td>
        <td>:</td>
        <td><input type="text" name="awal" id="awal" class="datepicker span5 awal" data-date-format="dd-mm-yyyy" value="<?php echo date("d-m-Y") ?>" /></td>
      </tr>
      <tr>
        <td><label>Lokasi</label></td>
        <td>:</td>
        <td><input type="text" name="lokasi" id="lokasi" class="span5 lokasi" value="<?php echo $data_pegawai->lokasi ?>" placeholder="Masukan Lokasi Cuti Anda" required /></td>
      </tr>
      <tr>
        <td><label>Nomor Hp</label></td>
        <td>:</td>
        <td><input type="text" name="nomor" id="nomor" class="span5 nomor" value="<?php echo $data_pegawai->no_hp ?>" required /><div id="errmsg"></div></td>
      </tr>
      <tr>
        <td><label>Pejabat Pengganti</label></td>
        <td>:</td>
        <td>
        <select name="pengganti" id="pengganti" class="span5 pengganti" data-placeholder="Pilih Pejabat Pengganti" required style="width:100%;">
          <option value="<?php echo $data_pegawai->pengganti ?>"><?php echo $data_pegawai->pengganti ?></option>
        <?php
          foreach ($list_pegawai as $list_pegawai) {
        ?>
          <option value="<?php echo $list_pegawai->nama ?>" nip="<?php echo $list_pegawai->nip ?>" id_pengganti="<?php echo $list_pegawai->id_data_pegawai ?>" pangkat="<?php echo $list_pegawai->pangkat ?>" ><?php echo $list_pegawai->nama ?></option>
        <?php
          }
        ?>
        </select>
        </td>
      </tr>
      <tr>
        <td><label>NIP Pengganti</label></td>
        <td>:</td>
        <td><input type="text" name="nip_pengganti" id="nip_pengganti" class="span5 nip_pengganti" <?php if($data_pegawai->nip_pengganti==""){echo "readonly";} ?> value="<?php if($data_pegawai->nip_pengganti==""){ echo 0;}else{ echo $data_pegawai->nip_pengganti;} ?>"/></td>
      </tr>
      <tr>
        <td><label>Pangkat Pengganti</label></td>
        <td>:</td>
        <td><input type="text" name="pangkat_pengganti" id="pangkat_pengganti" class="span5 pangkat_pengganti" <?php if($data_pegawai->pangkat_pengganti==""){echo "readonly";} ?> value="<?php if($data_pegawai->pangkat_pengganti==""){ echo "-";}else{echo $data_pegawai->pangkat_pengganti;} ?>"/></td>
      </tr>
      <tr>
        <td><label>Atasan Langsung</label></td>
        <td>:</td>
        <td>
          <select name="atasan_langsung" id="atasan_langsung" class="span5 atasan_langsung" data-placeholder="Pilih Atasan Langsung" style="width:100%;">
            <option value="<?php echo $data_pegawai->nama_atasan ?>" nip="<?php echo $data_pegawai->nip ?>"><?php echo $data_pegawai->nama_atasan ?></option>
          </select>
        </td>
      </tr>
      <tr>
        <td><label>NIP Atasan</label></td>
        <td>:</td>
        <td><input type="text" name="nip_atasan" id="nip_atasan" class="span5 nip_atasan" value="<?php echo $data_pegawai->nip ?>" readonly/></td>
      </tr>
      <tr>
        <td><label>Alasan Cuti</label></td>
        <td>:</td>
        <td><input type="text" name="alasan_cuti" id="alasan_cuti" class="span5 alasan_cuti" placeholder="Masukan Alasan Cuti"/></td>
      </tr>
    </table>
    <input type="submit" name="form_submit" class="btn btn-success" value="SIMPAN" style="float: right;">
  </div>
  <div id="tab3" class="tab-pane">
    <table class="table table-bordered data-table">
      <thead>
        <th>Nomor</th>
        <th>Pengajuan Cuti</th>
        <th>Nama</th>
        <th>Nama Pengganti</th>
        <th>Awal Cuti</th>
        <th>Akhir Cuti</th>
        <th>Lama Cuti</th>
        <th>Status</th>
        <th>Tahun</th>
        <th>Action</th>
      </thead>
    <tbody>
      <?php 
      $no=0;
      foreach ($data_history_cuti as $data_history_cuti) {
      $no++;
      ?>
      <tr>
        <td><?php echo $no ?></td>
        <td><?php echo tgl_indo(date("Y-m-d",strtotime($data_history_cuti->tanggal_pengajuan))) ?></td>
        <td><?php echo $data_history_cuti->nama ?></td>
        <td><?php echo $data_history_cuti->pengganti ?></td>
        <td><?php echo tgl_indo(date("Y-m-d",strtotime($data_history_cuti->awal))) ?></td>
        <td><?php echo tgl_indo(date("Y-m-d",strtotime($data_history_cuti->akhir))) ?></td>
        <td><?php echo $data_history_cuti->lama_angka ?> Hari</td>
        <td>
          <?php 
            if($data_history_cuti->status=="Menunggu"){
              echo '<a class="btn btn-warning">'.$data_history_cuti->status.'</a>';
            }else if($data_history_cuti->status=="Setujui"){
              echo '<a class="btn btn-success">'.$data_history_cuti->status.'</a>';
            }else if($data_history_cuti->status=="Tolak"){
              echo '<a class="btn btn-danger">'.$data_history_cuti->status.'</a>';
            }
          ?>
        </td>
        <td><?php echo $data_history_cuti->tahun ?></td>
        <td>
          <?php 
          if($data_history_cuti->status=="Tolak"){
            echo "Tidak Terdapat Aksi";
          }else{
          ?>
          <a class="btn btn-primary" href="<?php echo base_url('dasbor_users/cuti/print_by_id/'.$data_history_cuti->id_cuti.'/'.$data_history_cuti->id_data_pegawai) ?>" target="_blank">Print Cuti</a>
          <?php 
            if($data_history_cuti->status=="Setujui"){
          ?>
            <a class="btn btn-default" href="#">Terkunci</a>
          <?php
            }else{
          ?>
            <a class="btn btn-danger" href="<?php echo base_url('dasbor_users/cuti/delete/'.$data_history_cuti->id_cuti) ?>">Hapus</a>
          <?php
            }
          ?>
          <?php
          }
          ?>
        </td>
      </tr>
      <?php } ?>
    </tbody>
    </table>
  </div>
</div>
</div>
</div>
</form>
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
