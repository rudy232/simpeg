<?php 
  if($this->session->flashdata('notifval')){
    echo '<div class="alert alert-success alert-block">';
    echo $this->session->flashdata('notifval');
    echo '</div>';

  }
?>
<div class="row-fluid">
<a class="btn btn-success" href="<?php echo base_url('dasbor_admin/cuti/listing_tambah') ?>">TAMBAH DATA</a>
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5><?php  echo $title?></h5>
  </div>
  <div class="widget-content nopadding">
    <table class="table table-bordered data-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Tgl Pengajuan</th>
          <th>JK</th>
          <th>Nama</th>
          <th>Cuti Hari</th>
          <th>Awal Pengajuan</th>
          <th>Akhir Pengajuan</th>
          <th>Nomor Handphone</th>
          <th>Nama Pengganti</th>
          <th>Total Cuti</th>
          <th>Sisa Cuti</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $i=0;
          foreach ($data_cuti as $data_cuti) {
          $i++;
          $url = base_url('dasbor_admin/detail_pegawai/'.$this->session->userdata('id_user'));
          $url_edit = base_url('dasbor_admin/cuti/listing_edit/'.$this->session->userdata('id_user'));
        ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo date("d F Y",strtotime($data_cuti->tanggal_pengajuan)) ?></td>
          <td><?php echo $data_cuti->gender ?></td>
          <td><?php echo $data_cuti->nama ?></td>
          <td><?php echo $data_cuti->lama_angka ?></td>
          <td><?php echo date("d F Y", strtotime($data_cuti->awal)) ?></td>
          <td><?php echo date("d F Y", strtotime($data_cuti->akhir)) ?></td>
          <td><?php echo $data_cuti->nomor ?></td>
          <td><?php echo $data_cuti->pengganti ?></td>
          <td><?php echo $data_cuti->total_cuti ?></td>
          <td><?php echo $data_cuti->sisa_cuti ?></td>
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
