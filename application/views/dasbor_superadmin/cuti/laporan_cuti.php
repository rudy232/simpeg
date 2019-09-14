<?php 
if($this->simple_admin->cek_login_superadmin());
?>
<?php 
  if($this->session->flashdata('notifval')){
    echo '<div class="alert alert-success alert-block">';
    echo $this->session->flashdata('notifval');
    echo '</div>';

  }
?>
<div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lg"> <a href="#"> <i class="icon-check"><?php echo $this->db->where('status_print','Sudah')->count_all_results("data_cuti"); ?></i>Surat Cuti Yang Sudah di Print</a> </li>
        <li class="bg_lr"> <a href="#"> <i class="icon-eject"><?php echo $this->db->where('status_print','Belum')->count_all_results("data_cuti"); ?></i>Surat Cuti Yang Belum di Print</a> </li>
      </ul>
    </div>
</div>
<div class="row-fluid">
	<div class="widget-box">
		<div class="widget-title"> <span class="icon"><i class="icon-search"></i></span>
		    <h5>Filter Pencharian</h5>
		 </div>
		 <div class="widget-content padding">
		 	<form action="<?php echo base_url('dasbor_superadmin/cuti/filter_search') ?>" method="POST">
			 	<div class="form-group">
				  <input type="text" class="span3 datepicker" id="ambil_bulan" name="tahun" placeholder="Berdasarkan Bulan dan Tahun" value="<?php echo $this->session->flashdata('tahun') ?>">
				</div>
				<div class="form-group">
				  <select class="span3" name="unit_kerja" data-placeholder="Berdasarkan Unit Kerja">
				  	<?php 
				  	if($this->session->flashdata('unit_kerja')){
				  		echo "<option value='".$this->session->flashdata('unit_kerja')."'>".$this->session->flashdata('unit_kerja')."</option>";
				  		foreach ($listing_unit_kerja as $listing_unit_kerja) {
				  		echo "<option value='".$listing_unit_kerja->nama_unit_kerja."'>".$listing_unit_kerja->nama_unit_kerja."</option> ";
				  		}
				  	}else{
				  		echo "<option></option>";
				  	}
				  	foreach ($unit_kerja as $unit_kerja) {
				  	?>
				  		<option value="<?php echo $unit_kerja->nama_unit_kerja ?> "><?php echo $unit_kerja->nama_unit_kerja ?></option>
				  	<?php
				  	}
				  	?>
				  </select>
				</div>
				<br/>
				<br/>
				<div class="form-group">
				  <select class="span3" name="status" data-placeholder="Berdasarkan Status">
				  	<?php 
				  	if($this->session->flashdata('status')){
				  		echo "<option value='".$this->session->flashdata('status')."'>".$this->session->flashdata('status')."</option>";
				  	}else{
				  		echo "<option></option>";
				  	}
				  	?>
				  	<option value="Menunggu">Menunggu</option>
				  	<option value="Setujui">Setujui</option>
				  	<option value="Tolak">Tolak</option>
				  </select>
				</div>
				<br>
				<br>
				<div class="form-group">
				  <select class="span3" name="status_print" data-placeholder="Berdasarkan Status Print">
				  	<?php 
				  	if($this->session->flashdata('status_print')){
				  		echo "<option value='".$this->session->flashdata('status_print')."'>".$this->session->flashdata('status_print')."</option>";
				  	}else{
				  		echo "<option></option>";
				  	}
				  	?>
				  	<option value="Sudah">Sudah</option>
				  	<option value="Belum">Belum</option>
				  </select>
				</div>
				<br/>
				<br/>
				<div class="form-group">
				  <input type="submit" name="submit" class="span1 btn btn-info" value="GO!">
				  <input type="submit" name="submit" class="btn btn-success" value="Export ke Excel">
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
		<div class="widget-content padding">
			<table class="table table-bordered data-table">
		      	<thead>
			        <tr>
			          <th>No</th>
			          <th>Nama</th>
			          <th>Unit Kerja</th>
			          <th>Tanggal Pengajuan</th>
			          <th>Tanggal Cuti</th>
			          <th>Lama Hari / Bulan</th>
			          <th>Bulan Tahun</th>
			          <th>Status</th>
			          <th>Status Print</th>
			          <th>Action</th>
			        </tr>
		      	</thead>
		      	<tbody>
		      		<?php 
		      		$no=0;
		      		foreach ($listing_cuti as $listing_cuti) {
		      		$no++;
		      		?>
		      		<tr>
		      			<td><?php echo $no; ?></td>
		      			<td><?php echo $listing_cuti->nama; ?></td>
		      			<td><?php echo $listing_cuti->unit_kerja; ?></td>
		      			<td><?php echo date("d F Y",strtotime($listing_cuti->tanggal_pengajuan)); ?></td>
		      			<td><?php echo date("d F Y",strtotime($listing_cuti->awal))." s/d ".date("d F Y",strtotime($listing_cuti->akhir)); ?></td>
		      			<?php 
				            if($listing_cuti->jenis_cuti=="Cuti Bersalin")
				            {
				              $satuan = "Bulan";
				            }else{
				              $satuan = "Hari";
				            }
				          ?>
		      			<td><?php echo $listing_cuti->lama_angka." ".$satuan ?></td>
		      			<td><?php echo $listing_cuti->tahun ?></td>
		      			<td><a class="btn btn-default"><?php echo $listing_cuti->status ?></a></td>
		      			<td style="text-align: center;"><?php if($listing_cuti->status_print=="Belum"){echo "<i class='btn btn-danger icon-remove status_print_sudah' id_cuti='".$listing_cuti->id_cuti."' status_print='Sudah'></i>";}else{echo "<i class='btn btn-success icon-print status_print_belum' id_cuti='".$listing_cuti->id_cuti."' status_print='Belum'></i>";} ?></td>
		      			<td><a class="btn btn-danger" href="<?php echo base_url('dasbor_superadmin/cuti/print_by_id/'.$listing_cuti->id_cuti.'/'.$listing_cuti->id_data_pegawai) ?>" target="_blank">Print Form 1.b</a> <a class="btn btn-warning" href="<?php echo base_url('dasbor_superadmin/cuti/print_by_id3/'.$listing_cuti->id_cuti.'/'.$listing_cuti->id_data_pegawai) ?>" target="_blank">Print Form 1.c</a> <a class="btn btn-primary" href="<?php echo base_url('dasbor_superadmin/cuti/print_by_id2/'.$listing_cuti->id_cuti.'/'.$listing_cuti->jenis_cuti) ?>" target="_blank">Print Cuti 2</a></td>
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
    //date picker setting
    $("#ambil_bulan").datepicker( {
        format: "mm-yyyy",
        viewMode: "months", 
        minViewMode: "months"
    });

    $('.status_print_sudah').click(function(){
    	var id_cuti = $(this).attr('id_cuti');
    	var status_print = $(this).attr('status_print');
    	$.post('<?php echo base_url('dasbor_superadmin/cuti/update_status_print') ?>',{id_cuti:id_cuti,status_print:status_print},function(data){
    		var list_print = [id_cuti];
    		for(var i in list_print){
    			$("[id_cuti^=" + list_print[i] + "]").fadeOut().fadeIn().removeClass("btn btn-danger icon-remove").addClass("btn btn-success icon-print");
    		}
    	})
    });

    $('.status_print_belum').click(function(){
    	var id_cuti = $(this).attr('id_cuti');
    	var status_print = $(this).attr('status_print');
    	$.post('<?php echo base_url('dasbor_superadmin/cuti/update_status_print') ?>',{id_cuti:id_cuti,status_print:status_print},function(data){
    		var list_print = [id_cuti];
    		for(var i in list_print){
    			$("[id_cuti^=" + list_print[i] + "]").fadeOut().fadeIn().removeClass("btn btn-success icon-print").addClass("btn btn-danger icon-remove");
    		}
    	})
    });
</script>