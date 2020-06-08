<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class M_transaksi extends CI_Model{
	function simpan_transaksi($data) {
		$this->db->insert('t_transaksi', $data);
	}

	function del_transaksi($id_transaksi) {
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->delete('t_transaksi');
	}

	function update_transaksi($data, $id_transaksi) {
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->update('t_transaksi', $data);
	}

	function jumlah_today() {
		return $this->db->get('v_jumlah_today');
	}

	function jumlah_today_lunas() {
		return $this->db->get('v_jumlah_today_lunas');
	}

	function jumlah_today_utang() {
		return $this->db->get('v_jumlah_today_utang');
	}

	function jumlah_all() {
		return $this->db->get('v_jumlah_all');
	}

	function jumlah_all_lunas() {
		return $this->db->get('v_jumlah_all_lunas');
	}

	function jumlah_all_utang() {
		return $this->db->get('v_jumlah_all_utang');
	}

	function getone($id_transaksi) {
		$this->db->where('id_transaksi', $id_transaksi);
		return $this->db->get('v_transaksi_all');
	}
}