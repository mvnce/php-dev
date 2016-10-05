<?php

require __DIR__ . "/../vendor/autoload.php";

session_start();

// If there is a Guessing session, use that. Otherwise, create one
if(!isset($_SESSION['ISLANDS_SESSION'])) {
    $_SESSION['ISLANDS_SESSION'] = new Islands\Islands();
}

$islands = $_SESSION['ISLANDS_SESSION'];
