<?php
require __DIR__ . "/../../vendor/autoload.php";
/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
class SteampunkedControllerTest extends \PHPUnit_Framework_TestCase
{
	public function test_construct() {
		$steampunked = new \Steampunked\Steampunked(6, "bob", "mary");
		$controller = new \Steampunked\SteampunkedController($steampunked, array());

		$this->assertInstanceOf('Steampunked\SteampunkedController', $controller);
		$this->assertFalse($controller->getGiveUp());
		$this->assertFalse($controller->getReset());
		$this->assertEquals($controller->getPage(), 'steampunked.php');
	}

	//test new controller
//	public function test_discard() {
//		$steampunked = new \Steampunked\Steampunked(6, "bob", "mary");
//		$pipe = $steampunked->getPlayer(0)->getPipeOptions()[2]->getPipeType();
//		$controller = new \Steampunked\SteampunkedController($steampunked, array('discard' => 2));
//		$this->assertNotEquals($steampunked->getPlayers(0)->getPipeOptions()[2]->getPipeType(), $pipe);
	//}

	public function test_new() {
		$steampunked = new \Steampunked\Steampunked(5);
		$controller = new \Steampunked\SteampunkedController($steampunked, array('newgame' => 'Start Game', 'size'=>10, 'name1'=>'joe', 'name2'=>'jack'));

		$this->assertEquals('steampunked.php', $controller->getPage());

		$steampunked = new \Steampunked\Steampunked(5);
		$controller = new \Steampunked\SteampunkedController($steampunked, array('newgame' => 'Start Game', 'size'=>10, 'name1'=>'', 'name2'=>'jack'));

		$this->assertEquals('index.php', $controller->getPage());
	}

	public function test_giveup() {
		$steampunked = new \Steampunked\Steampunked(5);
		$controller = new \Steampunked\SteampunkedController($steampunked, array('newgame' => 'Start Game', 'size'=>10, 'name1'=>'joe', 'name2'=>'jack'));
		$controller = new \Steampunked\SteampunkedController($steampunked, array('giveup' => true));
		$this->assertEquals('win.php?l=0&c=g', $controller->getPage());
		$this->assertTrue($controller->getGiveUp());
	}

	public function test_newgame(){
		$steampunked = new \Steampunked\Steampunked(5);
		$controller = new \Steampunked\SteampunkedController($steampunked, array('newgame' => 'Start Game', 'size'=>10, 'name1'=>'joe', 'name2'=>'jack'));

		$this->assertEquals('steampunked.php',$controller->getPage());
		$this->assertFalse($controller->getReset());

		$steampunked = new \Steampunked\Steampunked(6,"bob","mary");
		$controller = new \Steampunked\SteampunkedController($steampunked, array('newgame' => array('size'=>'10 by 10', 'name2'=>'jack')));

		$this->assertEquals('index.php', $controller->getPage());
	}

	public function test_rotate() {
		$steampunked = new \Steampunked\Steampunked(5);
		$controller = new \Steampunked\SteampunkedController($steampunked, array('newgame' => 'Start Game', 'size'=>10, 'name1'=>'joe', 'name2'=>'jack'));

		$pipe_dir = $steampunked->getPlayers()[0]->getPipeChoices()[1]->getDirection();
		$steampunked->setChoice(1);
		$controller = new \Steampunked\SteampunkedController($steampunked, array('rotate' => "Rotate"));
		$new_pipe_dir = $steampunked->getPlayers()[0]->getPipeChoices()[1]->getDirection();

		$this->assertEquals('steampunked.php',$controller->getPage());
		$this->assertNotEquals($pipe_dir, $new_pipe_dir);
	}

	/*
	 * test open valve
	 */
	public function test_open() {
		$steampunked = new \Steampunked\Steampunked(5);
		$controller = new \Steampunked\SteampunkedController($steampunked, array('newgame' => 'Start Game', 'size'=>10, 'name1'=>'joe', 'name2'=>'jack'));

		$controller = new \Steampunked\SteampunkedController($steampunked, array('open' => 1));
		$this->assertEquals($controller->getPage(), 'win.php?l=0&c=o');
	}
}

/// @endcond
?>
