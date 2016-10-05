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
		$steampunked = new \Steampunked\Steampunked(6, "bob", "mary");
		$controller = new \Steampunked\SteampunkedController($steampunked, array('reset' => 1));

		$this->assertEquals('index.php', $controller->getPage());
		$this->assertTrue($controller->getReset());
	}

	public function test_giveup() {
		$steampunked = new \Steampunked\Steampunked(6, "bob", "mary");
		$controller = new \Steampunked\SteampunkedController($steampunked, array('giveup' => 1));

		$this->assertEquals('win.php?l=0&c=g', $controller->getPage());
		$this->assertTrue($controller->getGiveUp());
	}

	public function test_newgame(){
		$steampunked = new \Steampunked\Steampunked(6,"bob","mary");
		$controller = new \Steampunked\SteampunkedController($steampunked, array('newgame' => 'Start Game', 'size'=>'10 by 10', 'name1'=>'joe', 'name2'=>'jack'));

		$this->assertEquals('steampunked.php',$controller->getPage());
		$this->assertFalse($controller->getReset());

		$steampunked = new \Steampunked\Steampunked(6,"bob","mary");
		$controller = new \Steampunked\SteampunkedController($steampunked, array('newgame' => array('size'=>'10 by 10', 'name2'=>'jack')));

		$this->assertEquals('index.php', $controller->getPage());
	}
/*	public function test_rotate() {
		$steampunked = new \Steampunked\Steampunked(6, "bob", "mary");
		$controller = new \Steampunked\SteampunkedController($steampunked, array('rotate' => ))
	}*/

	/*public function test_placepipe() {//wait until function is in place, see if in_array($pipe, $layout)
		$steampunked = new \Steampunked\Steampunked(6, "bob", "mary");
		$pipe = new \Steampunked\Pipe(2,2,4);
		$controller = new \Steampunked\SteampunkedController($steampunked, array('place' => array($pipe, 2, 4)));

		$this->assertEquals('steampunked.php', $controller->getPage());
		$this->assertTrue
	}*/

	/*
	 * test open valve
	 */
}

/// @endcond
?>
