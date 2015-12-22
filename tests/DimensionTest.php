<?php

namespace BinSoul\Test\Common\Measurement;

use BinSoul\Common\Measurement\Dimension;
use BinSoul\Common\Measurement\Quantity\Dimensionless;
use BinSoul\Common\Measurement\SystemOfUnits\StandardUnits;
use BinSoul\Common\Measurement\Unit\BaseUnit;

class DimensionTest extends \PHPUnit_Framework_TestCase
{
    public function test_getters()
    {
        $dimension = new Dimension('T');
        $this->assertEquals('T', $dimension->getSymbol());
    }

    public function test_dimension_none()
    {
        $dimension = Dimension::NONE();
        $this->assertEquals('1', $dimension->getSymbol());
    }

    public function test_is_comparable()
    {
        $dimension1 = new Dimension('T');
        $dimension2 = new Dimension('T');
        $dimension3 = new Dimension('1');

        $this->assertTrue($dimension1->equals($dimension1));
        $this->assertTrue($dimension1->equals($dimension2));
        $this->assertFalse($dimension1->equals($dimension3));
    }

    public function test_operations()
    {
        $dimension = new Dimension('T');

        $this->assertEquals('T', $dimension->times(Dimension::NONE())->getSymbol());
        $this->assertEquals('T·L', $dimension->times(new Dimension('L'))->getSymbol());
        $this->assertEquals('T/L', $dimension->divide(new Dimension('L'))->getSymbol());
        $this->assertEquals('T²', $dimension->pow(2)->getSymbol());
        $this->assertEquals('T:2', $dimension->root(2)->getSymbol());
    }
}
