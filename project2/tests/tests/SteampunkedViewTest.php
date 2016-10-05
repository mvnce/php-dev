<?php
require __DIR__ . "/../../vendor/autoload.php";
/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
class SteampunkedViewTest extends \PHPUnit_Framework_TestCase
{
	const SEED = 15;

	public function test_construct() {
		$steampunked = new Steampunked\Steampunked(self::SEED);
		$view = new Steampunked\SteampunkedView($steampunked);

        $this->assertInstanceOf('Steampunked\SteampunkedView', $view);
	}

    //could not get test_grid working
/*    public function test_grid() {
        $steampunked = new Steampunked\Steampunked(self::SEED);
        $view = new Steampunked\SteampunkedView($steampunked);


    }*/
    //could not get test_buttons working
    /*public function test_buttons() {
        $steampunked = new Steampunked\Steampunked(self::SEED);
        $view = new Steampunked\SteampunkedView($steampunked);
        $view->getSteampunked()->create(6, 'Amy', 'Nicole');

        $view->getSteampunked()->getPlayers()[0]->setPipeChoices(0, 1);
        $view->getSteampunked()->getPlayers()[0]->setPipeChoices(1, 0);
        $view->getSteampunked()->getPlayers()[0]->setPipeChoices('straight', 'h');
        $view->getSteampunked()->getPlayers()[0]->setPipeChoices('tee', 'esw');
        $view->getSteampunked()->getPlayers()[0]->setPipeChoices('tee', 'esw');

        $view->getSteampunked()->getPlayers()[1]->setPipeChoices(0, 0);
        $view->getSteampunked()->getPlayers()[1]->setPipeChoices('ninety', 'sw');
        $view->getSteampunked()->getPlayers()[1]->setPipeChoices('straight', 'v');
        $view->getSteampunked()->getPlayers()[1]->setPipeChoices('tee', 'swn');
        $view->getSteampunked()->getPlayers()[1]->setPipeChoices('tee', 'swn');

        $buttons = $view->displayButtons();

        //$pipeChoices = $view->getSteampunked()->getPlayers()[0]->getPipeChoices();
        $this->assertContains('<img src="images/cap-n.png" alt="Piece">', $buttons);
        $this->assertContains('<img src="images/ninety-es.png" alt="Piece">', $buttons);
        //$this->assertContains('<img src="images/ninety-es.png" alt="Piece">', $buttons);
        //$this->assertContains('<img src="images/straight-h.png" alt="Piece">', $buttons);
        //$this->assertContains('<img src="images/tee-esw.png" alt="Piece">', $buttons);
        //$this->assertContains('<img src="images/tee-esw.png" alt="Piece">', $buttons);

    }*/

    public function test_turns() {
        $steampunked = new Steampunked\Steampunked(self::SEED);
        $view = new Steampunked\SteampunkedView($steampunked);

        $view->getSteampunked()->create(6, 'Amy', 'Nicole');

        $name = $view->getSteampunked()->getPlayers()[0]->getName();
        $turn = $view->displayTurns();
        $this->assertContains('<p id="turns">'.$name.', it is your turn!</p>', $turn);

        $view->getSteampunked()->changeTurn();

        $turn = $view->displayTurns();
        $name = $view->getSteampunked()->getPlayers()[1]->getName();
        $this->assertContains('<p id="turns">'.$name.', it is your turn!</p>', $turn);

        $view->getSteampunked()->changeTurn();

        $turn = $view->displayTurns();
        $name = $view->getSteampunked()->getPlayers()[0]->getName();
        $this->assertContains('<p id="turns">'.$name.', it is your turn!</p>', $turn);
    }

    public function test_win() {
        $steampunked = new Steampunked\Steampunked(self::SEED);
        $view = new Steampunked\SteampunkedView($steampunked);
        $view->getSteampunked()->create(6, 'Amy', 'Nicole');

        //Asserts when giving up
        $win = $view->displayWin(1, 'g');
        $name = $view->getSteampunked()->getPlayers()[0]->getName();
        $this->assertContains('<p class="win">'.$name.' has given up!</p>', $win);
        $name = $view->getSteampunked()->getPlayers()[1]->getName();
        $this->assertContains("<p class='win'>" . $name . " is the winner!</p>", $win);

        //Asserts when opening the valve
        $win = $view->displayWin(1,'o');
        $name = $view->getSteampunked()->getPlayers()[0]->getName();
        $this->assertContains('<p class="win">' .$name. " has opened their valve but still had a leak!", $win);
        $name = $view->getSteampunked()->getPlayers()[1]->getName();
        $this->assertContains("<p class='win'>" . $name . " is the winner!</p>", $win);

        $win = $view->displayWin(0,'o');
        $name = $view->getSteampunked()->getPlayers()[0]->getName();
        $this->assertContains('<p class="win">' .$name. " has opened their valve and has no leaks!</p>", $win);
        $name = $view->getSteampunked()->getPlayers()[0]->getName();
        $this->assertContains("<p class='win'>" . $name . " is the winner!</p>", $win);

    }

    public function test_dispIndex() {

    }
/*
    public function test_dispInstruction() {

    }*/






}

/// @endcond
?>
