<!DOCTYPE html>
<html lang="en">
    <head>
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>berkas/img/favicon.ico">
        <link href="<?php echo base_url();?>berkas/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url();?>berkas/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url();?>berkas/css/datepicker.css" rel="stylesheet">
        <link href="<?php echo base_url();?>berkas/css/dataTables.bootstrap.css" rel="stylesheet">
        <script src="<?php echo base_url();?>berkas/js/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>berkas/js/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>berkas/js/dataTables.bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>berkas/js/bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>berkas/js/datepicker.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>berkas/js/highcharts.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>berkas/js/exporting.js" type="text/javascript"></script>
		
		<!-- DATATABLES -->
        <script>
        $(document).ready(function() {
            $('#example').dataTable( {
                "order": [[ 0, "asc" ]]
            });

            $('#example2').dataTable( {
                "order": [[ 0, "asc" ]]
            });

            $('#example3').dataTable( {
                "order": [[ 0, "asc" ]]
            });
        });
        </script>

        <!-- DATEPICKER -->
        <script>
        $(document).ready(function(){
            $('.datepicker2').datepicker({
                format: 'yyyy-mm-dd'
            });
        });
        </script>

        <!-- TOGGLE MENU -->
        <script type="text/javascript">
        $(document).ready(function(){
            $("#transaksi").click(function(){
                $("#panel-transaksi").slideToggle("fast");
            });
        });
        </script>

        <script type="text/javascript">
        $(document).ready(function(){
            $("#master").click(function(){
                $("#panel-master").slideToggle("fast");
            });
        });
        </script>  

        <script type="text/javascript">
        $(document).ready(function(){
            $("#laporan").click(function(){
                $("#panel-laporan").slideToggle("fast");
            });
        });
        </script>
        
		<title><?php echo $title ;?></title>
    </head>
    <body class="body" style="background-image:url(<?php echo base_url();?>berkas/img/bg.jpg);">