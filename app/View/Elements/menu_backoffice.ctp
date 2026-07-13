<div id="left">
	<div class="menu_scroll">
		<div class="left_media" style="background-image: url('<?= $this->Html->url('/img/2.jpg')?>')">
			<div class="media user-media">
				<div class="user-media-toggleHover">
					<span class="fa fa-user"></span>
				</div>
				<div class="user-wrapper">
					<a class="user-link" href="#">
                        <?php if($this->Session->read('Auth.User.empresa_id')): ?>
						    <img class="media-object img-thumbnail user-img rounded-circle admin_img3" alt="Empresa"
							 src="<?= $this->Html->url('/img/logo_kmd_placeholder.png')?>">
						    <p class="user-info menu_hide">Bienvenido cliente</p>
                        <?php else: ?>
                            <img class="media-object img-thumbnail user-img rounded-circle admin_img3" alt="User Picture"
							 src="https://sistema.kosher.com.mx/<?= $this->Session->read('Auth.User.Establecimiento.logo')?>">
						    <p class="user-info menu_hide">Bienvenido <?= $this->Session->read('Auth.User.Establecimiento.nombre') ?></p>
                        <?php endif; ?>
					</a>
				</div>
			</div>
			<hr/>
		</div>
		<ul id="menu">
            <?php if($this->Session->read('Auth.User.empresa_id')): ?>
                <li>
                    <?= $this->Html->link('<i class="fa fa-home"></i><span class="link-title menu_hide"> Mi Empresa </span>',array('controller'=>'portal_empresas','action'=>'index'),array('escape'=>false))?>
                </li>
                <li>
                    <?= $this->Html->link('<i class="fa fa-flask"></i><span class="link-title menu_hide"> Materias Primas </span>',array('controller'=>'portal_empresas','action'=>'mps'),array('escape'=>false))?>
                </li>
                <li>
                    <?= $this->Html->link('<i class="fa fa-cubes"></i><span class="link-title menu_hide"> Mis Productos </span>',array('controller'=>'portal_empresas','action'=>'productos'),array('escape'=>false))?>
                </li>
                <li>
                    <?= $this->Html->link('<i class="fa fa-search"></i><span class="link-title menu_hide"> Buscador Productos </span>',array('controller'=>'portal_empresas','action'=>'buscador_productos'),array('escape'=>false))?>
                </li>
                <li>
                    <?= $this->Html->link('<i class="fa fa-certificate"></i><span class="link-title menu_hide"> Certificados </span>',array('controller'=>'portal_empresas','action'=>'certificados'),array('escape'=>false))?>
                </li>
            <?php else: ?>
                <li>
                    <?= $this->Html->link('<i class="fa fa-tag"></i><span class="link-title menu_hide"> Etiquetas </span>',array('controller'=>'servicios','action'=>'etiquetas'),array('escape'=>false))?>
                </li>
                <li>
                    <?= $this->Html->link('<i class="fa fa-calendar-check-o"></i><span class="link-title menu_hide"> Eventos </span>',array('controller'=>'servicios','action'=>'eventos'),array('escape'=>false))?>
                </li>
            <?php endif; ?>
			<li>
				<?= $this->Html->link('<i class="fa fa-lock"></i><span class="link-title menu_hide"> Seguridad </span>',array('controller'=>'users','action'=>'password'),array('escape'=>false))?>
			</li>
			<li>
				<?= $this->Html->link('<i class="fa fa-sign-out"></i><span class="link-title menu_hide"> Logout </span>',array('controller'=>'users','action'=>'logout'),array('escape'=>false))?>
			</li>

		</ul>
		<!-- /#menu -->
	</div>
</div>
