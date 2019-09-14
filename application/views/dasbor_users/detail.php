<?php 
  if($this->session->flashdata('notifval')){
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('notifval');
    echo '</div>';

  }
  //Menentukan Usia
  $tgl_lhr =new datetime($data_pegawai->tgl_lahir);
  $tgl_skrng = new datetime();
  $usia= $tgl_skrng->diff($tgl_lhr);
  $tahun= $usia->y;

  //Hitung Masa Kerja
  $tgl_msk2 =new datetime($data_pegawai->tanggal_daftar);
  $tgl_skrng2 = new datetime();
  $masa_krj2= $tgl_skrng2->diff($tgl_msk2);
  $tahun2= $masa_krj2->y;
  $bulan2= $masa_krj2->m;
  $hari2= $masa_krj2->d;
?>
<div class="row-fluid">
<div class="widget-box">
<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#tab1">Data Pegawai</a></li>
    <li><a data-toggle="tab" href="#tab2">Keluarga</a></li>
    <li><a data-toggle="tab" href="#tab3">Riwayat Jabatan</a></li>
    <li><a data-toggle="tab" href="#tab4">Pendidikan</a></li>
    <li><a data-toggle="tab" href="#tab5">Pelatihan</a></li>
    <li><a data-toggle="tab" href="#tab6">Penghargaan</a></li>
    <li><a data-toggle="tab" href="#tab7">Hukuman</a></li>
  </ul>
  </div>
<div class="widget-content tab-content">
  <div id="tab1" class="tab-pane active">
    <table class="table table-bordered">
      <tr>
        <td>No Pegawai</td>
        <td>:</td>
        <td><?php echo $data_pegawai->nip ?></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?php echo $data_pegawai->nama ?></td>
      </tr>
      <tr>
        <td>Tempat Lahir</td>
        <td>:</td>
        <td><?php echo $data_pegawai->tempat_lhr ?></td>
      </tr>
      <tr>
        <td>Tanggal Lahir</td>
        <td>:</td>
        <td><?php echo date("d F Y", strtotime($data_pegawai->tgl_lahir)) ?></td>
      </tr>
      <tr>
        <td>Nomor NPWP</td>
        <td>:</td>
        <td><?php echo $data_pegawai->no_npwp ?></td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td><?php echo $data_pegawai->jenis_kelamin ?></td>
      </tr>
      <tr>
        <td>Masa Kerja</td>
        <td>:</td>
        <td><?php echo $masa_krj2->y." Tahun ".$masa_krj2->m." Bulan ".$masa_krj2->d." Hari " ?></td>
      </tr>
      <tr>
        <td>Usia</td>
        <td>:</td>
        <td><?php echo $tahun." Tahun" ?></td>
      </tr>
      <tr>
        <td>Gaji</td>
        <td>:</td>
        <td><?php echo "Rp. ".number_format($data_pegawai->gaji,0,",",".") ?></td>
      </tr>
      <tr>
        <td>TKD</td>
        <td>:</td>
        <td><?php echo "Rp. ".number_format($data_pegawai->tkd,0,",",".") ?></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?php echo $data_pegawai->alamat ?></td>
      </tr>
    </table>
  </div>
  <div id="tab2" class="tab-pane">
    <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Keluarga</th>
              <th>Status Keluarga</th>
              <th>No KTP</th>
              <th>No KK</th>
              <th>Tanggal Lahir</th>
              <th>Status Kawin</th>
              <th>Pekerjaan</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $i=0;
              foreach ($data_pegawai_keluarga as $data_pegawai_keluarga) {
              $i++;
              //Hitung Masa Kerja
              $tgl_msk =new datetime($data_pegawai_keluarga->tanggal_daftar);
              $tgl_skrng = new datetime();
              $masa_krj= $tgl_skrng->diff($tgl_msk);
              $tahun= $masa_krj->y;
              $bulan= $masa_krj->m;
              $hari= $masa_krj->d;
            ?>
            <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $data_pegawai_keluarga->nama_anggota_keluarga ?></td>
              <td><?php echo $data_pegawai_keluarga->status_keluarga ?></td>
              <td><?php echo $data_pegawai_keluarga->no_ktp_keluarga ?></td>
              <td><?php echo $data_pegawai_keluarga->no_kk ?></td>
              <td><?php echo $data_pegawai_keluarga->tanggal_lahir ?></td>
              <td><?php echo $data_pegawai_keluarga->status_kawin ?></td>
              <td><?php echo $data_pegawai_keluarga->pekerjaan ?></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
  </div>
  <div id="tab3" class="tab-pane">
    <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Jabatan</th>
              <th>Nama Unit Kerja</th>
              <th>Penempatan</th>
              <th>Nomor SK</th>
              <th>Tanggal SK</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Selesai</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $i=0;
              foreach ($data_riwayat_jabatan as $data_riwayat_jabatan) {
              $i++;
              $url_edit = base_url('dasbor_users/dasbor/edit_jabatan/'.$data_riwayat_jabatan->id_riwayat_jabatan);
            ?>
            <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $data_riwayat_jabatan->nama_jabatan ?></td>
            <td><?php echo $data_riwayat_jabatan->nama_unit_kerja ?></td>
            <td><?php echo $data_riwayat_jabatan->penempatan ?></td>
            <td><?php echo $data_riwayat_jabatan->nomor_sk ?></td>
            <td><?php echo $data_riwayat_jabatan->tanggal_sk ?></td>
            <td><?php echo $data_riwayat_jabatan->tanggal_mulai ?></td>
            <td><?php echo $data_riwayat_jabatan->tanggal_selesai ?></td>
            <td><a class="btn btn-warning" href="#"><i class="icon-edit"></i></a> <a class="btn btn-danger" href="#"><i class="icon-trash"></i></a></td></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
  </div>
  <div id="tab4" class="tab-pane">
    <div class="widget-content nopadding">
      <table class="table table-bordered data-table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Sekolah</th>
            <th>Tingkat Pendidikan</th>
            <th>No STR</th>
            <th>Exp STR</th>
            <th>Ket STR</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $i=0;
            foreach ($data_pendidikan as $data_pendidikan) {
            $i++;
            $url_edit = base_url('dasbor_users/dasbor/edit_pendidikan/'.$data_pendidikan->id_data_pendidikan);
            //hitung expired STR
            $tgl_exp =new datetime($data_pendidikan->tanggal_exp_str);
            $tgl_skrng2 = new datetime();
            $masa_str2= $tgl_skrng2->diff($tgl_exp);
            $tahun2= $masa_str2->y;
            $bulan2= $masa_str2->m;
            $hari2= $masa_str2->d;
            //peringatan STR
            $tahun_str = date('Y-m-d',strtotime($data_pendidikan->tanggal_exp_str));
          ?>
          <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $data_pendidikan->sekolah ?></td>
          <td><?php echo $data_pendidikan->nama_pendidikan ?></td>
          <td><?php echo $data_pendidikan->nomor_str ?></td>
          <?php 
            if($data_pendidikan->nomor_str=="" or $data_pendidikan->nomor_str=="-" or $data_pendidikan->nomor_str==0){
          ?>
          <td>Tidak Memerlukan Tanggal STR</td>
          <?php
            }else{
          ?>
          <td><?php echo date('d-m-Y',strtotime($data_pendidikan->tanggal_exp_str)) ?></td>
          <?php
            }
          ?>
          <?php 
            if($data_pendidikan->nomor_str=="" or $data_pendidikan->nomor_str=="-" or $data_pendidikan->nomor_str==0){
          ?>
          <td>Tidak Memerlukan STR</td>
          <?php
            }else{
          ?>
          <td><?php if($tahun_str>date('Y-m-d')){echo "Masa berlaku STR anda akan habis dalam waktu <b>".$tahun2." Tahun ".$bulan2." Bulan ".$hari2." Hari </b>";}else if(date('Y-m-d')>$tahun_str){echo "Masa berlaku STR Anda Habis";}?></td>
          <?php
            }
          ?>
          <td><a class="btn btn-warning" href="#"><i class="icon-edit"></i></a> <a class="btn btn-danger" href="#"><i class="icon-trash"></i></a> <a class="btn btn-success" href="#"><i class="icon-search"></i></a></td>
          </tr>
          <?php
            }
          ?>
        </tbody>
      </table>
      </div>
  </div>
  <div id="tab5" class="tab-pane">
   <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pelatihan</th>
              <th>Tanggal Sertifikat</th>
              <th>Lokasi</th>
              <th>Jam Pelatihan</th>
              <th>Negara</th>
              <th>Uraian</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $i=0;
              foreach ($data_pelatihan as $data_pelatihan) {
              $i++;
            ?>
            <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $data_pelatihan->nama_diklat ?></td>
            <td><?php echo $data_pelatihan->tanggal_sertifikat ?></td>
            <td><?php echo $data_pelatihan->lokasi ?></td>
            <td><?php echo $data_pelatihan->jam_mulai.' - '.$data_pelatihan->jam_selesai ?></td>
            <td><?php echo $data_pelatihan->negara ?></td>
            <td><?php echo $data_pelatihan->uraian ?></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
  </div>
  <div id="tab6" class="tab-pane">
   <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Penghargaan</th>
              <th>Nomor SK</th>
              <th>Tanggal SK</th>
              <th>Uraian</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $i=0;
              foreach ($data_penghargaan as $data_penghargaan) {
              $i++;
            ?>
            <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $data_penghargaan->nama_penghargaan ?></td>
            <td><?php echo $data_penghargaan->nomor_sk ?></td>
            <td><?php echo $data_penghargaan->tanggal_sk ?></td>
            <td><?php echo $data_penghargaan->uraian ?></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
  </div>
  <div id="tab7" class="tab-pane">
    <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Hukuman</th>
              <th>Nomor SK</th>
              <th>Tanggal SK</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Selesai</th>
              <th>Masa Berlaku</th>
              <th>Yang Menetapkan</th>
              <th>Uraian</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $i=0;
              foreach ($data_hukuman as $data_hukuman) {
              $i++;
            ?>
            <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $data_hukuman->nama_hukuman ?></td>
            <td><?php echo $data_hukuman->nomor_sk ?></td>
            <td><?php echo $data_hukuman->tanggal_sk ?></td>
            <td><?php echo $data_hukuman->tanggal_mulai ?></td>
            <td><?php echo $data_hukuman->tanggal_selesai ?></td>
            <td><?php echo $data_hukuman->masa_berlaku ?></td>
            <td><?php echo $data_hukuman->pejabat_menetapkan ?></td>
            <td><?php echo $data_hukuman->uraian ?></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
  </div>
</div>
</div>
</div>
