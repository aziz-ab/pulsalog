<?php include('head.php') ;?>
<?php include('nav.php') ;?>

<div style="margin-top:80px"></div>

<div class="container">
	<div class="col-lg-2">
		<?php $this->load->view('menu-sidebar');?>
	</div>

	<div class="col-lg-10">
		<?php
		//beranda
		if($page == 'beranda'){
			$this->load->view('beranda/index');
		}

		// transaksi
		elseif($page == 'transaksi') {
			$this->load->view('transaksi/index');
		}
		elseif($page == 'transaksi_edit') {
			$this->load->view('transaksi/edit');
		}
		elseif($page == 'transaksi_semua') {
			$this->load->view('transaksi/semua');
		}
		elseif($page == 'transaksi_lunas') {
			$this->load->view('transaksi/lunas');
		}
		elseif($page == 'transaksi_utang') {
			$this->load->view('transaksi/utang');
		}

		// master data
		elseif($page == 'master_harga') {
			$this->load->view('master/harga');
		}
		elseif($page == 'master_nominal') {
			$this->load->view('master/nominal');
		}
		?>
	</div>
</div>

<?php include('footer.php');?>
</body>
</html>