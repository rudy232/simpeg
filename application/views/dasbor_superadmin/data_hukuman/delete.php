<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_hukuman<?php echo $i ?>">
<i class="icon-trash"></i>
</button>
<div class="modal fade" id="delete_hukuman<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Hapus Data?</h4>
        </div>
        <div class="modal-body">
            <p class="alert alert-warning">Yakin ingin menghapus data Hukuman <strong><?php echo $data_hukuman->nama ?></strong></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="<?php echo base_url('dasbor_superadmin/data_pegawai/delete_hukuman/'.$data_hukuman->id_hukuman.'/'.$data_hukuman->id_data_pegawai)?>" class="btn btn-danger">
            <i class="icon-trash"></i> Ya, Hapus data ini</a>
        </div>
    </div>
</div>
</div>