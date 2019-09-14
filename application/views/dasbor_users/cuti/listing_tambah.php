<?php 
  if($this->session->flashdata('notifval')){
    echo '<div class="alert alert-success alert-block">';
    echo $this->session->flashdata('notifval');
    echo '</div>';
    date_default_timezone_set("Asia/Jakarta");
  }
  echo form_open(base_url('dasbor_admin/cuti/tambah'));
?>
<div class="row-fluid">
<div class="widget-box">
<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#tab1">Data Edit Cuti</a></li>
  </ul>
</div>
<div class="widget-content tab-content">
  <div id="tab1" class="tab-pane active">
    <table class="table table-bordered">
      <tr>
        <td><label>Tanggal Pengajuan</label></td>
        <td>:</td>
        <td><input type="text" name="tanggal_pengajuan" id="tanggal_pengajuan" class="span5 tanggal_pengajuan" placeholder="Masukan Tanggal Pengajuan" required readonly="readonly" value="<?php echo date('Y-m-d') ?>" /></td>
      </tr>
      <tr>
        <td><label>Bulan Surat</label></td>
        <td>:</td>
        <td><input type="text" name="bulan_surat" id="bulan_surat" class="span5 bulan_surat" placeholder="Masukan Tanggal Pengajuan" /></td>
      </tr>
      <tr>
        <td><label>Gender</label></td>
        <td>:</td>
        <td>
        <select name="gender" id="gender" class="span5 gender" data-placeholder="Jenis Kelamin">
          <option value=""></option>
          <option value="l">Laki-Laki</option>
          <option value="p">Perempuan</option>
        </select>
        </td>
      </tr>
      <tr>
        <td><label>Panggilan</label></td>
        <td>:</td>
        <td>
        <select name="panggilan" id="panggilan" class="span5 panggilan">
          <option value="Sdra">Saudara</option>
          <option value="Sdri">Saudari</option>
        </select>
        </td>
      </tr>
      <tr>
        <td><label>Nama</label></td>
        <td>:</td>
        <td><input type="text" name="nama" id="nama" class="span5 nama" placeholder="Masukan Nama" /></td>
      </tr>
      <tr>
        <td><label>NIP</label></td>
        <td>:</td>
        <td><input type="text" name="nip" id="nip" class="span5 nip" placeholder="Masukan Nomor NIP" /></td>
      </tr>
      <tr>
        <td><label>NRK</label></td>
        <td>:</td>
        <td><input type="text" name="nrk" id="nrk" class="span5 nrk" placeholder="Masukan Nomor NRK" /></td>
      </tr>
      <tr>
        <td><label>Pangkat</label></td>
        <td>:</td>
        <td><input type="text" name="pangkat" id="pangkat" class="span5 pangkat" placeholder="Masukan Pangkat" /></td>
      </tr>
      <tr>
        <td><label>Jabatan</label></td>
        <td>:</td>
        <td><input type="text" name="jabatan" id="jabatan" class="span5 jabatan" placeholder="Masukan Jabatan" /></td>
      </tr>
      <tr>
        <td><label>Lama Angka</label></td>
        <td>:</td>
        <td><input type="text" name="lama_angka" id="lama_angka" class="span5 lama_angka" placeholder="Masukan Lama Angka" /></td>
      </tr>
      <tr>
        <td><label>Lama Huruf</label></td>
        <td>:</td>
        <td><input type="text" name="lama_huruf" id="lama_huruf" class="span5 lama_huruf" placeholder="Masukan Lama Huruf"/></td>
      </tr>
      <tr>
        <td><label>Awal Cuti</label></td>
        <td>:</td>
        <td><input type="text" name="awal" id="awal" class="span5 awal" placeholder="Masukan Tanggal Awal Cuti" /></td>
      </tr>
      <tr>
        <td><label>Akhir Cuti</label></td>
        <td>:</td>
        <td><input type="text" name="akhir" id="akhir" class="span5 akhir" placeholder="Masukan Tanggal Akhir Cuti" /></td>
      </tr>
      <tr>
        <td><label>Lokasi</label></td>
        <td>:</td>
        <td><input type="text" name="lokasi" id="lokasi" class="span5 lokasi" placeholder="Masukan Lokasi" /></td>
      </tr>
      <tr>
        <td><label>Nomor Hp</label></td>
        <td>:</td>
        <td><input type="text" name="nomor" id="nomor" class="span5 nomor" placeholder="Masukan Nomor Handphone" /></td>
      </tr>
      <tr>
        <td><label>Pejabat Pengganti</label></td>
        <td>:</td>
        <td><input type="text" name="pengganti" id="pengganti" class="span5 pengganti" placeholder="Masukan Pejabat Pengganti" /></td>
      </tr>
      <tr>
        <td><label>NIP Pengganti</label></td>
        <td>:</td>
        <td><input type="text" name="nip_pengganti" id="nip_pengganti" class="span5 nip_pengganti" placeholder="Masukan Nomor NIP Pengganti"/></td>
      </tr>
      <tr>
        <td><label>Pangkat Pengganti</label></td>
        <td>:</td>
        <td><input type="text" name="pangkat_pengganti" id="pangkat_pengganti" class="span5 pangkat_pengganti" placeholder="Masukan Pangkat Pengganti"/></td>
      </tr>
      <tr>
        <td><label>Atasan Langsung</label></td>
        <td>:</td>
        <td><input type="text" name="atasan_langsung" id="atasan_langsung" class="span5 atasan_langsung" placeholder="Masukan Nama Atasan Langsung"/></td>
      </tr>
      <tr>
        <td><label>NIP Atasan</label></td>
        <td>:</td>
        <td><input type="text" name="nip_atasan" id="nip_atasan" class="span5 nip_atasan" placeholder="Masukan NIP Atasan"/></td>
      </tr>
      <tr>
        <td><label>Sisa Cuti</label></td>
        <td>:</td>
        <td><input type="text" name="sisa_cuti" id="sisa_cuti" class="span5 sisa_cuti" placeholder="Masukan Sisa Cuti"/></td>
      </tr>
      <tr>
        <td><label>Total Cuti</label></td>
        <td>:</td>
        <td><input type="text" name="total_cuti" id="total_cuti" class="span5 total_cuti" placeholder="Masukan Total Cuti"/></td>
      </tr>
    </table>
    <input type="submit" name="form_submit" class="btn btn-success" value="TAMBAH" style="float: right;">
  </div>
</div>
</div>
</div>
<?php echo form_close(); ?>
