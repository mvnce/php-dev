<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 2/13/16
 * Time: 13:59
 */

require __DIR__ . '/lib/guessing.inc.php';

$controller = new Guessing\GuessingController($guessing, $_POST);
if($controller->isReset()) {
    unset($_SESSION[GUESSING_SESSION]);
}

header("location: guessing.php");
exit;