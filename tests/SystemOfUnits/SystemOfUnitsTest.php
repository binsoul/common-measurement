<?php

namespace BinSoul\Test\Common\Measurement\SystemOfUnits;

use BinSoul\Common\Measurement\SystemOfUnits;
use BinSoul\Common\Measurement\Unit;
use BinSoul\Common\Measurement\Converter;

abstract class SystemOfUnitsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return SystemOfUnits
     */
    abstract protected function buildUnits();

    public function test_can_build_all_units()
    {
        $units = $this->buildUnits();

        foreach ($units->getUnits() as $code) {
            $units = $this->buildUnits();
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
