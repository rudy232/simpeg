<div class="row-fluid">
  <div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-search"></i></span>
        <h5>Block Tanggal Pengajuan Cuti</h5>
     </div>
     <div class="widget-content padding">
        <form action="<?php echo base_url('dasbor_superadmin/cuti/proses_block_tgl_cuti') ?>" method="POST">
            <ul>
                <li>
                    <div class="form-group">
                      <input type="text" class="span3 datepicker" id="tanggal_merah" name="tanggal_merah" placeholder="Masukan Tanggal Merah">
                    </div>
                </li>
                <li>
                    <div class="form-group">
                      <input type="text" class="span3 datepicker" id="tanggal_cuti_bersama" name="tanggal_cuti_bersama" placeholder="Masukan Tanggal Cuti Bersama">
                    </div>
                </li>
                <div class="add_data"></div>
            </ul>
            <br/>
            <div class="form-group">
              <input type="submit" name="submit" class="span1 btn btn-info" value="SUBMIT!"> 
              <a class="tambah_kolom btn btn-success">TAMBAH KOLOM</a>
            </div> 
        </form>       
    </div>
  </div>
</div>