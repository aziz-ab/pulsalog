<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username'))
		{
			redirect('login');
		}
	}
	
	private function index()
	{
		redirect(base_url().'beranda');
	}
	
	function ubah_password()
	{
		$data['id_user'] = $this->session->userdata('id_user');
		$data['title'] = 'Ubah Password';
		$data['page'] = 'ubah_password';
		$data['judul'] = 'Ubah Password';
		$this->load->view('user', $data);
	}
	
	function submit_password()
	{
		$id_user = $this->input->post('id_user');
		$password_lama = $this->input->post('password_lama');
		$password_baru = $this->input->post('password_baru');
		$pb = $this->encrypt->encode($password_baru);
		$konfirm_password = $this->input->post('konfirm_password');

		$data = array(
			'password' => $pb
			);
		
		$data_password = $this->M_login->getuser($id_user)->result();
		foreach($data_password as $d){
			$old_password = $d->password;
			$op = $this->encrypt->decode($old_password);
		}
		
		if($password_lama <> $op)
		{
			$this->session->set_flashdata('pesan', 'Password lama tidak cocok. Gagal mengubah password.');
			redirect('user/ubah_password/'.$id_user);
		}
		else
		{
			$update = $this->M_login->update_password($id_user, $data);
			if(!$update)
			{
				echo '<script>alert("Password berhasil diubah. Silakan login kembali.")</script>';
				echo '<script>window.location="'.base_url('login').'"</script>';
			}
		}
	}
}