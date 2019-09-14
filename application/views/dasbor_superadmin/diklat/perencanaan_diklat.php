<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<?php 
  if($this->session->flashdata('notifval')){
    echo '<div class="alert alert-success alert-block">';
    echo $this->session->flashdata('notifval');
    echo '</div>';

  }

  if($this->session->flashdata('tanggal_awal')){
    $tanggal_awal = $this->session->flashdata('tanggal_awal');
  }else{
    $tanggal_awal="";
  }

  if($this->session->flashdata('tanggal_akhir')){
    $tanggal_akhir = $this->session->flashdata('tanggal_akhir');
  }else{
    $tanggal_akhir="";
  }

  if($this->session->flashdata('penyelenggara')){
    $penyelenggara = $this->session->flashdata('penyelenggara');
  }else{
    $penyelenggara="";
  }

  if($this->session->flashdata('nama_pelatihan')){
    $nama_pelatihan = $this->session->flashdata('nama_pelatihan');
  }else{
    $nama_pelatihan="";
  }
?>
<div class="row-fluid">
  <div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-search"></i></span>
        <h5>Filter Pencharian</h5>
     </div>
     <div class="widget-content padding">
      <form action="<?php echo base_url('dasbor_superadmin/perencanaan_diklat/filter_search') ?>" method="POST">
        <div class="form-group">
          <input type="text" class="span3 datepicker" name="tanggal_awal" id="tanggal_awal" autocomplete="off" placeholder="Masukan Tanggal Awal" value="<?php echo $tanggal_awal; ?>" />
        </div>
        <div class="form-group">
          <input type="text" class="span3 datepicker" name="tanggal_akhir" id="tanggal_akhir" autocomplete="off" placeholder="Masukan Tanggal Akhir" value="<?php echo $tanggal_akhir; ?>" />
        </div>
        <div class="form-group">
          <select class="span3" name="penyelenggara" data-placeholder="Berdasarkan Nama Penyelenggara">
            <?php 
              foreach ($usulan_penyelenggara as $usulan_penyelenggara) {
            ?>
              <option value="<?php echo $penyelenggara; ?>"><?php echo $penyelenggara; ?></option>
              <option value="">Nama Penyelenggara</option>
              <option value="<?php echo $usulan_penyelenggara->nama_penyelenggara ?>"><?php echo $usulan_penyelenggara->nama_penyelenggara ?></option>
            <?php
              }
            ?>
          </select>
        </div>
        <br/>
        <div class="form-group">
          <select class="span3" name="nama_atasan" data-placeholder="Berdasarkan Nama Atasan">
            <?php 
              foreach ($nama_atasan as $nama_atasan) {
            ?>
              <option value="">Nama Penyelenggara</option>
              <option value="<?php echo $nama_atasan->nama_atasan ?>"><?php echo $nama_atasan->nama_atasan ?></option>
            <?php
              }
            ?>
          </select>
        </div>
        <br/>
        <div class="form-group">
          <select class="span3" name="nama_pelatihan" data-placeholder="Berdasarkan Nama Pelatihan">
            <?php 
              foreach ($usulan_pelatihan as $usulan_pelatihan) {
            ?>
              <option value="<?php echo $nama_pelatihan; ?>"><?php echo $nama_pelatihan; ?></option>
              <option value="">Nama Penyelenggara</option>
              <option value="<?php echo $usulan_pelatihan->nama_diklat ?>"><?php echo $usulan_pelatihan->nama_diklat ?></option>
            <?php
              }
            ?>
          </select>
        </div>
        <br/>
        <div class="form-group">
          <input type="submit" name="submit" class="span1 btn btn-info" value="GO!">
          <input type="submit" name="submit" class="btn btn-success" value="Export ke Excel">
          <input type="submit" name="submit" class="ajukan btn btn-primary" value="Ajukan">
          <input type="submit" name="submit" class="setujui btn btn-success" value="Setujui">
          <input type="submit" name="submit" class="tolak btn btn-danger" value="Tolak">
          <input type="submit" name="submit" class="hapus btn btn-info" value="Hapus">
        </div>        
      </form>
    </div>
  </div>
</div>

<div class="row-fluid">
  <div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
      <h5><?php  echo $title?></h5>
    </div>
    <div class="widget-content nopadding">
      <table class="table table-bordered data-table" id="example">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Pelatihan</th>
            <th>Jumlah Peserta</th>
            <th>Biaya / Orang</th>
            <th>Biaya</th>
          </tr>
        </thead>  
        <tbody>
          <?php 
            $i=0;
            $total_biaya ="";
            foreach ($nama_diklat as $nama_diklat) {
              $i++;
              $sub_biaya = $nama_diklat->count_peserta*$nama_diklat->biaya_pelatihan;
            ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $nama_diklat->nama_diklat ?></td>
                <td><?php echo $nama_diklat->count_peserta ?></td>
                <td><?php echo number_format($nama_diklat->biaya_pelatihan,0,",",".") ?></td>
                <td><?php echo number_format($sub_biaya,0,",",".") ?></td>
              </tr>
            <?php
              $total_biaya += $sub_biaya;
            }
          ?>
        </tbody>
      </table>
      <div style="text-align: right; padding: 5px;">
        <b>Total Biaya : <?php echo "Rp.".number_format($total_biaya,0,",",".") ?></b>
      </div>
    </div>
  </div>
</div>

<div class="row-fluid">
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5><?php  echo $title?></h5>
  </div>
  <div class="widget-content nopadding">
    <table class="table table-bordered data-table" id="example">
      <thead>
        <tr>
          <th><input type="checkbox" name="check_all" id="check_all"></th>
          <th>No</th>
          <th>Atasan</th>
          <th>Pengaju</th>
          <th>Nama Pelatihan</th>
          <th>Nama Peserta</th>
          <th>Unit Kerja</th>
          <th>Waktu Pelatihan</th>
          <th>Biaya</th>
          <th>Penyelenggara</th>
          <th>Brosur/File</th>
          <th>Lokasi</th>
          <th>Tanggal Permintaan</th>
          <th>Status</th>
        </tr>
      </thead>  
      <tbody>
        <?php 
          $i=0;
          $total_anggaran ="";
          foreach ($usulan_diklat as $usulan_diklat) {
          $i++;
        ?>
        <tr id="<?php echo $usulan_diklat->id_diklat ?>">
          <td><input type="checkbox" name="cb_element[]" value="<?php echo $usulan_diklat->id_diklat ?>"></td>
          <td><?php echo $i ?></td>
          <td><?php echo $usulan_diklat->nama_atasan ?></td>
          <td><?php echo $usulan_diklat->pengaju ?></td>
          <td><?php echo $usulan_diklat->nama_diklat ?></td>
          <td><?php echo $usulan_diklat->nama_peserta ?></td>
          <td><?php echo $usulan_diklat->unit_kerja ?></td>
          <td><?php echo $usulan_diklat->waktu_pelaksanaan ?></td>
          <td><?php echo "Rp".number_format($usulan_diklat->biaya_pelatihan,0,",","."); ?></td>
          <td><?php echo $usulan_diklat->nama_penyelenggara ?></td>
          <td></td>
          <td><?php echo $usulan_diklat->lokasi_pelatihan ?></td>
          <td><?php echo date("d-m-Y",strtotime($usulan_diklat->tanggal)) ?></td>
          <td>
            <?php 
              if($usulan_diklat->status_diklat=="")
              {
            ?>
              <a class="btn btn-default">Tersimpan</a>
            <?php
              }else if($usulan_diklat->status_diklat=="Menunggu")
              {
            ?>
              <a class="btn btn-warning">Telah di Ajukan</a>
            <?php
              }else if($usulan_diklat->status_diklat=="Setujui"){
            ?>
              <a class="btn btn-success">di Setujui</a>
            <?php
              }else{
            ?>
              <a class="btn btn-danger">di Tolak</a>
            <?php
              }  
            ?>
          </td>
        </tr>
        <?php
          $total_anggaran += $usulan_diklat->biaya_pelatihan; 
          }
        ?>
      </tbody>
    </table>
    <table>
      <tr>
        <td><b>Total Anggaran Diklat</b></td>
        <td><b>:</b></td>
        <td><b><?php echo "Rp.".number_format($total_anggaran,0,",",".") ?></b></td>
      </tr>
    </table>
  </div>
</div>
</div>

<input type="submit" id="pendaftaran_peserta" class="pendaftaran_peserta btn btn-success" value="Pendaftaran" />
<?php 
  if($this->session->flashdata('notifval')){
    echo '<div class="alert alert-success alert-block">';
    echo $this->session->flashdata('notifval');
    echo '</div>';
    date_default_timezone_set("Asia/Jakarta");
  }
  echo form_open(base_url('dasbor_superadmin/input_diklat/tambah_peserta_diklat'));
?>
<div id="pendaftaran_show"></div>
<script type="text/javascript">
  //date picker setting
    $(".datepicker").datepicker();

    $('input.biaya').keyup(function(event) {
      // skip for arrow keys
      if(event.which >= 37 && event.which <= 40) return;
      // format number
      $(this).val(function(index, value) {
        return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      });
    });
</script>
<script type="text/javascript">
    //date picker setting
    $("#tanggal_awal").datepicker( {
        format: "yyyy-mm-dd",
    });

    $("#tanggal_akhir").datepicker( {
        format: "yyyy-mm-dd",
    });

    $("#check_all").click(function(){
      $('input:checkbox').not(this).prop('checked', this.checked);
    });

    $('.disable_update').click(function(){
      alert("Pelatihan Dengan Anggaran Subsidi Tidak Membutuhkan Update SPJ, Beritahu Administrator jika ini sebuah kesalahan");
    });

    $('.ajukan').click(function(e)
    {
      e.preventDefault();
      if(confirm("Yakin mau ajukan data ini ?"))
      {
       var id  = [];
       $(':checkbox:checked').each(function(i){
        id[i] = $(this).val();
       });
       
       if(id.length === 0) //jika array kosong
       {
        alert("Silahkan Cecklist data terlebih dahulu");
       }
       else
       {
        $.ajax({
         url:'<?php echo base_url('dasbor_superadmin/perencanaan_diklat/ajukan_diklat') ?>',
         type: "POST",
         data:{id:id},
         success:function(data)
         {
          for(var i=0; i<id.length; i++)
          {
           $('tr#'+id[i]+'').css('background-color', 'lightgreen');
           $('tr#'+id[i]+'').fadeOut('slow');
          }
         },
         error: function(jqXHR, textStatus, errorThrown) {
             console.log(textStatus, errorThrown);
          }
        });
       }
       
      }
      else
      {
       return false;
      }
    });

    $('.setujui').click(function(e)
    {
      e.preventDefault();
      if(confirm("Yakin mau ajukan data ini ?"))
      {
       var id  = [];
       $(':checkbox:checked').each(function(i){
        id[i] = $(this).val();
       });
       
       if(id.length === 0) //jika array kosong
       {
        alert("Silahkan Cecklist data terlebih dahulu");
       }
       else
       {
        $.ajax({
         url:'<?php echo base_url('dasbor_superadmin/perencanaan_diklat/setujui_diklat') ?>',
         type: "POST",
         data:{id:id},
         success:function(data)
         {
          for(var i=0; i<id.length; i++)
          {
           $('tr#'+id[i]+'').css('background-color', 'lightgreen');
           $('tr#'+id[i]+'').fadeOut('slow');
          }
         },
         error: function(jqXHR, textStatus, errorThrown) {
             console.log(textStatus, errorThrown);
          }
        });
       }
       
      }
      else
      {
       return false;
      }
    });

    $('.tolak').click(function(e)
    {
      e.preventDefault();
      if(confirm("Yakin mau ajukan data ini ?"))
      {
       var id  = [];
       $(':checkbox:checked').each(function(i){
        id[i] = $(this).val();
       });
       
       if(id.length === 0) //jika array kosong
       {
        alert("Silahkan Cecklist data terlebih dahulu");
       }
       else
       {
        $.ajax({
         url:'<?php echo base_url('dasbor_superadmin/perencanaan_diklat/tolak_diklat') ?>',
         type: "POST",
         data:{id:id},
         success:function(data)
         {
          for(var i=0; i<id.length; i++)
          {
           $('tr#'+id[i]+'').css('background-color', 'lightgreen');
           $('tr#'+id[i]+'').fadeOut('slow');
          }
         },
         error: function(jqXHR, textStatus, errorThrown) {
             console.log(textStatus, errorThrown);
          }
        });
       }
       
      }
      else
      {
       return false;
      }
    });

    $('.hapus').click(function(e)
    {
      e.preventDefault();
      if(confirm("Yakin mau ajukan data ini ?"))
      {
       var id  = [];
       $(':checkbox:checked').each(function(i){
        id[i] = $(this).val();
       });
       
       if(id.length === 0) //jika array kosong
       {
        alert("Silahkan Cecklist data terlebih dahulu");
       }
       else
       {
        $.ajax({
         url:'<?php echo base_url('dasbor_superadmin/perencanaan_diklat/hapus_diklat') ?>',
         type: "POST",
         data:{id:id},
         success:function(data)
         {
          for(var i=0; i<id.length; i++)
          {
           $('tr#'+id[i]+'').css('background-color', 'lightgreen');
           $('tr#'+id[i]+'').fadeOut('slow');
          }
         },
         error: function(jqXHR, textStatus, errorThrown) {
             console.log(textStatus, errorThrown);
          }
        });
       }
       
      }
      else
      {
       return false;
      }
    });

    $('#pendaftaran_peserta').click(function(e){
      e.preventDefault();
      var table = $('table#example').DataTable()
      if(confirm("Yakin Mau Mendaftarkan Peserta ?"))
      {
        var id = [];  
        table.$('input[type="checkbox"]:checked').each(function(key, el) {
          var val = $(el).val();
          id[key] = val;
        })
       
       if(id.length === 0) //jika array kosong
       {
        alert("Silahkan Cecklist data terlebih dahulu");
       }
       else
       {
        $.ajax({
         url:'<?php echo base_url('dasbor_superadmin/perencanaan_diklat/pendaftaran_peserta') ?>',
         type: "POST",
         data:{id:id},
         success:function(data)
         {
          $('#pendaftaran_show').html(data);
         }
         
        });
       }
       
      }
      else
      {
       return false;
      }
    });
</script>