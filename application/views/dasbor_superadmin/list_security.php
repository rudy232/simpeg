<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<?php 
  if($this->session->flashdata('notifval')){
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('notifval');
    echo '</div>';
  }
  if($this->session->flashdata('notifail')){
    echo '<div class="alert alert-danger">';
    echo $this->session->flashdata('notifail');
    echo '</div>';

  }
?>
<div class="row-fluid">
<form action="<?php echo base_url();?>excel/upload/" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <a class="btn btn-success" href="<?php echo base_url('dasbor_superadmin/data_pegawai/tambah_pegawai/'.$this->session->flashdata('jabatan')) ?>">TAMBAH DATA</a> ATAU <input class="form-control" type="file" name="file"/> <input type="submit" value="Upload Excel" class="btn btn-success" /> <a class="btn btn-success" href="<?php echo base_url('assets/upload_excel/download/Format Data Pegawai.xlsx') ?>">Download Format Table Excel</a>
  </div>
</form>
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5><?php  echo $title?></h5>
  </div>
  <div class="widget-content nopadding">
    <table class="table table-bordered data-table">
      <thead>
        <tr>
          <th>No</th>
          <th>No Pegawai</th>
          <th>Nama Pegawai</th>
          <th>Jabatan</th>
          <th>Masa Kerja</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $i=0;
          foreach ($data_pegawai as $data_pegawai) {
          $i++;
          $url = base_url('dasbor_superadmin/data_pegawai/detail/'.$data_pegawai->id_data_pegawai);
          $url_edit = base_url('dasbor_superadmin/data_pegawai/list_edit/'.$data_pegawai->id_data_pegawai.'/'.$this->session->flashdata('jabatan'));
          //Hitung Masa Kerja
          $tgl_msk =new datetime($data_pegawai->tanggal_daftar);
          $tgl_skrng = new datetime();
          $masa_krj= $tgl_skrng->diff($tgl_msk);
          $tahun= $masa_krj->y;
          $bulan= $masa_krj->m;
          $hari= $masa_krj->d;
        ?>
        <tr id="<?php echo $data_pegawai->id_data_pegawai ?>">
          <td><?php echo $i ?></td>
          <td><?php echo $data_pegawai->nopeg ?></td>
          <td><?php echo $data_pegawai->nama ?></td>
          <td><?php echo $data_pegawai->jabatan ?></td>
          <td class="masa_kerja_akhir"><?php if($data_pegawai->status=="Tidak Aktif"){ echo "<span style='color:red;'>".$data_pegawai->masa_kerja_akhir.'</span>';}else{ echo $masa_krj->y." Tahun ".$masa_krj->m." Bulan ".$masa_krj->d." Hari "; } ?></td>
          <td><?php include('edit.php') ?><?php include('delete.php') ?><a class="aktif <?php if($data_pegawai->status=="Tidak Aktif"){ echo "btn btn-danger";}else{ echo "btn btn-success";}  ?>" status="<?php if($data_pegawai->status=="Aktif"){echo "Tidak Aktif";}else{ echo "Aktif";} ?>" id_pegawai="<?php echo $data_pegawai->id_data_pegawai ?>" id="<?php echo $data_pegawai->id_data_pegawai ?>" href="#"><?php echo $data_pegawai->status ?></a></td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
</div>
<script type="text/javascript">
  $('.aktif').click(function(){
    var id_pegawai  = $(this).attr('id_pegawai');
    var status      = $(this).attr('status');
    var mas_ker_akh = $('tr#'+id_pegawai+'').find(".masa_kerja_akhir").html();
    $.ajax({
      url: "<?php echo base_url()."dasbor_superadmin/data_pegawai/update_status" ?>",
      type: "post",
      dataType:"json",
      data: {
        id_pegawai:id_pegawai,
        status:status,mas_ker_akh:mas_ker_akh,
      },
      success: function(data) {
        alert("Data Status Pegawai Telah Di Update");
        $('tr#'+id_pegawai+'').fadeOut().fadeIn().css('background-color','#ccc');
        if($('tr#'+id_pegawai+'').find(".aktif").text()=='Aktif')
        {
          $('tr#'+id_pegawai+'').find(".aktif").text('Tidak Aktif').removeClass('btn btn-success').addClass('btn btn-danger'); 
          $('tr#'+id_pegawai+'').find(".masa_kerja_akhir").css({color:'red'}); 
        }else 
        {
          $('tr#'+id_pegawai+'').find(".aktif").text('Aktif').removeClass('btn btn-danger').addClass('btn btn-success');
        }
      }
    });
  });

</script>