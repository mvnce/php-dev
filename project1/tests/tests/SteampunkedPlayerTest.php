<?php


require __DIR__ . "/../../vendor/autoload.php";

class SteampunkedPlayerTest extends \PHPUnit_Framework_TestCase
{
	public function test_construct() {
		$player = new Steampunked\Player('name', 0, 6);
		$this->assertInstanceOf('Steampunked\Player', $player);

		$this->assertEquals(6, $player->getSize());

		$numChoices = count($player->getPipeChoices());
		$this->assertEquals(5, $numChoices);

		$numLeaks = count($player->getLeaks());
		$this->assertEquals(0, $numLeaks);

		$this->assertEquals('name', $player->getName());

		$numPipes = count($player->getPipes());
		$this->assertEquals(3, $numPipes);

		foreach ($player->getPipes() as $row) {
			$this->assertEquals(6, count($row));
		}

	}

	public function test_addPipe() {
		$player = new Steampunked\Player('name', 0, 6);

		$this->assertEquals(null, $player->getPipes()[1][3]);

		$pipe = $player->getPipeChoices()[2];

		$player->addPipe(2, 1, 3);

		$this->assertNotEquals(null, $player->getPipes()[1][3]);
		$this->assertEquals($pipe, $player->getPipes()[1][3]);
	}

	public function test_rotateOption() {
		$player = new Steampunked\Player('name', 0, 6);

		$direction = clone $player->getPipeChoices()[0];

		$player->rotateOption(0);
		$this->assertNotEquals($direction, $player->getPipeChoices()[0]);
	}

	public function test_discardOption() {
		$player = new Steampunked\Player('name', 0, 6);

		$direction = clone $player->getPipeChoices()[3];

		$player->rotateOption(3);
		$this->assertNotEquals($direction, $player->getPipeChoices()[3]);
	}

	public function test_checkLeaks() {
		$player = new Steampunked\Player('name', 0, 6);

		$this->assertEquals(null, $player->getLeaks());

		$player->addPipe(2, 0, 0);
		$player->checkLeaks();
		$this->assertNotEquals(null, $player->getLeaks());
	}

	public function test_pipeGenerator() {
		$player = new Steampunked\Player('name', 0, 6);

		$this->assertInstanceOf('Steampunked\Pipe', $player->pipeGenerator(123));
	}
}

/// @endcond
?>
