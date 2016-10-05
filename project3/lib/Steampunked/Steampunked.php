<?php


namespace Steampunked;

class Steampunked {

    private $player1;
    private $player2;
    private $gridSize = 6;
    private $activePlayer;
    private $giveUp = false;
    private $winner = false;
    private $errorMessage = "";

    private $startPipeOne;
    private $topEndPipeOne;
    private $bottomEndPipeOne;

    private $startPipeTwo;
    private $topEndPipeTwo;
    private $bottomEndPipeTwo;

    private $pipes;

    public function __construct() {}

    public function switchActivePlayer() {
        if ($this->activePlayer == $this->player1) {
            $this->activePlayer = $this->player2;
        } else {
            $this->activePlayer = $this->player1;
        }
    }

    public function createGrid() {
        $this->pipes = array();

        $this->startPipeOne = new StartPipe();
        $this->startPipeOne->setPlayer($this->player1);
        $this->topEndPipeOne = new EndPipe(Pipe::TOP_END_PIPE);
        $this->bottomEndPipeOne = new EndPipe(Pipe::BOTTOM_END_PIPE);

        $this->startPipeTwo = new StartPipe();
        $this->startPipeTwo->setPlayer($this->player2);
        $this->topEndPipeTwo = new EndPipe(Pipe::TOP_END_PIPE);
        $this->bottomEndPipeTwo = new EndPipe(Pipe::BOTTOM_END_PIPE);

        $startPipeOneY = ($this->gridSize / 2) - 3;
        $bottomEndPipeOneY = ($this->gridSize / 2) - 2;
        $topEndPipeOneY = $bottomEndPipeOneY - 1;

        $startPipeTwoY = ($this->gridSize / 2) + 2;
        $bottomEndPipeTwoY = ($this->gridSize / 2) + 1;
        $topEndPipeTwoY = $bottomEndPipeTwoY - 1;

        $row = array();

        for ($x = 0, $y = 0; $x < ($this->gridSize + 2); $x++) {
            if ($x == 0 && $y == $startPipeOneY) {
                $this->startPipeOne->setXandY($x, $y);
                $row[$x] = $this->startPipeOne;
            } else if ($x == ($this->gridSize + 1) && $y == $topEndPipeOneY) {
                $this->topEndPipeOne->setXandY($x, $y);
                $row[$x] = $this->topEndPipeOne;
            } else if ($x == ($this->gridSize + 1) && $y == $bottomEndPipeOneY) {
                $this->bottomEndPipeOne->setXandY($x, $y);
                $row[$x] = $this->bottomEndPipeOne;
            } else if ($x == 0 && $y == $startPipeTwoY) {
                $this->startPipeTwo->setXandY($x, $y);
                $row[$x] = $this->startPipeTwo;
            } else if ($x == ($this->gridSize + 1) && $y == $topEndPipeTwoY) {
                $this->topEndPipeTwo->setXandY($x, $y);
                $row[$x] = $this->topEndPipeTwo;
            } else if ($x == ($this->gridSize + 1) && $y == $bottomEndPipeTwoY) {
                $this->bottomEndPipeTwo->setXandY($x, $y);
                $row[$x] = $this->bottomEndPipeTwo;
            } else {
                $row[$x] = null;
            }

            if ($x == ($this->gridSize + 1) && $y < $this->gridSize) {
                $this->pipes[$y] = $row;
                $row = array();
                $x = -1;
                $y++;
            }
        }

        $this->generateLeaks();
    }

    public function restartGame() {
        $this->giveUp = false;
        $this->winner = false;

        $this->player1 = new Player($this->getPlayer1()->getName());
        $this->player2 = new Player($this->getPlayer2()->getName());

        $this->setActivePlayer($this->player1);

        $this->createGrid();
    }

    public function generateLeaks() {
        $row = $this->pipes[0];

        for ($x = 0, $y = 1; $x < ($this->gridSize + 2); $x++) {
            $pipe = $row[$x];

            if ($pipe !== null && !($pipe instanceof EndPipe) && !($pipe instanceof Leak)) {
                $openSides = $this->getOpenSides($pipe);

                if ($openSides[0]) {
                    $northX = $pipe->getX();
                    $northY = $pipe->getY() - 1;

                    $leak = new Leak(2);
                    if ($pipe->getPlayer() == $this->player1) {
                        $leak->setPlayer($this->player1);
                    } else {
                        $leak->setPlayer($this->player2);
                    }
                    $leak->setXandY($northX, $northY);
                    $this->pipes[$northY][$northX] = $leak;
                }

                if ($openSides[1]) {
                    $eastX = $pipe->getX() + 1;
                    $eastY = $pipe->getY();

                    $leak = new Leak(3);
                    if ($pipe->getPlayer() == $this->player1) {
                        $leak->setPlayer($this->player1);
                    } else {
                        $leak->setPlayer($this->player2);
                    }
                    $leak->setXandY($eastX, $eastY);
                    $this->pipes[$eastY][$eastX] = $leak;
                }

                if ($openSides[2]) {
                    $southX = $pipe->getX();
                    $southY = $pipe->getY() + 1;

                    $leak = new Leak(0);
                    if ($pipe->getPlayer() == $this->player1) {
                        $leak->setPlayer($this->player1);
                    } else {
                        $leak->setPlayer($this->player2);
                    }
                    $leak->setXandY($southX, $southY);
                    $this->pipes[$southY][$southX] = $leak;
                }

                if ($openSides[3]) {
                    $westX = $pipe->getX() - 1;
                    $westY = $pipe->getY();

                    $leak = new Leak(1);
                    if ($pipe->getPlayer() == $this->player1) {
                        $leak->setPlayer($this->player1);
                    } else {
                        $leak->setPlayer($this->player2);
                    }
                    $leak->setXandY($westX, $westY);
                    $this->pipes[$westY][$westX] = $leak;
                }
            }

            if ($x == ($this->gridSize + 1) && $y <= ($this->gridSize - 1)) {
                $row = $this->pipes[$y];
                $x = -1;
                $y++;
            }
        }
    }

    public function getOpenSides($pipe) {
        $pipeX = $pipe->getX();
        $pipeY = $pipe->getY();

        $min = 0;
        $maxX = $this->gridSize + 2;
        $maxY = $this->gridSize + 2;
        $openSides = array(false, false, false, false);

        if ($pipe->getConnections()[0]) {
            $northX = $pipeX;
            $northY = $pipeY - 1;

            if (($northX <= $maxX && $northX >= $min) && ($northY <= $maxY && $northY >= $min)) {
                $north = $this->pipes[$northY][$northX];
                if ($north === null || $north instanceof Leak) {
                    $openSides[0] = true;
                }
            }
        }

        if ($pipe->getConnections()[1]) {
            $eastX = $pipeX + 1;
            $eastY = $pipeY;

            if (($eastX <= $maxX && $eastX >= $min) && ($eastY <= $maxY && $eastY >= $min)) {
                $east = $this->pipes[$eastY][$eastX];
                if ($east === null || $east instanceof Leak) {
                    $openSides[1] = true;
                }
            }
        }

        if ($pipe->getConnections()[2]) {
            $southX = $pipeX;
            $southY = $pipeY + 1;

            if (($southX <= $maxX && $southX >= $min) && ($southY <= $maxY && $southY >= $min)) {
                $south = $this->pipes[$southY][$southX];
                if ($south === null || $south instanceof Leak) {
                    $openSides[2] = true;
                }
            }
        }

        if ($pipe->getConnections()[3]) {
            $westX = $pipeX - 1;
            $westY = $pipeY;

            if (($westX <= $maxX && $westX >= $min) && ($westY <= $maxY && $westY >= $min)) {
                $west = $this->pipes[$westY][$westX];
                if ($west === null || $west instanceof Leak) {
                    $openSides[3] = true;
                }
            }
        }

        return $openSides;
    }

    public function setSelectedPipe($pipeIndex) {
        $this->activePlayer->setSelectedPipe($pipeIndex);
    }

    public function addPipe($pipeIndex, $x, $y) {
        $test = $this->isValidPipePlacement($pipeIndex, $x, $y);
        if ($test[0]){
            $pipe = $this->activePlayer->getPipes()[$pipeIndex];
            $pipe->setXandY($x, $y);
            $this->pipes[$y][$x] = $pipe;
            $this->generateLeaks();
            $this->activePlayer->replacePipe($pipeIndex);
            $this->switchActivePlayer();
        } else {
            $this->errorMessage = "Can not place pipe";
        }
        //UNCOMMENT FOR TESTING ISSUES!
        //$this->errorMessage = $test[1];
    }

    public function rotatePipe($pipeIndex) {
        $this->activePlayer->setSelectedPipe($pipeIndex);
        $this->activePlayer->getPipes()[$pipeIndex]->rotate();
    }

    public function discardPipe($pipeIndex) {
        $this->activePlayer->replacePipe($pipeIndex);
        $this->switchActivePlayer();
    }

    public function openValve() {
        $this->winner = true;

        $row = $this->pipes[0];

        for ($x = 0, $y = 1; $x < ($this->gridSize + 2); $x++) {
            $pipe = $row[$x];

            if ($pipe !== null && $pipe->getPlayer() == $this->activePlayer && !($pipe instanceof EndPipe) && !($pipe instanceof Leak)) {
                $openSides = $this->getOpenSides($pipe);

                if (in_array(true, $openSides)) {
                    $this->winner = false;
                }
            }

            if ($x == ($this->gridSize + 1) && $y <= ($this->gridSize - 1)) {
                $row = $this->pipes[$y];
                $x = -1;
                $y++;
            }
        }

        if ($this->winner) {
            //NEED TO MAKE SURE THAT THE PIPE GOES FROM START TO FINISH. NOT HANDLED ABOVE!
            if ($this->startPipeOne->getPlayer() == $this->activePlayer) {
                //check if player 1 completed the pipe successfully
                if ($this->didPlayer1FinishPipe()) {
                    $this->startPipeOne->openValve();
                    $this->bottomEndPipeOne->togglePressure();
                    $this->topEndPipeOne->togglePressure();
                } else {
                    $this->winner = false;
                    $this->errorMessage = "You did not finish your pipe, but you closed it off! Give up!";
                }
            } else {
                //check if player 2 completed the pipe successfully
                if ($this->didPlayer2FinishPipe()) {
                    $this->startPipeTwo->openValve();
                    $this->bottomEndPipeTwo->togglePressure();
                    $this->topEndPipeTwo->togglePressure();
                } else {
                    $this->winner = false;
                    $this->errorMessage = "You did not finish your pipe, but you closed it off! Give up!";
                }
            }
        } else {
            $this->errorMessage = "There are still leaks!";
        }
    }

    public function didPlayer1FinishPipe(){
        //THIS IS CALLED WHEN THERE ARE NO LEAKS, that does not need to be checked again!

        //get player 1 end pipe and the pipe right next to it
        $p1Bottom = $this->bottomEndPipeOne;
        if(isset($this->pipes[$p1Bottom->getY()][$this->gridSize])) {
            //make sure they are connected then!
            $lastPipe = $this->pipes[$p1Bottom->getY()][$this->gridSize];
            //last pipe needs to have an east connection
            if($lastPipe->getConnections()[1]) {
                return true;
            }
        }
        return false;
    }

    public function didPlayer2FinishPipe(){
        //THIS IS CALLED WHEN THERE ARE NO LEAKS, that does not need to be checked again!

        //get player 2 end pipe and the pipe right next to it
        $p2Bottom = $this->bottomEndPipeTwo;
        if(isset($this->pipes[$p2Bottom->getY()][$this->gridSize])) {
            //make sure they are connected then!
            $lastPipe = $this->pipes[$p2Bottom->getY()][$this->gridSize];
            //last pipe needs to have an east connection
            if($lastPipe->getConnections()[1]) {
                return true;
            }
        }
        return false;
    }

    //AKA Pipe Placement Algorithm
    public function isValidPipePlacement($pipeIndex, $x, $y) {
        $validConnections = false; //only true if connection is available and met.

        //check all four squares around the pipe.
        $leftPipe = null;
        $rightPipe = null;
        $upPipe = null;
        $downPipe = null;

        if ($x > 0) {
            $leftPipe = $this->pipes[$y][$x - 1];
            if (get_class($leftPipe) == "Steampunked\\Leak") {
                unset($leftPipe);
            }
        }
        if ($x < $this->gridSize) {
            $rightPipe = $this->pipes[$y][$x + 1];
            if (get_class($rightPipe) == "Steampunked\\Leak") {
                unset($rightPipe);
            }
        }
        if ($y > 0) {
            $upPipe = $this->pipes[$y - 1][$x];
            if (get_class($upPipe) == "Steampunked\\Leak") {
                unset($upPipe);
            }
        }
        if ($y < $this->gridSize - 1) {
            $downPipe = $this->pipes[$y + 1][$x];
            if (get_class($downPipe) == "Steampunked\\Leak") {
                unset($downPipe);
            }
        }

        $selectedPipe = $this->activePlayer->getPipes()[$pipeIndex];

        // 0 = NORTH, 1 = EAST, 2 = SOUTH, 3 = WEST

        $connErrMessage = "";
        $pipeType = $selectedPipe->getUri();
        $connErrMessage .= "$pipeType ";

        //check if left has connection to the east
        if (isset($leftPipe)){
            if ($leftPipe->getConnections()[1]) {
                //now the new pipe must have connection to the west
                if ($selectedPipe->getConnections()[3]) {
                    $validConnections = true;
                } else {
                    $pipedir = $leftPipe->getXandY();
                    $connErrMessage .= "$pipedir ";
                    $validConnections = false;
                }
            }
        } else {
            $connErrMessage .= "left not set ";
        }
        //check if right has connection to the west
        if (isset($rightPipe)){
            if ($rightPipe->getConnections()[3]) {
                //now the new pipe must have connection to the east
                if ($selectedPipe->getConnections()[1]) {
                    $validConnections = true;
                } else {
                    $pipedir = $rightPipe->getXandY();
                    $connErrMessage .= "$pipedir ";
                    $validConnections = false;
                }
            }
        } else {
            $connErrMessage .= "right not set ";
        }
        //check if up has connection to the south
        if (isset($upPipe)){
            if ($upPipe->getConnections()[2]) {
                //now the new pipe must have connection to the north
                if ($selectedPipe->getConnections()[0]) {
                    $validConnections = true;
                } else {
                    $pipedir = $upPipe->getXandY();
                    $connErrMessage .= "$pipedir ";
                    $validConnections = false;
                }
            }
        } else {
            $connErrMessage .= "up not set ";
        }
        //check if down has connection to the north
        if (isset($downPipe)){
            if ($downPipe->getConnections()[0]) {
                //now the new pipe must have connection to the south
                if ($selectedPipe->getConnections()[2]) {
                    $validConnections = true;
                } else {
                    $pipedir = $downPipe->getXandY();
                    $connErrMessage .= "$pipedir ";
                    $validConnections = false;
                }
            }
        } else {
            $connErrMessage .= "down not set ";
        }
        if ($validConnections) {
            $connErrMessage .= "Still good! ";
        } else {
            $connErrMessage .= "someone set me wrong! ";
        }
        //CHECK IF new pipe will point out of bounds!
        //if has north connection and is at y == 0
        $connErrMessage .= "spipe X:$x Y:$y";
        if(($selectedPipe->getConnections()[0]) && $y == 0){
            $validConnections = false;
            $connErrMessage .= "north conn prob";
        }
        //if has south connection and is at y == gridSize - 1
        if(($selectedPipe->getConnections()[2]) && ($y == $this->gridSize - 1)){
            $validConnections = false;
            $connErrMessage .= "south conn prob";
        }
        //if has south connection and is at one above the middle of the playing area (would be player 1 then)
        if (($selectedPipe->getConnections()[2]) && ($y == ($this->gridSize/2) - 1)) {
            $validConnections = false;
            $connErrMessage .= "south conn prob LEAKS INTO PLAYER 2";
        }
        //if has north connection and is at one below the middle of the playing area (would be player 2 then)
        if (($selectedPipe->getConnections()[0]) && ($y == ($this->gridSize/2))) {
            $validConnections = false;
            $connErrMessage .= "south conn prob LEAKS INTO PLAYER 1";
        }
        //if has west connection and is at x == 0
        if(($selectedPipe->getConnections()[3]) && $x == 1){
            //unless the left pipe is the start pipe
            if (!isset($leftPipe)) {
                $validConnections = false;
                $connErrMessage .= "west conn prob";
            }
        }
        //if has east connection and is at x == gridSize - 1
        if(($selectedPipe->getConnections()[1]) && $x == $this->gridSize){
            //unless the right pipe is the end pipe
            //from above in game construction
            $midYPlayer1 = ($this->gridSize / 2) - 2;
            //from above in game construction
            $midYPlayer2 = ($this->gridSize / 2) + 1;;
            if (!(($y == $midYPlayer1) || ($y == $midYPlayer2))) {
                $validConnections = false;
                $connErrMessage .= "east conn prob $midYPlayer2 $midYPlayer1";
            }
        }

        //check if new pipe will leak into a pipe that it cannot connect to!

        //if has east connection and there is a pipe next to it without a west one
        //and other way around
        if(isset($rightPipe)) {
            if((($selectedPipe->getConnections()[1]) && !($rightPipe->getConnections()[3])) || (!($selectedPipe->getConnections()[1]) && ($rightPipe->getConnections()[3]))){
                $validConnections = false;
                $connErrMessage .= "east to west connection issue";
            }
        }
        //if has west connection and there is a pipe next to it without an east one
        //and other way around
        if(isset($leftPipe)) {
            if((($selectedPipe->getConnections()[3]) && !($leftPipe->getConnections()[1])) || (!($selectedPipe->getConnections()[3]) && ($leftPipe->getConnections()[1]))){
                $validConnections = false;
                $connErrMessage .= "west to east connection issue";
            }
        }
        //if has north connection and there is a pipe above without a south one
        //and other way around
        if(isset($upPipe)) {
            if((($selectedPipe->getConnections()[0]) && !($upPipe->getConnections()[2])) || (!($selectedPipe->getConnections()[0]) && ($upPipe->getConnections()[2]))){
                $validConnections = false;
                $connErrMessage .= "north to south connection issue";
            }
        }
        //if has south connection and there is a pipe below without a north one
        //and other way around
        if(isset($downPipe)) {
            if((($selectedPipe->getConnections()[2]) && !($downPipe->getConnections()[0])) || (!($selectedPipe->getConnections()[2]) && ($downPipe->getConnections()[0]))){
                $validConnections = false;
                $connErrMessage .= "south to north connection issue";
            }
        }

        //$connErrMessage .= $validConnections;
        return array($validConnections, $connErrMessage);

    }

    public function quit() {
        $this->switchActivePlayer();
        $this->giveUp = true;
    }

    public function getPlayer1() {
        return $this->player1;
    }

    public function getPlayer2() {
        return $this->player2;
    }

    public function setPlayer1($player1) {
        $this->player1 = $player1;
    }

    public function setPlayer2($player2) {
        $this->player2 = $player2;
    }

    public function getGridSize() {
        return $this->gridSize;
    }

    public function setGridSize($gridSize) {
        $this->gridSize = $gridSize;
    }

    public function getActivePlayer() {
        return $this->activePlayer;
    }

    public function setActivePlayer($player) {
        $this->activePlayer = $player;
    }

    public function isGivingUp() {
        return $this->giveUp;
    }

    public function setGiveUp($giveUp) {
        $this->giveUp = $giveUp;
    }
    public function isWinner() {
        return $this->winner;
    }

    public function setWinner($winner){
        $this->winner = $winner;
    }

    public function getPipes() {
        return $this->pipes;
    }

    public function getErrorMessage() {
        return $this->errorMessage;
    }

    public function setErrorMessage($message) {
        $this->errorMessage = $message;
    }

}