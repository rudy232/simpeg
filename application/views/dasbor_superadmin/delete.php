<div class="modal fade" id="Delete<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Hapus Data?</h4>
        </div>
        <div class="modal-body">
            
            <p class="alert alert-warning">Yakin ingin menghapus data <strong><?php echo $data_pegawai->nama; ?></strong></p>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <?php $replace_titik=str_replace('.',' ',$data_pegawai->nama);$replace_koma=str_replace(',',' ',$replace_titik); ?>
            <a href="<?php echo base_url('dasbor_superadmin/data_pegawai/delete/'.$data_pegawai->id_data_pegawai.'/'.$this->session->flashdata('jabatan').'/'.$replace_koma)?>" class="btn btn-danger">
            <i class="fa fa-trash-o"></i> Ya, Hapus data ini</a>
        </div>
    </div>
</div>
</div>