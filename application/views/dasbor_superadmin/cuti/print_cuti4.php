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
$pdf->SetFont('times', 'B', 12);
// Add a page
$resolution= array(215, 330);
$pdf->AddPage('P', $resolution);
$pdf->setCellMargins(0, 10, 0, 10);
$pdf->setCellPaddings(0, 0, 0, 0);
$pdf->SetFont('times', '', 12);

// set margins
$pdf->SetMargins(20,1, 22,6, 25,4); // kiri, atas, kanan
$pdf->SetHeaderMargin(5); // mengatur jarak antara header dan top margin
$pdf->SetFooterMargin(5); //  mengatur jarak minimum antara footer dan bottom margin
$pdf->SetAutoPageBreak(TRUE, 0);
$i=0;
$html="";
    if($listing_cuti->atasan_langsung=="Mustomi, SE.MM" AND $listing_cuti->nip_atasan=="196404181986031010"){
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

//menghitung sisa cuti N-2
$query2 = $this->db->query('SELECT * FROM data_cuti WHERE tahun LIKE "%'.date('Y',strtotime('-2 years')).'%" AND id_data_pegawai="'.$listing_cuti->id_data_pegawai.'" ORDER BY id_cuti DESC ');
$row2 = $query2->row();
if($row2->sisa_cuti==""){
    $n2 = "-";
}

$profile_rs = $this->db->query('SELECT nama_rs FROM profile_rs ');
$row_profile = $profile_rs->row();

$direktur = $this->db->query('SELECT * FROM master_atasan WHERE jabatan2 ="DIREKTUR" ');
$row_direktur = $direktur->row();
//Table Laporan HTML
$html.='
<table border="0" cellspacing="0" cellpadding="0">
    <tbody>
        <tr>
            <td width="308" valign="top">
            </td>
            <td width="308" valign="top">
                    <br/>
                    ANAK LAMPIRAN l.c<br/>
                    PERATURAN BADAN KEPEGAWAIAN NEGARA<br/>
                    REPUBLIK INDONESIA<br/>
                    NOMOR 24 TAHUN 2017<br/>
                    TENTANG<br/>
                    TATA CARA PEMBERIAN CUTI PEGAWAI NEGERI SIPIL
            </td>
        </tr>
        <tr>
            <td width="308" valign="top">
            </td>
            <td width="308" valign="top">
                <p align="right">
                    Jakarta, '.tgl_indo(date("Y-m-d")).'
                </p>
            </td>
        </tr>
    </tbody>
</table>
<p align="center">
    IZIN SEMENTARA PELAKSANAAN CUTI KARENA ALASAN PENTING<br/>NOMOR ....................................
</p>
    1. Diberikan izin sementara untuk melaksanakan cuti karena alasan penting<br/>&nbsp;&nbsp;&nbsp;&nbsp;kepada Pegawai RSUD Cilincing<br/>
<table border="0" cellspacing="0" cellpadding="0">
    <tbody>
        <tr>
            <td width="186" valign="top">
            &nbsp;&nbsp;Nama
            </td>
            <td width="28" valign="top">
                    :
            </td>
            <td width="319" valign="top">
                    '.$listing_cuti->nama.'
            </td>
        </tr>
        <tr>
            <td width="186" valign="top">
            &nbsp;&nbsp;NIP
            </td>
            <td width="28" valign="top">
                    :
            </td>
            <td width="319" valign="top">
                    '.$listing_cuti->nip.'
            </td>
        </tr>
        <tr>
            <td width="186" valign="top">
            &nbsp;&nbsp;Pangkat/ golongan ruang
            </td>
            <td width="28" valign="top">
                    :
            </td>
            <td width="319" valign="top">
                    '.$listing_cuti->pangkat.'
            </td>
        </tr>
        <tr>
            <td width="186" valign="top">
            &nbsp;&nbsp;Jabatan
            </td>
            <td width="28" valign="top">
                    :
            </td>
            <td width="319" valign="top">
                    '.$listing_cuti->jabatan.'
            </td>
        </tr>
        <tr>
            <td width="186" valign="top">
            &nbsp;&nbsp;Unit Kerja
            </td>
            <td width="28" valign="top">
                    :
            </td>
            <td width="319" valign="top">
                    '.$listing_cuti->unit_kerja.'
            </td>
        </tr>
    </tbody>
</table>
<br/>
<br/>
<table border="0" cellspacing="0" cellpadding="0">
    <tbody>
        <tr>
            <td width="600" valign="top">
                    &nbsp;&nbsp;Selama 2 hari, terhitung mulai tanggal '.date("d-m-Y",strtotime($listing_cuti->awal)).' sampai dengan tanggal '.date("d-m-Y",strtotime($listing_cuti->akhir)).',<br/>&nbsp;&nbsp;&nbsp;&nbsp;dengan ketentuan sebagai berikut:
            </td>
        </tr>
        <tr>
            <td width="581" valign="top">
                    <ol type="a">
                        <li> Sebelum menjalankan cuti karena alasan penting, wajib menyerahkan pekerjaannya<br/>&nbsp;kepada atasan langsungrya atau pejabat lain yang ditunjuk.</li>
                        <li> Setelah selesai menjalankan cuti karena alasan penting, wajib melaporkan diri<br/>&nbsp;kepada atasan langsungnya dan bekerja kembali sebagaimana biasa.</li>
                    </ol>
            </td>
        </tr>
    </tbody>
</table>
<p>
    2. Demikian izin sementara melaksanakan cuti karena alasan penting ini
    dibuat <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;untuk dapat digunakan sebagaimana mestinya.
</p>
<table border="0" cellspacing="0" cellpadding="0">
    <tbody>
        <tr>
            <td width="281" valign="top">
            </td>
            <td width="335" valign="top" align="center">
                    <br/>
                    Direktur '.$row_profile->nama_rs.'
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    ('.$row_direktur->nama_atasan.')
                    <br/>
                    NIP '.$row_direktur->nip.'
            </td>
        </tr>
    </tbody>
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