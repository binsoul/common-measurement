<?php

namespace BinSoul\Test\Common\Measurement;

use BinSoul\Common\Measurement\Measure;
use BinSoul\Common\Measurement\SystemOfUnits\StandardUnits;

class MeasureTest extends \PHPUnit_Framework_TestCase
{
    public function test_getters()
    {
        $units = new StandardUnits();
        $measure1 = Measure::valueOf(100, $units->CENTIMETRE);
        $measure2 = Measure::valueOf(1, $units->METRE);

        $this->assertSame($units->CENTIMETRE, $measure1->getUnit());
        $this->assertEquals(100, $measure1->getValue());

        $this->assertSame($units->METRE, $measure2->getUnit());
        $this->assertEquals(1, $measure2->getValue());
    }

    public function test_can_be_converted()
    {
        $units = new StandardUnits();
        $measure1 = Measure::valueOf(100, $units->CENTIMETRE);
        $measure2 = Measure::valueOf(1, $units->METRE);

        $this->assertEquals(1, $measure1->to($units->METRE)->getValue());
        $this->assertEquals(100, $measure2->to($units->CENTIMETRE)->getValue());

        $this->assertEquals(100, $measure1->to($units->CENTIMETRE)->getValue());
    }

    public function test_can_be_compared()
    {
        $units = new StandardUnits();
        $measure1 = Measure::valueOf(100, $units->CENTIMETRE);
        $measure2 = Measure::valueOf(1, $units->METRE);
        $measure3 = Measure::valueOf(1, $units->KILOMETRE);

        $this->assertEquals(0, $measure1->compareTo($measure2));
        $this->assertEquals(0, $measure2->compareTo($measure1));

        $this->assertEquals(-1, $measure1->compareTo($measure3));
        $this->assertEquals(-1, $measure2->compareTo($measure3));

        $this->assertEquals(1, $measure3->compareTo($measure1));
        $this->assertEquals(1, $measure3->compareTo($measure2));
    }
}
