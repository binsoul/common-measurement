<?php

namespace BinSoul\Common\Measurement\SystemOfUnits;

use BinSoul\Common\Measurement\Converter\RationalConverter;
use BinSoul\Common\Measurement\Quantity\Area;
use BinSoul\Common\Measurement\Quantity\Length;
use BinSoul\Common\Measurement\Quantity\Mass;
use BinSoul\Common\Measurement\Quantity\Velocity;
use BinSoul\Common\Measurement\Quantity\Volume;
use BinSoul\Common\Measurement\SystemOfUnits;
use BinSoul\Common\Measurement\Unit;
use BinSoul\Common\Measurement\Unit\CompoundUnit;
use BinSoul\Common\Measurement\Unit\TransformedUnit;

/**
 * @property Unit $ACRE                     unit of area
 * @property Unit $BUSHEL                   unit of volume
 * @property Unit $CHAIN                    unit of length
 * @property Unit $FATHOM                   unit of length
 * @property Unit $FLUID_DRAM               unit of volume
 * @property Unit $FLUID_OUNCE              unit of volume
 * @property Unit $FOOT                     unit of length
 * @property Unit $GALLON                   unit of volume
 * @property Unit $GILL                     unit of volume
 * @property Unit $INCH                     unit of length
 * @property Unit $KNOT                     unit of velocity
 * @property Unit $LINK                     unit of length
 * @property Unit $LONG_HUNDREDWEIGHT                unit of mass
 * @property Unit $LONG_TON                          unit of mass
 * @property Unit $MILE                     unit of length
 * @property Unit $MILES_PER_HOUR           unit of velocity
 * @property Unit $MINIM                    unit of volume
 * @property Unit $NAUTICAL_MILE            unit of length
 * @property Unit $PACE                     unit of length
 * @property Unit $PECK                     unit of volume
 * @property Unit $PINT                     unit of volume
 * @property Unit $QUART                    unit of volume
 * @property Unit $ROD                      unit of length
 * @property Unit $SHORT_HUNDREDWEIGHT               unit of mass
 * @property Unit $SHORT_TON                         unit of mass
 * @property Unit $STONE                             unit of mass
 * @property Unit $YARD                     unit of length
 * @property Unit $CUBIC_FOOT                     unit of volume
 * @property Unit $CUBIC_INCH                     unit of volume
 * @property Unit $CUBIC_MILE                     unit of volume
 * @property Unit $CUBIC_YARD                     unit of volume
 * @property Unit $FEET_PER_SECOND                     unit of velocity
 * @property Unit $SQUARE_FOOT                     unit of area
 * @property Unit $SQUARE_INCH                     unit of area
 * @property Unit $SQUARE_MILE                     unit of area
 * @property Unit $SQUARE_YARD                     unit of area
 * @property Unit $POUND                     unit of mass
 * @property Unit $OUNCE                     unit of mass
 * @property Unit $GRAIN                     unit of mass
 */
class ImperialUnits extends SystemOfUnits
{
    const ACRE = 'ACRE';
    const BUSHEL = 'BUSHEL';
    const CHAIN = 'CHAIN';
    const CUBIC_FOOT = 'CUBIC_FOOT';
    const CUBIC_INCH = 'CUBIC_INCH';
    const CUBIC_MILE = 'CUBIC_MILE';
    const CUBIC_YARD = 'CUBIC_YARD';
    const GRAIN = 'GRAIN';
    const FATHOM = 'FATHOM';
    const FEET_PER_SECOND = 'FEET_PER_SECOND';
    const FLUID_DRAM = 'FLUID_DRAM';
    const FLUID_OUNCE = 'FLUID_OUNCE';
    const FOOT = 'FOOT';
    const GALLON = 'GALLON';
    const GILL = 'GILL';
    const INCH = 'INCH';
    const KNOT = 'KNOT';
    const LINK = 'LINK';
    const LONG_HUNDREDWEIGHT = 'LONG_HUNDREDWEIGHT';
    const LONG_TON = 'LONG_TON';
    const MILE = 'MILE';
    const MILES_PER_HOUR = 'MILES_PER_HOUR';
    const MINIM = 'MINIM';
    const NAUTICAL_MILE = 'NAUTICAL_MILE';
    const PACE = 'PACE';
    const PECK = 'PECK';
    const PINT = 'PINT';
    const QUART = 'QUART';
    const ROD = 'ROD';
    const SQUARE_FOOT = 'SQUARE_FOOT';
    const SQUARE_INCH = 'SQUARE_INCH';
    const SQUARE_MILE = 'SQUARE_MILE';
    const SQUARE_YARD = 'SQUARE_YARD';
    const STONE = 'STONE';
    const YARD = 'YARD';
    const POUND = 'POUND';
    const OUNCE = 'OUNCE';

    /** @var array list of units grouped by quantity */
    protected static $mapping = [
        Area::class => [
            self::ACRE => 'acr',
            self::SQUARE_FOOT => 'ft²',
            self::SQUARE_INCH => 'in²',
            self::SQUARE_MILE => 'mi²',
            self::SQUARE_YARD => 'yd²',
        ],
        Length::class => [
            self::CHAIN => 'chain',
            self::FATHOM => 'ftm',
            self::FOOT => 'ft',
            self::INCH => 'in',
            self::LINK => 'link',
            self::MILE => 'mi',
            self::NAUTICAL_MILE => 'nmi',
            self::PACE => 'pace',
            self::ROD => 'rod',
            self::YARD => 'yd',
        ],
        Mass::class => [
            self::GRAIN => 'gr',
            self::LONG_HUNDREDWEIGHT => 'cwt',
            self::LONG_TON => 'ton',
            self::STONE => 'st',
            self::OUNCE => 'oz',
            self::POUND => 'lb',
        ],
        Volume::class => [
            self::BUSHEL => 'bu',
            self::CUBIC_FOOT => 'ft³',
            self::CUBIC_INCH => 'in³',
            self::CUBIC_MILE => 'mi³',
            self::CUBIC_YARD => 'yd³',
            self::FLUID_DRAM => 'dr oz',
            self::FLUID_OUNCE => 'fl oz',
            self::GALLON => 'gal',
            self::GILL => 'gi',
            self::MINIM => 'min',
            self::PECK => 'pk',
            self::PINT => 'pi',
            self::QUART => 'qt',
        ],
        Velocity::class => [
            self::FEET_PER_SECOND => 'ft/s',
            self::KNOT => 'kn',
            self::MILES_PER_HOUR => 'mi/h',
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
    protected function buildArea($code, $symbol)
    {
        switch ($code) {
            case self::ACRE:
                return new TransformedUnit(
                    new CompoundUnit($this->YARD->pow(2), Area::class),
                    new RationalConverter(4840, 1),
                    $symbol
                );
            case self::SQUARE_FOOT:
                return new CompoundUnit($this->FOOT->pow(2), Area::class, $symbol);
            case self::SQUARE_INCH:
                return new CompoundUnit($this->INCH->pow(2), Area::class, $symbol);
            case self::SQUARE_MILE:
                return new CompoundUnit($this->MILE->pow(2), Area::class, $symbol);
            case self::SQUARE_YARD:
                return new CompoundUnit($this->YARD->pow(2), Area::class, $symbol);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildLength($code, $symbol)
    {
        switch ($code) {
            case self::CHAIN:
                return new TransformedUnit($this->ROD, new RationalConverter(4, 1), $symbol);
            case self::FATHOM:
                return new TransformedUnit($this->FOOT, new RationalConverter(6, 1), $symbol);
            case self::FOOT:
                return new TransformedUnit($this->INCH, new RationalConverter(12, 1), $symbol);
            case self::INCH:
                return new TransformedUnit(
                    $this->standardUnits->CENTIMETRE,
                    new RationalConverter(2539998, 1000000),
                    $symbol
                );
            case self::LINK:
                return new TransformedUnit($this->CHAIN, new RationalConverter(1, 100), $symbol);
            case self::MILE:
                return new TransformedUnit($this->FOOT, new RationalConverter(5280, 1), $symbol);
            case self::NAUTICAL_MILE:
                return new TransformedUnit($this->FOOT, new RationalConverter(6080, 1), $symbol);
            case self::PACE:
                return new TransformedUnit($this->FOOT, new RationalConverter(5, 20), $symbol);
            case self::ROD:
                return new TransformedUnit($this->FOOT, new RationalConverter(33, 2), $symbol);
            case self::YARD:
                return new TransformedUnit($this->FOOT, new RationalConverter(3, 1), $symbol);
        }
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
            case self::LONG_HUNDREDWEIGHT:
                return new TransformedUnit($this->POUND, new RationalConverter(112, 1), $symbol);
            case self::LONG_TON:
                return new TransformedUnit($this->LONG_HUNDREDWEIGHT, new RationalConverter(20, 1), $symbol);
            case self::OUNCE:
                return new TransformedUnit($this->POUND, new RationalConverter(1, 16), $symbol);
            case self::POUND:
                return new TransformedUnit($this->GRAIN, new RationalConverter(7000, 1), $symbol);
            case self::STONE:
                return new TransformedUnit($this->POUND, new RationalConverter(14, 1), $symbol);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildVolume($code, $symbol)
    {
        switch ($code) {
            case self::BUSHEL:
                return new TransformedUnit($this->PECK, new RationalConverter(4, 1), $symbol);
            case self::CUBIC_FOOT:
                return new CompoundUnit($this->FOOT->pow(3), Volume::class, $symbol);
            case self::CUBIC_INCH:
                return new CompoundUnit($this->INCH->pow(3), Volume::class, $symbol);
            case self::CUBIC_MILE:
                return new CompoundUnit($this->MILE->pow(3), Volume::class, $symbol);
            case self::CUBIC_YARD:
                return new CompoundUnit($this->YARD->pow(3), Volume::class, $symbol);
            case self::FLUID_DRAM:
                return new TransformedUnit($this->FLUID_OUNCE, new RationalConverter(1, 8), $symbol);
            case self::FLUID_OUNCE:
                return new TransformedUnit($this->GILL, new RationalConverter(1, 5), $symbol);
            case self::GALLON:
                return new TransformedUnit($this->standardUnits->LITRE, new RationalConverter(454609, 100000), $symbol);
            case self::GILL:
                return new TransformedUnit($this->PINT, new RationalConverter(1, 4), $symbol);
            case self::MINIM:
                return new TransformedUnit($this->FLUID_DRAM, new RationalConverter(1, 60), $symbol);
            case self::PECK:
                return new TransformedUnit($this->GALLON, new RationalConverter(2, 1), $symbol);
            case self::PINT:
                return new TransformedUnit($this->QUART, new RationalConverter(1, 2), $symbol);
            case self::QUART:
                return new TransformedUnit($this->GALLON, new RationalConverter(1, 4), $symbol);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildVelocity($code, $symbol)
    {
        switch ($code) {
            case self::FEET_PER_SECOND:
                return new CompoundUnit($this->FOOT->divide($this->standardUnits->SECOND), Velocity::class, $symbol);
            case self::KNOT:
                return new CompoundUnit(
                    $this->NAUTICAL_MILE->divide($this->standardUnits->HOUR),
                    Velocity::class,
                    $symbol
                );
            case self::MILES_PER_HOUR:
                return new CompoundUnit($this->MILE->divide($this->standardUnits->HOUR), Velocity::class, $symbol);
        }
    }
}
