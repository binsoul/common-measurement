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
 * @property Unit $ACRE_FOOT           unit of volume
 * @property Unit $BARREL              unit of volume
 * @property Unit $BUSHEL              unit of volume
 * @property Unit $CABLE               unit of length
 * @property Unit $CHAIN_SURVEY        unit of length
 * @property Unit $CORD                unit of volume
 * @property Unit $CUBIC_FOOT          unit of volume
 * @property Unit $CUBIC_INCH          unit of volume
 * @property Unit $CUBIC_YARD          unit of volume
 * @property Unit $CUP                 unit of volume
 * @property Unit $DRAM                unit of mass
 * @property Unit $DRY_BARREL          unit of volume
 * @property Unit $DRY_GALLON          unit of volume
 * @property Unit $DRY_PINT            unit of volume
 * @property Unit $DRY_QUART           unit of volume
 * @property Unit $FATHOM              unit of length
 * @property Unit $FEET_PER_SECOND     unit of velocity
 * @property Unit $FLUID_DRAM          unit of volume
 * @property Unit $FLUID_OUNCE         unit of volume
 * @property Unit $FOOT                unit of length
 * @property Unit $FOOT_SURVEY         unit of length
 * @property Unit $FURLONG_SURVEY      unit of length
 * @property Unit $GALLON              unit of volume
 * @property Unit $GILL                unit of volume
 * @property Unit $GRAIN               unit of mass
 * @property Unit $HOGSHEAD            unit of volume
 * @property Unit $INCH                unit of length
 * @property Unit $LEAGUE_SURVEY       unit of length
 * @property Unit $LINK_SURVEY         unit of length
 * @property Unit $MILE                unit of length
 * @property Unit $MILE_SURVEY         unit of length
 * @property Unit $MILES_PER_HOUR      unit of velocity
 * @property Unit $MINIM               unit of volume
 * @property Unit $OIL_BARREL          unit of volume
 * @property Unit $OUNCE               unit of mass
 * @property Unit $PECK                unit of volume
 * @property Unit $PICA                unit of length
 * @property Unit $PINT                unit of volume
 * @property Unit $POINT               unit of length
 * @property Unit $POUND               unit of mass
 * @property Unit $QUART               unit of volume
 * @property Unit $QUARTER             unit of mass
 * @property Unit $ROD_SURVEY          unit of length
 * @property Unit $SECTION             unit of area
 * @property Unit $SHORT_HUNDREDWEIGHT unit of mass
 * @property Unit $SHORT_TON           unit of mass
 * @property Unit $SHOT                unit of volume
 * @property Unit $SQUARE_CHAIN_SURVEY unit of area
 * @property Unit $SQUARE_FOOT         unit of area
 * @property Unit $SQUARE_FOOT_SURVEY  unit of area
 * @property Unit $SQUARE_INCH         unit of area
 * @property Unit $SQUARE_MILE         unit of area
 * @property Unit $SQUARE_YARD         unit of area
 * @property Unit $TABLESPOON          unit of volume
 * @property Unit $TEASPOON            unit of volume
 * @property Unit $THOU                unit of length
 * @property Unit $TOWNSHIP            unit of area
 * @property Unit $YARD                unit of length
 */
class USCustomaryUnits extends SystemOfUnits
{
    const ACRE = 'ACRE';
    const ACRE_FOOT = 'ACRE_FOOT';
    const BARREL = 'BARREL';
    const BUSHEL = 'BUSHEL';
    const CABLE = 'CABLE';
    const CHAIN_SURVEY = 'CHAIN_SURVEY';
    const CORD = 'CORD';
    const CUBIC_FOOT = 'CUBIC_FOOT';
    const CUBIC_INCH = 'CUBIC_INCH';
    const CUBIC_YARD = 'CUBIC_YARD';
    const CUP = 'CUP';
    const DRAM = 'DRAM';
    const DRY_BARREL = 'DRY_BARREL';
    const DRY_GALLON = 'DRY_GALLON';
    const DRY_PINT = 'DRY_PINT';
    const DRY_QUART = 'DRY_QUART';
    const FATHOM = 'FATHOM';
    const FEET_PER_SECOND = 'FEET_PER_SECOND';
    const FLUID_DRAM = 'FLUID_DRAM';
    const FLUID_OUNCE = 'FLUID_OUNCE';
    const FOOT = 'FOOT';
    const FOOT_SURVEY = 'FOOT_SURVEY';
    const FURLONG_SURVEY = 'FURLONG_SURVEY';
    const GALLON = 'GALLON';
    const GILL = 'GILL';
    const GRAIN = 'GRAIN';
    const HOGSHEAD = 'HOGSHEAD';
    const INCH = 'INCH';
    const LEAGUE_SURVEY = 'LEAGUE_SURVEY';
    const LINK_SURVEY = 'LINK_SURVEY';
    const MILE = 'MILE';
    const MILE_SURVEY = 'MILE_SURVEY';
    const MILES_PER_HOUR = 'MILES_PER_HOUR';
    const MINIM = 'MINIM';
    const OIL_BARREL = 'OIL_BARREL';
    const OUNCE = 'OUNCE';
    const PECK = 'PECK';
    const PICA = 'PICA';
    const PINT = 'PINT';
    const POINT = 'POINT';
    const POUND = 'POUND';
    const QUART = 'QUART';
    const QUARTER = 'QUARTER';
    const ROD_SURVEY = 'ROD_SURVEY';
    const SECTION = 'SECTION';
    const SHORT_HUNDREDWEIGHT = 'SHORT_HUNDREDWEIGHT';
    const SHORT_TON = 'SHORT_TON';
    const SHOT = 'SHOT';
    const SQUARE_CHAIN_SURVEY = 'SQUARE_CHAIN_SURVEY';
    const SQUARE_FOOT = 'SQUARE_FOOT';
    const SQUARE_FOOT_SURVEY = 'SQUARE_FOOT_SURVEY';
    const SQUARE_INCH = 'SQUARE_INCH';
    const SQUARE_MILE = 'SQUARE_MILE';
    const SQUARE_ROD = 'SQUARE_ROD';
    const SQUARE_YARD = 'SQUARE_YARD';
    const TABLESPOON = 'TABLESPOON';
    const TEASPOON = 'TEASPOON';
    const THOU = 'THOU';
    const TOWNSHIP = 'TOWNSHIP';
    const YARD = 'YARD';

    /** @var array list of units grouped by quantity */
    protected static $mapping = [
        Area::class => [
            self::ACRE => 'acr',
            self::SECTION => 'mi²',
            self::SQUARE_CHAIN_SURVEY => 'ch²',
            self::SQUARE_INCH => 'in²',
            self::SQUARE_FOOT => 'ft²',
            self::SQUARE_FOOT_SURVEY => 'ft²',
            self::SQUARE_MILE => 'mi²',
            self::SQUARE_YARD => 'yd²',
            self::TOWNSHIP => 'twp',

        ],
        Length::class => [
            self::CABLE => 'cb',
            self::CHAIN_SURVEY => 'ch',
            self::FATHOM => 'ftm',
            self::FOOT => 'ft',
            self::FOOT_SURVEY => 'ft',
            self::FURLONG_SURVEY => 'fur',
            self::INCH => 'in',
            self::LEAGUE_SURVEY => 'lea',
            self::LINK_SURVEY => 'li',
            self::MILE => 'mi',
            self::MILE_SURVEY => 'mi',
            self::PICA => 'P̸',
            self::POINT => 'p',
            self::ROD_SURVEY => 'rd',
            self::THOU => 'th',
            self::YARD => 'yd',

        ],
        Mass::class => [
            self::GRAIN => 'gr',
            self::DRAM => 'dr',
            self::OUNCE => 'oz',
            self::POUND => 'lb',
            self::QUARTER => 'qr',
            self::SHORT_HUNDREDWEIGHT => 'cwt',
            self::SHORT_TON => 'ton',
        ],
        Velocity::class => [
            self::FEET_PER_SECOND => 'ft/s',
            self::MILES_PER_HOUR => 'mi/h',
        ],
        Volume::class => [
            self::ACRE_FOOT => 'acr ft',
            self::BARREL => 'bbl',
            self::BUSHEL => 'bu',
            self::CORD => 'cord',
            self::CUBIC_FOOT => 'ft³',
            self::CUBIC_INCH => 'in³',
            self::CUBIC_YARD => 'yd³',
            self::CUP => 'cp',
            self::DRY_BARREL => 'bbl',
            self::DRY_GALLON => 'gal',
            self::DRY_PINT => 'pt',
            self::DRY_QUART => 'qt',
            self::FLUID_DRAM => 'fl dr',
            self::FLUID_OUNCE => 'fl oz',
            self::GALLON => 'gal',
            self::GILL => 'gi',
            self::HOGSHEAD => 'hogshead',
            self::MINIM => 'min',
            self::OIL_BARREL => 'bbl',
            self::PECK => 'pk',
            self::PINT => 'pi',
            self::QUART => 'qt',
            self::SHOT => 'jig',
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
            case self::SQUARE_INCH:
                return new CompoundUnit($this->INCH->pow(2), Area::class, $symbol);
            case self::SQUARE_FOOT:
                return new CompoundUnit($this->FOOT->pow(2), Area::class, $symbol);
            case self::SQUARE_YARD:
                return new CompoundUnit($this->YARD->pow(2), Area::class, $symbol);
            case self::SQUARE_MILE:
                return new CompoundUnit($this->MILE->pow(2), Area::class, $symbol);

            case self::SQUARE_FOOT_SURVEY:
                return new CompoundUnit($this->FOOT_SURVEY->pow(2), Area::class, $symbol);
            case self::SQUARE_CHAIN_SURVEY:
                return new TransformedUnit($this->SQUARE_FOOT_SURVEY, new RationalConverter(4356, 1), $symbol);
            case self::ACRE:
                return new TransformedUnit($this->SQUARE_CHAIN_SURVEY, new RationalConverter(10, 1), $symbol);
            case self::SECTION:
                return new TransformedUnit($this->ACRE, new RationalConverter(640, 1), $symbol);
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
            case self::THOU:
                return new TransformedUnit($this->INCH, new RationalConverter(1, 1000), $symbol);
            case self::POINT:
                return new TransformedUnit($this->PICA, new RationalConverter(1, 12), $symbol);
            case self::PICA:
                return new TransformedUnit($this->INCH, new RationalConverter(1, 6), $symbol);
            case self::INCH:
                return new TransformedUnit($this->standardUnits->CENTIMETRE, new RationalConverter(254, 100), $symbol);
            case self::FOOT:
                return new TransformedUnit($this->INCH, new RationalConverter(12, 1), $symbol);
            case self::YARD:
                return new TransformedUnit($this->FOOT, new RationalConverter(3, 1), $symbol);
            case self::MILE:
                return new TransformedUnit($this->YARD, new RationalConverter(1760, 1), $symbol);

            case self::LINK_SURVEY:
                return new TransformedUnit($this->FOOT_SURVEY, new RationalConverter(33, 50), $symbol);
            case self::FOOT_SURVEY:
                return new TransformedUnit($this->standardUnits->METRE, new RationalConverter(1200, 3937), $symbol);
            case self::ROD_SURVEY:
                return new TransformedUnit($this->LINK_SURVEY, new RationalConverter(25, 1), $symbol);
            case self::CHAIN_SURVEY:
                return new TransformedUnit($this->ROD_SURVEY, new RationalConverter(4, 1), $symbol);
            case self::FURLONG_SURVEY:
                return new TransformedUnit($this->CHAIN_SURVEY, new RationalConverter(10, 1), $symbol);
            case self::MILE_SURVEY:
                return new TransformedUnit($this->FURLONG_SURVEY, new RationalConverter(8, 1), $symbol);
            case self::LEAGUE_SURVEY:
                return new TransformedUnit($this->MILE_SURVEY, new RationalConverter(3, 1), $symbol);

            case self::FATHOM:
                return new TransformedUnit($this->YARD, new RationalConverter(2, 1), $symbol);
            case self::CABLE:
                return new TransformedUnit($this->FATHOM, new RationalConverter(120, 1), $symbol);
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
            case self::CUBIC_INCH:
                return new TransformedUnit(
                    $this->standardUnits->MILLILITRE,
                    new RationalConverter(16387064, 1000000),
                    $symbol
                );
            case self::CUBIC_FOOT:
                return new TransformedUnit($this->CUBIC_INCH, new RationalConverter(1728, 1), $symbol);
            case self::CUBIC_YARD:
                return new TransformedUnit($this->CUBIC_FOOT, new RationalConverter(27, 1), $symbol);
            case self::ACRE_FOOT:
                return new TransformedUnit($this->CUBIC_FOOT, new RationalConverter(43560, 1), $symbol);

            case self::MINIM:
                return new TransformedUnit(
                    $this->standardUnits->MILLILITRE,
                    new RationalConverter(61611519921875, 1000000000000000),
                    $symbol
                );
            case self::FLUID_DRAM:
                return new TransformedUnit($this->MINIM, new RationalConverter(60, 1), $symbol);
            case self::TEASPOON:
                return new TransformedUnit($this->MINIM, new RationalConverter(80, 1), $symbol);
            case self::TABLESPOON:
                return new TransformedUnit($this->TEASPOON, new RationalConverter(3, 1), $symbol);
            case self::FLUID_OUNCE:
                return new TransformedUnit($this->TABLESPOON, new RationalConverter(2, 1), $symbol);
            case self::SHOT:
                return new TransformedUnit($this->TABLESPOON, new RationalConverter(3, 1), $symbol);
            case self::GILL:
                return new TransformedUnit($this->FLUID_OUNCE, new RationalConverter(4, 1), $symbol);
            case self::CUP:
                return new TransformedUnit($this->GILL, new RationalConverter(2, 1), $symbol);
            case self::PINT:
                return new TransformedUnit($this->CUP, new RationalConverter(2, 1), $symbol);
            case self::QUART:
                return new TransformedUnit($this->PINT, new RationalConverter(2, 1), $symbol);
            case self::GALLON:
                return new TransformedUnit($this->QUART, new RationalConverter(4, 1), $symbol);
            case self::BARREL:
                return new TransformedUnit($this->GALLON, new RationalConverter(63, 2), $symbol);
            case self::OIL_BARREL:
                return new TransformedUnit($this->GALLON, new RationalConverter(42, 1), $symbol);
            case self::HOGSHEAD:
                return new TransformedUnit($this->GALLON, new RationalConverter(63, 1), $symbol);

            case self::DRY_PINT:
                return new TransformedUnit(
                    $this->standardUnits->LITRE,
                    new RationalConverter(5506105, 10000000),
                    $symbol
                );
            case self::DRY_QUART:
                return new TransformedUnit($this->DRY_PINT, new RationalConverter(2, 1), $symbol);
            case self::DRY_GALLON:
                return new TransformedUnit($this->DRY_QUART, new RationalConverter(4, 1), $symbol);
            case self::PECK:
                return new TransformedUnit($this->DRY_GALLON, new RationalConverter(2, 1), $symbol);
            case self::BUSHEL:
                return new TransformedUnit($this->PECK, new RationalConverter(4, 1), $symbol);
            case self::DRY_BARREL:
                return new TransformedUnit(
                    $this->CUBIC_INCH,
                    new RationalConverter(7056, 1),
                    $symbol
                );

            case self::CORD:
                return new TransformedUnit($this->CUBIC_FOOT, new RationalConverter(128, 1), $symbol);
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
            case self::POUND:
                return new TransformedUnit(
                    $this->standardUnits->KILOGRAM,
                    new RationalConverter(45359237, 100000000),
                    $symbol
                );
            case self::GRAIN:
                return new TransformedUnit($this->POUND, new RationalConverter(1, 7000), $symbol);
            case self::DRAM:
                return new TransformedUnit($this->OUNCE, new RationalConverter(1, 16), $symbol);
            case self::OUNCE:
                return new TransformedUnit($this->POUND, new RationalConverter(1, 16), $symbol);
            case self::QUARTER:
                return new TransformedUnit($this->POUND, new RationalConverter(25, 1), $symbol);
            case self::SHORT_HUNDREDWEIGHT:
                return new TransformedUnit($this->QUARTER, new RationalConverter(4, 1), $symbol);
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
