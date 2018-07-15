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
		<h1 class="text-center">Data Driver</h1>
		<div class="container">

			<table class="table table-striped table-bordered data">
				<thead>
					<tr>			
						<th>ID</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Nomor HP</th>
						<th>tgl Kerja</th>
						<th>Foto</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>0
					<?php foreach ($getDriver as $key) {?>
					<tr>				
						<td><?php echo $key['id']; ?></td>
						<td><?php echo $key['nama']; ?></td>
						<td><?php echo $key['alamat']; ?></td>
						<td><?php echo $key['nomorhp']; ?></td>
						<td><?php echo $key['tgl_kerja']; ?></td>
						<?php $dirImageDriver = '/foto/driver/';
						$imgName = $key["foto"];
						$imgLoader = $dirImageDriver . $imgName;
						?>
						<td><img src="<?php echo base_url($imgLoader);?>" style='width:185px; height: 200px'></td>
						<td>
							<form action="<?php echo base_url('admin/c_adminhome/todriveredit')?>" method="post">
								<input type="hidden" name= "edit" class="form-control" value="<?php echo $key['id']; ?>">
								<button class="btn btn-warning">Edit</button>
							</form>
							<br>
							<form action="<?php echo base_url('admin/c_adminhome/todriverdelete')?>" method="post">
								<input type="hidden" name= "delete" class="form-control" value="<?php echo $key['id']; ?>">
								<button class="btn btn-danger" onclick="#delete">Delete</button>
							</form>
							<br>
							<form action="<?php echo base_url('admin/c_adminhome/todriverdetail')?>" method="post">
								<input type="hidden" name= "details" class="form-control" value="<?php echo $key['id']; ?>">
								<button class="btn btn-success">Details</button>
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