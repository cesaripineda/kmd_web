<?php
App::uses('AppController', 'Controller');

class EmpresasController extends AppController
{
	public $components = array('Email', 'RequestHandler');

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('getEmpresasProspecto', '_enviarNotificacionEmpresa');
	}

	public function getEmpresasProspecto()
	{
		$this->autoRender = false;
		if ($this->request->is('post')) {
			$data = $this->request->data;

			// 1. Guardar en BD (Asegúrate que el modelo Empresa tenga las validaciones)
			//if ($this->Empresa->save($data)) {

				// 2. Ejecutar envío de correo
				if ($this->_enviarNotificacionEmpresa($data)) {
					echo json_encode(array('status' => true, 'message' => 'Solicitud recibida correctamente.'));
				} else {
					echo json_encode(array('status' => true, 'message' => 'Guardado, pero hubo un detalle con la notificación.'));
				}
		}
	}

	private function _enviarNotificacionEmpresa($data)
	{
		$Email = new CakeEmail();
		// $Email->config('smtp'); // Descomentar si usas config específica en email.php

		try {
			$Email->from(array('sistema@kosher.com.mx' => 'KMD Prospección'))
				->to('cesar@aigel.com.mx')
				->subject('Nueva Prospección de Empresa: ' . $data['razon_social'])
				->emailFormat('html')
				->template('nueva_empresa_prospecto') // Crear este archivo .ctp
				->viewVars(array('datos' => $data))
				->send();
			return true;
		} catch (Exception $e) {
			CakeLog::write('error', 'Error en Mail Empresas: ' . $e->getMessage());
			return false;
		}

	}
}

?>
