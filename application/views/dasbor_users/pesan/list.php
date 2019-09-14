<div class="row-fluid">
	<div class="widget-box">
		<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    		<h5><?php  echo $subtitle?></h5>
  		</div>
  		<div class="widget-content padding">
  			<table class="table table-bordered data-table">
            <thead>
              <tr>
                <th>Pengirim Pesan</th>
                <th>Judul Pesan</th>
                <th>Tanggal</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $i=0;
              foreach ($list_pesan as $list_pesan) {
              $i++;
              ?>
              <tr>
                <td><?php echo $list_pesan->dari ?></td>
                <td><strong><a href="<?php echo base_url('dasbor_users/pesan/detail_pesan/'.$list_pesan->id) ?>" style="text-decoration: underline;color: blue;"><?php echo $list_pesan->judul ?></a></strong></td>
                <td><?php echo date("d F Y H:i",strtotime($list_pesan->tanggal)) ?></td>
                <td><?php echo $list_pesan->status_baca." di Baca" ?></td>
              </tr>
              <?php
              }
              ?>
            </tbody>
  			</table>
		</div>
	</div>
</div>