<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

	public function beforeFilter() {
        parent::beforeFilter();
    }

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$user = $this->Auth->user();
				if (!empty($user['empresa_id'])) {
					return $this->redirect(array('controller' => 'portal_empresas', 'action' => 'index'));
				}
				return $this->redirect(array('controller' => 'servicios', 'action' => 'etiquetas'));
			}
			$this->Session->setFlash('Invalid username or password, try again.', 'default', array(), 'm_error');
		}
	}

	public function logout() {
	    return $this->redirect($this->Auth->logout());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

	public function password() {
		$this->layout = 'backoffice';
		$this->set('titulo_seccion','Cambiar Contraseña');
		if($this->request->is('post')){
			$this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
			if($this->User->save($this->request->data)){
				$this->Session->setFlash('Se ha modificado exitosamente la contraseña', 'default', array(), 'mensaje_exito');
				return $this->redirect(array('action' => 'etiquetas','controller'=>'servicios'));
			}else{
				$this->Session->setFlash('No se puedo modificar la contraseña. Inténtalo más tarde', 'default', array(), 'mensaje_error');
			}
		}
	}
	// end function recover_password








}
