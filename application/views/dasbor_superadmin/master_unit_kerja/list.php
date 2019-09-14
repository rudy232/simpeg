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
<a class="btn btn-success" href="<?php echo base_url('dasbor_superadmin/master_unit_kerja/list_tambah') ?>">TAMBAH DATA</a>
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5><?php  echo $title?></h5>
  </div>
  <div class="widget-content nopadding">
    <table class="table table-bordered data-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Unit Kerja</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $i=0;
          foreach ($unit_kerja as $unit_kerja) {
          $i++;
          $url_edit = base_url('dasbor_superadmin/master_unit_kerja/list_edit/'.$unit_kerja->id_unit_kerja);
        ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $unit_kerja->nama_unit_kerja ?></td>
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
