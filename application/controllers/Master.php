<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('username'))
		{
			redirect('login');
		}
	}

	function index() {
		redirect('master/harga');
	}

	function harga() {
		$data['title'] = 'Data Master Harga';
		$data['page'] = 'master_harga';
		$data['judul'] = 'Data Master Harga';
		$data['data'] = $this->M_master->data_harga()->result();
		$this->load->view('layout', $data);
	}

	function nominal() {
		$data['title'] = 'Data Master Nominal';
		$data['page'] = 'master_nominal';
		$data['judul'] = 'Data Master Nominal';
		$data['data'] = $this->M_master->data_nominal()->result();
		$this->load->view('layout', $data);
	}

	function simpan_harga() {
		$harga = $this->input->post('harga');
		$button = $this->input->post('submit');
		$id_harga = $this->input->post('id_harga');
		
		$data = array(
			'harga' => $harga
			);

		if($button == 'add') {
			$simpan = $this->M_master->simpan_harga($data);
		} elseif($button == 'update') {
			$simpan = $this->M_master->update_harga($data, $id_harga);
		}

		if(!$simpan) {
			$this->session->set_flashdata('pesan', 'Berhasil disimpan.');
			redirect('master/harga');
		} else {
			$this->session->set_flashdata('pesan', 'Gagal disimpan.');
			redirect('master/harga');
		}
	}

	function hapus_harga($id_harga) {
		$hapus = $this->M_master->hapus_harga($id_harga);
		redirect('master/harga');
	}

	function simpan_nominal() {
		$nominal = $this->input->post('nominal');
		$button = $this->input->post('submit');

		$data = array(
			'nominal' => $nominal
			);

		if($button == 'add') {
			$simpan = $this->M_master->simpan_nominal($data);
		} elseif($button == 'update') {
			$simpan = $this->M_master->update_nominal($data, $id_nominal);
		}

		if(!$simpan) {
			$this->session->set_flashdata('pesan', 'Berhasil disimpan.');
			redirect('master/nominal');
		} else {
			$this->session->set_flashdata('pesan', 'Gagal disimpan.');
			redirect('master/nominal');
		}
	}

	function hapus_nominal($id_nominal) {
		$hapus = $this->M_master->hapus_nominal($id_nominal);
		redirect('master/nominal');
	}
}