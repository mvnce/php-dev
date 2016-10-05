<?php
require __DIR__ . "/../../vendor/autoload.php";
/** @file
 * @brief Empty unit testing template
 * @cond
 * @brief Unit tests for the class
 */
class SteampunkedTest extends \PHPUnit_Framework_TestCase
{
    const SEED = 1422668587;

    public function test_construct() {
        $steampunked = new Steampunked\Steampunked();
        $this->assertInstanceOf("Steampunked\Steampunked", $steampunked);

        $steampunked = new Steampunked\Steampunked(self::SEED);
        $this->assertInstanceOf("Steampunked\Steampunked", $steampunked);
    }
    public function test_setGetGridSize() {
        $steampunked = new Steampunked\Steampunked();
        $steampunked->setGridSize(6);
        $this->assertEquals(6, $steampunked->getGridSize());
        $steampunked->setGridSize(10);
        $this->assertEquals(10, $steampunked->getGridSize());
        $steampunked->setGridSize(20);
        $this->assertEquals(20, $steampunked->getGridSize());

    }

    public function test_setGetPlayer() {
        $steampunked = new Steampunked\Steampunked();
        $steampunked->setPlayer1("Bill");
        $steampunked->setPlayer2("Bob");
        $this->assertEquals("Bill", $steampunked->getPlayer1());
        $this->assertEquals("Bob", $steampunked->getPlayer2());
        $steampunked->setPlayer1("p1");
        $steampunked->setPlayer2("p2");
        $this->assertEquals("p1", $steampunked->getPlayer1());
        $this->assertEquals("p2", $steampunked->getPlayer2());
    }

    public function test_setActivePlayer() {
        $steampunked = new Steampunked\Steampunked();
        $steampunked->setActivePlayer("Bill");
        $this->assertEquals("Bill",$steampunked->getActivePlayer());
        $steampunked->setActivePlayer("Bobby");
        $this->assertEquals("Bobby",$steampunked->getActivePlayer());
        $steampunked->setActivePlayer("Allen");
        $this->assertEquals("Allen",$steampunked->getActivePlayer());
    }

    public function test_switchActivePlayer() {
        $steampunked = new Steampunked\Steampunked();
        $steampunked->setPlayer1("p1");
        $steampunked->setPlayer2("p2");
        $steampunked->setActivePlayer("p1");

        $steampunked->switchActivePlayer();

        $this->assertEquals("p2", $steampunked->getActivePlayer());
        $this->assertNotEquals("p1", $steampunked->getActivePlayer());

        $steampunked->switchActivePlayer();

        $this->assertEquals("p1", $steampunked->getActivePlayer());
        $this->assertNotEquals("p2", $steampunked->getActivePlayer());
        $steampunked->switchActivePlayer();
        $this->assertEquals("p2", $steampunked->getActivePlayer());
        $this->assertNotEquals("p1", $steampunked->getActivePlayer());

    }



    public function test_setGetGivingUp() {
        $steampunked = new Steampunked\Steampunked();
        $steampunked->setGiveUp(true);
        $this->assertEquals(true, $steampunked->isGivingUp());
        $this->assertNotEquals(false, $steampunked->isGivingUp());


        $steampunked->setGiveUp(false);
        $this->assertEquals(false, $steampunked->isGivingUp());
        $this->assertNotEquals(true, $steampunked->isGivingUp());
    }
    public function test_Winning(){
        $steampunked = new Steampunked\Steampunked();
        $steampunked->setWinner(true);
        $this->assertEquals(true, $steampunked->isWinner());
        $this->assertNotEquals(false, $steampunked->isWinner());

        $steampunked->setWinner(false);
        $this->assertEquals(false, $steampunked->isWinner());
        $this->assertNotEquals(true, $steampunked->isWinner());

    }

    public function test_addPipeToPlayer()
    {
        $steampunked = new Steampunked\Steampunked();
        $p1 = new Steampunked\Player("p1", 123954);
        $p2 = new Steampunked\Player("p2", 529063);
        $steampunked->setPlayer1($p1);
        $steampunked->setPlayer2($p2);
        $steampunked->setGridSize(6);
        $steampunked->setActivePlayer($steampunked->getPlayer1());
        $steampunked->addPipe(0,0,0);
        $steampunked->addPipe(0,1,2);
        $errorMessage = $steampunked->getErrorMessage();
        $this->assertNotEquals(null, $steampunked->getPlayer1()->getPipes());

        $this->assertNotEquals(null, $steampunked->getPlayer2()->getPipes());
        $this->assertEquals(null, $steampunked->getPipes());
    }
    public function test_setSelectedPipe(){
        $steampunked = new Steampunked\Steampunked();
        $p1 = new Steampunked\Player("p1", 123954);
        $p2 = new Steampunked\Player("p2", 529063);
        $steampunked->setPlayer1($p1);
        $steampunked->setPlayer2($p2);
        $steampunked->setGridSize(6);
        $steampunked->setActivePlayer($steampunked->getPlayer1());
        $steampunked->setSelectedPipe(7);
        $this->assertEquals($p1->getSelectedPipe(),Steampunked\Pipe::STRAIGHT_PIPE);


    }
    public function test_openValue(){
        $steampunked = new Steampunked\Steampunked();
        $p1 = new Steampunked\Player("p1", 123954);
        $p2 = new Steampunked\Player("p2", 529063);
        $steampunked->setPlayer1($p1);
        $steampunked->setPlayer2($p2);
        $steampunked->setGridSize(6);
        $steampunked->setActivePlayer($steampunked->getPlayer1());
        $pipe = new Steampunked\Pipe(7, 0);
        $this->assertEquals('assets/straight-h.png', $pipe->getUris()[0]);
        $pipe->setPlayer($p1);
        $this->assertEquals($steampunked->getPlayer1(),$pipe->getPlayer());
        $steampunked->getPlayer1();
        $this->assertEquals($steampunked->isWinner(),false);
        $steampunked->setWinner($p1);
        $this->assertEquals($steampunked->isWinner(),$p1);
        $topStartPipe = new Steampunked\StartPipe(Steampunked\Pipe::START_PIPE);
        $topStartPipe->openValve();
        $this->assertEquals(1,$topStartPipe->getDirection());
    }
    public function test_isValidPipePlacement() {
        $steampunked = new Steampunked\Steampunked();
        $p1 = new Steampunked\Player("p1", 123954);
        $p2 = new Steampunked\Player("p2", 529063);
        $steampunked->setPlayer1($p1);
        $steampunked->setPlayer2($p2);
        $steampunked->setActivePlayer($steampunked->getPlayer1());
        $steampunked->createGrid();
        //player 1 pipe palcement of horizontal straight pipe
        $newPipe = new Steampunked\Pipe(7,0);
        $steampunked->getActivePlayer()->setPipeAtIndex(2, $newPipe);
        $this->assertTrue($steampunked->isValidPipePlacement(2,1,0)[0]);
        $steampunked->addPipe(2,1,0);

        //player 2 pipe placement of horizontal straight pipe
        $newPipe = new Steampunked\Pipe(7,0);
        $steampunked->getActivePlayer()->setPipeAtIndex(0, $newPipe);
        $this->assertTrue($steampunked->isValidPipePlacement(0,1,5)[0]);
        $steampunked->addPipe(0,1,5);

        //player 1 pipe placement of t pipe west north east
        $newPipe = new Steampunked\Pipe(5,0);
        $steampunked->getActivePlayer()->setPipeAtIndex(1, $newPipe);
        $this->assertFalse($steampunked->isValidPipePlacement(1,2,0)[0]);
        //rotate the pipe twice to make it t pipe of west south east
        $steampunked->rotatePipe(1);
        $steampunked->rotatePipe(1);
        //now that pipe is rotated to a t pipe of west south east
        $this->assertTrue($steampunked->isValidPipePlacement(1,2,0)[0]);
        $steampunked->addPipe(1,2,0);

        //player 2 pipe placement of curved west north pipe
        $newPipe = new Steampunked\Pipe(6,0);
        $steampunked->getActivePlayer()->setPipeAtIndex(4, $newPipe);
        $this->assertTrue($steampunked->isValidPipePlacement(4,2,5)[0]);
        $steampunked->addPipe(4,2,5);

        //player 1 pipe placement of t pipe of west north east
        $newPipe = new Steampunked\Pipe(5,0);
        $steampunked->getActivePlayer()->setPipeAtIndex(1, $newPipe);
        $this->assertTrue($steampunked->isValidPipePlacement(1,2,1)[0]);
        $steampunked->addPipe(1,2,1);

        //player 2 pipe placement of t pipe of west north east fails
        $newPipe = new Steampunked\Pipe(5,0);
        $steampunked->getActivePlayer()->setPipeAtIndex(0, $newPipe);
        $this->assertFalse($steampunked->isValidPipePlacement(0,2,4)[0]);
        $steampunked->rotatePipe(0);
        $steampunked->rotatePipe(0);
        //now it is valid
        $this->assertTrue($steampunked->isValidPipePlacement(0,2,4)[0]);
        $steampunked->addPipe(0,2,4);

        //player 1 pipe placement of curved west north pipe
        $newPipe = new Steampunked\Pipe(6,0);
        $steampunked->getActivePlayer()->setPipeAtIndex(1, $newPipe);
        $this->assertTrue($steampunked->isValidPipePlacement(1,3,1)[0]);
        $steampunked->addPipe(1,3,1);

        //player 2 pipe placement of curved west north pipe
        $newPipe = new Steampunked\Pipe(6,0);
        $steampunked->getActivePlayer()->setPipeAtIndex(0, $newPipe);
        $this->assertTrue($steampunked->isValidPipePlacement(0,3,4)[0]);
        $steampunked->addPipe(0,3,4);

        //player 1 pipe placement of cap on north facing pipe at location x:3 y:0 will fail because it blocks the leak
        //that faces east of pipe at location at x:2 y:0. must first rotate the pipe to try to place it
        $newPipe = new Steampunked\Pipe(4,0);
        $steampunked->getActivePlayer()->setPipeAtIndex(0, $newPipe);
        $steampunked->rotatePipe(0);
        $steampunked->rotatePipe(0);
        $this->assertFalse($steampunked->isValidPipePlacement(0,3,0)[0]);
        //rotate again to demonstrate that you also cannot place it on the east leak either, because it will block the north leak
        $steampunked->rotatePipe(0);
        $this->assertFalse($steampunked->isValidPipePlacement(0,3,0)[0]);

        //player 1 pipe placement of west south curved pipe. first must rotate the pipe to those directions
        $newPipe = new Steampunked\Pipe(6,0);
        $steampunked->getActivePlayer()->setPipeAtIndex(1, $newPipe);
        $steampunked->rotatePipe(1);
        $steampunked->rotatePipe(1);
        $steampunked->rotatePipe(1);
        $this->assertTrue($steampunked->isValidPipePlacement(1,3,0)[0]);
        $steampunked->addPipe(1,3,0);

        //player 2 pipe placement of north east south t pipe fails because the leak would go into player 1 area, which is
        //out of bounds
        $newPipe = new Steampunked\Pipe(5,0);
        $steampunked->getActivePlayer()->setPipeAtIndex(4, $newPipe);
        $steampunked->rotatePipe(4);
        $this->assertFalse($steampunked->isValidPipePlacement(4,3,3)[0]);
        //rotate again and now the t pipe is east west south, good!
        $steampunked->rotatePipe(4);
        $this->assertTrue($steampunked->isValidPipePlacement(4,3,3)[0]);
        $steampunked->addPipe(4,3,3);

        //player 1 pipe placement of east south curved pipe
        $newPipe = new Steampunked\Pipe(6,0);
        $steampunked->getActivePlayer()->setPipeAtIndex(0, $newPipe);
        $steampunked->rotatePipe(0);
        $steampunked->rotatePipe(0);
        $this->assertTrue($steampunked->isValidPipePlacement(0,1,1)[0]);
        $steampunked->addPipe(0,1,1);

        //player 2 pipe placement of horizontal pipe
        $newPipe = new Steampunked\Pipe(7,0);
        $steampunked->getActivePlayer()->setPipeAtIndex(0, $newPipe);
        $this->assertTrue($steampunked->isValidPipePlacement(0,4,3)[0]);
        $steampunked->addPipe(0,4,3);

        //player 1 pipe placement of vertical straight pipe fails because it would go into player 2 area
        $newPipe = new Steampunked\Pipe(7,0);
        $steampunked->getActivePlayer()->setPipeAtIndex(0, $newPipe);
        $steampunked->rotatePipe(0);
        $this->assertFalse($steampunked->isValidPipePlacement(0,1,2)[0]);
        //player 1 pipe palcement of north east ninety pipe
        $newPipe = new Steampunked\Pipe(6,0);
        $steampunked->getActivePlayer()->setPipeAtIndex(0,$newPipe);
        $steampunked->rotatePipe(0);
        $this->assertTrue($steampunked->isValidPipePlacement(0,1,2)[0]);
        $steampunked->addPipe(0,1,2);

        //player 2 pipe placement of horizontal pipe fails because it would point out of bounds
        $newPipe = new Steampunked\Pipe(7,0);
        $steampunked->getActivePlayer()->setPipeAtIndex(0, $newPipe);
        $this->assertFalse($steampunked->isValidPipePlacement(0,1,4)[0]);
        //place it correctly
        $this->assertTrue($steampunked->isValidPipePlacement(0,5,3)[0]);
        $steampunked->addPipe(0,5,3);

        //player 1 pipe placement of horizontal pipe
        $newPipe = new Steampunked\Pipe(7,0);
        $steampunked->getActivePlayer()->setPipeAtIndex(0, $newPipe);
        $this->assertTrue($steampunked->isValidPipePlacement(0,2,2)[0]);
        $steampunked->addPipe(0,2,2);

        //player 2 pipe placement of horizontal pipe fails because it would point to the right out of bounds
        $newPipe = new Steampunked\Pipe(7,0);
        $steampunked->getActivePlayer()->setPipeAtIndex(0, $newPipe);
        $this->assertFalse($steampunked->isValidPipePlacement(0,6,3)[0]);
        //just place correctly
        $steampunked->addPipe(0,3,4);

        //player 1 pipe placement of west north ninety pipe fails because it leaks into another pipe, not connecting though
        $newPipe = new Steampunked\Pipe(6, 0);
        $steampunked->getActivePlayer()->setPipeAtIndex(0, $newPipe);
        $this->assertFalse($steampunked->isValidPipePlacement(0,3,2)[0]);


    }
    public function test_quit() {
        $steampunked = new Steampunked\Steampunked();
        $p1 = new Steampunked\Player("p1", 123954);
        $p2 = new Steampunked\Player("p2", 529063);
        $steampunked->setPlayer1($p1);
        $steampunked->setPlayer2($p2);
        $steampunked->setActivePlayer($p1);
        $steampunked->quit();
        $this->assertTrue($steampunked->isGivingUp());
        $this->assertEquals($p2, $steampunked->getActivePlayer());
    }

    public function test_set_getActivePlayer() {
        $steampunked = new Steampunked\Steampunked();
        $steampunked->setPlayer1("bob");
        $steampunked->setPlayer2("bobby");
        $steampunked->setActivePlayer($steampunked->getPlayer1());
        $this->assertEquals("bob",$steampunked->getActivePlayer());
        $steampunked->switchActivePlayer();
        $this->assertEquals("bobby", $steampunked->getActivePlayer());
        $steampunked->switchActivePlayer();
        $this->assertEquals("bob",$steampunked->getActivePlayer());

    }
    public function test_set_isGiveUp() {
        $steampunked = new Steampunked\Steampunked();
        $this->assertFalse($steampunked->isGivingUp());
        $steampunked->setGiveUp(true);
        $this->assertTrue($steampunked->isGivingUp());
    }

}

/// @endcond
?>
