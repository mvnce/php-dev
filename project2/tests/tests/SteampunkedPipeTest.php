<?php


require __DIR__ . "/../../vendor/autoload.php";

class SteampunkedPipeTest extends \PHPUnit_Framework_TestCase
{
	public function test_construct_getName_getDirection() {
		$pipe = new \Steampunked\Pipe(0,0);

		$this->assertInstanceOf('\Steampunked\Pipe',$pipe);
		$this->assertEquals($pipe->getName(),'cap');
		$this->assertEquals($pipe->getDirection(),'e');

		$pipe = new \Steampunked\Pipe(1,1);

		$this->assertInstanceOf('\Steampunked\Pipe',$pipe);
		$this->assertEquals($pipe->getName(),'ninety');
		$this->assertEquals($pipe->getDirection(),'sw');

		$pipe = new \Steampunked\Pipe(2,1);

		$this->assertInstanceOf('\Steampunked\Pipe',$pipe);
		$this->assertEquals($pipe->getName(),'straight');
		$this->assertEquals($pipe->getDirection(),'v');

		$pipe = new \Steampunked\Pipe(3,3);

		$this->assertInstanceOf('\Steampunked\Pipe',$pipe);
		$this->assertEquals($pipe->getName(),'tee');
		$this->assertEquals($pipe->getDirection(),'nes');

		$pipe = new \Steampunked\Pipe(4,3);

		$this->assertInstanceOf('\Steampunked\Pipe',$pipe);
		$this->assertEquals($pipe->getName(),'leak');
		$this->assertEquals($pipe->getDirection(),'w');
	}

	public function test_rotate() {
		$pipe = new \Steampunked\Pipe(0,0);

		$pipe->rotate();
		$this->assertEquals($pipe->getDirection(),'n');
		$pipe->rotate(); $pipe->rotate(); $pipe->rotate();
		$this->assertEquals($pipe->getDirection(),'e');

		$pipe = new \Steampunked\Pipe(1,0);

		$pipe->rotate();
		$this->assertEquals($pipe->getDirection(),'sw');
		$pipe->rotate(); $pipe->rotate(); $pipe->rotate();
		$this->assertEquals($pipe->getDirection(),'es');

		$pipe = new \Steampunked\Pipe(2,0);

		$pipe->rotate();
		$this->assertEquals($pipe->getDirection(),'v');
		$pipe->rotate();;
		$this->assertEquals($pipe->getDirection(),'h');

		$pipe = new \Steampunked\Pipe(3,0);

		$pipe->rotate();
		$this->assertEquals($pipe->getDirection(),'swn');
		$pipe->rotate(); $pipe->rotate(); $pipe->rotate();
		$this->assertEquals($pipe->getDirection(),'esw');
	}
}

/// @endcond
?>
