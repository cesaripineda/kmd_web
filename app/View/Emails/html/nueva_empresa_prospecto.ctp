<h3>Registro de Nueva Empresa (Prospecto)</h3>
<p>Se han recibido los siguientes datos a través del portal:</p>

<table border="1" cellpadding="8" style="border-collapse: collapse; font-family: Arial, sans-serif;">
	<tr style="background: #f4f4f4;"><td><strong>Razón Social:</strong></td><td><?php echo h($datos['razon_social']); ?></td></tr>
	<tr><td><strong>¿Tuvo certificado antes?</strong></td><td><?php echo $datos['certificado_kosher'] == 1 ? 'Sí' : 'No'; ?></td></tr>
	<tr><td><strong>Ubicación:</strong></td><td><?php echo h($datos['calle']) . ' #' . h($datos['exterior']) . ', Col. ' . h($datos['colonia']) . ', ' . h($datos['municipio']) . ', ' . h($datos['estado']); ?></td></tr>
	<tr><td><strong>CP:</strong></td><td><?php echo h($datos['cp']); ?></td></tr>
	<tr><td><strong>Teléfono Empresa:</strong></td><td><?php echo h($datos['telefono']); ?></td></tr>
	<tr><td><strong>Sitio Web:</strong></td><td><?php echo h($datos['pagina_web']); ?></td></tr>

	<tr style="background: #f4f4f4;"><th colspan="2">Datos del Contacto</th></tr>
	<tr><td><strong>Nombre Completo:</strong></td><td><?php echo h($datos['nombre'] . ' ' . $datos['apellido_paterno'] . ' ' . $datos['apellido_materno']); ?></td></tr>
	<tr><td><strong>Email:</strong></td><td><?php echo h($datos['email']); ?></td></tr>
	<tr><td><strong>Teléfono:</strong></td><td><?php echo h($datos['telefono_contacto']); ?></td></tr>

	<tr style="background: #f4f4f4;"><th colspan="2">Información Adicional</th></tr>
	<tr><td><strong>Fuente de Referencia:</strong></td><td><?php echo h($datos['fuente_referencia']); ?></td></tr>
	<tr><td><strong>Categorías Seleccionadas:</strong></td>
		<td>
			<?php
			if(!empty($datos['categorias'])) {
				echo implode(', ', $datos['categorias']);
			} else {
				echo "Ninguna especificada";
			}
			?>
		</td>
	</tr>
</table>
