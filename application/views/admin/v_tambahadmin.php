<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<!-- OVERVIEW -->
			<div class="panel panel-headline container">
				<?php echo form_open('admin/C_AdminHome/addAdmin');?>
				<center><legend><i><b><h1>FORM TAMBAH DATA ADMIN</h1></b></i></legend></center>
				<div class="form-group">
					<label for="username">username</label>
					<input type="text" class="form-control" name="username" value="<?php echo set_value('username') ?>" >
					<?php echo form_error('username'); ?>
				</div>
				<div class="form-group">
					<label for="password">password</label>
					<input type="password" class="form-control" name="password" value="<?php echo set_value('password') ?>" >

				</div>
				<div class="form-group">
					<label for="text">nama</label>
					<input type="text" class="form-control" name="nama" value="<?php echo set_value('nama') ?>" >

				</div>
				<div class="form-group">
					<label for="text">alamat</label>
					<input type="text" class="form-control" name="alamat" value="<?php echo set_value('alamat') ?>" >

				</div>
				<div class="form-group">
					<label for="text">NIK</label>
					<input type="text" class="form-control" name="NIK" value="<?php echo set_value('NIK') ?>" >

				</div>
				<div class="form-group">
					<label for="text">nomorhp</label>
					<input type="text" class="form-control" name="nomorhp" value="<?php echo set_value('nomorhp') ?>" >

				</div>
				<button id="submitBtn" type="submit" class="btn btn-primary">Simpan</button>
				<br><br>
				<?php echo form_close(); ?>
			</div>
		</body>
		</html>