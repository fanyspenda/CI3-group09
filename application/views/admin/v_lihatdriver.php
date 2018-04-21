<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	</head>
	<body>

		<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
			<button class="w3-bar-item w3-button w3-large" onclick="w3_close()">&#9776; Daftar Menu</button>
				<button class="w3-button w3-block w3-left-align" onclick="driverMenu()">Data Driver &#x25BC;<i class="fa fa-caret-down"></i>
					<div id="lihatDriver" class="w3-hide w3-white w3-card">
						<a href="<?php echo base_url("admin/c_adminhome/todriverdata")?>" class="w3-bar-item w3-button">Lihat Data Driver</a>
    					<a href="#" class="w3-bar-item w3-button">Tambah Data Driver</a>
					</div>
				</button>

				<button class="w3-button w3-block w3-left-align" onclick="userMenu()">Data User &#x25BC;<i class="fa fa-caret-down"></i>
					<div id="lihatUser" class="w3-hide w3-white w3-card">
						<a href="#" class="w3-bar-item w3-button">Lihat Data User</a>
    					<a href="#" class="w3-bar-item w3-button">Tambah Data User</a>
					</div>
				</button>

				<button class="w3-button w3-block w3-left-align" onclick="transaksiMenu()">Data Transaksi &#x25BC;<i class="fa fa-caret-down"></i>
					<div id="lihatTransaksi" class="w3-hide w3-white w3-card">
						<a href="#" class="w3-bar-item w3-button">Lihat Data Transaksi</a>
    					<a href="#" class="w3-bar-item w3-button">Tambah Data Transaksi</a>
					</div>
				</button>
			<a href="#" class="w3-bar-item w3-button">Akunku</a>
		</div>
		<div id="main">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<div id="main">
							<button id="openNav" class="w3-button w3-xlarge" onclick="w3_open()">&#9776;</button><font id="judul" size="4">Sistem Informasi Jasa Driver</font>
						</div>
					</div>
				</div>
			</nav>

			<h1 class="text-center">Data Driver</h1>
			<div class="container">
				<table class="table table-striped table-bordered data">
					<thead>
						<tr>			
							<th>ID</th>
							<th>NIK</th>
							<th>Nama</th>
							<th>tgl Lahir</th>
							<th>Alamat</th>
							<th>Jenis Kelamin</th>
							<th>Nomor HP</th>
							<th>tgl Kerja</th>
							<th>Foto</th>
							<th>Gaji</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($getDriver as $key) {?>
						<tr>				
							<td><?php echo $key['id']; ?></td>
							<td><?php echo $key['NIK']; ?></td>
							<td><?php echo $key['nama']; ?></td>
							<td><?php echo $key['tgl_lahir']; ?></td>
							<td><?php echo $key['alamat']; ?></td>
							<td><?php echo $key['jenis_kelamin']; ?></td>
							<td><?php echo $key['nomorhp']; ?></td>
							<td><?php echo $key['tgl_kerja']; ?></td>
							<?php $dirImageDriver = '/foto/driver/';
							$imgName = $key["foto"];
							$imgLoader = $dirImageDriver . $imgName;
							?>
							<td><img src="<?php echo base_url($imgLoader);?>" style='width:185px; height: 200px'></td>
							<td><?php echo $key['gaji']; ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>

		<!-- Bootstrap JavaScript -->
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.data').DataTable();
		});
	</script>

	<script>
		function w3_open() {
			document.getElementById("main").style.marginLeft = "25%";
			document.getElementById("mySidebar").style.width = "25%";
			document.getElementById("mySidebar").style.display = "block";
			document.getElementById("openNav").style.display = 'none';
			document.getElementById("judul").style.display = 'none';
		}
		function w3_close() {
			document.getElementById("main").style.marginLeft = "0%";
			document.getElementById("mySidebar").style.display = "none";
			document.getElementById("openNav").style.display = "inline-block";
			document.getElementById("judul").style.display = 'inline-block';
		}

		function driverMenu() {
		    var x = document.getElementById("lihatDriver");
		    if (x.className.indexOf("w3-show") == -1) {
		        x.className += " w3-show";
		        x.previousElementSibling.className += " w3-green";
		    } else { 
		        x.className = x.className.replace(" w3-show", "");
		        x.previousElementSibling.className = 
		        x.previousElementSibling.className.replace(" w3-green", "");
		    }
		}

		function userMenu() {
		    var x = document.getElementById("lihatUser");
		    if (x.className.indexOf("w3-show") == -1) {
		        x.className += " w3-show";
		        x.previousElementSibling.className += " w3-green";
		    } else { 
		        x.className = x.className.replace(" w3-show", "");
		        x.previousElementSibling.className = 
		        x.previousElementSibling.className.replace(" w3-green", "");
		    }
		}

		function transaksiMenu() {
		    var x = document.getElementById("lihatTransaksi");
		    if (x.className.indexOf("w3-show") == -1) {
		        x.className += " w3-show";
		        x.previousElementSibling.className += " w3-green";
		    } else { 
		        x.className = x.className.replace(" w3-show", "");
		        x.previousElementSibling.className = 
		        x.previousElementSibling.className.replace(" w3-green", "");
		    }
		}

		</script>
</html>