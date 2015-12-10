<?php

namespace BinSoul\Test\Common\Measure;

use BinSoul\Common\Measurement\SystemOfUnits\StandardUnits;
use BinSoul\Common\Measurement\Unit;
use BinSoul\Common\Measurement\Converter;

class StandardUnitsTest extends \PHPUnit_Framework_TestCase
{
    public function test_can_build_all_units()
    {
        $units = new StandardUnits();

        foreach ($units->getUnits() as $code) {
            $units = new StandardUnits();
            $unit = $units->build($code);
            $this->assertInstanceOf(Unit::class, $unit, $code);
            $this->assertNotEmpty($unit->getQuantity(), $code);
            $this->assertNotEmpty($unit->getDimension()->getSymbol(), $code);
            $this->assertNotEmpty($unit->getStandardUnit()->getSymbol(), $code);
            $this->assertInstanceOf(Converter::class, $unit->toStandardUnit(), $code);
            $this->assertNotEmpty($unit->getBaseUnits()->getSymbol(), $code);
            $this->assertInstanceOf(Converter::class, $unit->toBaseUnits(), $code);
        }
    }
}
