<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 2/14/16
 * Time: 3:24 PM
 */

namespace Steampunked;


class Pipe
{
    public function __construct($name=null, $x=null, $y=null){
        $this->name = $name;
        $this->direction = 0;
        $this->x=$x;
        $this->y=$y;
    }

    public function rotate() {
        if ($this->direction == 3) {
            $this->direction=0;
        }
        else {
            $this->direction += 1;
        }
    }

    public function setPos($x, $y){
        $this->x = $x;
        $this->y = $y;
    }

    public function getType(){
        return $this->name;
    }

    public function getDirection(){
        return $this->direction;
    }

    private $direction;
    private $name;
    private $x; //x coord
    private $y; //y coord
}