<?php
App::uses('AppController', 'Controller');
/**
 * Concerts Controller
 *
 * @property Concert $Concert
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ConcertsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
                //marche pas...
                $this->layout = 'bandweb';		
                
                
                $this->set('concerts', $this->Concert->find('all'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Concert->exists($id)) {
			throw new NotFoundException(__('Invalid concert'));
		}
		$options = array('conditions' => array('Concert.' . $this->Concert->primaryKey => $id));
		$this->set('concert', $this->Concert->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Concert->create();
			if ($this->Concert->save($this->request->data)) {
				$this->Session->setFlash(__('The concert has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The concert could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Concert->exists($id)) {
			throw new NotFoundException(__('Invalid concert'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Concert->save($this->request->data)) {
				$this->Session->setFlash(__('The concert has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The concert could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Concert.' . $this->Concert->primaryKey => $id));
			$this->request->data = $this->Concert->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Concert->id = $id;
		if (!$this->Concert->exists()) {
			throw new NotFoundException(__('Invalid concert'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Concert->delete()) {
			$this->Session->setFlash(__('The concert has been deleted.'));
		} else {
			$this->Session->setFlash(__('The concert could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Concert->recursive = 0;
		$this->set('concerts', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Concert->exists($id)) {
			throw new NotFoundException(__('Invalid concert'));
		}
		$options = array('conditions' => array('Concert.' . $this->Concert->primaryKey => $id));
		$this->set('concert', $this->Concert->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Concert->create();
			if ($this->Concert->save($this->request->data)) {
				$this->Session->setFlash(__('The concert has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The concert could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Concert->exists($id)) {
			throw new NotFoundException(__('Invalid concert'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Concert->save($this->request->data)) {
				$this->Session->setFlash(__('The concert has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The concert could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Concert.' . $this->Concert->primaryKey => $id));
			$this->request->data = $this->Concert->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Concert->id = $id;
		if (!$this->Concert->exists()) {
			throw new NotFoundException(__('Invalid concert'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Concert->delete()) {
			$this->Session->setFlash(__('The concert has been deleted.'));
		} else {
			$this->Session->setFlash(__('The concert could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
