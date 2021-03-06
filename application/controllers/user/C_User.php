<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('upload');
		$this->load->library('form_validation');
		$this->load->model('m_usertransaksi');
		$this->load->library('pagination');
		$this->load->model('m_admin');
	}

	public function validasiHalaman()
	{
		//jika userid belum terisi atau session level belum terisi
		if(!isset($_SESSION['userid']) OR !isset($_SESSION['level'])){
			$this->session->set_flashdata('mustLogin', 'Anda Harus Login!');
			redirect('home');
		}

		//jika akun yang telah diloginkan bukan user, maka diredirect untuk login ulang
		elseif ($_SESSION['level']>1) {	
			//mengkosongkan nilai session level tanpa menghapus(destroy) variabelnya. sehingga, validasi di atas masih bisa berjalan
			$this->session->set_userdata('level', null);
			$this->session->set_userdata('userid', null);
			$this->session->set_flashdata('wrongUser', 'Sesi Berakhir! Lakukan Login Ulang');
			redirect('home');
		}
	}

	public function index()
	{
		$this->validasiHalaman();

		$this->load->library('pagination');
		$this->load->library('table');

		$config['base_url'] = 'http://localhost:81/CI3-Kelompok09/user/c_user/index';
		$config['total_rows'] = $this->db->get('driver')->num_rows();
		$config['per_page'] = 2;
		$config['num_links'] = 2;
		$config["uri_segment"] = 4;
		$config['next_link'] = '';
		$config['prev_link'] = '';
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
				
		$this->pagination->initialize($config);

		$query = $this->db->get('driver', $config['per_page'], $this->uri->segment(4));
		$data['records'] = $query->result_array();
		$this->load->view('template/header');
		$this->load->view('user/v_home', $data);
		$this->load->view('template/footer');
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
		//$passwordKonfirmasi = $this->input->post('confirmPass');
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
				'metode_bayar' => $metodeBayar,
				'status' => "Baru Dibuat",
				'harga_total' => $hargaTotal
			);

			$this->m_usertransaksi->addTransaksi('transaksi', $data);

			redirect('user/c_user');
		}
	}

	public function lihatTransaksi()
	{
		$getTransaksiUser['getbysession'] =  $this->m_usertransaksi->getTransaksiUser($_SESSION['userid']);
		//var_dump($getTransaksiUser);

		$this->load->view('template/header');
		$this->load->view('user/v_lihatTransaksi',$getTransaksiUser);
		$this->load->view('template/footer');
	}
	public function deleteTransaksi($id)
	{

		$this->m_usertransaksi->deleteTransaksi($id);
		redirect('user/c_user/lihattransaksi');
	}
	public function getProfil()
	{
		$this->load->view('template/header');
		$this->load->model('M_UserTransaksi');
		$data['getprofil']=$this->M_UserTransaksi->getIdBySession($_SESSION['userid']);
		$this->load->view('profile', $data);
		$this->load->view('template/footer');
	}
	public function editProfil()
	{
			$this->load->model('M_UserTransaksi');

			$this->form_validation->set_rules('username', 'Username', 'trim|required');
        	$this->form_validation->set_rules('nama', 'nama', 'trim|required');

        $data['getprofil']=$this->M_UserTransaksi->getIdBySession($_SESSION['userid']);
        	if ($this->form_validation->run() == FALSE) {
        		$this->load->view('template/header');
				$this->load->view('editprofil', $data);
				$this->load->view('template/footer');
        	}else{
        	
        		$config['upload_path'] = './foto/user';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']  = 10000000; //kb
				$config['max_width']  = 10240; //pixel
				$config['max_height']  = 7680; //pixel
				$this->upload->initialize($config);

				$this->load->library('upload', $config);
				if ( !$this->upload->do_upload('foto')){
					$this->M_UserTransaksi->editProfil($_SESSION['userid']);
					echo '<script>alert("Data Calon Berhasil di Update")</script>';
					redirect('user/C_User/getProfil','refresh');
				}else{

					$this->M_UserTransaksi->editProfilFoto($_SESSION['userid']);
					echo '<script>alert("Data dan Foto Calon Berhasil di Update")</script>';
					redirect('user/C_User/getProfil','refresh');
				}
        	}
	}

	public function logout()
	{
		$this->session->set_userdata('level', null);
		$this->session->set_userdata('userid', null);
		redirect('home');
	}

	public function pagination()
	{
		$limit_per_page = 2;
        // URI segment untuk mendeteksi "halaman ke berapa" dari URL
        $start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;
        // Dapatkan jumlah data
        $total_records = $this->blog->get_total();
        if ($total_records > 0) {
		    // Dapatkan data pada halaman yg dituju
		    $data["all_artikel"] = $this->blog->get_all_artikel($limit_per_page, $start_index);
		    
		    // Konfigurasi pagination
		    $config['base_url'] = base_url() . 'home/pagination';
		    $config['total_rows'] = $total_records;
		    $config['per_page'] = $limit_per_page;
		    $config["uri_segment"] = 3;
		    
		    $this->pagination->initialize($config);
		    
		    // Buat link pagination
		    $data["links"] = $this->pagination->create_links();
		    $this->load->view('blog', $data);
		}
	}
}


/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
?>