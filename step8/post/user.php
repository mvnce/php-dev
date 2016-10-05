<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/29/16
 * Time: 02:20
 */

require '../lib/site.inc.php';

$controller = new Felis\UserController($site, $user, $_POST);
header("location: " . $controller->getRedirect());