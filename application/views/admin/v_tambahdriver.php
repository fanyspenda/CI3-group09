<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<!-- OVERVIEW -->
			<div class="panel panel-headline container">
				<?php echo form_open_multipart('admin/C_AdminHome/addDriverData');?>
				<center><legend><i><b><h1>FORM TAMBAH DATA DRIVER</h1></b></i></legend></center>
				<div style="margin-left: 50px; margin-right: 50px;">
					<label>ID</label>
					<input type="text" class="form-control" name="id" placeholder="ID Driver" required><br><br>

					<label>NIK</label>
					<input type="text" class="form-control" name="nik" placeholder="NIK Driver" required><br><br>

					<label>Nama</label>
					<input type="text" class="form-control" name="nama" placeholder="nama lengkap" required><br><br>

					<label>Tanggal Lahir</label>
					<input type="date" class="form-control" name="tgl_lahir" required><br><br>

					<label>Alamat</label>
					<textarea class="form-control" name="alamat" placeholder="Alamat lengkap" required></textarea><br><br>

					<label>Jenis Kelamin:</label>
					<input type="radio"  name="jenKel" value="pria" required>Pria
					<input type="radio"  name="jenKel" value="wanita" >Wanita
					<br>
					<br>

					<label>Nomor HP</label>
					<input type="text" class="form-control" name="nomorhp" placeholder="Nomor HP yang bisa dihubungi" required><br><br>

					<label>Tanggal Kerja</label>
					<input type="date" class="form-control" name="tgl_kerja" required><br><br>

					<label>Gaji</label>
					<input type="text" class="form-control" name="gaji" required><br><br>

					<label>Foto Driver</label>
					<input type="file" name="foto" size="20" required><br><br>

					<button type="submit" class="btn btn-primary">Simpan Data</button>
					<br><br>
					<?php echo form_close(); ?>
				</div>
			</body>
			</html>