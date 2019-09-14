<?php 
	$query = $this->db->query('SELECT id_data_pegawai,status_baca, SUM(IF(status_baca="Belum",1,0)) AS total_pesan, COUNT(*) AS total FROM data_kirim_pesan WHERE status_baca="Belum" AND id_data_pegawai="'.$this->session->userdata('id_user').'"');
	$count ="";
	foreach ($query->result() as $val) {
		$count .= $val->total;
	}

  $query2 = $this->db->query('SELECT * FROM data_pegawai');
  if($query2->num_rows()==1){
    $url_message = '<li class="dropdown" id="menu-messages"><a href="#" onclick="lock()"><i class="icon icon-envelope"></i> <span class="text" style="color:#666">Messages</span> <span class="label label-important" style="background:#666">0</span> <span class="label label-important" style="background:#666"><i class="icon-lock"></i></span> <b class="caret"></b></a>';
  }else{
    $url_message = '<li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">'.$count.'</span> <b class="caret"></b></a>';
  }
?>
<!--Header-part-->
<div id="header">
	<h1 style="background: url('<?php echo base_url('assets/matrix-admin-package/img/') ?>logors.png') no-repeat;"></h1>
</div>
<!--close-Header-part--> 
<div id="search">
  <?php echo $this->session->userdata('nama')." | ".$this->session->userdata('level') ?>
</div>
<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li class=""><a title="" href="<?php echo base_url('logout') ?>"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
     <?php echo $url_message ?>
      <ul class="dropdown-menu">
        <?php
        if($this->session->userdata('level')=="Superadmin"){
        ?>
        <li><a class="sAdd" title="" href="<?php echo base_url('dasbor_superadmin/kirim_pesan') ?>"><i class="icon-plus"></i> Kirim Pesan</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="<?php echo base_url('dasbor_superadmin/kirim_pesan/inbox') ?>"><i class="icon-envelope"></i> inbox <span class="label label-important"><?php echo $count ?></span></a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> Sampah</a></li>
        <?php
        }else{
        ?>
        <li><a class="sAdd" title="" href="<?php echo base_url('dasbor_users/pesan/kirim') ?>"><i class="icon-plus"></i> Kirim Pesan</a></li>
        <li><a class="sInbox" title="" href="<?php echo base_url('dasbor_users/pesan') ?>"><i class="icon-envelope"></i> inbox <span class="label label-important"><?php echo $count ?></span></a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <?php
        }
        ?>
      </ul>
    </li>

  </ul>
</div>
<!--close-top-Header-menu-->
