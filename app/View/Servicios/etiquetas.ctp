<?= $this->Html->css(
	array(
		'/vendors/select2/css/select2.min',
		'/vendors/datatables/css/scroller.bootstrap.min',
		'/vendors/datatables/css/colReorder.bootstrap.min',
		'/vendors/datatables/css/dataTables.bootstrap.min',
		'backoffice/pages/dataTables.bootstrap',
		'backoffice/plugincss/responsive.dataTables.min',
		'backoffice/pages/tables',
		'/vendors/datepicker/css/bootstrap-datepicker.min',

		'/vendors/bootstrap-switch/css/bootstrap-switch.min',
		'/vendors/switchery/css/switchery.min',
		'/vendors/radio_css/css/radiobox.min',
		'/vendors/checkbox_css/css/checkbox.min',
		'backoffice/pages/radio_checkbox'
	),
	array('inline' => false)
);

$regimenes = array(
	'601 General de Ley Personas Morales' => '601 General de Ley Personas Morales',
	'603 Personas Morales con Fines no Lucrativos' => '603 Personas Morales con Fines no Lucrativos',
	'605 Sueldos y Salarios e Ingresos Asimilados a Salarios' => '605 Sueldos y Salarios e Ingresos Asimilados a Salarios',
	'606 Arrendamiento' => '606 Arrendamiento',
	'607 Régimen de Enajenación o Adquisición de Bienes' => '607 Régimen de Enajenación o Adquisición de Bienes',
	'608 Demás ingresos' => '608 Demás ingresos',
	'609 Consolidación' => '609 Consolidación',
	'610 Residentes en el Extranjero sin Establecimiento Permanente en México' => '610 Residentes en el Extranjero sin Establecimiento Permanente en México',
	'611 Ingresos por Dividendos (socios y accionistas)' => '611 Ingresos por Dividendos (socios y accionistas)',
	'612 Personas Físicas con Actividades Empresariales y Profesionales' => '612 Personas Físicas con Actividades Empresariales y Profesionales',
	'614 Ingresos por intereses' => '614 Ingresos por intereses',
	'615 Régimen de los Ingresos por Obtención de Premios' => '615 Régimen de los Ingresos por Obtención de Premios',
	'616 Sin obligaciones fiscales' => '616 Sin obligaciones fiscales',
	'620 Sociedades Cooperativas de Producción que optan por diferir sus ingresos' => '620 Sociedades Cooperativas de Producción que optan por diferir sus ingresos',
	'621 Incorporación Fiscal' => '621 Incorporación Fiscal',
	'622 Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras' => '622 Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras',
	'623 Opcional para Grupos de Sociedades' => '623 Opcional para Grupos de Sociedades',
	'624 Coordinados' => '624 Coordinados',
	'625 Régimen de las Actividades Empresariales con ingresos a través de Plataformas Tecnológicas' => '625 Régimen de las Actividades Empresariales con ingresos a través de Plataformas Tecnológicas',
	'626 Régimen Simplificado de Confianza (RESICO)' => '626 Régimen Simplificado de Confianza (RESICO)',
	'628 Hidrocarburos' => '628 Hidrocarburos',
	'629 De los Regímenes de Fideicomisos No Empresariales' => '629 De los Regímenes de Fideicomisos No Empresariales',
	'630 Sociedad por Acciones Simplificada' => '630 Sociedad por Acciones Simplificada'
);

$usos = array(
	'G01 Adquisición de mercancías' => 'G01 Adquisición de mercancías',
	'G02 Devoluciones, descuentos o bonificaciones' => 'G02 Devoluciones, descuentos o bonificaciones',
	'G03 Gastos en general' => 'G03 Gastos en general',
	'I01 Construcciones' => 'I01 Construcciones',
	'I02 Mobilario y equipo de oficina por inversiones' => 'I02 Mobilario y equipo de oficina por inversiones',
	'I03 Equipo de transporte' => 'I03 Equipo de transporte',
	'I04 Equipo de cómputo y accesorios' => 'I04 Equipo de cómputo y accesorios',
	'I05 Dados, troqueles, moldes, matrices y herramental' => 'I05 Dados, troqueles, moldes, matrices y herramental',
	'I06 Comunicacion satelital' => 'I06 Comunicacion satelital',
	'I07 Maquinaria y equipo' => 'I07 Maquinaria y equipo',
	'I08 Otros activos' => 'I08 Otros activos',
	'D01 Honorarios médicos, dentales y gastos hospitalarios' => 'D01 Honorarios médicos, dentales y gastos hospitalarios',
	'D02 Gastos médicos por incapacidad o discapacidad' => 'D02 Gastos médicos por incapacidad o discapacidad',
	'D03 Gastos funerales' => 'D03 Gastos funerales',
	'D04 Donativos' => 'D04 Donativos',
	'D05 Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación)' => 'D05 Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación)',
	'D06 Aportaciones voluntarias al SAR' => 'D06 Aportaciones voluntarias al SAR',
	'D07 Primas por seguros de gastos médicos' => 'D07 Primas por seguros de gastos médicos',
	'D08 Gastos de transportación escolar obligatoria' => 'D08 Gastos de transportación escolar obligatoria',
	'D09 Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones' => 'D09 Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones',
	'D10 Pagos por servicios educativos (colegiaturas)' => 'D10 Pagos por servicios educativos (colegiaturas)',
	'S01 Sin efectos fiscales' => 'S01 Sin efectos fiscales',
	'CP01 Pagos' => 'CP01 Pagos',
	'CN01 Nómina' => 'CN01 Nómina',
	'P01 Por definir' => 'P01 Por definir'
);

$clasificacion = array(
	'Parve Mehadrin' => 'Parve Mehadrin',
	'Jalav Israel' => 'Jalav Israel',
	'Carne Mehadrin' => 'Carne Mehadrin',
	'Lácteo' => 'Lácteo',
	'Carne Parve' => 'Carne Parve',
	'01 Cintas' => '01 Cintas',
	'02 Cintas' => '02 Cintas',
);

?>
<style>
	.remove-btn,
	.add-btn {
		background-color: transparent;
		border: none;
		cursor: pointer;
		font-size: 1.2em;
		padding: 0;
		margin: 0;
	}

	.remove-btn:hover,
	.add-btn:hover {
		opacity: 0.7;
	}

	.add-row-cell {
		text-align: center;
	}
</style>
<div class="modal fade" id="addSolicitud" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" style="max-width:900px !important">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" style="color:black">
					CREAR SOLICITUD DE ETIQUETAS
				</h4>
			</div>
			<?= $this->Form->create('Servicio', array('type' => 'file', 'url' => array('action' => 'add'), 'class' => 'form-horizontal')) ?>
			<div class="modal-body">
				<div class="form-group row">
					<?= $this->Form->input('fecha_solicitud', array('type' => 'text', 'readonly' => true, 'value' => date("d/M/Y"), 'class' => 'form-control', 'div' => 'col-md-6', 'required' => true, 'label' => 'Fecha de Solicitud', )); ?>
					<?= $this->Form->input('establecimiento', array('type' => 'text', 'readonly' => true, 'value' => $this->Session->read('Auth.User.Establecimiento.nombre'), 'class' => 'form-control', 'div' => 'col-md-6', 'required' => true, 'label' => 'Establecimiento', )); ?>
					<?= $this->Form->input('direccion', array('type' => 'text', 'readonly' => true, 'value' => $this->Session->read('Auth.User.Establecimiento.direccion'), 'class' => 'form-control', 'div' => 'col-md-12', 'required' => true, 'label' => 'Direccion', )); ?>
					<?= $this->Form->input('requiere_factura', array('type' => 'select', 'onchange' => 'javascript:showDatosFacturacion(this)', 'options' => array(0 => 'No', 1 => 'Si'), 'class' => 'form-control', 'div' => 'col-md-6', 'required' => true, 'label' => 'Requiere Factura', )); ?>
					<?= $this->Form->input('comprobante', array('type' => 'file', 'class' => 'form-control', 'div' => 'col-md-6', 'label' => 'Comprobante de Pago')); ?>
				</div>
				<div class="form-group row" id="datos_factura" style="display: none">
					<div class="col-sm-12 m-t-15">
						<h5>Datos Factura</h5>
					</div>
					<?= $this->Form->input('rfc', array('type' => 'text', 'class' => 'form-control', 'div' => 'col-md-6', 'label' => 'RFC', )); ?>
					<?= $this->Form->input('razon_social', array('type' => 'text', 'class' => 'form-control', 'div' => 'col-md-6', 'label' => 'Razón Social', )); ?>
					<?= $this->Form->input('cp', array('type' => 'text', 'class' => 'form-control', 'div' => 'col-md-6', 'label' => 'Código Postal Facturación', )); ?>
					<?= $this->Form->input('regimen_fiscal', array('type' => 'select', 'options' => $regimenes, 'class' => 'form-control', 'div' => 'col-md-6', 'label' => 'Regimen Fiscal', 'empty' => 'Seleccionar Regimen Fiscal')); ?>
					<?= $this->Form->input('uso', array('type' => 'select', 'options' => $usos, 'class' => 'form-control', 'div' => 'col-md-6', 'label' => 'Uso de CFDI', 'empty' => 'Seleccionar Uso de CFDI')); ?>

				</div>
				<div class="form-group row">
					<div class="col-sm-12 m-t-15">
						<h5>Seleccionar Etiquetas</h5>
					</div>
					<table id="quotationTable" style="width: 100%">
						<thead>
							<tr>
								<th>Etiqueta</th>
								<th>Tipo</th>
								<th>Pesaj</th>
								<th>Precio Unitario</th>
								<th>Cantidad</th>
								<th>Total</th>
								<th class="add-row-cell">
									<button id="addRowBtn" type="button" class="add-btn">➕</button>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr class="quotation-row" data-index="0">
								<td><?= $this->Form->input('concepto', array('empty' => 'Seleccionar Concepto', 'name' => 'data[Cotizacion][0][concepto]', 'type' => 'select', 'options' => $clasificacion, 'class' => 'form-control', 'div' => false, 'label' => false)) ?>
								</td>
								<td>
									<select name="data[Cotizacion][0][tipo_etiqueta]"
										class="form-control etiqueta-select" onchange="updatePrice(this)" required>
										<option value="">Seleccionar tipo de etiqueta</option>
										<?php foreach ($tipos_etiquetas as $tipo): ?>
											<option value="<?= $tipo['name'] ?>" data-precio="<?= $tipo['precio'] ?>">
												<?= $tipo['name'] ?></option>
										<?php endforeach; ?>
									</select>
								</td>
								<td><?= $this->Form->input('tipo_complemento', array('name' => 'data[Cotizacion][0][tipo_complemento]', 'type' => 'select', 'options' => array('No Pesaj' => 'No Pesaj', 'Pesaj Con Kitniyot' => 'Pesaj Con Kitniyot', 'Pesaj Sin Kitniyot' => 'Pesaj Sin Kitniyot'), 'class' => 'form-control', 'div' => false, 'label' => false)) ?>
								</td>
								<td><?= $this->Form->input('precio_unitario', array('readonly' => true, 'name' => 'data[Cotizacion][0][precio_unitario]', 'onchange' => 'calculateRowTotal(this)', 'type' => 'number', 'class' => 'form-control price-input', 'div' => false, 'label' => false)) ?>
								</td>
								<td><?= $this->Form->input('cantidad', array('name' => 'data[Cotizacion][0][cantidad]', 'onchange' => 'calculateRowTotal(this)', 'type' => 'number', 'class' => 'form-control quantity-input', 'div' => false, 'label' => false)) ?>
								</td>
								<td><?= $this->Form->input('total', array('name' => 'data[Cotizacion][0][total]', 'readonly' => true, 'type' => 'number', 'class' => 'form-control total-input', 'div' => false, 'label' => false)) ?>
								</td>
								<td>
									<button type="button" class="remove-btn">❌</button>
								</td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4" style="text-align: right; font-weight: bold;">Total:</td>
								<td><input type="number" id="subtotal" class="form-control" readonly value="0"></td>
								<td></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger float-xs-right" data-dismiss="modal">
					Cerrar
					<i class="fa fa-times"></i>
				</button>
				<?= $this->Form->submit('Enviar Solicitud de Etiquetas', array('class' => 'btn btn-success pull-left', 'id' => 'botonSubmitJugador')) ?>
			</div>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>

<div class="modal fade" id="viewEtiquetas" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" style="max-width:900px !important">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel1" style="color:black">
					Folio: <span id="folio_view"></span>
				</h4>
			</div>
			<div class="modal-body">
				<div class="form-group row">
					<div class="col-12">
						<h4>Detalles de Solicitud</h4>
						<table style="width:100%">
							<tr>
								<td><b>Fecha de Solicitud: </b><span id="fecha_view"></span></td>
								<td><b>Establecimiento: </b><span id="establecimiento_view"></span></td>
								<td><b>Estatus: </b><span id="estatus_view"></span></td>
							</tr>
							<tr>
								<td><b>Solicitado por: </b><span id="solicitado_view"></span></td>
								<td><b>Requiere Factura: </b><span id="factura_view"></span></td>
							</tr>
						</table>
						<table id="quotationTableView_1" style="width: 100%" class="table-striped">
							<thead>
								<tr>
									<th>Concepto</th>
									<th>Tipo de Etiqueta</th>
									<th>Cantidad</th>
									<th>Monto</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
							<tfoot>
								<tr>
									<td colspan="4" style="text-align: right; font-weight: bold;">Total:</td>
									<td id="total_solicitud_1"></td>
									<td></td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger float-xs-right" data-dismiss="modal">
					Cerrar
					<i class="fa fa-times"></i>
				</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="uploadPago" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" style="max-width:900px !important">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel1" style="color:black">
					<i class="fa fa-upload"></i>
					Subir Comprobante de pago
				</h4>
			</div>
			<?= $this->Form->create('Servicio', array('type' => 'file', 'url' => array('action' => 'uploadComprobante', 'controller' => 'servicios'), 'class' => 'form-horizontal')) ?>
			<div class="modal-body">
				<div class="form-group row">
					<div class="col-12">
						<h4>Subir comprobante de pago Folio: <span id="folio"></span></h4>
					</div>
					<?= $this->Form->hidden('id') ?>
					<?= $this->Form->input('comprobante', array('type' => 'file', 'class' => 'form-control', 'div' => 'col-md-12', 'label' => 'Comprobante de Pago', )); ?>
				</div>
				<div class="form-group row">
					<div class="col-12">
						<h4>Detalles de Solicitud</h4>
						<table id="quotationTableView" style="width: 100%" class="table-striped">
							<thead>
								<tr>
									<th>Concepto</th>
									<th>Tipo de Etiqueta</th>
									<th>Cantidad</th>
									<th>Monto</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
							<tfoot>
								<tr>
									<td colspan="4" style="text-align: right; font-weight: bold;">Total:</td>
									<td id="total_solicitud"></td>
									<td></td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger float-xs-right" data-dismiss="modal">
					Cerrar
					<i class="fa fa-times"></i>
				</button>
				<?= $this->Form->submit('Registrar Comprobante', array('class' => 'btn btn-success pull-left')) ?>
			</div>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>

<div class="outer" style="width: 86vw;">
	<div class="inner bg-container">
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-header bg-white">
						Todas las Solicitudes
						<div style="float: right">
							<?php echo $this->Html->link('<i class="fa fa-plus" data-pack="default" data-tags=""></i> Agregar Solicitud', '#', array('data-target' => '#addSolicitud', 'data-toggle' => 'modal', 'escape' => false, 'class' => 'btn btn-success')); ?>
						</div>
					</div>
					<div class="card-body" style="margin-top: 50px">
						<div class="">
							<div class="pull-sm-right">
								<div class="tools pull-sm-right"></div>
							</div>
						</div>
						<table id="sample_1" class="table-striped table-bordered table-hover table m-t-15"
							style="width:100%">
							<thead>
								<tr>
									<th>Folio</th>
									<th>Fecha de Solicitud</th>
									<th>Usuario Solicitante</th>
									<th>Solicita Factura</th>
									<th>Comprobante de Pago</th>
									<th>Total</th>
									<th>Estatus</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$formato = '%06d';
								foreach ($etiquetas as $solicitud):
									$total = 0;
									foreach ($solicitud['Items'] as $item):
										$total += $item['total'];
									endforeach;
									?>
									<tr>
										<td data-sort="<?= $solicitud['Servicio']['id'] ?>">
											<?= $this->Html->link(date("ymd", strtotime($solicitud['Servicio']['fecha_solicitud'])) . sprintf($formato, (int) $solicitud['Servicio']['id']), 'javascript:viewEtiquetas(' . $solicitud['Servicio']['id'] . ',"' . date("ymd", strtotime($solicitud['Servicio']['fecha_solicitud'])) . sprintf($formato, (int) $solicitud['Servicio']['id']) . '")') ?>
										</td>
										<td><?= date("d/M/Y H:i:s", strtotime($solicitud['Servicio']['fecha_solicitud'])) ?>
										</td>
										<td><?= $solicitud['Creado']['nombre'] . " " . $solicitud['Creado']['apellido_paterno'] . " " . $solicitud['Creado']['apellido_materno'] ?>
										</td>
										<td style="text-align: center">
											<?= $solicitud['Servicio']['requiere_factura'] ? "Si" : "No" ?></td>
										<td style="text-align: center">
											<?= $solicitud['Servicio']['comprobante'] != "" ? $this->Html->link('<i class="fa fa-eye"></i>', $solicitud['Servicio']['comprobante'], array('escape' => false)) : $this->Html->link('<i class="fa fa-upload"></i>', 'javascript:uploadFile(' . $solicitud['Servicio']['id'] . ',"' . date("ymd", strtotime($solicitud['Servicio']['fecha_solicitud'])) . sprintf($formato, (int) $solicitud['Servicio']['id']) . '")', array('escape' => false)) ?>
										</td>
										<td><?= "$" . number_format($total, 2) ?></td>
										<td><?= $solicitud['Servicio']['estatus'] ?></td>

									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>

	function formatMyDate(dateString) {
		// 1. Array de meses abreviados en español
		const meses = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

		// 2. Crea un objeto Date a partir del string
		const fecha = new Date(dateString);

		// 3. Obtiene los componentes de la fecha y hora
		const dia = fecha.getDate();
		const mes = meses[fecha.getMonth()]; // Obtiene el mes del array
		const anio = fecha.getFullYear();
		const horas = fecha.getHours();
		const minutos = fecha.getMinutes();
		const segundos = fecha.getSeconds();

		// 4. Formatea los números para que tengan 2 dígitos si son menores a 10
		const formatoDosDigitos = (num) => String(num).padStart(2, '0');

		// 5. Reconstruye el string en el formato deseado
		const fechaFormateada = `${formatoDosDigitos(dia)}/${mes}/${anio} ${formatoDosDigitos(horas)}:${formatoDosDigitos(minutos)}:${formatoDosDigitos(segundos)}`;

		return fechaFormateada;
	}

	function viewEtiquetas(id_servicio, folio) {
		$('#viewEtiquetas').modal('show');
		document.getElementById('folio_view').innerHTML = folio;
		var dataString = 'id=' + id_servicio;
		$.ajax({
			type: "POST",
			url: '<?php echo Router::url(array("controller" => "servicios", "action" => "getServicio"), TRUE); ?>',
			data: dataString,
			cache: false,
			success: function (html) {
				document.getElementById('fecha_view').innerHTML = formatMyDate(html.Servicio.fecha_solicitud);
				document.getElementById('estatus_view').innerHTML = html.Servicio.estatus;
				document.getElementById('factura_view').innerHTML = html.Servicio.requiere_factura == 1 ? "Si" : "No";
				document.getElementById('solicitado_view').innerHTML = html.Creado.nombre + " " + html.Creado.apellido_paterno + " " + html.Creado.apellido_materno;
				document.getElementById('establecimiento_view').innerHTML = html.Establecimiento.nombre;

				const tableBody = document.querySelector('#quotationTableView_1 tbody');
				// Limpiar el contenido actual de la tabla para evitar duplicados
				tableBody.innerHTML = '';
				// Acceder al arreglo de items dentro del JSON
				const items = html.Items;
				var gran_total = 0;
				// Verificar si el arreglo de items existe y no está vacío
				if (items && items.length > 0) {
					items.forEach(item => {
						// Crear una nueva fila (tr)
						const newRow = document.createElement('tr');
						// Crear las celdas (td) para cada dato
						const conceptoCell = document.createElement('td');
						conceptoCell.textContent = item.concepto;

						const tipoEtiquetaCell = document.createElement('td');
						tipoEtiquetaCell.textContent = item.tipo_etiqueta;

						const cantidadCell = document.createElement('td');
						cantidadCell.textContent = item.cantidad;

						const montoCell = document.createElement('td');
						var montoString = item.monto;
						var montoNumero = parseFloat(montoString);
						montoCell.textContent = montoNumero.toLocaleString('es-MX', {
							minimumFractionDigits: 2,
							maximumFractionDigits: 2
						});

						const totalCell = document.createElement('td');
						var totalString = item.total;
						var totalNumero = parseFloat(totalString);
						totalCell.textContent = "$" + totalNumero.toLocaleString('es-MX', {
							minimumFractionDigits: 2,
							maximumFractionDigits: 2
						});
						gran_total += totalNumero;

						// Agregar las celdas a la fila
						newRow.appendChild(conceptoCell);
						newRow.appendChild(tipoEtiquetaCell);
						newRow.appendChild(cantidadCell);
						newRow.appendChild(montoCell);
						newRow.appendChild(totalCell);

						// Agregar la fila al cuerpo de la tabla
						tableBody.appendChild(newRow);
					});
				} else {
					// En caso de que no haya items, mostrar un mensaje
					const emptyRow = document.createElement('tr');
					const emptyCell = document.createElement('td');
					emptyCell.setAttribute('colspan', '5');
					emptyCell.style.textAlign = 'center';
					emptyCell.textContent = 'No hay items para mostrar.';
					emptyRow.appendChild(emptyCell);
					tableBody.appendChild(emptyRow);
				}
				document.getElementById('total_solicitud_1').innerHTML = "$" + gran_total.toLocaleString('es-MX', {
					minimumFractionDigits: 2,
					maximumFractionDigits: 2
				});
			}
		});
	}

	function uploadFile(id_servicio, folio) {
		$('#uploadPago').modal('show');
		document.getElementById('folio').innerHTML = folio;
		var dataString = 'id=' + id_servicio;
		$.ajax({
			type: "POST",
			url: '<?php echo Router::url(array("controller" => "servicios", "action" => "getServicio"), TRUE); ?>',
			data: dataString,
			cache: false,
			success: function (html) {
				document.getElementById('ServicioId').value = html.Servicio.id;

				const tableBody = document.querySelector('#quotationTableView tbody');
				// Limpiar el contenido actual de la tabla para evitar duplicados
				tableBody.innerHTML = '';
				// Acceder al arreglo de items dentro del JSON
				const items = html.Items;
				var gran_total = 0;
				// Verificar si el arreglo de items existe y no está vacío
				if (items && items.length > 0) {
					items.forEach(item => {
						// Crear una nueva fila (tr)
						const newRow = document.createElement('tr');
						// Crear las celdas (td) para cada dato
						const conceptoCell = document.createElement('td');
						conceptoCell.textContent = item.concepto;

						const tipoEtiquetaCell = document.createElement('td');
						tipoEtiquetaCell.textContent = item.tipo_etiqueta;

						const cantidadCell = document.createElement('td');
						cantidadCell.textContent = item.cantidad;

						const montoCell = document.createElement('td');
						montoCell.textContent = item.monto;

						const totalCell = document.createElement('td');
						totalCell.textContent = item.total;
						gran_total += Number(item.total);

						// Agregar las celdas a la fila
						newRow.appendChild(conceptoCell);
						newRow.appendChild(tipoEtiquetaCell);
						newRow.appendChild(cantidadCell);
						newRow.appendChild(montoCell);
						newRow.appendChild(totalCell);

						// Agregar la fila al cuerpo de la tabla
						tableBody.appendChild(newRow);
					});
				} else {
					// En caso de que no haya items, mostrar un mensaje
					const emptyRow = document.createElement('tr');
					const emptyCell = document.createElement('td');
					emptyCell.setAttribute('colspan', '5');
					emptyCell.style.textAlign = 'center';
					emptyCell.textContent = 'No hay items para mostrar.';
					emptyRow.appendChild(emptyCell);
					tableBody.appendChild(emptyRow);
				}
				document.getElementById('total_solicitud').innerHTML = gran_total;
			}
		});
	}

	document.addEventListener('DOMContentLoaded', function () {
		const quotationTable = document.getElementById('quotationTable');
		const addRowBtn = document.getElementById('addRowBtn');
		let rowIndex = document.querySelectorAll('.quotation-row').length - 1;

		// Función para actualizar el precio
		window.updatePrice = function (selectElement) {
			const selectedOption = selectElement.options[selectElement.selectedIndex];
			const price = selectedOption.getAttribute('data-precio');
			const row = selectElement.closest('tr');
			const priceInput = row.querySelector('.price-input');
			priceInput.value = price;

			// Recalcula el total de la fila después de actualizar el precio
			calculateRowTotal(priceInput);
		};

		// ... El resto de tus funciones JavaScript (`updateRowNames`, `calculateRowTotal`, etc.)
		//     se mantienen igual. Simplemente añade la función `updatePrice` a tu script.

		// Función para actualizar los nombres de los campos de la nueva fila
		function updateRowNames(newRow) {
			newRow.querySelectorAll('[name]').forEach(input => {
				const oldName = input.getAttribute('name');
				const newName = oldName.replace(/\[\d+\]/, `[${rowIndex}]`);
				input.setAttribute('name', newName);
			});
			newRow.setAttribute('data-index', rowIndex);
		}

		// Función para calcular el total de una fila y el total general
		window.calculateRowTotal = function (element) {
			const row = element.closest('tr');
			const price = parseFloat(row.querySelector('.price-input').value) || 0;
			const quantity = parseFloat(row.querySelector('.quantity-input').value) || 0;
			const totalCell = row.querySelector('.total-input');
			const rowTotal = price * quantity;
			totalCell.value = rowTotal.toFixed(2);
			updateGlobalTotals();
		};

		// Función para actualizar los totales del footer
		function updateGlobalTotals() {
			let subtotal = 0;
			document.querySelectorAll('.total-input').forEach(input => {
				subtotal += parseFloat(input.value) || 0;
			});
			const iva = subtotal * 0.16;
			const finalTotal = subtotal + iva;

			document.getElementById('subtotal').value = subtotal.toFixed(2);
			document.getElementById('iva').value = iva.toFixed(2);
			document.getElementById('finalTotal').value = finalTotal.toFixed(2);
		}

		// Delegación de eventos para los botones de remover
		quotationTable.addEventListener('click', function (event) {
			if (event.target.classList.contains('remove-btn')) {
				const row = event.target.closest('tr');
				if (document.querySelectorAll('.quotation-row').length > 1) { // Evita eliminar la última fila
					row.remove();
					updateGlobalTotals();
				}
			}
		});

		// Evento para el botón de agregar fila
		addRowBtn.addEventListener('click', function () {
			const tbody = quotationTable.querySelector('tbody');
			const firstRow = tbody.querySelector('.quotation-row');
			if (firstRow) {
				rowIndex++;
				const newRow = firstRow.cloneNode(true);
				updateRowNames(newRow); // Actualiza los nombres de los campos
				newRow.querySelectorAll('input, select').forEach(input => {
					if (input.type === 'number') {
						input.value = '0';
					}
					if (input.tagName === 'SELECT') {
						input.selectedIndex = 0;
					}
				});
				tbody.appendChild(newRow);
			}
		});

		// Inicializar los totales al cargar la página
		updateGlobalTotals();

		// Asegurarse de que el precio se actualice al cargar la página
		document.querySelectorAll('.etiqueta-select').forEach(select => {
			updatePrice(select);
		});
	});

	function showDatosFacturacion(input) {
		if (input.value == "Si") {
			document.getElementById('datos_factura').style.display = '';
		} else {
			document.getElementById('datos_factura').style.display = 'none';

		}
	}
</script>

<?php
echo $this->Html->script(
	array(
		'/vendors/select2/js/select2',
		'/vendors/datatables/js/jquery.dataTables.min',
		'backoffice/pluginjs/dataTables.tableTools',
		'/vendors/datatables/js/dataTables.colReorder',
		'/vendors/datatables/js/dataTables.bootstrap.min',
		'/vendors/datatables/js/dataTables.buttons.min',
		'backoffice/pluginjs/jquery.dataTables.min',
		'/vendors/datatables/js/dataTables.responsive.min',
		'/vendors/datatables/js/dataTables.rowReorder.min',
		'/vendors/datatables/js/buttons.colVis.min',
		'/vendors/datatables/js/buttons.html5.min',
		'/vendors/datatables/js/buttons.bootstrap.min',
		'/vendors/datatables/js/buttons.print.min',
		'/vendors/datatables/js/dataTables.scroller.min',
		'/vendors/moment/js/moment.min',
		'/vendors/datepicker/js/bootstrap-datepicker.min',

		'/vendors/bootstrap-switch/js/bootstrap-switch.min',
		'/vendors/switchery/js/switchery.min',
		'backoffice/pages/radio_checkbox'
	),
	array('inline' => false)
);
?>

<script>
	'use strict';
	$(document).ready(function () {
		TableAdvanced.init();
		$(".dataTables_scrollHeadInner .table").addClass("table-responsive");
		$("#sample_5_wrapper table").removeClass("table-responsive");
		$(".dataTables_wrapper .dt-buttons .btn").addClass('btn-secondary').removeClass('btn-default');
		$(".dataTables_wrapper").removeClass("form-inline");
		$('.fecha').datepicker({
			format: 'yyyy-mm-dd',
			todayHighlight: true,
			autoclose: true,
			orientation: "bottom"
		});

		$(document).on('click', '.add-row', function (e) {
			e.preventDefault();

			//Agregar número a contador
			let contador = document.getElementById('JugadorContador').value;
			document.getElementById('JugadorContador').value = Number(contador) + 1;
			// Obtener la fila actual para clonarla
			let currentRow = $(this).closest('.cuenta-row');
			let newRow = currentRow.clone();

			// Obtener el índice de la nueva fila
			let newIndex = $('#cuentas-container .cuenta-row').length;

			// Actualizar los nombres de los campos en la nueva fila
			newRow.find('input').each(function () {
				let oldName = $(this).attr('name');
				let newName = oldName.replace(/\[\d+\]/, '[' + newIndex + ']');
				$(this).attr('name', newName);
				// Limpiar los valores de los nuevos campos
				$(this).val('');
			});

			// Reemplazar el botón 'agregar' de la fila anterior por un botón 'quitar'
			let previousAddBtn = currentRow.find('.add-row');
			if (previousAddBtn.length) {
				previousAddBtn.removeClass('add-row btn-success').addClass('remove-row btn-danger')
					.html('<i class="fa fa-minus"></i>');
			}

			// Agregar la nueva fila al contenedor
			$('#cuentas-container').append(newRow);
		});
IN (509,514)
		// Función para quitar una fila
		$(document).on('click', '.remove-row', function (e) {
			e.preventDefault();

			let contador = document.getElementById('JugadorContador').value;
			document.getElementById('JugadorContador').value = Number(contador) - 1;

			// Obtener la fila a eliminar
			let rowToRemove = $(this).closest('.cuenta-row');

			// Eliminar la fila
			rowToRemove.remove();

			// Re-indexar los campos restantes
			$('#cuentas-container .cuenta-row').each(function (index) {
				$(this).find('input').each(function () {
					let oldName = $(this).attr('name');
					let newName = oldName.replace(/\[\d+\]/, '[' + index + ']');
					$(this).attr('name', newName);
				});
			});
		});

	});
	var TableAdvanced = function () {
		// ===============table 1====================
		var initTable1 = function () {
			var table = $('#sample_1');
			/* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */
			/* Set tabletools buttons and button container */
			table.DataTable({
				dom: "Bflr<'table-responsive't><'row'<'col-md-5 col-12'i><'col-md-7 col-12'p>>",
				buttons: [
					'copy', 'csv', 'print'
				],
				order: [[0, 'DESC']]
			});
			var tableWrapper = $('#sample_1_wrapper'); // datatable creates the table wrapper by adding with id {your_table_id}_wrapper
			tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
		}
		// ===============table 1===============

		return {
			//main function to initiate the module
			init: function () {
				if (!jQuery().dataTable) {
					return;
				}
				initTable1();
			}
		};
	}();

</script>