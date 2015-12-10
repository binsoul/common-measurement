<?php

namespace BinSoul\Test\Common\Measurement\SystemOfUnits;

use BinSoul\Common\Measurement\SystemOfUnits\USCustomaryUnits;
use BinSoul\Common\Measurement\SystemOfUnits\StandardUnits;

class USCustomaryUnitsTest extends SystemOfUnitsTest
{
    protected function buildUnits()
    {
        return new USCustomaryUnits(new StandardUnits());
    }
}
