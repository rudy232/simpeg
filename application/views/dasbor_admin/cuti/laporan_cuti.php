<div class="row-fluid">
	<div class="widget-box">
		<div class="widget-title"> <span class="icon"><i class="icon-search"></i></span>
		    <h5>Filter Pencharian</h5>
		 </div>
		 <div class="widget-content padding">
		 	<form action="<?php echo base_url('dasbor_admin/cuti/filter_search') ?>" method="POST">
			 	<div class="form-group">
				  <input type="text" class="span3 datepicker" id="ambil_bulan" name="tahun" placeholder="Berdasarkan Bulan dan Tahun" value="<?php echo $this->session->flashdata('tahun') ?>">
				</div>
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
				<br/>
				<br/>
				<div class="form-group">
				  <input type="submit" name="submit" class="span1 btn btn-info" value="GO!">
				  <input type="submit" name="submit" class="btn btn-success" value="Export ke Excel">
				  <input type="submit" name="submit" class="btn btn-danger" value="Print PDF">
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
			          <th>Lama Hari</th>
			          <th>Bulan Tahun</th>
			          <th>Status</th>
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
		      			<td><?php echo $listing_cuti->lama_angka." Hari" ?></td>
		      			<td><?php echo $listing_cuti->tahun ?></td>
		      			<td><a class="btn btn-default"><?php echo $listing_cuti->status ?></a></td>
		      			<td><a class="btn btn-danger" href="<?php echo base_url('dasbor_admin/cuti/print_by_id/'.$listing_cuti->id_cuti) ?>" target="_blank">Print Cuti</a></td>
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
</script>