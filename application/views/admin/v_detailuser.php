<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Detail User</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<!--Link Datatable-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />


		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<?php $this->load->view('admin/v_navbar'); ?>
			<center><legend><i><b><h1>DETAIL DATA USER</h1></b></i></legend></center>
			<div style="margin-left: 50px; margin-right: 50px;">
				<?php foreach ($userData as $key) { ?>
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
							<th>Foto</th>
							<?php $dirImageUser = '/foto/user/';
							$imgName = $key["foto"];
							$imgLoader = $dirImageUser . $imgName;
							?>
							<td><img src="<?php echo base_url($imgLoader);?>" style='width:185px; height: 200px'></td>
						</tr>
					</tbody>
				</table>
				<button class="btn btn-primary" onclick="location.href = '<?php echo base_url('admin/C_AdminUser/toUserData');?>'">Kembali</button>
				<br><br>
				<?php } ?>
			</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>