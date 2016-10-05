<?php

/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */

require __DIR__ . "/../../vendor/autoload.php";

use Guessing\Guessing as Guessing;
use Guessing\GuessingView as View;


class GuessingViewTest extends \PHPUnit_Framework_TestCase
{
	const SEED = 1234;

	public function test_construct() {
		$guessing = new Guessing(self::SEED);
		$view = new View($guessing);
		$this->assertInstanceOf('Guessing\GuessingView', $view);
	}

	public function test_present() {
		$guessing = new Guessing(self::SEED);
		$view = new View($guessing);
		$status = $view->present();
		$this->assertContains("Guessing Game", $status);
		$this->assertContains("Try to guess the number.", $status);
		$this->assertEquals(1, $guessing->getGuess());
		$this->assertEquals(23, $guessing->getNumber());
		$this->assertEquals(0, $guessing->getNumGuesses());

		$guessing->guess(0);
		$status = $view->present();
		$this->assertContains("Guessing Game", $status);
		$this->assertContains("Your guess of 0 is invalid!", $status);
		$this->assertEquals(Guessing::INVALID, $guessing->check());
		$this->assertEquals(0, $guessing->getGuess());
		$this->assertEquals(23, $guessing->getNumber());
		$this->assertEquals(0, $guessing->getNumGuesses());

		$guessing->guess('hello');
		$status = $view->present();
		$this->assertContains("Guessing Game", $status);
		$this->assertContains("Your guess of hello is invalid!", $status);
		$this->assertEquals(Guessing::INVALID, $guessing->check());
		$this->assertEquals('hello', $guessing->getGuess());
		$this->assertEquals(23, $guessing->getNumber());
		$this->assertEquals(0, $guessing->getNumGuesses());

		$guessing->guess(-40);
		$status = $view->present();
		$this->assertContains("Guessing Game", $status);
		$this->assertContains("Your guess of -40 is invalid!", $status);
		$this->assertEquals(Guessing::INVALID, $guessing->check());
		$this->assertEquals(-40, $guessing->getGuess());
		$this->assertEquals(23, $guessing->getNumber());
		$this->assertEquals(0, $guessing->getNumGuesses());

		$guessing->guess(101);
		$status = $view->present();
		$this->assertContains("Guessing Game", $status);
		$this->assertContains("Your guess of 101 is invalid!", $status);
		$this->assertEquals(Guessing::INVALID, $guessing->check());
		$this->assertEquals(101, $guessing->getGuess());
		$this->assertEquals(23, $guessing->getNumber());
		$this->assertEquals(0, $guessing->getNumGuesses());

		$guessing->guess(10);
		$status = $view->present();
		$this->assertContains("Guessing Game", $status);
		$this->assertContains("After 1 guesses you are too low!", $status);
		$this->assertEquals(Guessing::TOOLOW, $guessing->check());
		$this->assertEquals(10, $guessing->getGuess());
		$this->assertEquals(23, $guessing->getNumber());
		$this->assertEquals(1, $guessing->getNumGuesses());

		$guessing->guess(90);
		$status = $view->present();
		$this->assertContains("Guessing Game", $status);
		$this->assertContains("After 2 guesses you are too high!", $status);
		$this->assertEquals(Guessing::TOOHIGH, $guessing->check());
		$this->assertEquals(90, $guessing->getGuess());
		$this->assertEquals(23, $guessing->getNumber());
		$this->assertEquals(2, $guessing->getNumGuesses());

		$guessing->guess(23);
		$status = $view->present();
		$this->assertContains("Guessing Game", $status);
		$this->assertContains("After 3 guesses you are correct!", $status);
		$this->assertContains("&nbsp;", $status);
		$this->assertEquals(Guessing::CORRECT, $guessing->check());
		$this->assertEquals(23, $guessing->getGuess());
		$this->assertEquals(23, $guessing->getNumber());
		$this->assertEquals(3, $guessing->getNumGuesses());
	}
}

/// @endcond
?>
