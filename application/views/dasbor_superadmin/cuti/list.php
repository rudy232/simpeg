<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<?php 
  if($this->session->flashdata('notifval')){
    echo '<div class="alert alert-success alert-block">';
    echo $this->session->flashdata('notifval');
    echo '</div>';

  }

    if($this->session->flashdata('notiffail')){
    echo '<div class="alert alert-danger alert-block">';
    echo $this->session->flashdata('notiffail');
    echo '</div>';

  }

?>
<form action="<?php echo base_url('dasbor_superadmin/cuti/filter_data_cuti') ?>" method="POST" onsubmit="return validate(this);">
<div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lg"> <a href="#"> <i class="icon-check"><?php echo $cuti_setujui  ?></i>Cuti Yang di Setujui</a> </li>
        <li class="bg_ly"> <a href="#"> <i class="icon-warning-sign"><?php echo $cuti_menunggu ?></i>Cuti Yang Menunggu</a> </li>
        <li class="bg_lr"> <a href="#"> <i class="icon-eject"><?php echo $cuti_tolak ?></i>Cuti Yang di Tolak</a> </li>
      </ul>
    </div>
</div>
<div class="row-fluid">
  <div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-search"></i></span>
        <h5><?php echo $title_filter ?></h5>
     </div>
     <div class="widget-content padding">
        <div class="form-group">
          <input type="text" class="span3 datepicker" id="ambil_bulan" name="tahun" placeholder="Berdasarkan Bulan dan Tahun">
        </div>
        <div class="form-group">
          <select class="span3" name="status" data-placeholder="Berdasarkan Status">
            <option></option>
            <option value="Menunggu">Menunggu</option>
            <option value="Setujui">Setujui</option>
            <option value="Tolak">Tolak</option>
          </select>
        </div>
        <br/>
        <br/>
        <div class="form-group">
          <select class="span3" name="unit_kerja" data-placeholder="Berdasarkan Unit Kerja">
            <option></option>
            <?php
            foreach ($unit_kerja as $unit_kerja) {
            ?>
            <option value="<?php echo $unit_kerja->nama_unit_kerja ?>"><?php echo $unit_kerja->nama_unit_kerja ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <br/>
        <br/>
        <div class="form-group">
          <input type="submit" name="submit" class="span1 btn btn-info" value="GO!"> 
          <a class="btn btn-success" href="<?php echo base_url('dasbor_superadmin/cuti/listing_tambah') ?>">+ CUTI TAHUNAN</a>
          <a class="btn btn-success" href="<?php echo base_url('dasbor_superadmin/cuti/cuti_bersalin') ?>">+ CUTI BERSALIN</a>
          <a class="btn btn-success" href="<?php echo base_url('dasbor_superadmin/cuti/cuti_alasan_penting') ?>">+ CUTI ALASAN PENTING</a>
        </div>        
    </div>
  </div>
</div>
<div class="row-fluid">
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5><?php  echo $title?></h5>
    <span class="icon" style="padding: 5px;">
      <input type="checkbox" id="title-checkbox" name="title-checkbox" /> <strong>Cehck All</strong> <input type="submit" name="submit" id="sub_hapus" value="HAPUS" class="btn btn-primary" />
    </span>
    <span class="icon" style="padding: 5px;">
      <input type="submit" name="submit" id="sub_setujui" value="SETUJUI" class="btn btn-success" />
    </span>
    <span class="icon" style="padding: 5px;">
      <input type="submit" name="submit" value="MENUNGGU" id="sub_menunggu" class="btn btn-warning" />
    </span>
    <span class="icon" style="padding: 5px;">
      <input type="submit" name="submit" value="TOLAK" id="sub_tolak" class="btn btn-danger" />
    </span>
  </div>
  <div class="widget-content padding">
    <table class="table table-bordered data-table table-striped with-check">
      <thead>
        <tr>
          <th>Check</th>
          <th>No</th>
          <th>Tgl Pengajuan</th>
          <th>JK</th>
          <th>Nama</th>
          <th>Unit Kerja</th>
          <th>Awal Cuti</th>
          <th>Akhir Cuti</th>
          <th>Jumlah Hari Libur</th>
          <th>Tanggal Libur</th>
          <th>Nomor Handphone</th>
          <th>Nama Pengganti</th>
          <th>Total Cuti</th>
          <th>Jumlah Hari / Bulan</th>
          <th>Sisa Cuti</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $i=0;
          foreach ($data_cuti as $data_cuti) {
          $i++;
          $url = base_url('dasbor_superadmin/detail_pegawai/'.$data_cuti->id_data_pegawai.'/'.$data_cuti->id_cuti);
          $url_edit = base_url('dasbor_superadmin/cuti/listing_edit/'.$data_cuti->id_cuti);
          $url_menunggu = base_url('dasbor_superadmin/cuti/update_status_cuti/'.$data_cuti->id_cuti.'/Menunggu');
          $url_setujui = base_url('dasbor_superadmin/cuti/update_status_cuti/'.$data_cuti->id_cuti.'/Setujui');
          $url_tolak = base_url('dasbor_superadmin/cuti/update_status_cuti/'.$data_cuti->id_cuti.'/Tolak');
          $url_kirim_pesan = base_url('dasbor_superadmin/kirim_pesan/kirim_pesan_pegawai/'.$data_cuti->id_cuti);
        ?>
        <tr>
          <td><input type="checkbox" name="id_cuti[]" id="id_cuti" class="id_cuti" value="<?php echo $data_cuti->id_cuti ?>" /></td>
          <td><?php echo $i ?></td>
          <td><?php echo date("d F Y",strtotime($data_cuti->tanggal_pengajuan)) ?></td>
          <td><?php echo $data_cuti->gender ?></td>
          <td><?php echo $data_cuti->nama ?></td>
          <td><?php echo $data_cuti->unit_kerja ?></td>
          <td><?php echo date("d F Y", strtotime($data_cuti->awal)) ?></td>
          <td><?php echo date("d F Y", strtotime($data_cuti->akhir)) ?></td>
          <td><?php echo $data_cuti->jml_hari_libur ?></td>
          <td><?php echo $data_cuti->tanggal_libur ?></td>
          <td><?php echo $data_cuti->nomor ?></td>
          <td><?php echo $data_cuti->pengganti ?></td>
          <td><?php echo $data_cuti->total_cuti ?></td>
          <?php 
            if($data_cuti->jenis_cuti=="Cuti Bersalin")
            {
              $satuan = "Bulan";
            }else{
              $satuan = "Hari";
            }
          ?>
          <td><?php echo $data_cuti->lama_angka.' '.$satuan ?></td>
          <td><?php echo $data_cuti->sisa_cuti ?></td>
          <td><?php include('update_status.php'); ?></td>
          <td><?php include('edit.php') ?><?php include('delete.php') ?></td>

        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
</div>
</form>
<script type="text/javascript">
    //date picker setting
    $("#ambil_bulan").datepicker( {
        format: "mm-yyyy",
        viewMode: "months", 
        minViewMode: "months"
    });

    function validate(form) {
      var notcheck = $( "input:not(:checked)" );
      if(!notcheck) {
          alert('Mohon Pilih Data Yang Ingin di Hapus!');
          return false;
      } else {
          return confirm('Apakah Yakin Sudah Memilih Data Yang Ingin di Kelola ?');
      }
    }
</script>