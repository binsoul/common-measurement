<?php

namespace BinSoul\Common\Measurement\SystemOfUnits;

use BinSoul\Common\Measurement\Converter\RationalConverter;
use BinSoul\Common\Measurement\Quantity\Mass;
use BinSoul\Common\Measurement\SystemOfUnits;
use BinSoul\Common\Measurement\Unit;
use BinSoul\Common\Measurement\Unit\TransformedUnit;

/**
 * The apothecaries' system of weights is a historical system of mass units that were used by
 * physicians and apothecaries for medical recipes.
 *
 * @property Unit $GRAIN              unit of mass
 * @property Unit $DRAM_APOTHECARY    unit of mass
 * @property Unit $OUNCE_APOTHECARY   unit of mass
 * @property Unit $POUND_APOTHECARY   unit of mass
 * @property Unit $SCRUPLE_APOTHECARY unit of mass
 */
class ApothecariesUnits extends SystemOfUnits
{
    const GRAIN = 'GRAIN';
    const DRAM_APOTHECARY = 'DRAM_APOTHECARY';
    const OUNCE_APOTHECARY = 'OUNCE_APOTHECARY';
    const POUND_APOTHECARY = 'POUND_APOTHECARY';
    const SCRUPLE_APOTHECARY = 'SCRUPLE_APOTHECARY';

    /** @var array list of units grouped by quantity */
    protected static $mapping = [
        Mass::class => [
            self::GRAIN => 'gr',
            self::DRAM_APOTHECARY => 'ʒ',
            self::OUNCE_APOTHECARY => '℥',
            self::POUND_APOTHECARY => '℔',
            self::SCRUPLE_APOTHECARY => '℈',
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
            case self::DRAM_APOTHECARY:
                return new TransformedUnit($this->SCRUPLE_APOTHECARY, new RationalConverter(3, 1), $symbol);
            case self::OUNCE_APOTHECARY:
                return new TransformedUnit($this->DRAM_APOTHECARY, new RationalConverter(8, 1), $symbol);
            case self::POUND_APOTHECARY:
                return new TransformedUnit($this->OUNCE_APOTHECARY, new RationalConverter(12, 1), $symbol);
            case self::SCRUPLE_APOTHECARY:
                return new TransformedUnit($this->GRAIN, new RationalConverter(20, 1), $symbol);
        }
    }
}
