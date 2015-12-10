<?php

namespace BinSoul\Common\Measurement\SystemOfUnits;

use BinSoul\Common\Measurement\Converter\RationalConverter;
use BinSoul\Common\Measurement\Quantity\Energy;
use BinSoul\Common\Measurement\SystemOfUnits;
use BinSoul\Common\Measurement\Unit;
use BinSoul\Common\Measurement\Unit\TransformedUnit;

/**
 * @property Unit $BTU_AT_39F                        unit of energy
 * @property Unit $BTU_AT_59F                        unit of energy
 * @property Unit $BTU_AT_60F                        unit of energy
 * @property Unit $BTU_IT                         unit of energy
 * @property Unit $BTU_MEAN                          unit of energy
 * @property Unit $BTU_THERMOCHEMICAL                unit of energy
 * @property Unit $BTU_ISO                unit of energy
 */
class BritishThermalUnits extends SystemOfUnits
{
    const BTU_AT_39F = 'BTU_AT_39F';
    const BTU_AT_59F = 'BTU_AT_59F';
    const BTU_AT_60F = 'BTU_AT_60F';
    const BTU_ISO = 'BTU_ISO';
    const BTU_IT = 'BTU_IT';
    const BTU_MEAN = 'BTU_MEAN';
    const BTU_THERMOCHEMICAL = 'BTU_THERMOCHEMICAL';

    /** @var array list of units grouped by quantity */
    protected static $mapping = [
        Energy::class => [
            self::BTU_AT_39F => 'btu_39',
            self::BTU_AT_59F => 'btu_59',
            self::BTU_AT_60F => 'btu_60',
            self::BTU_ISO => 'btu_iso',
            self::BTU_IT => 'btu_it',
            self::BTU_MEAN => 'btu_mean',
            self::BTU_THERMOCHEMICAL => 'btu_th',
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
    protected function buildEnergy($code, $symbol)
    {
        switch ($code) {
            case self::BTU_AT_39F:
                return new TransformedUnit(
                    $this->standardUnits->KILOJOULE,
                    new RationalConverter(105967, 100000),
                    $symbol
                );
            case self::BTU_AT_59F:
                return new TransformedUnit(
                    $this->standardUnits->KILOJOULE,
                    new RationalConverter(105480, 100000),
                    $symbol
                );
            case self::BTU_AT_60F:
                return new TransformedUnit(
                    $this->standardUnits->KILOJOULE,
                    new RationalConverter(105468, 100000),
                    $symbol
                );
            case self::BTU_ISO:
                return new TransformedUnit(
                    $this->standardUnits->KILOJOULE,
                    new RationalConverter(1055056, 1000000),
                    $symbol
                );
            case self::BTU_IT:
                return new TransformedUnit(
                    $this->standardUnits->KILOJOULE,
                    new RationalConverter(105505585262, 100000000000),
                    $symbol
                );
            case self::BTU_MEAN:
                return new TransformedUnit(
                    $this->standardUnits->KILOJOULE,
                    new RationalConverter(105587, 100000),
                    $symbol
                );
            case self::BTU_THERMOCHEMICAL:
                return new TransformedUnit(
                    $this->standardUnits->KILOJOULE,
                    new RationalConverter(105735, 100000),
                    $symbol
                );
        }
    }
}
