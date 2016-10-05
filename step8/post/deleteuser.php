<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/28/16
 * Time: 23:18
 */

require '../lib/site.inc.php';

$controller = new Felis\DeleteUserController($site, $_POST);
header("location: " . $controller->getRedirect());