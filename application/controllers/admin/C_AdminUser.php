<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_AdminUser extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_adminuser');
		$this->load->helper('form');
		$this->load->model('m_admin');
	}

	public function validasiHalaman()
	{
		//jika userid belum terisi atau session level belum terisi
		if(!isset($_SESSION['userid']) OR !isset($_SESSION['level'])){
			$this->session->set_flashdata('mustLogin', 'Anda Harus Login!');
			redirect('home');
		}
		
		//jika akun yang telah diloginkan bukan user, maka diredirect untuk login ulang
		elseif ($_SESSION['level']<3) {	
			//mengkosongkan nilai session level tanpa menghapus(destroy) variabelnya. sehingga, validasi di atas masih bisa berjalan
			$this->session->set_userdata('level', null);
			$this->session->set_userdata('userid', null);
			$this->session->set_flashdata('wrongUser', 'Sesi Berakhir! Lakukan Login Ulang');
			redirect('home');
		}
	}

	public function touserdata()
	{
		$this->validasiHalaman();
		$data['getUser']=$this->m_adminuser->getDataUserArray();
		$this->load->view('admin/template/header');
		$this->load->view('admin/v_lihatuser', $data);
		//$this->load->view('admin/template/footer');
	}

	public function toUserAdd()
	{
		$this->validasiHalaman();
		$data['level'] = $this->m_adminuser->getLevel();
		$this->load->view('admin/template/header');
		$this->load->view('admin/v_tambahuser', $data);
		$this->load->view('admin/template/footer');
	}

	public function toUserDetail()
	{
		$this->validasiHalaman();
		$idUser = $this->input->post('details');
		$data['userData'] = $this->m_adminuser->getUserByID($idUser);
		$this->load->view('admin/template/header');
		$this->load->view('admin/v_detailuser', $data);
		$this->load->view('admin/template/footer');
	}

	public function toUserEdit()
	{
		$this->validasiHalaman();
		$idUser = $this->input->post('edit');
		$data['userData'] = $this->m_adminuser->getUserByID($idUser);
		$this->load->view('admin/template/header');
		$this->load->view('admin/v_edituser', $data);
		$this->load->view('admin/template/footer');
	}

	public function editUserData()
	{
		$id=$this->input->post('id');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
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
		$checkpass = $this->input->post('checkpass');
		$unchangedPass = $this->input->post('unchangedPass');

		if ($validasiGantiGambar == 'tidak') {
			if ($checkpass == 'on') {
				$dataArray  = array('id' => $id,
					'nama' => $nama,
					'username' => $username,
					'password' => md5($password),
					'alamat' => $alamat,
					'NIK' => $nik,
					'nomorhp' => $nohp,			
					'tgl_lahir' => $tglLahir,
					'jenis_kelamin' => $jenisKelamin
				);
			}
			else {
				$dataArray  = array('id' => $id,
					'nama' => $nama,
					'username' => $username,
					'password' => $unchangedPass,
					'alamat' => $alamat,
					'NIK' => $nik,
					'nomorhp' => $nohp,			
					'tgl_lahir' => $tglLahir,
					'jenis_kelamin' => $jenisKelamin
				);
			}
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

				if ($checkpass == 'on') {
					$dataArray  = array('id' => $id,
						'nama' => $nama,
						'alamat' => $alamat,
						'NIK' => $nik,
						'nomorhp' => $nohp,
						'foto' => $foto,
						'tgl_lahir' => $tglLahir,
						'jenis_kelamin' => $jenisKelamin,
						'username' => $username,
						'password' => md5($password)
					);
				} else {
					$dataArray  = array('id' => $id,
						'nama' => $nama,
						'alamat' => $alamat,
						'NIK' => $nik,
						'nomorhp' => $nohp,
						'foto' => $foto,
						'tgl_lahir' => $tglLahir,
						'jenis_kelamin' => $jenisKelamin,
						'username' => $username,
						'password' => $unchangedPass
					);
				}


				$this->m_adminuser->editUserWithImg($dataArray);
				unlink('foto/user/'.$fotoLama);
				redirect('admin/C_AdminUser/touserdata');
			}
		}
	}

	public function addUserData()
	{
		//$id=$this->input->post('id');
		$nik=$this->input->post('nik');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
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

			$dataArray  = array(
				'nama' => $nama,
				'alamat' => $alamat,
				'NIK' => $nik,
				'nomorhp' => $nohp,
				'foto' => $foto,
				'level' => $level,
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