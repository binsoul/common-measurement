<?php

namespace BinSoul\Common\Measurement\SystemOfUnits;

use BinSoul\Common\Measurement\Converter\AddConverter;
use BinSoul\Common\Measurement\Converter\ExpConverter;
use BinSoul\Common\Measurement\Converter\MultiplyConverter;
use BinSoul\Common\Measurement\Converter\RationalConverter;
use BinSoul\Common\Measurement\Dimension;
use BinSoul\Common\Measurement\Quantity\Acceleration;
use BinSoul\Common\Measurement\Quantity\AmountOfSubstance;
use BinSoul\Common\Measurement\Quantity\Angle;
use BinSoul\Common\Measurement\Quantity\Area;
use BinSoul\Common\Measurement\Quantity\CatalyticActivity;
use BinSoul\Common\Measurement\Quantity\Constant;
use BinSoul\Common\Measurement\Quantity\DataAmount;
use BinSoul\Common\Measurement\Quantity\DataRate;
use BinSoul\Common\Measurement\Quantity\Duration;
use BinSoul\Common\Measurement\Quantity\DynamicViscosity;
use BinSoul\Common\Measurement\Quantity\ElectricCapacitance;
use BinSoul\Common\Measurement\Quantity\ElectricCharge;
use BinSoul\Common\Measurement\Quantity\ElectricConductance;
use BinSoul\Common\Measurement\Quantity\ElectricCurrent;
use BinSoul\Common\Measurement\Quantity\ElectricInductance;
use BinSoul\Common\Measurement\Quantity\ElectricPotential;
use BinSoul\Common\Measurement\Quantity\ElectricResistance;
use BinSoul\Common\Measurement\Quantity\Energy;
use BinSoul\Common\Measurement\Quantity\Force;
use BinSoul\Common\Measurement\Quantity\Frequency;
use BinSoul\Common\Measurement\Quantity\Illuminance;
use BinSoul\Common\Measurement\Quantity\KinematicViscosity;
use BinSoul\Common\Measurement\Quantity\Length;
use BinSoul\Common\Measurement\Quantity\Level;
use BinSoul\Common\Measurement\Quantity\LuminousFlux;
use BinSoul\Common\Measurement\Quantity\LuminousIntensity;
use BinSoul\Common\Measurement\Quantity\MagneticFlux;
use BinSoul\Common\Measurement\Quantity\MagneticFluxDensity;
use BinSoul\Common\Measurement\Quantity\Mass;
use BinSoul\Common\Measurement\Quantity\Power;
use BinSoul\Common\Measurement\Quantity\Pressure;
use BinSoul\Common\Measurement\Quantity\RadiationDoseAbsorbed;
use BinSoul\Common\Measurement\Quantity\RadiationDoseEffective;
use BinSoul\Common\Measurement\Quantity\RadioactiveActivity;
use BinSoul\Common\Measurement\Quantity\Ratio;
use BinSoul\Common\Measurement\Quantity\SolidAngle;
use BinSoul\Common\Measurement\Quantity\Temperature;
use BinSoul\Common\Measurement\Quantity\Velocity;
use BinSoul\Common\Measurement\Quantity\Volume;
use BinSoul\Common\Measurement\SystemOfUnits;
use BinSoul\Common\Measurement\Unit;
use BinSoul\Common\Measurement\Unit\AlternateUnit;
use BinSoul\Common\Measurement\Unit\BaseUnit;
use BinSoul\Common\Measurement\Unit\CompoundUnit;
use BinSoul\Common\Measurement\Unit\TransformedUnit;

/**
 * @property Unit $AMPERE                    unit of electric current
 * @property Unit $ACCELLERATION_OF_FREEFALL unit of acceleration
 * @property Unit $ANGSTROM                  unit of length
 * @property Unit $ARE                       unit of area
 * @property Unit $ASTRONOMICAL_UNIT         unit of length
 * @property Unit $ATMOSPHERE_STANDARD       unit of pressure
 * @property Unit $ATMOSPHERE_TECHNICAL      unit of pressure
 * @property Unit $ATOMIC_MASS               unit of mass
 * @property Unit $AVOGADRO_CONSTANT         unit of amount of substance
 * @property Unit $BAR                       unit of pressure
 * @property Unit $BASIS_POINT               unit of ratio
 * @property Unit $BAUD                      unit of data rate
 * @property Unit $BECQUEREL                 unit of radioactive activity
 * @property Unit $BEL                       unit of level
 * @property Unit $BIT                       unit of data amount
 * @property Unit $BOLTZMAN_CONSTANT         constant
 * @property Unit $BYTE                      unit of data amount
 * @property Unit $CALORIE_AT_15C            unit of energy
 * @property Unit $CALORIE_AT_20C            unit of energy
 * @property Unit $CALORIE_FOOD              unit of energy
 * @property Unit $CALORIE_TABLE             unit of energy
 * @property Unit $CALORIE_MEAN              unit of energy
 * @property Unit $CALORIE_THERMOCHEMICAL    unit of energy
 * @property Unit $CANDELA                   unit of luminous intensity
 * @property Unit $CARAT_METRIC              unit of mass
 * @property Unit $CELSIUS                   unit of temperature
 * @property Unit $CENTIMETRE                unit of length
 * @property Unit $CENTIRADIAN               unit of angle
 * @property Unit $COULOMB                   unit of electric charge
 * @property Unit $CUBIC_METRE               unit of volume
 * @property Unit $CURIE                     unit of radioactive activity
 * @property Unit $DAY                       unit of duration
 * @property Unit $DAY_SIDEREAL              unit of duration
 * @property Unit $DECIBEL                   unit of level
 * @property Unit $DEGREE_ANGLE              unit of angle
 * @property Unit $DYNE                      unit of force
 * @property Unit $ELECTRON_MASS             unit of mass
 * @property Unit $ELECTRON_VOLT             unit of energy
 * @property Unit $ELEMENTARY_CHARGE         unit of electric charge
 * @property Unit $ERG                       unit of energy
 * @property Unit $FAHRENHEIT                unit of temperature
 * @property Unit $FARAD                     unit of electric capacitance
 * @property Unit $FARADAY_CONSTANT          unit of electric charge
 * @property Unit $FRANKLIN                  unit of electric charge
 * @property Unit $GAUSS                     unit of magnetic flux density
 * @property Unit $GILBERT                   unit of electric current
 * @property Unit $GRADE                     unit of angle
 * @property Unit $GRAM                      unit of mass
 * @property Unit $GRAM_FORCE                unit of force
 * @property Unit $GRAVITY_CONSTANT          unit of
 * @property Unit $GRAY                      unit of radiation dose absorbed
 * @property Unit $HECTARE                   unit of area
 * @property Unit $HENRY                     unit of electric inductance
 * @property Unit $HERTZ                     unit of frequency
 * @property Unit $HORSEPOWER_BOILER         unit of power
 * @property Unit $HORSEPOWER_ELECTRIC       unit of power
 * @property Unit $HORSEPOWER_MECHANICAL     unit of power
 * @property Unit $HORSEPOWER_METRIC         unit of power
 * @property Unit $HOUR                      unit of duration
 * @property Unit $INCH_OF_MERCURY           unit of pressure
 * @property Unit $JOULE                     unit of energy
 * @property Unit $KATAL                     unit of catalytic activity
 * @property Unit $KELVIN                    unit of temperature
 * @property Unit $KILOGRAM                  unit of mass
 * @property Unit $KILOGRAM_FORCE            unit of force
 * @property Unit $KILOJOULE                 unit of energy
 * @property Unit $KILOMETRE                 unit of length
 * @property Unit $KILOMETRES_PER_HOUR       unit of velocity
 * @property Unit $KNOT                      unit of velocity
 * @property Unit $LAMBERT                   unit of illuminance
 * @property Unit $LIGHT_YEAR                unit of length
 * @property Unit $LITRE                     unit of volume
 * @property Unit $LUMEN                     unit of luminous flux
 * @property Unit $LUX                       unit of illuminance
 * @property Unit $MAXWELL                   unit of magnetic flux
 * @property Unit $METRE                     unit of length
 * @property Unit $METRES_PER_SECOND         unit of velocity
 * @property Unit $METRES_PER_SQUARE_SECOND  unit of acceleration
 * @property Unit $MILLIGRAM                 unit of mass
 * @property Unit $MILLILITRE                unit of volume
 * @property Unit $MILLIMETRE                unit of length
 * @property Unit $MILLIMETRE_OF_MERCURY     unit of pressure
 * @property Unit $MINUTE                    unit of duration
 * @property Unit $MINUTE_ANGLE              unit of angle
 * @property Unit $MOLE                      unit of amount of substance
 * @property Unit $MONTH                     unit of duration
 * @property Unit $MONTH_GREGORIAN           unit of duration
 * @property Unit $MONTH_JULIAN              unit of duration
 * @property Unit $MONTH_SYNODAL             unit of duration
 * @property Unit $NAUTICAL_MILE             unit of length
 * @property Unit $NEPER                     unit of level
 * @property Unit $NEWTON                    unit of force
 * @property Unit $OHM                       unit of electric resistance
 * @property Unit $OUNCE                     unit of mass
 * @property Unit $PARSEC                    unit of length
 * @property Unit $PASCAL                    unit of pressure
 * @property Unit $PER_CENT_MILLE            unit of ratio
 * @property Unit $PER_MILLE                 unit of ratio
 * @property Unit $PERCENT                   unit of ratio
 * @property Unit $PERMEABILITY_OF_VACUUM    unit of
 * @property Unit $PERMITTIVITY_OF_VACUUM    unit of
 * @property Unit $PI                        constant
 * @property Unit $PLANCK_CONSTANT           unit of
 * @property Unit $POISE                     unit of dynamic viscosity
 * @property Unit $PROTON_MASS               unit of mass
 * @property Unit $RAD                       unit of radiation dose absorbed
 * @property Unit $RADIAN                    unit of angle
 * @property Unit $RANKINE                   unit of temperature
 * @property Unit $REM                       unit of radiation dose effective
 * @property Unit $REVOLUTION                unit of angle
 * @property Unit $RUTHERFORD                unit of radioactive activity
 * @property Unit $SECOND                    unit of duration
 * @property Unit $SECOND_ANGLE              unit of angle
 * @property Unit $SIEMENS                   unit of electric conductance
 * @property Unit $SIEVERT                   unit of radiation dose effective
 * @property Unit $SPEED_OF_LIGHT            unit of velocity
 * @property Unit $SPHERE                    unit of solid angle
 * @property Unit $SQUARE_CENTIMETRE         unit of area
 * @property Unit $SQUARE_KILOMETRE          unit of area
 * @property Unit $SQUARE_METRE              unit of area
 * @property Unit $SQUARE_MILLIMETRE         unit of area
 * @property Unit $STERADIAN                 unit of solid angle
 * @property Unit $STOKE                     unit of kinematic viscosity
 * @property Unit $TESLA                     unit of magnetic flux density
 * @property Unit $TONNE                     unit of mass
 * @property Unit $TORR                      unit of pressure
 * @property Unit $VOLT                      unit of electric potential
 * @property Unit $WATT                      unit of power
 * @property Unit $WEBER                     unit of magnetic flux
 * @property Unit $WEEK                      unit of duration
 * @property Unit $YEAR                      unit of duration
 * @property Unit $YEAR_CALENDAR             unit of duration
 * @property Unit $YEAR_GREGORIAN            unit of duration
 * @property Unit $YEAR_JULIAN               unit of duration
 * @property Unit $YEAR_JULIEN               unit of duration
 * @property Unit $YEAR_SIDEREAL             unit of duration
 * @property Unit $YEAR_TROPICAL             unit of duration
 */
class StandardUnits extends SystemOfUnits
{
    const AMPERE = 'AMPERE';
    const ACCELLERATION_OF_FREEFALL = 'ACCELLERATION_OF_FREEFALL';
    const ANGSTROM = 'ANGSTROM';
    const ARE = 'ARE';
    const ASTRONOMICAL_UNIT = 'ASTRONOMICAL_UNIT';
    const ATMOSPHERE_STANDARD = 'ATMOSPHERE_STANDARD';
    const ATMOSPHERE_TECHNICAL = 'ATMOSPHERE_TECHNICAL';
    const ATOMIC_MASS = 'ATOMIC_MASS';
    const AVOGADRO_CONSTANT = 'AVOGADRO_CONSTANT';
    const BAR = 'BAR';
    const BASIS_POINT = 'BASIS_POINT';
    const BAUD = 'BAUD';
    const BECQUEREL = 'BECQUEREL';
    const BEL = 'BEL';
    const BIT = 'BIT';
    const BOLTZMAN_CONSTANT = 'BOLTZMAN_CONSTANT';
    const BYTE = 'BYTE';
    const CALORIE_AT_15C = 'CALORIE_AT_15C';
    const CALORIE_AT_20C = 'CALORIE_AT_20C';
    const CALORIE_FOOD = 'CALORIE_FOOD';
    const CALORIE_TABLE = 'CALORIE_TABLE';
    const CALORIE_MEAN = 'CALORIE_MEAN';
    const CALORIE_THERMOCHEMICAL = 'CALORIE_THERMOCHEMICAL';
    const CANDELA = 'CANDELA';
    const CARAT_METRIC = 'CARAT_METRIC';
    const CELSIUS = 'CELSIUS';
    const CENTIMETRE = 'CENTIMETRE';
    const CENTIRADIAN = 'CENTIRADIAN';
    const COULOMB = 'COULOMB';
    const CUBIC_METRE = 'CUBIC_METRE';
    const CURIE = 'CURIE';
    const DAY = 'DAY';
    const DAY_SIDEREAL = 'DAY_SIDEREAL';
    const DECIBEL = 'DECIBEL';
    const DEGREE_ANGLE = 'DEGREE_ANGLE';
    const DYNE = 'DYNE';
    const ELECTRON_MASS = 'ELECTRON_MASS';
    const ELECTRON_VOLT = 'ELECTRON_VOLT';
    const ELEMENTARY_CHARGE = 'ELEMENTARY_CHARGE';
    const ERG = 'ERG';
    const FAHRENHEIT = 'FAHRENHEIT';
    const FARAD = 'FARAD';
    const FARADAY_CONSTANT = 'FARADAY_CONSTANT';
    const FOOT = 'FOOT';
    const FRANKLIN = 'FRANKLIN';
    const GAUSS = 'GAUSS';
    const GILBERT = 'GILBERT';
    const GRADE = 'GRADE';
    const GRAM = 'GRAM';
    const GRAM_FORCE = 'GRAM_FORCE';
    const GRAVITY_CONSTANT = 'GRAVITY_CONSTANT';
    const GRAY = 'GRAY';
    const HECTARE = 'HECTARE';
    const HENRY = 'HENRY';
    const HERTZ = 'HERTZ';
    const HORSEPOWER_BOILER = 'HORSEPOWER_BOILER';
    const HORSEPOWER_ELECTRIC = 'HORSEPOWER_ELECTRIC';
    const HORSEPOWER_MECHANICAL = 'HORSEPOWER_MECHANICAL';
    const HORSEPOWER_METRIC = 'HORSEPOWER_METRIC';
    const HOUR = 'HOUR';
    const INCH_OF_MERCURY = 'INCH_OF_MERCURY';
    const JOULE = 'JOULE';
    const KATAL = 'KATAL';
    const KELVIN = 'KELVIN';
    const KILOGRAM = 'KILOGRAM';
    const KILOGRAM_FORCE = 'KILOGRAM_FORCE';
    const KILOJOULE = 'KILOJOULE';
    const KILOMETRE = 'KILOMETRE';
    const KILOMETRES_PER_HOUR = 'KILOMETRES_PER_HOUR';
    const KNOT = 'KNOT';
    const LAMBERT = 'LAMBERT';
    const LIGHT_YEAR = 'LIGHT_YEAR';
    const LITRE = 'LITRE';
    const LUMEN = 'LUMEN';
    const LUX = 'LUX';
    const MAXWELL = 'MAXWELL';
    const METRE = 'METRE';
    const METRES_PER_SECOND = 'METRES_PER_SECOND';
    const METRES_PER_SQUARE_SECOND = 'METRES_PER_SQUARE_SECOND';
    const MILLIGRAM = 'MILLIGRAM';
    const MILLILITRE = 'MILLILITRE';
    const MILLIMETRE = 'MILLIMETRE';
    const MILLIMETRE_OF_MERCURY = 'MILLIMETRE_OF_MERCURY';
    const MINUTE = 'MINUTE';
    const MINUTE_ANGLE = 'MINUTE_ANGLE';
    const MOLE = 'MOLE';
    const MONTH = 'MONTH';
    const MONTH_GREGORIAN = 'MONTH_GREGORIAN';
    const MONTH_JULIAN = 'MONTH_JULIAN';
    const MONTH_SYNODAL = 'MONTH_SYNODAL';
    const NAUTICAL_MILE = 'NAUTICAL_MILE';
    const NEPER = 'NEPER';
    const NEWTON = 'NEWTON';
    const OHM = 'OHM';
    const PARSEC = 'PARSEC';
    const PASCAL = 'PASCAL';
    const PER_CENT_MILLE = 'PER_CENT_MILLE';
    const PER_MILLE = 'PER_MILLE';
    const PERCENT = 'PERCENT';
    const PERMEABILITY_OF_VACUUM = 'PERMEABILITY_OF_VACUUM';
    const PERMITTIVITY_OF_VACUUM = 'PERMITTIVITY_OF_VACUUM';
    const PI = 'PI';
    const PLANCK_CONSTANT = 'PLANCK_CONSTANT';
    const POISE = 'POISE';
    const PROTON_MASS = 'PROTON_MASS';
    const RAD = 'RAD';
    const RADIAN = 'RADIAN';
    const RANKINE = 'RANKINE';
    const REM = 'REM';
    const REVOLUTION = 'REVOLUTION';
    const RUTHERFORD = 'RUTHERFORD';
    const SECOND = 'SECOND';
    const SECOND_ANGLE = 'SECOND_ANGLE';
    const SIEMENS = 'SIEMENS';
    const SIEVERT = 'SIEVERT';
    const SPEED_OF_LIGHT = 'SPEED_OF_LIGHT';
    const SPHERE = 'SPHERE';
    const SQUARE_CENTIMETRE = 'SQUARE_CENTIMETRE';
    const SQUARE_KILOMETRE = 'SQUARE_KILOMETRE';
    const SQUARE_METRE = 'SQUARE_METRE';
    const SQUARE_MILLIMETRE = 'SQUARE_MILLIMETRE';
    const STERADIAN = 'STERADIAN';
    const STOKE = 'STOKE';
    const TESLA = 'TESLA';
    const TONNE = 'TONNE';
    const TORR = 'TORR';
    const VOLT = 'VOLT';
    const WATT = 'WATT';
    const WEBER = 'WEBER';
    const WEEK = 'WEEK';
    const YEAR = 'YEAR';
    const YEAR_CALENDAR = 'YEAR_CALENDAR';
    const YEAR_GREGORIAN = 'YEAR_GREGORIAN';
    const YEAR_JULIAN = 'YEAR_JULIAN';
    const YEAR_JULIEN = 'YEAR_JULIEN';
    const YEAR_SIDEREAL = 'YEAR_SIDEREAL';
    const YEAR_TROPICAL = 'YEAR_TROPICAL';

    /** @var array list of units grouped by quantity */
    protected static $mapping = [
        ElectricCurrent::class => [
            self::AMPERE => 'A',
            self::GILBERT => 'Gb',
        ],
        Acceleration::class => [
            self::METRES_PER_SQUARE_SECOND => 'm/s²',
        ],
        Area::class => [
            self::ARE => 'a',
            self::HECTARE => 'a*100',
            self::SQUARE_CENTIMETRE => 'cm²',
            self::SQUARE_KILOMETRE => 'km²',
            self::SQUARE_METRE => 'm²',
            self::SQUARE_MILLIMETRE => 'mm²',
        ],
        Length::class => [
            self::ANGSTROM => 'Å',
            self::ASTRONOMICAL_UNIT => 'AU',
            self::CENTIMETRE => 'cm',
            self::KILOMETRE => 'km',
            self::LIGHT_YEAR => 'ly',
            self::METRE => 'm',
            self::MILLIMETRE => 'mm',
            self::NAUTICAL_MILE => 'nmi',
            self::PARSEC => 'pc',
        ],
        Pressure::class => [
            self::ATMOSPHERE_STANDARD => 'atm',
            self::ATMOSPHERE_TECHNICAL => 'at',
            self::BAR => 'bar',
            self::INCH_OF_MERCURY => 'inHg',
            self::MILLIMETRE_OF_MERCURY => 'mmHg',
            self::PASCAL => 'Pa',
            self::TORR => 'Torr',
        ],
        Mass::class => [
            self::CARAT_METRIC => 'ct',
            self::GRAM => 'g',
            self::KILOGRAM => 'kg',
            self::MILLIGRAM => 'mg',
            self::TONNE => 't',
        ],
        AmountOfSubstance::class => [
            self::MOLE => 'mol',
        ],
        Volume::class => [
            self::CUBIC_METRE => 'm³',
            self::LITRE => 'l',
            self::MILLILITRE => 'ml',
        ],
        DataRate::class => [
            self::BAUD => 'Bd',
        ],
        RadioactiveActivity::class => [
            self::BECQUEREL => 'Bq',
            self::CURIE => 'Ci',
            self::RUTHERFORD => 'Rd',
        ],
        DataAmount::class => [
            self::BIT => 'b',
            self::BYTE => 'B',
        ],

        Energy::class => [
            self::CALORIE_AT_15C => 'cal_15',
            self::CALORIE_AT_20C => 'cal_20',
            self::CALORIE_FOOD => 'kcal',
            self::CALORIE_TABLE => 'cal_IT',
            self::CALORIE_MEAN => 'cal_mean',
            self::CALORIE_THERMOCHEMICAL => 'cal_th',
            self::ERG => 'erg',
            self::JOULE => 'J',
            self::KILOJOULE => 'kJ',
            self::ELECTRON_VOLT => 'eV',
        ],
        LuminousIntensity::class => [
            self::CANDELA => 'cd',
        ],
        Temperature::class => [
            self::CELSIUS => '°C',
            self::FAHRENHEIT => '°F',
            self::KELVIN => 'K',
            self::RANKINE => '°R',
        ],
        Angle::class => [
            self::CENTIRADIAN => 'rad/100',
            self::DEGREE_ANGLE => '°',
            self::GRADE => 'gon',
            self::MINUTE_ANGLE => '\'',
            self::RADIAN => 'rad',
            self::REVOLUTION => '(rad*π)*2',
            self::SECOND_ANGLE => '\'\'',
        ],
        ElectricCharge::class => [
            self::COULOMB => 'C',
            self::FRANKLIN => 'Fr',
        ],
        Duration::class => [
            self::DAY_SIDEREAL => 'd_s',
            self::DAY => 'd',
            self::HOUR => 'h',
            self::MINUTE => 'min',
            self::MONTH_GREGORIAN => 'mo_g',
            self::MONTH_JULIAN => 'mo_j',
            self::MONTH_SYNODAL => 'mo_s',
            self::MONTH => 'mo',
            self::SECOND => 's',
            self::WEEK => 'wk',
            self::YEAR_CALENDAR => 'y',
            self::YEAR_GREGORIAN => 'a_g',
            self::YEAR_JULIAN => 'a_j',
            self::YEAR_JULIEN => 'y_j',
            self::YEAR_SIDEREAL => 'y_s',
            self::YEAR_TROPICAL => 'a_t',
            self::YEAR => 'a',
        ],
        Level::class => [
            self::NEPER => 'Np',
            self::BEL => 'B',
            self::DECIBEL => 'dB',
        ],
        Ratio::class => [
            self::PERCENT => '%',
            self::PER_MILLE => '‰',
            self::BASIS_POINT => '‱',
            self::PER_CENT_MILLE => 'pcm',
        ],
        Force::class => [
            self::DYNE => 'dyn',
            self::GRAM_FORCE => 'gf',
            self::KILOGRAM_FORCE => 'kgf',
            self::NEWTON => 'N',
        ],
        ElectricCapacitance::class => [
            self::FARAD => 'F',
        ],
        Velocity::class => [
            self::KILOMETRES_PER_HOUR => 'km/h',
            self::KNOT => 'kn',
            self::METRES_PER_SECOND => 'm/s',
        ],
        MagneticFluxDensity::class => [
            self::GAUSS => 'Gs',
            self::TESLA => 'T',
        ],
        RadiationDoseAbsorbed::class => [
            self::GRAY => 'Gy',
            self::RAD => 'RAD',
        ],
        ElectricInductance::class => [
            self::HENRY => 'H',
        ],
        Frequency::class => [
            self::HERTZ => 'Hz',
        ],
        Power::class => [
            self::HORSEPOWER_BOILER => 'hp_s',
            self::HORSEPOWER_ELECTRIC => 'hp_e',
            self::HORSEPOWER_MECHANICAL => 'hp_i',
            self::HORSEPOWER_METRIC => 'hp_m',
            self::WATT => 'W',
        ],
        CatalyticActivity::class => [
            self::KATAL => 'kat',
        ],
        Illuminance::class => [
            self::LAMBERT => 'L',
            self::LUX => 'lx',
        ],
        LuminousFlux::class => [
            self::LUMEN => 'lm',
        ],
        MagneticFlux::class => [
            self::MAXWELL => 'Mx',
            self::WEBER => 'Wb',
        ],
        ElectricResistance::class => [
            self::OHM => 'Ω',
        ],
        DynamicViscosity::class => [
            self::POISE => 'P',
        ],
        RadiationDoseEffective::class => [
            self::REM => 'REM',
            self::SIEVERT => 'Sv',
        ],
        ElectricConductance::class => [
            self::SIEMENS => 'S',
        ],
        SolidAngle::class => [
            self::SPHERE => '(sr*π)*4',
            self::STERADIAN => 'sr',
        ],
        KinematicViscosity::class => [
            self::STOKE => 'St',
        ],
        ElectricPotential::class => [
            self::VOLT => 'V',
        ],
        Constant::class => [
            self::ONE => '1',
            self::PI => 'π',
            self::ELEMENTARY_CHARGE => 'e',
            self::SPEED_OF_LIGHT => 'c',
            self::ACCELLERATION_OF_FREEFALL => 'g',
            self::ATOMIC_MASS => 'u',
            self::ELECTRON_MASS => 'm_e',
            self::PROTON_MASS => 'm_p',
            self::PLANCK_CONSTANT => 'h',
            self::BOLTZMAN_CONSTANT => 'k',
            self::PERMITTIVITY_OF_VACUUM => 'eps_0',
            self::PERMEABILITY_OF_VACUUM => 'mu_0',
            self::GRAVITY_CONSTANT => 'G',
            self::AVOGADRO_CONSTANT => 'N_A',
            self::FARADAY_CONSTANT => 'F',
        ],
    ];

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildElectricCurrent($code, $symbol)
    {
        switch ($code) {
            case self::AMPERE:
                return new BaseUnit($symbol, ElectricCurrent::class, new Dimension('I'));
            case self::GILBERT:
                return new TransformedUnit(
                    new CompoundUnit($this->AMPERE->times($this->PI), ElectricCurrent::class),
                    new RationalConverter(10, 4),
                    $symbol
                );
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildAcceleration($code, $symbol)
    {
        switch ($code) {
            case self::METRES_PER_SQUARE_SECOND:
                return new CompoundUnit($this->METRE->divide($this->SECOND->pow(2)), Acceleration::class, $symbol);
        }
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
            case self::ARE:
                return new TransformedUnit($this->SQUARE_METRE, new RationalConverter(100, 1), $symbol);
            case self::HECTARE:
                return new TransformedUnit($this->ARE, new RationalConverter(100, 1), $symbol);
            case self::SQUARE_CENTIMETRE:
                return new CompoundUnit($this->CENTIMETRE->pow(2), Area::class, $symbol);
            case self::SQUARE_KILOMETRE:
                return new CompoundUnit($this->KILOMETRE->pow(2), Area::class, $symbol);
            case self::SQUARE_METRE:
                return new CompoundUnit($this->METRE->pow(2), Area::class, $symbol);
            case self::SQUARE_MILLIMETRE:
                return new CompoundUnit($this->MILLIMETRE->pow(2), Area::class, $symbol);
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
            case self::ANGSTROM:
                return new TransformedUnit($this->METRE, new RationalConverter(1, 10000000000), $symbol);
            case self::ASTRONOMICAL_UNIT:
                return new TransformedUnit($this->METRE, new MultiplyConverter(1.49597870691E11), $symbol);
            case self::CENTIMETRE:
                return new TransformedUnit($this->METRE, new RationalConverter(1, 100), $symbol);
            case self::KILOMETRE:
                return new TransformedUnit($this->METRE, new RationalConverter(1000, 1), $symbol);
            case self::LIGHT_YEAR:
                return new TransformedUnit($this->METRE, new MultiplyConverter(9.460528405E15), $symbol);
            case self::METRE:
                return new BaseUnit($symbol, Length::class, new Dimension('L'));
            case self::MILLIMETRE:
                return new TransformedUnit($this->METRE, new RationalConverter(1, 1000), $symbol);
            case self::NAUTICAL_MILE:
                return new TransformedUnit($this->METRE, new RationalConverter(1852, 1), $symbol);
            case self::PARSEC:
                return new TransformedUnit($this->METRE, new MultiplyConverter(3.085677E16), $symbol);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildPressure($code, $symbol)
    {
        switch ($code) {
            case self::ATMOSPHERE_STANDARD:
                return new TransformedUnit($this->PASCAL, new RationalConverter(1.01325E5, 1), $symbol);
            case self::ATMOSPHERE_TECHNICAL:
                return new CompoundUnit(
                    $this->KILOGRAM_FORCE->divide($this->SQUARE_CENTIMETRE),
                    Pressure::class,
                    $symbol
                );
            case self::BAR:
                return new TransformedUnit($this->PASCAL, new RationalConverter(100000, 1), $symbol);
            case self::INCH_OF_MERCURY:
                return new TransformedUnit($this->PASCAL, new MultiplyConverter(3386.388), $symbol);
            case self::MILLIMETRE_OF_MERCURY:
                return new TransformedUnit($this->PASCAL, new MultiplyConverter(133.322), $symbol);
            case self::PASCAL:
                return new AlternateUnit($this->NEWTON->divide($this->SQUARE_METRE), $symbol, Pressure::class);
            case self::TORR:
                return new TransformedUnit($this->ATMOSPHERE_STANDARD, new RationalConverter(1, 760), $symbol);
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
            case self::CARAT_METRIC:
                return new TransformedUnit($this->GRAM, new RationalConverter(1, 5), $symbol);
            case self::GRAM:
                return new TransformedUnit($this->KILOGRAM, new RationalConverter(1, 1000), $symbol);
            case self::KILOGRAM:
                return new BaseUnit($symbol, Mass::class, new Dimension('M'));
            case self::MILLIGRAM:
                return new TransformedUnit($this->GRAM, new RationalConverter(1, 1000), $symbol);
            case self::TONNE:
                return new TransformedUnit($this->KILOGRAM, new RationalConverter(1000, 1), $symbol);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildAmountOfSubstance($code, $symbol)
    {
        switch ($code) {
            case self::MOLE:
                return new BaseUnit($symbol, AmountOfSubstance::class, new Dimension('N'));
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
            case self::CUBIC_METRE:
                return new CompoundUnit($this->METRE->pow(3), Volume::class, $symbol);
            case self::LITRE:
                return new TransformedUnit($this->CUBIC_METRE, new RationalConverter(1, 1000), $symbol);
            case self::MILLILITRE:
                return new TransformedUnit($this->LITRE, new RationalConverter(1, 1000), $symbol);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildDataRate($code, $symbol)
    {
        switch ($code) {
            case self::BAUD:
                return new CompoundUnit($this->ONE->divide($this->SECOND), DataRate::class, $symbol);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildRadioactiveActivity($code, $symbol)
    {
        switch ($code) {
            case self::BECQUEREL:
                return new AlternateUnit($this->ONE->divide($this->SECOND), $symbol, RadioactiveActivity::class);
            case self::CURIE:
                return new TransformedUnit($this->BECQUEREL, new RationalConverter(37000000000, 1), $symbol);
            case self::RUTHERFORD:
                return new TransformedUnit($this->BECQUEREL, new RationalConverter(1000000, 1), $symbol);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildDataAmount($code, $symbol)
    {
        switch ($code) {
            case self::BIT:
                return new AlternateUnit($this->ONE, $symbol, DataAmount::class);
            case self::BYTE:
                return new TransformedUnit($this->BIT, new RationalConverter(8, 1), $symbol);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildConstant($code, $symbol)
    {
        switch ($code) {
            case self::PI:
                return new TransformedUnit(
                    $this->ONE,
                    new MultiplyConverter(3.141592653589793),
                    $symbol,
                    Constant::class
                );
            case self::ELEMENTARY_CHARGE:
                return new TransformedUnit(
                    $this->COULOMB,
                    new MultiplyConverter(1.602176462E-19),
                    $symbol,
                    Constant::class
                );
            case self::SPEED_OF_LIGHT:
                return new TransformedUnit(
                    $this->METRES_PER_SECOND,
                    new RationalConverter(299792458, 1),
                    $symbol,
                    Constant::class
                );
            case self::ACCELLERATION_OF_FREEFALL:
                return new TransformedUnit(
                    $this->METRES_PER_SQUARE_SECOND,
                    new RationalConverter(980665, 100000),
                    $symbol
                );
            case self::ATOMIC_MASS:
                return new TransformedUnit(
                    $this->KILOGRAM,
                    new MultiplyConverter(1.6605387280149467E-27),
                    $symbol,
                    Constant::class
                );
            case self::ELECTRON_MASS:
                return new TransformedUnit(
                    $this->KILOGRAM,
                    new MultiplyConverter(9.10938188E-31),
                    $symbol,
                    Constant::class
                );
            case self::PROTON_MASS:
                return new TransformedUnit(
                    $this->KILOGRAM,
                    new MultiplyConverter(1.6726231E-27),
                    $symbol,
                    Constant::class
                );
            case self::PLANCK_CONSTANT:
                return new TransformedUnit(
                    $this->JOULE->times($this->SECOND),
                    new MultiplyConverter(6.6260755E-24),
                    $symbol,
                    Constant::class
                );
            case self::BOLTZMAN_CONSTANT:
                return new TransformedUnit(
                    $this->JOULE->divide($this->KELVIN),
                    new MultiplyConverter(1.380658E-23),
                    $symbol,
                    Constant::class
                );
            case self::PERMITTIVITY_OF_VACUUM:
                return new TransformedUnit(
                    $this->FARAD->divide($this->METRE),
                    new MultiplyConverter(8.854187817E-12),
                    $symbol,
                    Constant::class
                );
            case self::PERMEABILITY_OF_VACUUM:
                return new TransformedUnit(
                    $this->NEWTON->divide($this->AMPERE->pow(2)),
                    new MultiplyConverter(1.2566370614359173E-6),
                    $symbol,
                    Constant::class
                );
            case self::GRAVITY_CONSTANT:
                return new TransformedUnit(
                    $this->NEWTON->times($this->METRE->pow(2))->divide($this->KILOGRAM->pow(2)),
                    new MultiplyConverter(6.67259E-11),
                    $symbol,
                    Constant::class
                );
            case self::AVOGADRO_CONSTANT:
                return new TransformedUnit(
                    $this->MOLE,
                    new MultiplyConverter(6.022140857E23),
                    $symbol,
                    Constant::class
                );
            case self::FARADAY_CONSTANT:
                return new TransformedUnit(
                    $this->COULOMB,
                    new MultiplyConverter(96485.3414719984),
                    $symbol,
                    Constant::class
                );
        }
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
            case self::CALORIE_AT_15C:
                return new TransformedUnit($this->JOULE, new RationalConverter(41858, 10000), $symbol);
            case self::CALORIE_AT_20C:
                return new TransformedUnit($this->JOULE, new RationalConverter(41819, 10000), $symbol);
            case self::CALORIE_FOOD:
                return new TransformedUnit($this->CALORIE_THERMOCHEMICAL, new RationalConverter(1000, 1), $symbol);
            case self::CALORIE_TABLE:
                return new TransformedUnit($this->JOULE, new RationalConverter(41868, 10000), $symbol);
            case self::CALORIE_MEAN:
                return new TransformedUnit($this->JOULE, new RationalConverter(419002, 100000), $symbol);
            case self::CALORIE_THERMOCHEMICAL:
                return new TransformedUnit($this->JOULE, new RationalConverter(4184, 1000), $symbol);
            case self::ELECTRON_VOLT:
                return new TransformedUnit($this->JOULE, new MultiplyConverter(1.602176462E-19), $symbol);
            case self::ERG:
                return new TransformedUnit($this->JOULE, new RationalConverter(1, 10000000), $symbol);
            case self::JOULE:
                return new AlternateUnit($this->NEWTON->times($this->METRE), $symbol, Energy::class);
            case self::KILOJOULE:
                return new TransformedUnit($this->JOULE, new RationalConverter(1000, 1), $symbol);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildLuminousIntensity($code, $symbol)
    {
        switch ($code) {
            case self::CANDELA:
                return new BaseUnit($symbol, LuminousIntensity::class, new Dimension('J'));
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildTemperature($code, $symbol)
    {
        switch ($code) {
            case self::CELSIUS:
                return new TransformedUnit($this->KELVIN, new AddConverter(273.15), $symbol);
            case self::FAHRENHEIT:
                return new TransformedUnit($this->RANKINE, new AddConverter(459.67), $symbol);
            case self::KELVIN:
                return new BaseUnit($symbol, Temperature::class, new Dimension('Θ'));
            case self::RANKINE:
                return new TransformedUnit($this->KELVIN, new RationalConverter(5, 9), $symbol);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildAngle($code, $symbol)
    {
        switch ($code) {
            case self::CENTIRADIAN:
                return new TransformedUnit($this->RADIAN, new RationalConverter(1, 100), $symbol);
            case self::DEGREE_ANGLE:
                return new TransformedUnit($this->REVOLUTION, new RationalConverter(1, 360), $symbol);
            case self::GRADE:
                return new TransformedUnit($this->REVOLUTION, new RationalConverter(1, 400), $symbol);
            case self::MINUTE_ANGLE:
                return new TransformedUnit($this->DEGREE_ANGLE, new RationalConverter(1, 60), $symbol);
            case self::RADIAN:
                return new AlternateUnit($this->ONE, $symbol, Angle::class);
            case self::REVOLUTION:
                return new TransformedUnit(
                    new CompoundUnit($this->RADIAN->times($this->PI), Angle::class),
                    new RationalConverter(2, 1),
                    $symbol
                );
            case self::SECOND_ANGLE:
                return new TransformedUnit($this->MINUTE_ANGLE, new RationalConverter(1, 60), $symbol);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildElectricCharge($code, $symbol)
    {
        switch ($code) {
            case self::COULOMB:
                return new AlternateUnit($this->SECOND->times($this->AMPERE), $symbol, ElectricCharge::class);
            case self::FRANKLIN:
                return new TransformedUnit($this->COULOMB, new MultiplyConverter(3.3356E-10), $symbol);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildDuration($code, $symbol)
    {
        switch ($code) {
            case self::DAY:
                return new TransformedUnit($this->HOUR, new RationalConverter(24, 1), $symbol);
            case self::DAY_SIDEREAL:
                return new TransformedUnit($this->SECOND, new MultiplyConverter(86164.09), $symbol);
            case self::HOUR:
                return new TransformedUnit($this->MINUTE, new RationalConverter(60, 1), $symbol);
            case self::MINUTE:
                return new TransformedUnit($this->SECOND, new RationalConverter(60, 1), $symbol);
            case self::MONTH:
                return new TransformedUnit($this->YEAR_JULIAN, new RationalConverter(1, 12), $symbol);
            case self::MONTH_GREGORIAN:
                return new TransformedUnit($this->YEAR_GREGORIAN, new RationalConverter(1, 12), $symbol);
            case self::MONTH_JULIAN:
                return new TransformedUnit($this->YEAR_JULIAN, new RationalConverter(1, 12), $symbol);
            case self::MONTH_SYNODAL:
                return new TransformedUnit($this->DAY, new MultiplyConverter(29.53059), $symbol);
            case self::SECOND:
                return new BaseUnit($symbol, Duration::class, new Dimension('T'));
            case self::WEEK:
                return new TransformedUnit($this->DAY, new RationalConverter(7, 1), $symbol);
            case self::YEAR_CALENDAR:
                return new TransformedUnit($this->DAY, new RationalConverter(365, 1), $symbol);
            case self::YEAR_GREGORIAN:
                return new TransformedUnit($this->DAY, new MultiplyConverter(365.2425), $symbol);
            case self::YEAR_JULIAN:
                return new TransformedUnit($this->DAY, new MultiplyConverter(365.25), $symbol);
            case self::YEAR_JULIEN:
                return new TransformedUnit($this->SECOND, new RationalConverter(31557600, 1), $symbol);
            case self::YEAR_SIDEREAL:
                return new TransformedUnit($this->SECOND, new MultiplyConverter(3.155814954E7), $symbol);
            case self::YEAR_TROPICAL:
                return new TransformedUnit($this->DAY, new MultiplyConverter(365.24219), $symbol);
            case self::YEAR:
                return new TransformedUnit($this->DAY, new MultiplyConverter(365.25), 'a');
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildLevel($code, $symbol)
    {
        switch ($code) {
            case self::NEPER:
                return new TransformedUnit($this->ONE, new ExpConverter(M_E), $symbol, Level::class);
            case self::BEL:
                return new TransformedUnit($this->ONE, new ExpConverter(10.0), $symbol, Level::class);
            case self::DECIBEL:
                return new TransformedUnit($this->BEL, new RationalConverter(1, 10), $symbol);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildRatio($code, $symbol)
    {
        switch ($code) {
            case self::PERCENT:
                return new TransformedUnit($this->ONE, new RationalConverter(1, 100), $symbol, Ratio::class);
            case self::PER_MILLE:
                return new TransformedUnit($this->PERCENT, new RationalConverter(1, 10), $symbol);
            case self::BASIS_POINT:
                return new TransformedUnit($this->PER_MILLE, new RationalConverter(1, 10), $symbol);
            case self::PER_CENT_MILLE:
                return new TransformedUnit($this->BASIS_POINT, new RationalConverter(1, 10), $symbol);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildForce($code, $symbol)
    {
        switch ($code) {
            case self::DYNE:
                return new TransformedUnit($this->NEWTON, new RationalConverter(1, 100000), $symbol);
            case self::GRAM_FORCE:
                return new TransformedUnit($this->NEWTON, new RationalConverter(980665, 100000000), $symbol);
            case self::KILOGRAM_FORCE:
                return new TransformedUnit($this->NEWTON, new RationalConverter(980665, 100000), $symbol);
            case self::NEWTON:
                return new AlternateUnit(
                    $this->METRE->times($this->KILOGRAM)->divide($this->SECOND->pow(2)),
                    $symbol,
                    Force::class
                );
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildElectricCapacitance($code, $symbol)
    {
        switch ($code) {
            case self::FARAD:
                return new AlternateUnit($this->COULOMB->divide($this->VOLT), $symbol, ElectricCapacitance::class);
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
            case self::KILOMETRES_PER_HOUR:
                return new CompoundUnit($this->KILOMETRE->divide($this->HOUR), Velocity::class, $symbol);
            case self::KNOT:
                return new CompoundUnit(
                    $this->NAUTICAL_MILE->divide($this->HOUR),
                    Velocity::class,
                    $symbol
                );
            case self::METRES_PER_SECOND:
                return new CompoundUnit($this->METRE->divide($this->SECOND), Velocity::class, $symbol);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildMagneticFluxDensity($code, $symbol)
    {
        switch ($code) {
            case self::GAUSS:
                return new TransformedUnit($this->TESLA, new RationalConverter(1, 10000), $symbol);
            case self::TESLA:
                return new AlternateUnit(
                    $this->WEBER->divide($this->SQUARE_METRE),
                    $symbol,
                    MagneticFluxDensity::class
                );
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildRadiationDoseAbsorbed($code, $symbol)
    {
        switch ($code) {
            case self::GRAY:
                return new AlternateUnit($this->JOULE->divide($this->KILOGRAM), $symbol, RadiationDoseAbsorbed::class);
            case self::RAD:
                return new TransformedUnit($this->GRAY, new RationalConverter(1, 100), $symbol);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildElectricInductance($code, $symbol)
    {
        switch ($code) {
            case self::HENRY:
                return new AlternateUnit($this->WEBER->divide($this->AMPERE), $symbol, ElectricInductance::class);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildFrequency($code, $symbol)
    {
        switch ($code) {
            case self::HERTZ:
                return new AlternateUnit($this->ONE->divide($this->SECOND), $symbol, Frequency::class);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildPower($code, $symbol)
    {
        switch ($code) {
            case self::HORSEPOWER_BOILER:
                return new TransformedUnit($this->WATT, new MultiplyConverter(9812.5), $symbol);
            case self::HORSEPOWER_ELECTRIC:
                return new TransformedUnit($this->WATT, new MultiplyConverter(746), $symbol);
            case self::HORSEPOWER_MECHANICAL:
                return new TransformedUnit($this->WATT, new MultiplyConverter(745.69987158227), $symbol);
            case self::HORSEPOWER_METRIC:
                return new TransformedUnit($this->WATT, new MultiplyConverter(735.49875), $symbol);
            case self::WATT:
                return new AlternateUnit($this->JOULE->divide($this->SECOND), $symbol, Power::class);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildCatalyticActivity($code, $symbol)
    {
        switch ($code) {
            case self::KATAL:
                return new AlternateUnit($this->MOLE->divide($this->SECOND), $symbol, CatalyticActivity::class);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildIlluminance($code, $symbol)
    {
        switch ($code) {
            case self::LAMBERT:
                return new TransformedUnit($this->LUX, new RationalConverter(10000, 1), $symbol);
            case self::LUX:
                return new AlternateUnit($this->LUMEN->divide($this->SQUARE_METRE), $symbol, Illuminance::class);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildLuminousFlux($code, $symbol)
    {
        switch ($code) {
            case self::LUMEN:
                return new AlternateUnit($this->CANDELA->times($this->STERADIAN), $symbol, LuminousFlux::class);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildMagneticFlux($code, $symbol)
    {
        switch ($code) {
            case self::MAXWELL:
                return new TransformedUnit($this->WEBER, new RationalConverter(1, 100000000), $symbol);
            case self::WEBER:
                return new AlternateUnit($this->VOLT->times($this->SECOND), $symbol, MagneticFlux::class);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildElectricResistance($code, $symbol)
    {
        switch ($code) {
            case self::OHM:
                return new AlternateUnit($this->VOLT->divide($this->AMPERE), $symbol, ElectricResistance::class);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildDynamicViscosity($code, $symbol)
    {
        switch ($code) {
            case self::POISE:
                return new CompoundUnit(
                    $this->GRAM->divide($this->CENTIMETRE)->times($this->SECOND),
                    DynamicViscosity::class,
                    $symbol
                );
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildRadiationDoseEffective($code, $symbol)
    {
        switch ($code) {
            case self::REM:
                return new TransformedUnit($this->SIEVERT, new RationalConverter(1, 100), $symbol);
            case self::SIEVERT:
                return new AlternateUnit($this->JOULE->divide($this->KILOGRAM), $symbol, RadiationDoseEffective::class);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildElectricConductance($code, $symbol)
    {
        switch ($code) {
            case self::SIEMENS:
                return new AlternateUnit($this->AMPERE->divide($this->VOLT), $symbol, ElectricConductance::class);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildSolidAngle($code, $symbol)
    {
        switch ($code) {
            case self::SPHERE:
                return new TransformedUnit(
                    new CompoundUnit($this->STERADIAN->times($this->PI), SolidAngle::class),
                    new RationalConverter(4, 1),
                    $symbol
                );
            case self::STERADIAN:
                return new AlternateUnit($this->ONE, $symbol, SolidAngle::class);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildKinematicViscosity($code, $symbol)
    {
        switch ($code) {
            case self::STOKE:
                return new CompoundUnit(
                    $this->CENTIMETRE->pow(2)->divide($this->SECOND),
                    KinematicViscosity::class,
                    $symbol
                );
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    protected function buildElectricPotential($code, $symbol)
    {
        switch ($code) {
            case self::VOLT:
                return new AlternateUnit($this->WATT->divide($this->AMPERE), $symbol, ElectricPotential::class);
        }
    }
}
