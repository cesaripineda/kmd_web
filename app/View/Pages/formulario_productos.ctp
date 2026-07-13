<?php
$this->assign('title', 'KMD MÉXICO CERTIFICACIÓN KOSHER');
echo $this->Html->css(
	array('Formato-Solicitud','/vendors/chosen/css/chosen',),
	array('inline' => false)
);

$estados_mexico = array(
	"Aguascalientes" => "Aguascalientes",
	"Baja California" => "Baja California",
	"Baja California Sur" => "Baja California Sur",
	"Campeche" => "Campeche",
	"Chiapas" => "Chiapas",
	"Chihuahua" => "Chihuahua",
	"Ciudad de México" => "Ciudad de México",
	"Coahuila" => "Coahuila",
	"Colima" => "Colima",
	"Durango" => "Durango",
	"Guanajuato" => "Guanajuato",
	"Guerrero" => "Guerrero",
	"Hidalgo" => "Hidalgo",
	"Jalisco" => "Jalisco",
	"Mexico" => "Estado de México",
	"Michoacán" => "Michoacán",
	"Morelos" => "Morelos",
	"Nayarit" => "Nayarit",
	"Nuevo León" => "Nuevo León",
	"Oaxaca" => "Oaxaca",
	"Puebla" => "Puebla",
	"Querétaro" => "Querétaro",
	"Quintana Roo" => "Quintana Roo",
	"San Luis Potosí" => "San Luis Potosí",
	"Sinaloa" => "Sinaloa",
	"Sonora" => "Sonora",
	"Tabasco" => "Tabasco",
	"Tamaulipas" => "Tamaulipas",
	"Tlaxcala" => "Tlaxcala",
	"Veracruz" => "Veracruz",
	"Yucatán" => "Yucatán",
	"Zacatecas" => "Zacatecas"
);

$categorias = array(
	'Farmaceuticos' => 'Farmacéuticos',
	'Snacks' => 'Snacks',
	'Bebidas' => 'Bebidas',
	'Productos horneados' => 'Productos horneados',
	'Alcohol' => 'Alcohol',
	'Condimentos' => 'Condimentos',
	'Servicios de comida' => 'Servicios de comida',
	'Aceites' => 'Aceites',
	'Especies' => 'Especies',
	'Transportes' => 'Transportes',
	'No relacionado a comida' => 'No relacionado a comida',
	'Cereales o granos' => 'Cereales o granos',
	'Químicos' => 'Químicos',
	'Enzimas' => 'Enzimas',
	'Lácteos' => 'Lácteos',
	'Sabores' => 'Sabores',
	'Pescado' => 'Pescado',
	'Carne/pollo' => 'Carne/pollo',
	'Vegetales' => 'Vegetales',
	'Sabores artificiales/colorantes' => 'Sabores artificiales/colorantes',
);
ksort($categorias);
?>
<style>
	.form-container {
		width: 100%; /* Ocupa el 100% del ancho del contenedor */
		max-width: 100%; /* Ancho máximo del formulario */
		padding: 20px; /* Espaciado interno */
	}

	.responsive-form {
		display: flex;
		flex-direction: column; /* Alinea los elementos en una columna */
	}

	.form-row {
		display: flex; /* Usamos flexbox para alinear los elementos en una fila */
		justify-content: space-between; /* Espacio entre las columnas */
		margin-bottom: 20px; /* Espacio entre filas */
	}

	.form-column {
		flex: 1; /* Las columnas ocupan el mismo espacio */
		margin-right: 10px; /* Espacio entre columnas */
	}

	.form-column.full-width {
		flex: 100%; /* Esta columna ocupa el 100% del ancho */
	}

	.form-column:last-child {
		margin-right: 0; /* Elimina el margen derecho del último elemento */
	}

	label {
		display: block; /* Hace que la etiqueta ocupe toda la línea */
		margin-bottom: 5px; /* Espacio entre la etiqueta y el campo */
	}

	input, textarea, select {
		width: 100%; /* Los campos ocupan el 100% del ancho */
		padding: 10px; /* Espaciado interno en los campos */
		box-sizing: border-box; /* Incluye el padding en el ancho total */
		border: 1px solid #ccc; /* Borde de los campos */
		border-radius: 4px; /* Bordes redondeados */
	}

	button {
		font-family: "Montserrat", Sans-serif;
		font-size: 20px;
		font-weight: 700;
		border-radius: 20px 20px 20px 20px;
		padding: 20px 40px 20px 40px;
		background-color: #0056b3;
		color: #ffffff;
	}

	button:hover {
		background-color: #0056b3; /* Color de fondo al pasar el mouse */
	}

	.popup {
		position: fixed;
		top: 20px;
		left: 50%;
		transform: translateX(-50%);
		background-color: green; /* Fondo verde */
		color: white; /* Letras blancas */
		padding: 15px;
		border-radius: 5px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
		z-index: 1000; /* Asegura que el popup esté por encima de otros elementos */
	}

	/* Estilos responsivos */
	@media (max-width: 600px) {
		.form-row {
			flex-direction: column; /* Cambia a columna en pantallas pequeñas */
		}

		.form-column {
			margin-right: 0; /* Elimina el margen derecho en pantallas pequeñas */
			margin-bottom: 10px; /* Espacio entre columnas en pantallas pequeñas */
		}
	}
</style>
<section style="background-color: #E8B35F;" class="u-align-center u-clearfix u-container-align-center u-image u-section-1" id="block-4" data-image-width="1980" data-image-height="448">
	<div class="u-clearfix u-sheet u-sheet-1" >
		<h1 class="u-align-center u-text u-text-body-alt-color u-text-default u-text-1"> Obtén la certificación Kosher KMD</h1>
	</div>
</section>
<section class="u-clearfix u-custom-color-10 u-section-2" id="block-7">
	<div class="u-clearfix u-sheet u-sheet-1">
		<h2 class="u-align-center u-subtitle u-text u-text-body-alt-color u-text-default u-text-1">Certifica tus productos</h2>
	</div>
</section>
<section class="u-align-center u-clearfix u-container-align-center u-section-3" id="block-9">
	<div class="u-clearfix u-sheet u-sheet-1">
		<div class="form-container">
			<?= $this->Form->create(null, array('class'=>'responsive-form','url' => array('controller'=>'empresas','action'=>'getEmpresasProspecto'), 'id' => 'form-empresas-prospectos')) ?>
			<div class="form-row">
				<div class="col mt-2">
					<h5>Bienvenido al formulario de prospección por favor llena tus datos y un asesor se pondrá en contacto, gracias</h5>
				</div>
			</div>
			<div class="form-row">
				<div class="titulo">INFORMACIÓN DE LA EMPRESA</div>
			</div>
			<div class="form-row">
				<?php echo $this->Form->input(
						'razon_social',
						array(
							'name' => 'razon_social',
							'label' => 'Razón Social',
							'div'=>'form-column',
							'required'=>true
						)
					);
				?>

				<?php echo $this->Form->input(
						'certificado_kosher',
						array(
							'name' => 'certificado_kosher',
							'label' => '¿Alguna vez ha tenido la certificación Kosher?',
							'div'=>'form-column',
							'required'=>true,
							'type' => 'select',
							'options' => array(1 => 'Si', 0 => 'No ')
						)
					);
				?>
			</div>
			<div class="form-row">
				<?php echo $this->Form->input(
						'calle',
						array(
							'name' => 'calle',
							'label' => 'Calle',
							'div'=>'form-column',
							'required'=>true
						)
					);
				?>
				<?php echo $this->Form->input(
					'exterior',
					array(
						'name' => 'exterior',
						'label' => 'Número Exterior',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>
				<?php echo $this->Form->input(
					'interior',
					array(
						'name' => 'interior',
						'label' => 'Número Interior',
						'div'=>'form-column',
					)
				);
				?>
				<?php echo $this->Form->input(
					'cp',
					array(
						'name' => 'cp',
						'label' => 'Código Postal',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>
			</div>
			<div class="form-row">
				<?php echo $this->Form->input(
					'colonia',
					array(
						'name' => 'colonia',
						'label' => 'Colonia',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>
				<?php echo $this->Form->input(
					'municipio',
					array(
						'name' => 'municipio',
						'label' => 'Alcaldía / Municipio',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>
				<?php echo $this->Form->input(
					'ciudad',
					array(
						'name' => 'ciudad',
						'label' => 'Ciudad',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>
				<?php echo $this->Form->input(
					'estado',
					array(
						'name' => 'estado',
						'label' => 'Estado',
						'div'=>'form-column',
						'required'=>true,
						'type' => 'select',
						'options' => $estados_mexico
					)
				);
				?>
			</div>
			<div class="form-row">
				<?php echo $this->Form->input(
					'telefono',
					array(
						'name' => 'telefono',
						'label' => 'Teléfono de la empresa',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>
				<?php echo $this->Form->input(
					'pagina_web',
					array(
						'name' => 'pagina_web',
						'label' => 'Sitio web de la empresa',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>
			</div>
			<div class="form-row">
				<div class="titulo">INFORMACIÓN DE CONTACTO</div>
			</div>
			<div class="form-row">
				<?php echo $this->Form->input(
					'nombre',
					array(
						'name' => 'nombre',
						'label' => 'Nombre',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>
				<?php echo $this->Form->input(
					'apellido_paterno',
					array(
						'name' => 'apellido_paterno',
						'label' => 'Apellido Paterno',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>
				<?php echo $this->Form->input(
					'apellido_materno',
					array(
						'name' => 'apellido_materno',
						'label' => 'Apellido Materno',
						'div'=>'form-column',
					)
				);
				?>
			</div>
			<div class="form-row">
				<?php echo $this->Form->input(
					'telefono_contacto',
					array(
						'name' => 'telefono_contacto',
						'label' => 'Teléfono',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>
				<?php echo $this->Form->input(
					'email',
					array(
						'name' => 'email',
						'label' => 'Correo Electrónico',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>
			</div>
			<div class="form-row">
				<?php echo $this->Form->input(
					'fuente_referencia',
					array(
						'name' => 'fuente_referencia',
						'label' => '¿En dónde se enteró de KMD?',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>
				<?php echo $this->Form->input(
					'categorias',
					array(
						'name' => 'categorias[]',
						'label' => '¿A qué categorías pertenecen sus productos?',
						'div'=>'form-column',
						'required'=>true,
						'multiple' => true,
						'options'=>$categorias,
						'id'=>'categorias',
						'empty'=>'Seleccionar categorias'
					)
				);
				?>
			</div>
			<?= $this->Form->input('pais',array('type'=>'hidden','value'=>'México','name'=>'pais'))?>
			<?= $this->Form->submit('Enviar',array('class'=>'submit'))?>
			<?= $this->Form->end()?>
		</div>

	</div>
</section>

<div id="confirmacion" class="popup" style="display: none;">
	Gracias por ponerse en contacto con KMD. Los datos han sido enviados. Será contactado por un ejecutivo en las próximas 48 horas como máximo.
</div>

<?=
$this->Html->script(
	array(
		'/vendors/chosen/js/chosen.jquery',
	),
	array('inline'=>true)
);
?>
<script>
	"use strict";
	$(document).ready(function () {

		$("#categorias").chosen();

		$(document).on("submit", "#form-empresas-prospectos", function (event) {
			event.preventDefault(); // Detener el submit

			// Luego ejecuta la solicitud AJAX
			$.ajax({
				url        : '<?php echo $this->Html->url(array('controller' => 'empresas', 'action' => 'getEmpresasProspecto')); ?>',
				type       : "POST",
				dataType   : "json",
				data       : new FormData(this),
				processData: false,
				contentType: false,
				success: function (response) {
					if( response.status == true ){

						document.getElementById('form-empresas-prospectos').reset();

						var confirmacion = document.getElementById('confirmacion');
						confirmacion.style.display = 'block';
						setTimeout(function() {
							confirmacion.style.display = 'none';
						}, 4000);
					}
				},
				error: function (response) {
					console.log(response.responseText);
				},
			});
		});
	});
</script>
