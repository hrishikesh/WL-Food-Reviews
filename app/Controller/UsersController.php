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
	public $components = array('Security', 'RequestHandler');

    /**
     * Before Filter
     */


    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','callback');
    }

/**
 * login method
 *
 * @return void
 */
    public function login() {
        if (!$this->Session->check('OAuth2Token'))
        {
            //create our api client
            $apiClient = new Google_Client();
            $apiClient->setApprovalPrompt('auto');
            $apiClient->setScopes(array(
                'https://www.googleapis.com/auth/userinfo.profile',
                'https://www.googleapis.com/auth/userinfo.email',
            ));


            $this->set('login_url', $apiClient->createAuthUrl());

        }

        $this->layout = 'login';
    }


/**
 * Callback for Google Auth
 */
    public function callback() {
        $apiClient = new Google_Client();
        if (isset($this->request->query['code'])) {
            $apiClient->authenticate($this->request->query['code']);
            if ($apiClient->getAccessToken()) {
                $this->Session->write('OAuth2Token', $apiClient->getAccessToken());
            }
            $this->redirect(array('action'=>'callback'));
        }

        $userProfileInfo = $this->_getGoogleProfileInfo();


        if ( strpos($userProfileInfo['email'], "@weboniselab.com") === false ) {
            $this->Session->delete('OAuth2Token');
            $this->Session->setFlash(__('Please login from your Webonise Lab Account'));
            $this->redirect(array('action'=>'login'));
        }

        $googleId = $userProfileInfo['id'];
        $userData = $this->User->findByGoogleid($googleId);

        if(0 >= count($userData) && !isset($userData['User']) && empty($userData['User'])) {
            if(!$this->User->save(array(
                'googleid'=> trim($googleId),
                'username'=> $userProfileInfo['email'],
                'password' => null, 'role'=>'user',
                'name'=>  $userProfileInfo['name'],
                'profile_image_url'=> $userProfileInfo['picture'])
            ))
            {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
        $user = $this->User->findByGoogleid($googleId);
        if($this->Auth->login($user['User'])) {
            $this->redirect($this->Auth->redirect());
        };
    }


    private function _getGoogleProfileInfo()
    {
        $apiClient = new Google_Client();
        if($this->Session->check('OAuth2Token')) {
            $apiClient->setAccessToken($this->Session->read('OAuth2Token'));
            $oauth2 = new Google_Oauth2Service($apiClient);
            return $oauth2->userinfo->get();
        }
        return false;
    }


    public function logout() {
        if($this->Session->check('OAuth2Token')) {
            $this->Session->delete('OAuth2Token');
        }
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
