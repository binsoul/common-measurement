<?php

namespace BinSoul\Common\Measurement\SystemOfUnits;

use BinSoul\Common\Measurement\Converter\RationalConverter;
use BinSoul\Common\Measurement\Quantity\Mass;
use BinSoul\Common\Measurement\SystemOfUnits;
use BinSoul\Common\Measurement\Unit;
use BinSoul\Common\Measurement\Unit\TransformedUnit;

/**
 * Troy weight is a system of units of mass customarily used for precious metals and gemstones.
 *
 * @property Unit $GRAIN unit of mass
 * @property Unit $OUNCE                                   unit of mass
 * @property Unit $PENNYWEIGHT                             unit of mass
 * @property Unit $POUND                                   unit of mass
 */
class TroyUnits extends SystemOfUnits
{
    const GRAIN = 'GRAIN';
    const OUNCE = 'OUNCE';
    const PENNYWEIGHT = 'PENNYWEIGHT';
    const POUND = 'POUND';

    /** @var array list of units grouped by quantity */
    protected static $mapping = [
        Mass::class => [
            self::GRAIN => 'gr',
            self::OUNCE => 'oz t',
            self::PENNYWEIGHT => 'dwt',
            self::POUND => 'lb t',
        ],
    ];

    /** @var StandardUnits */
    private $standardUnits;

    /**
     * Constructs an instance of this class.
     *
     * @param StandardUnits $siUnits
     */
    public function __construct(StandardUnits $siUnits)
    {
        $this->standardUnits = $siUnits;
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildMass($code, $symbol)
    {
        switch ($code) {
            case self::GRAIN:
                return $this->standardUnits->GRAIN;
            case self::OUNCE:
                return new TransformedUnit($this->PENNYWEIGHT, new RationalConverter(24, 1), $symbol);
            case self::PENNYWEIGHT:
                return new TransformedUnit($this->GRAIN, new RationalConverter(24, 1), $symbol);
            case self::POUND:
                return new TransformedUnit($this->OUNCE, new RationalConverter(12, 1), $symbol);
        }
    }
}
