		<div class="list-group">
			<?php
			$uri1 = $this->uri->segment('1');
			$uri2 = $this->uri->segment('2');
			$get_menu = $this->db->query('select * from m_menu where aktif="1" order by urutan asc')->result();
			foreach($get_menu as $gm){
				if($gm->controller == 'beranda') {
					$click = 'href="'.base_url('beranda').'"';
				} else {
					$click = 'href="#"';
				}

				if($uri1 == $gm->controller) {
					$display = 'display:block';
				} else {
					$display = 'display:none';
				}
			?>
			<a id="<?php echo $gm->controller;?>" <?php echo $click;?> class="list-group-item" style="cursor:pointer">
			<span class="glyphicon glyphicon-<?php echo $gm->icon;?>"></span>
			&nbsp;&nbsp;&nbsp;<?php echo $gm->menu;?>
			</a>
			<div id="panel-<?php echo $gm->controller;?>" style="<?php echo $display;?>">
			<?php 
				$get_submenu = $this->db->query('select * from m_submenu where id_menu="'.$gm->id_menu.'" and aktif="1" order by urutan asc')->result();
				foreach($get_submenu as $gsm){
					if($uri2 == $gsm->function){
						$active2 = 'active';
					} else {
						$active2 = '';
					}
				?>
				<a href="<?php echo base_url($gm->controller.'/'.$gsm->function);?>" class="list-group-item <?php echo $active2;?>">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="glyphicon glyphicon-<?php echo $gsm->icon;?>"></span>
				&nbsp;&nbsp;<?php echo $gsm->submenu;?>
				</a>
				<?php
				}
				?>
			</div>
			<?php } ?>
		</div>