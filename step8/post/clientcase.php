<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/28/16
 * Time: 21:04
 */

require '../lib/site.inc.php';

$controller = new Felis\ClientCaseController($site, $_POST);
header("location: " . $controller->getRedirect());