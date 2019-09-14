<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<?php 
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
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
//Table Laporan HTML
$nama_file = $this->uri->segment(6);

$kalimat = $nama_file;
$char = preg_match("/pdf/i", $kalimat);
if($char==1){
	$ext = "pdf";
}

if($ext=="pdf"){
	$result = '<a href="'.base_url('uploads/'.$nama_file).'">Buka File PDF </a>';
}else{
	$result = '<img src="'.base_url('uploads/'.$nama_file).'"/>';
}
//'<img src="'.base_url('uploads/'.$nama_file).'"/> '
$html="";
$html .="".$result;

$pdf->setCellMargins(0, 0, 0, 1);
$pdf->setCellPaddings(1, 0, 0, 0);
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('Surat Cuti Pegawai.pdf','I');
close();
?>