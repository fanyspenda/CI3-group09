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

	public function toDriverDetail()
	{
		$idDriver = $this->input->post('details');
		$data['driverDetail'] = $this->m_admin->getDriverByID($idDriver);
		$this->load->view('admin/v_detaildriver', $data);
	}

	public function toDriverEdit()
	{
		$idDriver = $this->input->post('edit');
		$data['driverData'] = $this->m_admin->getDriverByID($idDriver);
		$this->load->view('admin/v_editdriver', $data);
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
			$config['file_name'] = 'driver_'.$id.$nama.$nik;
			
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
			redirect('admin/C_AdminHome/menu');
		}
	}

	public function editDriverData()
	{
		$id=$this->input->post('id');
		$nik=$this->input->post('nik');
		$nama=$this->input->post('nama');
		$tglLahirOld=$this->input->post('tgl_lahir');
		$tglLahir = date('Y-m-d H:i:s', strtotime($tglLahirOld));
		$alamat=$this->input->post('alamat');
		$jenisKelamin=$this->input->post('jenKel');
		$nohp=$this->input->post('nomorhp');
		$tglKerjaOld=$this->input->post('tgl_kerja');
		$tglKerja = date('Y-m-d H:i:s', strtotime($tglKerjaOld));
		$gaji=$this->input->post('gaji');
		$validasiGantiGambar = $this->input->post('gantiGambar');
		$fotoLama = $this->input->post('fotoLama');
		$foto=$_FILES['foto']['name'];

		if ($validasiGantiGambar == 'tidak') {
				$dataArray  = array('id' => $id,
					'nama' => $nama,
					'alamat' => $alamat,
					'NIK' => $nik,
					'nomorhp' => $nohp,			
					'tgl_lahir' => $tglLahir,
					'jenis_kelamin' => $jenisKelamin,
					'tgl_kerja' => $tglKerja,
					'gaji' => $gaji
				);

				$this->m_admin->editDriverNoImg($dataArray);
				redirect('admin/C_AdminHome/toDriverData');
		}

		elseif ($validasiGantiGambar == 'ya') {
			if ($foto=='') {
			}else{
				$config['upload_path'] = './foto/driver';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name'] = 'driver_'.$id.$nama.$nik;
				
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

				$this->m_admin->editDriverWithImg($dataArray);
				unlink('foto/driver/'.$fotoLama);
				redirect('admin/C_AdminHome/menu');
			}
		}
	}

	public function driverDelete()
	{
		$idDriver = $this->input->post('delete');
		$foto = $this->input->post('foto');
		$this->m_admin->deleteDriver($idDriver);
		unlink('foto/driver/'.$foto);
		redirect('admin/C_AdminHome/toDriverData');
	}

}