<?php

/** @file
 * @brief Empty unit testing for Steampunked
 * @cond 
 * @brief Unit tests for the class 
 */

require __DIR__ . "/../../vendor/autoload.php";


class SteampunkedTest extends \PHPUnit_Framework_TestCase
{
	const SEED = 1234;

	public function test_construct() {
		$steampunked = new Steampunked\Steampunked(self::SEED);

		$this->assertInstanceOf('Steampunked\Steampunked', $steampunked);
	}

	public function test_create() {
		$steampunked = new Steampunked\Steampunked();
		$steampunked->create(6, 'playerOne', 'playerTwo');

		$this->assertEquals(2, count($steampunked->getPlayers()));

		$playerOne = $steampunked->getPlayers()[0];
		$playerTwo = $steampunked->getPlayers()[1];
		$this->assertEquals('playerOne', $playerOne->getName());
		$this->assertEquals('playerTwo', $playerTwo->getName());
		$this->assertEquals(3, count($playerOne->getPipes()));
		$this->assertEquals(3, count($playerTwo->getPipes()));
	}

	public function test_changeTurn() {
		$steampunked = new Steampunked\Steampunked();
		$steampunked->create(6, 'playerOne', 'playerTwo');
		$this->assertEquals(0, $steampunked->getCurrPlayerId());
		$steampunked->changeTurn();
		$this->assertEquals(1, $steampunked->getCurrPlayerId());
		$steampunked->changeTurn();
		$this->assertEquals(0, $steampunked->getCurrPlayerId());
	}

	public function test_addPipeToPlayer() {
		$steampunked = new Steampunked\Steampunked();
		$steampunked->create(6, 'playerOne', 'playerTwo');

		$this->assertEquals(3, count($steampunked->getPlayers()[0]->getPipes()));
		$this->assertEquals(3, count($steampunked->getPlayers()[1]->getPipes()));

		$steampunked->setChoice(1);
		$this->assertEquals(0, $steampunked->getCurrPlayerId());
		$steampunked->addPipeToPlayer(2, 2);
	}

	public function test_openValveOption() {
		$steampunked = new Steampunked\Steampunked();
		$steampunked->create(6, 'playerOne', 'playerTwo');

		$this->assertEquals(0, $steampunked->openValveOption());
	}
}

/// @endcond
?>
