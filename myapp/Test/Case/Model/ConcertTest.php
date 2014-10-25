<?php
App::uses('Concert', 'Model');

/**
 * Concert Test Case
 *
 */
class ConcertTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.concert'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Concert = ClassRegistry::init('Concert');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Concert);

		parent::tearDown();
	}

}
