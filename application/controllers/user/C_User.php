<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_usertransaksi');
	}

	public function index()
	{
		$this->load->view('template/dashboard');
		//$this->load->view('user/v_home');
	}

	public function templateLoad()
	{
		
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */