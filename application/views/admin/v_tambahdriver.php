<!DOCTYPE html>
<html lang="">
	<head>

		<style type="text/css">
			.skala{
				margin-left:10px;
				width:500px;
			}

		</style>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Tambah Data Driver</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
			<button class="w3-bar-item w3-button w3-large" onclick="w3_close()">&#9776; Daftar Menu</button>
				<button class="w3-button w3-block w3-left-align" onclick="driverMenu()">Data Driver &#x25BC;<i class="fa fa-caret-down"></i>
					<div id="lihatDriver" class="w3-hide w3-white w3-card">
						<a href="<?php echo base_url("admin/lihatdriver")?>" class="w3-bar-item w3-button">Lihat Data Driver</a>
    					<a href="<?php echo base_url("admin/C_AdminHome/toDriverAdd")?>" class="w3-bar-item w3-button">Tambah Data Driver</a>
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
			<?php echo form_open_multipart('admin/C_AdminHome/addDriverData');?>
				<i><b><div style="margin-left:430px;"><h1>FORM TAMBAH DATA DRIVER</h1></div></b></i>
				<legend></legend>
			
				<label style="margin-left:430px;">ID</label>
				<input type="text" class="form-control" name="id" placeholder="ID Driver" style="margin-left:430px; width:500px;" required><br><br>

				<label style="margin-left:430px;">NIK</label>
				<input type="text" class="form-control" name="nik" placeholder="NIK Driver" style="margin-left:430px; width:500px;" required><br><br>

				<label style="margin-left:430px;">Nama</label>
				<input type="text" class="form-control" name="nama" placeholder="nama lengkap" style="margin-left:430px; width:500px;" required><br><br>

				<label style="margin-left:430px;">Tanggal Lahir</label>
				<input type="date" class="form-control" name="tgl_lahir" style="margin-left:430px; width:500px;" required><br><br>

				<label style="margin-left:430px;">Alamat</label>
				<textarea class="form-control" name="alamat" placeholder="Alamat lengkap" style="margin-left:430px; width:500px; height:90px;" required></textarea><br><br>

				<label style="margin-left:430px;">Jenis Kelamin:</label>
				<input type="radio"  name="jenKel" value="pria" style="margin-left:30px;" required>Pria
				<input type="radio"  name="jenKel" value="wanita" style="margin-left:20px;">Wanita
				<br>
				<br>

				<label style="margin-left:430px;">Nomor HP</label>
				<input type="text" class="form-control" name="nomorhp" placeholder="Nomor HP yang bisa dihubungi" style="margin-left:430px; width:500px;" required><br><br>
				
				<label style="margin-left:430px;">Tanggal Kerja</label>
				<input type="date" class="form-control" name="tgl_kerja" style="margin-left:430px; width:500px;" required><br><br>

				<label style="margin-left:430px;">Gaji</label>
				<input type="text" class="form-control" name="gaji" style="margin-left:430px; width:500px;" required><br><br>
				
				
				<label style="margin-left:430px;">Foto Driver</label>
				<input type="file" name="foto" size="20" style="margin-left:430px; width:500px;" required><br><br>

				<button type="submit" class="btn btn-primary" style="margin-left:480px; width:400px; height:60px;">Simpan Data</button>
				<br><br>
			<?php echo form_close(); ?>
		</div>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>

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