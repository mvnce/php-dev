<?php

require __DIR__ . "/../../vendor/autoload.php";

/** @file
 * @brief Empty unit testing template/database version
 * @cond 
 * @brief Unit tests for the class 
 */

class UsersTest extends \PHPUnit_Extensions_Database_TestCase
{
    private static $site;

    public static function setUpBeforeClass() {
        self::$site = new Felis\Site();
        $localize  = require 'localize.inc.php';
        if(is_callable($localize)) {
            $localize(self::$site);
        }
    }

	/**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
        return $this->createDefaultDBConnection(self::$site->pdo(), 'masiyan');
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        return $this->createFlatXMLDataSet(dirname(__FILE__) . '/db/user.xml');
    }

    public function test_construct() {
        $users = new Felis\Users(self::$site);
        $this->assertInstanceOf('Felis\Users', $users);
    }

    public function test_login() {
        $users = new Felis\Users(self::$site);

        // Test a valid login based on user ID
        $user = $users->login("dudess@dude.com", "87654321");
        $this->assertInstanceOf('Felis\User', $user);

        $email = $user->getEmail();
        $this->assertEquals("dudess@dude.com", $email);
        $name = $user->getName();
        $this->assertEquals("Dudess, The", $name);
        $phone = $user->getPhone();
        $this->assertEquals("111-222-3333", $phone);
        $address = $user->getAddress();
        $this->assertEquals("Dudess Address", $address);
        $time = $user->getJoined();
        $this->assertEquals(1421988626, $time);
        $notes = $user->getNotes();
        $this->assertEquals("Dudess Notes", $notes);
        $role = $user->getRole();
        $this->assertEquals("S", $role);

        // Test a valid login based on email address
        $user = $users->login("cbowen@cse.msu.edu", "super477");
        $this->assertInstanceOf('Felis\User', $user);

        // Test a failed login
        $user = $users->login("dudess@dude.com", "wrongpw");
        $this->assertNull($user);
    }

    public function test_get() {
        $users = new Felis\Users(self::$site);

        // Test a valid login based on user ID
        $user = $users->get(7);
        $this->assertInstanceOf('Felis\User', $user);
        $email = $user->getEmail();
        $this->assertEquals("dudess@dude.com", $email);
        $name = $user->getName();
        $this->assertEquals("Dudess, The", $name);
        $phone = $user->getPhone();
        $this->assertEquals("111-222-3333", $phone);
        $address = $user->getAddress();
        $this->assertEquals("Dudess Address", $address);
        $time = $user->getJoined();
        $this->assertEquals(1421988626, $time);
        $notes = $user->getNotes();
        $this->assertEquals("Dudess Notes", $notes);
        $role = $user->getRole();
        $this->assertEquals("S", $role);

        $user = $users->get(8);
        $this->assertInstanceOf('Felis\User', $user);

        $user = $users->get(7);
        $this->assertInstanceOf('Felis\User', $user);

        $user = $users->get(9);
        $this->assertInstanceOf('Felis\User', $user);

        $user = $users->get(10);
        $this->assertInstanceOf('Felis\User', $user);

        $user = $users->get(11);
        $this->assertEquals(null, $user);
    }

}

/// @endcond
?>
