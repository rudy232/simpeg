<div class="modal fade" id="Delete<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Hapus Data?</h4>
        </div>
        <div class="modal-body">
            
            <p class="alert alert-warning">Yakin ingin menghapus data <strong><?php echo $daftar_kegiatan->nama_aktifitas; ?></strong></p>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            
            <a href="<?php echo base_url('dasbor_superadmin/aktifitas/delete_aktifitasumum/'.$daftar_kegiatan->id) ?>" class="btn btn-danger">
            <i class="fa fa-trash-o"></i> Ya, Hapus data ini</a>
        </div>
    </div>
</div>
</div>