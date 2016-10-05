<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 2/11/16
 * Time: 15:06
 */

namespace Steampunked;


class Steampunked {
    const NORTH=0;
    const EAST=1;
    const SOUTH=2;
    const WEST=3;
    const PIPES = array(0=>'cap', 1=>'ninety',2=>'straight', 3=>'tee');

    public function __construct($seed = null) {
        if ($seed === null) {
            $seed = time();
        }
        srand($seed);
    }

    public function create($size, $playerName1, $playerName2) {
        $this->size = $size;

        $this->players[0] = new Player($playerName1);
        $this->players[1] = new Player($playerName2);
    }

    public function generateNewChoices() {
        unset($this->pipeChoices);
        $this->pipeChoices = array();

        $seed = time();
        srand($seed);
        $randNums = array();

        for ($i = 0; $i < 5; $i++) {
            array_push($randNums, rand(0, 3));
        }

        foreach ($randNums as $num) {
            echo '<br>';
            echo self::PIPES[$num];
            array_push($this->pipeChoices, new Pipe(self::PIPES[$num], null, null));
        }
    }

    public function changeTurn() {
        if ($this->currPlayerId == 0) {
            $this->currPlayerId = 1;
        } else {
            $this->currPlayerId = 0;
        }
    }

    public function addPipeToPlayer($pipeId) {
        $this->players[$this->currPlayerId]->addPipe($this->pipeChoices[$pipeId]);
    }

    public function getSize() {
        return $this->size;
    }

    public function getPlayers() {
        return $this->players;
    }

    public function getCurrPlayer() {
        return $this->currPlayerId;
    }

    public function getChoices() {
        return $this->pipeChoices;
    }

    /*
     * called by placePipe
     * @returns array of position-x, position-y, orientation (places where there will be steam)
     */
    public function checkLeaks() {
        $this->leaks = array(); //clear array
        //loop through each spot checking for neighboring pipes oriented towards spot
        //add to leaks array (see object definition below)
    }

    public function rotateOption($index) {
        $this->pipeChoices[$index]->rotate();
    }

    public function discardOption($index) {
        //discards a player's Pipe and gives them a new one, make sure the pipe is not the same type, switch whose turn it is
    }

    public function openValveOption(){
        //check if player who opened has any pipes without a connection
        //if no leaks, check if they made a connection to the end
        //if yes, return true
        //if no to any, return false
        return false;
    }

    public function getConnection($pipe){
        //returns true or a pipe type=0 with coords
        //checks if a pipe has no leaks and if it does return the steam pipe object with coords
    }

    public function isConnected($pipe1, $pipe2){
        //use the $slots variable of the Pipe objects to determine where there are connectors, return true or false
    }

    private $size = null;
    private $currPlayerId = 0;
    private $pipeChoices = array();
    private $players = array();

    private $leaks = array();  //array of Pipe type=0 and appropriate x and y coords, for orientation see constants at top of class
}