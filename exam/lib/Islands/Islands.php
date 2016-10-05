<?php

/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 4/26/16
 * Time: 10:52
 */

namespace Islands;
require('IslandsData.php');

class Islands {
    public function __construct() {}

    public function create() {
        $this->islands = getIslands($this->id);
    }

    public function select($row, $col) {
        if ($this->selected1_i === null) {
            $this->selected1_i = $row;
            $this->selected1_j = $col;
            $this->islands[$this->selected1_i][$this->selected1_j]['clicked'] = true;

        }
        elseif ($this->selected1_i === $row && $this->selected1_j === $col) {
            unset($this->islands[$this->selected1_i][$this->selected1_j]['clicked']);
            $this->selected1_i = null;
            $this->selected1_j = null;
        }
        else {
            $this->selected2_i = $row;
            $this->selected2_j = $col;
            $this->islands[$this->selected2_i][$this->selected2_j]['clicked'] = true;

            // do linking two island or show error

            $this->__connect();

            unset($this->islands[$this->selected1_i][$this->selected1_j]['clicked']);
            unset($this->islands[$this->selected2_i][$this->selected2_j]['clicked']);
            $this->selected1_i = null;
            $this->selected1_j = null;
            $this->selected2_i = null;
            $this->selected2_j = null;
        }
    }

    private function __connect() {
        //make sure they are on same row or same column, if not this is a they cannot be connected
        if ($this->selected1_i != $this->selected2_i && $this->selected1_j != $this->selected2_j) {
            $this->message = 'Islands cannot be connected';
            return;
        }

        if ($this->selected1_i == $this->selected2_i) {
            if ($this->selected1_j > $this->selected2_j) {
                $temp_j = $this->selected1_j;
                $this->selected1_j = $this->selected2_j;
                $this->selected2_j = $temp_j;
            }
            for ($j = $this->selected1_j+1; $j < $this->selected2_j; $j++) {
                if (array_key_exists('num', $this->islands[$this->selected1_i][$j])) {
//                    $this->message = 'Island between two selected islands';
                    $this->message = 'Islands cannot be connected';
                    return;
                }
                if (array_key_exists('img', $this->islands[$this->selected1_i][$j])) {
                    if ($this->islands[$this->selected1_i][$j]['img'] == 'v1' || $this->islands[$this->selected1_i][$j]['img'] == 'v2') {
//                        $this->message = 'different orientation bridge has been placed';
                        $this->message = 'Islands cannot be connected';
                        return;
                    }
                }
            }
            for ($j = $this->selected1_j+1; $j < $this->selected2_j; $j++) {
                if ($this->islands[$this->selected1_i][$this->selected1_j+1] != $this->islands[$this->selected1_i][$j]) {
//                    $this->message = 'consistency issue';
                    $this->message = 'Islands cannot be connected';
                    return;
                }
            }
            for ($j = $this->selected1_j+1; $j < $this->selected2_j; $j++) {
                if (array_key_exists('img', $this->islands[$this->selected1_i][$j]) && $this->islands[$this->selected1_i][$j]['img'] == 'h1') {
                    $this->islands[$this->selected1_i][$j]['img'] = 'h2';
                }
                elseif (array_key_exists('img', $this->islands[$this->selected1_i][$j]) && $this->islands[$this->selected1_i][$j]['img'] == 'h2') {
                    unset($this->islands[$this->selected1_i][$j]['img']);
                }
                else {
                    $this->islands[$this->selected1_i][$j]['img'] = 'h1';
                }
            }
//            $this->message = 'good!';
            return;
        }

        elseif ($this->selected1_j == $this->selected2_j) {
            if ($this->selected1_i > $this->selected2_i) {
                $temp_i = $this->selected1_i;
                $this->selected1_i = $this->selected2_i;
                $this->selected2_i = $temp_i;
            }
            for ($i = $this->selected1_i+1; $i < $this->selected2_i; $i++) {
                if (array_key_exists('num', $this->islands[$i][$this->selected1_j])) {
//                    $this->message = 'Island between two selected islands';
                    $this->message = 'Islands cannot be connected';
                    return;
                }
                if (array_key_exists('img', $this->islands[$i][$this->selected1_j])) {
                    if ($this->islands[$i][$this->selected1_j]['img'] == 'h1' || $this->islands[$i][$this->selected1_j]['img'] == 'h2') {
//                        $this->message = 'different orientation bridge has been placed';
                        $this->message = 'Islands cannot be connected';
                        return;
                    }
                }
            }
            for ($i = $this->selected1_i+1; $i < $this->selected2_i; $i++) {
                if ($this->islands[$this->selected1_i+1][$this->selected1_j] != $this->islands[$i][$this->selected1_j]) {
//                    $this->message = 'consistency issue';
                    $this->message = 'Islands cannot be connected';
                    return;
                }
            }
            for ($i = $this->selected1_i+1; $i < $this->selected2_i; $i++) {
                if (array_key_exists('img', $this->islands[$i][$this->selected1_j]) && $this->islands[$i][$this->selected1_j]['img'] == 'v1') {
                    $this->islands[$i][$this->selected1_j]['img'] = 'v2';
                }
                elseif (array_key_exists('img', $this->islands[$i][$this->selected1_j]) && $this->islands[$i][$this->selected1_j]['img'] == 'v2') {
                    unset($this->islands[$i][$this->selected1_j]['img']);
                }
                else {
                    $this->islands[$i][$this->selected1_j]['img'] = 'v1';
                }
            }
//            $this->message = 'good!';
            return;
        }



    }

    public function giveUp() {
        $this->islands = getSolution($this->id);
        if ($this->selected1_i !== null) {
            $this->islands[$this->selected1_i][$this->selected1_j]['clicked'] = true;
        }
    }

    public function getSolution() {
        return getSolution($this->id);
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getIslands() {
        return $this->islands;
    }

    public function setCheck($flag) {
        $this->check = $flag;
    }

    public function getCheck() {
        return $this->check;
    }

    public function setMessage($message=null) {
        $this->message = $message;
    }

    public function getMessage() {
        return $this->message;
    }

    private $islands = null;
    private $id = null;
    private $name = null;
    private $check = false;
    private $message = null;
    private $selected1_i = null;
    private $selected1_j = null;
    private $selected2_i = null;
    private $selected2_j = null;
}