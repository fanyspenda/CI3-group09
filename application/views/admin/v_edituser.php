<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Edit Data USER</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	</head>
	<body>
		<?php $this->load->view('admin/v_navbar');?>
		<?php echo form_open_multipart('admin/C_AdminUser/editUserData');?>
			<center><legend><i><b><h1>FORM EDIT DATA USER</h1></b></i></legend></center>
			<?php foreach ($userData as $key) { ?>

			<div style="margin-left: 50px; margin-right: 50px;">
				<label>ID</label>
				<input type="text" class="form-control" name="id" placeholder="ID User" value="<?php echo $key['id']?>" readonly><br><br>

				<label>Username</label>
				<input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $key['username']?>" required><br><br>

				<label>Password</label>
				<input type="Password" class="form-control" name="password" placeholder="Password" value="<?php echo $key['password']?>" required><br><br>

				<label>NIK</label>
				<input type="text" class="form-control" name="nik" placeholder="NIK User" value="<?php echo $key['NIK']?>" required><br><br>

				<label>Nama</label>
				<input type="text" class="form-control" name="nama" placeholder="nama lengkap" value="<?php echo $key['nama']?>" required><br><br>

				<label>Tanggal Lahir</label>
				<input type="date" class="form-control" name="tgl_lahir" value="<?php echo date('Y-m-d', strtotime($key['tgl_lahir']))?>" required><br><br>
				
				<label>Jenis Kelamin:</label>
				<?php if($key['jenis_kelamin']=='pria')  { ?>
					<input type="radio"  name="jenKel" value="pria" required checked>Pria
					<input type="radio"  name="jenKel" value="wanita" >Wanita
					<?php } else{ ?>
					<input type="radio"  name="jenKel" value="pria" required>Pria
					<input type="radio"  name="jenKel" value="wanita" checked>Wanita
					<?php } ?>

				<br>
				<br>

				<label>Alamat</label>
				<textarea class="form-control" name="alamat" placeholder="Alamat lengkap" required><?php echo $key['alamat']?></textarea><br><br>

				<label>Nomor HP</label>
				<input type="text" class="form-control" name="nomorhp" placeholder="Nomor HP yang bisa dihubungi" value="<?php echo $key['nomorhp']?>" required><br><br>

				<label>Ganti Gambar? </label>
					<input type="radio"  name="gantiGambar" value="ya" required id="gambarYa" onclick="onClickGambar()" checked>Ya
					<input type="radio"  name="gantiGambar" value="tidak" id="gambarTidak" onclick="onClickGambar()">Tidak<br><br>

				<div id="gambarJav">
					<label>Foto User</label>
					<input type="hidden" name="fotoLama" value="<?php echo $key['foto']?>">
					<input type="file" name="foto" size="20"><br><br>
				</div>

				<button type="submit" class="btn btn-primary">Simpan Data</button>
				<br><br>

				<?php } ?>
			<?php echo form_close(); ?>
		</div>
		<div style="margin-left: 50px; margin-right: 50px;">
			<button class="btn btn-danger" onclick="location.href = '<?php echo base_url('admin/c_adminuser/touserdata');?>'">Kembali</button>
		</div>

		<script>
			function onClickGambar() {
			var radioYa = document.getElementById("gambarYa");
			var radioTidak = document.getElementById("gambarTidak");
				if(radioYa.checked){
					document.getElementById("gambarJav").style.display = "block";
				}
				else{
					document.getElementById("gambarJav").style.display = 'none';
				}
			}
		</script>
	</body>
</html>