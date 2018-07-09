<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_UserTransaksi extends CI_Model {
	
	public function getKota()
	{
		$daftarKota = $this->db->query("SELECT * FROM kota");
		return $daftarKota->result_array();
	}
	
	public function getTarif($kota)
	{
		$tarifKota = $this->db->query("SELECT harga FROM tarif where kota_tujuan = '".$kota."'");
		return $tarifKota->result_array();
	}

	public function addTransaksi($table, $data)
	{
		$this->db->insert($table, $data);
	}
}

/* End of file m_UserTransaksi.php */
/* Location: ./application/models/m_UserTransaksi.php */