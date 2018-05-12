<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Data Driver</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- jQuery -->
	<script src="//code.jquery.com/jquery.js"></script>
	<!-- Bootstrap JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>
<body>
	<?php $this->load->view('admin/v_navbar');?>
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