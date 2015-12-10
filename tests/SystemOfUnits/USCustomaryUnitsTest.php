<?php

namespace BinSoul\Test\Common\Measurement\SystemOfUnits;

use BinSoul\Common\Measurement\SystemOfUnits;
use BinSoul\Common\Measurement\SystemOfUnits\USCustomaryUnits;
use BinSoul\Common\Measurement\SystemOfUnits\StandardUnits;
use BinSoul\Common\Measurement\Unit;
use BinSoul\Common\Measurement\Converter;

class USCustomaryUnitsTest extends SystemOfUnitsTest
{
    protected function buildUnits()
    {
        return new USCustomaryUnits(new StandardUnits());
    }
}
