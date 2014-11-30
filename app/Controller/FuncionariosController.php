<?php
App::uses('AppController', 'Controller');
/**
 * Funcionarios Controller
 *
 */
class FuncionariosController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

    public function index() {
        $this->Funcionario->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->Funcionario->id = $id;
        if (!$this->Funcionario->exists()) {
            throw new NotFoundException(__('Funcionário não existe.'));
        }
        $this->set('funcionario', $this->Funcionario->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Funcionario->create();
            if ($this->Funcionario->save($this->request->data)) {
                $this->Session->setFlash(
                    __('O novo funcionário foi adicionado!')
                );
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        }
    }

    public function edit($id = null) {
        $this->Funcionario->id = $id;
        if (!$this->Funcionario->exists()) {
            throw new NotFoundException(__('Funcionário não existe.'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Funcionario->save($this->request->data)) {
                $this->Session->setFlash(
                    __('Os dados do funcionário foram modificados.')
                );
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('Não foi possível modificar os dados do funcionário!')
            );
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->Funcionario->exists()) {
            throw new NotFoundException(__('Funcionário não existe.'));
        }
        if ($this->Funcionário->delete()) {
            $this->Session->setFlash(__('Funcionário removido!'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Não foi possível remover o funcionário.'));
        return $this->redirect(array('action' => 'index'));
    }

/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold;

}
