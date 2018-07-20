<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<!-- OVERVIEW -->
			<div class="panel panel-headline">
				<center><legend><i><b><h1>DETAIL DATA DRIVER</h1></b></i></legend></center>
				<div style="margin-left: 50px; margin-right: 50px;">
					<?php foreach ($driverData as $key) { ?>
					<table class="table table-striped table-bordered">
						<tbody>
							<tr>			
								<th>ID</th>
								<td><?php echo $key['id']?></td>
							</tr>
							<tr>
								<th>Nama</th>
								<td><?php echo $key['nama']?></td>
							</tr>
							<tr>
								<th>NIK</th>
								<td><?php echo $key['NIK']?></td>
							</tr>
							<tr>
								<th>Jenis Kelamin</th>
								<td><?php echo $key['jenis_kelamin']?></td>
							</tr>
							<tr>
								<th>tgl Lahir</th>
								<td><?php echo date('d-M-Y', strtotime($key['tgl_lahir']))?></td>
							</tr>
							<tr>
								<th>Alamat</th>
								<td><?php echo $key['alamat']?></td>
							</tr>
							<tr>
								<th>Nomor HP</th>
								<td><?php echo $key['nomorhp']?></td>
							</tr>
							<tr>
								<th>tgl Kerja</th>
								<td><?php echo date('d-M-Y', strtotime($key['tgl_kerja']))?></td>
							</tr>
							<tr>
								<th>Gaji</th>
								<td><?php echo $key['gaji']?></td>
							</tr>
							<tr>
								<th>Foto</th>
								<?php $dirImageDriver = '/foto/driver/';
								$imgName = $key["foto"];
								$imgLoader = $dirImageDriver . $imgName;
								?>
								<td><img src="<?php echo base_url($imgLoader);?>" style='width:185px; height: 200px'></td>
							</tr>
						</tbody>
					</table>
					<button class="btn btn-primary" onclick="location.href = '<?php echo base_url('admin/C_AdminHome/toDriverData');?>'">Kembali</button>
					<br><br>
					<?php } ?>
				</div>

