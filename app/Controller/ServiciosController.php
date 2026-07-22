<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class ServiciosController extends AppController
{

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('dashboard');
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */

	public function dashboard()
	{
		$this->layout = 'backoffice';
	}

	public function add()
	{
		if ($this->request->is('post')) {
			$anexo = $this->request->data['Servicio']['comprobante'];
			unset($this->request->data['Servicio']['comprobante']);
			$this->request->data['Servicio']['fecha_solicitud'] = date('Y-m-d H:i:s');
			$this->request->data['Servicio']['establecimiento_id'] = $this->Session->read('Auth.User.establecimiento_id');
			$this->request->data['Servicio']['user_id'] = $this->Session->read('Auth.User.id');
			$this->request->data['Servicio']['estatus'] = 'Solicitado Sin Pago';
			$this->request->data['Servicio']['tipo'] = 1; //1 = Etiquetas
			if ($this->Servicio->save($this->request->data)) {
				$idServicio = $this->Servicio->getInsertID();
				$this->loadModel('ItemsServicio');
				foreach ($this->request->data['Cotizacion'] as $item) {
					$item_obj = array(
						'servicio_id' => $idServicio,
						'concepto' => $item['concepto'] . " / " . $item['tipo_complemento'],
						'tipo_etiqueta' => $item['tipo_etiqueta'],
						'cantidad' => $item['cantidad'],
						'monto' => $item['precio_unitario'],
						'total' => $item['total'],
					);
					$this->ItemsServicio->create();
					$this->ItemsServicio->save($item_obj);
				}

				if ($anexo['error'] == 0) {
					$id_unico = uniqid();
					// Define la carpeta de destino dentro de la carpeta 'webroot'
					$uploadDir = "/files/servicios";
					// Obtiene el nombre del archivo
					$fileName = $anexo['name'];
					// Construye la ruta completa de destino
					$destinationPath = getcwd() . $uploadDir . DS . $id_unico . "_" . $fileName;
					// Mueve el archivo de la ruta temporal a la carpeta de destino
					if (move_uploaded_file($anexo['tmp_name'], $destinationPath)) {
						// Si el archivo se guarda con éxito, almacena la ruta para guardarla en la base de datos
						// La ruta que guardarías en la BD es relativa a 'webroot' para que sea accesible desde la web
						$filePathForDB = $uploadDir . DS . $id_unico . "_" . $fileName;
						// Asigna la ruta a la variable para guardarla en la base de datos
						$servicio = array(
							'id' => $idServicio,
							'comprobante' => $filePathForDB,
							'estatus' => 'Pagado'
						);
						$this->Servicio->create();
						$this->Servicio->save($servicio);
						// Aquí puedes guardar el resto de los datos del formulario, incluyendo la ruta del archivo
						// Ejemplo: $this->ModeloDelArchivo->save($this->request->data);
						$this->Session->setFlash('Archivo subido y guardado con éxito.');
					} else {
						$this->Session->setFlash('Hubo un error al mover el archivo.');
					}
				} else {
					$this->Session->setFlash('No se ha subido ningún archivo o hubo un error.');
				}
				$this->Session->setFlash('Solicitud guardada correctamente.', 'default', array('class' => 'success'));
				return $this->redirect(array('controller' => 'servicios', 'action' => 'etiquetas'));
			}
		}
	}

	public function addEvento()
	{
		if ($this->request->is('post')) {
			$is_hotel = ($this->Session->read('Auth.User.Establecimiento.tipo') == 3);
			$anexo = isset($this->request->data['Servicio']['comprobante']) ? $this->request->data['Servicio']['comprobante'] : null;
			if (isset($this->request->data['Servicio']['comprobante'])) {
				unset($this->request->data['Servicio']['comprobante']);
			}
			$this->request->data['Servicio']['fecha_solicitud'] = date('Y-m-d H:i:s');
			$this->request->data['Servicio']['establecimiento_id'] = $this->Session->read('Auth.User.establecimiento_id');
			$this->request->data['Servicio']['user_id'] = $this->Session->read('Auth.User.id');
			$this->request->data['Servicio']['tipo'] = 0; //0 = Servicio
			$this->request->data['Servicio']['fecha_servicio'] = $this->request->data['Servicio']['fecha_servicio'] . " " . $this->request->data['Servicio']['hora_servicio'] . ":" . $this->request->data['Servicio']['minuto_servicio'] . ":00";

			if ($is_hotel) {
				$this->request->data['Servicio']['estatus'] = 'Pagado';
				if (isset($this->request->data['Cotizacion'][0]['cantidad'])) {
					$this->request->data['Servicio']['numero_personas'] = $this->request->data['Cotizacion'][0]['cantidad'];
				}
				if (isset($this->request->data['Servicio']['monto_total'])) {
					$monto_total = floatval($this->request->data['Servicio']['monto_total']);
					$this->request->data['Servicio']['comision_generada'] = $monto_total * 0.12 * 1.16;
				}
			} else {
				$this->request->data['Servicio']['estatus'] = 'Solicitado Sin Pago';
			}

			if ($this->Servicio->save($this->request->data)) {
				$idServicio = $this->Servicio->getInsertID();
				$this->loadModel('ItemsServicio');
				foreach ($this->request->data['Cotizacion'] as $item) {
					$item_obj = array(
						'servicio_id' => $idServicio,
						'concepto' => $item['concepto'],
						'cantidad' => $item['cantidad'],
						'monto' => $item['precio_unitario'],
						'total' => $item['total'],
					);
					$this->ItemsServicio->create();
					$this->ItemsServicio->save($item_obj);
				}

				if (!$is_hotel && $anexo && $anexo['error'] == 0) {
					$id_unico = uniqid();
					// Define la carpeta de destino dentro de la carpeta 'webroot'
					$uploadDir = "/files/servicios";
					// Obtiene el nombre del archivo
					$fileName = $anexo['name'];
					// Construye la ruta completa de destino
					$destinationPath = getcwd() . $uploadDir . DS . $id_unico . "_" . $fileName;
					// Mueve el archivo de la ruta temporal a la carpeta de destino
					if (move_uploaded_file($anexo['tmp_name'], $destinationPath)) {
						// Si el archivo se guarda con éxito, almacena la ruta para guardarla en la base de datos
						// La ruta que guardarías en la BD es relativa a 'webroot' para que sea accesible desde la web
						$filePathForDB = $uploadDir . DS . $id_unico . "_" . $fileName;
						// Asigna la ruta a la variable para guardarla en la base de datos
						$servicio = array(
							'id' => $idServicio,
							'comprobante' => $filePathForDB,
							'estatus' => 'Pagado'
						);
						$this->Servicio->create();
						$this->Servicio->save($servicio);
						$this->Session->setFlash('Archivo subido y guardado con éxito.');
					} else {
						$this->Session->setFlash('Hubo un error al mover el archivo.');
					}
				}
				$this->Session->setFlash('Solicitud guardada correctamente.', 'default', array('class' => 'success'));
				return $this->redirect(array('controller' => 'servicios', 'action' => 'eventos'));
			}
		}
	}

	public function etiquetas()
	{
		$this->layout = 'backoffice';
		$etiquetas = $this->Servicio->find(
			'all',
			array(
				'conditions' => array(
					'Servicio.tipo' => 1,
					'Servicio.establecimiento_id' => $this->Session->read('Auth.User.establecimiento_id')
				),
				'order' => 'Servicio.id DESC'
			)
		);
		$this->set(compact('etiquetas'));

		$tipos_etiquetas = array(
			0 => array(
				'name' => 'Etiquetas Largas',
				'precio' => 278.40
			),
			1 => array(
				'name' => 'Etiquetas Cortas',
				'precio' => 255.20
			),
			2 => array(
				'name' => 'Azul',
				'precio' => 185.60
			),
			3 => array(
				'name' => 'Rojas',
				'precio' => 185.60
			),
		);

		$this->set(compact('tipos_etiquetas'));

		$this->set('titulo_seccion', 'Histórico de Solicitud de Etiquetas');
	}

	public function eventos()
	{
		$this->layout = 'backoffice';
		$eventos = $this->Servicio->find(
			'all',
			array(
				'conditions' => array(
					'Servicio.tipo' => 0,
					'Servicio.establecimiento_id' => $this->Session->read('Auth.User.establecimiento_id')
				),
				'order' => 'Servicio.id DESC'
			)
		);
		$this->set(compact('eventos'));

		$tipos_eventos = array(
			0 => array(
				'name' => 'CUALQUIER EVENTO DE BANQUETERO HASTA 8 HRS HASTA 150 EN ADELANTE',
				'precio' => 11600.00,
				'visibilidad' => 'ambos'
			),
			1 => array(
				'name' => 'CUALQUIER EVENTO DE BANQUETERO HASTA 8 HRS HASTA 100 A 150 PERSONAS',
				'precio' => 9860.00,
				'visibilidad' => 'ambos'
			),
			2 => array(
				'name' => 'CUALQUIER EVENTO DE BANQUETERO HASTA 8 HRS DE 50 A 100 PERSONAS',
				'precio' => 6960.00,
				'visibilidad' => 'ambos'
			),
			3 => array(
				'name' => 'CUALQUIER EVENTO DE BANQUETERO HASTA 8 HRS DE 0 A 50 PERSONAS',
				'precio' => 4060.00,
				'visibilidad' => 'ambos'
			),
			4 => array(
				'name' => 'CUALQUIER EVENTO DE BANQUETERO HRA EXTRA DESPUÉS DE LAS 8 HRS',
				'precio' => 600.00,
				'visibilidad' => 'ambos'
			),
			5 => array(
				'name' => 'EVENTO EN SHABAT PAGO ÚNICO',
				'precio' => 5000.00,
				'visibilidad' => 'ambos'
			),
			10 => array(
				'name' => 'EVENTO HASTA 25 PERSONAS',
				'precio' => 2800.00,
				'visibilidad' => 'establecimientos'
			),
			6 => array(
				'name' => 'HAGALÁ Y TEVILA HASTA 8 HRS',
				'precio' => 1500.00,
				'visibilidad' => 'establecimientos'
			),
			9 => array(
				'name' => 'JUNK BAR CHICO 1 MESA CHICA',
				'precio' => 2800.00,
				'visibilidad' => 'establecimientos'
			),

			11 => array(
				'name' => 'JUNK BAR GRANDE',
				'precio' => 3500.00,
				'visibilidad' => 'establecimientos'
			),
			8 => array(
				'name' => 'PRUEBA DE MENÚ',
				'precio' => 2000.00,
				'visibilidad' => 'establecimientos'
			),
			7 => array(
				'name' => 'SUPLENCIAS',
				'precio' => 2000.00,
				'visibilidad' => 'establecimientos'
			),
			12 => array(
				'name' => 'BODA CIVIL',
				'precio' => 0.00,
				'visibilidad' => 'hoteles'
			),
			13 => array(
				'name' => 'BODA RELIGIOSA',
				'precio' => 0.00,
				'visibilidad' => 'hoteles'
			),
			14 => array(
				'name' => 'BAR MITZVAH',
				'precio' => 0.00,
				'visibilidad' => 'hoteles'
			),
			15 => array(
				'name' => 'BRIT MILAH',
				'precio' => 0.00,
				'visibilidad' => 'hoteles'
			),
			16 => array(
				'name' => 'TEVILÁ',
				'precio' => 0.00,
				'visibilidad' => 'hoteles'
			),
		);


		$this->set(compact('tipos_eventos'));

		$this->set('titulo_seccion', 'Histórico de Solicitud de Eventos');
	}

	public function view($id = null)
	{
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

	public function recover_password($user_id = null)
	{
		// $this->layout = 'login';

		if ($this->request->is('post')) {
			// step 1
			// Buscar el correo electronico

			$usuario = $this->User->find(
				'first',
				array(
					'conditions' => array(
						'User.id' => $user_id
					)
				)
			);

			if (count($usuario) > 0) {

				if ($this->request->data['User']['password'] == $this->request->data['User']['password2']) {
					// step 2
					// Guardar el nuevo password en una variable para mandar al email
					$new_password = $this->request->data['User']['password'];
					$this->request->data['User']['password'] = $new_password;

					// step 3
					// Cifrar el nuevo password y guardar en la db
					$this->request->data['User']['id'] = $usuario['User']['id'];
					$this->User->save($this->request->data);


					// step 4
					// Enviar el email
					$this->Email = new CakeEmail();
					$this->Email->config(
						array(
							'host' => 'mail.link2mail.mx',
							'port' => 587,
							'username' => 'certificacion@kosher.com.mx',
							'password' => 'X8tekubrU#a*',
							'transport' => 'Smtp'
						)
					);

					$this->Email->emailFormat('html');
					$this->Email->template('recovery_password');
					$this->Email->from(array('certificados_noresponder@kmd.com.mx' => 'KMD'));
					$this->Email->to($usuario['User']['email']);
					$this->Email->subject('Recuperación de contraseña');
					$this->Email->viewVars(
						array(
							'new_password' => $new_password,
							'link_btn' => Router::url('/Users/login', true)
						)
					);
					$this->Email->send();

					$this->redirect(array('action' => 'index'));

				}

			}
			// end if count usuario
		}
		// end request is post
	}
	// end function recover_password

	function getServicio()
	{
		$this->autoRender = false;
		$servicio = $this->Servicio->findFirstById($this->request->data['id']);
		header('Content-Type: application/json');
		echo json_encode($servicio);
		exit();
	}


	function uploadComprobante()
	{
		$evento = $this->Servicio->findById($this->request->data['Servicio']['id']);
		$anexo = $this->request->data['Servicio']['comprobante'];
		$id_unico = uniqid();
		// Define la carpeta de destino dentro de la carpeta 'webroot'
		$uploadDir = "/files/servicios";
		// Obtiene el nombre del archivo
		$fileName = $anexo['name'];
		// Construye la ruta completa de destino
		$destinationPath = getcwd() . $uploadDir . DS . $id_unico . "_" . $fileName;
		// Mueve el archivo de la ruta temporal a la carpeta de destino
		if (move_uploaded_file($anexo['tmp_name'], $destinationPath)) {
			// Si el archivo se guarda con éxito, almacena la ruta para guardarla en la base de datos
			// La ruta que guardarías en la BD es relativa a 'webroot' para que sea accesible desde la web
			$filePathForDB = $uploadDir . DS . $id_unico . "_" . $fileName;
			// Asigna la ruta a la variable para guardarla en la base de datos
			$servicio = array(
				'id' => $this->request->data['Servicio']['id'],
				'comprobante' => $filePathForDB,
				'estatus' => 'Pagado'
			);
			if ($evento['Servicio']['estatus'] == "Extra") {
				$servicio['estatus'] = 'Realizado';
			}
			$this->Servicio->create();
			$this->Servicio->save($servicio);
			// Aquí puedes guardar el resto de los datos del formulario, incluyendo la ruta del archivo
			// Ejemplo: $this->ModeloDelArchivo->save($this->request->data);
			$this->Session->setFlash('Archivo subido y guardado con éxito.');
			return $this->redirect(array('action' => 'etiquetas', 'controller' => 'servicios'));
		}
	}

}
