<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 4/11/16
 * Time: 17:46
 */

$open = true;		// Can be accessed when not logged in
require '../lib/game.inc.php';

$controller = new Steampunked\SignupController($site, $_POST);
header("location: " . $controller->getRedirect());
