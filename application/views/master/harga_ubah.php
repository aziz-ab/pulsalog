<!-- Modal -->
<div id="ubahharga<?php echo $d->id_harga;?>" class="modal fade" role="dialog" style="z-index:9999">
  <div class="modal-dialog" style="z-index:99999">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Harga</h4>
      </div>

      <form method="post" action="<?php echo base_url('master/simpan_harga');?>">
        <input type="hidden" name="id_harga" value="<?php echo $d->id_harga;?>" />
      <div class="modal-body">
        <div class="row form-group">
          <label for="harga" class="col-xs-3">Harga</label>
          <div class="col-xs-9">
            <input type="text" class="form-control input-sm" name="harga" id="harga" value="<?php echo $d->harga;?>" required />
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">&times; Tutup</button>
        <button type="submit" class="btn btn-warning btn-xs" name="submit" value="update"><span class="glyphicon glyphicon-ok"></span> Simpan</button>
      </div>
      </form>
    </div>

  </div>
</div>