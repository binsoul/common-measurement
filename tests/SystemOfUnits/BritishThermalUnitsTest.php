<?php

namespace BinSoul\Test\Common\Measurement\SystemOfUnits;

use BinSoul\Common\Measurement\SystemOfUnits\BritishThermalUnits;
use BinSoul\Common\Measurement\SystemOfUnits\StandardUnits;

class BritishThermalUnitsTest extends SystemOfUnitsTest
{
    protected function buildUnits()
    {
        return new BritishThermalUnits(new StandardUnits());
    }
}
