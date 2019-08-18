<aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?php echo $this->session->userdata('nama'); ?></p>
          <p class="app-sidebar__user-designation"><?php echo ucwords(strtolower($this->session->userdata('hak_akses'))); ?></p>
        </div>
      </div>
      <ul class="app-menu">
		<?php foreach ($list_menu->result_array() as $menu) 
		{
		?>
			 <li><a class="app-menu__item" href="<?php echo base_url().$menu['url'];?>"><i class="app-menu__icon <?php echo $menu['icon']; ?>"></i><span class="app-menu__label"><?php echo $menu['nama']; ?></span></a></li>
		<?php	
		}
		?>
      </ul>
</aside>

<main class="app-content">
	<?php echo $this->breadcrumb->generate() ?>
