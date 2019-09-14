<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<?php 
  if($this->session->flashdata('notifval')){
    echo '<div class="alert alert-success alert-block">';
    echo $this->session->flashdata('notifval');
    echo '</div>';

  }

  if($this->session->flashdata('log_user')){
    $log_user = $this->session->flashdata('log_user');
  }else{
    $log_user="";
  }

  if($this->session->flashdata('log_tanggal')){
    $log_tanggal = $this->session->flashdata('log_tanggal');
  }else{
    $log_tanggal="";
  }

?>
<div class="row-fluid">
  <div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-search"></i></span>
        <h5>Filter Pencharian</h5>
     </div>
     <div class="widget-content padding">
      <form action="<?php echo base_url('dasbor_superadmin/log/filter_search') ?>" method="POST">
        <div class="form-group">
          <input type="text" class="span3 datepicker" name="log_tanggal" id="log_tanggal" autocomplete="off" placeholder="Masukan Tanggal Awal" value="<?php echo $log_tanggal; ?>" />
        </div>
        <div class="form-group">
          <select class="span3" name="log_user" data-placeholder="Berdasarkan Nama User">
            <?php 
              foreach ($data_nama_user as $data_nama_user) {
            ?>
            <option value="<?php echo $log_user ?>"><?php echo $log_user ?></option>
              <option value="">Nama User</option>
              <option value="<?php echo $data_nama_user->log_user ?>"><?php echo $data_nama_user->log_user ?></option>
            <?php
              }
            ?>
          </select>
        </div>
        <br/>
        <div class="form-group">
          <input type="submit" name="submit" class="span1 btn btn-info" value="GO!">
          <input type="submit" name="submit" class="btn btn-success" value="Export ke Excel">
        </div>        
      </form>
    </div>
  </div>
</div>

<div class="row-fluid">
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5><?php  echo $title?></h5>
  </div>
  <div class="widget-content nopadding">
    <table class="table table-bordered data-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama User</th>
          <th>Kode User / IP Addreas</th>
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
          <td><?php if($data_log->nama==""){echo "<strong style='color:red;'>Tidak Terdaftar</strong>";}else{ echo $data_log->nama;} ?></td>
          <td><?php echo $data_log->log_user ?></td>
          <td><?php echo date('d-m-Y H:i:s',strtotime($data_log->log_time)) ?></td>
          <td><?php echo $data_log->log_desc ?></td>
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
    //date picker setting
    $("#log_tanggal").datepicker( {
        format: "yyyy-mm-dd",
    });

    $('.disable_update').click(function(){
      alert("Pelatihan Dengan Anggaran Subsidi Tidak Membutuhkan Update SPJ, Beritahu Administrator jika ini sebuah kesalahan");
    });
</script>