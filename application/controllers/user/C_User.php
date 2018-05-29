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

	public function templateLoad()
	{
		
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */