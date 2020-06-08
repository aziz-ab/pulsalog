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
        	<form action="<?php echo base_url('master/simpan_nominal');?>" method="post">
                <div class="col-lg-1">
                    <label for="nominal">Nominal</label>
                </div>

        		<div class="col-lg-3">
        			<input type="text" name="nominal" class="form-control input-sm" id="nominal" required>
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
                    <th width="75%">Nominal</th>
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
                    <td><?php echo $d->nominal;?></td>
                    <td>
                    <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#ubahnominal<?php echo $d->id_nominal;?>"><span class="glyphicon glyphicon-pencil"></span> Ubah</button>
                    <a href="<?php echo base_url('master/hapus_nominal/'.$d->id_nominal);?>" class="btn btn-danger btn-xs" onclick="return confirm('Hapus data?')">&times; Hapus</a>
                    </td>
                </tr>

                <?php
                include('nominal_ubah.php');
                }
                ?>
            </tbody>
        </table>
	</div>
</div>