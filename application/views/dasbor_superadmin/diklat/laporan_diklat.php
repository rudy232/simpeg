<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<?php 
  if($this->session->flashdata('notifval')){
    echo '<div class="alert alert-success alert-block">';
    echo $this->session->flashdata('notifval');
    echo '</div>';

  }

  if($this->session->flashdata('tanggal_awal')){
    $tanggal_awal = $this->session->flashdata('tanggal_awal');
  }else{
    $tanggal_awal="";
  }

  if($this->session->flashdata('tanggal_akhir')){
    $tanggal_akhir = $this->session->flashdata('tanggal_akhir');
  }else{
    $tanggal_akhir="";
  }

  if($this->session->flashdata('penyelenggara')){
    $penyelenggara = $this->session->flashdata('penyelenggara');
  }else{
    $penyelenggara="";
  }

  if($this->session->flashdata('anggaran')){
    $anggaran = $this->session->flashdata('anggaran');
  }else{
    $anggaran="";
  }
?>
<div class="row-fluid">
  <div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-search"></i></span>
        <h5>Filter Pencharian</h5>
     </div>
     <div class="widget-content padding">
      <form action="<?php echo base_url('dasbor_superadmin/laporan_diklat/filter_search') ?>" method="POST">
        <div class="form-group">
          <input type="text" class="span3 datepicker" name="tanggal_awal" id="tanggal_awal" autocomplete="off" placeholder="Masukan Tanggal Awal" value="<?php echo $tanggal_awal; ?>" />
        </div>
        <div class="form-group">
          <input type="text" class="span3 datepicker" name="tanggal_akhir" id="tanggal_akhir" autocomplete="off" placeholder="Masukan Tanggal Akhir" value="<?php echo $tanggal_akhir; ?>" />
        </div>
        <div class="form-group">
          <select class="span3" name="penyelenggara" data-placeholder="Berdasarkan Nama Penyelenggara">
            <?php 
              foreach ($data_pelatihan as $data_pelatihan) {
            ?>
              <option value="<?php echo $penyelenggara; ?>"><?php echo $penyelenggara; ?></option>
              <option value="">Nama Penyelenggara</option>
              <option value="<?php echo $data_pelatihan->penyelenggara ?>"><?php echo $data_pelatihan->penyelenggara ?></option>
            <?php
              }
            ?>
          </select>
        </div>
        <br/>
        <div class="form-group">
          <select class="span3" name="nama_pelatihan" data-placeholder="Berdasarkan Nama Pelatihan">
            <?php 
              foreach ($data_nama_pelatihan as $data_nama_pelatihan) {
            ?>
              <option value="">Nama Penyelenggara</option>
              <option value="<?php echo $data_nama_pelatihan->id_pelatihan ?>"><?php echo $data_nama_pelatihan->nama_pelatihan ?></option>
            <?php
              }
            ?>
          </select>
        </div>
        <br/>
        <div class="form-group">
          <select class="span3" name="anggaran" data-placeholder="Berdasarkan Anggaran">
              <option value="<?php echo $anggaran ?>"><?php echo $anggaran ?></option>
              <option value="">Anggaran</option>
              <option value="SUBSIDI">SUBSIDI</option>
              <option value="BLUD">BLUD</option>
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
          <th>Penyelenggara</th>
          <th>Nama Pelatihan</th>
          <th>Uraian</th>
          <th>Nama Peserta</th>
          <th>Jenis Anggaran</th>
          <th>Biaya</th>
          <th>Lokasi</th>
          <th>Tanggal Pelatihan</th>
          <th>Jam Pelatihan</th>
          <th>Aksi</th>
          <th>Dokumen</th>
        </tr>
      </thead>  
      <tbody>
        <?php 
          $i=0;
          foreach ($data_diklat as $data_diklat) {
          $i++;
        ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $data_diklat->penyelenggara ?></td>
          <td><?php echo $data_diklat->nama_pelatihan ?></td>
          <td>
            <?php 
              echo $data_diklat->uraian."<br/>";
              echo "<strong>Undangan  :</strong> ".$data_diklat->undangan."<br/>"; 
              echo "<strong>Disposisi :</strong> ".$data_diklat->disposisi."<br/>"; 
              echo "<strong>Surat Tugas :</strong> ".$data_diklat->surat_tugas."<br/>"; 
              echo "<strong>Dokumentasi Foto :</strong> ".$data_diklat->dokumentasi_foto."<br/>"; 
              echo "<strong>Materi Pelatihan :</strong> ".$data_diklat->materi_pelatihan."<br/>"; 
              echo "<strong>Notulensi :</strong> ".$data_diklat->notulensi."<br/>"; 
              echo "<strong>Laporan Hasil Diklat :</strong> ".$data_diklat->laporan_hasil_diklat."<br/>"; 
              echo "<strong>Sertifikat :</strong> ".$data_diklat->sertifikat."<br/>"; 
              echo "<strong>Kwetansi Materai :</strong> ".$data_diklat->kwetansi_materai."<br/>"; 
              echo "<strong>Daftar Hadir :</strong> ".$data_diklat->daftar_hadir."<br/>"; 
              echo "<strong>Surat Pernyataan :</strong> ".$data_diklat->surat_pernyataan;  
            ?>
          </td>
          <td><?php echo $data_diklat->nama ?></td>
          <td><?php echo $data_diklat->anggaran ?></td>
          <td><?php echo "Rp".number_format($data_diklat->biaya,0,",","."); ?></td>
          <td><?php echo $data_diklat->lokasi ?></td>
          <td><?php echo $data_diklat->tanggal_sertifikat.' s/d '.$data_diklat->tanggal_sertifikat2 ?></td>
          <td><?php echo $data_diklat->jam_mulai.' s/d '.$data_diklat->jam_selesai ?></td>
          <?php
            if($data_diklat->anggaran=="SUBSIDI"){
          ?>  
            <td><a class="disable_update btn btn-default">UPDATE</a></td>
          <?php
            }else{
          ?>
            <td><a class="btn btn-success" href="<?php echo base_url('dasbor_superadmin/data_pegawai/pelatihan2/'.$data_diklat->id_update_pelatihan.'/'.$data_diklat->id_update_pegawai); ?>">UPDATE</a></td>
          <?php
            }
          ?>
          <td><a class="btn btn-warning" href="<?php echo base_url('dasbor_superadmin/laporan_diklat/dokumen_diklat/'.$data_diklat->id_update_pegawai.'/'.$data_diklat->id_data_diklat) ?>">Dokumen</a></td>
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
    $("#tanggal_awal").datepicker( {
        format: "yyyy-mm-dd",
    });

    $("#tanggal_akhir").datepicker( {
        format: "yyyy-mm-dd",
    });

    $('.disable_update').click(function(){
      alert("Pelatihan Dengan Anggaran Subsidi Tidak Membutuhkan Update SPJ, Beritahu Administrator jika ini sebuah kesalahan");
    });
</script>