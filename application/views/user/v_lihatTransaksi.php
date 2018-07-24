<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<!-- Bootstrap CSS -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->
	<!-- jQuery -->
	<!-- <script src="//code.jquery.com/jquery.js"></script> -->
	<!-- Bootstrap JavaScript -->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->
	<!--datatable link -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   -->
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
</head>

<center>
	<legend>
		<i>
			<b>
				<h1>Lihat Transaksi</h1>
			</b>
		</i>
	</legend>
</center>
<div class="container">
	
	<table class="table table-striped table-bordered data">
		<thead>
			<tr>			
				<th>No</th>
				<th>Nama</th>
				<th>Telepon</th>
				<th>Kota Tujuan</th>
				<th>Tanggal Berangkat</th>
				<th>Tanggal Kembali</th>
				<th>Harga</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($getbysession as $key => $value ) { ?>
			<tr>			<!-- 
				<th>No</th> -->
				<td><?php echo $key+1?></td>
				<!-- <th>Nama</th> -->
				<td><?php echo $value['nama']?></td>
				<!-- <th>nohape</th> -->
				<td><?php echo $value['nomorhp']?></td>
				<!-- <th>Kota Tujuan</th> -->
				<td><?php echo $value['kota_tujuan']?></td>
				<!-- <th>Tanggal Berangkat</th> -->
				<td><?php echo $value['tanggal_berangkat']?></td>
				<!-- <th>Tanggal Kembali</th> -->
				<td><?php echo $value['tanggal_kembali']?></td>
				
				<td><?php echo $value['harga_total']?></td>
				<td><?php echo $value['status']?></td>
				
				<td>
					<?php if ($value['id_driver']==NULL) { ?>
						<a href="<?php echo base_url()?>user/c_user/deletetransaksi/<?php echo $value['id_transaksi']?>" class="btn btn-danger">Delete</button>
					<?php } else { ?>
						<h4><strong>Terkonfirmasi</strong></h4>
					<?php } ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<br><br>

	<p>apabila Transaksi tidak bisa dihapus, Maka Transaksi Telah dikonfirmasi oleh Admin.</p>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.data').DataTable();
	});
</script>
</html>