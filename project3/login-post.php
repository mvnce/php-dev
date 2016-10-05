<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 4/30/16
 * Time: 5:16 PM
 */

require __DIR__ . '/lib/steampunked.inc.php';

$controller = new Steampunked\LoginController($steampunked, $_SESSION, $_POST);

header('Location:  '.  $controller->getPage());