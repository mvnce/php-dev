<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 4/11/16
 * Time: 17:07
 */
$open = true;		// Can be accessed when not logged in
require '../lib/game.inc.php';

$controller = new Steampunked\LoginController($site, $_SESSION, $_POST);
header("location: " . $controller->getRedirect());
