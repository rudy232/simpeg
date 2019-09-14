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
<h3 style="font-size:16px;font-family:Arial;text-align: center;">LAPORAN DIKLAT PEGAWAI</h3>
<table border="1" style="font-size:13px;border:100px;font-family:Arial;">
  <thead>
    <tr>
      <th>No</th>
      <th>Penyelenggara</th>
      <th>Nama Pelatihan</th>
      <th>Uraian</th>
      <th>Nama Peserta</th>
      <th>Jenis Anggaran</th>
      <th>Biaya</th>
      <th>Status Dokumen</th>
      <th>Lokasi</th>
      <th>Tanggal Pelatihan</th>
      <th>Jam Pelatihan</th>
    </tr>
  </thead>  
  <tbody>
    <?php 
      $i=0;
      foreach ($data_diklat as $data_diklat) {
      $i++;
      $url = base_url('dasbor_superadmin/data_diklat/detail/'.$data_diklat->id_data_pelatihan);
      $url_edit = base_url('dasbor_superadmin/data_diklat/list_edit/'.$data_diklat->id_data_pelatihan);
    ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data_diklat->penyelenggara ?></td>
      <td><?php echo $data_diklat->nama_pelatihan ?></td>
      <td><?php echo $data_diklat->uraian ?></td>
      <td><?php echo $data_diklat->nama ?></td>
      <td><?php echo $data_diklat->anggaran ?></td>
      <td><?php echo "Rp".number_format($data_diklat->biaya,0,",","."); ?></td>
      <td><?php echo $data_diklat->status_dok ?></td>
      <td><?php echo $data_diklat->lokasi ?></td>
      <td><?php echo $data_diklat->tanggal_sertifikat.' s/d '.$data_diklat->tanggal_sertifikat2 ?></td>
      <td><?php echo $data_diklat->jam_mulai.' s/d '.$data_diklat->jam_selesai ?></td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>
<br>