<?php
require __DIR__ . '/lib/game.inc.php';
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 2/14/16
 * Time: 6:15 PM
 */

$controller = new \Steampunked\SteampunkedController($steampunked, $_POST);
if($controller->getReset()){
    unset($_SESSION[STEAMPUNKED_SESSION]);
}
//phpinfo();
header('Location: ' . $controller->getPage());
exit;
