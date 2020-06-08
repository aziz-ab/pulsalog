<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class M_beranda extends CI_Model{
	function simpan_transaksi($data) {
		$this->db->insert('t_transaksi', $data);
	}
}