<div class="row">
	<div class="col-lg-6">
		<h4><?php echo $judul;?></h4>
	</div>

	<div class="col-lg-6">
		<?php
		if($this->session->flashdata('pesan') != '') {
		?>
				
		<div class="alert alert-dismissible alert-info">
			<button type="button" class="close" data-dismiss="alert">x</button>
			<?php echo $this->session->flashdata('pesan');?>
		</div>
				
		<?php
		}
		?>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-body">
        <div class="row">
        	<form action="<?php echo base_url('master/simpan_harga');?>" method="post">
                <div class="col-lg-1">
                    <label for="harga">Harga</label>
                </div>

        		<div class="col-lg-3">
        			<input type="text" name="harga" class="form-control input-sm" id="harga" required>
        		</div>

        		<div class="col-lg-2">
        			<button type="submit" class="btn btn-sm btn-info" name="submit" value="add">Tambahkan</button>
        		</div>
        	</form>
        </div>

        <br/>

        <table class='table table-striped table-hover display' id='example'>
            <thead style="text-align:center">
                <tr>
                    <th width="5%">No.</th>
                    <th width="75%">Harga</th>
                    <th>Atur</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                foreach($data as $d) {
                ?>

                <tr>
                    <td><?php echo $no++;?>.</td>
                    <td>Rp <?php echo number_format($d->harga, 0, ',','.');?></td>
                    <td>
                    <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#ubahharga<?php echo $d->id_harga;?>"><span class="glyphicon glyphicon-pencil"></span> Ubah</button>
                    <a href="<?php echo base_url('master/hapus_harga/'.$d->id_harga);?>" class="btn btn-danger btn-xs" onclick="return confirm('Hapus data?')">&times; Hapus</a>
                    </td>
                </tr>

                <?php
                include('harga_ubah.php');
                }
                ?>
            </tbody>
        </table>
	</div>
</div>