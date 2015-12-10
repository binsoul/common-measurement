<?php

namespace BinSoul\Test\Common\Measurement\SystemOfUnits;

use BinSoul\Common\Measurement\SystemOfUnits;
use BinSoul\Common\Measurement\SystemOfUnits\ApothecariesUnits;
use BinSoul\Common\Measurement\SystemOfUnits\StandardUnits;
use BinSoul\Common\Measurement\Unit;
use BinSoul\Common\Measurement\Converter;

class ApothecariesUnitsTest extends SystemOfUnitsTest
{
    protected function buildUnits()
    {
        return new ApothecariesUnits(new StandardUnits());
    }
}
