<?php
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
                            "ajax": "<?php echo site_url('beranda/data'); ?>",
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
                                }
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