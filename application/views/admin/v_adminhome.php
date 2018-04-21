<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Home</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>

	<body>
		<!-- navigasi Samping -->
		<?php $this->load->view('admin/v_sideNavbar') ?>
		<!--end of Navigasi Samping -->

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
			<div class="jumbotron">
				<div class="container">
					<h1>Hello, Admin!</h1>
					<p>Contents ...</p>
				</div>
			</div>
		</div>
		
		<?php $this->load->view('admin/template/funHomeAdmin'); ?>
	</body>
</html>