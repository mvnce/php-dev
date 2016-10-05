<?php

require __DIR__ . '/lib/steampunked.inc.php';
$controller = new Steampunked\SteampunkedController($steampunked, $_POST);
if($controller->isReset()) {
    unset($_SESSION[STEAMPUNKED_SESSION]);
}
echo $controller->getResult();