<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<!-- OVERVIEW -->
			<div class="panel panel-headline container">
				<?php echo form_open_multipart('admin/C_AdminHome/editDriverData');?>
				<center><legend><i><b><h1>FORM EDIT DATA DRIVER</h1></b></i></legend></center>
				<div style="margin-left: 50px; margin-right: 50px;">
					<?php foreach ($driverData as $key) { ?>
					<label>ID</label>
					<input type="text" class="form-control" name="id" placeholder="ID Driver" value="<?php echo $key['id']?>" required readonly><br><br>

					<label>NIK</label>
					<input type="text" class="form-control" name="nik" placeholder="NIK Driver" value="<?php echo $key['NIK']?>" required readonly><br><br>

					<label>Nama</label>
					<input type="text" class="form-control" name="nama" placeholder="nama lengkap" value="<?php echo $key['nama']?>" required><br><br>

					<label>Tanggal Lahir</label>
					<input type="date" class="form-control" name="tgl_lahir" required value="<?php echo date('Y-m-d', strtotime($key['tgl_lahir']))?>"><br><br>

					<label>Alamat</label>
					<textarea class="form-control" name="alamat" placeholder="Alamat lengkap" required><?php echo $key['alamat'];?></textarea><br><br>
					<label>Jenis Kelamin:</label>

					<?php if ($key['jenis_kelamin'] == 'pria') { ?>
					<input type="radio"  name="jenKel" value="pria" required checked>Pria
					<input type="radio"  name="jenKel" value="wanita" >Wanita
					<?php } else{ ?>
					<input type="radio"  name="jenKel" value="pria" required>Pria
					<input type="radio"  name="jenKel" value="wanita" checked>Wanita
					<?php } ?>
					<br>
					<br>

					<label>Nomor HP</label>
					<input type="text" class="form-control" name="nomorhp" placeholder="Nomor HP yang bisa dihubungi" value="<?php echo $key['nomorhp']?>" required><br><br>

					<label>Tanggal Kerja</label>
					<input type="date" class="form-control" name="tgl_kerja" value="<?php echo date('Y-m-d', strtotime($key['tgl_kerja']))?>" required><br><br>

					<label>Gaji</label>
					<input type="text" class="form-control" name="gaji" value="<?php echo $key['gaji']?>" required><br><br>

					<label>Ganti Gambar? </label>
					<input type="radio"  name="gantiGambar" value="ya" required id="gambarYa" onclick="onClickGambar()" checked>Ya
					<input type="radio"  name="gantiGambar" value="tidak" id="gambarTidak" onclick="onClickGambar()">Tidak<br><br>

					<div id="gambarJav">
						<label>Foto Driver</label>
						<input type="hidden" name="fotoLama" value="<?php echo $key['foto']?>">
						<input type="file" name="foto" size="20"><br><br>
					</div>

					<button type="submit" class="btn btn-primary">Simpan Data</button>
					<br><br>
					<?php } ?>
					<?php echo form_close(); ?>
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
		<!-- jQuery -->