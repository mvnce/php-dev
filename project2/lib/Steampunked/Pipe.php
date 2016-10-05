<?php

namespace Steampunked;

class Pipe {
    const PIPES = array('cap', 'ninety','straight', 'tee', 'leak');
    const CAP = array('e', 'n', 'w', 's');
    const NINETY = array('es', 'sw', 'wn', 'ne');
    const STRAIGHT = array('h', 'v');
    const TEE = array('esw', 'swn', 'wne', 'nes');
    const LEAK = array('e', 'n', 's', 'w');

    public function __construct($name=null, $direction=null){
        $this->name = $name;
        $this->direction = $direction;
    }

    public function rotate() {
        $max = null;
        if ($this->name == 0) {
            $max = count(self::CAP);
        } elseif ($this->name == 1) {
            $max = count(self::NINETY);
        } elseif ($this->name == 2) {
            $max = count(self::STRAIGHT);
        } elseif ($this->name == 3) {
            $max = count(self::TEE);
        } else {
            trigger_error("name id error", E_USER_ERROR);
        }

        if ($this->direction == $max-1) {
            $this->direction = 0;
        } else {
            $this->direction += 1;
        }
    }

    public function getName(){
        return self::PIPES[$this->name];
    }

    public function getDirection(){
        $direction = null;
        if ($this->name == 0) {
            $direction = self::CAP[$this->direction];
        }
        elseif ($this->name == 1) {
            $direction = self::NINETY[$this->direction];
        }
        elseif ($this->name == 2) {
            $direction = self::STRAIGHT[$this->direction];
        }
        elseif ($this->name == 3) {
            $direction = self::TEE[$this->direction];
        }
        elseif ($this->name == 4) {
            $direction = self::LEAK[$this->direction];
        }
        else {
            trigger_error("pipe cannot be found in PIPES list", E_USER_ERROR);
        }
        return $direction;
    }

    public function getActualDirection() {
        $direction = null;
        if ($this->name == 0) {
            $direction = self::CAP[$this->direction];
        }
        elseif ($this->name == 1) {
            $direction = self::NINETY[$this->direction];
        }
        elseif ($this->name == 2) {
            $direction = self::STRAIGHT[$this->direction];
            if ($direction === 'h') {
                $direction = 'we';
            }
            elseif ($direction === 'v') {
                $direction = 'ns';
            }
        }
        elseif ($this->name == 3) {
            $direction = self::TEE[$this->direction];
        }

        return $direction;
    }

    private $name;
    private $direction;
}