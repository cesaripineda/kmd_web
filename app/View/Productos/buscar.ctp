<?php
$certificados_all = array(1 => 'Parve', 2 => 'Carne', 3 => 'Lácteo', 4 => 'Parve', 5 => 'Carne', 6 => 'Lácteo', 7 => 'Jalab Israel', 8 => 'Parve');
echo $this->Html->css(
	array('Productos'),
	array('inline' => false)
);
?>
<style>
	.current {
		background-color: #27245b;
		color: #e8ab5e;
		padding: 5px 10px 5px 10px;
		border-radius: 10px 10px 10px 10px;
	}

	.pagination {
		text-align: center;
	}

	.u-form-hor {
		display: flex;
		flex-flow: row;
		align-items: center;
		flex-grow: 1;
	}

	.u-form-hor .u-form-group.u-label-top:not(.u-form-submit) {
		width: 100%;
	}

	.u-form-hor.u-form-spacing-10_alt .u-form-group {
		margin-right: 10px;
	}

	.form-container {
		width: 1320px;
		height: 105px;
		margin: 25px auto 0;
	}
</style>
<section class="u-clearfix u-section-1" id="block-3">
	<div class="u-container-style u-expanded-width u-grey-10 u-group u-group-1">
		<div class="u-container-layout u-valign-middle u-container-layout-1">
			<h1 class="u-text u-text-default u-text-1"><?= $categoria ?></h1>
		</div>
	</div>
	<h2 class="u-text u-text-default u-text-2">Productos encontrados (<?= $total_productos ?>)</h2>
	<div class="form-container">
		<?= $this->Form->create('Producto', array('class' => 'u-form-hor u-form-spacing-10_alt', 'type' => 'get')) ?>
		<?= $this->Form->input('nombre', array('value' => $this->request->query("nombre"), 'type' => 'text', 'placeholder' => 'Nombre de Producto', 'class' => 'u-input u-input-rectangle', 'label' => false, 'div' => 'u-form-group u-label-top u-form-group-1')) ?>
		<div class="u-form-group u-form-select u-label-top u-form-group-2">
			<?= $this->Form->input('marca', array('value' => $this->request->query("marca"), 'type' => 'select', 'options' => $marcas, 'empty' => 'Todas las Marcas', 'class' => 'u-input u-input-rectangle', 'label' => false, 'div' => 'u-form-select-wrapper')) ?>
		</div>
		<div class="u-form-group u-form-select u-label-top u-form-group-3">
			<?= $this->Form->input('estatus', array('value' => $this->request->query("estatus"), 'type' => 'select', 'options' => $certificados, 'empty' => 'Todas las clasificaciones', 'class' => 'u-input u-input-rectangle', 'label' => false, 'div' => 'u-form-select-wrapper')) ?>
		</div>
		<div class="">
			<?= (isset($categoria_id)) ? $this->Form->hidden('categoria_id', array('value' => $categoria_id)) : "" ?>
			<?= $this->Form->submit('Filtrar', array('class' => 'u-btn u-btn-submit u-button-style')) ?>
		</div>
		<?= $this->Form->end() ?>
	</div>
	<div class="u-list u-list-1">
		<div class="u-repeater u-repeater-1">
			<?php foreach ($productos as $producto): ?>
				<div
					class="u-container-style u-custom-color-9 u-list-item u-radius u-repeater-item u-shape-round u-list-item-1">
					<div class="u-container-layout u-similar-container u-container-layout-2">
						<h3 class="u-text u-text-3">
							<?= ($producto['Producto']['nombre_web'] == "" ? $producto['Producto']['nombre_producto'] : $producto['Producto']['nombre_web']) ?>
						</h3>
						<p class="u-text u-text-4">Marca:
							<?= ($producto['Producto']['marca_web'] == "" ? $producto['Producto']['marca'] : $producto['Producto']['marca_web']) ?><br>Estatus:
							<?= $certificados_all[$producto['Producto']['clasificacion']] ?>
							<br>
							<?php
							if (isset($producto['Certificado'][0]['CertificadoProducto']['restriccion']) && $producto['Certificado'][0]['CertificadoProducto']['restriccion'] != "") {
								echo $this->Html->link('Ver Restricciones', "javascript:showRestriccionIndividual('" . $producto['Certificado'][0]['CertificadoProducto']['restriccion'] . "','" . $producto['Producto']['nombre_web'] . "')");
							} else if (isset($producto['Producto']['restriccion'])) {
								echo $this->Html->link('Ver Restricciones', "javascript:showRestriccion('" . $producto['Producto']['marca_web'] . "')");
							}
							?>
						</p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="pagination">
		<ul>
			<?= $this->Paginator->prev('« Anterior') ?>
			<?= $this->Paginator->numbers() ?>
			<?= $this->Paginator->next('Siguiente »') ?>
		</ul>
	</div>
</section>

<script>

	function showRestriccionIndividual(restriccion, producto) {
		const popup = document.getElementById("restricciones");
		popup.style.display = 'block';

		document.getElementById('marca_label').innerHTML = producto;
		$('#restricciones_content').html(restriccion);

	}

	function showRestriccion(marca) {
		const popup = document.getElementById("restricciones");
		popup.style.display = 'block';

		document.getElementById('marca_label').innerHTML = marca;

		$.ajax({
			url: '<?= $this->Html->url(array('controller' => 'productos', 'action' => 'getRestricciones')) ?>/' + marca,
			type: 'GET',
			success: function (data) {
				// Suponiendo que el texto se devuelve directamente
				$('#restricciones_content').html(JSON.parse(data));
			},
			error: function (xhr, status, error) {
				console.error('Error al obtener las restricciones:', error);
			}
		});

	}

	function hideModal(marca) {
		const popup = document.getElementById("restricciones");
		popup.style.display = 'none';
	}

</script>


<section
	class="u-black u-clearfix u-container-style u-dialog-block u-opacity u-opacity-70 u-valign-middle u-dialog-section-8"
	id="restricciones">
	<div class="u-container-style u-custom-color-2 u-dialog u-dialog-1">
		<div class="u-container-layout u-container-layout-1">
			<div class="u-expanded-width u-list u-list-1">
				<div class="u-repeater u-repeater-1">
					<div
						class="u-border-1 u-border-custom-color-2 u-border-no-left u-border-no-right u-border-no-top u-container-style u-list-item u-repeater-item u-white">
						<div class="u-container-layout u-similar-container u-container-layout-2">
							<h3 class="u-text u-text-default u-text-1">
								Restricciones de Marca
							</h3>
							<p class="u-align-right u-text u-text-2"></p>
							<p class="u-text u-text-4" style="margin-top:40px"><b>MARCA: </b><span
									id="marca_label"></span></p>
							<p class="u-text u-text-4"><b>RESTRICCIONES: </b>
							<ul>
								<div id="restricciones_content">

								</div>
							</ul>
							</p>
						</div>
					</div>

				</div>
			</div>
		</div>
		<a href="javascript:hideModal('restricciones')">X</a>
	</div>
</section>

<style>
	.u-dialog-section-8 .u-dialog-1 {
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
	}
</style>