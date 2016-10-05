<?php
require __DIR__ . "/../../vendor/autoload.php";


class StartPipe extends \PHPUnit_Framework_TestCase
{
    public function test_construct(){
        $topStartPipe = new Steampunked\StartPipe(Steampunked\Pipe::START_PIPE);
        $this->assertInstanceOf('Steampunked\StartPipe', $topStartPipe);
        $this->assertEquals(0, $topStartPipe->getDirection());

    }
    public function test_openValue(){
        $topStartPipe = new Steampunked\StartPipe(Steampunked\Pipe::START_PIPE);
        $topStartPipe->openValve();
        $this->assertEquals(1,$topStartPipe->getDirection());

    }


}