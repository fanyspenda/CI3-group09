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

	public function tambahAdmin()
	{
		$data = array(
			'username'   => $this->input->post('username'),
			'password'   => $this->input->post('password'),
			'nama'   => $this->input->post('nama'),
			'alamat'   => $this->input->post('alamat'),
			'NIK'   => $this->input->post('NIK'),
			'nomorhp'   => $this->input->post('nomorhp')	
		);

		return $this->db->insert('admin', $data);
	}
	public function getDataAdmin()
	{
		$this->db->order_by('username');
		$query = $this->db->get('admin');

		return $query->result_array();
	}
	public function deleteDataAdmin($id)
	{
		if (!empty($id)) {
			$delete = $this->db->delete('admin', array('id'=>$id));
			return $delete ? true : false;
		}else{
			return false;
		}
	}
	public function get_admin_by_id($id)
	{
		$query = $this->db->get_where('admin', array('id' => $id));
		return $query->row();
	}
}

/* End of file driver.php */
/* Location: ./application/models/driver.php */