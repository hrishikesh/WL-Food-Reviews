<?php
App::uses('AppController', 'Controller');
/**
 * FeedbackResponses Controller
 *
 * @property FeedbackResponse $FeedbackResponse
 * @property Feedback $Feedback
 */

class FeedbackResponsesController extends AppController {


    /**
     * Before Filter
     */


    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('*');
    }
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->FeedbackResponse->recursive = 0;
		$this->set('feedbackResponses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->FeedbackResponse->id = $id;
		if (!$this->FeedbackResponse->exists()) {
			throw new NotFoundException(__('Invalid feedback response'));
		}
		$this->set('feedbackResponse', $this->FeedbackResponse->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {

            $this->FeedbackResponse->Feedback->create();
            if($this->request->data('FeedbackResponse.comment')) {
                $this->FeedbackResponse->Feedback->set("comment", $this->request->data('FeedbackResponse.comment'));
                unset($this->request->data['FeedbackResponse']['comment']);
            }

            $this->FeedbackResponse->Feedback->set("user_id", 1);
            $this->FeedbackResponse->Feedback->set("meal_id", 1);
            unset($this->request->data['FeedbackResponse']['meal_id']);
            $this->FeedbackResponse->Feedback->save();

            $this->request->data['FeedbackResponse']['feedback_id'] = $this->FeedbackResponse->Feedback->getLastInsertID();

			$this->FeedbackResponse->create();
			if ($this->FeedbackResponse->save($this->request->data)) {
				$this->Session->setFlash(__('The feedback response has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Your feedback response could not be saved. Please, try again.'));
			}
		}
		//$feedbacks = $this->FeedbackResponse->Feedback->find('list');
		//$mealItems = $this->FeedbackResponse->MealItem->find('list');
        $mealItems = $this->FeedbackResponse->MealItem->find('list', array('conditions'=>array('meal_id'=>2)));

        $this->FeedbackResponse->Response->recursive = -1;
		$responses = $this->FeedbackResponse->Response->find('all', array('fields'=>array('Response.id', 'Response.text', 'Response.image')));
        //$responseImages = $this->FeedbackResponse->Response->find('list', array('fields'=>array('Response.id', 'Response.image')));

		$this->set(compact('mealItems', 'responses','responseImages'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->FeedbackResponse->id = $id;
		if (!$this->FeedbackResponse->exists()) {
			throw new NotFoundException(__('Invalid feedback response'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->FeedbackResponse->save($this->request->data)) {
				$this->Session->setFlash(__('The feedback response has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The feedback response could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->FeedbackResponse->read(null, $id);
		}
		$feedbacks = $this->FeedbackResponse->Feedback->find('list');
		$mealItems = $this->FeedbackResponse->MealItem->find('list');
		$responses = $this->FeedbackResponse->Response->find('list');
		$this->set(compact('feedbacks', 'mealItems', 'responses'));
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
		$this->FeedbackResponse->id = $id;
		if (!$this->FeedbackResponse->exists()) {
			throw new NotFoundException(__('Invalid feedback response'));
		}
		if ($this->FeedbackResponse->delete()) {
			$this->Session->setFlash(__('Feedback response deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Feedback response was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FeedbackResponse->recursive = 0;
		$this->set('feedbackResponses', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->FeedbackResponse->id = $id;
		if (!$this->FeedbackResponse->exists()) {
			throw new NotFoundException(__('Invalid feedback response'));
		}
		$this->set('feedbackResponse', $this->FeedbackResponse->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FeedbackResponse->create();
			if ($this->FeedbackResponse->save($this->request->data)) {
				$this->Session->setFlash(__('The feedback response has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The feedback response could not be saved. Please, try again.'));
			}
		}
		$feedbacks = $this->FeedbackResponse->Feedback->find('list');
		$mealItems = $this->FeedbackResponse->MealItem->find('list');
		$responses = $this->FeedbackResponse->Response->find('list');
		$this->set(compact('feedbacks', 'mealItems', 'responses'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->FeedbackResponse->id = $id;
		if (!$this->FeedbackResponse->exists()) {
			throw new NotFoundException(__('Invalid feedback response'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->FeedbackResponse->save($this->request->data)) {
				$this->Session->setFlash(__('The feedback response has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The feedback response could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->FeedbackResponse->read(null, $id);
		}
		$feedbacks = $this->FeedbackResponse->Feedback->find('list');
		$mealItems = $this->FeedbackResponse->MealItem->find('list');
		$responses = $this->FeedbackResponse->Response->find('list');
		$this->set(compact('feedbacks', 'mealItems', 'responses'));
	}

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->FeedbackResponse->id = $id;
		if (!$this->FeedbackResponse->exists()) {
			throw new NotFoundException(__('Invalid feedback response'));
		}
		if ($this->FeedbackResponse->delete()) {
			$this->Session->setFlash(__('Feedback response deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Feedback response was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
