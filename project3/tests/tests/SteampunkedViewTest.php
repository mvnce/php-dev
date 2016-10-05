<?php
require __DIR__ . "/../../vendor/autoload.php";
/** @file
 * @brief Empty unit testing template
 * @cond
 * @brief Unit tests for the class
 */
class SteampunkedViewTest extends \PHPUnit_Framework_TestCase
{
    public function test_construct(){
        $steampunked = new Steampunked\Steampunked();
        $p1 = new Steampunked\Player("p1", 123954);
        $p2 = new Steampunked\Player("p2", 529063);
        $steampunked->setPlayer1($p1);
        $steampunked->setPlayer2($p2);
        $steampunked->setActivePlayer($steampunked->getPlayer1());
        $steampunked->createGrid();
        $steampunkedView = new Steampunked\SteampunkedView($steampunked);
        $view = $steampunkedView->presentControls();

        $this->assertContains('<input type="submit" name="rotate" value="Rotate">', $view);

        $this->assertInstanceOf('Steampunked\SteampunkedView',$steampunkedView);

    }
    public function test_presentHeader() {
        $steampunked = new Steampunked\Steampunked();
        $p1 = new Steampunked\Player("p1", 123954);
        $p2 = new Steampunked\Player("p2", 529063);
        $steampunked->setPlayer1($p1);
        $steampunked->setPlayer2($p2);
        $steampunked->setActivePlayer($steampunked->getPlayer1());

        $steampunked->createGrid();
        $steampunkedView = new Steampunked\SteampunkedView($steampunked);
        $errorMessage = $steampunked->getErrorMessage();


        $view = $steampunkedView->presentHeader();
        $player1 = $p1->getName();
        $player2 = $p2->getName();
        $activePlayerName = $steampunked->getActivePlayer()->getName();

        $this->assertContains('<div id="game">', $view);
        $this->assertContains('<p><img src="assets/title.png" alt="Steam punked logo"></p>', $view);
        $this->assertContains('<p class="large-text">Player 1: '.$player1.'&nbsp;Player 2: '.$player2.'</p>', $view);


        $this->assertContains('<p class="large-text-alert">'.$activePlayerName.' it\'s your move.</p>', $view);

        $this->assertContains('<p class="large-text-error">'.$errorMessage.'</p>',$view);

        //restart steampunked game. player 1 will forfeit so player 2 will win. test that works
        $steampunked->restartGame();
        //make sure it is player 1's move again.
        $this->assertEquals($steampunked->getActivePlayer()->getName(), $steampunked->getPlayer1()->getName());
        //player 1 forfeits.
        $steampunked->quit();
        $steampunkedView = new Steampunked\SteampunkedView($steampunked);
        $this->assertContains('<p class="large-text-alert">'.$steampunked->getPlayer2()->getName().' won!</p>',$steampunkedView->presentHeader());

        //restart the game. player 2 will forfeit so player 1 will win.
        $steampunked->restartGame();
        $steampunked->setActivePlayer($steampunked->getPlayer2());
        //make sure it is player 2's turn
        $this->assertEquals($steampunked->getActivePlayer()->getName(), $steampunked->getPlayer2()->getName());
        //player 2 forfeit
        $steampunked->quit();
        $steampunkedView = new Steampunked\SteampunkedView($steampunked);
        $this->assertContains('<p class="large-text-alert">'.$steampunked->getPlayer1()->getName().' won!</p>', $steampunkedView->presentHeader());

        //restart steampunked game. player 1 will try to open valve without completing the game and closing all leaks.
        $steampunked->restartGame();
        //make sure it's player 1's move again
        $this->assertEquals($steampunked->getActivePlayer()->getName(), $steampunked->getPlayer1()->getName());
        //player 1 tries to open valve
        $steampunked->openValve();
        $steampunkedView = new Steampunked\SteampunkedView($steampunked);
        $this->assertContains('<p class="large-text-error">There are still leaks!</p>',$steampunkedView->presentHeader());

        //restart steampunked game. player 1 will try to place pipe incorrectly
        $steampunked->restartGame();
        //make sure it's player 1's move again
        $this->assertEquals($steampunked->getActivePlayer()->getName(), $steampunked->getPlayer1()->getName());
        //give player 1 a pipe that will not be valid to place.
        $newPipe = new Steampunked\Pipe(5,0); // a tee pipe
        $steampunked->getActivePlayer()->setPipeAtIndex(0, $newPipe);
        $steampunked->rotatePipe(0); //now tee pipe is north east south, which will not be valid to connect to start pipe
        $steampunked->addPipe(0,1,0);
        $steampunkedView = new Steampunked\SteampunkedView($steampunked);
        $this->assertContains('<p class="large-text-error">Can not place pipe</p>',$steampunkedView->presentHeader());

        //now player 1 place pipe, so it will be player 2's turn. This tests a valid pipe placement
        $steampunked->rotatePipe(0); //now tee pipe is east west south, which is valid placement to start pipe
        $steampunked->addPipe(0,1,0);
        $steampunkedView = new Steampunked\SteampunkedView($steampunked);
        $this->assertContains('<p class="large-text-alert">'.$steampunked->getPlayer2()->getName().' it\'s your move.</p>',$steampunkedView->presentHeader());

        //now player 2 will discard, which counts as turn and it will switch back to player 1's turn.
        $steampunked->discardPipe(0);
        $steampunkedView = new Steampunked\SteampunkedView($steampunked);
        $this->assertContains('<p class="large-text-alert">'.$steampunked->getPlayer1()->getName().' it\'s your move.</p>',$steampunkedView->presentHeader());

        //now player 1 will rotate pipe. this will still remain as player 1's turn.
        $steampunked->rotatePipe(0);
        $steampunkedView = new Steampunked\SteampunkedView($steampunked);
        $this->assertContains('<p class="large-text-alert">'.$steampunked->getPlayer1()->getName().' it\'s your move.</p>',$steampunkedView->presentHeader());

        //restart the game. Player 1 will place a cap on the start pipe, and try to open the valve. Although all of the
        //leaks are sealed, the pipe was not completed from start to finish.
        $steampunked->restartGame();
        $newPipe = new Steampunked\Pipe(4,0);
        $steampunked->getActivePlayer()->setPipeAtIndex(0,$newPipe);
        $steampunked->rotatePipe(0);
        $steampunked->rotatePipe(0);
        $steampunked->rotatePipe(0); //now cap is facing the west where start pipe is
        $steampunked->addPipe(0,1,0);
        //now player 2 discards turn so player 1 can open valve
        $steampunked->discardPipe(0);
        $steampunked->openValve();
        $steampunkedView = new Steampunked\SteampunkedView($steampunked);
        $this->assertContains('<p class="large-text-error">You did not finish your pipe, but you closed it off! Give up!</p>',$steampunkedView->presentHeader());

    }

    public function test_presentGame() {
        $steampunked = new Steampunked\Steampunked();
        $p1 = new Steampunked\Player("p1", 123954);
        $p2 = new Steampunked\Player("p2", 529063);

        $steampunked->setPlayer1($p1);
        $steampunked->setPlayer2($p2);
        $steampunked->setActivePlayer($steampunked->getPlayer1());
        $steampunked->createGrid();
        $steampunkedView = new Steampunked\SteampunkedView($steampunked);
        $view = $steampunkedView->presentGame();

        //test to make sure that there is a leak at location x:1, y:0 (right next to start pipe) that is a highlight tag
        //(because player 1 is allowed to place a pipe there)
        $this->assertContains('<form method="POST" action="steampunked-post.php"><input type="hidden" name="addPipe" value="1_0"><input type="hidden" name="pipe" value="0"><input class="highlight" type="image" src="assets/leak-w.png" width="50" height="50" alt="leak button"></form>',$view);
        //test to make sure that the leaks at x:1 y:5 is not a highlight tag because it is player 1's turn, and the leak
        //at the bottom is next to player 2's start pipe. it's just a leak, not a button like the one above
        $this->assertContains('<div class="cell"><img src="assets/leak-w.png" width="50" height="50" alt="leak"></div>',$view);

        //START PROGRAMMATIC FINISH GAME
        //test a pipe placement of a straight h pipe that is horizontal.
        $newPipe = new Steampunked\Pipe(7,0);
        $steampunked->getActivePlayer()->setPipeAtIndex(0, $newPipe);
        $this->assertTrue($steampunked->isValidPipePlacement(0,1,0)[0]);
        $steampunked->addPipe(0,1,0);
        $steampunkedView = new Steampunked\SteampunkedView($steampunked);
        //now there is a pipe next to player 1's start pipe
        $this->assertContains('<div class="cell"><img src="assets/straight-h.png" width="50" height="50" alt="pipe image"></div>',$steampunkedView->presentGame());

        //player 2 will place an invalid pipe, which will not cause the game to change since the turn did not count
        $newPipe = new Steampunked\Pipe(7,0); //a horizontal straight pipe
        $steampunked->getActivePlayer()->setPipeAtIndex(0, $newPipe);
        $steampunked->rotatePipe(0); //now pipe is vertical. This is invalid if trying to connect to the start pipe
        $this->assertFalse($steampunked->isValidPipePlacement(0,1,5)[0]);
        $steampunked->addPipe(0,1,5);
        $oldView = $steampunkedView->presentGame();
        $steampunkedView = new Steampunked\SteampunkedView($steampunked);
        $newView = $steampunkedView->presentGame();
        $this->assertEquals($oldView, $newView);
        $steampunked->discardPipe(0); //end player 2's turn.

        //now test that when a player completes their pipe from start to finish with no leaks and opens the valve that
        //there are new pressure gauges on the end pipe (as images) AKA the top end pipe is at 190
        //first test open valve on a pipe sequence with leaks. this will not change the game view
        $steampunked->openValve();
        $oldView = $steampunkedView->presentGame();
        $steampunkedView = new Steampunked\SteampunkedView($steampunked);
        $newView = $steampunkedView->presentGame();
        $this->assertEquals($oldView, $newView);
        //now complete player 1's pipe and test that the new view contains the pressure gauge with the pressure up all the way
        $newPipe = new Steampunked\Pipe(6,0); //ninety pipe west south
        $steampunked->getActivePlayer()->setPipeAtIndex(0, $newPipe);
        $steampunked->rotatePipe(0);
        $steampunked->rotatePipe(0);
        $steampunked->rotatePipe(0);
        $this->assertTrue($steampunked->isValidPipePlacement(0,2,0)[0]);
        $steampunked->addPipe(0,2,0);
        $steampunked->discardPipe(0); //end player 2's turn
        $newPipe = new Steampunked\Pipe(6,0); //ninety pipe north east
        $steampunked->getActivePlayer()->setPipeAtIndex(0, $newPipe);
        $steampunked->rotatePipe(0);
        $this->assertTrue($steampunked->isValidPipePlacement(0,2,1)[0]);
        $steampunked->addPipe(0,2,1);
        $steampunked->discardPipe(0); //end player 2's turn
        $newPipe = new Steampunked\Pipe(7,0); //straight horizontal pipe
        $steampunked->getActivePlayer()->setPipeAtIndex(0, $newPipe);
        $this->assertTrue($steampunked->isValidPipePlacement(0,3,1)[0]);
        $steampunked->addPipe(0,3,1);
        $steampunked->discardPipe(0); //end player 2's turn
        $newPipe = new Steampunked\Pipe(7,0); //straight horizontal pipe
        $steampunked->getActivePlayer()->setPipeAtIndex(0, $newPipe);
        $this->assertTrue($steampunked->isValidPipePlacement(0,4,1)[0]);
        $steampunked->addPipe(0,4,1);
        $steampunked->discardPipe(0); //end player 2's turn
        $newPipe = new Steampunked\Pipe(7,0); //straight horizontal pipe
        $steampunked->getActivePlayer()->setPipeAtIndex(0, $newPipe);
        $this->assertTrue($steampunked->isValidPipePlacement(0,5,1)[0]);
        $steampunked->addPipe(0,5,1);
        $steampunked->discardPipe(0); //end player 2's turn
        $newPipe = new Steampunked\Pipe(7,0); //straight horizontal pipe
        $steampunked->getActivePlayer()->setPipeAtIndex(0, $newPipe);
        $this->assertTrue($steampunked->isValidPipePlacement(0,6,1)[0]);
        $steampunked->addPipe(0,6,1);
        $steampunked->discardPipe(0); //end player 2's turn
        //NOW get old view (with no top end pipe that is at 190 pressure)
        $oldView = $steampunkedView->presentGame();
        $this->assertNotContains('<div class="cell"><img src="assets/gauge-top-190.png" width="50" height="50" alt="pipe image"></div>',$oldView);
        //now player 1 will open valve which will complete his game and the game will contain a top end pipe at 190 pressure
        $steampunked->openValve();
        $steampunkedView = new Steampunked\SteampunkedView($steampunked);
        $newView = $steampunkedView->presentGame();
        $this->assertContains('<div class="cell"><img src="assets/gauge-top-190.png" width="50" height="50" alt="pipe image"></div>', $newView);

        //now test that restart game actually resets the game!
        $oldView = $newView; //the old view is now the completed game view
        $steampunked->restartGame();
        $steampunkedView = new Steampunked\SteampunkedView($steampunked);
        $newView = $steampunkedView->presentGame();
        $this->assertNotEquals($oldView, $newView);
        //to ensure that the game was actually reset, there should no longer be any top end pipes at pressure of 190
        $this->assertNotContains('<div class="cell"><img src="assets/gauge-top-190.png" width="50" height="50" alt="pipe image"></div>',$newView);

        //test that giving up does not change the game view
        $oldView = $newView;
        $steampunked->quit();
        //This line below is necessary because quitting changes turns. Therefore
        //the leak buttons of player 1 become leak images. Need
        //to reset the active player so that is preserved.
        $steampunked->setActivePlayer($steampunked->getPlayer1());
        //The line above is done ONLY FOR TESTING. The two views APPEAR the same, but the leaks and leak buttons depend on
        //the active player
        $steampunkedView = new Steampunked\SteampunkedView($steampunked);
        $newView = $steampunkedView->presentGame();
        $this->assertEquals($oldView, $newView);

        //test that rotating a pipe does not change the game view at all
        $steampunked->restartGame();
        $steampunkedView = new Steampunked\SteampunkedView($steampunked);
        $oldView = $steampunkedView->presentGame();
        $steampunked->rotatePipe(0);
        $steampunkedView = new Steampunked\SteampunkedView($steampunked);
        $newView = $steampunkedView->presentGame();
        $this->assertEquals($oldView, $newView);
    }

    public function test_presentControls()
    {
        $steampunked = new Steampunked\Steampunked();
        $p1 = new Steampunked\Player("p1", 123954);
        $p2 = new Steampunked\Player("p2", 529063);
        $steampunked->setPlayer1($p1);
        $steampunked->setPlayer2($p2);
        $steampunked->setActivePlayer($steampunked->getPlayer1());
        $steampunked->createGrid();
        $steampunkedView = new Steampunked\SteampunkedView($steampunked);
        $view = $steampunkedView->presentControls();

        $this->assertContains('<p><form method="POST" action="steampunked-post.php">', $view);
        $this->assertContains('<input type="hidden" name="pipe" value="' . $steampunked->getActivePlayer()->getSelectedPipe() . '">', $view);
        $this->assertContains('<input type="submit" name="rotate" value="Rotate">', $view);
        $this->assertContains('<input type="submit" name="discard" value="Discard">', $view);
        $this->assertContains('<input type="submit" name="open" value="Open Valve">', $view);
        $this->assertContains('<input type="submit" name="quit" value="Give Up">', $view);

        $steampunked->setGiveUp(true);
        $steampunkedView = new Steampunked\SteampunkedView($steampunked);
        $view = $steampunkedView->presentControls();

        $this->assertContains('<input type="submit" name="restart" value="Restart">', $view);
    }

}

/// @endcond
?>
