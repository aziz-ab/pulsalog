<?php include('head.php') ;?>
<?php include('nav.php') ;?>

<div style="margin-top:80px"></div>

<div class="container">
	<div class="col-lg-2">
		<?php $this->load->view('menu-sidebar');?>
	</div>

	<div class="col-lg-10">
	<?php
	if($page == 'ubah_password')
	{
		include('user/form_ubah_password.php');
	}
	?>
	</div>
</div>

<?php include('footer.php');?>

</body>
</html>