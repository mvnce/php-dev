<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/29/16
 * Time: 23:03
 */

require '../lib/site.inc.php';

$controller = new Felis\LostPasswordController($site, $_POST);
header("location: " . $controller->getRedirect());