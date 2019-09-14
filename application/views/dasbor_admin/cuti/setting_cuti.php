<?php 
  if($this->session->flashdata('notifval')){
    echo '<div class="alert alert-success alert-block">';
    echo $this->session->flashdata('notifval');
    echo '</div>';
  }
?>
<div class="row-fluid">
<div class="widget-box">
	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    	<h5><?php  echo $title?></h5>
 	</div>
 	<div class="widget-content padding">
 		<form action="<?php echo base_url('dasbor_admin/cuti/update_setting_cuti') ?>" method="post" class="form-horizontal">
 			<div class="control-group">
              <label class="control-label">Maksimal Jumlah Kuota Pegawai Cuti / Hari</label>
              <div class="controls">
                <input type="text" class="span5" placeholder="Masukan jumlah kuota cuti Pegawai / Hari" name="jml_kuota" id="jml_kuota" value="<?php echo $data_setting->jml_kuota ?>"/><br/>
                <span>Dasar : 5% dari Seluruh Jumlah Pegawai ( <b>(Jumlah Pegawai * 5)</b> / 100)</span>
                <div id="errmsg"></div>
              </div>
            </div>
 			<div class="control-group">
              <label class="control-label">Maksimal Pengajuan Cuti Kembali Setelah Berapa Bulan ?</label>
              <div class="controls">
                <input type="text" class="span5" placeholder="Masukan jumlah Bulan Pengajuan Cuti Kembali" name="batas_pengajuan" id="batas_pengajuan" value="<?php echo $data_setting->batas_pengajuan ?>"/><br/>
                <span>listen : Izinkan pegawai untuk mengajukan cuti kembali setelah berapa bulan ? dari semenjak pegawai tersebut mengambil cuti</span>
                <div id="errmsg2"></div>
              </div>
            </div>
 			<div class="control-group">
              <label class="control-label">Jumlah Pegawai Yang Di Izinkan Cuti Dalam Satu Unit Kerja ?</label>
              <div class="controls">
                <input type="text" class="span5" placeholder="Masukan jumlah pegawai yang di izinkan cuti dalam satu unit kerja" name="jml_cuti" id="jml_cuti" class="jml_cuti" value="<?php echo $data_setting->jml_cuti ?>"/><br/>
                <span>listen : membatasi jumlah pegawai untuk mengajukan cuti dalam satu unit kerja</span>
                <div id="errmsg2"></div>
              </div>
            </div>
            <div class="form-actions">
              <input type="submit" name="update_data" class="btn btn-success" value="SETTING KUOTA">
            </div>
        </form>
 	</div>
</div>
</div>
<div class="span8">
<div class="widget-box">
	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    	<h5><?php  echo $title2 ?></h5>
 	</div>
 	<div class="widget-content padding">
 		<form action="<?php echo base_url('dasbor_admin/cuti/update_setting_cuti') ?>" method="post" class="form-horizontal">
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
            <div class="form-actions">
              <input type="submit" name="update_data" class="btn btn-success" value="SETTING SURAT CUTI">
            </div>
        </form>
 	</div>
</div>
</div>
<div class="span8">
<div class="widget-box hightlight" style="background: white;">
	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    	<h5><?php  echo $title3 ?></h5>
 	</div>
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
			<b>NIP 196404181986031010 (Otomatis Menyesuaikan)</b>
			</td>
		</tr>
	</table>
 	</div>
    <div class="form-actions" style="text-align: center;">
    	<span>Note : Tampilan pada contoh surat cuti ini akan merubah data di surat cuti pegawai pdf, karena terhubung secara langsung. </span>
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
    $('#satuan_organisasi').keyup(function(){
    	$('.hightlight').css({'border':'solid 1px pink','box-shadow':'0px 0px 10px 10px pink'});
    	$('#contoh_satuan_organisasi').html($(this).val()).css({'background':'yellow'});
    });
</script>