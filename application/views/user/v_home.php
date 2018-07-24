
		<div class="jumbotron">
			<div class="container">
				<h1>Hello, <?php echo $_SESSION['nama'];?> !</h1>
				<p>Selamat Datang!.</p>
			</div>
		</div>
		<div class="container">
			<h2>Berikut nama-nama Driver yang telah bekerja sama dengan Kami:</h2><br><br><br>
			<center>
				<table width="700">
					<thead>
						<th >Nomor</th>
						<th>nama</th>
						<th>Foto</th>
					</thead>
					<tbody>
						<?php $nomor = 1;
						foreach ($records as $key) {?>
						<tr>
							<td>
								<?php echo $nomor;
								$nomor++;?>

							</td>
							<td>
								<?php echo $key['nama']?>
							</td>
							<?php $dirImageDriver = '/foto/driver/';
								$imgName = $key["foto"];
								$imgLoader = $dirImageDriver . $imgName;
								?>
								<td><img src="<?php echo base_url($imgLoader);?>" style='width:160px; height: 180px'></td>

						</tr>
						<?php } ?>
					</tbody>
				</table>

				<?php echo $this->pagination->create_links(); ?>
	        </center>
		</div>