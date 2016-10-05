<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 4/30/16
 * Time: 5:15 PM
 */

namespace Steampunked;


class LoginController {

    public function __construct($steampunked, array &$session, $post) {
        $this->steampunked = $steampunked;

        if(isset($post['start'])) {
            $this->page = "steampunked.php";
            $p1 = new Player(strip_tags($post['player1']), 123954);
            $p2 = new Player(strip_tags($post['player2']), 529063);
            $this->steampunked->setGridSize($post['gridSize']);
            $this->steampunked->setPlayer1($p1);
            $this->steampunked->setPlayer2($p2);
            $this->steampunked->setActivePlayer($steampunked->getPlayer1());
            $this->steampunked->createGrid();
        }

        else if(isset($post['new'])) {
            unset($session[STEAMPUNKED_SESSION]);
            $this->page = "index.php";
        }
    }

    public function getPage() {
        return $this->page;
    }

    private $steampunked;
    private $page;
}