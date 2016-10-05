<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 4/12/16
 * Time: 15:32
 */

require '../lib/game.inc.php';

$controller = new Steampunked\ExistGameController($site, $_SESSION, $_POST);
header("location: " . $controller->getRedirect());
