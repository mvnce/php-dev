<?php


namespace Steampunked;


class StartPipe extends Pipe
{
    public function __construct() {
        parent::__construct(self::START_PIPE, 0);
    }

    public function openValve() {
        $this->direction = 1;
        $this->setUri($this->direction);
    }
}