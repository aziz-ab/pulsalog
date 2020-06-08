<?php include('head.php');?>

<div class="col-md-4 col-md-offset-4 panel panel-default" style="margin-top:10%">
	<div class="panel-body">	
		<div class="col-md-12" align="center" style="margin-bottom:20px">
			<img src="<?php echo base_url();?>berkas/img/logo.png" width="150" />
		</div>

		<form action="<?php echo base_url();?>login/masuk" method="post" class="form-horizontal">
			<div class="col-md-12 col-sm-12">
				<div class="form-group">
					<label for="username" class="col-md-4 col-sm-4 control-label">Username</label>
				    <div class="col-md-8 col-sm-8">
				        <input type="text" name="username" class="form-control input-sm" id="username" required>
				    </div>
				</div>

				<div class="form-group">
					<label for="password" class="col-md-4 col-sm-4 control-label">Password</label>
				    <div class="col-md-8 col-sm-8">
				        <input type="password" name="password" class="form-control input-sm" id="password" required>
				    </div>
				</div>
				
				<div class="form-group">
					<div class="col-md-4 col-sm-4">
						&nbsp;
					</div>
					
				    <div class="col-md-8 col-sm-8">
				        <button type="submit" value="simpan" class="btn btn-sm btn-info">Login</button>
				    </div>
				</div>
			</div>
			
			<?php
			if($this->session->flashdata('pesan') != '')
			{
			?>
			
			<div class="col-md-12 col-sm-12 alert alert-dismissible alert-danger">
				<button type="button" class="close" data-dismiss="alert">x</button>
				<?php echo $this->session->flashdata('pesan');?>
			</div>
			
			<?php
			}
			?>
		</form>
	</div>
</div>

<?php include('footer.php');?>