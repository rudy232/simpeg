<?php 
  if($this->session->flashdata('notifval')){
    echo '<div class="alert alert-success alert-block">';
    echo $this->session->flashdata('notifval');
    echo '</div>';
    date_default_timezone_set("Asia/Jakarta");
  }
  echo form_open(base_url('dasbor_users/diklat/tambah_usulan_diklat'));
?>
<div class="row-fluid">
<div class="widget-box">
<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#tab1">Usulkan Diklat</a></li>
  </ul>
</div>
<div class="widget-content tab-content">
  <div id="tab1" class="tab-pane active">
    <table class="table table-bordered">
      <tr>
        <td><label>Nama Atasan Langsung</label></td>
        <td>:</td>
        <td>
        	<select name="nama_atasan" id="nama_atasan" class="span5 nama_atasan" data-placeholder="Masukan Nama Atasan">
        		<option value="">Nama Atasan</option>
          		<?php 
          			foreach ($list_nama_atasan as $list_nama_atasan) {
          		?>
          			<option value="<?php echo $list_nama_atasan->nama_atasan ?>"><?php echo $list_nama_atasan->nama_atasan ?></option>
          		<?php
          			}
          		?>
        	</select>
        </td>
      </tr>
      <tr>
        <td><label>Nama Diklat</label></td>
        <td>:</td>
        <td><input type="text" name="nama_diklat" id="nama_diklat" class="span5 nama_diklat" placeholder="Masukan Nama Diklat" required="required" /></td>
      </tr>
      <tr>
      	<td><label>Nama Peserta</label></td>
      	<td>:</td>
      	<td>
    		<select name="nama_peserta[]" id="nama_peserta" class="span5 nama_peserta" data-placeholder="Masukan Nama Peserta" multiple="multiple">
      			<option value="">Nama Atasan</option>
          		<?php 
          			foreach ($list_pegawai as $list_pegawai) {
          		?>
          			<option value="<?php echo $list_pegawai->nama ?>"><?php echo $list_pegawai->nama ?></option>
          		<?php
          			}
          		?>
    		</select>
      	</td>
      </tr>
      <tr>
      	<td><label>Nama Unit Kerja</label></td>
      	<td>:</td>
      	<td>
    		<select name="unit_kerja" id="unit_kerja" class="span5 unit_kerja" data-placeholder="Masukan Nama Unit Kerja">
      			<option value="<?php echo $this->session->userdata('unit_kerja'); ?>"><?php echo $this->session->userdata('unit_kerja'); ?></option>
    		</select>
      	</td>
      </tr>
      <tr>
        <td><label>Waktu Pelaksanaan (Prediksi)</label></td>
        <td>:</td>
        <td><input type="text" name="waktu_pelaksanaan" id="ambil_bulan" data-date="<?php echo date("m-Y") ?>" data-date-format="mm-yyyy"  class="datepicker span5" autocomplete="off"></td>
      </tr>
      <tr>
        <td><label>Biaya (Prediksi)</label></td>
        <td>:</td>
        <td><input type="text" name="biaya_pelatihan" id="biaya_pelatihan" class="span5 biaya_pelatihan" placeholder="Masukan Biaya Pelatihan"  required="required"/></td>
      </tr>
      <tr>
        <td><label>Nama Penyelenggara</label></td>
        <td>:</td>
        <td><input type="text" name="nama_penyelenggara" id="nama_penyelenggara" class="span5 nama_penyelenggara" placeholder="Masukan Penyelenggara"  required="required"/></td>
      </tr>
      <tr>
        <td><label>Lokasi Pelatihan</label></td>
        <td>:</td>
        <td><input type="text" name="lokasi_pelatihan" id="lokasi_pelatihan" class="span5 lokasi_pelatihan" placeholder="Masukan Lokasi Pelatihan"/></td>
      </tr>
    </table>
    <input type="submit" name="form_submit" class="btn btn-success" value="USULKAN" style="float: right;">
  </div>
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
        <tr id="<?php echo $usulan_diklat->id_diklat ?>">
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
          <td>
            <?php 
              if($usulan_diklat->status_diklat=="")
              {
            ?>
              <a class="btn btn-default">Tersimpan</a>
            <?php
              }else if($usulan_diklat->status_diklat=="Menunggu")
              {
            ?>
              <a class="btn btn-warning">Telah di Ajukan</a>
            <?php
              }else if($usulan_diklat->status_diklat=="Setujui"){
            ?>
              <a class="btn btn-success">di Setujui</a>
            <?php
              }else{
            ?>
              <a class="btn btn-danger">di Tolak</a>
            <?php
              }  
            ?>
          </td>
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
    $("#ambil_bulan").datepicker( {
        format: "mm-yyyy",
        viewMode: "months", 
        minViewMode: "months"
    });

    /*$('#nama_diklat').keyup(function(){
      if($(this).val()=="IHT EWS, Code Blue dan Triage")
      {
        $('#nama_peserta > option').prop("selected",true);    
      }else{
        $('#nama_peserta > option').prop("selected",false);
      }
    });*/
    

    $('input.biaya_pelatihan').keyup(function(event) {
      // skip for arrow keys
      if(event.which >= 37 && event.which <= 40) return;
      // format number
      $(this).val(function(index, value) {
        return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      });
    });
</script>