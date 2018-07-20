<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<!-- OVERVIEW -->
			<div class="panel panel-headline">
				<h1 class="text-center">Data User</h1>

				<table class="table table-striped table-bordered data">
					<thead>
						<tr>			
							<th>ID</th>
							<th>Nama</th>
							<th>tgl Lahir</th>
							<th>Alamat</th>
							<th>Nomor HP</th>
							<!-- <th>Foto</th> -->
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($getUser as $key) {?>
						<tr>				
							<td><?php echo $key['id']; ?></td>
							<td><?php echo $key['nama']; ?></td>
							<td><?php echo date('d-M-Y', strtotime($key['tgl_lahir'])); ?></td>
							<td><?php echo $key['alamat']; ?></td>
							<td><?php echo $key['nomorhp']; ?></td>
								<!-- <?php $dirImageDriver = '/foto/user/';
								$imgName = $key["foto"];
								$imgLoader = $dirImageDriver . $imgName;
								?>
								<td><img src="<?php echo base_url($imgLoader);?>" style='width:185px; height: 200px'></td> -->
<!-- 								<td>
									<a href="<?php echo base_url() ?>admin/c_adminuser/toUserDetail/<?php echo $key['id'] ?>" class="btn btn-primary">Detail</a>
									<a href="<?php echo base_url() ?>admin/c_adminuser/touseredit/<?php echo $key['id'] ?>" class="btn btn-warning">Edit</a>
									<a href="<?php echo base_url() ?>admin/c_adminuser/userdelete/<?php echo $key['id'] ?>" class="btn btn-danger">Hapus</a>
								</td> -->
								<td>
									<form action="<?php echo base_url('admin/c_adminuser/touseredit')?>" method="post">
										<input type="hidden" name= "edit" class="form-control" value="<?php echo $key['id']; ?>">
										<button class="btn btn-warning">Edit</button>
									</form>
									<br>
									<form action="<?php echo base_url('admin/c_adminuser/userdelete')?>" method="post">
										<input type="hidden" name= "delete" class="form-control" value="<?php echo $key['id']; ?>">
										<input type="hidden" name= "foto" class="form-control" value="<?php echo $key['foto']; ?>">
										<button class="btn btn-danger" onclick ="return confirm('hapus data dengan ID Driver: <?php echo $key['id']; ?> ?')">Delete</button>
									</form>
									<br>
									<form action="<?php echo base_url('admin/c_adminuser/toUserDetail')?>" method="post">
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