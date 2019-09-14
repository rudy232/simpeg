<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<?php 
  if($this->session->flashdata('notifval')){
    echo '<div class="alert alert-success alert-block">';
    echo $this->session->flashdata('notifval');
    echo '</div>';
  }

  if($this->session->flashdata('notifail')){
    echo '<div class="alert alert-danger alert-block">';
    echo $this->session->flashdata('notifail');
    echo '</div>';
  }
  $query = $this->db->query("SELECT * FROM data_kuota_cuti");
  if($query->num_rows()==""){
  	$disabled = "disabled";
  }else{
  	$disabled="";
  }
  $query2 = $this->db->query("SELECT COUNT(nama) as total FROM data_pegawai");
  $max_kuota="";
  foreach ($query2->result() as $val) {
    $max_kuota .=  ceil(($val->total*5)/100);
  }
?>
<div class="row-fluid">
<div class="widget-box">
	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    	<h5><?php  echo $title?></h5>
 	</div>
 	<div class="widget-content padding">
 		<caption><b style="color: red;">*Note : Jika Form Setting Cuti Disable Maka Silahkan Tambah Data Jumlah Kuota / Unit kerja Terlebih Dahulu</b></caption>
 		<form action="<?php echo base_url('dasbor_superadmin/cuti/update_setting_cuti') ?>" method="post" class="form-horizontal">
 			<div class="control-group">
              <label class="control-label">Maksimal Jumlah Kuota Pegawai Cuti / Hari</label>
              <div class="controls">
                <input type="text" class="span5" placeholder="Masukan jumlah kuota cuti Pegawai / Hari" name="jml_kuota" id="jml_kuota" value="<?php echo $max_kuota ?>" <?php echo $disabled ?>/><br/>
                <span>Dasar : 5% dari Seluruh Jumlah Pegawai ( <b>(Jumlah Pegawai * 5)</b> / 100)</span>
                <div id="errmsg"></div>
              </div>
            </div>
 			<div class="control-group">
              <label class="control-label">Maksimal Pengajuan Cuti Kembali Setelah Berapa Bulan ?</label>
              <div class="controls">
                <input type="text" class="span5" placeholder="Masukan jumlah Bulan Pengajuan Cuti Kembali" name="batas_pengajuan" id="batas_pengajuan" value="<?php echo $data_setting->batas_pengajuan ?>" <?php echo $disabled ?>/><br/>
                <span>listen : Izinkan pegawai untuk mengajukan cuti kembali setelah berapa bulan ? dari semenjak pegawai tersebut mengambil cuti</span>
                <div id="errmsg2"></div>
              </div>
            </div>
 			<div class="control-group">
              <label class="control-label">Jumlah Pegawai Yang Di Izinkan Cuti Dalam Satu Unit Kerja ?</label>
              <div class="controls">
              	<select name="unit_kerja" id="unit_kerja" class="span3" data-placeholder="Pilih Unit Kerja" <?php echo $disabled ?>>
              		<option></option>
              		<?php 
              		$i=0;
              		foreach ($unit_kerja as $unit_kerja) {
              		$i++;
              		?>
              		<option value="<?php echo $unit_kerja->nama_unit_kerja ?>"><?php echo $i.". ".$unit_kerja->nama_unit_kerja ?></option>
              		<?php
              		}
              		?>
              	</select>
                &nbsp;&nbsp;<input type="text" name="jml_cuti" id="jml_cuti" />
                <br/>Jatah Kuota Cuti / unit kerja = <span id="ket"></span>
                <br/>
                <span>listen : membatasi jumlah pegawai untuk mengajukan cuti dalam satu unit kerja</span>
                <div id="errmsg2"></div>
              </div>
            </div>
            <div class="form-actions">
              <input type="submit" name="update_data" id="update_data" class="btn btn-success" value="SETTING KUOTA">
              <input type="submit" name="update_data" id="update_data" class="btn btn-success" value="SET UNTUK SEMUA">
            </div>
        </form>
 	</div>
</div>
</div>
<div class="row-fluid">
<div class="widget-box">
	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    	<h5>Data Jumlah Kuota Cuti / Unit Kerja</h5>
 	</div>
 	<div class="widget-content padding">
 		<table class="table table-bordered data-table">
 			<thead>
 				<tr>
 					<th>Nama Unit Kerja</th>
 					<th>Jumlah Kuota Seluruh SDM</th>
 					<th>Longkap Bulan Pengajuan Cuti</th>
          <th>Kuota Cuti / Unit kerja</th>
 					<th>Action/th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php 
 				foreach ($list_kuota_cuti as $list_kuota_cuti) {
 				?>
 				<tr>
 					<td><?php echo $list_kuota_cuti->nama_unit_kerja ?></td>
 					<td><?php echo $list_kuota_cuti->jml_kuota ?></td>
 					<td><?php echo $list_kuota_cuti->batas_pengajuan ?></td>
          <td><?php echo $list_kuota_cuti->jml_cuti ?></td>
 					<td><a href="<?php echo base_url('dasbor_superadmin/cuti/edit_kuota/'.$list_kuota_cuti->id_kuota) ?>" class="btn btn-primary">Edit</a></td>
 				</tr>
 				<?php
 				}
 				?>
 			</tbody>
 		</table>
 		<div class="form-actions">
        	<a href="<?php echo base_url('dasbor_superadmin/cuti/tambah_list_setting_kuota') ?>" class="btn btn-success">TAMBAH</a>
        </div>
 	</div>
</div>
</div>
<div class="span8">
<div class="widget-box">
	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#tab1">Form Format Lama</a></li>
      <li><a data-toggle="tab" href="#tab2">Form Format Baru</a></li>
    </ul>
 	</div>
 	<div class="widget-content tab-content">
    <div id="tab1" class="tab-pane active">
    <form action="<?php echo base_url('dasbor_superadmin/cuti/update_setting_cuti') ?>" method="post" class="form-horizontal">
      <div class="control-group">
        <label class="control-label">Lampiran</label>
        <div class="controls">
          <input type="text" name="lampiran" placeholder="Masukan Lampiran / Sumber " id="lampiran" class="span5 lampiran" value="<?php echo $data_setting_surat_cuti->lampiran ?>" autocomplete="off" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Nomor Surat</label>
        <div class="controls">
          <input type="text" name="nomor_surat" placeholder="Masukan Nomor Surat" id="nomor_surat" class="span5 nomor_surat" value="<?php echo $data_setting_surat_cuti->nomor_surat ?>" autocomplete="off" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Tanggal Surat</label>
        <div class="controls">
          <input type="text" name="tanggal_surat" placeholder="Masukan Tanggal Surat" id="tanggal_surat" class="span5 tanggal_surat" value="<?php echo $data_setting_surat_cuti->tanggal_surat ?>" autocomplete="off" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Jenis Cuti</label>
        <div class="controls">
          <input type="text" name="jenis_cuti" placeholder="Masukan Jenis Cuti" id="jenis_cuti" class="span5 jenis_cuti" value="<?php echo $data_setting_surat_cuti->jenis_cuti ?>" autocomplete="off" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Pejabat Rumah Sakit</label>
        <div class="controls">
          <input type="text" name="pejabat_rumah_sakit" placeholder="Masukan Pejabat Rumah Sakit" id="pejabat_rumah_sakit" class="span5 pejabat_rumah_sakit" value="<?php echo $data_setting_surat_cuti->pejabat_rumah_sakit ?>" autocomplete="off" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Dari Wilayah</label>
        <div class="controls">
          <input type="text" name="dari_wilayah" placeholder="Masukan Nama Dari Wilayah" id="dari_wilayah" class="span5 dari_wilayah" value="<?php echo $data_setting_surat_cuti->dari_wilayah ?>" autocomplete="off" />
              </div>
            </div>
      <div class="control-group">
        <label class="control-label">Wilayah</label>
        <div class="controls">
          <input type="text" name="wilayah" placeholder="Masukan Nama Wilayah" id="wilayah" class="span5 wilayah" value="<?php echo $data_setting_surat_cuti->wilayah ?>" autocomplete="off" />
              </div>
            </div>
      <div class="control-group">
        <label class="control-label">Isi Line 1</label>
        <div class="controls">
          <input type="text" name="isi_line_1" placeholder="Masukan Nama Isi Line 1" id="isi_line_1" class="span5 isi_line_1" value="<?php echo $data_setting_surat_cuti->isi_line_1 ?>" autocomplete="off" />
              </div>
            </div>
      <div class="control-group">
        <label class="control-label">Satuan Organisasi</label>
        <div class="controls">
          <input type="text" name="satuan_organisasi" placeholder="Masukan Satuan Organisasi" id="satuan_organisasi" class="span5 satuan_organisasi" value="<?php echo $data_setting_surat_cuti->satuan_organisasi ?>" autocomplete="off" />
              </div>
            </div>
      <div class="control-group">
        <label class="control-label">Isi Line 2</label>
        <div class="controls">
          <input type="text" name="isi_line_2" placeholder="Masukan Nama Isi Line 2" id="isi_line_2" class="span5 isi_line_2" value="<?php echo $data_setting_surat_cuti->isi_line_2 ?>" autocomplete="off" />
              </div>
            </div>
      <div class="control-group">
        <label class="control-label">Isi Line 3</label>
        <div class="controls">
          <input type="text" name="isi_line_3" placeholder="Masukan Nama Isi Line 3" id="isi_line_3" class="span5 isi_line_3" value="<?php echo $data_setting_surat_cuti->isi_line_3 ?>" autocomplete="off" />
              </div>
            </div>
      <div class="control-group">
        <label class="control-label">Isi Line 4</label>
        <div class="controls">
          <input type="text" name="isi_line_4" placeholder="Masukan Nama Isi Line 4" id="isi_line_4" class="span5 isi_line_4" value="<?php echo $data_setting_surat_cuti->isi_line_4 ?>" autocomplete="off" />
              </div>
            </div>
      <div class="control-group">
        <label class="control-label">Isi Line 5</label>
        <div class="controls">
          <input type="text" name="isi_line_5" placeholder="Masukan Nama Isi Line 5" id="isi_line_5" class="span5 isi_line_5" value="<?php echo $data_setting_surat_cuti->isi_line_5 ?>" autocomplete="off" />
              </div>
            </div>
      <div class="control-group">
        <label class="control-label">Isi Line 6</label>
        <div class="controls">
          <input type="text" name="isi_line_6" placeholder="Masukan Nama Isi Line 6" id="isi_line_6" class="span5 isi_line_6" value="<?php echo $data_setting_surat_cuti->isi_line_6 ?>" autocomplete="off" />
              </div>
            </div>
      <div class="control-group">
        <label class="control-label">Isi Line 7</label>
        <div class="controls">
          <input type="text" name="isi_line_7" placeholder="Masukan Nama Isi Line 7" id="isi_line_7" class="span5 isi_line_7" value="<?php echo $data_setting_surat_cuti->isi_line_7 ?>" autocomplete="off" />
              </div>
            </div>
      <div class="control-group">
        <label class="control-label">Isi Line 8</label>
        <div class="controls">
          <input type="text" name="isi_line_8" placeholder="Masukan Nama Isi Line 8" id="isi_line_8" class="span5 isi_line_8" value="<?php echo $data_setting_surat_cuti->isi_line_8 ?>" autocomplete="off" />
              </div>
            </div>
      <div class="control-group">
        <label class="control-label">Isi Line 9</label>
        <div class="controls">
          <input type="text" name="isi_line_9" placeholder="Masukan Nama Isi Line 9" id="isi_line_9" class="span5 isi_line_9" value="<?php echo $data_setting_surat_cuti->isi_line_9 ?>" autocomplete="off" />
              </div>
            </div>
      <div class="control-group">
        <label class="control-label">Isi Line 10</label>
        <div class="controls">
          <input type="text" name="isi_line_10" placeholder="Masukan Nama Isi Line 10" id="isi_line_10" class="span5 isi_line_10" value="<?php echo $data_setting_surat_cuti->isi_line_10 ?>" autocomplete="off" />
              </div>
            </div>
      <div class="control-group">
        <label class="control-label">Isi Line 11</label>
        <div class="controls">
          <input type="text" name="isi_line_11" placeholder="Masukan Nama Isi Line 11" id="isi_line_11" class="span5 isi_line_11" value="<?php echo $data_setting_surat_cuti->isi_line_11 ?>" autocomplete="off" />
              </div>
            </div>
      <div class="control-group">
        <label class="control-label">Isi Line 12</label>
        <div class="controls">
          <input type="text" name="isi_line_12" placeholder="Masukan Nama Isi Line 12" id="isi_line_12" class="span5 isi_line_12" value="<?php echo $data_setting_surat_cuti->isi_line_12 ?>" autocomplete="off" />
              </div>
            </div>
      <div class="control-group">
        <label class="control-label">Isi Line 13</label>
        <div class="controls">
          <input type="text" name="isi_line_13" placeholder="Masukan Nama Isi Line 13" id="isi_line_13" class="span5 isi_line_13" value="<?php echo $data_setting_surat_cuti->isi_line_13 ?>" autocomplete="off" />
              </div>
            </div>
      <div class="control-group">
        <label class="control-label">Isi Line 14</label>
        <div class="controls">
          <input type="text" name="isi_line_14" placeholder="Masukan Nama Isi Line 14" id="isi_line_14" class="span5 isi_line_14" value="<?php echo $data_setting_surat_cuti->isi_line_14 ?>" autocomplete="off" />
              </div>
            </div>
      <div class="control-group">
        <label class="control-label">Isi Line 15</label>
        <div class="controls">
          <input type="text" name="isi_line_15" placeholder="Masukan Nama Isi Line 15" id="isi_line_15" class="span5 isi_line_15" value="<?php echo $data_setting_surat_cuti->isi_line_15 ?>" autocomplete="off" />
              </div>
            </div>
            <div class="form-actions">
              <input type="submit" name="update_data" class="btn btn-success" value="SETTING SURAT CUTI">
            </div>
        </form>
 	  </div>
    <div id="tab2" class="tab-pane">
      <form action="<?php echo base_url('dasbor_superadmin/cuti/update_setting_cuti') ?>" method="post" class="form-horizontal">
        <div class="control-group">
          <label class="control-label">Nama Kepala Sub Bagian tata Usaha</label>
          <div class="controls">
            <input type="text" name="nama_kasubag" placeholder="Masukan Nama Kasubag " id="nama_kasubag" class="span5 nama_kasubag" value="<?php echo $data_setting_surat_cuti->isi_line_14 ?>" autocomplete="off" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">NIP Kasubag TU</label>
          <div class="controls">
            <input type="text" name="nip_kasubag" placeholder="Masukan NIP Kasubag" id="nip_kasubag" class="span5 nip_kasubag" value="<?php echo $data_setting_surat_cuti->isi_line_15 ?>" autocomplete="off" />
          </div>
        </div>
        <div class="form-actions">
          <input type="submit" name="update_data" class="btn btn-success" value="SETTING SURAT CUTI BARU">
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- -->
<div class="span8">
<div class="widget-box hightlight" style="background: white;">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#tab3">Form Format Lama</a></li>
      <li><a data-toggle="tab" href="#tab4">Form Format Baru</a></li>
    </ul>
  </div>
  <div class="widget-content tab-content">
    <div id="tab3" class="tab-pane active">
      <div class="widget-content padding" style="padding-left: 50px;">
  <br/>
  <br/>
  <table cellspacing="0" align="left" cellpadding="1">
    <tr>
      <td style="width:320px;"></td>
      <td style="width:100px;">Lampiran</td>
      <td style="width:10px;">:</td>
      <td style="width:300px;"><span id="contoh_lampiran"><?php echo $data_setting_surat_cuti->lampiran ?></span></td>
    </tr>
    <tr>
      <td style="width:320px;"></td>
      <td style="width:100px;">Nomor</td>
      <td style="width:10px;">:</td>
      <td style="width:300px;"><span id="contoh_nomor_surat"><?php echo $data_setting_surat_cuti->nomor_surat ?></span></td>
    </tr>
    <tr>
      <td style="width:320px;"></td>
      <td style="width:100px;">Tanggal</td>
      <td style="width:10px;">:</td>
      <td style="width:300px;"><span id="contoh_tanggal_surat"><?php echo $data_setting_surat_cuti->tanggal_surat ?></span></td>
    </tr>
  </table>
  <br/>
  <span id="contoh_jenis_cuti"><?php echo $data_setting_surat_cuti->jenis_cuti ?></span><br/>
  <br/>
  <table cellspacing="0" align="left" cellpadding="1">
    <tr>
      <td style="width:320px;"></td>
      <td>
        <span id="contoh_dari_wilayah"><?php echo $data_setting_surat_cuti->dari_wilayah ?></span>,<b>10 Oktober 2017 (Otomatis Menyesuaikan)</b><br/>
        Kepada Yth<br/>
        <span id="contoh_pejabat_rumah_sakit"><?php echo $data_setting_surat_cuti->pejabat_rumah_sakit ?></span><br/>
        di - <br/>
        &nbsp;&nbsp;&nbsp; <span id="contoh_wilayah"><?php echo $data_setting_surat_cuti->wilayah ?></span>
      </td>
    </tr>
  </table>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/> 
  <br/> 
  <span id="contoh_isi_line_1"><?php echo $data_setting_surat_cuti->isi_line_1 ?></span> <br/>
  <br/>
  <table cellspacing="0">
    <tr>
      <td style="width:200px;">Nama</td>
      <td style="width:10px;">:</td>
      <td><b>Nama Pemohon Cuti (Otomatis Menyesuaikan)</b></td>
    </tr>
    <tr>
      <td style="width:200px;">NIP / NRK</td>
      <td style="width:10px;">:</td>
      <td><b>1234567891012345678 (Otomatis Menyesuaikan)</b></td>
    </tr>
    <tr>
      <td style="width:200px;">Pangkat Golongan</td>
      <td style="width:10px;">:</td>
      <td><b>III.C (Otomatis Menyesuaikan)</b></td>
    </tr>
    <tr>
      <td style="width:200px;">Jabatan</td>
      <td style="width:10px;">:</td>
      <td><b>Nama Jabatan (Otomatis Menyesuaikan)</b></td>
    </tr>
    <tr>
      <td style="width:200px;">Satuan Organisasi</td>
      <td style="width:10px;">:</td>
      <td><span id="contoh_satuan_organisasi"><?php echo $data_setting_surat_cuti->satuan_organisasi ?></span></td>
    </tr>
  </table>
  <br/>
  <span id="contoh_isi_line_2"><?php echo $data_setting_surat_cuti->isi_line_2 ?></span><b> 2017 (Otomatis Menyesuaikan), </b><span id="contoh_isi_line_3"><?php echo $data_setting_surat_cuti->isi_line_3 ?></span><b> 3 (Tiga) (Otomatis Menyesuaikan) </b><span id="contoh_isi_line_4"><?php echo $data_setting_surat_cuti->isi_line_4 ?></span>,<br/>
  <span id="contoh_isi_line_5"><?php echo $data_setting_surat_cuti->isi_line_5 ?></span><b> 10 Oktober 2017 (Otomatis Menyesuaikan)</b><span id="contoh_isi_line_6"><?php echo $data_setting_surat_cuti->isi_line_6 ?></span> <b>13 Oktober 2017 (Otomatis Menyesuaikan)</b><br/>
  <span id="contoh_isi_line_7"><?php echo $data_setting_surat_cuti->isi_line_7 ?></span><b> Jakarta (Otomatis Menyesuaikan),</b> <span id="contoh_isi_line_8"><?php echo $data_setting_surat_cuti->isi_line_8 ?></span><b> 081288231163 (Otomatis Menyesuaikan)</b><br/>
  <br/>
  <span id="contoh_isi_line_9"><?php echo $data_setting_surat_cuti->isi_line_9 ?></span><br/>
  <br/>
  <br/>
  <table cellspacing="0" align="center" cellpadding="1" style="text-align: center;">
    <tr>
      <td style="width: 300px;"></td>
      <td>Hormat Saya,
      <br/>
      <br/>
      <br/>
      <br/>
      <b>Nama Pemohon (Otomatis Menyesuaikan)</b><br/>
      <b>Nip 1234567891012345678 (Otomatis Menyesuaikan)</b>
      </td>
    </tr>
  </table>
  <br/>
  <table  cellspacing="0" border="1" align="center" cellpadding="1" style="width: 700px;text-align: center;">
    <tr>
      <td><span id="contoh_isi_line_10"><?php echo $data_setting_surat_cuti->isi_line_10 ?></span></td>
      <td><span id="contoh_isi_line_11"><?php echo $data_setting_surat_cuti->isi_line_11 ?></span></td>
    </tr>
    <tr>
      <td rowspan="3">
      Selama menjalankan cuti, tugas saya<br/>
      Diserahkan kepada<br/>
      <br/>
      <br/>
      <br/>
      <br/>
      Nama Pengganti Cuti<br/>
      NIP 1234567891012345678
      </td>
      <td>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <b>Nama Atasan Langsung (Otomatis Menyesuaikan)</b><br/>
      NIP 1234567891012345678
      </td>
    </tr>
    <tr>
      <td><span id="contoh_isi_line_12"><?php echo $data_setting_surat_cuti->isi_line_12 ?></span></td>
    </tr>
    <tr>
      <td>
      <span id="contoh_isi_line_13"><?php echo $data_setting_surat_cuti->isi_line_13 ?></span><br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <span id="contoh_isi_line_14"><?php echo $data_setting_surat_cuti->isi_line_14 ?></span><br/>
      <span id="contoh_isi_line_15">NIP <?php echo $data_setting_surat_cuti->isi_line_15 ?></span><br/>
      </td>
    </tr>
  </table>
  </div>
    <div class="form-actions" style="text-align: center;">
      <span>Note : Tampilan pada contoh surat cuti ini akan merubah data di surat cuti pegawai pdf, karena terhubung secara langsung. </span>
    </div>
    </div>
    <div id="tab4" class="tab-pane">
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:none; width:640px">
  <tbody>
    <tr>
      <td style="width:308px;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      </td>
      <td style="width:362px;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      ANAK LAMPIRAN 1.b<br/>
      PERATURAN BADAN KEPEGAWAIAN NEGARA<br/>
      REPUBLIK INDONESIA<br/>
      NOMOR 24 TAHUN 2017<br/>
      TENTANG<br/>
      TATACARA PEMBERIAN CUTI PEGAWAI NEGERI SIPIL
      </td>
    </tr>
    <tr style="text-align:center;">
      <td style="width:308px;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      </td>
      <td style="width:332px;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      <br/>
      <br/>
      Jakarta, 09 januari 2018
      <br/>
      Kepada
      <br/>
      Yth. Direktur Otomatis
      <br/>
      di<br/>
      Jakarta
      </td>
    </tr>
  </tbody>
</table>
<p style="text-align:center;">FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</p>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:none; width:621px">
  <tbody>
    <tr>
      <td colspan="4" style="width:621px;border:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      <ol style="list-style-type:upper-roman;">
        <li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;">DATA PEGAWAI</li>
      </ol>
      </td>
    </tr>
    <tr>
      <td style="width:83px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama
      </td>
      <td style="width:208px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Otomatis</td>
      <td style="width:94px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIP
      </td>
      <td style="width:236px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Otomatis
      </td>
    </tr>
    <tr>
      <td style="width:83px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jabatan
      </td>
      <td style="width:208px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Otomatis</td>
      <td style="width:94px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Masa Kerja
      </td>
      <td style="width:236px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Otomatis
      </td>
    </tr>
    <tr>
      <td style="width:83px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Unit Kerja
      </td>
      <td colspan="3" style="width:539px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Otomatis</td>
    </tr>
  </tbody>
</table>
<br/>
<br/>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:none; width:621px">
  <tbody>
    <tr>
      <td colspan="4" style="width:621px;border:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      <ol style="list-style-type:upper-roman;">
        <li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="2">JENIS CUTI YANG DIAMBIL</li>
      </ol>
      </td>
    </tr>
    <tr>
      <td style="width:225px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      <ol>
        <li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;">Cuti Tahunan </li>
      </ol>
      </td>
      <td style="width:57px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      <input type="checkbox" name="agree" value="1" checked="checked" />
      </td>
      <td style="width:255px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      <ol>
        <li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="2">Cuti Besar</li>
      </ol>
      </td>
      <td style="width:85px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      
      </td>
    </tr>
    <tr>
      <td style="width:225px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      <ol>
        <li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="3">Cuti Sakit</li>
      </ol>
      </td>
      <td style="width:57px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      
      </td>
      <td style="width:255px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      <ol>
        <li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="4">Cuti Melahirkan</li>
      </ol>
      </td>
      <td style="width:85px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      
      </td>
    </tr>
    <tr>
      <td style="width:225px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      <ol>
        <li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="5">Cuti Karena Alasan Penting</li>
      </ol>
      </td>
      <td style="width:57px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      
      </td>
      <td style="width:255px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      <ol>
        <li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="6">Cuti di Luar Tanggungan Negara</li>
      </ol>
      </td>
      <td style="width:85px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      
      </td>
    </tr>
  </tbody>
</table>
<br/>
<br/>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:none; width:621px">
  <tbody>
    <tr>
      <td style="width:621px;border:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      <ol style="list-style-type:upper-roman;">
        <li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="3">ALASAN CUTI</li>
      </ol>
      </td>
    </tr>
    <tr>
      <td style="width:621px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Otomatis
      </td>
    </tr>
  </tbody>
</table>
<br/>
<br/>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:none">
  <tbody>
    <tr>
      <td colspan="6" style="width:616px;border:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      <ol style="list-style-type:upper-roman;">
        <li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="4">LAMANYA CUTI</li>
      </ol>
      </td>
    </tr>
    <tr>
      <td style="width:83px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Selama
      </td>
      <td style="width:170px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Otomatis
      </td>
      <td style="width:140px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;mulai tanggal
      </td>
      <td style="width:87px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Otomatis
      </td>
      <td style="width:47px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;s/d
      </td>
      <td style="width:89px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Otomatis
      </td>
    </tr>
  </tbody>
</table>
<br/>
<br/>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:none">
  <tbody>
    <tr>
      <td colspan="5" style="width:616px;border:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      <ol style="list-style-type:upper-roman;">
        <li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="5">CATATAN CUTI</li>
      </ol>
      </td>
    </tr>
    <tr>
      <td colspan="3" style="width:230px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      <ol>
        <li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;">CUTI TAHUNAN</li>
      </ol>
      </td>
      <td style="width:316px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      <ol>
        <li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="2">CUTI BESAR</li>
      </ol>
      </td>
      <td style="width:70px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      
      </td>
    </tr>
    <tr>
      <td style="width:91px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tahun
      </td>
      <td style="width:56px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sisa
      </td>
      <td style="width:82px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Keterangan
      </td>
      <td style="width:316px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      <ol>
        <li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="3">CUTI SAKIT</li>
      </ol>
      </td>
      <td style="width:70px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      
      </td>
    </tr>
    <tr>
      <td style="width:91px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;N-2
      </td>
      <td style="width:56px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Otomatis
      </td>
      <td style="width:82px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      
      </td>
      <td style="width:316px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      <ol>
        <li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="4">CUTI MELAHIRKAN</li>
      </ol>
      </td>
      <td style="width:70px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      
      </td>
    </tr>
    <tr>
      <td style="width:91px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;N-1
      </td>
      <td style="width:56px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Otomatis
      </td>
      <td style="width:82px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      
      </td>
      <td style="width:316px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      <ol>
        <li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="5">CUTI KARENA ALASAN PENTING</li>
      </ol>
      </td>
      <td style="width:70px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      
      </td>
    </tr>
    <tr>
      <td style="width:91px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;N
      </td>
      <td style="width:56px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Otomatis
      </td>
      <td style="width:82px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      
      </td>
      <td style="width:316px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      <ol>
        <li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="6">CUTI DI LUAR TANGGUNGAN NEGARA</li>
      </ol>
      </td>
      <td style="width:70px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      
      </td>
    </tr>
  </tbody>
</table>
<br/>
<br/>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:none;">
  <tbody>
    <tr>
      <td colspan="3" style="width:616px;border:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      <ol style="list-style-type:upper-roman;">
        <li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="6">ALAMAT SELAMA MENJALANKAN CUTI</li>
      </ol>
      </td>
    </tr>
    <tr>
      <td style="width:275px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Otomatis
      </td>
      <td style="width:139px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TELP
      </td>
      <td style="width:201px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Otomatis
      </td>
    </tr>
    <tr>
      <td style="width:376px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      </td>
      <td colspan="2" style="width:240px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;text-align:center;">
      <br/>
      Hormat Saya,
      <br/>
      <br/>
      (Otomatis)
      <br/>
      Otomatis
      </td>
    </tr>
  </tbody>
</table>
<br/>
<br/>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:none;">
  <tbody>
    <tr>
      <td colspan="3" style="width:616px;border:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      <ol style="list-style-type:upper-roman;">
        <li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="7">PENGGANTI CUTI</li>
      </ol>
      </td>
    </tr>
    <tr>
      <td style="width:376px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      </td>
      <td colspan="2" style="width:240px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;text-align:center;">
      <br/>
      Yang Menggantikan,
      <br/>
      <br/>
      (Otomatis)
      <br/>
      Otomatis
      </td>
    </tr>
  </tbody>
</table>
<br/>
<br/>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:none">
  <tbody>
    <tr>
      <td colspan="4" style="width:616px;border:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      <ol style="list-style-type:upper-roman;">
        <li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="8">PERTIMBANGAN ATASAN LANGSUNG</li>
      </ol>
      </td>
    </tr>
    <tr>
      <td style="width:140px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DISETUJUI
      </td>
      <td style="width:170px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PERUBAHAN
      </td>
      <td style="width:142px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DITANGGUHKAN
      </td>
      <td style="width:165px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TIDAK DISETUJUI
      </td>
    </tr>
    <tr>
      <td style="width:140px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      
      </td>
      <td style="width:170px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      
      </td>
      <td style="width:142px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      
      </td>
      <td style="width:165px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      
      </td>
    </tr>
    <tr>
      <td colspan="3" style="width:351px;border:none;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      
      </td>
      <td style="width:265px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;text-align:center;">
      <br/>
      <br/>
      <br/>
      Otomatis<br/>
      Otomatis
      </td>
    </tr>
  </tbody>
</table>
<br/>
<br/>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:none">
  <tbody>
    <tr>
      <td colspan="4" style="width:616px;border:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      <ol style="list-style-type:upper-roman;">
        <li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="9">KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI</li>
      </ol>
      </td>
    </tr>
    <tr>
      <td style="width:140px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DISETUJUI
      </td>
      <td style="width:170px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PERUBAHAN
      </td>
      <td style="width:142px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      DITANGGUHKAN
      </td>
      <td style="width:165px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TIDAK DISETUJUI
      </td>
    </tr>
    <tr>
      <td style="width:140px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      
      </td>
      <td style="width:170px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      
      </td>
      <td style="width:142px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      
      </td>
      <td style="width:165px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      
      </td>
    </tr>
    <tr>
      <td colspan="3" style="width:351px;border:none;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
      
      </td>
      <td style="width:265px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;text-align:center;">
      <br/>
      <br/>
      <span id="contoh_nama_kasubag"><?php echo $data_setting_surat_cuti->isi_line_14 ?></span><br/>
      <span id="contoh_nip_kasubag">NIP <?php echo $data_setting_surat_cuti->isi_line_15 ?></span>
      </td>
    </tr>
  </tbody>
</table>
    </div>
  </div>
  </div>
  </div>
 	

<script type="text/javascript">

    //input form tambah cuti numeric
    $("#jml_kuota").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsg").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });

    //input form tambah cuti numeric
    $("#batas_pengajuan").keypress(function (e) {
       //error validasi
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsg2").html("Hanya Karakter Nomor Yang di Izinkan").show().fadeOut(3000).css({'color':'red'});
          return false;
      }
     });

    $('#update_data').click(function(){
      var unit_kerja = $('#unit_kerja').val();
      if(unit_kerja==""){
        alert("Unit Kerja harap di Pilih");
      }
    });

    //-----------------------
    $("#unit_kerja").click(function(){
      var nama_unit_kerja = $('#unit_kerja').val();
      $.post('<?php echo base_url('dasbor_superadmin/cuti/select_jml_unit') ?>',{nama_unit_kerja:nama_unit_kerja},function(data){
        $('#jml_cuti').val(Math.ceil(data));
        $('#ket').html('<b style="color:green;">'+data+'</b> dibulatkan menjadi = <b style="color:green;">'+Math.ceil(data)+'</b>');
      });
    });

    $('#lampiran').keyup(function(){
    	$('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
    	$('#contoh_lampiran').html($(this).val()).css({'background':'yellow'});
    });
    $('#nomor_surat').keyup(function(){
    	$('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
    	$('#contoh_nomor_surat').html($(this).val()).css({'background':'yellow'});
    });
    $('#tanggal_surat').keyup(function(){
    	$('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
    	$('#contoh_tanggal_surat').html($(this).val()).css({'background':'yellow'});
    });
    $('#jenis_cuti').keyup(function(){
    	$('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
    	$('#contoh_jenis_cuti').html($(this).val()).css({'background':'yellow'});
    });
    $('#pejabat_rumah_sakit').keyup(function(){
    	$('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
    	$('#contoh_pejabat_rumah_sakit').html($(this).val()).css({'background':'yellow'});
    });
    $('#dari_wilayah').keyup(function(){
    	$('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
    	$('#contoh_dari_wilayah').html($(this).val()).css({'background':'yellow'});
    });
    $('#wilayah').keyup(function(){
    	$('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
    	$('#contoh_wilayah').html($(this).val()).css({'background':'yellow'});
    });
    $('#isi_line_1').keyup(function(){
    	$('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
    	$('#contoh_isi_line_1').html($(this).val()).css({'background':'yellow'});
    });
    $('#isi_line_2').keyup(function(){
    	$('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
    	$('#contoh_isi_line_2').html($(this).val()).css({'background':'yellow'});
    });
    $('#isi_line_3').keyup(function(){
    	$('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
    	$('#contoh_isi_line_3').html($(this).val()).css({'background':'yellow'});
    });
    $('#isi_line_4').keyup(function(){
    	$('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
    	$('#contoh_isi_line_4').html($(this).val()).css({'background':'yellow'});
    });
    $('#isi_line_5').keyup(function(){
    	$('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
    	$('#contoh_isi_line_5').html($(this).val()).css({'background':'yellow'});
    });
    $('#isi_line_6').keyup(function(){
    	$('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
    	$('#contoh_isi_line_6').html($(this).val()).css({'background':'yellow'});
    });
    $('#isi_line_7').keyup(function(){
    	$('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
    	$('#contoh_isi_line_7').html($(this).val()).css({'background':'yellow'});
    });
    $('#isi_line_8').keyup(function(){
    	$('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
    	$('#contoh_isi_line_8').html($(this).val()).css({'background':'yellow'});
    });
    $('#isi_line_9').keyup(function(){
    	$('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
    	$('#contoh_isi_line_9').html($(this).val()).css({'background':'yellow'});
    });
    $('#isi_line_10').keyup(function(){
    	$('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
    	$('#contoh_isi_line_10').html($(this).val()).css({'background':'yellow'});
    });
    $('#isi_line_11').keyup(function(){
    	$('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
    	$('#contoh_isi_line_11').html($(this).val()).css({'background':'yellow'});
    });
    $('#isi_line_12').keyup(function(){
    	$('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
    	$('#contoh_isi_line_12').html($(this).val()).css({'background':'yellow'});
    });
    $('#isi_line_13').keyup(function(){
    	$('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
    	$('#contoh_isi_line_13').html($(this).val()).css({'background':'yellow'});
    });
    $('#isi_line_14').keyup(function(){
    	$('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
    	$('#contoh_isi_line_14').html($(this).val()).css({'background':'yellow'});
    });
    $('#isi_line_15').keyup(function(){
      $('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
      $('#contoh_isi_line_15').html($(this).val()).css({'background':'yellow'});
    });
    $('#satuan_organisasi').keyup(function(){
    	$('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
    	$('#contoh_satuan_organisasi').html($(this).val()).css({'background':'yellow'});
    });
    $('#nama_kasubag').keyup(function(){
      $('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
      $('#contoh_nama_kasubag').html($(this).val()).css({'background':'yellow'});
    });
    $('#nip_kasubag').keyup(function(){
      $('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
      $('#contoh_nip_kasubag').html($(this).val()).css({'background':'yellow'});
    });
</script>