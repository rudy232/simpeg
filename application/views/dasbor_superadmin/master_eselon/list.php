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
          <th>Nama Eselon</th>
          <th>Level</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $i=0;
          foreach ($eselon as $eselon) {
          $i++;
        ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $eselon->nama_eselon ?></td>
          <td><?php echo $eselon->level ?></td>
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
