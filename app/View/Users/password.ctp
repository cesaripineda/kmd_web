<div class="outer" style="width: 86vw;">
	<div class="inner bg-container">
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body" style="margin-top: 50px">
						<h3>Introducir nueva contraseña</h3>
						<?= $this->Form->create('User',array('id' => 'formCambioPass','onsubmit' => 'return validarContrasenas();'))?>
						<?= $this->Form->hidden('id',array('value'=>$this->Session->read('Auth.User.id'))) ?>
						<?= $this->Form->input('password',array('id'=>'pass1','class'=>'form-control','div'=>'col-md-12','type'=>'passwords','required' => true)) ?>
						<?= $this->Form->input('password_2',array('id'=>'pass2','class'=>'form-control','div'=>'col-md-12','type'=>'passwords','required' => true)) ?>
						<?= $this->Form->submit('Guardar Contraseña',array('class'=>'btn btn-success','div'=>'col-md-12')) ?>
						<?= $this->Form->end() ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>

	function validarContrasenas() {
		// 1. Obtener los valores de los campos por su ID
		var pass1 = document.getElementById('pass1').value;
		var pass2 = document.getElementById('pass2').value;

		// 2. Verificar que ambos campos NO estén vacíos (aunque 'required' ya ayuda)
		if (pass1.trim() === '' || pass2.trim() === '') {
			alert('Por favor, ingresa y confirma la nueva contraseña.');
			return false; // Evita el submit
		}

		// 3. Comparar los valores
		if (pass1 !== pass2) {
			// Los valores no coinciden
			alert('Las contraseñas no coinciden. Por favor, revísalas e inténtalo de nuevo.');

			// Opcional: limpiar los campos para obligar al usuario a reescribir
			document.getElementById('pass1').value = '';
			document.getElementById('pass2').value = '';

			return false; // 🛑 EVITA EL ENVÍO DEL FORMULARIO
		}

		// 4. Si el código llega aquí, los campos coinciden.
		return true; // ✅ PERMITE EL ENVÍO DEL FORMULARIO
	}

</script>
