<?php 
error_reporting(0);
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
<div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb"> <a href="#"> <i class="icon-ok-sign"><?php echo $data_sisa_cuti->sisa_cuti; ?></i>Sisa Cuti Anda</a> </li>
        <li class="bg_ls"> <a href="#"> <i class="icon-glass"><?php echo $data_sisa_cuti->total_cuti; ?></i>Total Cuti Anda</a> </li>
        <li class="bg_lg"> <a href="#"> <i class="icon-check"><?php echo $this->db->where('status','Setujui')->where('atasan_langsung',$this->session->userdata('nama'))->count_all_results("data_cuti"); ?></i>Cuti Yang di Setujui</a> </li>
        <li class="bg_ly"> <a href="#"> <i class="icon-warning-sign"><?php echo $this->db->where('status','Menunggu')->where('atasan_langsung',$this->session->userdata('nama'))->count_all_results("data_cuti"); ?></i>Cuti Menunggu</a> </li>
        <li class="bg_lr"> <a href="#"> <i class="icon-eject"><?php echo $this->db->where('status','Tolak')->where('atasan_langsung',$this->session->userdata('nama'))->count_all_results("data_cuti"); ?></i>Cuti Yang di Tolak</a> </li>
      </ul>
    </div>
</div>
<div class="row-fluid">
  <div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-search"></i></span>
        <h5>Filter Pencharian</h5>
     </div>
     <div class="widget-content padding">
      <form action="<?php echo base_url('dasbor_admin/cuti/filter_data_cuti') ?>" method="POST">
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
          <select class="span3" name="status_unit_kerja" data-placeholder="Berdasarkan Unit Kerja">
            <option></option>
            <option value="RAWAT INAP">RAWAT INAP</option>
            <option value="POLI RAWAT JALAN">POLI RAWAT JALAN</option>
            <option value="RUANG BERSALIN">RUANG BERSALIN</option>
            <option value="FARMASI">FARMASI</option>
            <option value="GIZI">GIZI</option>
            <option value="INSTALASI GAWAT DARURAT">INSTALASI GAWAT DARURAT</option>
            <option value="RADIOLOGI">RADIOLOGI</option>
            <option value="APOTEKER">APOTEKER</option>
            <option value="JURU MASAK">JURU MASAK</option>
            <option value="LABORATURIUM">LABORATURIUM</option>
            <option value="POLI KANDUNGAN">POLI KANDUNGAN</option>
          </select>
        </div>
        <br/>
        <br/>
        <div class="form-group">
          <input type="submit" name="submit" class="span1 btn btn-info" value="GO!"> 
          <a class="btn btn-success" href="<?php echo base_url('dasbor_admin/cuti/listing_tambah') ?>">TAMBAH DATA</a>
        </div>        
      </form>
    </div>
  </div>
</div>
<div class="row-fluid">
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5><?php  echo $title?></h5>
  </div>
  <div class="widget-content padding">
    <table class="table table-bordered data-table">
      <thead>
        <tr>
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
          <th>Jumlah Hari</th>
          <th>Sisa Cuti</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $i=0;
          foreach ($data_cuti as $data_cuti) {
          $i++;
          $url = base_url('dasbor_admin/detail_pegawai/'.$data_cuti->id_data_pegawai.'/'.$data_cuti->id_cuti);
          $url_edit = base_url('dasbor_admin/cuti/listing_edit/'.$data_cuti->id_cuti);
          $url_menunggu = base_url('dasbor_admin/cuti/update_status_cuti/'.$data_cuti->id_cuti.'/Menunggu');
          $url_setujui = base_url('dasbor_admin/cuti/update_status_cuti/'.$data_cuti->id_cuti.'/Setujui');
          $url_tolak = base_url('dasbor_admin/cuti/update_status_cuti/'.$data_cuti->id_cuti.'/Tolak');
          $url_kirim_pesan = base_url('dasbor_admin/kirim_pesan/kirim_pesan_pegawai/'.$data_cuti->id_cuti);
        ?>
        <tr>
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
          <td><?php echo $data_cuti->lama_angka ?></td>
          <td><?php echo $data_cuti->sisa_cuti ?></td>
          <td><?php include('update_status.php'); ?></td>

        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
</div>
<?php 
  if($this->session->userdata('jabatan')=='Kepala Sub Bagian Tata Usaha'){
?>
<div class="row-fluid">
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5><?php echo $title_list_all ?></h5>
  </div>
  <div class="widget-content padding">
    <table class="table table-bordered data-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama <?php echo $this->session->userdata('jabatan') ?></th>
          <th>Unit Kerja</th>
          <th>Awal Cuti</th>
          <th>Akhir Cuti</th>
          <th>Lama Hari Cuti</th>
          <th>Jumlah Hari Libur</th>
          <th>Tanggal Libur</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $i=0;
          foreach ($listing_all as $listing_all) {
          $i++;
        ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $listing_all->nama ?></td>
          <td><?php echo $listing_all->unit_kerja ?></td>
          <td><?php echo date("d F Y", strtotime($listing_all->awal)) ?></td>
          <td><?php echo date("d F Y", strtotime($listing_all->akhir)) ?></td>
          <td><?php echo $listing_all->lama_angka ?></td>
          <td><?php echo $listing_all->jml_hari_libur ?></td>
          <td><?php echo $listing_all->tanggal_libur ?></td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
</div>
<?php }?>
<script type="text/javascript">
    //date picker setting
    $("#ambil_bulan").datepicker( {
        format: "mm-yyyy",
        viewMode: "months", 
        minViewMode: "months"
    });
</script>