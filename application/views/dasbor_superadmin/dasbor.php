<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lr"> <a href="#"> <i class="icon-group"><?php echo $this->db->where('jenis_kelamin','P')->where('status','Aktif')->count_all_results("data_pegawai"); ?></i>Pegawai Perempuan</a> </li>
        <li class="bg_lg"> <a href="#"> <i class="icon-group"><?php echo $this->db->where('jenis_kelamin','L')->where('status','Aktif')->count_all_results("data_pegawai"); ?></i>Pegawai Laki - Laki</a> </li>
        <li class="bg_lb"> <a href="<?php echo base_url('dasbor_superadmin/data_pegawai/pegawai_pns') ?>"> <i class="icon-group"><?php echo $this->db->where('nip!=','')->where('status','Aktif')->count_all_results("data_pegawai"); ?></i>PNS</a> </li>
        <li class="bg_lo"> <a href="<?php echo base_url('dasbor_superadmin/data_pegawai/dokter_spesialis') ?>"> <i class="icon-user-md"><?php echo $this->db->where('jabatan','Dokter Spesialis')->where('status','Aktif')->count_all_results("data_pegawai"); ?></i>Dokter Spesialis</a> </li>
        <li class="bg_lr"> <a href="<?php echo base_url('dasbor_superadmin/data_pegawai/dokter_umum') ?>"> <i class="icon-user-md"><?php echo $this->db->where('jabatan','Dokter Umum')->where('nip','')->where('status','Aktif')->count_all_results("data_pegawai"); ?></i>Dokter Umum</a> </li>
        <li class="bg_lv"> <a href="<?php echo base_url('dasbor_superadmin/data_pegawai') ?>"> <i class="icon-group"><?php echo $this->db->where('status','Aktif')->where('nip','')->where('jabatan !=','security')->where('jabatan !=','cleaning service')->where('jabatan !=','Dokter Umum')->where('jabatan!=','Dokter Spesialis')->count_all_results("data_pegawai"); ?></i>Non PNS</a> </li>
        <li class="bg_ls"> <a href="<?php echo base_url('dasbor_superadmin/data_pegawai/security') ?>"> <i class="icon-group"><?php echo $this->db->where('status','Aktif')->where('jabatan','Security')->count_all_results("data_pegawai"); ?></i>Security</a> </li>
        <li class="bg_ly"> <a href="<?php echo base_url('dasbor_superadmin/data_pegawai/cleaning_service') ?>"> <i class="icon-group"><?php echo $this->db->where('status','Aktif')->where('jabatan','cleaning service')->count_all_results("data_pegawai"); ?></i>Cleaning Service</a> </li>
        <li class="bg_lb"> <a href="#"> <i class="icon-group"><?php echo $this->db->where('status','Aktif')->count_all_results("data_pegawai"); ?></i>Total Seluruh Pegawai</a> </li>
      </ul>
    </div>
</div>
<div class="row-fluid">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-search"></i></span>
            <h5>Chart Data Kepegawaian Berdasarkan Jenis Kelamin di Setiap Unit Kerja</h5>
        </div>
        <canvas id="myChart" width="300" height="100"></canvas>
    </div>
</div>
<div class="row-fluid">
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5>Data Jumlah Pegawai Berdasarkan Jenis Kelamin di Setiap Unit Kerja</h5>
  </div>
  <div class="widget-content nopadding">
    <table class="table table-bordered data-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Unit Kerja</th>
          <th>Perempuan</th>
          <th>Laki - Laki</th>
          <th>Jumlah</th>
        </tr>
      </thead>  
      <tbody>
        <?php 
          $query = $this->db->query("SELECT unit_kerja,nama,status, SUM(IF(jenis_kelamin='P',1,0)) AS Perempuan, SUM(IF(jenis_kelamin='L',1,0)) AS LakiLaki, COUNT(*) AS jumlah FROM data_pegawai WHERE status='Aktif' GROUP BY unit_kerja ");
          $i=0;
          $unit_kerja ="";
          $total_perempuan="";
          $total_laki = "";
          foreach ($query->result() as $val) {
          $i++;
          $unit_kerja .= "'".$val->unit_kerja."', ";
          $total_perempuan .= $val->Perempuan.",";
          $total_laki .= $val->LakiLaki.",";

        ?>
        <tr>
          <td><?php echo $i ?></td>
          <td>
              <div class="accordion-group widget-box">
                <div class="accordion-heading">
                  <div class="widget-title"> <a data-parent="#collapse-group" href="#<?php echo $i ?>" data-toggle="collapse"> <span class="icon"><i class="icon-ok"></i></span>
                    <h5><?php echo $val->unit_kerja ?></h5>
                    </a> </div>
                </div>
                <div class="collapse accordion-body" id="<?php echo $i ?>">
                  <div class="widget-content">
                    <?php 
                    $query_nama = $this->db->query('SELECT nama,status FROM data_pegawai WHERE status="Aktif" AND unit_kerja="'.$val->unit_kerja.'" ');
                   $ii=0;
                    foreach ($query_nama->result() as $val_nama)
                    {
                        $ii++;
                      echo $ii.". ".$val_nama->nama."<br/>";
                    }
                    ?>
                  </div>
                </div>
              </div>
          </td>
          <td><?php echo $val->Perempuan ?></td>
          <td><?php echo $val->LakiLaki ?></td>
          <td><?php echo $val->jumlah ?></td>

        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
</div>

<script type="text/javascript">

var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: [<?php echo  $unit_kerja ?>],
        datasets: [{
            label: "Perempuan",
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [<?php echo $total_perempuan ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',//warna background cart perempuan
                /*'rgba(54, 162, 235, 0.2)',//pilihan warna lain
                'rgba(255, 206, 86, 0.2)',//pilihan warna lain
                'rgba(75, 192, 192, 0.2)',//pilihan warna lain
                'rgba(153, 102, 255, 0.2)',//pilihan warna lain
                'rgba(255, 159, 64, 0.2)'*///pilihan warna lain
            ],
            borderColor: [
                'rgba(255,99,132,1)',//warna garis cart perempuan
                /*'rgba(54, 162, 235, 1)',//pilihan warna lain
                'rgba(255, 206, 86, 1)',//pilihan warna lain
                'rgba(75, 192, 192, 1)',//pilihan warna lain
                'rgba(153, 102, 255, 1)',//pilihan warna lain
                'rgba(255, 159, 64, 1)'*///pilihan warna lain
            ],
            borderWidth: 1//mengatur ketablan garis chart Perempuan  
        },{
            label: "Laki - Laki",
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [<?php echo $total_laki ?>],
            backgroundColor: [
                'rgba(0,255,0,0.3)',//warna background cart laki - laki
                /*'rgba(54, 162, 235, 0.2)',//pilihan warna lain
                'rgba(255, 206, 86, 0.2)',//pilihan warna lain
                'rgba(75, 192, 192, 0.2)',//pilihan warna lain
                'rgba(153, 102, 255, 0.2)',//pilihan warna lain
                'rgba(255, 159, 64, 0.2)'*///pilihan warna lain
            ],
            borderColor: [
                'rgb(38, 114, 38)',//warna garis cart laki-laki
                /*'rgba(54, 162, 235, 1)',//pilihan warna lain
                'rgba(255, 206, 86, 1)',//pilihan warna lain
                'rgba(75, 192, 192, 1)',//pilihan warna lain
                'rgba(153, 102, 255, 1)',//pilihan warna lain
                'rgba(255, 159, 64, 1)'*///pilihan warna lain
            ],
            borderWidth: 1//mengatur ketablan garis chart laki-laki 
        }]
    },

    options: 
    {
        scales:{
            xAxes: [{
                gridLines: {
                    display:true,//menyembunyikan atau menampilkan grid line
                    lineWidth:1,//mengatur ketebalan garis grid line
                    borderDash:[0]//untuk membuat garis grid line putus2 dengan ketebalan tertentu
                },
                ticks:{
                    display: true,//menampilkan data unit kerja sumbu (x)
                    fontColor:'black',//merubah warna font sumbu (x)
                    reverse:false,//rotation chart sumbu (x)
                    autoSkip: false,//untuk menampilkan seluruh data unit kerja atau sumbu (x)
                    autoSkipPadding:0,//untuk memberi jarak padding sumbu (x)
                    maxRotation:45//mengatur rotasi pada teks sumbu (x)
                }
            }],
            yAxes: [{
                gridLines: {
                    display:true,//menyembunyikan atau menampilkan grid line
                    lineWidth:1,//mengatur ketebalan garis grid line
                    borderDash:[0]//untuk membuat garis grid line putus2 dengan ketebalan tertentu

                },
                ticks:{
                    display: true,//menampilkan jumlah data unit kerja sumbu (y)
                    fontColor:'black',//merubah warna font sumbu (y)
                    reverse:false,//rotation chart sumbu (y)
                    autoSkip: false//untuk menampilkan seluruh jumlah jenis kelamin atau sumbu (y)
                }   
            }]
        }
    }
});
</script>