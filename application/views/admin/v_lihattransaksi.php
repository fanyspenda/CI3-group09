<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<!-- OVERVIEW -->
			<div class="panel panel-headline">
				<h1 class="text-center">Data Admin</h1>
				<table class="table table-striped table-bordered data">
					<thead>
						<tr>			
							<th>Id Transaksi</th>
							<th>Id User</th>
							<th>Id Driver</th>
							<th>Tanggal Berangkat</th>
							<th>Kota Tujuan</th>
							<th>Jumlah Hari</th>
							<th>Tanggal Kembali</th>
							<th>Status</th>
							<th>Harga Total</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($datatransaksi as $key) {?>
						<tr>				
							<td><?php echo $key['id_transaksi']; ?></td>
							<td><?php echo $key['id_user']; ?></td>
							<td><?php echo $key['id_driver']; ?></td>
							<td><?php echo $key['tanggal_berangkat']; ?></td>
							<td><?php echo $key['kota_tujuan']; ?></td>
							<td><?php echo $key['jumlah_hari']; ?></td>
							<td><?php echo $key['tanggal_kembali']; ?></td>
							<td><?php echo $key['status']; ?></td>
							<td><?php echo $key['harga_total']; ?></td>
							<td>
								<a href="<?php echo base_url() ?>admin/C_AdminHome/deleteTransaksi/<?php echo $key['id_transaksi'] ?>" class="btn btn-danger">Hapus</a>
								<a href="<?php echo base_url() ?>admin/C_AdminHome/editTransaksi/<?php echo $key['id_transaksi'] ?>" class="btn btn-primary">Selesai</a></td>
							</form>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('.data').DataTable();
	});
</script>
</html>