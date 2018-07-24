
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<!-- OVERVIEW -->
			<div class="panel panel-headline">
				<h1 class="text-center">Data Transaksi</h1>
				<table class="table table-striped table-bordered" id="transaksi">
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
								<?php if ($key['status']!='Selesai') { ?>
									<a href="<?php echo base_url() ?>admin/C_AdminHome/editTransaksi/<?php echo $key['id_transaksi'] ?>" class="btn btn-primary">Selesai</a>
									<?php if ($key['id_driver']!=NULL) {?>
									<a href="<?php echo base_url() ?>admin/C_AdminHome/keUbahDriverTransaksi/<?php echo $key['id_transaksi'] ?>" class="btn btn-success">Ubah Driver</a>
									<?php } else { ?>
										<a href="<?php echo base_url() ?>admin/C_AdminHome/keAddDriverTransaksi/<?php echo $key['id_transaksi'] ?>" class="btn btn-warning">Pilih Driver</a>
									<?php } ?>
								<?php } ?>
								<a href="<?php echo base_url() ?>admin/C_AdminHome/deleteTransaksi/<?php echo $key['id_transaksi'] ?>" class="btn btn-danger">Hapus</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
			    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"></script>
			    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js"></script>
			    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js"></script>
			    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js"></script>
			    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css"></script>
			    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
			    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
			    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>

				<script type="text/javascript">
				$(document).ready(function(){
					$('#transaksi').DataTable( {
			        dom: 'Bfrtip',
			        buttons: [
			            'copy', 
			            {
							extend: 'pdfHtml5',
							exportOptions: {
							columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                			}
            			}
			        ]
			    } );
				});
			</script>
			</div>
		</div>
	</div>
</div>
</body>
</html>