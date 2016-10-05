<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 2/15/16
 * Time: 00:59
 */

namespace Guessing;


class GuessingController {
    public function __construct(Guessing $guessing, $post) {
        $this->guessing = $guessing;

        if (isset($post['clear'])) {
            if ($post['clear'] == 'New Game') {
                $this->clear = true;
            }
        }

        elseif (isset($post['value'])) {
            $this->play(strip_tags($post['value']));
        }
    }

    public function isReset() {
        return $this->clear;
    }

    private function play($num) {
        $this->guessing->guess($num);
    }

    private $guessing;
    private $clear = false;
}