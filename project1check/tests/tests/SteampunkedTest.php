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
		$this->assertEquals(0, count($playerOne->getPipes()));
		$this->assertEquals(0, count($playerTwo->getPipes()));
	}

	public function test_generateNewChoices() {
		$steampunked = new Steampunked\Steampunked();
		$steampunked->create(6, 'playerOne', 'playerTwo');
		$this->assertEquals(0, count($steampunked->getChoices()));
		$steampunked->generateNewChoices();
		$this->assertEquals(5, count($steampunked->getChoices()));
	}

	public function test_changeTurn() {
		$steampunked = new Steampunked\Steampunked();
		$steampunked->create(6, 'playerOne', 'playerTwo');
		$this->assertEquals(0, $steampunked->getCurrPlayer());
		$steampunked->changeTurn();
		$this->assertEquals(1, $steampunked->getCurrPlayer());
		$steampunked->changeTurn();
		$this->assertEquals(0, $steampunked->getCurrPlayer());
	}

	public function test_addPipeToPlayer() {
		$steampunked = new Steampunked\Steampunked();
		$steampunked->create(6, 'playerOne', 'playerTwo');

		$this->assertEquals(0, count($steampunked->getPlayers()[0]->getPipes()));
		$this->assertEquals(0, count($steampunked->getPlayers()[1]->getPipes()));

		$steampunked->generateNewChoices();
		$steampunked->addPipeToPlayer(0);
		$steampunked->addPipeToPlayer(0);
		$steampunked->changeTurn();
		$steampunked->addPipeToPlayer(0);
		$steampunked->addPipeToPlayer(0);
		$this->assertEquals(2, count($steampunked->getPlayers()[0]->getPipes()));
		$this->assertEquals(2, count($steampunked->getPlayers()[1]->getPipes()));
	}
}

/// @endcond
?>
