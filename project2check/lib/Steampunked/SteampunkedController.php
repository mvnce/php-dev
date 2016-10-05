<?php

/**

 * Created by PhpStorm.

 * User: michael

 * Date: 2/14/16

 * Time: 5:49 PM

 */


namespace Steampunked;



class SteampunkedController {
    public function __construct(Steampunked $steampunked, $post)
    {
        $this->steampunked = $steampunked;

        if (isset($post['discard'])) {
            $this->steampunked->discardOption($this->steampunked->getChoice());

        } elseif (isset($post['reset'])) {
            $this->page = 'index.php';
            $this->reset = true;

        } elseif (isset($post['giveup'])) {
            $this->giveUp = true;
            $this->page = 'win.php?l=' . $steampunked->getCurrPlayerId() . '&c=g';

        } elseif (isset($post['chosen'])) {
            $this->steampunked->setChoice(intval(strip_tags($post['chosen'])));
        }

        elseif (isset($post['place'])) {
            $pos_arr = explode(' ', strip_tags($post['place']));
            $x = $pos_arr[0];
            $y = $pos_arr[1];
            $this->steampunked->addPipeToPlayer($x, $y);

        } elseif (isset($post['open'])) {
            $this->page = 'win.php?l=' . $this->steampunked->openValveOption() .'&c=o';

        } elseif (isset($post['rotate'])) {
            if ($this->steampunked->getChoice() !== null) {
                $this->steampunked->rotateOption($this->steampunked->getChoice());
            }

        } elseif (isset($post['newgame'])) {
            if (isset($post['name1']) && strip_tags($post['name1']!='') && isset($post['name2']) && strip_tags($post['name2']!='')) {
                $size = strip_tags($post['size']);
                $size = intval($size);
                if ($size != 6 && $size != 10 && $size !=20){
                    $this->page = 'index.php';
                }
                else {
                    $this->createGame($size, strip_tags($post['name1']), strip_tags($post['name2']));
                    $this->page = 'steampunked.php';
                }
            }
            else {
                $this->page = 'index.php';
            }
        }

    }

    public function getPage(){
        return $this->page;
    }

    public function createGame($size, $name1, $name2) {
        $this->steampunked->create($size, $name1, $name2);
    }

    public function getGiveUp(){
        return $this->giveUp;
    }

    public function getReset(){
        return $this->reset;
    }

    private $steampunked;
    private $page = 'steampunked.php';
    private $reset = false;
    private $giveUp = false;
}

