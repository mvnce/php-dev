<?php

/**

 * Created by PhpStorm.

 * User: michael

 * Date: 2/14/16

 * Time: 5:49 PM

 */


namespace Steampunked;



class SteampunkedController

{

    public function __construct(Steampunked $steampunked, $request)
    {

        $this->steampunked = $steampunked;


        if (isset($request['discard'])) {

            $this->steampunked->discardOption(strip_tags($request['discard']));

        } elseif (isset($request['reset'])) {

            $this->page = 'index.php';
            $this->reset = true;

        } elseif (isset($request['giveup'])) {

            $this->giveUp = true;

            $this->page = 'win.php?l=' . $steampunked->getCurrPlayer() . '&c=g';

        } elseif (isset($request['place'])) {

            $this->addPipeToPlayer(strip_tags($request['place']));

        } elseif (isset($request['openvalve'])) {

            $this->steampunked->openValveOption();

        } elseif (isset($request['rotate'])) {

            $this->steampunked->rotateOption(strip_tags($request['rotate']));

        } elseif (isset($request['newgame'])) {
            if (isset($request['name1']) && isset($request['name2'])) {
                $size = strip_tags($request['size']);
                if ($size == "10 by 10") {
                    $size = 10;
                } elseif ($size == "20 by 20") {
                    $size = 20;
                } else {
                    $size = 6;
                }
                $this->createGame($size, strip_tags($request['name1']), strip_tags($request['name2']));
                $this->page = 'steampunked.php';
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



    /*   public function openValve(){

           if($this->steampunked->openValve()){$this->page = 'win.php';} //has to see if player has leaks or not

           else{$this->page = 'win.php';}

           //the only difference in pages is if the player who opened it won or lost, should display differently,

               view will determine based on whose turn it is

       }*/


    private $steampunked;

    private $page = 'steampunked.php';

    private $reset = false;

    private $giveUp = false;

}

