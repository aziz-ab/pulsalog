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
		<form method="post" action="<?php echo base_url('user/submit_password');?>">
			<div class="row">
				<div class="col-md-12 form-group">
					<label for="password_lama" class="col-md-3">masukkan password lama</label>
					<div class="col-md-4 form-group">
						<input id="password_lama" type="password" name="password_lama" class="form-control input-sm" minlength="6" required>
					</div>
					<div class="col-md-2 form-group">
						<input type="checkbox" onchange="document.getElementById('password_lama').type = this.checked ? 'text' : 'password'"> Tampilkan
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12 form-group">
					<label for="password_baru" class="col-md-3">masukkan password baru</label>
					<div class="col-md-4 form-group">
						<input type="password" name="password_baru" class="form-control input-sm" minlength="6" id="password_baru" required>
					</div>
					<div class="col-md-2 form-group">
						<input type="checkbox" onchange="document.getElementById('password_baru').type = this.checked ? 'text' : 'password'"> Tampilkan
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12 form-group">
					<label for="konfirm_password" class="col-md-3">konfirmasi password baru</label>
					<div class="col-md-4 form-group">
						<input type="password" name="konfirm_password" class="form-control input-sm" minlength="6" id="konfirm_password" required>
					</div>
					<div class="col-md-2 form-group">
						<input type="checkbox" onchange="document.getElementById('konfirm_password').type = this.checked ? 'text' : 'password'"> Tampilkan
					</div>
				</div>
			</div>
			
			<input type="hidden" name="id_user" value="<?php echo $id_user;?>">
					
			<div class="row">
				<div class="col-md-12 form-group">
					<button type="submit" name="submit" class="btn btn-sm btn-info" value="simpan">Simpan</button>
					<button type="button" class="btn btn-sm btn-default" onclick="window.history.back();">Batal</button>
				</div>
			</div>
		</form>
	</div>
</div>