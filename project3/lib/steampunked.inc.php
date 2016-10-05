<?php
require __DIR__ . "/../vendor/autoload.php";


// Start the PHP session system
session_start();
// define the steampunked session variable name
define("STEAMPUNKED_SESSION", 'steampunked');

// If there is a steampunked session, use that. Otherwise, create one
if(!isset($_SESSION[STEAMPUNKED_SESSION])) {

    $steampunked = new Steampunked\Steampunked();
    $_SESSION[STEAMPUNKED_SESSION] = $steampunked;
}

$steampunked = $_SESSION[STEAMPUNKED_SESSION];