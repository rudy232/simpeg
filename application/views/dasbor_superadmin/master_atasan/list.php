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
?>
<div class="row-fluid">
<a class="btn btn-success" href="<?php echo base_url('dasbor_superadmin/master_atasan/list_tambah') ?>">TAMBAH DATA</a>
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5><?php  echo $title?></h5>
  </div>
  <div class="widget-content nopadding">
    <table class="table table-bordered data-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Atasan</th>
          <th>NIP</th>
          <th>NRK</th>
          <th>PANGKAT</th>
          <th>GOLONGAN</th>
          <th>JABATAN</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $i=0;
          foreach ($atasan as $atasan) {
          $i++;
          $url_edit = base_url('dasbor_superadmin/master_atasan/list_edit/'.$atasan->id_atasan);
        ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $atasan->nama_atasan ?></td>
          <td><?php echo $atasan->nip ?></td>
          <td><?php echo $atasan->nrk ?></td>
          <td><?php echo $atasan->jabatan ?></td>
          <td><?php echo $atasan->golongan ?></td>
          <td><?php echo $atasan->jabatan2 ?></td>
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