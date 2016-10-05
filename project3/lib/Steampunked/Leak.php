<?php


namespace Steampunked;


class Leak extends Pipe
{
    const LEAK = 8;

    public function __construct($direction) {
        parent::__construct(self::LEAK, $direction);
    }

}