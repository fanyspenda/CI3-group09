		<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
			<button class="w3-bar-item w3-button w3-large" onclick="w3_close()">&#9776; Daftar Menu</button>
				<button class="w3-button w3-block w3-left-align" onclick="driverMenu()">Data Driver &#x25BC;<i class="fa fa-caret-down"></i>
					<div id="lihatDriver" class="w3-hide w3-white w3-card">
						<a href="<?php echo base_url("admin/lihatdriver")?>" class="w3-bar-item w3-button">Lihat Data Driver</a>
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