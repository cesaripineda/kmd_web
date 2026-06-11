<div id="left">
	<div class="menu_scroll">
		<div class="left_media" style="background-image: url('<?= $this->Html->url('/img/2.jpg')?>')">
			<div class="media user-media">
				<div class="user-media-toggleHover">
					<span class="fa fa-user"></span>
				</div>
				<div class="user-wrapper">
					<a class="user-link" href="#">
						<img class="media-object img-thumbnail user-img rounded-circle admin_img3" alt="User Picture"
							 src="https://sistema.kosher.com.mx/<?= $this->Session->read('Auth.User.Establecimiento.logo')?>">
						<p class="user-info menu_hide">Bienvenido <?= $this->Session->read('Auth.User.Establecimiento.nombre') ?></p>
					</a>
				</div>
			</div>
			<hr/>
		</div>
		<ul id="menu">
			<li>
				<?= $this->Html->link('<i class="fa fa-tag"></i><span class="link-title menu_hide"> Etiquetas </span>',array('controller'=>'servicios','action'=>'etiquetas'),array('escape'=>false))?>
			</li>
			<li>
				<?= $this->Html->link('<i class="fa fa-calendar-check-o"></i><span class="link-title menu_hide"> Eventos </span>',array('controller'=>'servicios','action'=>'eventos'),array('escape'=>false))?>
			</li>
			<li>
				<?= $this->Html->link('<i class="fa fa-sign-out"></i><span class="link-title menu_hide"> Logout </span>',array('controller'=>'users','action'=>'logout'),array('escape'=>false))?>
			</li>

		</ul>
		<!-- /#menu -->
	</div>
</div>
