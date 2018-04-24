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

	public function getDriverByID($idDriver)
	{
		$query = $this->db->query('SELECT * from driver where id = "'.$idDriver.'"');
		return $query->result_array();
	}

	public function editDriverNoImg($data)
	{
		$query = $this->db->query("UPDATE driver set nama = '".$data['nama']."',
		 alamat = '".$data['alamat']."',
		 NIK = '".$data['NIK']."',
		 nomorhp = '".$data['nomorhp']."',
		 tgl_lahir = '".$data['tgl_lahir']."',
		 jenis_kelamin = '".$data['jenis_kelamin']."',
		 tgl_kerja = '".$data['tgl_kerja']."', 
		 gaji = ".$data['gaji']." where id = ".$data['id']);
	}

	public function editDriverWithImg($data)
	{
		$query = $this->db->query("UPDATE driver set nama = '".$data['nama']."',
		 alamat = '".$data['alamat']."',
		 NIK = '".$data['NIK']."',
		 nomorhp = '".$data['nomorhp']."',
		 tgl_lahir = '".$data['tgl_lahir']."',
		 jenis_kelamin = '".$data['jenis_kelamin']."',
		 tgl_kerja = '".$data['tgl_kerja']."', 
		 foto = '".$data['foto']."',
		 gaji = ".$data['gaji']." where id = ".$data['id']);
	}
}

/* End of file driver.php */
/* Location: ./application/models/driver.php */