<?php
/**
 * FeedbackResponseFixture
 *
 */
class FeedbackResponseFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'feedback_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'meal_item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'response_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'feedback_id' => 1,
			'meal_item_id' => 1,
			'response_id' => 1
		),
	);

}
