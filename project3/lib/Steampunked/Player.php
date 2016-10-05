<?php


namespace Steampunked;


class Player
{
    const MIN = 4;
    const MAX = 7;

    private $name;
    private $pipes;
    private $selectedPipe = 0;

    public function __construct($name, $seed = null) {
        if($seed === null) {
            $seed = time();
        }

        srand($seed);

        $this->name = $name;
        $this->generatePipes();
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPipes() {
        return $this->pipes;
    }

    public function getSelectedPipe() {
        return $this->selectedPipe;
    }

    public function setSelectedPipe($pipeIndex) {
        $this->selectedPipe = $pipeIndex;
    }

    public function generatePipes() {
        for ($i = 0; $i < 5; $i++) {
            $pipe = new Pipe(rand(self::MIN, self::MAX), 0);
            $pipe->setPlayer($this);
            $this->pipes[$i] = $pipe;
        }
    }

    public function replacePipe($pipeIndex) {
        $pipe = new Pipe(rand(self::MIN, self::MAX), 0);
        $pipe->setPlayer($this);
        $this->pipes[$pipeIndex] = $pipe;
    }

    public function setPipeAtIndex($pipeIndex, $pipe) {
        $this->pipes[$pipeIndex] = $pipe;
    }
}