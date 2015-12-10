<?php

namespace BinSoul\Test\Common\Measurement\SystemOfUnits;

use BinSoul\Common\Measurement\SystemOfUnits;
use BinSoul\Common\Measurement\SystemOfUnits\BritishThermalUnits;
use BinSoul\Common\Measurement\SystemOfUnits\StandardUnits;
use BinSoul\Common\Measurement\Unit;
use BinSoul\Common\Measurement\Converter;

class BritishThermalUnitsTest extends SystemOfUnitsTest
{
    protected function buildUnits()
    {
        return new BritishThermalUnits(new StandardUnits());
    }
}
