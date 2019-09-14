<div class="btn-group">
  <?php 
  	if($data_cuti->status=="Menunggu"){
  		echo '<a class="btn btn-warning">'.$data_cuti->status.'</a>';
  		echo '<button data-toggle="dropdown" class="btn btn-warning dropdown-toggle"><span class="caret"></span></button>';
  	}else if($data_cuti->status=="Setujui"){
  		echo '<a class="btn btn-success">'.$data_cuti->status.'</a>';
  		echo '<button data-toggle="dropdown" class="btn btn-success dropdown-toggle"><span class="caret"></span></button>';
  	}else if($data_cuti->status=="Tolak"){
  		echo '<a class="btn btn-danger">'.$data_cuti->status.'</a>';
  		echo '<button data-toggle="dropdown" class="btn btn-danger dropdown-toggle"><span class="caret"></span></button>';
  	}
  ?>
  <?php
    if($data_cuti->status=="Tolak"){
  ?>
    <ul class="dropdown-menu">
      <li><a href="<?php echo $url_kirim_pesan ?>" >Kirim Alasan Penolakan</a></li>
    </ul>
  <?php
    }else{
  ?>
    <ul class="dropdown-menu">
      <li><a href="<?php echo $url_menunggu ?>" >Menunggu</a></li>
      <li><a href="<?php echo $url_setujui ?>" >Setujui</a></li>
      <li><a href="<?php echo $url_tolak ?>" >Tolak</a></li>
    </ul>
  <?php
    }
  ?>
  </form>
</div>
