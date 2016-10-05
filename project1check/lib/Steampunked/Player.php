<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 2/14/16
 * Time: 3:15 PM
 */

namespace Steampunked;


class Player
{
    public function __construct($name = null) {
        $this->name = $name;
    }

    public function addPipe($pipe) {
        array_push($this->pipes, $pipe);
    }

    public function getPipes() {
        return $this->pipes;
    }

    public function getName() {
        return $this->name;
    }

    private $name = null;
    private $pipes = array();
}