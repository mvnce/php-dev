<?php
require __DIR__ . "/../../vendor/autoload.php";
/** @file
 * @brief Empty unit testing template
 * @cond
 * @brief Unit tests for the class
 */
class SteampunkedControllerTest extends \PHPUnit_Framework_TestCase
{
    private $POST = array( 'new' => 'new',
        'restart' => 'restart',
        'rotate' => 'rotate',
        'discard' => 'discard',
        'open' => 'open',
        'quit' => 'quit');

    public function test_new() {

        $steampunked = new Steampunked\Steampunked();
        $controller = new \Steampunked\SteampunkedController($steampunked,$this->POST );


        $this->assertTrue($controller->isReset());
        $this->assertEquals($controller->getPage(), "index.php");
    }

    public function test_restart() {

        $steampunked = new Steampunked\Steampunked();
        $controller = new \Steampunked\SteampunkedController($steampunked, $this->POST);
        $this->assertInstanceOf('Steampunked\SteampunkedController', $controller);
        $this->assertTrue($controller->isReset());
        $this->assertEquals($controller->getPage(), "index.php");


    }

    public function test_rotate() {

        $steampunked = new Steampunked\Steampunked();
        $controller = new \Steampunked\SteampunkedController($steampunked, $this->POST);
        $this->assertInstanceOf('Steampunked\SteampunkedController', $controller);
        $this->assertTrue($controller->isReset());
        $this->assertEquals($controller->getPage(), "index.php");


    }


    public function test_discard() {

        $steampunked = new Steampunked\Steampunked();
        $controller = new \Steampunked\SteampunkedController($steampunked, $this->POST);
        $this->assertInstanceOf('Steampunked\SteampunkedController', $controller);
        $this->assertTrue($controller->isReset());
        $this->assertEquals($controller->getPage(), "index.php");


    }
    public function test_win(){
        $steampunked = new Steampunked\Steampunked();
        $controller = new \Steampunked\SteampunkedController($steampunked, $this->POST);
        $this->assertInstanceOf('Steampunked\SteampunkedController', $controller);
        $this->assertTrue($controller->isReset());
        $this->assertEquals($controller->getPage(), "index.php");


    }

    public function test_getPage(){
        $steampunked = new Steampunked\Steampunked();
        $controller = new \Steampunked\SteampunkedController($steampunked,$this->POST);
        $this->assertInstanceOf('Steampunked\SteampunkedController', $controller);
        $this->assertTrue($controller->isReset());
        $this->assertNotEquals('steampunked.php', $controller->getPage());
        $controller = new\Steampunked\SteampunkedController($steampunked,array('newgame'=>''));
        $this->assertFalse($controller->isReset());
        $this->assertEquals('steampunked.php', $controller->getPage());
    }
    public function test_isReset() {
        $steampunked = new Steampunked\Steampunked();
        $controller = new \Steampunked\SteampunkedController($steampunked,$this->POST);
        $this->assertInstanceOf('Steampunked\SteampunkedController', $controller);
        $this->assertTrue($controller->isReset());
        $this->assertNotEquals('steampunked.php', $controller->getPage());
        $controller = new\Steampunked\SteampunkedController($steampunked,array('newgame'=>''));
        $this->assertFalse($controller->isReset());
        $this->assertEquals('steampunked.php', $controller->getPage());

    }

    public function test_open() {

        $steampunked = new Steampunked\Steampunked();
        $controller = new \Steampunked\SteampunkedController($steampunked, $this->POST);
        $this->assertInstanceOf('Steampunked\SteampunkedController', $controller);
        $this->assertTrue($controller->isReset());
        $this->assertEquals($controller->getPage(), "index.php");


    }
    public function test_addPipe() {
        $steampunked = new Steampunked\Steampunked();
        $controller = new \Steampunked\SteampunkedController($steampunked,$this->POST);

        $this->assertInstanceOf('Steampunked\SteampunkedController', $controller);
        $this->assertTrue($controller->isReset());
        $this->assertEquals($controller->getPage(), "index.php");





    }

    public function test_quit() {

        $steampunked = new Steampunked\Steampunked();
        $controller = new \Steampunked\SteampunkedController($steampunked, $this->POST);
        $this->assertInstanceOf('Steampunked\SteampunkedController', $controller);
        $this->assertTrue($controller->isReset());
        $this->assertEquals($controller->getPage(), "index.php");

    }


}

/// @endcond
?>
