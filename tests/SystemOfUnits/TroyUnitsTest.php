<?php

namespace BinSoul\Test\Common\Measurement\SystemOfUnits;

use BinSoul\Common\Measurement\SystemOfUnits;
use BinSoul\Common\Measurement\SystemOfUnits\TroyUnits;
use BinSoul\Common\Measurement\SystemOfUnits\StandardUnits;
use BinSoul\Common\Measurement\Unit;
use BinSoul\Common\Measurement\Converter;

class TroyUnitsTest extends SystemOfUnitsTest
{
    protected function buildUnits()
    {
        return new TroyUnits(new StandardUnits());
    }
}
