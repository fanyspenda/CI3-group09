		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo base_url('admin/c_adminhome/menu')?>">SISTEM INFORMASI JASA DRIVER</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Driver <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo site_url('admin/c_adminhome/todriverdata')?>">Lihat Data Driver</a></li>
								<li><a href="<?php echo base_url('admin/c_adminhome/todriveradd')?>">Tambah Data Driver</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Data User dan Admin<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url('admin/c_adminuser/touserdata')?>">Lihat Data User</a></li>
								<li><a href="<?php echo base_url('admin/c_adminuser/touseradd')?>">Tambah Data User </a></li>
								<li><a href="<?php 	echo base_url('admin/c_adminhome/viewadmin') ?>">Lihat Data Admin </a></li>
								<li><a href="<?php 	echo base_url('admin/c_adminhome/addadmin') ?>">Tambah Data Admin </a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Transaksi<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="gettransaksi">Lihat Data Transaksi</a></li>
								<!-- <li><a href="#">Tambah Data Transaksi</a></li> -->
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Kelola Akun Sendiri</a></li>
								<li><a href="#">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>