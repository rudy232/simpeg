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
<h3 style="font-size:16px;font-family:Arial;text-align: center;">LAPORAN PERENCANAAN DIKLAT PEGAWAI</h3>
<table border="1" style="font-size:13px;border:100px;font-family:Arial;">
  <thead>
    <tr>
      <th>No</th>
      <th>Atasan</th>
      <th>Pengaju</th>
      <th>Nama Pelatihan</th>
      <th>Nama Peserta</th>
      <th>Unit Kerja</th>
      <th>Waktu Pelatihan</th>
      <th>Biaya</th>
      <th>Penyelenggara</th>
      <th>Brosur/File</th>
      <th>Lokasi</th>
      <th>Tanggal Permintaan</th>
      <th>Status</th>
    </tr>
  </thead>  
  <tbody>
    <?php 
      $i=0;
      foreach ($usulan_diklat as $usulan_diklat) {
      $i++;
    ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $usulan_diklat->nama_atasan ?></td>
      <td><?php echo $usulan_diklat->pengaju ?></td>
      <td><?php echo $usulan_diklat->nama_diklat ?></td>
      <td><?php echo $usulan_diklat->nama_peserta ?></td>
      <td><?php echo $usulan_diklat->unit_kerja ?></td>
      <td><?php echo $usulan_diklat->waktu_pelaksanaan ?></td>
      <td><?php echo "Rp".number_format($usulan_diklat->biaya_pelatihan,0,",","."); ?></td>
      <td><?php echo $usulan_diklat->nama_penyelenggara ?></td>
      <td></td>
      <td><?php echo $usulan_diklat->lokasi_pelatihan ?></td>
      <td><?php echo date("d-m-Y",strtotime($usulan_diklat->tanggal)) ?></td>
      <td><?php echo $usulan_diklat->status_diklat; ?></td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>
<br>
<table border="1" style="font-size:13px;border:100px;font-family:Arial;">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Pelatihan</th>
      <th>Jumlah Peserta</th>
      <th>Biaya / Orang</th>
      <th>Biaya</th>
    </tr>
  </thead>  
  <tbody>
    <?php 
      $i=0;
      $total_biaya ="";
      foreach ($nama_diklat as $nama_diklat) {
        $i++;
        $sub_biaya = $nama_diklat->count_peserta*$nama_diklat->biaya_pelatihan;
      ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $nama_diklat->nama_diklat ?></td>
          <td><?php echo $nama_diklat->count_peserta ?></td>
          <td><?php echo number_format($nama_diklat->biaya_pelatihan,0,",",".") ?></td>
          <td><?php echo number_format($sub_biaya,0,",",".") ?></td>
        </tr>
      <?php
        $total_biaya += $sub_biaya;
      }
    ?>
  </tbody>
</table>
<div style="text-align: right; padding: 5px;">
  <b>Total Biaya : <?php echo "Rp.".number_format($total_biaya,0,",",".") ?></b>
</div>