<?php
/**
 * @file
 * A file loaded for all pages on the site.
 */
require __DIR__ . "/../vendor/autoload.php";

define("LOGIN_SESSION", "ajaxnoir_login");
define("LOGIN_COOKIE", "ajaxnoir_cookie");

// Start the session system
session_start();

// Create and localize the Site object
$site = new Noir\Site();
$localize = require 'localize.inc.php';
if(is_callable($localize)) {
	$localize($site);
}

/*
 * Login functionality
 */
if(!isset($open)) {
	// This is a page other than the login pages
	if (!isset($_SESSION[LOGIN_SESSION])) {

		if(isset($_COOKIE[LOGIN_COOKIE]) && $_COOKIE[LOGIN_COOKIE] != "") {
			$cookie = json_decode($_COOKIE[LOGIN_COOKIE], true);
			$cookies = new Noir\Cookies($site);
			$hashed = $cookies->validate($cookie['user'], $cookie['token']);

			if($hashed !== null) {
				$user = $cookie['user'];
				$_SESSION[LOGIN_SESSION] = array("user" => $user);
				$cookies->delete($hashed);
				$token = $cookies->create($user);
				$expire = time() + (86400 * 365);
				$cookie = array("user" => $user, "token" => $token);
				setcookie(LOGIN_COOKIE, json_encode($cookie), $expire, "/");
			}
			else {
				$root = $site->getRoot();
				header("location: $root/login.php");
				exit;
			}
		}
		else{
			$root = $site->getRoot();
			header("location: $root/login.php");
			exit;
		}

	}

	else {
		// We are logged in.
		$user = $_SESSION[LOGIN_SESSION]['user'];
	}
}
