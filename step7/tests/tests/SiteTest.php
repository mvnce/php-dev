<?php

require __DIR__ . "/../../vendor/autoload.php";

/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
class SiteTest extends \PHPUnit_Framework_TestCase
{
	public function test_construct() {
		$site = new \Felis\Site();

		$this->assertInstanceOf('\Felis\Site', $site);

		$site->dbConfigure('hostname', 'username', 'password', 'prefix');
	}

	public function test_email_setter_getter() {
		$site = new \Felis\Site('hostname', 'username', 'password', 'prefix');
		$site->setEmail('email@email.com');
		$this->assertEquals('email@email.com', $site->getEmail());
	}

	public function test_root_setter_getter() {
		$site = new \Felis\Site('hostname', 'username', 'password', 'prefix');
		$site->setRoot('root');
		$this->assertEquals('root', $site->getRoot());
	}

	public function test_getTablePrefix() {
		$site = new \Felis\Site();
		$site->dbConfigure('hostname', 'username', 'password', 'prefix');
		$this->assertEquals('prefix', $site->getTablePrefix());
	}

	public function test_localize() {
		$site = new Felis\Site();
		$localize = require 'localize.inc.php';
		if(is_callable($localize)) {
			$localize($site);
		}
		$this->assertEquals('test_', $site->getTablePrefix());
	}
}

/// @endcond
?>
