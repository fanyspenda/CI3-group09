<?php
	if($this->session->userdata('invalidPasswordTrans')){
		echo '<p class="alert alert-danger">'.$this->session->flashdata('invalidPasswordTrans').'</p>';
	}

	echo validation_errors('<div class = "alert alert-danger">', '</div>');
	echo form_open_multipart('user/c_user/buattransaksi', array('class' => 'needs_validation' , 'novalidate' => '' )); ?>
	<br>	
	<center><legend>Tambah Transaksi Baru</legend></center>

		<div class="form-group">
			<label>tanggal Berangkat</label>
			<input type="date" class="form-control" name="tglberangkat" value="<?php echo set_value('tglberangkat');?>" onclick="getdate()">
		</div>

		<div class="form-group">
			<label>Kota Tujuan</label><br>
			<select name="kotatujuan">
				<?php foreach ($daftarKota as $kota) { ?>
					<option value="<?php echo $kota["namaKota"] ?>"><?php echo $kota["namaKota"];?></option>
				<?php } ?>
			</select>
		</div>
		
		<div class="form-group">
			<label>tanggal Kembali</label>
		<input type="date" class="form-control" name="tglkembali" value="<?php echo set_value('tglberangkat');?>" placeholder="Username">
		</div>
		
		<div class="form-group">
			<label>Metode Bayar</label>
			<select name="metodeBayar">
				<option value="langsung">Langsung</option>
				<option value="transfer">Transfer</option>
			</select>
		</div>

		<div class="form-group">
			<label>Konfirmasi Password</label>
			<input type="password" class="form-control" name="confirmPass" placeholder="Konfirmasi Password">
		</div>

		<button type="submit" class="btn btn-primary">Buat Transaksi</button>

<?php echo form_close();?>