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

	button, .submit-btn {
		font-family: "Montserrat", Sans-serif;
		font-size: 20px;
		font-weight: 700;
		border-radius: 20px;
		padding: 20px 40px;
		background-color: #0056b3;
		color: #ffffff;
		border: none;
		cursor: pointer;
		transition: background-color 0.3s ease, transform 0.1s ease;
		margin-top: 10px;
	}

	button:hover, .submit-btn:hover {
		background-color: #004494;
	}

	button:active, .submit-btn:active {
		transform: scale(0.98);
	}
	
	.submit-container {
		text-align: center;
		margin-top: 30px;
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
		<h2 class="u-align-center u-subtitle u-text u-text-body-alt-color u-text-default u-text-1">Certifica tu negocio</h2>
	</div>
</section>
<section class="u-align-center u-clearfix u-container-align-center u-section-3" id="block-9">
	<div class="u-clearfix u-sheet u-sheet-1">
		<div class="form-container">
			<?= $this->Form->create(null, ['class'=>'responsive-form','id' => 'form-empresas-prospectos']) ?>
			<div class="form-row">
				<div class="col mt-2">
					<h5>Bienvenido al formulario de prospección por favor llena tus datos y un asesor se pondrá en contacto, gracias</h5>
				</div>
			</div>
			<div class="form-row">
				<div class="titulo">INFORMACIÓN DEL NEGOCIO</div>
			</div>
			<div class="form-row">
				<?php echo $this->Form->input(
						'nombre',
						array(
							'name' => 'nombre',
							'label' => 'Nombre del negocio',
							'div'=>'form-column',
							'required'=>true
						)
					);
				?>
			</div>
			<div class="form-row">
				<?php echo $this->Form->input(
						'direccion',
						array(
							'name' => 'direccion',
							'label' => 'Dirección del negocio',
							'div'=>'form-column',
							'required'=>true
						)
					);
				?>
				<?php echo $this->Form->input(
					'codigo_postal',
					array(
						'name' => 'codigo_postal',
						'label' => 'Código Postal',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>
			</div>
			<div class="form-row">
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
				<?php
					$estados = array(
						"Aguascalientes"=>"Aguascalientes",
						"Baja California"=>"Baja California",
						"Baja California Sur"=>"Baja California Sur",
						"Campeche"=>"Campeche",
						"Chiapas"=>"Chiapas",
						"Chihuahua"=>"Chihuahua",
						"Coahuila"=>"Coahuila",
						"Colima"=>"Colima",
						"Ciudad de México"=>"Ciudad de México",
						"Durango"=>"Durango",
						"Guanajuato"=>"Guanajuato",
						"Guerrero"=>"Guerrero",
						"Hidalgo"=>"Hidalgo",
						"Jalisco"=>"Jalisco",
						"México"=>"México",
						"Michoacán"=>"Michoacán",
						"Morelos"=>"Morelos",
						"Nayarit"=>"Nayarit",
						"Nuevo León"=>"Nuevo León",
						"Oaxaca"=>"Oaxaca",
						"Puebla"=>"Puebla",
						"Querétaro"=>"Querétaro",
						"Quintana Roo"=>"Quintana Roo",
						"San Luis Potosí"=>"San Luis Potosí",
						"Sinaloa"=>"Sinaloa",
						"Sonora"=>"Sonora",
						"Tabasco"=>"Tabasco",
						"Tamaulipas"=>"Tamaulipas",
						"Tlaxcala"=>"Tlaxcala",
						"Veracruz"=>"Veracruz",
						"Yucatán"=>"Yucatán",
						"Zacatecas"=>"Zacatecas"
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
						'options' => $estados
					)
				);
				?>
			</div>
			<div class="form-row">
				<?php echo $this->Form->input(
					'telefonos',
					array(
						'name' => 'telefonos',
						'label' => 'Teléfono del establecimiento',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>
				<?php echo $this->Form->input(
					'pagina_web',
					array(
						'name' => 'pagina_web',
						'label' => 'Sitio web del establecimiento',
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
					'nombre_responsable',
					array(
						'name' => 'nombre_responsable',
						'label' => 'Nombre',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>
				<?php echo $this->Form->input(
					'email_responsable',
					array(
						'name' => 'email_responsable',
						'label' => 'Correo Electrónico',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>
				<?php echo $this->Form->input(
					'telefono_responsable',
					array(
						'name' => 'telefono_responsable',
						'label' => 'Teléfono',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>
				<?php echo $this->Form->input(
					'celular_responsable',
					array(
						'name' => 'celular_responsable',
						'label' => 'Celular',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>
			</div>
			<div class="form-row">
				<div class="titulo">INFORMACIÓN ADICIONAL</div>
			</div>
			<div class="form-row">
				<?php echo $this->Form->input(
					'referido',
					array(
						'name' => 'referido',
						'label' => '¿En dónde se enteró de KMD?',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>

				<?php echo $this->Form->input(
					'actividad_comercial',
					array(
						'name' => 'actividad_comercial',
						'label' => 'Actividad Comercial',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>

				<?php echo $this->Form->input(
					'motivo_certificacion',
					array(
						'name' => 'motivo_certificacion',
						'label' => '¿Por qué motivo desea la Certificación Kosher?',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>

			</div>
			<div class="submit-container">
				<?= $this->Form->button('Enviar Solicitud', array('type' => 'submit', 'class' => 'submit-btn', 'id' => 'btn-enviar')) ?>
			</div>
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

		$(document).on("submit", "#form-empresas-prospectos", function (event) {
			event.preventDefault(); // Detener el submit

			var $btn = $('#btn-enviar');
			$btn.prop('disabled', true).text('Enviando...');

			// Luego ejecuta la solicitud AJAX
			$.ajax({
				url        : '<?= $this->Html->url(array('controller' => 'establecimientos', 'action' => 'addEstablecimientoProspecto')) ?>',
				type       : "POST",
				dataType   : "json",
				data       : new FormData(this),
				processData: false,
				contentType: false,
				success: function (response) {
					$btn.prop('disabled', false).text('Enviar Solicitud');
					if( response.status == true ){

						document.getElementById('form-empresas-prospectos').reset();

						var confirmacion = document.getElementById('confirmacion');
						confirmacion.style.display = 'block';
						setTimeout(function() {
							confirmacion.style.display = 'none';
						}, 4000);
					} else {
						alert('Error: ' + response.message);
					}
				},
				error: function (response) {
					$btn.prop('disabled', false).text('Enviar Solicitud');
					console.log(response.responseText);
					alert('Ocurrió un error al enviar el formulario. Por favor intente más tarde.');
				},
			});
		});
	});
</script>
