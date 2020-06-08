<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class M_master extends CI_Model{
	function menu() {
		return $this->db->get('m_menu');
	}

	function nominal() {
		return $this->db->get('m_nominal');
	}

	function harga() {
		return $this->db->get('m_harga');
	}

	function simpan_harga($data) {
		$this->db->insert('m_harga', $data);
	}

	function update_harga($data, $id_harga) {
		$this->db->where('id_harga', $id_harga);
		$this->db->update('m_harga', $data);
	}

	function hapus_harga($id_harga) {
		$this->db->where('id_harga', $id_harga);
		$this->db->delete('m_harga');
	}

	function hapus_nominal($id_nominal) {
		$this->db->where('id_nominal', $id_nominal);
		$this->db->delete('m_nominal');
	}

	function simpan_nominal($data) {
		$this->db->insert('m_nominal', $data);
	}

	function update_nominal($data, $id_nominal) {
		$this->db->where('id_nominal', $id_nominal);
		$this->db->update('m_nominal', $data);
	}

	function data_harga() {
		return $this->db->get('m_harga');
	}

	function data_nominal() {
		return $this->db->get('m_nominal');
	}
}