<?php
    $array_hari = array(1=>'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
    $array_bulan = array(1=>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    $hari = $array_hari[date('N')];
    $bulan = $array_bulan[date('n')];
    $tanggal = date('j');
    $tahun = date('Y');
	
	$nama = $this->session->userdata('nama');
  $username = $this->session->userdata('username');
?>

<div class="navbar navbar-fixed-top navbar-inverse" style="z-index:9999">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <div class="navbar-collapse collapse navbar-responsive-collapse">
    <ul class="nav navbar-nav">
      <li>
        <a href="<?php echo base_url('beranda');?>">
        	<b>LogPulsa</b>
        </a>
      </li>
    </ul>
      
    <ul class="nav navbar-nav navbar-right" style="margin-right: 0px;">
      <li>
        <a href="#"><span class="glyphicon glyphicon-calendar"></span>&nbsp;&nbsp;<?php echo $hari.', '.$tanggal.' '.$bulan.' '.$tahun ;?></a>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?php echo $nama;?>&nbsp;&nbsp;<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li>
            <a href="<?php echo base_url('user/ubah_password/');?>/<?php echo $username;?>"><span class="glyphicon glyphicon-wrench"></span>&nbsp;&nbsp;Ubah Password</a>
          </li>
           <li class="divider"></li>
          <li>
            <a href="<?php echo base_url('login/keluar');?>"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Keluar</a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>