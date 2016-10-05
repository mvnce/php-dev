<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/28/16
 * Time: 10:34
 */

$open = true;
require '../lib/game.inc.php';

$controller = new Steampunked\PasswordValidateController($site, $_POST);
header("location: " . $controller->getRedirect());