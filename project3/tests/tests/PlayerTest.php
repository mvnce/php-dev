<?php
require __DIR__ . "/../../vendor/autoload.php";

/**
 * Created by PhpStorm.
 * User: Bobby
 * Date: 2/29/16
 * Time: 9:35 PM
 */
class PlayerTest extends \PHPUnit_Framework_TestCase
{
    public function test_construct(){
        $steampunked = new Steampunked\Steampunked();
        $p1 = new Steampunked\Player("p1", 123954);
        $p2 = new Steampunked\Player("p2", 529063);
        $steampunked->setPlayer1($p1);
        $steampunked->setPlayer2($p2);

        $this->assertEquals($p1,$steampunked->getPlayer1());
        $this->assertEquals("p1",$p1->getName());

        $p1->setSelectedPipe(1);

        $this->assertEquals("p2",$p2->getName());


    }
    public function test_getName(){
        $steampunked = new Steampunked\Steampunked();
        $p1 = new Steampunked\Player("p1", 123954);
        $p2 = new Steampunked\Player("p2", 529063);
        $steampunked->setPlayer1($p1);
        $steampunked->setPlayer2($p2);
        $this->assertEquals($p1,$steampunked->getPlayer1());
        $this->assertEquals("p1",$p1->getName());
        $this->assertEquals($p2,$steampunked->getPlayer2());
        $this->assertEquals("p2",$p2->getName());

    }
    public function test_setName(){
        $steampunked = new Steampunked\Steampunked();
        $p1 = new Steampunked\Player("p1", 123954);
        $p2 = new Steampunked\Player("p2", 529063);
        $steampunked->setPlayer1($p1);
        $steampunked->setPlayer2($p2);
        $this->assertEquals($p1,$steampunked->getPlayer1());
        $this->assertEquals("p1",$p1->getName());
        $p1->setName("bobby");
        $this->assertEquals("bobby",$p1->getName());
        $p2->setName("bob");
        $this->assertEquals("bob",$p2->getName());



    }
    public function test_getPipes(){
        $steampunked = new Steampunked\Steampunked();
        $p1 = new Steampunked\Player("p1", 123954);
        $p2 = new Steampunked\Player("p2", 529063);
        $steampunked->setPlayer1($p1);
        $steampunked->setPlayer2($p2);

        $pipe = new Steampunked\Pipe(7, 0);
        $this->assertEquals('assets/straight-h.png', $pipe->getUris()[0]);
        $pipe->setPlayer($p1);
        $this->assertEquals($steampunked->getPlayer1(),$pipe->getPlayer());

        $this->assertEquals('p1',$pipe->getPlayer()->getName());
        $this->assertEquals($pipe->getPlayer(),$p1);
       // $this->assertEquals($pipe,$p1->getPipes());

    }
    public function test_getSelectedPipe(){
        $steampunked = new Steampunked\Steampunked();
        $p1 = new Steampunked\Player("p1", 123954);
        $p2 = new Steampunked\Player("p2", 529063);
        $steampunked->setPlayer1($p1);
        $steampunked->setPlayer2($p2);
        $pipe = new Steampunked\Pipe(7, 0);
        $this->assertEquals('assets/straight-h.png', $pipe->getUris()[0]);
        $pipe->setPlayer($p1);
        $this->assertEquals($steampunked->getPlayer1(),$pipe->getPlayer());

        $this->assertEquals('p1',$pipe->getPlayer()->getName());
        $p1->setSelectedPipe(7);
        $this->assertEquals(Steampunked\Pipe::STRAIGHT_PIPE,$p1->getSelectedPipe());


    }
    public function test_setSelectedPipe(){
        $steampunked = new Steampunked\Steampunked();
        $p1 = new Steampunked\Player("p1", 123954);
        $p2 = new Steampunked\Player("p2", 529063);
        $steampunked->setPlayer1($p1);
        $steampunked->setPlayer2($p2);
        $pipe = new Steampunked\Pipe(7, 0);
        $this->assertEquals('assets/straight-h.png', $pipe->getUris()[0]);
        $pipe->setPlayer($p1);
        $this->assertEquals($steampunked->getPlayer1(),$pipe->getPlayer());

        $this->assertEquals('p1',$pipe->getPlayer()->getName());
        $p1->setSelectedPipe(7);
        $this->assertEquals(Steampunked\Pipe::STRAIGHT_PIPE,$p1->getSelectedPipe());
        $p1->setSelectedPipe(6);
        $this->assertEquals(Steampunked\Pipe::NINETY_PIPE,$p1->getSelectedPipe());
        $p1->setSelectedPipe(5);
        $this->assertEquals(Steampunked\Pipe::TEE_PIPE,$p1->getSelectedPipe());
        $p1->setSelectedPipe(4);
        $this->assertEquals(Steampunked\Pipe::CAP_PIPE,$p1->getSelectedPipe());


    }
    public function test_generatePipes() {
        $steampunked = new Steampunked\Steampunked();
        $p1 = new Steampunked\Player("p1", 123954);
        $p2 = new Steampunked\Player("p2", 529063);
        $steampunked->setPlayer1($p1);
        $steampunked->setPlayer2($p2);
        $p1->generatePipes();



    }

    public function test_replacePipe() {
        $steampunked = new Steampunked\Steampunked();
        $p1 = new Steampunked\Player("p1", 123954);
        $p2 = new Steampunked\Player("p2", 529063);
        $steampunked->setPlayer1($p1);
        $steampunked->setPlayer2($p2);
        $pipe = new Steampunked\Pipe(7, 0);
        $this->assertEquals('assets/straight-h.png', $pipe->getUris()[0]);
        $ni = $p1->generatePipes();
        $p1->replacePipe(1);
        $this->assertEquals($ni[1],$p1->generatePipes());



    }

}