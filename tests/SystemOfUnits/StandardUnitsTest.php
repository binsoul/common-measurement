<?php

namespace BinSoul\Test\Common\Measurement\SystemOfUnits;

use BinSoul\Common\Measurement\SystemOfUnits;
use BinSoul\Common\Measurement\SystemOfUnits\StandardUnits;

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
