<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<?php 
//error_reporting(0);
$row = $this->db->query("SELECT * FROM data_surat_cuti");
$surat_cuti = $row->row();
//Funsi CTPDF
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nurromadlona Zikri Fadli');
$pdf->SetTitle('Surat Cuti Pegawai');
$pdf->SetSubject('Surat Cuti');
$pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
// set font
$pdf->SetFont('helvetica', 'B', 15);
// Add a page
$pdf->AddPage('P','A4');
$pdf->setCellMargins(0, 10, 0, 10);
$pdf->setCellPaddings(0, 0, 0, 0);
$pdf->SetFont('helvetica', '', 11);
$i=0;
$html="";
foreach($listing_cuti as $listing_cuti){
	if($listing_cuti->atasan_langsung=="Mustomi, SE.MM" AND $listing_cuti->nip_atasan=="196404181986031010"){
		$atasan_langsung = "";
		$nip_atasan ="";
	}else{
		$atasan_langsung = $listing_cuti->atasan_langsung;
		$nip_atasan = $listing_cuti->nip_atasan;
	}

	if($listing_cuti->nip==""){
		$nip = "";
	}else{
		$nip="NIP";
	}

	if($listing_cuti->nip=="" AND $listing_cuti->nrk==""){
		$nip_nrk = "- / -";
	}else{
		$nip_nrk=$listing_cuti->nip.' / ' .$listing_cuti->nrk;
	}

$i++;
//Table Laporan HTML
$html.='
	<br/>
	<br/>
	<table cellspacing="0" align="left" cellpadding="1">
		<tr>
			<td style="width:320px;"></td>
			<td style="width:100px;">Lampiran</td>
			<td style="width:10px;">:</td>
			<td style="width:300px;">'.$surat_cuti->lampiran.'</td>
		</tr>
		<tr>
			<td style="width:320px;"></td>
			<td style="width:100px;">Nomor</td>
			<td style="width:10px;">:</td>
			<td style="width:300px;">'.$surat_cuti->nomor_surat.'</td>
		</tr>
		<tr>
			<td style="width:320px;"></td>
			<td style="width:100px;">Tanggal</td>
			<td style="width:10px;">:</td>
			<td style="width:300px;">'.$surat_cuti->tanggal_surat.'</td>
		</tr>
	</table>
	<br/>
	'.$surat_cuti->jenis_cuti.'<br/>
	<br/>
	<table cellspacing="0" align="left" cellpadding="1">
		<tr>
			<td style="width:320px;"></td>
			<td>
				'.$surat_cuti->dari_wilayah.','.tgl_indo(date("Y-m-d")).'<br/>
				Kepada Yth<br/>
				'.$surat_cuti->pejabat_rumah_sakit.'<br/>
				di - <br/>
				&nbsp;&nbsp;&nbsp;'.$surat_cuti->wilayah.'<br/>
			</td>
		</tr>
	</table>
	<br/>
	'.$surat_cuti->isi_line_1.' <br/>
	<br/>
	<table cellspacing="0">
		<tr>
			<td style="width:200px;">Nama</td>
			<td style="width:10px;">:</td>
			<td>'.$listing_cuti->nama.'</td>
		</tr>
		<tr>
			<td style="width:200px;">NIP / NRK</td>
			<td style="width:10px;">:</td>
			<td>'.$nip_nrk.'</td>
		</tr>
		<tr>
			<td style="width:200px;">Pangkat Golongan</td>
			<td style="width:10px;">:</td>
			<td>'.$listing_cuti->golongan.'</td>
		</tr>
		<tr>
			<td style="width:200px;">Jabatan</td>
			<td style="width:10px;">:</td>
			<td>'.ucfirst(strtolower($listing_cuti->unit_kerja)).'</td>
		</tr>
		<tr>
			<td style="width:200px;">Satuan Organisasi</td>
			<td style="width:10px;">:</td>
			<td>'.$surat_cuti->satuan_organisasi.'</td>
		</tr>
	</table>
	<br/>
	'.$surat_cuti->isi_line_2.' '.substr($listing_cuti->tahun, 3).', '.$surat_cuti->isi_line_3.' '.$listing_cuti->lama_angka.' ('.$listing_cuti->lama_huruf.') '.$surat_cuti->isi_line_4.',<br/>
	'.$surat_cuti->isi_line_5.' '.tgl_indo(date("Y-m-d",strtotime($listing_cuti->awal))).' '.$surat_cuti->isi_line_6.' '.tgl_indo(date("Y-m-d",strtotime($listing_cuti->akhir))).' <br/>
	'.$surat_cuti->isi_line_7.' '.$listing_cuti->lokasi.', '.$surat_cuti->isi_line_8.' '.$listing_cuti->nomor.'<br/>
	<br/>
	'.$surat_cuti->isi_line_9.'<br/>
	<br/>
	<br/>
	<table cellspacing="0" align="center" cellpadding="1">
		<tr>
			<td></td>
			<td>Hormat Saya,
			<br/>
			<br/>
			<br/>
			<br/>
			'.$listing_cuti->nama.'<br/>
			'.$nip." ".$listing_cuti->nip.'
			</td>
		</tr>
	</table>
	<br/>
	<table  cellspacing="0" border="1" align="center" cellpadding="1">
		<tr>
			<td>'.$surat_cuti->isi_line_10.'</td>
			<td>'.$surat_cuti->isi_line_11.'</td>
		</tr>
		<tr>
			<td rowspan="3">
			Selama menjalankan cuti, tugas saya<br/>
			Diserahkan kepada<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			'.$listing_cuti->pengganti.'<br/>
			'.$nip." ".$listing_cuti->nip_pengganti.'
			</td>
			<td>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			'.$atasan_langsung.'<br/>
			'.$nip." ".$nip_atasan.'
			</td>
		</tr>
		<tr>
			<td>'.$surat_cuti->isi_line_12.'</td>
		</tr>
		<tr>
			<td>
			'.$surat_cuti->isi_line_13.'<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			'.$surat_cuti->isi_line_14.'<br/>
			NIP 196404181986031010
			</td>
		</tr>
	</table>
' ;
}
$pdf->setCellMargins(0, 0, 0, 1);
$pdf->setCellPaddings(1, 0, 0, 0);
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('Surat Cuti Pegawai.pdf');   

function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  
  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun
 
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>