<?php
require __DIR__ . "/../../vendor/autoload.php";
/** @file
 * @brief Empty unit testing template
 * @cond
 * @brief Unit tests for the class
 */

class EndPipeTest extends \PHPUnit_Framework_TestCase
{
    public function test_construct(){
        $topEndPipe = new Steampunked\EndPipe(Steampunked\Pipe::TOP_END_PIPE);
        $bottomEndPipe = new Steampunked\EndPipe(Steampunked\Pipe::BOTTOM_END_PIPE);

        $this->assertInstanceOf('Steampunked\EndPipe', $topEndPipe);
        $this->assertInstanceOf('Steampunked\EndPipe', $bottomEndPipe);

        $this->assertEquals(0, $topEndPipe->getDirection());
        $this->assertEquals(0, $bottomEndPipe->getDirection());
        $this->assertEquals('assets/gauge-top-0.png', $topEndPipe->getUri());
        $this->assertEquals('assets/gauge-0.png', $bottomEndPipe->getUri());
    }

    public function test_togglePressure() {
        $topEndPipe = new Steampunked\EndPipe(Steampunked\Pipe::TOP_END_PIPE);
        $bottomEndPipe = new Steampunked\EndPipe(Steampunked\Pipe::BOTTOM_END_PIPE);

        $topEndPipe->togglePressure();
        $bottomEndPipe->togglePressure();

        $this->assertEquals(1, $topEndPipe->getDirection());
        $this->assertTrue($topEndPipe->isPressureOn());
        $this->assertEquals('assets/gauge-top-190.png', $topEndPipe->getUri());

        $this->assertEquals(1, $bottomEndPipe->getDirection());
        $this->assertTrue($bottomEndPipe->isPressureOn());
        $this->assertEquals('assets/gauge-190.png', $bottomEndPipe->getUri());

        $topEndPipe->togglePressure();
        $bottomEndPipe->togglePressure();

        $this->assertEquals(0, $topEndPipe->getDirection());
        $this->assertFalse($topEndPipe->isPressureOn());
        $this->assertEquals('assets/gauge-top-0.png', $topEndPipe->getUri());

        $this->assertEquals(0, $bottomEndPipe->getDirection());
        $this->assertFalse($bottomEndPipe->isPressureOn());
        $this->assertEquals('assets/gauge-0.png', $bottomEndPipe->getUri());
    }
}