<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_AdminUser extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_adminuser');
		$this->load->helper('form');
	}

	public function index()
	{
		
	}

	public function touserdata()
	{
		$data['getUser']=$this->m_adminuser->getDataUserArray();
		$this->load->view('admin/v_lihatuser', $data);
	}

	public function toUserAdd()
	{
		$this->load->view('admin/v_tambahuser');
	}

	public function toUserDetail()
	{
		$idUser = $this->input->post('details');
		$data['userData'] = $this->m_adminuser->getUserByID($idUser);
		$this->load->view('admin/v_detailuser', $data);
	}

	public function toUserEdit()
	{
		$idUser = $this->input->post('edit');
		$data['userData'] = $this->m_adminuser->getUserByID($idUser);
		$this->load->view('admin/v_edituser', $data);
	}

	public function editUserData()
	{
		$id=$this->input->post('id');
		$username = $this->input->post('username');
		$password = $this->input->md5(post('password'));
		$nik=$this->input->post('nik');
		$nama=$this->input->post('nama');
		$tglLahirOld=$this->input->post('tgl_lahir');
		$tglLahir = date('Y-m-d H:i:s', strtotime($tglLahirOld));
		$alamat=$this->input->post('alamat');
		$jenisKelamin=$this->input->post('jenKel');
		$nohp=$this->input->post('nomorhp');
		$validasiGantiGambar = $this->input->post('gantiGambar');
		$fotoLama = $this->input->post('fotoLama');
		$foto=$_FILES['foto']['name'];

		if ($validasiGantiGambar == 'tidak') {
				$dataArray  = array('id' => $id,
					'nama' => $nama,
					'username' => $username,
					'password' => $password,
					'alamat' => $alamat,
					'NIK' => $nik,
					'nomorhp' => $nohp,			
					'tgl_lahir' => $tglLahir,
					'jenis_kelamin' => $jenisKelamin
				);

				$this->m_adminuser->editUserNoImg($dataArray);
				redirect('admin/C_AdminUser/toUserData');
		}

		elseif ($validasiGantiGambar == 'ya') {
			if ($foto=='') {
			}else{
				$config['upload_path'] = './foto/user';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name'] = 'User+'.$id.'+'.$nama.'+'.$nik;
				
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
					'username' => $username,
					'password' => $password

				);

				$this->m_adminuser->editUserWithImg($dataArray);
				unlink('foto/user/'.$fotoLama);
				redirect('admin/C_AdminUser/touserdata');
			}
		}
	}

	public function addUserData()
	{
		$id=$this->input->post('id');
		$nik=$this->input->post('nik');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama=$this->input->post('nama');
		$tglLahir=$this->input->post('tgl_lahir');
		$alamat=$this->input->post('alamat');
		$jenisKelamin=$this->input->post('jenKel');
		$nohp=$this->input->post('nomorhp');
		$foto=$_FILES['foto']['name'];

		if ($foto=='') {
		}else{
			$config['upload_path'] = './foto/user';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name'] = 'user_'.$id.$nama.$nik;
			
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
				'username' => $username,
				'password' => md5($password),
				'tgl_lahir' => $tglLahir,
				'jenis_kelamin' => $jenisKelamin
			);

			$this->m_adminuser->addUser($dataArray, "user");
			redirect('admin/C_AdminUser/touserdata');
		}
	}

	public function userdelete()
	{
		$idUser = $this->input->post('delete');
		$foto = $this->input->post('foto');
		$this->m_adminuser->deleteUser($idUser);
		unlink('foto/user/'.$foto);
		redirect('admin/C_AdminUser/toUserData');
	}
}

/* End of file C_AdminUser.php */
/* Location: ./application/controllers/admin/C_AdminUser.php */