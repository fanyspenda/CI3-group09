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

	public function getTransaksiByID($id)
	{
		$result = $this->db->query('SELECT * from transaksi where id_transaksi = '.$id);
		return $result->result_array();
	}

	public function getUserByID($idUser)
	{
		$query = $this->db->query('SELECT * from user where id = '.$idUser);
		return $query->result_array();
	}

	public function tambahDriverKeTransaksi($idTransaksi, $idDriver)
	{
		$this->db->query("update transaksi set id_driver = ".$idDriver." where id_transaksi = ". $idTransaksi);
		$this->db->query("update driver set status_kerja = 'dipesan' where id = ". $idDriver);
	}

	public function ubahDriverKeTransaksi($idTransaksi, $idDriverLama, $idDriverBaru)
	{
		$this->db->query("update transaksi set id_driver = ".$idDriverBaru." where id_transaksi = ". $idTransaksi);
		$this->db->query("update driver set status_kerja = 'dipesan' where id = ". $idDriverBaru);
		$this->db->query("update driver set status_kerja = 'kosong' where id = ". $idDriverLama);
	}
}