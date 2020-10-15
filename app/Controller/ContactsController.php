<?php

App::uses('AppController', 'Controller');

/**
 * Contacts Controller
 *
 * @property Contact $Contact
 * @property PaginatorComponent $Paginator
 * @property AclComponent $Acl
 * @property SessionComponent $Session
 */
class ContactsController extends AppController {

    public $uses = array('Contact', 'Category');
    public $theme = 'Admin';
    public $helpers = array(
        'CakePtbr.Formatacao',
        'Html' => array(
            'className' => 'Bootstrap3.BootstrapHtml'
        ),
        'Form' => array(
            'className' => 'Bootstrap3.BootstrapForm'
        ),
        'Modal' => array(
            'className' => 'Bootstrap3.BootstrapModal'
        )
    );

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Acl', 'Session');

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Contact->recursive = 0;
        $this->set('contacts', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Contact->exists($id)) {
            throw new NotFoundException(__('Invalid contact'));
        }
        $options = array('conditions' => array('Contact.' . $this->Contact->primaryKey => $id));
        $this->set('contact', $this->Contact->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Contact->create();
            if ($this->Contact->save($this->request->data)) {
                $this->Session->setFlash(__('The contact has been saved.'),  'flash_success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The contact could not be saved. Please, try again.'), 'flash_error');
            }
        }
        $categories = $this->Contact->Category->find('list');
        $this->set(compact('categories'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Contact->exists($id)) {
            throw new NotFoundException(__('Invalid contact'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Contact->save($this->request->data)) {
                $this->Session->setFlash(__('The contact has been saved.'),  'flash_success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The contact could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $options = array('conditions' => array('Contact.' . $this->Contact->primaryKey => $id));
            $this->request->data = $this->Contact->find('first', $options);
        }
        $categories = $this->Contact->Category->find('list');
        $this->set(compact('categories'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Contact->id = $id;
        if (!$this->Contact->exists()) {
            throw new NotFoundException(__('Invalid contact'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Contact->delete()) {
            $this->Session->setFlash(__('The contact has been deleted.'),  'flash_success');
        } else {
            $this->Session->setFlash(__('The contact could not be deleted. Please, try again.'), 'flash_error');
        }
        return $this->redirect(array('action' => 'index'));
    }

}
