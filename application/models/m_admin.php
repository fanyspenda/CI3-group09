<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function getDataDriverArray(){
		$query = $this->db->query("select * from driver");
		return $query->result_array();
	}

	public function addDriver($data, $tabel)
	{
		$this->db->insert($tabel, $data);
	}

}

/* End of file driver.php */
/* Location: ./application/models/driver.php */