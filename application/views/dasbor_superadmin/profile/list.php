<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<?php 
  if($this->session->flashdata('notifval')){
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('notifval');
    echo '</div>';

  }

  if($this->session->flashdata('gagal')){
    echo '<div class="alert alert-danger">';
    echo $this->session->flashdata('gagal');
    echo '</div>';

  }

  //Hitung Masa Kerja
  $tanggal_berdiri =new datetime($data_profile->tanggal_berdiri);
  $tgl_skrng2 = new datetime();
  $masa_berdiri= $tgl_skrng2->diff($tanggal_berdiri);
  $tahun2= $masa_berdiri->y;
  $bulan2= $masa_berdiri->m;
  $hari2= $masa_berdiri->d;
?>
<a class="btn btn-success" href="<?php echo base_url('dasbor_superadmin/profile/edit') ?>">EDIT DATA</a>
<div class="row-fluid">
<div class="widget-box">
<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#tab1">Profil Rumah Sakit</a></li>
  </ul>
</div>
<div class="widget-content tab-content">
  <div id="tab1" class="tab-pane active">
    <?php echo form_open_multipart('dasbor_superadmin/profile/upload_logo');?>
<input type="file" name="file_name" size="20" />
<input type="submit" class="btn btn-success" value="Upload Logo" /> <i class="alert alert-danger">Max Size 5.000 KB</i>
</form>
    <table class="table table-bordered">
      <tr>
        <td>Logo</td>
        <td>:</td>
        <td><img src="<?php echo base_url('assets/matrix-admin-package/img/thumbnail_logo/').$data_profile->logo ?>"></td>
      </tr>
      <tr>
        <td>Nama RS</td>
        <td>:</td>
        <td><?php echo $data_profile->nama_rs ?></td>
      </tr>
      <tr>
        <td>Alamat RS</td>
        <td>:</td>
        <td><?php echo nl2br($data_profile->alamat_rs) ?></td>
      </tr>
      <tr>
        <td>No Telpon / Fax</td>
        <td>:</td>
        <td><?php echo $data_profile->no_telpon ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td><?php echo $data_profile->email ?></td>
      </tr>
      <tr>
        <td>Masa Tahun Berdiri</td>
        <td>:</td>
        <td><?php echo $masa_berdiri->y." Tahun ".$masa_berdiri->m." Bulan ".$masa_berdiri->d." Hari " ?></td>
      </tr>
    </table>
  </div>
</div>
</div>
</div>
