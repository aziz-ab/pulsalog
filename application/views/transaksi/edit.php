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

        foreach($data as $d) {
            $id_transaksi = $d->id_transaksi;
            $no_hp = $d->no_hp;
            $id_nominal = $d->id_nominal;
            $nominal = $d->nominal;
            $id_harga = $d->id_harga;
            $harga = $d->harga;
            $tgl = substr($d->waktu_transaksi, 0, 10);
            $waktu = substr($d->waktu_transaksi, 11, 8);
            $status = $d->status;
        }
		?>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-body">
        	<form action="<?php echo base_url('transaksi/submit_transaksi');?>" method="post">
        		<div class="col-lg-2">
        			<label for="no_hp">No. HP</label>
        			<input type="text" name="no_hp" class="form-control input-sm" id="no_hp" value="<?php echo $no_hp;?>" required>
        		</div>

        		<div class="col-lg-2">
        			<label for="id_nominal">Nominal</label>
        			<select name="id_nominal" class="form-control input-sm" id="id_nominal" required>
                        <option value="<?php echo $id_nominal;?>"><?php echo $nominal;?></option>
                        <?php
                        $nominal = $this->db->query('select * from m_nominal where id_nominal <> "'.$id_nominal.'"')->result();
                        foreach($nominal as $n) {
                        ?>
                        <option value="<?php echo $n->id_nominal;?>"><?php echo $n->nominal;?></option>
                        <?php
                        }
                        ?>
                    </select>
        		</div>

        		<div class="col-lg-2">
        			<label for="id_harga">Harga</label>
                    <select name="id_harga" class="form-control input-sm" id="id_harga" required>
                        <option value="<?php echo $id_harga;?>"><?php echo $harga;?></option>
                        <?php
                        $harga = $this->db->query('select * from m_harga where id_harga <> "'.$id_harga.'"')->result();
                        foreach($harga as $h) {
                        ?>
                        <option value="<?php echo $h->id_harga;?>"><?php echo $h->harga;?></option>
                        <?php
                        }
                        ?>
                    </select>
        		</div>

        		<div class="col-lg-2">
        			<label for="tanggal">Tanggal</label>
        			<input type="text" name="tanggal" class="form-control input-sm datepicker2" value="<?php echo $tgl;?>" id="tanggal" required>
        		</div>

        		<div class="col-lg-2">
        			<label for="status">Status</label>
        			<select name="status" id="status" class="form-control input-sm" required>
        				<?php
                        if($status == 'LUNAS') {
                            echo '
                            <option value="LUNAS">Lunas</option>
                            <option value="UTANG">Utang</option>
                            ';
                        } else {
                            echo '
                            <option value="UTANG">Utang</option>
                            <option value="LUNAS">Lunas</option>
                            ';
                        }
        				?>
        			</select>
        		</div>

                <?php
                if($status == 'LUNAS') {
                    $pages = 'lunas';
                } elseif($status == 'UTANG') {
                    $pages = 'utang';
                }
                ?>

                <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi;?>">
                <input type="hidden" name="waktu" value="<?php echo $waktu;?>">
                <input type="hidden" name="page" value="<?php echo $pages;?>">

        		<div class="col-lg-2">
        			<button type="submit" class="btn btn-sm btn-info" style="margin-top:24px" name="submit" value="update">Simpan</button>
                    <button type="button" onclick="window.history.back()" style="margin-top:24px"  class="btn btn-sm btn-default">Batal</button>
        		</div>
        	</form>
	</div>
</div>
