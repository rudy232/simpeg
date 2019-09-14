<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<style>
  .well {
    background-color: #fff;
    border: 0;
    box-shadow: none;
    border-left: 4px solid #19d053
  }
</style>
<div class="row-fluid">
  <div class="well">
    <h4>Keterangan</h4>
    <p>Pada label warna <span class="label label-success">hijau</span> tidak lewat angka 18</p>
    <p>Pada label warna <span class="label" style="background:#e62d2d">merah</span> lewat dari angka 18</p>
  </div>
</div>
<div class="row-fluid">
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5><?php  echo $title?></h5>
  </div>
  <div class="widget-content padding">
    <table class="table table-bordered data-table">
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama</th>
          <th>Limit sisa cuti</th>
          <th>Total sisa cuti</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $no = 1;
          $query = $this->db->query('SELECT *, (IF(SUM(`sisa_cuti`) > 18, 18, SUM(`sisa_cuti`))) AS `limit_counts`, SUM(`sisa_cuti`) AS `counts` FROM `data_cuti` LEFT JOIN `data_pegawai` USING(`id_data_pegawai`) GROUP BY `id_data_pegawai` ORDER BY `awal` DESC');
          foreach ($query->result() as $v) {
        ?>
        <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $v->nama ?></td>
        <td><?php echo $v->limit_counts ?></td>
        <td><?php echo ($v->counts > 18 ? '<div class="label" style="background:#e62d2d">'.$v->counts.'</div>' : '<div class="label label-success">'.$v->counts.'</div>') ?></td>
        </tr>
        <?php
            $no++;
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
</div>
<script type="text/javascript">
    //date picker setting
    $("#ambil_bulan").datepicker( {
        format: "mm-yyyy",
        viewMode: "months", 
        minViewMode: "months"
    });
</script>