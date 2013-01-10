<?php
App::uses('MealItem', 'Model');

/**
 * MealItem Test Case
 *
 */
class MealItemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.meal_item',
		'app.meal',
		'app.feedback_response',
		'app.feedback',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MealItem = ClassRegistry::init('MealItem');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MealItem);

		parent::tearDown();
	}

}
