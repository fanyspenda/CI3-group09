<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<!-- OVERVIEW -->
			<div class="panel panel-headline container">
					<legend><i><b><h1>UBAH DRIVER TRANSAKSI</h1></b></i></legend>
					<div style="margin-left: 50px; margin-right: 50px;">
						<?php foreach ($transaksi as $key) { ?>
							Transaksi dengan id <?php echo $key["id_user"]?>, berangkat pada tanggal <?php echo date('d-M-Y', strtotime($key['tanggal_berangkat']))?> dan Kembali pada Tanggal <?php echo date('d-M-Y', strtotime($key['tanggal_kembali'])); ?><br><br>
						<?php } ?>

						<?php foreach ($user as $key) { ?>
							Transaksi Dilakukan atas nama <?php echo $key["nama"]?>, dengan user id <?php echo $key['id']?>.<br><br>
						<?php } ?>

						<?php foreach ($selectedDriver as $key) { ?>
							Transaksi Dilakukan oleh Driver atas nama <?php echo $key["nama"]?>, dengan Driver id <?php echo $key['id']?>.<br><br>
						<?php } ?>

						<?php echo form_open('admin/C_AdminHome/ubahDriverKeTransaksi');?>
						<legend><i><b><h2>Silahkan Pilih Driver: </h2></b></i></legend>
						
						<?php foreach ($transaksi as $key) { ?>
						<input type="hidden" name="idTransaksi" value="<?php echo $key['id_transaksi']?>">
						<?php } ?>

						<?php foreach ($selectedDriver as $key) { ?>
						<input type="hidden" name="selectedDriverId" value="<?php echo $key['id']?>">
						<?php } ?>

						<label>Pilih Driver</label>
						<select name="newDriverId">
							<?php foreach ($driver as $key) { ?>
							<option value="<?php echo $key['id']?>">id: <?php echo $key['id']?> - <?php echo $key['nama'];?></option>
							<?php } ?>
						</select><br><br>

						<button type="submit" class="btn btn-primary">Ubah Driver</button><br><br>
						<?php form_close();?>
				</div>
			</div>
		</div>
	</div>