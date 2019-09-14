<?php 
//error_reporting(0);
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
$pdf->SetFont('times', 'B', 10);
// Add a page
$resolution= array(215, 330);
$pdf->AddPage('P', $resolution);
$pdf->setCellMargins(0, 10, 0, 10);
$pdf->setCellPaddings(0, 0, 0, 0);
$pdf->SetFont('times', '', 10);

// set margins
$pdf->SetMargins(20,1, 22,6, 25,4); // kiri, atas, kanan
$pdf->SetHeaderMargin(5); // mengatur jarak antara header dan top margin
$pdf->SetFooterMargin(5); //  mengatur jarak minimum antara footer dan bottom margin
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
$tgl_msk =new datetime($listing_cuti->tanggal_daftar);
$tgl_skrng = new datetime();
$masa_krj= $tgl_skrng->diff($tgl_msk);
$tahun= $masa_krj->y;
$bulan= $masa_krj->m;
$hari= $masa_krj->d;

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
			Jakarta, 09 januari 2018
			<br/>
			Kepada
			<br/>
			Yth. Direktur Rumah Sakit Umum Daerah Cilincing
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
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$listing_cuti->jabatan.'</td>
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
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$listing_cuti->unit_kerja.'</td>
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
			&#10004;
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
				<li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="6">Cuti di Luar Tangguan Negara</li>
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
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$listing_cuti->lama_angka.' Hari
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
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;N-1 + N
			</td>
			<td style="width:56px;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			
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
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:none">
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
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:none">
	<tbody>
		<tr>
			<td colspan="4" style="width:616px;border:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;vertical-align:top;">
			<ol style="list-style-type:upper-roman;">
				<li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="7">PERTIMBANGAN ATASAN LANGSUNG</li>
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
			'.$atasan_langsung.'
			'.$nip.'.'.$nip_atasan.'
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
				<li style="margin-top:0mm;margin-right:0mm;margin-bottom:0mm;margin-bottom:.0001pt;" value="8">KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI</li>
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
			'.$surat_cuti->isi_line_14.'<br/>
			NIP 196404181986031010
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