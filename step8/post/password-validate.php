<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/28/16
 * Time: 10:34
 */

require '../lib/site.inc.php';

$controller = new Felis\PasswordValidateController($site, $_POST);
header("location: " . $controller->getRedirect());