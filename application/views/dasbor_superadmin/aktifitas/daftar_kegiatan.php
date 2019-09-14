<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<?php 
//Notifikasi
if($this->session->flashdata('sukses')){
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>
<div class="row-fluid">
    <form action="<?php echo base_url();?>excel/upload/" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <a class="btn btn-success" href="<?php echo base_url('dasbor_superadmin/aktifitas/tambah_aktifitas') ?>">TAMBAH DATA</a> ATAU <input class="form-control" type="file" name="file"/> <input type="submit" value="Upload Excel" class="btn btn-success" /> <a class="btn btn-success" href="<?php echo base_url('assets/upload_excel/download/Format Data Pegawai.xlsx') ?>">Download Format Table Excel</a>
      </div>
    </form>
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5><?php  echo $title?></h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table table-striped with-check">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Jabatan</th>
                    <th>Nama Aktifitas</th>
                    <th>Waktu</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $i=1; foreach($daftar_kegiatan as $daftar_kegiatan){ 
                    $url_edit = base_url('dasbor_superadmin/aktifitas/edit_aktifitas/'.$daftar_kegiatan->id);
                ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i ?></td>
                        <td><?php echo str_replace('%20', ' ', $daftar_kegiatan->nama_jabatan) ?></td>
                        <td><?php echo $daftar_kegiatan->nama_aktifitas ?></td>
                        <td><?php echo $daftar_kegiatan->waktu_efektif ?></td>
                        <td><?php include('edit.php') ?><?php include('delete.php') ?></td>
                    </tr>
                <?php $i++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>  