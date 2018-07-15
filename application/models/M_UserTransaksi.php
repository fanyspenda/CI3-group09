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
	public function getIdBySession($id)
	{
		$idSession = $this->db->query("SELECT * FROM user where id = '".$id."'");
		return $idSession->result();
	}
	public function getTransaksiUser($id)
	{

		$getTransaksiUser = $this->db->query("SELECT * FROM user inner join transaksi on user.id = transaksi.id_user where user.id = '".$id."'");

		return $getTransaksiUser->result_array();
	}
	public function editProfilFoto($id)
	{
		$data = array
		(
			'username' =>$this->input->post('username'),
			'nama' =>$this->input->post(nl2br('nama')),
			'foto' =>$this->upload->data('file_name'),
			'tgl_lahir' =>$this->input->post('tgl_lahir'),
			'alamat' =>$this->input->post('alamat'),
			'NIK' =>$this->input->post('nik'),
			'nomorhp' =>$this->input->post('nomorhp'),
			'jenis_kelamin' =>$this->input->post('jenis_kelamin')

		);
		$this->db->where('id_akun', $id);
		$this->db->update('calon', $data);
		
	}
	public function editProfil($id)
	{
		$data = array
		(
			'username' =>$this->input->post('username'),
			'nama' =>$this->input->post(nl2br('nama')),
			'tgl_lahir' =>$this->input->post('tgl_lahir'),
			'alamat' =>$this->input->post('alamat'),
			'NIK' =>$this->input->post('nik'),
			'nomorhp' =>$this->input->post('nomorhp'),
			'jenis_kelamin' =>$this->input->post('jenis_kelamin')
		);
		$this->db->where('id_akun', $id);
		$this->db->update('calon', $data);
		
	}
}

/* End of file m_UserTransaksi.php */
/* Location: ./application/models/m_UserTransaksi.php */