<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<?php 
date_default_timezone_set('Asia/Jakarta');
header("content-type:Application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Diklat Pegawai ".date('d-m-Y').".xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<style>
td {
   vertical-align: middle;
}
</style>
<h3 style="font-size:16px;font-family:Arial;text-align: center;">LAPORAN LOG AKTIFITAS</h3>
<table border="1" style="font-size:13px;border:100px;font-family:Arial;">
  <thead>
      <tr>
        <th>No</th>
        <th>Nama User</th>
        <th>Kode User</th>
        <th>Waktu</th>
        <th>Deskripsi</th>
      </tr>
    </thead>  
    <tbody>
      <?php 
        $i=0;
        foreach ($data_log as $data_log) {
        $i++;
      ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $data_log->nama ?></td>
        <td><?php echo $data_log->log_user ?></td>
        <td><?php echo $data_log->log_time ?></td>
        <td><?php echo $data_log->log_desc ?></td>
      </tr>
      <?php
        }
      ?>
    </tbody>
</table>
<br>