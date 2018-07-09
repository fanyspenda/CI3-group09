<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('m_usertransaksi');
	}

	public function index()
	{
		//jika userid belum terisi atau session level belum terisi
		if(!isset($_SESSION['userid']) OR !isset($_SESSION['level'])){
			$this->session->set_flashdata('mustLogin', 'Anda Harus Login!');
			redirect('home/kelogin');
		}

		//jika level user yang telah login tidak sama dengan 1, maka diredirect untuk login ulang
		elseif ($_SESSION['level']!=1) {
			
			//mengkosongkan nilai session level tanpa menghapus(destroy) variabelnya. sehingga, validasi di atas masih bisa berjalan
			$this->session->set_userdata('level', null);
			$this->session->set_flashdata('wrongUser', 'Sesi Berakhir! Lakukan Login Ulang');
			redirect('home/kelogin');
		}

		else {
			$this->load->view('template/header');
			$this->load->view('user/v_home');
			$this->load->view('template/footer');
		}
	}

	public function keBuatTransaksi()
	{
		$data['daftarKota'] = $this->m_usertransaksi->getKota();

		$this->load->view('template/header');
		$this->load->view('user/v_buatTransaksi', $data);
		$this->load->view('template/footer');
	}

	public function buatTransaksi()
	{
		//mengubah input dari Post ke dalam objek DateTime agar bisa dijalankan ke date_diff()
		$tglBerangkat = date_create($this->input->post('tglberangkat'));
		$kotaTujuan = $this->input->post('kotatujuan');

		//mengubah input dari Post ke dalam objek DateTime agar bisa dijalankan ke date_diff()
		$tglKembali = date_create($this->input->post('tglkembali'));
		$metodeBayar = $this->input->post('metodeBayar');
		$passwordKonfirmasi = md5($this->input->post('confirmPass'));
		$jumlahHari = date_diff($tglBerangkat, $tglKembali);

		//mengambil bagian selisih hari dari dateInterval dan menyimpan ke "jumlah hari"
		$jumlahHari = $jumlahHari->format("%a");

		//mengambil tarif per hari dari kota yang dipilih
		$a['harga'] = $this->m_usertransaksi->getTarif($kotaTujuan);

		//menghitung total Harga
		foreach ($a['harga'] as $key) {
			$hargaTotal = $key['harga'] * $jumlahHari;
			if($hargaTotal==0 || $jumlahHari == 0){
				$hargaTotal = $key['harga'];
			}
		}

		?>

		<!-- konfirmasi pembelian dengan confirm box javascript -->
		<script type="text/javascript">
			var hargaTotal = '<?php echo $hargaTotal ?>';
			if(confirm('harga total adalah: '+hargaTotal+'. Lanjutkan?')){
			}else {
				<?php
					$data['daftarKota'] = $this->m_usertransaksi->getKota();
					$this->load->view('template/header');
					$this->load->view('user/v_buatTransaksi', $data);
					$this->load->view('template/footer');
				?>
			}
		</script>

		<?php

/*		memvalidasi apakah password sudah benar*/
		if($passwordKonfirmasi != $_SESSION['password']){
			//kembali ke menu buat transaksi dengan pesan error
			$this->session->set_flashdata('invalidPasswordTrans', 'Password Salah');
		} else{
			//menyimpan data ke array untuk dikirim ke database
			$data = array(
				'id_user' => $_SESSION['userid'],
				'tanggal_berangkat' => $this->input->post('tglberangkat'),
				'kota_tujuan' => $kotaTujuan,
				'jumlah_hari' => $jumlahHari,
				'tanggal_kembali' => $this->input->post('tglkembali'),
				'status' => "Baru Dibuat",
				'harga_total' => $hargaTotal
			);

			$this->m_usertransaksi->addTransaksi('transaksi', $data);

			redirect('user/c_user');
		}
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
?>