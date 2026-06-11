<script>
	function showModal(modal){
		const popup = document.getElementById(modal);
		popup.style.display = 'block';
	}

	function hideModal(modal){
		const popup = document.getElementById(modal);
		popup.style.display = 'none';
	}

</script>
<section class="u-black u-clearfix u-container-style u-dialog-block u-opacity u-opacity-70 u-valign-middle u-dialog-section-8" id="popup-76fe">
	<div class="u-container-style u-custom-color-2 u-dialog u-dialog-1">
		<div class="u-container-layout u-container-layout-1">
			<div class="u-expanded-width u-list u-list-1">
				<div class="u-repeater u-repeater-1">
					<?php
						$imagenes = array(
							'Producto Autorizado' => $this->Html->url('/img/1008958-eab4da6b.png'),
							'Establecimiento Autorizado' => $this->Html->url('/img/1008958-eab4da6b.png'),
							'Producto Suspendido' => $this->Html->url('/img/2919543-5d2bf426.png'),
							'Establecimiento Suspendido' => $this->Html->url('/img/2919543-5d2bf426.png'),
							'Notificación Especial' => $this->Html->url('/img/1023945-bbb73c3f.png'),
							'Uso Indebido logo KMD' => $this->Html->url('/img/1023945-bbb73c3f.png'),
						);



						foreach ($alertas as $notificacion):
							if ($notificacion['Alerta']['producto_id']!="" && $notificacion['Alerta']['establecimiento_id']==""){
						?>
							<div class="u-border-1 u-border-custom-color-2 u-border-no-left u-border-no-right u-border-no-top u-container-style u-list-item u-repeater-item u-white">
								<div class="u-container-layout u-similar-container u-container-layout-2">
									<h3 class="u-text u-text-default u-text-1">
										<span class="u-file-icon u-icon u-text-custom-color-7"><img src="<?= $imagenes[$notificacion['Alerta']['tipo_alerta']]?>" alt=""></span>&nbsp;<?= $notificacion['Alerta']['tipo_alerta']?>
									</h3>
									<p class="u-align-right u-text u-text-2"><?= date('d/M/Y', strtotime($notificacion['Alerta']['created']))?></p>
									<p class="u-text u-text-4"><b>PRODUCTO: </b><?= is_null($notificacion['Producto']['nombre_web']) ? $notificacion['Producto']['nombre_producto'] : $notificacion['Producto']['nombre_web']?></p>
									<p class="u-text u-text-4"><b>MARCA: </b><?= $notificacion['Producto']['marca_web'] == null ? $notificacion['Producto']['marca'] : $notificacion['Producto']['marca_web']?></p>
									<p class="u-text u-text-4"><b>MENSAJE: </b><?= $notificacion['Alerta']['mensaje']?></p>
								</div>
							</div>
						<?php }else if($notificacion['Alerta']['producto_id']=="" && $notificacion['Alerta']['establecimiento_id']!=""){ ?>
								<div class="u-border-1 u-border-custom-color-2 u-border-no-left u-border-no-right u-border-no-top u-container-style u-list-item u-repeater-item u-white">
									<div class="u-container-layout u-similar-container u-container-layout-2">
										<h3 class="u-text u-text-default u-text-1">
											<span class="u-file-icon u-icon u-text-custom-color-7"><img src="<?= $imagenes[$notificacion['Alerta']['tipo_alerta']]?>" alt=""></span>&nbsp;<?= $notificacion['Alerta']['tipo_alerta']?>
										</h3>
										<p class="u-align-right u-text u-text-2"><?= date('d/M/Y', strtotime($notificacion['Alerta']['created']))?></p>
										<p class="u-text u-text-4"><b>ESTABLECIMIENTO: </b><?= $notificacion['Establecimiento']['nombre']?></p>
									</div>
								</div>
						<?php }else if($notificacion['Alerta']['producto_id']=="" && $notificacion['Alerta']['establecimiento_id']==""){ ?>
							<div class="u-border-1 u-border-custom-color-2 u-border-no-left u-border-no-right u-border-no-top u-container-style u-list-item u-repeater-item u-white">
								<div class="u-container-layout u-similar-container u-container-layout-2">
									<h3 class="u-text u-text-default u-text-1">
										<span class="u-file-icon u-icon u-text-custom-color-7"><img src="<?= $imagenes[$notificacion['Alerta']['tipo_alerta']]?>" alt=""></span>&nbsp;
									</h3>
									<p class="u-align-right u-text u-text-2"><?= date('d/M/Y', strtotime($notificacion['Alerta']['created']))?></p>
									<p class="u-text u-text-4"><b>PRODUCTO NO AUTORIZADO AÚN PORTANDO LOGO KMD: </b><br><?= $notificacion['Alerta']['mensaje']?></p>
									<p class="u-align-center"><?= $this->Html->image("https://stage-kmd.kosher.com.mx/".$notificacion['Alerta']['imagen'],array('style'=>'max-height:300px'))?></p>
								</div>
							</div>
						<?php } endforeach;?>

				</div>
			</div>
		</div>
		<a href="javascript:hideModal('popup-76fe')">X</a>
	</div>
</section>

<style>.u-dialog-section-8 .u-dialog-1 {
		width: 800px;
		min-height: 250px;
		margin: 60px auto;
	}

	.u-dialog-section-8 .u-container-layout-1 {
		padding: 30px;
	}

	.u-dialog-section-8 .u-list-1 {
		margin-bottom: 0;
		margin-top: 0;
	}

	.u-dialog-section-8 .u-repeater-1 {
		grid-auto-columns: 100%;
		grid-template-columns: repeat(1, 100%);
		min-height: 375px;
		grid-gap: 10px;
	}

	.u-dialog-section-8 .u-container-layout-2 {
		padding: 8px 10px;
	}

	.u-dialog-section-8 .u-text-1 {
		margin-bottom: 0;
		margin-top: 2px;
	}

	.u-dialog-section-8 .u-text-2 {
		font-weight: 700;
		margin: -26px 0 0 497px;
	}

	.u-dialog-section-8 .u-text-3 {
		font-weight: 700;
		margin: 3px 497px 0 0;
	}

	.u-dialog-section-8 .u-text-4 {
		margin: 0;
	}

	.u-dialog-section-8 .u-container-layout-3 {
		padding: 8px 10px;
	}

	.u-dialog-section-8 .u-text-5 {
		margin-bottom: 0;
		margin-top: 2px;
	}

	.u-dialog-section-8 .u-text-6 {
		font-weight: 700;
		margin: -26px 0 0 497px;
	}

	.u-dialog-section-8 .u-text-7 {
		font-weight: 700;
		margin: 3px 497px 0 0;
	}

	.u-dialog-section-8 .u-text-8 {
		margin: 0;
	}

	.u-dialog-section-8 .u-container-layout-4 {
		padding: 8px 10px;
	}

	.u-dialog-section-8 .u-text-9 {
		margin-bottom: 0;
		margin-top: 2px;
	}

	.u-dialog-section-8 .u-text-10 {
		font-weight: 700;
		margin: -26px 0 0 497px;
	}

	.u-dialog-section-8 .u-text-11 {
		font-weight: 700;
		margin: 3px 497px 0 0;
	}

	.u-dialog-section-8 .u-text-12 {
		margin: 0;
	}

	.u-dialog-section-8 .u-icon-4 {
		width: 20px;
		height: 20px;
	}

	@media (max-width: 1399px) {
		.u-dialog-section-8 .u-repeater-1 {
			grid-template-columns: 100%;
		}

		.u-dialog-section-8 .u-text-2 {
			margin-top: -26px;
		}

		.u-dialog-section-8 .u-text-6 {
			margin-top: -26px;
		}

		.u-dialog-section-8 .u-text-10 {
			margin-top: -26px;
		}
	}

	@media (max-width: 991px) {
		.u-dialog-section-8 .u-dialog-1 {
			width: 720px;
		}

		.u-dialog-section-8 .u-text-2 {
			margin-left: 417px;
		}

		.u-dialog-section-8 .u-text-3 {
			margin-right: 417px;
		}

		.u-dialog-section-8 .u-text-6 {
			margin-left: 417px;
		}

		.u-dialog-section-8 .u-text-7 {
			margin-right: 417px;
		}

		.u-dialog-section-8 .u-text-10 {
			margin-left: 417px;
		}

		.u-dialog-section-8 .u-text-11 {
			margin-right: 417px;
		}
	}

	@media (max-width: 767px) {
		.u-dialog-section-8 .u-dialog-1 {
			width: 540px;
		}

		.u-dialog-section-8 .u-container-layout-1 {
			padding-left: 10px;
			padding-right: 10px;
		}

		.u-dialog-section-8 .u-text-2 {
			margin-left: 277px;
		}

		.u-dialog-section-8 .u-text-3 {
			margin-right: 277px;
		}

		.u-dialog-section-8 .u-text-6 {
			margin-left: 277px;
		}

		.u-dialog-section-8 .u-text-7 {
			margin-right: 277px;
		}

		.u-dialog-section-8 .u-text-10 {
			margin-left: 277px;
		}

		.u-dialog-section-8 .u-text-11 {
			margin-right: 277px;
		}
	}

	@media (max-width: 575px) {
		.u-dialog-section-8 .u-dialog-1 {
			width: 340px;
		}

		.u-dialog-section-8 .u-text-2 {
			margin-left: 77px;
		}

		.u-dialog-section-8 .u-text-3 {
			margin-right: 77px;
		}

		.u-dialog-section-8 .u-text-6 {
			margin-left: 77px;
		}

		.u-dialog-section-8 .u-text-7 {
			margin-right: 77px;
		}

		.u-dialog-section-8 .u-text-10 {
			margin-left: 77px;
		}

		.u-dialog-section-8 .u-text-11 {
			margin-right: 77px;
		}
	}</style>
