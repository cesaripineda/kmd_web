<?php
App::uses('AppController', 'Controller');

class PortalEmpresasController extends AppController {
    public $layout = 'backoffice';
    public $uses = array('Empresa', 'MpGeneral', 'Mp', 'User', 'Producto', 'Certificado', 'AutorizacionMp');

    public function beforeFilter() {
        parent::beforeFilter();
        // Asegurar que solo usuarios con empresa_id puedan acceder
        if (!$this->Auth->user('empresa_id')) {
            $this->Session->setFlash('No tienes permisos para acceder a esta sección.', 'default', array(), 'mensaje_error');
            return $this->redirect(array('controller' => 'users', 'action' => 'logout'));
        }
    }

    public function index() {
        $this->set('titulo_seccion', 'Mi Dashboard');
        $empresa_id = $this->Auth->user('empresa_id');
        
        // Información de la empresa
        $this->Empresa->recursive = 1;
        $empresa = $this->Empresa->findById($empresa_id);
        
        // Materias Primas por renovar (Vencidas o por vencer en < 30 días)
        $today = date('Y-m-d');
        $next30Days = date('Y-m-d', strtotime('+30 days'));
        
        $renovaciones_mps = $this->Mp->find('all', array(
            'conditions' => array(
                'Mp.empresa_id' => $empresa_id,
                'OR' => array(
                    'Mp.expiracion_certificado <=' => $next30Days,
                    'Mp.expiracion_certificado IS NULL',
                    'Mp.expiracion_certificado' => '0000-00-00'
                )
            ),
            'contain' => array('MpFabricante'),
            'order' => array('Mp.expiracion_certificado' => 'ASC')
        ));
        
        // Filtrar las que ya tienen una solicitud pendiente para no duplicar esfuerzo visual
        $solicitudes_pendientes = $this->AutorizacionMp->find('list', array(
            'conditions' => array(
                'AutorizacionMp.empresa_id' => $empresa_id,
                'AutorizacionMp.status' => 0
            ),
            'fields' => array('AutorizacionMp.mp_id', 'AutorizacionMp.mp_id')
        ));

        $this->set(compact('empresa', 'renovaciones_mps', 'solicitudes_pendientes'));
    }

    public function mps() {
        $this->set('titulo_seccion', 'Administración de Materias Primas');
        $empresa_id = $this->Auth->user('empresa_id');
        
        $mps = $this->Mp->find('all', array(
            'conditions' => array('Mp.empresa_id' => $empresa_id),
            'fields' => array(
                'id', 'clave', 'nombre_ingrediente', 'marca_comercial', 'datos_fabricante', 
                'proveedor', 'expiracion_certificado', 'certificado',
                'proveedor_2', 'expiracion_certificado_proveedor_2', 'certificado_2',
                'aprobado', 'ultima_compra', 'clasificacion_kosher', 'notas'
            ),
            'contain' => array('MpFabricante'),
            'order' => array('Mp.nombre_ingrediente' => 'ASC')
        ));

        // Obtener listado de IDs de MPs que tienen solicitudes pendientes
        $pendientes = $this->AutorizacionMp->find('list', array(
            'conditions' => array(
                'AutorizacionMp.empresa_id' => $empresa_id,
                'AutorizacionMp.status' => 0
            ),
            'fields' => array('AutorizacionMp.mp_id', 'AutorizacionMp.mp_id')
        ));
        
        $this->set(compact('mps', 'pendientes'));
    }

    public function solicitar_cambio_mp() {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $empresa_id = $this->Auth->user('empresa_id');
            
            // Handle multiple Fabricantes and their file uploads
            $fabricantes_procesados = array();
            
            if (!empty($data['MpFabricante']) && is_array($data['MpFabricante'])) {
                foreach ($data['MpFabricante'] as $index => $fab) {
                    $fabricanteData = array(
                        'fabricante' => $fab['fabricante'],
                        'proveedor' => isset($fab['proveedor']) ? $fab['proveedor'] : '',
                        'pagina_producto' => isset($fab['pagina_producto']) ? $fab['pagina_producto'] : '',
                        'expiracion_certificado' => isset($fab['expiracion_certificado']) ? date('Y-m-d', strtotime($fab['expiracion_certificado'])) : '',
                        'certificado' => ''
                    );

                    // File upload for this fabricante
                    if (!empty($fab['file']['name'])) {
                        $file = $fab['file'];
                        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                        $filename = uniqid() . '_' . $index . '.' . $ext;
                        
                        $dir = WWW_ROOT . 'files' . DS . $empresa_id . DS . 'materias_primas' . DS . 'solicitudes';
                        if (!is_dir($dir)) {
                            mkdir($dir, 0777, true);
                        }
                        
                        $path = $dir . DS . $filename;
                        if (move_uploaded_file($file['tmp_name'], $path)) {
                            $fabricanteData['certificado'] = "/files/{$empresa_id}/materias_primas/solicitudes/{$filename}";
                        }
                    }
                    
                    $fabricantes_procesados[] = $fabricanteData;
                }
            }
            
            // Serialize and store in datos_fabricante to persist multiple items in AutorizacionMp
            $data['AutorizacionMp']['datos_fabricante'] = json_encode($fabricantes_procesados);
            
            // Capture MP fields
            $datos_mp = array(
                'clave' => isset($this->request->data['Mp']['clave']) ? $this->request->data['Mp']['clave'] : null,
                'nombre_ingrediente' => isset($this->request->data['Mp']['nombre_ingrediente']) ? $this->request->data['Mp']['nombre_ingrediente'] : null,
                'marca_comercial' => isset($this->request->data['Mp']['marca_comercial']) ? $this->request->data['Mp']['marca_comercial'] : null,
                'clasificacion' => isset($this->request->data['Mp']['clasificacion']) ? $this->request->data['Mp']['clasificacion'] : null,
                'clasificacion_kosher' => isset($this->request->data['Mp']['clasificacion_kosher']) ? $this->request->data['Mp']['clasificacion_kosher'] : null,
                'notas' => isset($this->request->data['Mp']['notas']) ? $this->request->data['Mp']['notas'] : null
            );
            $data['AutorizacionMp']['datos_mp'] = json_encode($datos_mp);
            
            $data['AutorizacionMp']['empresa_id'] = $empresa_id;
            $data['AutorizacionMp']['status'] = 0; // Pendiente
            $data['AutorizacionMp']['created'] = date('Y-m-d H:i:s');
            
            if ($this->AutorizacionMp->save($data)) {
                $this->Session->setFlash('Solicitud de actualización enviada correctamente para revisión.', 'default', array('class' => 'success'));
            } else {
                $this->Session->setFlash('Ocurrió un error al enviar la solicitud. Por favor intente de nuevo.', 'default', array('class' => 'error'));
            }
        }
        return $this->redirect($this->referer(array('action' => 'index')));
    }
    
    public function solicitar_cambio_producto() {
        if ($this->request->is('post')) {
            $empresa_id = $this->Auth->user('empresa_id');
            $this->loadModel('AutorizacionProducto');
            
            $producto_id = $this->request->data['Producto']['id'];
            
            $datos_producto = array(
                'nombre_producto' => isset($this->request->data['Producto']['nombre_producto']) ? $this->request->data['Producto']['nombre_producto'] : null,
                'marca' => isset($this->request->data['Producto']['marca']) ? $this->request->data['Producto']['marca'] : null,
                'materias_primas' => isset($this->request->data['Producto']['materias_primas']) ? $this->request->data['Producto']['materias_primas'] : array()
            );
            
            $data = array(
                'AutorizacionProducto' => array(
                    'producto_id' => $producto_id,
                    'empresa_id' => $empresa_id,
                    'datos_producto' => json_encode($datos_producto),
                    'status' => 0,
                    'created' => date('Y-m-d H:i:s')
                )
            );
            
            if ($this->AutorizacionProducto->save($data)) {
                $this->Session->setFlash('Solicitud de reformulación de producto enviada correctamente para revisión.', 'default', array('class' => 'success'));
            } else {
                $this->Session->setFlash('Ocurrió un error al enviar la solicitud. Por favor intente de nuevo.', 'default', array('class' => 'error'));
            }
        }
        return $this->redirect($this->referer(array('action' => 'productos')));
    }

    public function productos() {
        $this->set('titulo_seccion', 'Mis Productos');
        $empresa_id = $this->Auth->user('empresa_id');
        
        $productos = $this->Producto->find('all', array(
            'conditions' => array('Producto.empresa_id' => $empresa_id),
            'recursive' => 1,
            'order' => array('Producto.nombre_producto' => 'ASC')
        ));

        $empresa = $this->Empresa->find('first', array(
            'conditions' => array('Empresa.id' => $empresa_id),
            'fields' => array('unique_id'),
            'recursive' => -1
        ));
        $unique_id = $empresa['Empresa']['unique_id'];
        
        $this->loadModel('Mp');
        $materias_primas = $this->Mp->find('list', array(
            'conditions' => array('Mp.empresa_id' => $empresa_id),
            'fields' => array('Mp.id', 'Mp.nombre_ingrediente'),
            'order' => array('Mp.nombre_ingrediente' => 'ASC')
        ));
        
        $this->set(compact('productos', 'unique_id', 'materias_primas'));
    }

    public function certificados() {
        $this->set('titulo_seccion', 'Mis Certificados');
        $empresa_id = $this->Auth->user('empresa_id');
        
        $certificados = $this->Certificado->find('all', array(
            'conditions' => array(
                'Certificado.empresa_id' => $empresa_id,
                'Certificado.vigencia >=' => date('Y-m-d')
            ),
            'recursive' => 1,
            'order' => array('Certificado.id' => 'DESC')
        ));
        
        $this->set(compact('certificados'));
    }

    public function editar_empresa() {
        $this->set('titulo_seccion', 'Modificar Información General');
        $empresa_id = $this->Auth->user('empresa_id');

        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Empresa']['id'] = $empresa_id;
            if ($this->Empresa->save($this->request->data)) {
                $this->Session->setFlash('Información actualizada correctamente.', 'default', array(), 'mensaje_exito');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Error al actualizar la información.', 'default', array(), 'mensaje_error');
            }
        } else {
            $this->request->data = $this->Empresa->findById($empresa_id);
        }
    }

    public function editar_mp($id = null) {
        $this->set('titulo_seccion', 'Editar Materia Prima');
        $empresa_id = $this->Auth->user('empresa_id');

        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash('Materia prima no válida.', 'default', array(), 'mensaje_error');
            return $this->redirect(array('action' => 'mps'));
        }

        if ($id) {
            $mp = $this->Mp->findById($id);
            if (!$mp || $mp['Mp']['empresa_id'] != $empresa_id) {
                 $this->Session->setFlash('Materia prima no encontrada o acceso denegado.', 'default', array(), 'mensaje_error');
                 return $this->redirect(array('action' => 'mps'));
            }
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Mp']['empresa_id'] = $empresa_id;
            if ($this->Mp->save($this->request->data)) {
                $this->Session->setFlash('Materia prima actualizada correctamente.', 'default', array(), 'mensaje_exito');
                return $this->redirect(array('action' => 'mps'));
            } else {
                $this->Session->setFlash('Error al actualizar la materia prima.', 'default', array(), 'mensaje_error');
            }
        } else {
            $this->request->data = $mp;
        }

        $mpGenerals = $this->MpGeneral->find('list', array(
            'conditions' => array('MpGeneral.empresa_id' => $empresa_id)
        ));
        $this->set(compact('mpGenerals'));
    }

    public function agregar_mp() {
        $this->set('titulo_seccion', 'Agregar Materia Prima');
        $empresa_id = $this->Auth->user('empresa_id');

        if ($this->request->is('post')) {
            $this->request->data['Mp']['empresa_id'] = $empresa_id;
            $this->Mp->create();
            if ($this->Mp->save($this->request->data)) {
                $this->Session->setFlash('Materia prima agregada correctamente.', 'default', array(), 'mensaje_exito');
                return $this->redirect(array('action' => 'mps'));
            } else {
                $this->Session->setFlash('Error al agregar la materia prima.', 'default', array(), 'mensaje_error');
            }
        }

        $mpGenerals = $this->MpGeneral->find('list', array(
            'conditions' => array('MpGeneral.empresa_id' => $empresa_id)
        ));
        $this->set(compact('mpGenerals'));
    }

    public function buscador_productos() {
        $this->set('titulo_seccion', 'Buscador Avanzado de Productos');
        $q = $this->request->query('q');
        
        $productos = array();
        if (!empty($q)) {
            // Buscamos productos que tengan al menos un certificado vigente (en cualquier empresa)
            $today = date('Y-m-d');
            $conditions = array(
                'EXISTS (SELECT 1 FROM certificado_productos AS CP JOIN certificados AS C ON CP.certificado_id = C.id WHERE CP.producto_id = Producto.id AND C.vigencia >= "' . $today . '")'
            );
            
            $conditions['OR'] = array(
                'Producto.nombre_producto LIKE' => '%' . $q . '%',
                'Producto.marca LIKE' => '%' . $q . '%',
                'Producto.clave LIKE' => '%' . $q . '%',
                'Producto.clasificacion LIKE' => '%' . $q . '%'
            );
            
            $productos = $this->Producto->find('all', array(
                'conditions' => $conditions,
                'recursive' => 1, // Necesitamos Producto, Empresa y Responsable
                'order' => array('Producto.nombre_producto' => 'ASC'),
                'limit' => 100
            ));
        }
        
        $this->set(compact('productos', 'q'));
    }
}
