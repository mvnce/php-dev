
<?php
require __DIR__ . "/../../vendor/autoload.php";

/**
 * Created by PhpStorm.
 * User: Bobby
 * Date: 2/29/16
 * Time: 9:34 PM
 */
class PipeTest extends \PHPUnit_Framework_TestCase
{
    public function test_construct(){
        $pipe = new Steampunked\Pipe(5, 0);

        $this->assertInstanceOf('Steampunked\Pipe', $pipe);

        $this->assertEquals('assets/tee-wne.png', $pipe->getUris()[0]);
        $this->assertEquals(0, $pipe->getDirection());
        $this->assertTrue($pipe->getConnections()[0]);
        $this->assertEquals('assets/tee-wne.png', $pipe->getUri());
    }



    public function test_getUris() {
        $pipe = new Steampunked\Pipe(5, 0);
        $this->assertEquals('assets/tee-wne.png', $pipe->getUris()[0]);
        $pipe = new Steampunked\Pipe(5, 1);
        $this->assertEquals('assets/tee-nes.png', $pipe->getUris()[1]);

    }

    public function test_setUris() {
        $pipe = new Steampunked\Pipe(5, 0);
        $this->assertEquals('assets/tee-wne.png', $pipe->getUris()[0]);
        $pipe->setUris(1);
        $this->assertEquals('assets/valve-closed.png', $pipe->getUris()[0]);
    }

    public function test_getConnections() {
        $pipe = new Steampunked\Pipe(7, 0);
        $this->assertEquals(array(false, true, false, true),$pipe->getConnections());
    }

    public function test_setConnections() {
        $pipe = new Steampunked\Pipe(7, 0);
        $this->assertEquals(array(false, true, false, true),$pipe->getConnections());
        $pipe->setConnections(1);
        $this->assertEquals(array(false, true, false, false),$pipe->getConnections());
    }

    public function test_set_getUri() {
        $pipe = new Steampunked\Pipe(7, 0);
        $this->assertEquals('assets/straight-h.png', $pipe->getUri());
        $pipe->setUri(1);
        $this->assertEquals('assets/straight-v.png', $pipe->getUri());
    }

    public function test_set_getDirection() {
        $pipe = new Steampunked\Pipe(7, 0);
        $this->assertEquals(0,$pipe->getDirection());
        $pipe->setDirection(1);
        $this->assertEquals(1,$pipe->getDirection());
    }

    public function test_set_getX() {
        $pipe = new Steampunked\Pipe(7, 0);
        $pipe->setX(0);
        $this->assertEquals(0,$pipe->getX());
        $pipe->setX(1);
        $this->assertEquals(1,$pipe->getX());
    }

    public function test_set_getY() {
        $pipe = new Steampunked\Pipe(7, 0);
        $pipe->setY(0);
        $this->assertEquals(0,$pipe->getY());
        $pipe->setY(1);
        $this->assertEquals(1,$pipe->getY());
    }

    public function test_set_getXandY() {
        $pipe = new Steampunked\Pipe(7, 0);
        $pipe->setXandY(0,0);
        $this->assertEquals('0_0',$pipe->getXandY());
        $pipe->setXandY(1,2);
        $this->assertEquals('1_2',$pipe->getXandY());

    }

    public function test_set_getPlayer() {
        $p1 = new Steampunked\Player("p1", 123954);

        $pipe = new Steampunked\Pipe(7, 0);
        $pipe->setPlayer($p1);
        $this->assertEquals($p1,$pipe->getPlayer());
    }
}