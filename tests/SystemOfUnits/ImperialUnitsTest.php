<?php

namespace BinSoul\Test\Common\Measurement\SystemOfUnits;

use BinSoul\Common\Measurement\SystemOfUnits\ImperialUnits;
use BinSoul\Common\Measurement\SystemOfUnits\StandardUnits;

class ImperialUnitsTest extends SystemOfUnitsTest
{
    protected function buildUnits()
    {
        return new ImperialUnits(new StandardUnits());
    }
}
