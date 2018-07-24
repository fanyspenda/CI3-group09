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
								<th>ID</th>
								<th>Username</th>
								<!-- <th>password</th> -->
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
								<!-- <td><?php /*echo $key['password']*/; ?></td> -->
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