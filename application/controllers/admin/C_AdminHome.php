<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_AdminHome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_admin');
	}

	public function menu()
	{
		$this->load->view('admin/v_adminhome');
	}

	public function toDriverData()
	{
		$data['getDriver']=$this->m_admin->getDataDriverArray();
		$this->load->view('admin/v_lihatdriver', $data);
	}

}