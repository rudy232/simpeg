<?php 
  $query = $this->db->query('SELECT * FROM data_pegawai');
  $m_pj = $this->db->query('SELECT * FROM data_pegawai a LEFT JOIN master_pj b ON a.id_master_pj = b.id_pj WHERE nama = "'.$this->session->userdata('nama').'" ');
  $row = $m_pj->row();
?>
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
  <?php 
    if($this->session->userdata('level')=='Superadmin'){
  ?>
    <li class=""><a href="<?php echo base_url('dasbor_superadmin/dasbor')?>"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li id="submenu_pegawai" class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>Pegawai</span> <!--<span class="listmenu_pegawai label label-important"></span>--><i class="icon-sort-down" style="float: right;"></i> </a>
      <ul>
        <li><a href="<?php echo base_url('dasbor_superadmin/data_pegawai/list_upload')?>"><i class="icon icon-group"></i> <span>Tambah / Upload</span></a></li>
        <?php 
        if($query->num_rows()==1){
        ?>
        <li><a href="#" onclick="lock()"><i class="icon icon-user"></i> <span style="color: #666">Pegawai PNS</span><i class="icon-lock"></i></a></li>
        <li><a href="#" onclick="lock()"><i class="icon icon-user"></i> <span style="color: #666">Dokter Spesialis</span><i class="icon-lock"></i></a></li>
        <li><a href="#" onclick="lock()"><i class="icon icon-user"></i> <span style="color: #666">Dokter Umum</span><i class="icon-lock"></i></a></li>
        <li><a href="#" onclick="lock()"><i class="icon icon-user"></i> <span style="color: #666">Pegawai Non PNS</span><i class="icon-lock"></i></a></li>
        <li><a href="#" onclick="lock()"><i class="icon icon-user"></i> <span style="color: #666">Pegawai Security</span><i class="icon-lock"></i></a></li>
        <li><a href="#" onclick="lock()"><i class="icon icon-user"></i> <span style="color: #666">Pegawai Cleaning Service</span><i class="icon-lock"></i></a></li>
        <?php
        }else{
        ?>
        <li><a href="<?php echo base_url('dasbor_superadmin/data_pegawai/pegawai_pns')?>"><i class="icon icon-user"></i> <span>Pegawai PNS</span></a></li>
        <li><a href="<?php echo base_url('dasbor_superadmin/data_pegawai/dokter_spesialis')?>"><i class="icon icon-user"></i> <span>Dokter Spesialis</span></a></li>
        <li><a href="<?php echo base_url('dasbor_superadmin/data_pegawai/dokter_umum')?>"><i class="icon icon-user"></i> <span>Dokter Umum</span></a></li>
        <li><a href="<?php echo base_url('dasbor_superadmin/data_pegawai')?>"><i class="icon icon-user"></i> <span>Pegawai Non PNS</span></a></li>
        <li><a href="<?php echo base_url('dasbor_superadmin/data_pegawai/security')?>"><i class="icon icon-user"></i> <span>Pegawai Security</span></a></li>
        <li><a href="<?php echo base_url('dasbor_superadmin/data_pegawai/cleaning_service')?>"><i class="icon icon-user"></i> <span>Pegawai Cleaning Service</span></a></li>
        <?php
        }
        ?>
      </ul>
    </li>
    <li id="submenu_aktifitas" class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Aktifitas</span><i class="icon-sort-down" style="float: right;"></i></a>
      <ul>
        <li><a href="<?php echo base_url('dasbor_superadmin/aktifitas/daftar_uraiantugas')?>">Data Aktifitas Umum <button class="btn btn-success btn-mini">Aktif</button></a></li>
      </ul>
    </li>
    <li id="submenu_pegawai" class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>Diklat</span> <!--<span class="listmenu_pegawai label label-important"></span>--><i class="icon-sort-down" style="float: right;"></i> </a>
      <ul>
        <?php 
        if($query->num_rows()==1){
        ?>
        <li><a href="#" onclick="lock()"><i class="icon icon-user"></i> <span style="color: #666">Input Peserta Diklat</span><i class="icon-lock"></i></a></li>
        <li><a href="#" onclick="lock()"><i class="icon icon-user"></i> <span style="color: #666">Laporan Diklat</span><i class="icon-lock"></i></a></li>
        <?php
        }else{
        ?>
        <li><a href="<?php echo base_url('dasbor_superadmin/input_diklat')?>"><i class="icon icon-user"></i> <span>Input Peserta Diklat</span></a></li>
        <li><a href="<?php echo base_url('dasbor_superadmin/laporan_diklat')?>"><i class="icon icon-user"></i> <span>Laporan Diklat</span></a></li>
        <li><a href="<?php echo base_url('dasbor_superadmin/perencanaan_diklat')?>"><i class="icon icon-user"></i> <span>Perencanaan Diklat</span></a></li>
        <?php
        }
        ?>
      </ul>
    </li>
    <?php 
      if($query->num_rows()==1){
        $url_cuti_pegawai = '<li><a href="#" onclick="lock()"><i class="icon icon-calendar"></i> <span style="color:#666">Cuti Pegawai</span><i class="icon-lock"></i><i class="icon-sort-down" style="float: right;"></i></a>';
      }else{
        $url_cuti_pegawai = '<li class="submenu"><a href="#"><i class="icon icon-calendar"></i> <span>Cuti Pegawai</span><i class="icon-sort-down" style="float: right;"></i></a>';
      }
    ?>
    <?php echo $url_cuti_pegawai ?>
      <ul>
        <li class=""><a href="<?php echo base_url('dasbor_superadmin/cuti_pegawai')?>"><i class="icon icon-calendar"></i> <span>Cuti Pegawai</span></a></li>
        <li class=""><a href="<?php echo base_url('dasbor_superadmin/total_cuti_pegawai')?>"><i class="icon icon-calendar"></i> <span>Total Cuti Pegawai</span></a></li>
        <li class=""><a href="<?php echo base_url('dasbor_superadmin/cuti_pegawai/laporan_cuti')?>"><i class="icon icon-book"></i> <span>Laporan Cuti</span></a> </li>
        <li class=""><a href="<?php echo base_url('dasbor_superadmin/pengaturan_cuti')?>" target="_blank"><i class="icon icon-wrench"></i> <span>Setting Cuti Pegawai</span></a></li>
        <li class=""><a href="<?php echo base_url('dasbor_superadmin/cuti/block_tgl_cuti')?>"><i class="icon icon-remove"></i> <span>Block Cuti Pegawai</span></a></li>
      </ul>
    </li>
    <li id="submenu_cutipegawai" class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Data Master</span> <!--<span class="listmenu_cutipegawai label label-important"></span>--><i class="icon-sort-down" style="float: right;"></i></a>
      <ul>
        <li><a href="<?php echo base_url('dasbor_superadmin/master_atasan')?>">Data Master Atasan <button class="btn btn-success btn-mini">Aktif</button></a></li>
        <!--<li><a href="<?php echo base_url('dasbor_superadmin/master_eselon')?>">Data Master Eseloan</a></li>-->
        <!--<li><a href="<?php echo base_url('dasbor_superadmin/master_golongan')?>">Data Master Golongan</a></li>-->
        <li><a href="<?php echo base_url('dasbor_superadmin/master_jabatan')?>">Data Master Jabatan <button class="btn btn-success btn-mini">Aktif</button></a></li>
        <li><a href="<?php echo base_url('dasbor_superadmin/master_unit_kerja')?>">Data Master Unit Kerja <button class="btn btn-success btn-mini">Aktif</button></a></li>
        <!--<li><a href="<?php echo base_url('dasbor_superadmin/master_pendidikan')?>">Data Master Pendidikan</a></li>-->
        <!--<li><a href="<?php echo base_url('dasbor_superadmin/master_penghargaan')?>">Data Master Penghargaan</a></li>-->
        <li><a href="<?php echo base_url()?>dasbor_superadmin/master_pelatihan">Data Master Pelatihan<button class="btn btn-success btn-mini">Aktif</button></a></li>
        <!--<li><a href="<?php echo base_url('dasbor_superadmin/master_hukuman')?>">Data Master Hukuman</a></li>-->
        <!--<li><a href="<?php echo base_url('dasbor_superadmin/master_status_jabatan')?>">Data Master Status Jabatan</a></li>-->
        <!--<li><a href="<?php echo base_url('dasbor_superadmin/master_status_pegawai')?>">Data Master Status Pegawai</a></li>-->
      </ul>
    </li>
    <li class=""><a href="<?php echo base_url('dasbor_users/planing_cuti')?>" target="_blank"><i class="icon icon-cogs"></i> <span>Planing Cuti</span></a> </li>
    <li class=""><a href="<?php echo base_url('dasbor_superadmin/profile')?>"><i class="icon icon-wrench"></i> <span>Setting Profile RS</span></a> </li>
    <li class=""><a href="<?php echo base_url('dasbor_superadmin/log')?>"><i class="icon icon-wrench"></i> <span>Log Aktifitas</span></a> </li>
  <?php
  }else if($this->session->userdata('level')=='Admin'){
  ?>
    <li class=""><a href="<?php echo base_url('dasbor_admin/cuti_pegawai')?>"><i class="icon icon-calendar"></i> <span>Cuti Pegawai</span></a></li>
    <li class=""><a href="<?php echo base_url('dasbor_users/planing_cuti')?>"><i class="icon icon-cogs"></i> <span>Planing Cuti</span></a> </li>
<?php
  }else{
  ?>
    <li class=""><a href="<?php echo base_url('dasbor_users/dasbor/detail')?>"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <?php 
      if($row->pj_unit!=""){
    ?>
      <li class=""><a href="<?php echo base_url('dasbor_users/data_pegawai/tambah')?>"><i class="icon icon-calendar"></i> <span>Input Data</span></a> </li>
      <li class=""><a href="<?php echo base_url('dasbor_users/diklat')?>"><i class="icon icon-calendar"></i> <span>Usulan Diklat</span></a> </li>
      <li class=""><a href="<?php echo base_url('dasbor_users/aktifitas')?>"><i class="icon icon-calendar"></i> <span>Input Aktifitas</span></a> </li>
      <li class=""><a href="<?php echo base_url('dasbor_users/diklat/dok_pelatihan')?>"><i class="icon icon-book"></i> <span>Dok Pelatihan</span></a> </li>
      <li class=""><a href="<?php echo base_url('dasbor_users/detail_pegawai')?>"><i class="icon icon-calendar"></i> <span>Cuti Pegawai</span></a> </li>
      <li class=""><a href="<?php echo base_url('dasbor_users/planing_cuti')?>" target="_blank"><i class="icon icon-cogs"></i> <span>Planing Cuti</span></a> </li>
    <?php
      }else{
    ?>
      <li class=""><a href="<?php echo base_url('dasbor_users/data_pegawai/tambah')?>"><i class="icon icon-calendar"></i> <span>Input Data</span></a> </li>
      <li class=""><a href="<?php echo base_url('dasbor_users/aktifitas')?>"><i class="icon icon-calendar"></i> <span>Input Aktifitas</span></a> </li>
      <li class=""><a href="<?php echo base_url('dasbor_users/diklat/dok_pelatihan')?>"><i class="icon icon-book"></i> <span>Dok Pelatihan</span></a> </li>
      <li class=""><a href="<?php echo base_url('dasbor_users/detail_pegawai')?>"><i class="icon icon-calendar"></i> <span>Cuti Pegawai</span></a> </li>
      <li class=""><a href="<?php echo base_url('dasbor_users/planing_cuti')?>" target="_blank"><i class="icon icon-cogs"></i> <span>Planing Cuti</span></a> </li>
    <?php
      }
    ?>
  <?php
  }
  ?>
  </ul>
</div>
<!--sidebar-menu-->
<!--main-container-part-->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to <?php echo $alt ?>" class="tip-bottom"><i class="icon-<?php echo $icon ?>"></i> Home</a> <a href="#" class="current"><?php echo $sub ?></a> </div>
    <h1><?php echo $interface ?></h1>
  </div>
  <div class="container-fluid">
    <hr>




