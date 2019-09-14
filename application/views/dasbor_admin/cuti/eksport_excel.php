<?php 
date_default_timezone_set('Asia/Jakarta');
header("content-type:Application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Cuti Pegawai ".date('d-m-Y').".xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<style>
td {
   vertical-align: middle;
}
</style>
<h3 style="font-size:16px;font-family:Arial;text-align: center;">LAPORAN CUTI PEGAWAI</h3>
<table border="1" style="font-size:13px;border:100px;font-family:Arial;">
    <thead>
      <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Unit Kerja</th>
          <th>Tanggal Pengajuan</th>
          <th>Tanggal Cuti</th>
          <th>Lama Hari Cuti</th>
          <th>No Telpon</th>
          <th>Nama Pengganti</th>
          <th>Sisa Cuti</th>
          <th>Total Cuti</th>
          <th>Bulan / Tahun</th>
          <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=0; foreach($listing_cuti as $listing_cuti): $no++;?>
      <tr>
        <td><center>&nbsp;<?php echo $no; ?></center></td>
        <td>&nbsp;<?php echo $listing_cuti->nama; ?></td>
        <td>&nbsp;<?php echo ucfirst(strtolower($listing_cuti->unit_kerja)); ?></td>
        <td>&nbsp;<?php echo date("d F Y",strtotime($listing_cuti->tanggal_pengajuan)); ?></td>
        <td>&nbsp;<?php echo date("d F Y",strtotime($listing_cuti->awal))." s/d ".date("d F Y",strtotime($listing_cuti->akhir)); ?></td>
        <td style="text-align: center;">&nbsp;<?php echo $listing_cuti->lama_angka; ?></td>
        <td>&nbsp;<?php echo $listing_cuti->nomor; ?></td>
        <td>&nbsp;<?php echo $listing_cuti->pengganti; ?></td>
        <td style="text-align: center;">&nbsp;<?php echo $listing_cuti->sisa_cuti; ?></td>
        <td style="text-align: center;">&nbsp;<?php echo $listing_cuti->total_cuti; ?></td>
        <td style="text-align: center;">&nbsp;<?php echo $listing_cuti->tahun; ?></td>
        <td>&nbsp;<?php echo $listing_cuti->status; ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<br>