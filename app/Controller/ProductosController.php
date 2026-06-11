<?php
App::uses('AppController', 'Controller');

class ProductosController extends AppController
{

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('buscar', 'contacto', 'establecimientos', 'getCP', 'getRestricciones', 'sendMail');
	}
	public function buscar_old($id_categoria = null, $search_string = null)
	{
		$categorias_opciones = array(
			1 => "Abarrotes, Enlatados, Semillas, Especias",
			2 => "Carne, Pollo, Carnes Frías",
			3 => "Pescado",
			4 => "Quesos, Lácteos",
			7 => "Panes, Galletas saladas, Cereales, Harinas",
			6 => "Postres, Repostería",
			8 => "Chocolate, Dulces, Botanas, Frituras",
			9 => "Bebidas, Cafés, Concentrados, Vinos, Licores",
			10 => "Comida preparada y semi preparada congelada y/o refrigerada",
			5 => "Suplementos alimenticios y vitaminas"
		);
		$conditions = array(
			'Producto.producto_visible' => 1,
			//'Producto.empresa_id IN (1290,327,328,686,840,1062,297,1017,662,591,989,216,659,643,1014,586,754,59,620,893,785,663,387,79,79,1236,151,884,295,885,886,887,64,626,224,92,1022,1137,1152,570,68,214,71,1243,276,821,1167,1176,602,1169,993,1180,137,824,106,354,1004,1081,639,1218,897,934,1021,1030,1219,1101,1114,585,936,1136,969,1222,1173,914,946,1056,1133,100,1075,1070,1068,870,974,983,799,1109,918,998,1268,74,995,895,465,269,984,1020,1010,849,170,200,294,909,507,599,272,291,77,84,102,374,154,565,69,1112,1240,1161,1158,1074,1240)',
			'Producto.id IN (SELECT producto_id FROM certificado_productos WHERE certificado_id IN (SELECT id FROM certificados WHERE DATE(vigencia) >= NOW()))'
		);
		$this->set('categoria', "Todas las categorias");
		if ($id_categoria != 0) {
			$this->set('categoria', $categorias_opciones[$id_categoria]);
			$this->set('categoria_id', $id_categoria);
			array_push($conditions, array('Producto.categoria_kosher' => $categorias_opciones[$id_categoria]));
		}
		$this->Producto->Behaviors->load('Containable');
		if (isset($search_string)) {
			array_push(
				$conditions,
				array(
					'OR' => array(
						'Producto.nombre_web LIKE "%' . $search_string . '%"',
						'Producto.marca_web LIKE "%' . $search_string . '%"',
						'Producto.categoria_kosher LIKE "%' . $search_string . '%"',

					)
				)
			);
		}
		if (!empty($this->request->data['Producto']['categoria_id'])) {
			array_push($conditions, array('Producto.categoria_kosher' => $categorias_opciones[$this->request->data['Producto']['categoria_id']]));
		}
		if (!empty($this->request->data['Producto']['producto'])) {
			array_push($conditions, array('Producto.nombre_web LIKE "%' . $this->request->data['Producto']['producto'] . '%"'));
		}
		if (!empty($this->request->data['Producto']['marca'])) {
			array_push($conditions, array('Producto.marca_web' => $this->request->data['Producto']['marca']));
		}
		if (!empty($this->request->data['Producto']['estatus'])) {
			array_push($conditions, array('Producto.clasificacion' => $this->request->data['Producto']['estatus']));
		}
		$this->paginate = array(
			'limit' => 18,
			'conditions' => $conditions,
			'contain' => false,
			'fields' => array(
				'nombre_web',
				'categoria_kosher',
				'marca_web',
				'clasificacion'
			),
			'order' => array(
				'Producto.nombre_web' => 'ASC'
			)
		);
		$productos_pag = $this->paginate($this->Producto);

		$this->set(
			'productos',
			$productos_pag
		);

		$resultados = $this->Producto->find('count', array('conditions' => $conditions));

		$productos = $this->Producto->find('all', array(
			'conditions' => array('Producto.marca_web' != ""),
			'contain' => false,
			'fields' => array(
				'marca_web',
			),
			'order' => array(
				'Producto.marca_web' => 'ASC'
			)
		));
		//Marcas
		$marcas = array();
		foreach ($productos as $producto) {
			$marcas[$producto['Producto']['marca_web']] = strtoupper($producto['Producto']['marca_web']);
		}
		$this->set('marcas', $marcas);

		$this->set('total_productos', $resultados);
	}

	public function buscar($categoria_id = null)
	{
		$certificados = array(1 => 'Parve', 2 => 'Carne', 3 => 'Lácteo', 4 => 'Parve Mehadrin', 5 => 'Carne Mehadrin', 6 => 'Lácteo Mehadrin', 7 => 'Jalab Israel Mehadrín', 8 => 'Parve Mehadrín D.E.');
		$this->Producto->Behaviors->load('Containable');

		$this->loadModel('RestriccionesMarca');
		$restricciones_marcas = $this->RestriccionesMarca->find(
			'list',
			array(
				'fields' => array('RestriccionesMarca.marca', 'RestriccionesMarca.restriccion'),
			)
		);

		$categorias_opciones = array(
			1 => "Abarrotes, Enlatados, Semillas, Especias",
			2 => "Carne, Pollo, Carnes Frías",
			3 => "Pescado",
			4 => "Quesos, Lácteos",
			7 => "Panes, Galletas saladas, Cereales, Harinas",
			6 => "Postres, Repostería",
			8 => "Chocolate, Dulces, Botanas, Frituras",
			9 => "Bebidas, Cafés, Concentrados, Vinos, Licores",
			10 => "Comida preparada y semi preparada congelada y/o refrigerada",
			5 => "Suplementos alimenticios y vitaminas"
		);
		if ($this->request->is('get')) {

			$conditions = array(
				'Producto.producto_visible' => 1,
				//'Producto.empresa_id IN (328,1290,327,328,686,840,1062,297,1017,662,591,989,216,659,643,1014,586,754,59,620,893,785,663,387,79,79,1236,151,884,295,885,886,887,64,626,224,92,1022,1137,1152,570,68,214,71,1243,276,821,1167,1176,602,1169,993,1180,137,824,106,354,1004,1081,639,1218,897,934,1021,1030,1219,1101,1114,585,936,1136,969,1222,1173,914,946,1056,1133,100,1075,1070,1068,870,974,983,799,1109,918,998,1268,74,995,895,465,269,984,1020,1010,849,170,200,294,909,507,599,272,291,77,84,102,374,154,565,69,1112,1240,1161,1158,1074,1240)',
				'Producto.id IN (SELECT producto_id FROM certificado_productos WHERE certificado_id IN (SELECT id FROM certificados WHERE DATE(vigencia) >= NOW()))'
			);
			$this->set('categoria', "Todas las categorias");
			if ($categoria_id != 0) {
				$this->set('categoria', $categorias_opciones[$categoria_id]);
				$this->set('categoria_id', $categoria_id);
				array_push($conditions, array('Producto.categoria_kosher' => $categorias_opciones[$categoria_id]));
			}

			$searchTerm = trim($this->request->query('search_str'));
			if ($searchTerm != "") {
				array_push(
					$conditions,
					array(
						'OR' => array(
							'Producto.nombre_web LIKE "%' . $searchTerm . '%"',
							'Producto.marca_web LIKE "%' . $searchTerm . '%"',
							'Producto.categoria_kosher LIKE "%' . $searchTerm . '%"',

						)
					)
				);
			} else {
				$nombre_term = $this->request->query('nombre');
				if ($nombre_term != "") {
					array_push(
						$conditions,
						array(
							'Producto.nombre_web LIKE "%' . $nombre_term . '%"',
						)
					);
				}
				$marca_term = $this->request->query('marca');
				if ($marca_term != "") {
					array_push(
						$conditions,
						array(
							'Producto.marca_web' => $marca_term,
						)
					);
				}
				$clasificacion_term = $this->request->query('estatus');
				if ($clasificacion_term != "") {
					array_push(
						$conditions,
						array(
							'Producto.clasificacion' => $clasificacion_term,
						)
					);
				}

			}


			$this->paginate = array(
				'limit' => 18,
				'conditions' => $conditions,
				'recursive' => 2,
				'page' => 1,
				'fields' => array(
					'nombre_web',
					'categoria_kosher',
					'marca_web',
					'clasificacion',
					'id',
					'nombre_producto',
					'marca'
				),
				'order' => array(
					'Producto.nombre_web' => 'ASC'
				),
			);
			$productos_pag = $this->paginate('Producto');

			for ($i = 0; $i < sizeof($productos_pag); $i++) {
				if (isset($restricciones_marcas[$productos_pag[$i]['Producto']['marca_web']])) {
					$productos_pag[$i]['Producto']['restriccion'] = $restricciones_marcas[$productos_pag[$i]['Producto']['marca_web']];
				}
			}

			$this->set(
				'productos',
				$productos_pag
			);

			$resultados = $this->Producto->find('count', array('conditions' => $conditions));

			$productos = $this->Producto->find('all', array(
				'conditions' => $conditions,
				//'contain'=>false,
				'fields' => array(
					'marca_web',
					'clasificacion'
				),
				'order' => array(
					'Producto.marca_web' => 'ASC'
				)
			));
			//Marcas
			$marcas = array();
			$estatus = array();
			foreach ($productos as $producto) {
				$marcas[$producto['Producto']['marca_web']] = strtoupper($producto['Producto']['marca_web']);
				$estatus[$producto['Producto']['clasificacion']] = strtoupper($certificados[$producto['Producto']['clasificacion']]);
			}
			$this->set('marcas', $marcas);
			$this->set('certificados', $estatus);
			$this->set('condiciones', $conditions);

			$this->set('total_productos', $resultados);

			$totalPages = ceil($resultados / $this->paginate['limit']);

			if ($this->request->query('page') > $totalPages && $totalPages > 0) {

				return $this->redirect(array('action' => 'buscar', '?' => array_merge($this->request->query, array('page' => 1))));

			}

			//$this->redirect(array('controller'=>'Productos', 'action'=>'buscar',$this->request->query()));
		}
	}

	public function establecimientos()
	{
		$this->loadModel('Establecimiento');
		if ($this->request->is('get')) {
			$conditions = array(
				'DATE(Establecimiento.fecha_vigencia) >= NOW()',
				'Establecimiento.status' => 2
			);

			$nombre = $this->request->query('nombre');
			if ($nombre != "") {
				array_push($conditions, array("Establecimiento.nombre LIKE '%" . $nombre . "%'"));
			}
			$categoria = $this->request->query('categoria');
			if ($categoria != "") {
				array_push($conditions, array("Establecimiento.categoria" => $categoria));
			}
			$this->Establecimiento->Behaviors->load('Containable');
			$this->paginate = array(
				'limit' => 12,
				'conditions' => $conditions,
				'contain' => false,
				'fields' => array(
					'nombre',
					'direccion',
					'telefonos',
					'horario_trabajo',
					'tipo_establecimiento',
					'coordenadas',
					'link_menu',
					'categoria',
					'logo',
					'categoria_2'
				),
				'page' => $this->request->query('page') ? $this->request->query('page') : 1,
				'order' => array(
					'Establecimiento.nombre' => 'ASC'
				)
			);
			$establecimientos_pag = $this->paginate($this->Establecimiento);

			$this->set(
				'establecimientos',
				$establecimientos_pag
			);

			$categorias = $this->Establecimiento->find('list', array('fields' => array('categoria', 'categoria'), 'order' => 'Establecimiento.categoria ASC', 'conditions' => array('Establecimiento.categoria !=' => "")));
			$this->set('categorias', $categorias);

		}
	}

	public function getRestricciones($marca = null)
	{
		$this->loadModel('RestriccionesMarca');
		$restricciones = $this->RestriccionesMarca->find(
			'all',
			array(
				'conditions' => array(
					'RestriccionesMarca.marca' => $marca
				)
			)
		);
		$restricciones_str = "";
		foreach ($restricciones as $restriccion) {
			$restricciones_str .= "<li>" . $restriccion['RestriccionesMarca']['restriccion'];
		}

		echo json_encode($restricciones_str);
		exit();
		$this->autoRender = false;

	}

	public function sendMail()
	{
		$body = "<p><b>Nombre:</b>" . $this->request->data['Contacto']['nombre'] . "</p>" . "<p><b>Teléfono:</b>" . $this->request->data['Contacto']['telefono'] . "</p>" . "<p><b>Mail:</b>" . $this->request->data['Contacto']['email'] . "</p>" . "<p><b>Mensaje:</b>" . $this->request->data['Contacto']['texto'] . "</p>";

		$this->Email = new CakeEmail();
		$this->Email->config(
			array(
				'host' => 'ssl://mail.kosher.com.mx',
				'port' => 465,
				'username' => 'certificacion@kosher.com.mx',
				'password' => 'X8tekubrU#a*',
				'transport' => 'Smtp',
				//								'tls' 			=> true,
				'context' => [
					'ssl' => [
						'verify_peer' => false,
						'verify_peer_name' => false,
						'allow_self_signed' => true
					]
				],
			)
		);
		$this->Email->emailFormat('html');
		$this->Email->from(array('certificacion@kosher.com.mx' => 'Formulario de Contacto KMD (No responder)'));
		$this->Email->to('atencionaclientes@kosher.com.mx');
		$this->Email->subject('Contacto desde página web KMD');
		$this->Email->send($body);

		return $this->redirect(array('action' => 'contacto', 'controller' => 'productos', 'confirmation'));
	}

	public function contacto($confirm = null)
	{
		if (isset($confirm)) {
			$this->set('confirm', $confirm);
		}
	}

	public function getCP()
	{
		$cp = $this->request->data['cp'];
		$this->loadModel('Cp');
		$cp_raw = $this->Cp->find('first', array('conditions' => array('codigo_postal' => $cp)));
		$arreglo_cp = array(
			'colonia' => $cp_raw['Cp']['colonia'],
			'municipio' => $cp_raw['Cp']['municipio'],
			'ciudad' => $cp_raw['Cp']['ciudad'],
			'estado' => $cp_raw['Cp']['estado'],
		);

		header('Content-Type: application/json');
		echo json_encode($arreglo_cp);
		exit();

	}


}
