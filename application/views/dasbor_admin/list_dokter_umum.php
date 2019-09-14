<?php 
  if($this->session->flashdata('notifval')){
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('notifval');
    echo '</div>';

  }
  if($this->session->flashdata('notifail')){
    echo '<div class="alert alert-danger">';
    echo $this->session->flashdata('notifail');
    echo '</div>';

  }
?>
<div class="row-fluid">
<form action="<?php echo base_url();?>excel/upload/" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <a class="btn btn-success" href="#">TAMBAH DATA</a> ATAU <input class="form-control" type="file" name="file"/> <input type="submit" value="Upload Excel" class="btn btn-success" /> <a class="btn btn-success" href="<?php echo base_url('assets/upload_excel/download/Format Data Pegawai PNS.xlsx') ?>">Download Format Table Excel</a>
    </div>
</form>
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
          $url = base_url('dasbor_admin/data_pegawai/detail/'.$data_pegawai->id_data_pegawai);
          $url_edit = base_url('dasbor_admin/data_pegawai/edit/'.$data_pegawai->id_data_pegawai);
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
          <td><?php echo $data_pegawai->nopeg ?></td>
          <td><?php echo $data_pegawai->nama ?></td>
          <td><?php echo $masa_krj->y." Tahun ".$masa_krj->m." Bulan ".$masa_krj->d." Hari " ?></td>
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