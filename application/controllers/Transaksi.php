<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('M_transaksi');
	}


	public function insertTransaksi()
	{
		$object = array(
			'id_user' => '',
			'id_driver' => '',
			'tanggal_berangkat' => $this->input->post('tanggal_berangkat'),
			'tanggal_kembali' => $this->input->post('tanggal_kembali'),
			'kota_awal' => $this->input->post('kota_awal'),
			'kota_tujuan' => $this->input->post('kota_tujuan'),
			'jumlah_hari' => $this->input->post('jumlah_hari'),
			'status' => '1',
			'harga' => '1'
		);
		$this->M_transaksi->add($object);
	}
}
