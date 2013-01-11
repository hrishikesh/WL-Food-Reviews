<?php
App::uses('Response', 'Model');

/**
 * Response Test Case
 *
 */
class ResponseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.response',
		'app.feedback_response',
		'app.feedback',
		'app.user',
		'app.role',
		'app.meal',
		'app.meal_item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Response = ClassRegistry::init('Response');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Response);

		parent::tearDown();
	}

}
