<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function index()
	{
		$data['title'] = 'Login LogPulsa';
		$data['page'] = 'login_page';
		$this->load->view('login', $data);
	}
	
	function masuk()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		/* script untuk membuat user pertama dengan enkripsi password
		$data = array(
				'username' => $username,
				'password' => $this->encrypt->encode($password)
			);

		$insert = $this->db->insert('m_user', $data);
		$this->session->set_flashdata('pesan', 'User berhasil ditambahkan.');
		redirect('login');
		*/

		$cek_user = $this->M_login->cek_user($username)->result();
		
		foreach($cek_user as $cu)
		{
			$pass_db = $this->encrypt->decode($cu->password);
		}	

		if($password == $pass_db)
		{
			$cekuser = $this->M_login->cek_user($username);
			foreach($cekuser->result() as $sess){
				$sess_data['id_user'] = $sess->id_user;
				$sess_data['username'] = $sess->username;
				$sess_data['password'] = $sess->password;
				$sess_data['nama'] = $sess->nama;
				$this->session->set_userdata($sess_data);
			}

			redirect('beranda');
		}
		else
		{
			$this->session->set_flashdata('pesan', 'Maaf, kombinasi username dan password salah.');
			redirect('login');
		}
	}
	
	function keluar()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}