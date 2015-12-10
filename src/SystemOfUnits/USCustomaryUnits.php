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
 * @property Unit $ACRE                unit of area
 * @property Unit $BARREL              unit of volume
 * @property Unit $BUSHEL              unit of volume
 * @property Unit $CHAIN               unit of length
 * @property Unit $CORD                unit of volume
 * @property Unit $CUP                 unit of volume
 * @property Unit $DRY_PINT            unit of volume
 * @property Unit $DRY_QUART           unit of volume
 * @property Unit $FATHOM              unit of length
 * @property Unit $FLUID_DRAM          unit of volume
 * @property Unit $FLUID_OUNCE         unit of volume
 * @property Unit $FOOT                unit of length
 * @property Unit $FURLONG             unit of length
 * @property Unit $GALLON              unit of volume
 * @property Unit $GILL                unit of volume
 * @property Unit $INCH                unit of length
 * @property Unit $LINK                unit of length
 * @property Unit $MILE                unit of length
 * @property Unit $MINIM               unit of volume
 * @property Unit $PECK                unit of volume
 * @property Unit $PINT                unit of volume
 * @property Unit $QUART               unit of volume
 * @property Unit $ROD                 unit of length
 * @property Unit $SECTION             unit of area
 * @property Unit $SHORT_HUNDREDWEIGHT unit of mass
 * @property Unit $SHORT_TON           unit of mass
 * @property Unit $SQUARE_MILE         unit of area
 * @property Unit $SQUARE_ROD          unit of area
 * @property Unit $SQUARE_FOOT         unit of area
 * @property Unit $SQUARE_INCH         unit of area
 * @property Unit $SQUARE_YARD         unit of area
 * @property Unit $TABLESPOON          unit of volume
 * @property Unit $TEASPOON            unit of volume
 * @property Unit $THOU                unit of length
 * @property Unit $TOWNSHIP            unit of area
 * @property Unit $YARD                unit of length
 * @property Unit $FEET_PER_SECOND     unit of velocity
 * @property Unit $MILES_PER_HOUR      unit of velocity
 * @property Unit $CUBIC_FOOT          unit of volume
 * @property Unit $CUBIC_INCH          unit of volume
 * @property Unit $CUBIC_MILE          unit of volume
 * @property Unit $CUBIC_YARD          unit of volume
 */
class USCustomaryUnits extends SystemOfUnits
{
    const ACRE = 'ACRE';
    const BARREL = 'BARREL';
    const BUSHEL = 'BUSHEL';
    const CHAIN = 'CHAIN';
    const CORD = 'CORD';
    const CUBIC_FOOT = 'CUBIC_FOOT';
    const CUBIC_INCH = 'CUBIC_INCH';
    const CUBIC_MILE = 'CUBIC_MILE';
    const CUBIC_YARD = 'CUBIC_YARD';
    const CUP = 'CUP';
    const DRY_PINT = 'DRY_PINT';
    const DRY_QUART = 'DRY_QUART';
    const FATHOM = 'FATHOM';
    const FLUID_DRAM = 'FLUID_DRAM';
    const FLUID_OUNCE = 'FLUID_OUNCE';
    const FOOT = 'FOOT';
    const FURLONG = 'FURLONG';
    const GALLON = 'GALLON';
    const GILL = 'GILL';
    const INCH = 'INCH';
    const LINK = 'LINK';
    const MILE = 'MILE';
    const MINIM = 'MINIM';
    const PECK = 'PECK';
    const PINT = 'PINT';
    const QUART = 'QUART';
    const ROD = 'ROD';
    const SECTION = 'SECTION';
    const SHORT_HUNDREDWEIGHT = 'SHORT_HUNDREDWEIGHT';
    const SHORT_TON = 'SHORT_TON';
    const SQUARE_MILE = 'SQUARE_MILE';
    const SQUARE_ROD = 'SQUARE_ROD';
    const SQUARE_FOOT = 'SQUARE_FOOT';
    const SQUARE_INCH = 'SQUARE_INCH';
    const SQUARE_YARD = 'SQUARE_YARD';
    const TABLESPOON = 'TABLESPOON';
    const TEASPOON = 'TEASPOON';
    const THOU = 'THOU';
    const TOWNSHIP = 'TOWNSHIP';
    const YARD = 'YARD';
    const FEET_PER_SECOND = 'FEET_PER_SECOND';
    const MILES_PER_HOUR = 'MILES_PER_HOUR';

    /** @var array list of units grouped by quantity */
    protected static $mapping = [
        Area::class => [
            self::ACRE => 'acr',
            self::SECTION => 'mi²',
            self::SQUARE_MILE => 'mi²',
            self::SQUARE_ROD => 'rod²',
            self::SQUARE_FOOT => 'ft²',
            self::SQUARE_INCH => 'in²',
            self::SQUARE_YARD => 'yd²',
            self::TOWNSHIP => 'twp',
        ],
        Length::class => [
            self::CHAIN => 'chain',
            self::FATHOM => 'ftm',
            self::FOOT => 'ft',
            self::FURLONG => 'fur',
            self::INCH => 'in',
            self::LINK => 'link',
            self::MILE => 'mi',
            self::ROD => 'rod',
            self::THOU => 'th',
            self::YARD => 'yd',
        ],
        Mass::class => [
            self::SHORT_HUNDREDWEIGHT => 'cwt',
            self::SHORT_TON => 'ton',
        ],
        Velocity::class => [
            self::FEET_PER_SECOND => 'ft/s',
            self::MILES_PER_HOUR => 'mi/h',
        ],
        Volume::class => [
            self::BARREL => 'bbl',
            self::BUSHEL => 'bu',
            self::CORD => 'ft³*128',
            self::CUBIC_FOOT => 'ft³',
            self::CUBIC_INCH => 'in³',
            self::CUBIC_MILE => 'mi³',
            self::CUBIC_YARD => 'yd³',
            self::CUP => 'cp',
            self::DRY_PINT => 'pt',
            self::DRY_QUART => 'qt',
            self::FLUID_DRAM => 'fl dr',
            self::FLUID_OUNCE => 'fl oz',
            self::GALLON => 'gal',
            self::GILL => 'gi',
            self::MINIM => 'min',
            self::PECK => 'pk',
            self::PINT => 'pi',
            self::QUART => 'qt',
            self::TABLESPOON => 'Tbsp',
            self::TEASPOON => 'tsp',
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
                    new CompoundUnit($this->ROD->pow(2), Area::class),
                    new RationalConverter(160, 1),
                    $symbol
                );
            case self::SECTION:
                return new CompoundUnit($this->MILE->pow(2), Area::class, $symbol);
            case self::SQUARE_FOOT:
                return new CompoundUnit($this->FOOT->pow(2), Area::class, $symbol);
            case self::SQUARE_INCH:
                return new CompoundUnit($this->INCH->pow(2), Area::class, $symbol);
            case self::SQUARE_MILE:
                return new CompoundUnit($this->MILE->pow(2), Area::class, $symbol);
            case self::SQUARE_ROD:
                return new CompoundUnit($this->ROD->pow(2), Area::class, $symbol);
            case self::SQUARE_YARD:
                return new CompoundUnit($this->YARD->pow(2), Area::class, $symbol);
            case self::TOWNSHIP:
                return new TransformedUnit($this->SECTION, new RationalConverter(36, 1), $symbol);
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
                return new TransformedUnit($this->standardUnits->METRE, new RationalConverter(1200, 3937), $symbol);
            case self::FURLONG:
                return new TransformedUnit($this->ROD, new RationalConverter(40, 1), $symbol);
            case self::INCH:
                return new TransformedUnit($this->FOOT, new RationalConverter(1, 12), $symbol);
            case self::LINK:
                return new TransformedUnit($this->CHAIN, new RationalConverter(1, 100), $symbol);
            case self::MILE:
                return new TransformedUnit($this->FURLONG, new RationalConverter(8, 1), $symbol);
            case self::ROD:
                return new TransformedUnit($this->FOOT, new RationalConverter(33, 2), $symbol);
            case self::THOU:
                return new TransformedUnit($this->INCH, new RationalConverter(1, 1000), $symbol);
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
    protected function buildVolume($code, $symbol)
    {
        switch ($code) {
            case self::BARREL:
                return new TransformedUnit($this->GALLON, new RationalConverter(42, 1), $symbol);
            case self::BUSHEL:
                return new TransformedUnit(
                    $this->CUBIC_INCH,
                    new RationalConverter(215042, 100),
                    $symbol
                );
            case self::CORD:
                return new TransformedUnit($this->CUBIC_FOOT, new RationalConverter(128, 1), $symbol);
            case self::CUBIC_FOOT:
                return new CompoundUnit($this->FOOT->pow(3), Volume::class, $symbol);
            case self::CUBIC_INCH:
                return new CompoundUnit($this->INCH->pow(3), Volume::class, $symbol);
            case self::CUBIC_MILE:
                return new CompoundUnit($this->MILE->pow(3), Volume::class, $symbol);
            case self::CUBIC_YARD:
                return new CompoundUnit($this->YARD->pow(3), Volume::class, $symbol);
            case self::CUP:
                return new TransformedUnit($this->TABLESPOON, new RationalConverter(16, 1), $symbol);
            case self::DRY_PINT:
                return new TransformedUnit($this->DRY_QUART, new RationalConverter(1, 2), $symbol);
            case self::DRY_QUART:
                return new TransformedUnit($this->PECK, new RationalConverter(1, 8), $symbol);
            case self::FLUID_DRAM:
                return new TransformedUnit($this->FLUID_OUNCE, new RationalConverter(1, 8), $symbol);
            case self::FLUID_OUNCE:
                return new TransformedUnit($this->GILL, new RationalConverter(1, 4), $symbol);
            case self::GALLON:
                return new TransformedUnit($this->CUBIC_INCH, new RationalConverter(231, 1), $symbol);
            case self::GILL:
                return new TransformedUnit($this->PINT, new RationalConverter(1, 4), $symbol);
            case self::MINIM:
                return new TransformedUnit($this->FLUID_DRAM, new RationalConverter(1, 60), $symbol);
            case self::PECK:
                return new TransformedUnit($this->BUSHEL, new RationalConverter(1, 4), $symbol);
            case self::PINT:
                return new TransformedUnit($this->QUART, new RationalConverter(1, 2), $symbol);
            case self::QUART:
                return new TransformedUnit($this->GALLON, new RationalConverter(1, 4), $symbol);
            case self::TABLESPOON:
                return new TransformedUnit($this->FLUID_OUNCE, new RationalConverter(1, 2), $symbol);
            case self::TEASPOON:
                return new TransformedUnit($this->TABLESPOON, new RationalConverter(1, 3), $symbol);
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
            case self::SHORT_HUNDREDWEIGHT:
                return new TransformedUnit($this->standardUnits->POUND, new RationalConverter(100, 1), $symbol);
            case self::SHORT_TON:
                return new TransformedUnit($this->SHORT_HUNDREDWEIGHT, new RationalConverter(20, 1), $symbol);
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
            case self::MILES_PER_HOUR:
                return new CompoundUnit($this->MILE->divide($this->standardUnits->HOUR), Velocity::class, $symbol);
        }
    }
}
