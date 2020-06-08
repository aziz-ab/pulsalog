<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('username'))
		{
			redirect('login');
		}
	}

    function index() {
        redirect('input');
    }

	function input() {
		$data['title'] = 'Input Transaksi';
		$data['page'] = 'transaksi';
		$data['judul'] = 'Input Transaksi';
		$data['nominal'] = $this->M_master->nominal()->result();
		$data['harga'] = $this->M_master->harga()->result();
        $data['jumlah_today'] = $this->M_transaksi->jumlah_today()->result();
        $data['jumlah_today_lunas'] = $this->M_transaksi->jumlah_today_lunas()->result();
        $data['jumlah_today_utang'] = $this->M_transaksi->jumlah_today_utang()->result();
		$this->load->view('layout', $data);
	}

    function semua() {
        $data['title'] = 'Semua Transaksi';
        $data['page'] = 'transaksi_semua';
        $data['judul'] = 'Semua Transaksi';
        $data['jumlah_all'] = $this->M_transaksi->jumlah_all()->result();
        $data['jumlah_all_lunas'] = $this->M_transaksi->jumlah_all_lunas()->result();
        $data['jumlah_all_utang'] = $this->M_transaksi->jumlah_all_utang()->result();
        $this->load->view('layout', $data);
    }

    function lunas() {
        $data['title'] = 'Transaksi Lunas';
        $data['page'] = 'transaksi_lunas';
        $data['judul'] = 'Transaksi Lunas';
        $data['jumlah_all_lunas'] = $this->M_transaksi->jumlah_all_lunas()->result();
        $this->load->view('layout', $data);
    }

    function utang() {
        $data['title'] = 'Transaksi Utang';
        $data['page'] = 'transaksi_utang';
        $data['judul'] = 'Transaksi Utang';
        $data['jumlah_all_utang'] = $this->M_transaksi->jumlah_all_utang()->result();
        $this->load->view('layout', $data);
    }

	function submit_transaksi() {
		$no_hp = $this->input->post('no_hp');
		$id_nominal = $this->input->post('id_nominal');
		$id_harga = $this->input->post('id_harga');
		$tanggal = $this->input->post('tanggal');
		$status = $this->input->post('status');
        $pages = $this->input->post('page');
        if($status == 'LUNAS') {
            $waktu_lunas = date('Y-m-d H:i:s');
        } else {
            $waktu_lunas = '';
        }
        $jam2 = $this->input->post('waktu');
        if($jam2 == '') {
            $jam = date('H:i:s');
        } else {
            $jam = $jam2;
        }
		$waktu = $tanggal.' '.$jam;
        $button = $this->input->post('submit');
        $id_transaksi = $this->input->post('id_transaksi');

		$data = array(
			'no_hp' => $no_hp,
			'id_nominal' => $id_nominal,
			'id_harga' => $id_harga,
			'status' => $status,
			'waktu_transaksi' => $waktu,
            'waktu_lunas' => $waktu_lunas
			);

        if($button == 'add') {
            $simpan = $this->M_transaksi->simpan_transaksi($data);
        } else {
            $simpan = $this->M_transaksi->update_transaksi($data, $id_transaksi);
        }

		if(!$simpan) {
			$this->session->set_flashdata('pesan', 'Berhasil disimpan.');
			if($pages == 'index') {
                redirect('transaksi/input');
            } elseif($pages == 'lunas') {
                redirect('transaksi/lunas');
            } elseif ($pages == 'utang') {
                redirect('transaksi/utang');
            }
		} else {
			$this->session->set_flashdata('pesan', 'Gagal disimpan.');
            if($pages == 'index') {
                redirect('transaksi/input');
            } elseif($pages == 'lunas') {
                redirect('transaksi/lunas');
            } elseif ($pages == 'utang') {
                redirect('transaksi/utang');
            }
		}
	}

    function hapus_transaksi($id_transaksi) {
        $hapus = $this->M_transaksi->del_transaksi($id_transaksi);
        redirect('transaksi/input');
    }

    function hapus_transaksi_semua($id_transaksi) {
        $hapus = $this->M_transaksi->del_transaksi($id_transaksi);
        redirect('transaksi/semua');
    }

    function hapus_transaksi_lunas($id_transaksi) {
        $hapus = $this->M_transaksi->del_transaksi($id_transaksi);
        redirect('transaksi/lunas');
    }

    function hapus_transaksi_utang($id_transaksi) {
        $hapus = $this->M_transaksi->del_transaksi($id_transaksi);
        redirect('transaksi/utang');
    }

    function edit_transaksi($id_transaksi) {
        $data['title'] = 'Edit Transaksi';
        $data['page'] = 'transaksi_edit';
        $data['judul'] = 'Edit Transaksi';
        $data['jumlah_today'] = $this->M_transaksi->jumlah_today()->result();
        $data['data'] = $this->M_transaksi->getone($id_transaksi)->result();
        $this->load->view('layout', $data);
    }

	function data_today() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $table = 'v_transaksi_today';
            $primaryKey = 'id_transaksi';
            $columns = array(
                array('db' => 'id_transaksi', 'dt' => 'id_transaksi'),
                array('db' => 'no_hp', 'dt' => 'no_hp'),
                array(
                	'db' => 'status', 
                	'dt' => 'status',
                	'formatter' => function( $c ) {
                		if($c == 'LUNAS') {
                			return '<span class="label label-success">'.$c.'</span>';
                		} else {
                			return '<span class="label label-warning">'.$c.'</span>';
                		}
                	}
                ),
                array('db' => 'waktu_transaksi', 'dt' => 'waktu_transaksi'),
                array('db' => 'nominal', 'dt' => 'nominal'),
                array(
                	'db' => 'harga', 
                	'dt' => 'harga',
                	'formatter' => function( $a ) {
                		return 'Rp '.number_format($a, 0, ",", ".");
                	}
                ),
                array(
                    'db' => 'id_transaksi',
                    'dt' => 'aksi',
                    'formatter' => function( $d ) {
                    	return '<a href="'.base_url('transaksi/edit_transaksi/'.$d).'" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil"></span> Ubah</a> <a href="'.base_url('transaksi/hapus_transaksi/'.$d).'" class="btn btn-danger btn-xs" onclick="return confirm(\'Hapus data?\')">&times; Hapus</a>';
                    }
                ),
            );
 
            $sql_details = array(
                'user' => 'root',
                'pass' => '',
                'db' => 'logpulsa',
                'host' => 'localhost'
            );
 
            echo json_encode(
                    Datatables_ssp::simple($_GET, $sql_details, $table, $primaryKey, $columns)
            );
        }
    }

    function data_semua() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $table = 'v_transaksi_all';
            $primaryKey = 'id_transaksi';
            $columns = array(
                array('db' => 'id_transaksi', 'dt' => 'id_transaksi'),
                array('db' => 'no_hp', 'dt' => 'no_hp'),
                array(
                    'db' => 'status', 
                    'dt' => 'status',
                    'formatter' => function( $c ) {
                        if($c == 'LUNAS') {
                            return '<span class="label label-success">'.$c.'</span>';
                        } else {
                            return '<span class="label label-warning">'.$c.'</span>';
                        }
                    }
                ),
                array('db' => 'waktu_transaksi', 'dt' => 'waktu_transaksi'),
                array('db' => 'nominal', 'dt' => 'nominal'),
                array(
                    'db' => 'harga', 
                    'dt' => 'harga',
                    'formatter' => function( $a ) {
                        return 'Rp '.number_format($a, 0, ",", ".");
                    }
                ),
                array(
                    'db' => 'id_transaksi',
                    'dt' => 'aksi',
                    'formatter' => function( $d ) {
                        return '<a href="'.base_url('transaksi/edit_transaksi/'.$d).'" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil"></span> Ubah</a> <a href="'.base_url('transaksi/hapus_transaksi_semua/'.$d).'" class="btn btn-danger btn-xs" onclick="return confirm(\'Hapus data?\')">&times; Hapus</a>';
                    }
                ), 
            );
 
            $sql_details = array(
                'user' => 'root',
                'pass' => '',
                'db' => 'logpulsa',
                'host' => 'localhost'
            );
 
            echo json_encode(
                    Datatables_ssp::simple($_GET, $sql_details, $table, $primaryKey, $columns)
            );
        }
    }

    function data_lunas() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $table = 'v_transaksi_lunas';
            $primaryKey = 'id_transaksi';
            $columns = array(
                array('db' => 'id_transaksi', 'dt' => 'id_transaksi'),
                array('db' => 'no_hp', 'dt' => 'no_hp'),
                array(
                    'db' => 'status', 
                    'dt' => 'status',
                    'formatter' => function( $c ) {
                        if($c == 'LUNAS') {
                            return '<span class="label label-success">'.$c.'</span>';
                        } else {
                            return '<span class="label label-warning">'.$c.'</span>';
                        }
                    }
                ),
                array('db' => 'waktu_transaksi', 'dt' => 'waktu_transaksi'),
                array('db' => 'nominal', 'dt' => 'nominal'),
                array(
                    'db' => 'harga', 
                    'dt' => 'harga',
                    'formatter' => function( $a ) {
                        return 'Rp '.number_format($a, 0, ",", ".");
                    }
                ),
                array(
                    'db' => 'id_transaksi',
                    'dt' => 'aksi',
                    'formatter' => function( $d ) {
                        return '<a href="'.base_url('transaksi/edit_transaksi/'.$d).'" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil"></span> Ubah</a> <a href="'.base_url('transaksi/hapus_transaksi_lunas/'.$d).'" class="btn btn-danger btn-xs" onclick="return confirm(\'Hapus data?\')">&times; Hapus</a>';
                    }
                ), 
            );
 
            $sql_details = array(
                'user' => 'root',
                'pass' => '',
                'db' => 'logpulsa',
                'host' => 'localhost'
            );
 
            echo json_encode(
                    Datatables_ssp::simple($_GET, $sql_details, $table, $primaryKey, $columns)
            );
        }
    }

    function data_utang() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $table = 'v_transaksi_utang';
            $primaryKey = 'id_transaksi';
            $columns = array(
                array('db' => 'id_transaksi', 'dt' => 'id_transaksi'),
                array('db' => 'no_hp', 'dt' => 'no_hp'),
                array(
                    'db' => 'status', 
                    'dt' => 'status',
                    'formatter' => function( $c ) {
                        if($c == 'LUNAS') {
                            return '<span class="label label-success">'.$c.'</span>';
                        } else {
                            return '<span class="label label-warning">'.$c.'</span>';
                        }
                    }
                ),
                array('db' => 'waktu_transaksi', 'dt' => 'waktu_transaksi'),
                array('db' => 'nominal', 'dt' => 'nominal'),
                array(
                    'db' => 'harga', 
                    'dt' => 'harga',
                    'formatter' => function( $a ) {
                        return 'Rp '.number_format($a, 0, ",", ".");
                    }
                ),
                array(
                    'db' => 'id_transaksi',
                    'dt' => 'aksi',
                    'formatter' => function( $d ) {
                        return '<a href="'.base_url('transaksi/edit_transaksi/'.$d).'" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil"></span> Ubah</a> <a href="'.base_url('transaksi/hapus_transaksi_utang/'.$d).'" class="btn btn-danger btn-xs" onclick="return confirm(\'Hapus data?\')">&times; Hapus</a>';
                    }
                ), 
            );
 
            $sql_details = array(
                'user' => 'root',
                'pass' => '',
                'db' => 'logpulsa',
                'host' => 'localhost'
            );
 
            echo json_encode(
                    Datatables_ssp::simple($_GET, $sql_details, $table, $primaryKey, $columns)
            );
        }
    }
}