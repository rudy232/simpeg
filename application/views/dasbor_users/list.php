<?php 
  if($this->session->flashdata('notifval')){
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('notifval');
    echo '</div>';

  }
?>
<div class="row-fluid">
<a class="btn btn-success" href="#">TAMBAH DATA</a>
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5><?php  echo $title?></h5>
  </div>
  <div class="widget-content nopadding">
    <table class="table table-bordered data-table">
      <thead>
        <tr>
          <th>No</th>
          <th>No Pegawai</th>
          <th>Nama Pegawai</th>
          <th>Masa Kerja</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $i=0;
          foreach ($data_pegawai as $data_pegawai) {
          $i++;
          $url = base_url('dasbor_users/dasbor/detail');
          $url_edit = base_url('dasbor_users/dasbor/edit');
          //Hitung Masa Kerja
          $tgl_msk =new datetime($data_pegawai->tanggal_daftar);
          $tgl_skrng = new datetime();
          $masa_krj= $tgl_skrng->diff($tgl_msk);
          $tahun= $masa_krj->y;
          $bulan= $masa_krj->m;
          $hari= $masa_krj->d;
        ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $data_pegawai->nip ?></td>
          <td><?php echo $data_pegawai->nama ?></td>
          <td><?php echo $masa_krj->y." Tahun ".$masa_krj->m." Bulan ".$masa_krj->d." Hari " ?></td>
          <td><?php include('edit.php') ?></td>

        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
</div>
