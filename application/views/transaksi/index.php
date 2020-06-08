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

        foreach($jumlah_today as $jt) {
            $jumlah = $jt->total;
        }

        foreach($jumlah_today_lunas as $jtl) {
            $jumlah_lunas = $jtl->total;
        }

        foreach($jumlah_today_utang as $jtu) {
            $jumlah_utang = $jtu->total;
        }
		?>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-body">
        	<form action="<?php echo base_url('transaksi/submit_transaksi');?>" method="post">
        		<div class="col-lg-2">
        			<label for="no_hp">No. HP</label>
        			<input type="text" name="no_hp" class="form-control input-sm" id="no_hp" required>
        		</div>

        		<div class="col-lg-2">
        			<label for="id_nominal">Nominal</label>
        			<select name="id_nominal" class="form-control input-sm" id="id_nominal" required>
                        <option value="">- Pilih -</option>
                        <?php
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
                        <option value="">- Pilih -</option>
                        <?php
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
        			<input type="text" name="tanggal" class="form-control input-sm datepicker2" value="<?php echo date('Y-m-d');?>" id="tanggal" required>
        		</div>

        		<div class="col-lg-2">
        			<label for="status">Status</label>
        			<select name="status" id="status" class="form-control input-sm" required>
        				<option value="">- Pilih -</option>
        				<option value="LUNAS">Lunas</option>
        				<option value="UTANG">Utang</option>
        			</select>
        		</div>

                <input type="hidden" name="page" value="index">

        		<div class="col-lg-2">
        			<button type="submit" class="btn btn-sm btn-info" style="margin-top:24px" name="submit" value="add">Simpan</button>
        		</div>
        	</form>
	</div>
</div>

<div class="row">
    <div class="col-lg-6 pull-left">
        <h4>Transaksi Hari Ini</h4>
    </div>

    <div class="col-lg-6 pull-right" style="text-align:right">
        <h4>
            <label class="label label-primary">LUNAS: Rp <?php echo number_format($jumlah_lunas, 0, ',', '.');?></label>
            <label class="label label-primary">UTANG: Rp <?php echo number_format($jumlah_utang, 0, ',', '.');?></label>
            <label class="label label-primary">TOTAL: Rp <?php echo number_format($jumlah, 0, ',', '.');?></label>
        </h4>
    </div>

    <div style="clear:both"></div>
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <table class='table table-striped table-hover display' id='mytable'>
            <thead style="text-align:center">
                <tr>
                    <th width="5%">No.</th>
                    <th>No. HP</th>
                    <th>Nominal</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Atur</th>
                </tr>
            </thead>
        </table>

                <script type="text/javascript">
                    $(document).ready(function () {

                        $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
                        {
                            return {
                                "iStart": oSettings._iDisplayStart,
                                "iEnd": oSettings.fnDisplayEnd(),
                                "iLength": oSettings._iDisplayLength,
                                "iTotal": oSettings.fnRecordsTotal(),
                                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                            };
                        };

                        var t = $('#mytable').DataTable({
                            "processing": true,
                            "serverSide": true,
                            "ajax": "<?php echo site_url('transaksi/data_today'); ?>",
                            "columns": [
                                {
                                    "data": null,
                                    "class": "text-center",
                                    "orderable": false
                                },
                                {"data": "no_hp"},
                                {"data": "nominal"},
                                {"data": "harga"},
                                {"data": "waktu_transaksi"},
                                {
                                    "data": "status",
                                    "class": "text-center"
                                },
                                {"data": "aksi"}
                            ],
                            "order": [[1, 'asc']],
                            "rowCallback": function (row, data, iDisplayIndex) {
                                var info = this.fnPagingInfo();
                                var page = info.iPage;
                                var length = info.iLength;
                                var index = page * length + (iDisplayIndex + 1);
                                $('td:eq(0)', row).html(index);
                            }
                        });
                    });
                </script>
    </div>
</div>