<center><legend><i><b><h1>Lihat Transaksi</h1></b></i></legend></center>
			<div style="margin-left: 50px; margin-right: 50px;">
				<?php foreach ($getbysession as $key => $value ) { ?>
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>			
							<th>ID</th>
							<td><?php echo $key+1?></td>
						</tr>
						<tr>
							<th>Nama</th>
							<td><?php echo $value['nama']?></td>
						</tr>
						<tr>
							<th>nohape</th>
							<td><?php echo $value['nomorhp']?></td>
						</tr>
						<tr>
							<th>Kota Tujuan</th>
							<td><?php echo $value['kota_tujuan']?></td>
						</tr>
						<tr>
							<th>Tanggal Berangkat</th>
							<td><?php echo $value['tanggal_berangkat']?></td>
						</tr>
						<tr>
							<th>Tanggal Kembali</th>
							<td><?php echo $value['tanggal_kembali']?></td>
						</tr>
						<tr>
							<th>Status</th>
							<td><?php echo $value['status']?></td>
						</tr>
						<tr>
							<th>Harga</th>
							<td><?php echo $value['harga']?></td>
						</tr>

						
						
						
					</tbody>
				</table>
				<br><br>
				<?php } ?>
			</div>

