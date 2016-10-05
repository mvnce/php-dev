<?php


namespace Steampunked;


class EndPipe extends Pipe
{
    private $pressureOn = false;

    public function __construct($id) {
        parent::__construct($id, 0);
    }

    public function togglePressure() {
        if ($this->pressureOn) {
            $this->pressureOn = false;
            $this->setDirection(0);
            $this->setUri($this->direction);
        } else {
            $this->pressureOn = true;
            $this->setDirection(1);
            $this->setUri($this->direction);
        }
    }

    public function isPressureOn() {
        return $this->pressureOn;
    }
}