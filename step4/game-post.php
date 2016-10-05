<?php

/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 2/6/16
 * Time: 00:57
 */

require 'lib/game.inc.php';

$controller = new Wumpus\WumpusController($wumpus, $_REQUEST);
if($controller->isReset()) {
    unset($_SESSION[WUMPUS_SESSION]);
}

if($controller->isCheat()) {
    $_SESSION[WUMPUS_SESSION] = new Wumpus\Wumpus(1422668587);   // Seed: 1422668587
}

header('Location: ' . $controller->getPage());