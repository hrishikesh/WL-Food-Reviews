<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'GoogleAuth/Google_Client');
App::import('Vendor', 'GoogleAuth/contrib/Google_Oauth2Service');
/**
 * Users Controller
 *
 * @property User $User
 * @property AclComponent $Acl
 * @property SecurityComponent $Security
 * @property RequestHandlerComponent $RequestHandler
 */
class UsersController extends AppController {


/**
 * Helpers
 *
 * @var array
 */
	//public $helpers = array('Ajax', 'Javascript', 'Time');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Acl', 'Security', 'RequestHandler');

    /**
     * Before Filter
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login');
    }

/**
 * login method
 *
 * @return void
 */
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Invalid username or password, try again'));
            }
        }
        $this->layout = 'login';
    }


    public function glogin()
    {
        $client = new Google_Client();
        $client->setApplicationName("My Test App");
        $client->setClientId('insert_your_oauth2_client_id');
        $client->setClientSecret('insert_your_oauth2_client_secret');
        $client->setRedirectUri('insert_your_redirect_uri');
        $client->setDeveloperKey('insert_your_developer_key');         
        $oauth2 = new Google_Oauth2Service($client);

    }

    public function logout() {
        $this->redirect($this->Auth->logout());


    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
