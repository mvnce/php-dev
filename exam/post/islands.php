<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 4/26/16
 * Time: 22:58
 */

require '../lib/islands.inc.php';

$controller = new Islands\IslandsController($islands, $_SESSION, $_POST);
header("location: " . $controller->getRedirect());
exit;