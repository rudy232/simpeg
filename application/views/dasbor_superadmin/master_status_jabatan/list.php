<?php 
if($this->simple_admin->cek_login_superadmin());
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
          <th>Nama Status Jabatan</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $i=0;
          foreach ($status_jabatan as $status_jabatan) {
          $i++;
        ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $status_jabatan->nama_jabatan ?></td>
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
