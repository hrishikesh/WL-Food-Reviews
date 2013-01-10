<?php
App::uses('AppModel', 'Model');
/**
 * FeedbackResponse Model
 *
 * @property Feedback $Feedback
 * @property MealItem $MealItem
 */
class FeedbackResponse extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'feedback_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'meal_item_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'response_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Feedback' => array(
			'className' => 'Feedback',
			'foreignKey' => 'feedback_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'MealItem' => array(
			'className' => 'MealItem',
			'foreignKey' => 'meal_item_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
