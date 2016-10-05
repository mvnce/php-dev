<?php

namespace Steampunked;

class Player {
    public function __construct($name, $id, $size) {
        $this->name = $name;
        $this->id = $id;
        $this->size = $size;

        $this->pipes = array();
        for ($i = 0; $i < $size/2; $i++) {
            $tmp = array();
            for ($j = 0; $j < $size; $j++) {
                array_push($tmp, null);
            }
            array_push($this->pipes, $tmp);
        }

        // generate the first leaking steam
        if ($id === 0) {
            $this->pipes[$size/2-3][0] = new Pipe(4, 3);
        }
        elseif ($id === 1) {
            $this->pipes[2][0] = new Pipe(4, 3);
        }

        // generating choices for player
        $seed = time();
        if ($id == 1) {
            $seed += 1;
        }
        for ($i = 0; $i < 5; $i++) {
            $this->pipeChoices[$i] = $this->pipeGenerator($seed+$i);
        }
    }

    public function addPipe($idx, $x, $y) {
        $this->pipes[$x][$y] = clone $this->pipeChoices[$idx];
        $this->pipeChoices[$idx] = $this->pipeGenerator(time());
    }

    public function rotateOption($idx) {
        $this->pipeChoices[$idx]->rotate();
    }

    public function discardOption($idx) {
        $this->pipeChoices[$idx] = $this->pipeGenerator(time());
    }

    public function checkLeaks() {
        $leaks = array();

        for ($i = 0; $i < count($this->pipes); $i++) {
            for ($j = 0; $j < count($this->pipes[$i]); $j++) {
                if ($this->pipes[$i][$j] != null) {
                    $name = $this->pipes[$i][$j]->getName();
                    $direction = $this->pipes[$i][$j]->getDirection();
                    $pos_str = $i . ' ' . $j;

                    if ($name === 'straight') {
                        if ($direction === 'h') {
                            $leaks[$pos_str] = array('w', 'e');
                        }
                        elseif ($direction === 'v') {
                            $leaks[$pos_str] = array('n', 's');
                        }
                        else {
                            trigger_error("straight direction error", E_USER_ERROR);
                        }
                    }
                    else {
                        $leaks[$pos_str] = str_split($direction, 1);
                    }
                }
            }
        }

        # eliminating fake leaks
        foreach($leaks as $key => $value) {
            $pos_arr = explode(' ', $key);
            $x = intval($pos_arr[0]);
            $y = intval($pos_arr[1]);

            foreach($leaks[$key] as $direction) {
                if ($direction == 'w') {
                    $_x = $x;

                    if ($y > 0) {
                        $_y = $y - 1;
                        // check if that key exist or not to prevent null index error
                        if (array_key_exists($_x . ' ' . $_y, $leaks) and in_array('e', $leaks[$_x . ' ' . $_y]) ) {
                            $idx1 = array_search('w', $leaks[$x . ' ' . $y]);
                            $idx2 = array_search('e', $leaks[$_x . ' ' . $_y]);
                            unset($leaks[$x . ' ' . $y][$idx1]);
                            unset($leaks[$_x . ' ' . $_y][$idx2]);
                        }
                    }

                }
                elseif ($direction == 'n') {
                    $_y = $y;
                    if ($x > 0) {
                        $_x = $x - 1;
                        // check if that key exist or not to prevent null index error
                        if (array_key_exists($_x . ' ' . $_y, $leaks) and in_array('s', $leaks[$_x . ' ' . $_y])) {
                            $idx1 = array_search('n', $leaks[$x . ' ' . $y]);
                            $idx2 = array_search('s', $leaks[$_x . ' ' . $_y]);
                            unset($leaks[$x . ' ' . $y][$idx1]);
                            unset($leaks[$_x . ' ' . $_y][$idx2]);
                        }
                    }
                }
            }
        }

        // eliminating starting and ending leaks
        if ($this->id === 0) {
            $x = $this->size/2 - 3;

            if (array_key_exists($x.' 0', $leaks)) {
                $idx1 = array_search('w', $leaks[$x.' 0']);
                unset($leaks[$x.' 0'][$idx1]);
            }
            $x = $this->size/2-2;
            $y = $this->size - 1;
            if (array_key_exists($x.' '.$y, $leaks)) {
                $idx2 = array_search('e', $leaks[$x.' '.$y]);
                unset($leaks[$x.' '.$y][$idx2]);
            }
        }
        elseif ($this->id === 1) {
            if (array_key_exists('2 0', $leaks)) {
                $idx1 = array_search('w', $leaks['2 0']);
                unset($leaks['2 0'][$idx1]);
            }
            $y = $this->size - 1;
            if (array_key_exists('1 '.$y, $leaks)) {
                $idx2 = array_search('e', $leaks['1 '.$y]);
                unset($leaks['1 '.$y][$idx2]);
            }
        }

        foreach ($leaks as $key => $value) {
            if (count($value) == 0) {

                unset($leaks[$key]);
            }
        }

        $this->leaks = $leaks;
    }

    public function getPerfectPipes() {
        $steamR = new Pipe(4, 3);
        $steamL = new Pipe(4, 0);
        $steamU = new Pipe(4, 2);
        $steamD = new Pipe(4, 1);

        $pipes = $this->pipes;
        $this->checkLeaks();

        foreach ($this->leaks as $key => $value) {
            $pos_arr = explode(' ', $key);
            $x = intval($pos_arr[0]);
            $y = intval($pos_arr[1]);

            foreach ($value as $direction) {
                if ($direction == 'e' and $y+1 < $this->size and $pipes[$x][$y+1] == null) {
                    $pipes[$x][$y+1] = $steamR;
                }
                elseif ($direction == 'w' and $y-1 >= 0 and $pipes[$x][$y-1] == null) {
                    $pipes[$x][$y-1] = $steamL;
                }
                elseif ($direction == 'n' and $x-1 >= 0 and $pipes[$x-1][$y] == null) {
                    $pipes[$x-1][$y] = $steamU;
                }
                elseif ($direction == 's' and $x+1 < $this->size/2 and $pipes[$x+1][$y] == null) {
                    $pipes[$x+1][$y] = $steamD;
                }
            }
        }
        return $pipes;
    }

    public function getPipes() {
        return $this->pipes;
    }

    public function getName() {
        return $this->name;
    }

    public function getPipeChoices() {
        return $this->pipeChoices;
    }

    public function getLeaks() {
        return $this->leaks;
    }

    public function getSize() {
        return $this->size;
    }

    public function pipeGenerator($seed) {
        srand($seed);
        $num = rand(0, 3);

        $direction = null;
        if ($num == 0) {
            $direction = rand(0, 3);
        }
        elseif ($num == 1) {
            $direction = rand(0, 3);
        }
        elseif ($num == 2) {
            $direction = rand(0, 1);
        }
        elseif ($num == 3) {
            $direction = rand(0, 3);
        }
        else {
            trigger_error("pipe cannot be found in PIPES list", E_USER_ERROR);
        }
        return new Pipe($num, $direction);
    }

    private $id = null;
    private $name = null;
    private $pipes = null;
    private $size = null;
    private $pipeChoices = array();
    private $leaks = null;
}