<?php
require __DIR__ . "/../vendor/autoload.php";
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2/14/16
 * Time: 6:15 PM
 */

$site = new Steampunked\Site();
$localize = require 'localize.inc.php';
if(is_callable($localize)) {
    $localize($site);
}

// Start the session system
session_start();
$user = null;

if(isset($_SESSION[Steampunked\User::SESSION_NAME])) {
    $user = $_SESSION[Steampunked\User::SESSION_NAME];
}

// redirect if user is not logged in
// NEED TO BE IMPLEMENTED
if(!isset($open) && $user === null) {
    $root = $site->getRoot();
    header("location: $root/");
    exit;
}