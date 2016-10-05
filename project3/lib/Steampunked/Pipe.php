<?php


namespace Steampunked;


class Pipe
{
    protected $x;
    protected $y;
    protected $uri;
    protected $uris;
    protected $direction;
    protected $connections;
    protected $player;

    const START_PIPE = 1;
    const TOP_END_PIPE = 2;
    const BOTTOM_END_PIPE = 3;
    const CAP_PIPE = 4;
    const TEE_PIPE = 5;
    const NINETY_PIPE = 6;
    const STRAIGHT_PIPE = 7;

    public function __construct($id, $direction) {
        $this->setUris($id);
        $this->direction = $direction;
        $this->setConnections($id);
        $this->setUri($this->direction);
    }

    public function rotate() {
        if ($this->direction < 3) {
            $this->direction++;
        } else {
            $this->direction = 0;
        }

        $this->setUri($this->direction);

        $tempConnections = array();

        for ($i = 0; $i < count($this->connections); $i++) {
            if ($i == (count($this->connections) -  1)) {
                $tempConnections[0] = $this->connections[$i];
            } else {
                $tempConnections[$i + 1] = $this->connections[$i];
            }
        }

        $this->connections = $tempConnections;
    }

    public function getUris() {
        return $this->uris;
    }

    public function setUris($id) {
        switch ($id) {
            case self::START_PIPE:
                $this->uris = array("assets/valve-closed.png",
                                    "assets/valve-open.png");
                break;
            case self::TOP_END_PIPE:
                $this->uris = array("assets/gauge-top-0.png",
                                    "assets/gauge-top-190.png");
                break;
            case self::BOTTOM_END_PIPE:
                $this->uris = array("assets/gauge-0.png",
                                    "assets/gauge-190.png");
                break;
            case self::CAP_PIPE:
                $this->uris = array("assets/cap-n.png",
                                    "assets/cap-e.png",
                                    "assets/cap-s.png",
                                    "assets/cap-w.png");
                break;
            case self::TEE_PIPE:
                $this->uris = array("assets/tee-wne.png",
                                    "assets/tee-nes.png",
                                    "assets/tee-esw.png",
                                    "assets/tee-swn.png");
                break;
            case self::NINETY_PIPE:
                $this->uris = array("assets/ninety-wn.png",
                                    "assets/ninety-ne.png",
                                    "assets/ninety-es.png",
                                    "assets/ninety-sw.png");
                break;
            case self::STRAIGHT_PIPE:
                $this->uris = array("assets/straight-h.png",
                                    "assets/straight-v.png",
                                    "assets/straight-h.png",
                                    "assets/straight-v.png");
                break;
            case Leak::LEAK:
                $this->uris = array("assets/leak-n.png",
                                    "assets/leak-e.png",
                                    "assets/leak-s.png",
                                    "assets/leak-w.png");
                break;
        }
    }

    public function getConnections() {
        return $this->connections;
    }

    public function setConnections($id) {
        // 0 = NORTH, 1 = EAST, 2 = SOUTH, 3 = WEST

        switch ($id) {
            case self::START_PIPE:
                $this->connections = array(false, true, false, false);
                break;
            case self::TOP_END_PIPE:
                $this->connections = array(false, false, false, false);
                break;
            case self::BOTTOM_END_PIPE:
                $this->connections = array(false, false, false, true);
                break;
            case self::CAP_PIPE:
                $this->connections = array(true, false, false, false);
                break;
            case self::TEE_PIPE:
                $this->connections = array(true, true, false, true);
                break;
            case self::NINETY_PIPE:
                $this->connections = array(true, false, false, true);
                break;
            case self::STRAIGHT_PIPE:
                $this->connections = array(false, true, false, true);
                break;
            case Leak::LEAK:
                $this->connections = array(true, false, false, false);
                break;
        }
    }

    public function getUri() {
        return $this->uri;
    }

    public function setUri($direction) {
        $this->uri = $this->uris[$direction];
    }

    public function getDirection() {
        return $this->direction;
    }

    public function setDirection($direction) {
        $this->direction = $direction;
    }

    public function getX() {
        return $this->x;
    }

    public function setX($x) {
        $this->x = $x;
    }

    public function getY() {
        return $this->y;
    }

    public function setY($y) {
        $this->y = $y;
    }

    public function setXandY($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }

    public function getXandY() {
        return $this->x."_".$this->y;
    }

    public function getPlayer() {
        return $this->player;
    }

    public function setPlayer($player) {
        $this->player = $player;
    }

}