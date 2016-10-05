<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 2/13/16
 * Time: 14:21
*/
namespace Guessing;

class Guessing {
    const MIN = 1;
    const MAX = 100;
    const CORRECT = 0;
    const TOOLOW = 1;
    const TOOHIGH = 2;
    const INVALID = 3;

    public function __construct($seed = null) {
        if($seed === null) {
            $seed = time();
        }

        srand($seed);
        $this->number = rand(self::MIN, self::MAX);
    }

    public function guess($num) {
        $this->theGuess = $num;
        if($this->check() != self::INVALID) {
            $this->numGuesses++;
        }
    }

    public function check() {
        $guess = $this->theGuess;

        if(!is_numeric($guess) || $guess < self::MIN || $guess > self::MAX) {
            return self::INVALID;
        } else if($guess < $this->number) {
            return self::TOOLOW;
        } else if($guess > $this->number) {
            return self::TOOHIGH;
        }
    }

    public function getNumber() {
        return $this->number;
    }

    public function getNumGuesses() {
        return $this->numGuesses;
    }

    public function getGuess() {
        return $this->theGuess;
    }

    private $number;

    private $numGuesses = 0;
    private $theGuess = 1;
}