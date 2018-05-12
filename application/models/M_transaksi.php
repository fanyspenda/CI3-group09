<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function getData(){
		$query = $this->db->query("select * from driver");
		return $query->result_array();
	}

	public function add($data)
	{
		$this->db->insert('transaksi', $data);
	}

}