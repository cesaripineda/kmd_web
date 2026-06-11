<?php
App::uses('AppController', 'Controller');

class EstablecimientosController extends AppController
{
	public $components = array('Email', 'RequestHandler');

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('buscar', 'contacto', 'establecimientos', 'getCP', 'getRestricciones', 'sendMail', 'addEstablecimientoProspecto');
	}

	public function addEstablecimientoProspecto()
	{
		$this->autoRender = false;
		if ($this->request->is('post')) {
			$data = $this->request->data;

			// Solo enviamos el correo, no guardamos en la base de datos
			if ($this->_enviarCorreoProspecto($data)) {
				echo json_encode(array('status' => true, 'message' => 'Solicitud enviada exitosamente'));
			} else {
				echo json_encode(array('status' => false, 'message' => 'Error al enviar el correo'));
			}
		}
	}

	private function _enviarCorreoProspecto($data)
	{
		App::uses('CakeEmail', 'Network/Email');
		$Email = new CakeEmail();
		$Email->config(
			array(
				'host' => 'ssl://mail.kosher.com.mx',
				'port' => 465,
				'username' => 'certificacion@kosher.com.mx',
				'password' => 'X8tekubrU#a*',
				'transport' => 'Smtp',
				'timeout' => 30,
				'context' => array(
					'ssl' => array(
						'verify_peer' => false,
						'verify_peer_name' => false,
						'allow_self_signed' => true
					)
				),
			)
		);
		try {
			$Email->from(array('certificacion@kosher.com.mx' => 'Sistema KMD'))
				->to('cesar@aigel.com.mx')
				->subject('Nuevo Prospecto de Certificación: ' . (isset($data['nombre']) ? $data['nombre'] : 'Sin nombre'))
				->emailFormat('html')
				->template('nuevo_prospecto')
				->viewVars(array('datos' => $data))
				->send();
			return true;
		} catch (Exception $e) {
			CakeLog::write('error', 'Error enviando correo prospecto: ' . $e->getMessage());
			// Opcional: para depuración rápida, devolver el error en el JSON temporalmente
			// return $e->getMessage(); 
			return false;
		}
	}

}

?>