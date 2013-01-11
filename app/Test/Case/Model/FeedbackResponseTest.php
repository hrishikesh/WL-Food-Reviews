<?php
App::uses('FeedbackResponse', 'Model');

/**
 * FeedbackResponse Test Case
 *
 */
class FeedbackResponseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.feedback_response',
		'app.feedback',
		'app.user',
		'app.role',
		'app.meal',
		'app.meal_item',
		'app.response'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FeedbackResponse = ClassRegistry::init('FeedbackResponse');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FeedbackResponse);

		parent::tearDown();
	}

}
