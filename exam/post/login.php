<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 4/26/16
 * Time: 10:44
 */

require '../lib/islands.inc.php';

$controller = new Islands\LoginController($islands, $_POST);
header("location: " . $controller->getRedirect());
exit;