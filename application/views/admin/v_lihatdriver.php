<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<!-- OVERVIEW -->
			<div class="panel panel-headline">
				<h1 class="text-center">Data Driver</h1>
				<table class="table table-striped table-bordered data">
					<thead>
						<tr>			
							<th>ID</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Nomor HP</th>
							<th>tgl Kerja</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($getDriver as $key) {?>
						<tr>				
							<td><?php echo $key['id']; ?></td>
							<td><?php echo $key['nama']; ?></td>
							<td><?php echo $key['alamat']; ?></td>
							<td><?php echo $key['nomorhp']; ?></td>
							<td><?php echo $key['tgl_kerja']; ?></td>
								<!-- <?php $dirImageDriver = '/foto/driver/';
								$imgName = $key["foto"];
								$imgLoader = $dirImageDriver . $imgName;
								?>
								<td><img src="<?php echo base_url($imgLoader);?>" style='width:185px; height: 200px'></td> -->
								<td>
									<a href="<?php echo base_url() ?>admin/C_AdminHome/todriverdetail/<?php echo $key['id'] ?>" class="btn btn-primary">Detail</a>
									<a href="<?php echo base_url() ?>admin/C_AdminHome/todriveredit/<?php echo $key['id'] ?>" class="btn btn-warning">Edit</a>
									<a href="<?php echo base_url() ?>admin/C_AdminHome/todriverdelete/<?php echo $key['id'] ?>" class="btn btn-danger">Hapus</a></td>
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