<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_AdminHome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_admin');
		$this->load->helper('form');
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

	public function toDriverAdd()
	{
		$this->load->view('admin/v_tambahdriver');
	}

	public function addDriverData()
	{
		$id=$this->input->post('id');
		$nik=$this->input->post('nik');
		$nama=$this->input->post('nama');
		$tglLahir=$this->input->post('tgl_lahir');
		$alamat=$this->input->post('alamat');
		$jenisKelamin=$this->input->post('jenKel');
		$nohp=$this->input->post('nomorhp');
		$tglKerja=$this->input->post('tgl_kerja');
		$gaji=$this->input->post('gaji');
		$foto=$_FILES['foto']['name'];

		if ($foto=='') {
		}else{
			$config['upload_path'] = './foto/driver';
			$config['allowed_types'] = 'gif|jpg|png';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('foto')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$foto = $this->upload->data('file_name');
			}

			$dataArray  = array('id' => $id,
				'nama' => $nama,
				'alamat' => $alamat,
				'NIK' => $nik,
				'nomorhp' => $nohp,
				'foto' => $foto,
				'tgl_lahir' => $tglLahir,
				'jenis_kelamin' => $jenisKelamin,
				'tgl_kerja' => $tglKerja,
				'gaji' => $gaji
			);

			$this->m_admin->addDriver($dataArray, "driver");
			redirect('admin/lihatdriver');
		}
	}

}