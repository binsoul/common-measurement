<?php

namespace BinSoul\Test\Common\Measurement\SystemOfUnits;

use BinSoul\Common\Measurement\SystemOfUnits;
use BinSoul\Common\Measurement\SystemOfUnits\StandardUnits;
use BinSoul\Common\Measurement\Unit;
use BinSoul\Common\Measurement\Converter;

class StandardUnitsTest extends SystemOfUnitsTest
{
    /**
     * @return SystemOfUnits
     */
    protected function buildUnits()
    {
        return new StandardUnits();
    }
}
