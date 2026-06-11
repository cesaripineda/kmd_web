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
		<h2 class="u-align-center u-subtitle u-text u-text-body-alt-color u-text-default u-text-1">Supervisión de Evento</h2>
	</div>
</section>
<section class="u-align-center u-clearfix u-container-align-center u-section-3" id="block-9">
	<div class="u-clearfix u-sheet u-sheet-1">
		<div class="form-container">
			<?= $this->Form->create('Evento', ['class'=>'responsive-form','id' => 'form-empresas-prospectos']) ?>
			<div class="form-row">
				<div class="col mt-2">
					<h5>Bienvenido al formulario para solicitar una supervisión Kosher para tu evento</h5>
				</div>
			</div>
			<div class="form-row">
				<div class="titulo">INFORMACIÓN DEL EVENTO</div>
			</div>
			<div class="form-row">
				<?php echo $this->Form->input(
						'nombre',
						array(
							'label' => 'Nombre del Evento',
							'div'=>'form-column col-sm-6',
							'required'=>true
						)
					);
				?>
				<?php echo $this->Form->input(
					'fecha',
					array(
						'label' => 'Fecha del Evento',
						'div'=>'form-column col-sm-6',
						'required'=>true
					)
				);
				?>
			</div>
			<div class="form-row">
				<?php echo $this->Form->input(
						'direccion',
						array(
							'label' => 'Calle y número del evento',
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
						'required'=>true,
						'onchange'=>'javascript:getCp(this)'
					)
				);
				?>
			</div>
			<div class="form-row">
				<?php echo $this->Form->input(
					'colonia',
					array(
						'label' => 'Colonia',
						'div'=>'form-column',
						'required'=>true,
						'readonly'=>true
					)
				);
				?>
				<?php echo $this->Form->input(
					'municipio',
					array(
						'label' => 'Localidad',
						'div'=>'form-column',
						'required'=>true,
						'readonly'=>true
					)
				);
				?>
				<?php echo $this->Form->input(
					'ciudad',
					array(
						'label' => 'Ciudad',
						'div'=>'form-column',
						'required'=>true,
						'readonly'=>true
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
						'type' => 'text',
						'readonly'=>true
					)
				);
				?>
			</div>
			<div class="form-row">
				<?php echo $this->Form->input(
					'tipo_evento',
					array(
						'label' => 'Tipo de Evento',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>
				<?php echo $this->Form->input(
					'hora_incio',
					array(
						'label' => 'Hora de inicio',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>
				<?php echo $this->Form->input(
					'hora_final',
					array(
						'label' => 'Hora de finalización',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>
			</div>
			<div class="form-row">
				<div class="titulo">INFORMACIÓN DEL SOLICITANTE</div>
			</div>
			<div class="form-row">
				<?php echo $this->Form->input(
					'nombre_solicitante',
					array(
						'label' => 'Nombre Solicitante',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>
				<?php echo $this->Form->input(
					'telefono_solicitante',
					array(
						'label' => 'Teléfono Solicitante',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>
				<?php echo $this->Form->input(
					'correo_solicitante',
					array(
						'label' => 'Correo Solicitante',
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
					'descripcion',
					array(
						'name' => 'referido',
						'label' => 'Descripción de evento',
						'div'=>'form-column',
						'required'=>true
					)
				);
				?>

			</div>
			<?= $this->Form->submit('Solicitar evento',array('class'=>'submit'))?>
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

	function getCp(input){
		var cp = input.value;
		console.log("Entra a método "+cp);
		var dataString = 'cp='+ cp
		$.ajax({
			type: "POST",
			url: '<?php echo Router::url(array("controller" => "productos", "action" => "getCP")); ?>' ,
			data: dataString,
			cache: false,
			success: function(html) {
				console.log(html);
				document.getElementById('EventoColonia').value = html.colonia;
				document.getElementById('EventoMunicipio').value = html.municipio;
				document.getElementById('EventoCiudad').value = html.ciudad;
				document.getElementById('EventoEstado').value = html.estado;
			}
		});

	}

	"use strict";
	$(document).ready(function () {

		$(document).on("submit", "#form-empresas-prospectos", function (event) {
			event.preventDefault(); // Detener el submit

			// Luego ejecuta la solicitud AJAX
			$.ajax({
				url        : '<?= $this->Html->url(array("action"=>"addEvento","controller"=>"eventos"))?>',
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
