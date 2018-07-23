<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<!-- OVERVIEW -->
			<div class="panel panel-headline container">
				<?php echo form_open_multipart('admin/C_AdminUser/addUserData');?>
				<center><legend><i><b><h1>FORM TAMBAH DATA USER</h1></b></i></legend></center>
				<div style="margin-left: 50px; margin-right: 50px;">
					<!-- <label>ID</label>
					<input type="text" class="form-control" name="id" placeholder="ID User" required><br><br> -->

					<label>Username</label>
					<input type="text" class="form-control" name="username" placeholder="Username" required><br><br>

					<label>Password</label>
					<input type="Password" class="form-control" name="password" placeholder="Password" required><br><br>

					<label>level</label>
					<select name="level">
						<?php foreach ($level as $key) { ?>
						<option value="<?php echo $key['level']?>"><?php echo $key['nama_level'];?></option>
						<?php } ?>
					</select><br><br>

					<label>NIK</label>
					<input type="text" class="form-control" name="nik" placeholder="NIK User" required><br><br>

					<label>Nama</label>
					<input type="text" class="form-control" name="nama" placeholder="nama lengkap" required><br><br>

					<label>Tanggal Lahir</label>
					<input type="date" class="form-control" name="tgl_lahir" required><br><br>

					<label>Jenis Kelamin:</label>
					<input type="radio"  name="jenKel" value="pria" required>Pria
					<input type="radio"  name="jenKel" value="wanita" >Wanita
					<br>
					<br>

					<label>Alamat</label>
					<textarea class="form-control" name="alamat" placeholder="Alamat lengkap" required></textarea><br><br>

					<label>Nomor HP</label>
					<input type="text" class="form-control" name="nomorhp" placeholder="Nomor HP yang bisa dihubungi" required><br><br>

					<label>Foto User</label>
					<input type="file" name="foto" size="20" required><br><br>

					<button type="submit" class="btn btn-primary">Simpan Data</button>
					<br><br>
					<?php echo form_close(); ?>
				</div>
				<div style="margin-left: 50px; margin-right: 50px;">
					<button class="btn btn-danger" onclick="location.href = '<?php echo base_url('admin/c_adminuser/touserdata');?>'">Kembali</button>
				</div>
			</body>
			</html>