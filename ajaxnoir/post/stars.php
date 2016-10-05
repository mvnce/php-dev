<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 4/25/16
 * Time: 03:59
 */

require '../lib/site.inc.php';

$controller = new Noir\StarController($site, $user, $_POST);
echo $controller->getResult();