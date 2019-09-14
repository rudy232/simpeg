<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<?php 
//error_reporting(0);
$jenis_cuti=$this->uri->segment(5);
$repl_jenis_cuti=str_replace('%20', ' ', $jenis_cuti);
$row = $this->db->query("SELECT * FROM data_surat_cuti WHERE jenis_cuti LIKE '%".$repl_jenis_cuti."%' ");
$surat_cuti = $row->row();
//Funsi CTPDF
$resolution= array(215, 330);
$pdf = new Pdf('P', 'mm', $resolution, true, 'UTF-8', false);
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
$pdf->SetFont('times', 'B', 15);
// Add a page
$resolution= array(215, 330);
$pdf->AddPage('P', $resolution);
$pdf->setCellMargins(0, 10, 0, 10);
$pdf->setCellPaddings(0, 0, 0, 0);
$pdf->SetFont('times', '', 12);

// set margins
$pdf->SetMargins(31,7, 15, 19); // kiri, atas, kanan
$pdf->SetHeaderMargin(5); // mengatur jarak antara header dan top margin
$pdf->SetFooterMargin(10); //  mengatur jarak minimum antara footer dan bottom margin
$i=0;
$html="";
	if($listing_cuti->atasan_langsung=="Mustomi, SE.MM" AND $listing_cuti->nip_atasan=="196404181986031010"){
		$atasan_langsung = "";
		$nip_atasan ="";
	}else{
		$atasan_langsung = $listing_cuti->atasan_langsung;
		$nip_atasan = $listing_cuti->nip_atasan;
	}

	if($listing_cuti->nip==""){
		$nip= "";
	}else{
		$nip="NIP";
	}

	if($listing_cuti->nip=="" AND $listing_cuti->nrk==""){
		$nip_nrk = "- / -";
	}else{
		$nip_nrk=$listing_cuti->nip.' / ' .$listing_cuti->nrk;
	}

$i++;

if($repl_jenis_cuti=="Cuti Bersalin"){
	$satuan_lama_cuti = "Bulan";
}elseif ($repl_jenis_cuti=="Cuti Tahunan"){
	$satuan_lama_cuti = "Hari Kerja";
}elseif ($repl_jenis_cuti=="Cuti Alasan Penting"){
	$satuan_lama_cuti = "Hari Kerja";
}

if($listing_cuti->jenis_cuti=="Cuti Alasan Penting")
{
	$point_d = "";
}else{
	$point_d = "&nbsp;&nbsp;&nbsp; d. Sisa Jatah Cuti Tahunan : ".$listing_cuti->sisa_cuti." Hari";
}
//Table Laporan HTML
$html.='
	<table cellspacing="0" align="center" cellpadding="1">
		<tr>
			<td><img src="'.base_url('assets/matrix-admin-package/img/jaya-raya.jpg').'" /><br/><br/><strong>PEMERINTAH PROVINSI DAERAH KHUSUS<br/>IBUKOTA JAKARTA</strong></td>
		</tr>
	</table>
	<br/>
	<br/>
	<table cellspacing="0" align="left" cellpadding="1">
		<tr>
			<td style="width:270px;"></td>
			<td style="width:100px;">LAMPIRAN</td>
			<td style="width:10px;">:</td>
			<td style="width:270px;">'.strtoupper($surat_cuti->lampiran).'</td>
		</tr>
		<tr>
			<td style="width:270px;"></td>
			<td style="width:100px;">NOMOR</td>
			<td style="width:10px;">:</td>
			<td style="width:270px;">'.strtoupper($surat_cuti->nomor_surat).'</td>
		</tr>
		<tr>
			<td style="width:270px;"></td>
			<td style="width:100px;">TANGGAL</td>
			<td style="width:10px;">:</td>
			<td style="width:270px;">'.strtoupper($surat_cuti->tanggal_surat).'</td>
		</tr>
	</table>
	<table cellspacing="0" align="left" cellpadding="1">
		<tr>
			<td style="width:270px;"></td>
			<td>'.$surat_cuti->dari_wilayah.','.tgl_indo(date("Y-m-d")).'</td>
		</tr>
	</table>
	<br/>
	<br/>
	<table cellspacing="0" align="center" cellpadding="1">
		<tr>
			<td>
				<span style="text-decoration:underline;"><strong>SURAT IZIN '.$surat_cuti->jenis_cuti.'</strong></span>
				<br/>
				NOMOR :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; / &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</td>
		</tr>
	</table>
	<br/>
	<br/>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diberikan '.$repl_jenis_cuti.' untuk tahun '.date("Y").' Kepada Pegawai Rumah Sakit Umum Daerah Cilincing :
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
			<td>'.ucfirst(strtolower($listing_cuti->jabatan)).'</td>
		</tr>
		<tr>
			<td style="width:200px;">Satuan Organisasi</td>
			<td style="width:10px;">:</td>
			<td style="width:300px;">'.$surat_cuti->satuan_organisasi.'</td>
		</tr>
	</table>
	<br/>
	<br/>
	Selama '.$listing_cuti->lama_angka.' ('.$listing_cuti->lama_huruf.') '.$satuan_lama_cuti.', terhitung mulai tanggal '.tgl_indo($listing_cuti->awal).' <br/>sampai dengan tanggal '.tgl_indo($listing_cuti->akhir).' dengan ketentuan sebagai berikut :
	<br/>
	<br/>
	&nbsp;&nbsp;&nbsp; a. Selama cuti berada di '.$listing_cuti->lokasi.' dan nomor telepon yang dapat di hubungi : <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$listing_cuti->nomor.'
	<br/>
	&nbsp;&nbsp;&nbsp; b. Selama menjalankan cuti, tugas di serahkan kepada '.$listing_cuti->pengganti.'
	<br/>
	&nbsp;&nbsp;&nbsp; c. Setelah menjalankan cuti tahunan wajib melaporkan diri kepada atasan 
	<br/>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; langsungnya dan bekerja kembali sebagaimana biasa.
	<br/>
	'.$point_d.'
	<br/>
	<br/>
	Demikianlah surat izin '.strtolower($surat_cuti->jenis_cuti).' ini dibuat untuk dapat digunakan sebagaimana mestinya.
	<br/>
	<br/>
	<table cellspacing="0" align="center" cellpadding="1">
		<tr>
			<td></td>
			<td>Direktur Rumah Sakit Umum Daerah Cilincing,
			<br/>
			<!--<img src="'.base_url('assets/matrix-admin-package/img/ttd.jpeg').'" width="150" height="50" />-->
			<br/>
			<br/>
			drg. Suzy Freud, MPH
			<br/>
			NIP. 196512071990112001
			</td>
		</tr>
	</table>
	<table cellspacing="0" align="left" cellpadding="1">
		<tr>
			<td>Tembusan :
			<br/>
			&nbsp;&nbsp;&nbsp; 1. Kepala Badan Kepegawaian Daerah Provinsi DKI Jakarta
			<br/>
			&nbsp;&nbsp;&nbsp; 2. Inspektur Provinsi DKI Jakarta
			<br/>
			&nbsp;&nbsp;&nbsp; 3. Kepala Badan Pengelola Keuangan Daerah Provinsi DKI Jakarta
			<br/>
			&nbsp;&nbsp;&nbsp; 4. '.$listing_cuti->panggilan.', '.$listing_cuti->nama.' untuk diketahui
			<br/>
			</td>
		</tr>
	</table>';

$pdf->setCellMargins(0, 0, 0, 1);
$pdf->setCellPaddings(1, 0, 0, 0);
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('Surat Cuti Pegawai.pdf','I');   
close(); 

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