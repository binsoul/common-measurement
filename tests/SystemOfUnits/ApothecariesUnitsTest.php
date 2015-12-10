<?php

namespace BinSoul\Test\Common\Measurement\SystemOfUnits;

use BinSoul\Common\Measurement\SystemOfUnits\ApothecariesUnits;
use BinSoul\Common\Measurement\SystemOfUnits\StandardUnits;

class ApothecariesUnitsTest extends SystemOfUnitsTest
{
    protected function buildUnits()
    {
        return new ApothecariesUnits(new StandardUnits());
    }
}
