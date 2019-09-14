<?php 
	$js_dcd = json_decode($data_diklat->spj_img);

	$kalimat = $js_dcd[0]->dok1;
	$char = preg_match("/pdf/i", $kalimat);
	if($char==1){
		$ext = "pdf";
	}

	$kalimat2 = $js_dcd[1]->dok2;
	$char2 = preg_match("/pdf/i", $kalimat2);
	if($char2==1){
		$ext2 = "pdf";
	}

	$kalimat3 = $js_dcd[2]->dok3;
	$char3 = preg_match("/pdf/i", $kalimat3);
	if($char3==1){
		$ext3 = "pdf";
	}

	$kalimat4 = $js_dcd[3]->dok4;
	$char4 = preg_match("/pdf/i", $kalimat4);
	if($char4==1){
		$ext4 = "pdf";
	}

	$kalimat5 = $js_dcd[4]->dok5;
	$char5 = preg_match("/pdf/i", $kalimat5);
	if($char5==1){
		$ext5 = "pdf";
	}

	$kalimat6 = $js_dcd[5]->dok6;
	$char6 = preg_match("/pdf/i", $kalimat6);
	if($char6==1){
		$ext6 = "pdf";
	}

	if($ext=="pdf"){
		$tampil = '<a href="'.base_url('uploads/'.$js_dcd[0]->dok1).'" target="_blank"><img src="'.base_url('uploads/default_pdf.png').'" alt="surat_tugas" style="width: 400px;height: 500px;"></a>';
	}else{
		$tampil = '<img src="'.base_url('uploads/'.$js_dcd[0]->dok1).'" alt="surat_tugas" style="width: 400px;height: 500px;">';
	}

	if($ext2=="pdf"){
		$tampil2 = '<a href="'.base_url('uploads/'.$js_dcd[1]->dok2).'" target="_blank"><img src="'.base_url('uploads/default_pdf.png').'" alt="sertifikat" style="width: 400px;height: 500px;"></a>';
	}else{
		$tampil2 = '<img src="'.base_url('uploads/'.$js_dcd[1]->dok2).'" alt="sertifikat" style="width: 400px;height: 500px;">';
	}

	if($ext3=="pdf"){
		$tampil3 = '<a href="'.base_url('uploads/'.$js_dcd[2]->dok3).'" target="_blank"><img src="'.base_url('uploads/default_pdf.png').'" alt="kwetansi" style="width: 400px;height: 500px;"></a>';
	}else{
		$tampil3 = '<img src="'.base_url('uploads/'.$js_dcd[2]->dok3).'" alt="kwetansi" style="width: 400px;height: 500px;">';
	}

	if($ext4=="pdf"){
		$tampil4 = '<a href="'.base_url('uploads/'.$js_dcd[3]->dok4).'" target="_blank"><img src="'.base_url('uploads/default_pdf.png').'" alt="materi" style="width: 400px;height: 500px;"></a>';
	}else{
		$tampil4 = '<img src="'.base_url('uploads/'.$js_dcd[3]->dok4).'" alt="materi" style="width: 400px;height: 500px;">';
	}

	if($ext5=="pdf"){
		$tampil5 = '<a href="'.base_url('uploads/'.$js_dcd[4]->dok5).'" target="_blank"><img src="'.base_url('uploads/default_pdf.png').'" alt="daftar_hadir" style="width: 400px;height: 500px;"></a>';
	}else{
		$tampil5 = '<img src="'.base_url('uploads/'.$js_dcd[4]->dok5).'" alt="daftar_hadir" style="width: 400px;height: 500px;">';
	}

	if($ext6=="pdf"){
		$tampil6 = '<a href="'.base_url('uploads/'.$js_dcd[5]->dok6).'" target="_blank"><img src="'.base_url('uploads/default_pdf.png').'" alt="notulensi" style="width: 400px;height: 500px;"></a>';
	}else{
		$tampil6 = '<img src="'.base_url('uploads/'.$js_dcd[5]->dok6).'" alt="notulensi" style="width: 400px;height: 500px;">';
	}
?>

<div class="row-fluid" style="text-align: center;">
  <div class="span4">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
        <h5>SURAT TUGAS</h5>
      </div>
      <div class="widget-content nopadding">
      	<a href="<?php echo base_url('dasbor_superadmin/laporan_diklat/pdf_file/'.$data_diklat->id_data_pegawai."/".$data_diklat->id_data_diklat."/".$js_dcd[0]->dok1) ?>" target="_blank"><?php echo $tampil ?></a>
      </div>
    </div>
  </div>
  <div class="span4">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
        <h5>SERTIFIKAT</h5>
      </div>
      <div class="widget-content nopadding">
      	<a href="<?php echo base_url('dasbor_superadmin/laporan_diklat/pdf_file/'.$data_diklat->id_data_pegawai."/".$data_diklat->id_data_diklat."/".$js_dcd[1]->dok2) ?>" target="_blank"><?php echo $tampil2 ?></a>
      </div>
    </div>
  </div>
  <div class="span4">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
        <h5>KWETANSI</h5>
      </div>
      <div class="widget-content nopadding">
      	<a href="<?php echo base_url('dasbor_superadmin/laporan_diklat/pdf_file/'.$data_diklat->id_data_pegawai."/".$data_diklat->id_data_diklat."/".$js_dcd[2]->dok3) ?>" target="_blank"><?php echo $tampil3 ?></a>
      </div>
    </div>
  </div>
</div>
<div class="row-fluid" style="text-align: center;">
	<div class="span4">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
        <h5>MATERI</h5>
      </div>
      <div class="widget-content nopadding">
      	<a href="<?php echo base_url('dasbor_superadmin/laporan_diklat/pdf_file/'.$data_diklat->id_data_pegawai."/".$data_diklat->id_data_diklat."/".$js_dcd[3]->dok4) ?>" target="_blank"><?php echo $tampil4 ?></a>
      </div>
    </div>
  </div>
  <div class="span4">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
        <h5>DAFTAR HADIR</h5>
      </div>
      <div class="widget-content nopadding">
      	<a href="<?php echo base_url('dasbor_superadmin/laporan_diklat/pdf_file/'.$data_diklat->id_data_pegawai."/".$data_diklat->id_data_diklat."/".$js_dcd[4]->dok5) ?>" target="_blank"><?php echo $tampil5 ?></a>
      </div>
    </div>
  </div>
  <div class="span4">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
        <h5>NOTULENSI</h5>
      </div>
      <div class="widget-content nopadding">
      	<a href="<?php echo base_url('dasbor_superadmin/laporan_diklat/pdf_file/'.$data_diklat->id_data_pegawai."/".$data_diklat->id_data_diklat."/".$js_dcd[5]->dok6) ?>" target="_blank"><?php echo $tampil6 ?></a>
      </div>
    </div>
  </div>
</div>