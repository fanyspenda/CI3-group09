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

	public function getAllTransaksi()
	{
		$query = $this->db->query('SELECT * from transaksi');
		return $query->result_array();
	}

	public function delete($id)
	{
		$this->db->where('id_transaksi', $id);
		$this->db->delete('transaksi');
	}
	public function edit($id)
	{
		$this->db->where('id_transaksi', $id);
		$object=array('status'=>"Selesai");
		$this->db->update('transaksi', $object);
	}

}