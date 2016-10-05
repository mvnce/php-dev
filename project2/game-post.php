<?php
require __DIR__ . '/lib/game.inc.php';
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 2/14/16
 * Time: 6:15 PM
 */

$steampunked = new \Steampunked\Steampunked();
$steampunked->create(6, 'Player1', 'Player2');

$controller = new \Steampunked\SteampunkedController($site, $steampunked, $_POST, $_SESSION);

header('Location: ' . $controller->getPage());
exit;
