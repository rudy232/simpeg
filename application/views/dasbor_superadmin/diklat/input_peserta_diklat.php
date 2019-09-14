<?php 
  if($this->session->flashdata('notifval')){
    echo '<div class="alert alert-success alert-block">';
    echo $this->session->flashdata('notifval');
    echo '</div>';
    date_default_timezone_set("Asia/Jakarta");
  }
  echo form_open(base_url('dasbor_superadmin/input_diklat/tambah_peserta_diklat'));
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
        <td><label>Nama Peserta</label></td>
        <td>
        <select name="nama_peserta[]" id="nama_peserta" class="span5 nama_peserta" data-placeholder="Masukan Nama Peserta" multiple="multiple">
            <option value="">Nama Peserta</option>
              <?php 
                foreach ($list_pegawai as $list_pegawai) {
              ?>
                <option value="<?php echo $list_pegawai->id_data_pegawai ?>"><?php echo $list_pegawai->nama ?></option>
              <?php
                }
              ?>
        </select>
        </td>
      </tr>
      <tr>
        <td><label>Nama Diklat</label></td>
        <td>
        <select name="id_master_pelatihan" id="id_master_pelatihan" class="span5 id_master_pelatihan" data-placeholder="Masukan Nama Diklat">
            <option value="">Nama Diklat</option>
              <?php 
                foreach ($master_pelatihan as $master_pelatihan) {
              ?>
                <option value="<?php echo $master_pelatihan->id_pelatihan ?>"><?php echo $master_pelatihan->nama_pelatihan ?></option>
              <?php
                }
              ?>
        </select>
        </td>
      </tr>
      <tr>
        <td><label class="control-label">Penyelenggara</label></td>
        <td>
          <input type="text" name="penyelenggara" placeholder="Masukan Nama Penyelenggara" >
        </td>
      </tr>
      <tr class="control-group">
        <td><label class="control-label">Anggaran</label></td>
        <td>
          <select name="anggaran">
            <option value="SUBSIDI">SUBSIDI</option>
            <option value="BLUD">BLUD</option>
          </select>
        </td>
      </tr>
      <tr>
        <td><label class="control-label">Biaya</label></td>
        <td>
          <input type="text" name="biaya" class="biaya" placeholder="Masukan Biaya Pelatihan" >
        </td>
      </tr>
      <tr>
        <td><label class="control-label">Uraian</label></td>
        <td>
          <input type="text" name="uraian_pelatihan" placeholder="Masukan Uraian" >
        </td>
      </tr>
      <tr>
        <td><label class="control-label">Lokasi</label></td>
        <td>
          <input type="text" name="lokasi" placeholder="Masukan Lokasi">
        </td>
      </tr>
      <tr>
        <td><label class="control-label">Tanggal Pelatihan</label></td>
        <td>
          <input type="text" name="tanggal_sertifikat" placeholder="Tanggal Pelatihan Mulai" data-date-format="yyyy-mm-dd" class="datepicker span5" autocomplete="off">
          <br/>
          <br/>
          <input type="text" name="tanggal_sertifikat2" placeholder="Tanggal Pelatihan Akhir" data-date-format="yyyy-mm-dd" class="datepicker span5" autocomplete="off">
        </td>
      </tr>
      <tr>
        <td><label class="control-label">Jam Mulai</label></td>
        <td>
          <input type="time" name="jam_mulai" placeholder="Masukan Jam Mulai" >
        </td>
      </tr>
      <tr>
        <td><label class="control-label">Jam Selesai</label></td>
        <td>
          <input type="time" name="jam_selesai" placeholder="Masukan Tempat Sekolah" >
        </td>
      </tr>
      <tr>
        <td><label class="control-label">Negara</label></td>
        <td>
          <input type="text" name="negara" placeholder="Masukan Negara" />
        </td>
      </tr>
    </table>
    <input type="submit" name="form_submit" class="btn btn-success" value="USULKAN" style="float: right;">
  </div>
</div>
</div>
</div>
<script type="text/javascript">
	//date picker setting
    $(".datepicker").datepicker();

    $('input.biaya').keyup(function(event) {
      // skip for arrow keys
      if(event.which >= 37 && event.which <= 40) return;
      // format number
      $(this).val(function(index, value) {
        return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      });
    });
</script>