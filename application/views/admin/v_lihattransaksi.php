<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Driver</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- jQuery -->
	<script src="//code.jquery.com/jquery.js"></script>
	<!-- Bootstrap JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<!--datatable link -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
</head>
<body>
	<?php $this->load->view('admin/v_navbar');?>
	<h1 class="text-center">Data Admin</h1>
	<div class="container">

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
					<td><a href="<?php echo base_url() ?>admin/C_AdminHome/deleteTransaksi/<?php echo $key['id_transaksi'] ?>" class="btn btn-danger">Hapus</a><a href="<?php echo base_url() ?>admin/C_AdminHome/editTransaksi/<?php echo $key['id_transaksi'] ?>" class="btn btn-primary">Selesai</a></td>
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