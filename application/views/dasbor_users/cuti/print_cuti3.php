<?php 
if($this->simple_admin->cek_login());
?>
<?php 
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
$row = $this->db->query("SELECT * FROM data_surat_cuti");
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
$pdf->SetFont('times', 'B', 9);
// Add a page
$resolution= array(215, 330);
$pdf->AddPage('P', $resolution);
$pdf->setCellMargins(0, 10, 0, 10);
$pdf->setCellPaddings(0, 0, 0, 0);
$pdf->SetFont('times', '', 9);

// set margins
$pdf->SetMargins(20,1, 22,6, 25,4); // kiri, atas, kanan
$pdf->SetHeaderMargin(5); // mengatur jarak antara header dan top margin
$pdf->SetFooterMargin(5); //  mengatur jarak minimum antara footer dan bottom margin
$pdf->SetAutoPageBreak(TRUE, 0); //menghilangkan margin bottom atau merubah margin bottom jadi 0
$i=0;


$profile_rs = $this->db->query('SELECT nama_rs FROM profile_rs ');
$row_profile = $profile_rs->row();

$kasubag = $this->db->query('SELECT * FROM master_atasan WHERE jabatan2 ="Kepala Sub Bagian Tata Usaha" ');
$row_kasubag = $kasubag->row();

$master_atasan = $this->db->query('SELECT * FROM data_cuti a JOIN master_atasan b ON a.nip_atasan=b.nip WHERE a.nama="'.$listing_cuti->nama.'" ORDER BY id_atasan DESC ');
$jabatan_atasan = $master_atasan->row();

$html="";
	if($listing_cuti->atasan_langsung==$surat_cuti->isi_line_14 AND $listing_cuti->nip_atasan==$surat_cuti->isi_line_15){
		$atasan_langsung = "";
		$nip_atasan ="";
	}else{
		$atasan_langsung = $listing_cuti->atasan_langsung;
		$nip_atasan = "NIP ".$listing_cuti->nip_atasan;
	}

	if($listing_cuti->nip=="" AND $listing_cuti->nrk==""){
		$nip= "";
	}else{
		$nip="NIP";
	}

	if($listing_cuti->nip=="" AND $listing_cuti->nrk==""){
		$nip_nrk = "- / -";
		$nip= "";
	}else{
		$nip_nrk=$listing_cuti->nip.' / ' .$listing_cuti->nrk;
	}
	

$i++;
$tgl_msk =new datetime($listing_cuti->tanggal_daftar);
$tgl_skrng = new datetime();
$masa_krj= $tgl_skrng->diff($tgl_msk);
$tahun= $masa_krj->y;
$bulan= $masa_krj->m;
$hari= $masa_krj->d;

/*siapkan sebuah fungsi
paramater pertama adalah pemisah antara kalimat
biasanya pemisah antar kalimat adalah ". ", "? ", "! "
parameter kedua adalah paragrap yang akan dirubah menjadi format sentence case
*/
function ubah_huruf_awal($pemisah, $paragrap) {
//pisahkan $paragraf berdasarkan $pemisah dengan fungsi explode
$pisahkalimat=explode($pemisah, $paragrap);
$kalimatbaru = array();

//looping dalam array
foreach ($pisahkalimat as $kalimat) {
//jadikan awal huruf masing2 array menjadi huruf besar dengan fungsi ucfirst
$kalimatawalhurufbesar=ucfirst(strtolower($kalimat));
$kalimatbaru[] = $kalimatawalhurufbesar;
}

//kalo udah gabungin lagi dengan fungsi implode
$textgood = implode($pemisah, $kalimatbaru);
return $textgood;
}
//menghitung sisa cuti N-1
$query = $this->db->query('SELECT * FROM data_cuti WHERE tahun LIKE "%'.date('Y',strtotime('-1 years')).'%" AND id_data_pegawai="'.$listing_cuti->id_data_pegawai.'" ORDER BY id_cuti DESC ');
$row = $query->row();
if($row->sisa_cuti==""){
    $n1 = 0;
}else{
	$n1 = $row->sisa_cuti;
}
//menghitung sisa cuti N-2
$query2 = $this->db->query('SELECT * FROM data_cuti WHERE tahun LIKE "%'.date('Y',strtotime('-2 years')).'%" AND id_data_pegawai="'.$listing_cuti->id_data_pegawai.'" ORDER BY id_cuti DESC ');
$row2 = $query2->row();
if($row2->sisa_cuti==""){
	$n2 = "-";
}else{
	$n2 = $row->sisa_cuti;
}

if($n1>=6)
{
	$n_max = 6;
}else{
	$n_max = $n1;
}

if($listing_cuti->jenis_cuti=="Cuti Bersalin")
{
	$status 		= "Bulan";
	$n_max			= 0;
	$cuti_bersalin 	= '<input type="checkbox" name="agree" value="1" checked="checked" />';
}else{
	$status = "Hari";
	$cuti_bersalin = '';
}


if($listing_cuti->jenis_cuti=="Cuti Tahunan")
{
	$cuti_tahunan = '<input type="checkbox" name="agree" value="1" checked="checked" />';
}else{
	$cuti_tahunan = '';
}

if($listing_cuti->jenis_cuti=="Cuti Alasan Penting")
{
	$cuti_alasan_penting = '<input type="checkbox" name="agree" value="1" checked="checked" />';
	$n_max	= '-';
}else{
	$cuti_alasan_penting = '';
}

$n1n_max = $n_max+12;

//histori cuti pegawai by id
$histori_sisa_cuti="";
foreach ($hitory_cuti as $hitory_cuti) {
	if($hitory_cuti->jenis_cuti=="Cuti Tahunan" || $hitory_cuti->jenis_cuti=="Cuti Alasan Penting")
	{
		$satuan_cuti = "Hari";
	}else if($hitory_cuti->jenis_cuti=="Cuti Bersalin")
	{
		$satuan_cuti = "Bulan";
	}
	$histori_sisa_cuti .='('.date('M',strtotime($hitory_cuti->awal)).' = '.$hitory_cuti->lama_angka.' '.$satuan_cuti.')+';
}
$ket_n2 = date("Y")-2;
$ket_n1 = date("Y")-1;
//Table Laporan HTML
$html.='
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
			Jakarta, '.date("d F Y",strtotime($listing_cuti->tanggal_pengajuan)).'
			<br/>
			Kepada
			<br/>
			Yth. Direktur '.$row_profile->nama_rs.'
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
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$listing_cuti->nama.'</td>
			<td style="width:94px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIP
			</td>
			<td style="width:236px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$listing_cuti->nip.'
			</td>
		</tr>
		<tr>
			<td style="width:83px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jabatan
			</td>
			<td style="width:208px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.ubah_huruf_awal(" ",$listing_cuti->jabatan).'</td>
			<td style="width:94px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Masa Kerja
			</td>
			<td style="width:236px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$tahun.' Tahun '.$bulan.' Bulan '.$hari.' Hari
			</td>
		</tr>
		<tr>
			<td style="width:83px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Unit Kerja
			</td>
			<td colspan="3" style="width:539px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.str_replace("Igd","IGD",ubah_huruf_awal(" ",$listing_cuti->unit_kerja)).'</td>
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
			'.$cuti_tahunan.'
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
			'.$cuti_bersalin.'
			</td>
		</tr>
		<tr>
			<td style="width:225px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			<ol>
				<li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="5">Cuti Karena Alasan Penting</li>
			</ol>
			</td>
			<td style="width:57px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			'.$cuti_alasan_penting.'
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
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$listing_cuti->alasan_cuti.'
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
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$listing_cuti->lama_angka.' '.$status.'
			</td>
			<td style="width:140px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;mulai tanggal
			</td>
			<td style="width:87px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.date("d-m-Y",strtotime($listing_cuti->awal)).'
			</td>
			<td style="width:47px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;s/d
			</td>
			<td style="width:89px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.date("d-m-Y",strtotime($listing_cuti->akhir)).'
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
			<td colspan="3" style="width:400px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			<ol>
				<li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;">Cuti Tahunan</li>
			</ol>
			</td>
			<td style="width:216px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			<ol>
				<li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="2">Cuti Besar</li>
			</ol>
			</td>
		</tr>
		<tr>
			<td style="width:91px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tahun
			</td>
			<td style="width:86px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sisa
			</td>
			<td style="width:223px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Riwayat Cuti Tahun '.date('Y').'
			</td>
			<td style="width:216px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			<ol>
				<li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="3">Cuti Sakit</li>
			</ol>
			</td>
		</tr>
		<tr>
			<td style="width:91px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;N-2
			</td>
			<td style="width:86px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$n2.'
			</td>
			<td style="width:223px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			
			</td>
			<td style="width:216px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			<ol>
				<li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="4">Cuti Melahirkan</li>
			</ol>
			</td>
		</tr>
		<tr>
			<td style="width:91px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;N-1 + N
			</td>
			<td style="width:86px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$n_max.'+12='.$n1n_max.'
			</td>
			<td style="width:223px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
				 '.$histori_sisa_cuti.'
			</td>
			<td style="width:216px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			<ol>
				<li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="5">Cuti Karena Alasan Penting</li>
			</ol>
			</td>
		</tr>
		<tr>
			<td style="width:91px;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;N
			</td>
			<td style="width:86px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$listing_cuti->sisa_cuti.'
			</td>
			<td style="width:223px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			
			</td>
			<td style="width:216px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			<ol>
				<li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="6">Cuti Di Luar Tangguangan Negara</li>
			</ol>
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
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$listing_cuti->lokasi.'
			</td>
			<td style="width:139px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TELP
			</td>
			<td style="width:201px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$listing_cuti->nomor.'
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
			('.$listing_cuti->nama.')
			<br/>
			'.$nip.'.'.$listing_cuti->nip.'
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
			('.$listing_cuti->pengganti.')
			<br/>
			'.$nip.'.'.$listing_cuti->nip_pengganti.'
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
	</tbody>
</table>
<br/>
<br/>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:none">
	<tbody>
		<tr>
			<td colspan="4" style="width:616px;border:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			<ol style="list-style-type:upper-roman;">
				<li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="9">MENGETAHUI ATASAN LANGSUNG</li>
			</ol>
			</td>
		</tr>
		<tr>
			<td colspan="3" style="width:351px;border:none;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			    
			</td>
			<td style="width:265px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;text-align:center;">
			'.$jabatan_atasan->jabatan2.'<br/>
			<br/>
			<br/>
			'.$atasan_langsung.'<br/>
			'.$nip_atasan.'
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
				<li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="10">KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI</li>
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
			Kepala Sub Bagian Tata Usaha
			<br/>
			<br/>
			'.$surat_cuti->isi_line_14.'<br/>
			NIP '.$row_kasubag->nip.'
			</td>
		</tr>
	</tbody>
</table>
<table>
	<tr>
		<td style="width:180px;">KET : N-2 = Sisa Cuti Tahun '.$ket_n2.'</td>
		<td style="width:180px;">KET : N-1 = Sisa Cuti Tahun '.$ket_n1.'</td>
		<td style="width:180px;">KET : N = Sisa Cuti Tahun '.date("Y").'</td>
	</tr>
</table>
';

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