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
	<?php $this->load->model('m_admin'); ?>
	<?php $this->load->view('admin/v_navbar');?>
	<h1 class="text-center">Data Admin</h1>
	<div class="container">

		<table class="table table-striped table-bordered data">
			<thead>
				<tr>			
					<th>ID</th>
					<th>Username</th>
					<th>password</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Nomor HP</th>
					<th>NIK</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($getadmin as $key) {?>
				<tr>				
					<td><?php echo $key['id']; ?></td>
					<td><?php echo $key['username']; ?></td>
					<td><?php echo $key['password']; ?></td>
					<td><?php echo $key['nama']; ?></td>
					<td><?php echo $key['alamat']; ?></td>
					<td><?php echo $key['nomorhp']; ?></td>
					<td><?php echo $key['NIK']; ?></td>
					<td><a href="<?php echo base_url() ?>admin/C_AdminHome/delete/<?php echo $key['id'] ?>" class="btn btn-danger">Hapus</a></td>
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