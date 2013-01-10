<?php
App::uses('Meal', 'Model');

/**
 * Meal Test Case
 *
 */
class MealTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.meal',
		'app.feedback',
		'app.user',
		'app.feedback_response',
		'app.meal_item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Meal = ClassRegistry::init('Meal');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Meal);

		parent::tearDown();
	}

}
