<div class="row-fluid">
	<div class="widget-box">
		<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    		<h5><?php  echo $title?></h5>
  		</div>
  		<div class="widget-content padding">
  			<table class="table table-bordered">
  				<tbody>
  					<tr>
  						<td>Tanggal</td>
  						<td>:</td>
  						<td><?php if($isi_pesan->isi_pesan==""){echo "Belum terdapat pesan";}else{ echo "<strong>".date("d F Y",strtotime($isi_pesan->tanggal))." ".date("H:i",strtotime($isi_pesan->tanggal))."</strong>";} ?></td>
  					</tr>
  					<tr>
  						<td>Dari</td>
  						<td>:</td>
  						<td><?php if($isi_pesan->isi_pesan==""){echo "Belum terdapat pesan";}else{ echo $isi_pesan->dari;} ?></td>
  					</tr>
  					<tr>
  						<td>Ke</td>
  						<td>:</td>
  						<td><?php if($isi_pesan->isi_pesan==""){echo "Belum terdapat pesan";}else{ echo $isi_pesan->ke;} ?></td>
  					</tr>
  					<tr>
  						<td>Isi Pesan</td>
  						<td>:</td>
  						<td><?php if($isi_pesan->isi_pesan==""){echo "Belum terdapat pesan";}else{ echo $isi_pesan->isi_pesan;} ?></td>
  					</tr>
  				</tbody>
  			</table>
		</div>
	</div>
</div>