<?php

namespace Steampunked;

class Steampunked {
    public function __construct($seed = null) {
        if ($seed === null) {
            $seed = time();
        }
        srand($seed);
    }

    public function create($size, $playerName0, $playerName1) {
        $this->size = $size;

        array_push($this->players, new Player($playerName0, 0, $this->size));
        array_push($this->players, new Player($playerName1, 1, $this->size));
    }

    public function changeTurn() {
        if ($this->currPlayerId === 0) {
            $this->currPlayerId = 1;
        } else {
            $this->currPlayerId = 0;
        }
        // reset selected choice
        $this->choice = -1;
    }

    public function addPipeToPlayer($x, $y) {
        $flag = $this->validate($x, $y);
        if ($this->choice != -1 and $flag) {
            $this->players[$this->currPlayerId]->addPipe($this->choice, $x, $y);
            $this->changeTurn();
        }
    }

    public function getSize() {
        return $this->size;
    }

    public function getPlayers() {
        return $this->players;
    }

    public function getCurrPlayerId() {
        return $this->currPlayerId;
    }

    public function rotateOption($idx) {
        if ($this->choice != -1) {
            $this->players[$this->currPlayerId]->rotateOption($idx);
        }
    }

    public function discardOption($idx) {
        if ($this->choice != -1) {
            $this->players[$this->currPlayerId]->discardOption($idx);
            $this->changeTurn();
        }
    }

    public function openValveOption(){
        $this->valve = true;
        $leaks = $this->players[$this->currPlayerId]->getLeaks();
        $otherPlayerId = null;

        if ($this->currPlayerId === 0) {
            $otherPlayerId = 1;
        } else {
            $otherPlayerId = 0;
        }

        if (count($leaks) === 0) {
            $this->gauge = true;
            return $this->currPlayerId;

        } else {
            return $otherPlayerId;
        }

    }

    public function setChoice($idx) {
        $this->choice = $idx;
    }

    public function getChoice() {
        return $this->choice;
    }

    public function getValve() {
        return $this->valve;
    }

    public function getGauge() {
        return $this->gauge;
    }

    private function validate($x, $y) {
        $pipes = $this->players[$this->currPlayerId]->getPipes();
        $leaks = $this->players[$this->currPlayerId]->getLeaks();

        $pipeChoice = $this->players[$this->currPlayerId]->getPipeChoices()[$this->choice];

        $direction_arr = str_split($pipeChoice->getActualDirection(), 1);

        if ($this->currPlayerId == 0) {
            // prevent place over border with leaks
            if ($x == 0 and in_array('n', $direction_arr)) {
                return false;
            }
            if ($x == $this->size/2-1 and in_array('s', $direction_arr)) {
                return false;
            }
            if ($y == $this->size-1 and $x != $this->size/2-2 and in_array('e', $direction_arr)) {
                return false;
            }
            if ($y == 0 and $x != $this->size/2-3 and in_array('w', $direction_arr)) {
                return false;
            }
            // first pipe must has leak to west
            if ($y == 0 and $x == $this->size/2-3 and !in_array('w', $direction_arr)) {
                return false;
            }
        }
        elseif ($this->currPlayerId == 1) {
            // prevent place over border with leaks
            if ($x == 0 and in_array('n', $direction_arr)) {
                return false;
            }
            if ($x == $this->size/2-1 and in_array('s', $direction_arr)) {
                return false;
            }
            if ($y == $this->size-1 and $x != 1 and in_array('e', $direction_arr)) {
                return false;
            }
            if ($y == 0 and $x != 2 and in_array('w', $direction_arr)) {
                return false;
            }
            // first pipe must has leak to west
            if ($y == 0 and $x == 2 and !in_array('w', $direction_arr)) {
                return false;
            }

        }

//        foreach ($direction_arr as $direction) {
//            if ($direction == 'w' and $y-1 > 0) {
//                $pipe = $pipes[$x][$y-1];
//                if ($pipe != null and !$this->contains($pipe->getActualDirection(), 'e')) {
//                    return false;
//                }
//            }
//            if ($direction == 'e' and $y+1 < $this->size-1) {
//                $pipe = $pipes[$x][$y+1];
//                if ($pipe != null and !$this->contains($pipe->getActualDirection(), 'w')) {
//                    return false;
//                }
//            }
//            if ($direction == 'n' and $x-1 >= 0) {
//                $pipe = $pipes[$x-1][$y];
//                if ($pipe != null and !$this->contains($pipe->getActualDirection(), 's')) {
//                    return false;
//                }
//            }
//            if ($direction == 's' and $x+1 <= $this->size-1) {
//                $pipe = $pipes[$x+1][$y];
//                if ($pipe != null and !$this->contains($pipe->getActualDirection(), 'n')) {
//                    return false;
//                }
//            }
//        }


        $name = $pipeChoice->getName();
        $flag = false;
        if ($name === 'straight') {
            if ($pipeChoice->getDirection() === 'h') {
                $left = $pipes[$x][$y-1];
                $right = $pipes[$x][$y+1];
                if ($left === null and $right === null) {
                    return false;
                }
                if ($left !== null and !$this->contains($left->getActualDirection(), 'e')
                    and $right !== null and !$this->contains($right->getActualDirection(), 'w')) {
                    return false;
                }
            }
            elseif ($pipeChoice->getDirection() === 'v') {

            }

        }
        elseif ($name === 'ninety') {

        }
        elseif ($name === 'cap') {

        }
        elseif ($name === 'tee') {

        }

        return true;
    }

    private function contains($string, $char) {
        if (strpos($string, $char) !== FALSE)
            return true;
        else
            return false;
    }



    private $size = null;
    private $currPlayerId = 0;
    private $players = array();
    private $choice = -1;
    private $valve = false;
    private $gauge = false;
}