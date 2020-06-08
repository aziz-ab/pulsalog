<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('username'))
		{
			redirect('login');
		}
	}

	function index() {
		$data['title'] = 'Beranda LogPulsa';
		$data['page'] = 'beranda';
		$data['judul'] = 'Input Transaksi';
		$data['nominal'] = $this->M_master->nominal()->result();
		$data['harga'] = $this->M_master->harga()->result(); 
        $data['jumlah_today'] = $this->M_transaksi->jumlah_today()->result();
        $data['jumlah_today_lunas'] = $this->M_transaksi->jumlah_today_lunas()->result();
        $data['jumlah_today_utang'] = $this->M_transaksi->jumlah_today_utang()->result();
		$this->load->view('layout', $data);
	}

	function data() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            
			//atur nama tablenya disini
            $table = 'v_transaksi_today';
 
            // Table's primary key
            $primaryKey = 'id_transaksi';
 
            // Array of database columns which should be read and sent back to DataTables.
            // The `db` parameter represents the column name in the database, while the `dt`
            // parameter represents the DataTables column identifier. In this case simple
            // indexes
 
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
                /*
                array(
                    'db' => 'id_transaksi',
                    'dt' => 'aksi',
                    'formatter' => function( $d ) {
                    	return '<a href="'.base_url('master/edit_transaksi/'.$d).'" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil"></span> Ubah</a> <a href="'.base_url('master/hapus_transaksi/'.$d).'" class="btn btn-danger btn-xs" onclick="return confirm(\'Hapus data?\')">&times; Hapus</a>';
                    }
                ), 
                */
            );
 
            // SQL server connection information
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