<?php
require __DIR__ . "/../vendor/autoload.php";
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 2/14/16
 * Time: 6:15 PM
 */

session_start();

define("STEAMPUNKED_SESSION", 'steampunked');

if(!isset($_SESSION[STEAMPUNKED_SESSION])){
    $_SESSION[STEAMPUNKED_SESSION] = new Steampunked\Steampunked();
}

$steampunked = $_SESSION[STEAMPUNKED_SESSION];