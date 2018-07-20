<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_AdminHome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_admin');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
	}

	public function index()
	{
		$this->load->view('admin/template/header');
		$this->load->view('admin/v_index');
		$this->load->view('admin/template/footer');
	}

	public function getTransaksi()
	{

		$this->load->model('M_transaksi');
		$data['datatransaksi']= $this->M_transaksi->getAllTransaksi();
		$this->load->view('admin/template/header');
		$this->load->view('admin/v_lihattransaksi', $data);
		$this->load->view('admin/template/footer');
	}

	public function deleteTransaksi($id)
	{
		$this->load->model('M_transaksi');
		$this->M_transaksi->delete($id);
		redirect('admin/C_AdminHome/getTransaksi','refresh');
	}
	public function editTransaksi($id)
	{
		$this->load->model('M_transaksi');
		$this->M_transaksi->edit($id);
		redirect('admin/C_AdminHome/getTransaksi','refresh');
	}

	public function menu()
	{
		$this->load->view('admin/v_adminhome');
	}

	public function toDriverData()
	{
		$data['getDriver']=$this->m_admin->getDataDriverArray();
		$this->load->view('admin/template/header');
		$this->load->view('admin/v_lihatdriver', $data);		
		$this->load->view('admin/template/footer');

	}

	public function toDriverAdd()
	{
		$this->load->view('admin/template/header');
		$this->load->view('admin/v_tambahdriver');
		$this->load->view('admin/template/footer');
	}

	public function toDriverEdit()
	{
		$idDriver = $this->input->post('edit');
		$data['driverData'] = $this->m_admin->getDriverByID($idDriver);
		$this->load->view('admin/template/header');
		$this->load->view('admin/v_editdriver', $data);
		$this->load->view('admin/template/footer');
	}

	public function toDriverDetail()
	{
		$idDriver = $this->input->post('details');
		$data['driverData'] = $this->m_admin->getDriverByID($idDriver);
		$this->load->view('admin/template/header');
		$this->load->view('admin/v_detaildriver', $data);
		$this->load->view('admin/template/footer');
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

		if ($foto=='') {show_404();
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
			redirect('admin/C_AdminHome/toDriverData');
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
				redirect('admin/C_AdminHome/toDriverData');
			}
		}
	}
	public function addAdmin()
	{
		$data['page_title']  = 'Tambah Admin';
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'username','required');
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/template/header');
			$this->load->view('admin/v_tambahadmin', $data);
			$this->load->view('admin/template/footer');
		} else {
			$this->m_admin->tambahAdmin();
			redirect('admin/C_AdminHome/viewAdmin');
		}
	}
	public function viewAdmin()
	{
		$data['getadmin'] = $this->m_admin->getDataAdmin();
		$this->load->view('admin/template/header');
		$this->load->view('admin/v_lihatadmin',$data);
		$this->load->view('admin/template/footer');
	}

	public function delete($id)
	{
		$data['dataAdmin'] = $this->m_admin->get_admin_by_id($id);
		if (empty($id) || !$data['dataAdmin']) show_404();
		$this->m_admin->deleteDataAdmin($id);
		redirect('admin/C_AdminHome/viewAdmin');
	}
}