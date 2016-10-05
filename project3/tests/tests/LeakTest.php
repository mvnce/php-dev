<?php
require __DIR__ . "/../../vendor/autoload.php";

/**
 * Created by PhpStorm.
 * User: Bobby
 * Date: 2/29/16
 * Time: 9:34 PM
 */
class LeakTest extends \PHPUnit_Framework_TestCase
{
    public function test_construct(){
        $leak = new Steampunked\Leak(1);
        $this->assertInstanceOf('Steampunked\Leak', $leak);
        $this->assertEquals(1, $leak->getDirection());
    }
}