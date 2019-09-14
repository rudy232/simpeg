<?php
error_reporting(0);
  if($this->session->flashdata('notifval')){
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('notifval');
    echo '</div>';
    date_default_timezone_set("Asia/Jakarta");
  }
  
?>
<div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb"> <a href="#"> <i class="icon-time"><?php echo $data_cuti->sisa_cuti; ?></i>Sisa Cuti</a> </li>
        <li class="bg_lg"> <a href="#"> <i class="icon-gift"><?php echo $data_cuti->total_cuti; ?></i> Total Cuti</a> </li>
      </ul>
    </div>
</div>
<div class="row-fluid">
<div class="widget-box">
<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#tab1">Data Detail Cuti</a></li>
    <li><a data-toggle="tab" href="#tab2">History</a></li>
  </ul>
</div>
<div class="widget-content tab-content">
  <div id="tab1" class="tab-pane active">
    <table class="table table-bordered">
      <tr>
        <td>Tanggal Pengajuan</td>
        <td>:</td>
        <td><?php echo date("d F Y", strtotime($data_cuti->tanggal_pengajuan)) ?></td>
      </tr>
      <tr>
        <td>Bulan Surat</td>
        <td>:</td>
        <td><?php echo $data_cuti->bulan_surat ?></td>
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
        <td>Lama Angka</td>
        <td>:</td>
        <td><?php echo $data_cuti->lama_angka ?></td>
      </tr>
      <tr>
        <td>Lama Huruf</td>
        <td>:</td>
        <td><?php echo $data_cuti->lama_huruf ?></td>
      </tr>
      <tr>
        <td>Awal Cuti</td>
        <td>:</td>
        <td><?php echo date("d F Y",strtotime($data_cuti->awal)) ?></td>
      </tr>
      <tr>
        <td>Akhir Cuti</td>
        <td>:</td>
        <td><?php echo date("d F Y", strtotime($data_cuti->akhir)) ?></td>
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
    <table class="table table-bordered">
      <thead>
        <th>Nomor</th>
        <th>Pengajuan Cuti</th>
        <th>Nama</th>
        <th>Nama Pengganti</th>
        <th>Jumlah Cuti</th>
        <th>Awal Cuti</th>
        <th>Akhir Cuti</th>
        <th>Sisa Cuti</th>
        <th>Status</th>
      </thead>
      <tbody>
        <?php 
          $i = 0;
          foreach ($hitory_cuti as $hitory_cuti) {
            $i++
        ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo date("d F Y",strtotime($hitory_cuti->tanggal_pengajuan)) ?></td>
          <td><?php echo $hitory_cuti->nama ?></td>
          <td><?php echo $hitory_cuti->pengganti ?></td>
          <td><?php echo $hitory_cuti->lama_angka ?> Hari</td>
          <td><?php echo date("d F Y",strtotime($hitory_cuti->awal)) ?></td>
          <td><?php echo date("d F Y",strtotime($hitory_cuti->akhir)) ?></td>
          <td><?php echo $hitory_cuti->sisa_cuti ?></td>
          <td>
            <?php 
              if($hitory_cuti->status=="Menunggu"){
                echo '<a class="btn btn-warning">'.$hitory_cuti->status.'</a>';
              }else if($hitory_cuti->status=="Setujui"){
                echo '<a class="btn btn-success">'.$hitory_cuti->status.'</a>';
              }else if($hitory_cuti->status=="Tolak"){
                echo '<a class="btn btn-danger">'.$hitory_cuti->status.'</a>';
              }
            ?>
          </td>
        </tr>
        <?php 
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
