<style>
	.numero{
		position: absolute;
		top: -5px;
		right: 0px;
		background-color: red;
		color: white;
		border-radius: 50%;
		padding: 5px 5px;
		font-size: 8px;
		font-weight: bold;
		line-height: 1;
		min-width: 20px;
		text-align: center;
	}
</style>
<header class="u-clearfix u-custom-color-2 u-header u-sticky u-sticky-109e u-header" id="sec-75d4"><div class="u-clearfix u-sheet u-sheet-1">

		<nav class="u-dropdown-icon u-menu u-menu-dropdown u-offcanvas u-menu-1">
			<div class="menu-collapse" style="font-size: 0.777778rem; letter-spacing: 0px; font-weight: 500;">
				<a class="u-button-style u-custom-border-radius u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-hamburger-link u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
					<svg class="u-svg-link" viewBox="0 0 24 24"><use xlink:href="#menu-hamburger"></use></svg>
					<svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
						</g></svg>
				</a>
			</div>
			<div class="u-custom-menu u-nav-container">
				<ul class="u-nav u-unstyled u-nav-1">
					<li class="u-nav-item">
						<?= $this->Html->link('<i class="fa-solid fa-circle-arrow-right"></i> Inicio',array('action'=>'home','controller'=>'pages'),array('class'=>'u-button-style u-nav-link u-text-active-white u-text-hover-palette-3-base','escape'=>false))?>
					</li>
					<li class="u-nav-item">
						<?= $this->Html->link('<i class="fa-solid fa-circle-user"></i> Nosotros',"./#block-1",array('class'=>'u-button-style u-nav-link u-text-active-white u-text-hover-palette-3-base','escape'=>false))?>
					</li>
					<li class="u-nav-item">
						<?= $this->Html->link('<i class="fa fa-certificate"></i> Certifica tu empresa',array('action'=>'certifica','controller'=>'pages'),array('class'=>'u-button-style u-nav-link u-text-active-white u-text-hover-palette-3-base','escape'=>false))?>
					</li>
					<li class="u-nav-item">
						<?= $this->Html->link('<i class="fa fa-clipboard-list"></i> Listas',array('action'=>'listas','controller'=>'pages'),array('class'=>'u-button-style u-nav-link u-text-active-white u-text-hover-palette-3-base','escape'=>false))?>
					</li>
					<li class="u-nav-item">
						<?= $this->Html->link('<i class="fa fa-envelope"></i> Contacto',array('action'=>'contacto','controller'=>'productos'),array('class'=>'u-button-style u-nav-link u-text-active-white u-text-hover-palette-3-base','escape'=>false))?>
					</li>
					<li class="u-nav-item">
						<?php $alertas_span = !empty($alertas) ? "<span class='numero'>".sizeof($alertas)."</span>" : ""?>
						<?= $this->Html->link('<i class="fa fa-bell"></i> Alertas '.$alertas_span,'javascript:showModal("popup-76fe")',array('class'=>'u-button-style u-nav-link u-text-active-white u-text-hover-palette-3-base','escape'=>false))?>
					</li>

					<li class="u-nav-item">
						<?= $this->Html->link('<i class="fa fa-search"></i> Buscar','#',array('class'=>'u-button-style u-nav-link u-text-active-white u-text-hover-palette-3-base','escape'=>false))?>
						<div class="u-nav-popup"><ul class="u-h-spacing-20 u-nav u-radius u-unstyled u-v-spacing-10 u-nav-2">

								<li class="u-nav-item">
									<?= $this->Html->link('Productos',array('action'=>'buscador','controller'=>'pages'),array('class'=>'u-active-custom-color-6 u-button-style u-custom-color-6 u-hover-custom-color-6 u-nav-link u-text-active-custom-color-8 u-text-body-color','escape'=>false))?>
								</li>

								<li class="u-nav-item">
									<?= $this->Html->link('Establecimientos',array('action'=>'establecimientos','controller'=>'productos'),array('class'=>'u-active-custom-color-6 u-button-style u-custom-color-6 u-hover-custom-color-6 u-nav-link u-text-active-custom-color-8 u-text-body-color','escape'=>false))?>
								</li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
			<div class="u-custom-menu u-nav-container-collapse">
				<div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
					<div class="u-inner-container-layout u-sidenav-overflow">
						<div class="u-menu-close"></div>
						<ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-3">
							<li class="u-nav-item">
								<?= $this->Html->link('<i class="fa-solid fa-circle-arrow-right"></i> Inicio',array('action'=>'home','controller'=>'pages'),array('class'=>'u-button-style u-nav-link','escape'=>false))?>
							</li>
							<li class="u-nav-item">
								<?= $this->Html->link('<i class="fa-solid fa-circle-user"></i> Nosotros',"./#block-1",array('class'=>'u-button-style u-nav-link','escape'=>false))?>
							</li>
							<li class="u-nav-item">
								<?= $this->Html->link('<i class="fa fa-certificate"></i> Certifica tu empresa',array('action'=>'certifica','controller'=>'pages'),array('class'=>'u-button-style u-nav-link','escape'=>false))?>
							</li>
							<li class="u-nav-item">
								<?= $this->Html->link('<i class="fa fa-clipboard-list"></i> Listas',array('action'=>'listas','controller'=>'pages'),array('class'=>'u-button-style u-nav-link','escape'=>false))?>
							</li>
							<li class="u-nav-item">
								<?= $this->Html->link('<i class="fa fa-envelope"></i> Contacto',array('action'=>'contacto','controller'=>'pages'),array('class'=>'u-button-style u-nav-link','escape'=>false))?>
							</li>
							<li class="u-nav-item">
								<?= $this->Html->link('<i class="fa fa-bell"></i> Alertas <span class="numero">'.$alertas_span.'</span>','javascript:showModal("popup-76fe")',array('class'=>'u-button-style u-nav-link','escape'=>false))?>
							</li>
							<li class="u-nav-item">
								<?= $this->Html->link('<i class="fa fa-search"></i> Buscar','#',array('class'=>'u-button-style u-nav-link','escape'=>false))?>
								<div class="u-nav-popup">
									<ul class="u-h-spacing-20 u-nav u-radius u-unstyled u-v-spacing-10 u-nav-4">
										<li class="u-nav-item">
											<?= $this->Html->link('Productos',array('action'=>'buscador','controller'=>'pages'),array('class'=>'u-active-custom-color-6 u-button-style u-custom-color-6 u-hover-custom-color-6 u-nav-link u-text-active-custom-color-8 u-text-body-color','escape'=>false))?>
										</li>
										<li class="u-nav-item">
											<?= $this->Html->link('Establecimientos',array('action'=>'establecimientos','controller'=>'productos'),array('class'=>'u-active-custom-color-6 u-button-style u-custom-color-6 u-hover-custom-color-6 u-nav-link u-text-active-custom-color-8 u-text-body-color','escape'=>false))?>
										</li>
									</ul>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
			</div>
		</nav>

		<img class="u-expanded-height u-image u-image-contain u-image-default u-image-1" src="<?= $this->Html->url('/img/Recurso-12x.png')?>" alt="" data-image-width="1301" data-image-height="928">
	</div>
</header>
