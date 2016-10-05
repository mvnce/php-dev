<?php

namespace Steampunked;

class SteampunkedController {
    public function __construct(Steampunked $steampunked, $post) {
        $this->steampunked = $steampunked;
        $this->steampunked->setErrorMessage("");

        //DO SOMETHING WITH THE POST(make the move that was made)
        if(isset($post['select'])) {
            $index = strip_tags($post['select']);
            $this->steampunked->setSelectedPipe($index);
            $view = new SteampunkedView($this->steampunked);
            $this->result = json_encode(array('ok' => true, "present" => $view->present()));
        }
        else if(isset($post['addPipe'])) {
            $this->addPipe($post['pipe'], $post['addPipe']);
            $view = new SteampunkedView($this->steampunked);
            $this->result = json_encode(array('ok' => true, "present" => $view->present()));
        }
        else if(isset($post['rotate'])) {
            $this->steampunked->rotatePipe(strip_tags($post['pipe']));
            $view = new SteampunkedView($this->steampunked);
            $this->result = json_encode(array('ok' => true, "present" => $view->present()));
        }
        else if(isset($post['discard'])) {
            $this->steampunked->discardPipe(strip_tags($post['pipe']));
            $view = new SteampunkedView($this->steampunked);
            $this->result = json_encode(array('ok' => true, "present" => $view->present()));
        }
        else if(isset($post['open'])) {
            $this->steampunked->openValve();
            $view = new SteampunkedView($this->steampunked);
            $this->result = json_encode(array('ok' => true, "present" => $view->present()));
        }
        else if(isset($post['quit'])) {
            $this->steampunked->quit();
            $view = new SteampunkedView($this->steampunked);
            $this->result = json_encode(array('ok' => true, "present" => $view->present()));
        }
    }

    public function isReset() {
        return $this->reset;
    }

    public function getResult() {
        return $this->result;
    }

    public function addPipe($pipeIndex, $xy) {
        $coordinates = explode("_", $xy);
        $this->steampunked->addPipe($pipeIndex, $coordinates[0], $coordinates[1]);
    }


    private $steampunked;
    private $reset = false;
    private $result = null;
}