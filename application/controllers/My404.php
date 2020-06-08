<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class my404 extends CI_Controller {	
	function index()
	{
		$data['title'] = 'Error 404 &minus; Halaman tidak ditemukan';
		$data['page'] = 'error_page';
		$this->load->view('error', $data);
	}
}