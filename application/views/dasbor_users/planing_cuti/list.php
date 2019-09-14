<?php
date_default_timezone_set('Asia/jakarta');
/*
$januari = cal_days_in_month(CAL_GREGORIAN, 1, date('2018'));
$febuari = cal_days_in_month(CAL_GREGORIAN, 2, date('2018'));
$maret = cal_days_in_month(CAL_GREGORIAN, 3, date('2018'));
$april = cal_days_in_month(CAL_GREGORIAN, 4, date('2018'));
$mei = cal_days_in_month(CAL_GREGORIAN, 5, date('2018'));
$juni = cal_days_in_month(CAL_GREGORIAN, 6, date('2018'));
$juli = cal_days_in_month(CAL_GREGORIAN, 7, date('2018'));
$agustus = cal_days_in_month(CAL_GREGORIAN, 8, date('2018'));
$september = cal_days_in_month(CAL_GREGORIAN, 9, date('2018'));
$oktober = cal_days_in_month(CAL_GREGORIAN, 10, date('2018'));
$november = cal_days_in_month(CAL_GREGORIAN, 11, date('2018'));
$desember = cal_days_in_month(CAL_GREGORIAN, 12, date('2018'));
*/
// Ambil terlebih dahulu data cuti
$this->db->like('awal', date('Y'));
$data_cuti = $this->db->get('data_cuti');
if ($data_cuti) {
    $kuotaCuti = $this->db->query('SELECT * FROM data_kuota_cuti');
    $jmlKuota = $kuotaCuti->row();
    if ($data_cuti->num_rows()) {
        $data_cutiR = $data_cuti->result();
        $getDate = array();
        $ii = 0;
        foreach ($data_cutiR as $rowDataCuti) {
            $k_hari = substr($rowDataCuti->awal, 8, 2);
            $k_bulan = substr($rowDataCuti->awal, 5, 2);
            $k_tahun = substr($rowDataCuti->awal, 0, 4);
            for ($l = 0, $c_a = $rowDataCuti->lama_angka; $l < $c_a; $l++) {
                $getDate[$ii][$k_tahun.'-'.$k_bulan.'-'.($k_hari + $l)] = $k_tahun.'-'.$k_bulan.'-'.($k_hari + $l);
            }
            
            $ii++;
        }
    }
}

$nama_bulan = array('Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$i = 1;
$setDate = array();
$test = array();
$tr = '';
foreach ($nama_bulan as $bulan) {
    
    $tr .= '<tr>';
    $tr .= '<td colspan="31" style="text-align:center;padding-top:10px;padding-bottom:10px;font-weight:600">'.$bulan.'</td></tr>';
    $tr .= '<tr>';
    for ($n = 0, $c = (int) cal_days_in_month(CAL_GREGORIAN, $i, date('Y')); $n < $c; $n++) {
        if ($i >= 10) {
            $test[$i - 1][] = date('Y').'-'.$i.'-'.(1 + $n);
        } else {
            $test[$i - 1][] = date('Y').'-0'.$i.'-'.(1 + $n);
        }
        $tr .= '<td>'.(1 + $n).'</td>';
        $setDate[$i - 1][] = 1 + $n;
    }
    $tr .= '</tr>';
    $tr .= '<tr>';
    $getDataDate = array();
    for ($n = 0, $c = (int) cal_days_in_month(CAL_GREGORIAN, $i, date('Y')); $n < $c; $n++) {
        foreach ($getDate as $valDate) {
            if ($i >= 10) {
                //$test[$i - 1][] = date('2018').'-'.$i.'-'.(1 + $n);
                if (isset($valDate[date('Y').'-'.$i.'-'.(1 + $n)])) {
                    $getDataDate[date('Y').'-'.$i.'-'.(1 + $n)][] = $valDate[date('Y').'-'.$i.'-'.(1 + $n)];
                }
            } else {
                //$test[$i - 1][] = date('2018').'-0'.$i.'-'.(1 + $n);
                if (isset($valDate[date('Y').'-0'.$i.'-'.(1 + $n)])) {
                    $getDataDate[date('Y').'-0'.$i.'-'.(1 + $n)][] = $valDate[date('Y').'-0'.$i.'-'.(1 + $n)];
                }
            }
            
        }
        
        if ($i >= 10) {
            $sisa_kuota = isset($getDataDate[date('Y').'-'.$i.'-'.(1 + $n)]) ? $jmlKuota->jml_kuota - count($getDataDate[date('Y').'-'.$i.'-'.(1 + $n)]) : $jmlKuota->jml_kuota;
        } else {
            $sisa_kuota = isset($getDataDate[date('Y').'-0'.$i.'-'.(1 + $n)]) ? $jmlKuota->jml_kuota - count($getDataDate[date('Y').'-0'.$i.'-'.(1 + $n)]) : $jmlKuota->jml_kuota;
        }
        
        
        $tr .= '<td><span style="color: red">'.$sisa_kuota.'</span></td>';
        $setDate[$i - 1][] = 1 + $n;
    }
    $tr .= '</tr>';
    
    $i++;
}

//var_dump($getDataDate);

//var_dump($test);
?>
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5></h5>
  </div>
<div class="widget-content padding">
<h3>Tahun <?php echo date('Y') ?></h3>
<table  class="table table-bordered data-table">
    <?php echo $tr ?>
</table>
</div>

<?php
$this->db->like('awal', date('Y') + 1);
$data_cuti = $this->db->get('data_cuti');
if ($data_cuti) {
    $kuotaCuti = $this->db->query('SELECT * FROM data_kuota_cuti');
    $jmlKuota = $kuotaCuti->row();
    if ($data_cuti->num_rows()) {
        $data_cutiR = $data_cuti->result();
        $getDate = array();
        $ii = 0;
        foreach ($data_cutiR as $rowDataCuti) {
            $k_hari = substr($rowDataCuti->awal, 8, 2);
            $k_bulan = substr($rowDataCuti->awal, 5, 2);
            $k_tahun = substr($rowDataCuti->awal, 0, 4);
            for ($l = 0, $c_a = $rowDataCuti->lama_angka; $l < $c_a; $l++) {
                $getDate[$ii][$k_tahun.'-'.$k_bulan.'-'.($k_hari + $l)] = $k_tahun.'-'.$k_bulan.'-'.($k_hari + $l);
            }
            
            $ii++;
        }
    }
}

$nama_bulan = array('Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$i = 1;
$setDate = array();
$test = array();
$tr = '';
foreach ($nama_bulan as $bulan) {
    
    $tr .= '<tr>';
    $tr .= '<td colspan="31" style="text-align:center;padding-top:10px;padding-bottom:10px;font-weight:600">'.$bulan.'</td></tr>';
    $tr .= '<tr>';
    for ($n = 0, $c = (int) cal_days_in_month(CAL_GREGORIAN, $i, (date('Y') + 1)); $n < $c; $n++) {
        if ($i >= 10) {
            $test[$i - 1][] = (date('Y') + 1).'-'.$i.'-'.(1 + $n);
        } else {
            $test[$i - 1][] = (date('Y') + 1).'-0'.$i.'-'.(1 + $n);
        }
        $tr .= '<td>'.(1 + $n).'</td>';
        $setDate[$i - 1][] = 1 + $n;
    }
    $tr .= '</tr>';
    $tr .= '<tr>';
    $getDataDate = array();
    for ($n = 0, $c = (int) cal_days_in_month(CAL_GREGORIAN, $i, date('Y')); $n < $c; $n++) {
        foreach ($getDate as $valDate) {
            if ($i >= 10) {
                //$test[$i - 1][] = date('2018').'-'.$i.'-'.(1 + $n);
                if (isset($valDate[(date('Y') + 1).'-'.$i.'-'.(1 + $n)])) {
                    $getDataDate[(date('Y') + 1).'-'.$i.'-'.(1 + $n)][] = $valDate[(date('Y') + 1).'-'.$i.'-'.(1 + $n)];
                }
            } else {
                //$test[$i - 1][] = date('2018').'-0'.$i.'-'.(1 + $n);
                if (isset($valDate[(date('Y') + 1).'-0'.$i.'-'.(1 + $n)])) {
                    $getDataDate[(date('Y') + 1).'-0'.$i.'-'.(1 + $n)][] = $valDate[(date('Y') + 1).'-0'.$i.'-'.(1 + $n)];
                }
            }
            
        }
        
        if ($i >= 10) {
            $sisa_kuota = isset($getDataDate[(date('Y') + 1).'-'.$i.'-'.(1 + $n)]) ? $jmlKuota->jml_kuota - count($getDataDate[(date('Y') + 1).'-'.$i.'-'.(1 + $n)]) : $jmlKuota->jml_kuota;
        } else {
            $sisa_kuota = isset($getDataDate[(date('Y') + 1).'-0'.$i.'-'.(1 + $n)]) ? $jmlKuota->jml_kuota - count($getDataDate[(date('Y') + 1).'-0'.$i.'-'.(1 + $n)]) : $jmlKuota->jml_kuota;
        }
        
        
        $tr .= '<td><span style="color: red">'.$sisa_kuota.'</span></td>';
        $setDate[$i - 1][] = 1 + $n;
    }
    $tr .= '</tr>';
    
    $i++;
}
?>

<div class="widget-content padding">
<h3>Tahun <?php echo date('Y') + 1 ?></h3>
<table  class="table table-bordered data-table">
    <?php echo $tr ?>
</table>
</div>
</div>