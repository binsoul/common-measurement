<?php

namespace BinSoul\Common\Measurement;

use BinSoul\Common\Measurement\Converter\AddConverter;
use BinSoul\Common\Measurement\Converter\ExpConverter;
use BinSoul\Common\Measurement\Converter\MultiplyConverter;
use BinSoul\Common\Measurement\Converter\RationalConverter;
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
use BinSoul\Common\Measurement\Unit\AlternateUnit;
use BinSoul\Common\Measurement\Unit\BaseUnit;
use BinSoul\Common\Measurement\Unit\CompoundUnit;
use BinSoul\Common\Measurement\Unit\TransformedUnit;

/**
 * Represents a collection of units of measurement and rules relating them to each other.
 *
 * @property Unit $AMPERE                            unit of electric current
 * @property Unit $ACCELLERATION_OF_FREEFALL         unit of acceleration
 * @property Unit $ACRE_IMPERIAL                     unit of area
 * @property Unit $ACRE_US                           unit of area
 * @property Unit $ANGSTROM                          unit of length
 * @property Unit $ARE                               unit of area
 * @property Unit $ASTRONOMICAL_UNIT                 unit of length
 * @property Unit $ATMOSPHERE_STANDARD               unit of pressure
 * @property Unit $ATMOSPHERE_TECHNICAL              unit of pressure
 * @property Unit $ATOMIC_MASS                       unit of mass
 * @property Unit $AVOGADRO_CONSTANT                 unit of amount of substance
 * @property Unit $BAR                               unit of pressure
 * @property Unit $BARREL_US                         unit of volume
 * @property Unit $BASIS_POINT                       unit of ratio
 * @property Unit $BAUD                              unit of data rate
 * @property Unit $BECQUEREL                         unit of radioactive activity
 * @property Unit $BEL                               unit of level
 * @property Unit $BIT                               unit of data amount
 * @property Unit $BOLTZMAN_CONSTANT                 constant
 * @property Unit $BTU_AT_39F                        unit of energy
 * @property Unit $BTU_AT_59F                        unit of energy
 * @property Unit $BTU_AT_60F                        unit of energy
 * @property Unit $BTU_TABLE                         unit of energy
 * @property Unit $BTU_MEAN                          unit of energy
 * @property Unit $BTU_THERMOCHEMICAL                unit of energy
 * @property Unit $BUSHEL_IMPERIAL                   unit of volume
 * @property Unit $BUSHEL_US                         unit of volume
 * @property Unit $BYTE                              unit of data amount
 * @property Unit $CALORIE_AT_15C                    unit of energy
 * @property Unit $CALORIE_AT_20C                    unit of energy
 * @property Unit $CALORIE_FOOD                      unit of energy
 * @property Unit $CALORIE_TABLE                     unit of energy
 * @property Unit $CALORIE_MEAN                      unit of energy
 * @property Unit $CALORIE_THERMOCHEMICAL            unit of energy
 * @property Unit $CANDELA                           unit of luminous intensity
 * @property Unit $CARAT_METRIC                      unit of mass
 * @property Unit $CELSIUS                           unit of temperature
 * @property Unit $CENTIMETRE                        unit of length
 * @property Unit $CENTIRADIAN                       unit of angle
 * @property Unit $CHAIN_IMPERIAL                    unit of length
 * @property Unit $CHAIN_US                          unit of length
 * @property Unit $CICERO                            unit of length
 * @property Unit $CORD_US                           unit of volume
 * @property Unit $COULOMB                           unit of electric charge
 * @property Unit $CUBIC_FOOT                        unit of volume
 * @property Unit $CUBIC_INCH                        unit of volume
 * @property Unit $CUBIC_METRE                       unit of volume
 * @property Unit $CUBIC_MILE                        unit of volume
 * @property Unit $CUBIC_YARD                        unit of volume
 * @property Unit $CUP_US                            unit of volume
 * @property Unit $CURIE                             unit of radioactive activity
 * @property Unit $DAY                               unit of duration
 * @property Unit $DAY_SIDEREAL                      unit of duration
 * @property Unit $DECIBEL                           unit of level
 * @property Unit $DEGREE_ANGLE                      unit of angle
 * @property Unit $DIDOT                             unit of length
 * @property Unit $DRAM                              unit of mass
 * @property Unit $DRAM_APOTHECARY                   unit of mass
 * @property Unit $DRY_PINT_US                       unit of volume
 * @property Unit $DRY_QUART_US                      unit of volume
 * @property Unit $DYNE                              unit of force
 * @property Unit $ELECTRON_MASS                     unit of mass
 * @property Unit $ELECTRON_VOLT                     unit of energy
 * @property Unit $ELEMENTARY_CHARGE                 unit of electric charge
 * @property Unit $ERG                               unit of energy
 * @property Unit $FAHRENHEIT                        unit of temperature
 * @property Unit $FARAD                             unit of electric capacitance
 * @property Unit $FARADAY_CONSTANT                  unit of electric charge
 * @property Unit $FATHOM                            unit of length
 * @property Unit $FATHOM_IMPERIAL                   unit of length
 * @property Unit $FATHOM_US                         unit of length
 * @property Unit $FEET_PER_SECOND                   unit of velocity
 * @property Unit $FLUID_DRAM_IMPERIAL               unit of volume
 * @property Unit $FLUID_DRAM_US                     unit of volume
 * @property Unit $FLUID_OUNCE_IMPERIAL              unit of volume
 * @property Unit $FLUID_OUNCE_US                    unit of volume
 * @property Unit $FOOT                              unit of length
 * @property Unit $FOOT_IMPERIAL                     unit of length
 * @property Unit $FOOT_US                           unit of length
 * @property Unit $FRANKLIN                          unit of electric charge
 * @property Unit $FURLONG_US                        unit of length
 * @property Unit $GALLON_IMPERIAL                   unit of volume
 * @property Unit $GALLON_US                         unit of volume
 * @property Unit $GALLON_WINCHESTER                 unit of volume
 * @property Unit $GAUSS                             unit of magnetic flux density
 * @property Unit $GILBERT                           unit of electric current
 * @property Unit $GILL_IMPERIAL                     unit of volume
 * @property Unit $GILL_US                           unit of volume
 * @property Unit $GRADE                             unit of angle
 * @property Unit $GRAIN                             unit of mass
 * @property Unit $GRAM                              unit of mass
 * @property Unit $GRAM_FORCE                        unit of force
 * @property Unit $GRAVITY_CONSTANT                  unit of
 * @property Unit $GRAY                              unit of radiation dose absorbed
 * @property Unit $HAND                              unit of length
 * @property Unit $HECTARE                           unit of area
 * @property Unit $HENRY                             unit of electric inductance
 * @property Unit $HERTZ                             unit of frequency
 * @property Unit $HORSEPOWER_BOILER                 unit of power
 * @property Unit $HORSEPOWER_ELECTRIC               unit of power
 * @property Unit $HORSEPOWER_MECHANICAL             unit of power
 * @property Unit $HORSEPOWER_METRIC                 unit of power
 * @property Unit $HOUR                              unit of duration
 * @property Unit $INCH                              unit of length
 * @property Unit $INCH_OF_MERCURY                   unit of pressure
 * @property Unit $INCH_IMPERIAL                     unit of length
 * @property Unit $INCH_US                           unit of length
 * @property Unit $JOULE                             unit of energy
 * @property Unit $KATAL                             unit of catalytic activity
 * @property Unit $KELVIN                            unit of temperature
 * @property Unit $KILOGRAM                          unit of mass
 * @property Unit $KILOGRAM_FORCE                    unit of force
 * @property Unit $KILOJOULE                         unit of energy
 * @property Unit $KILOMETRE                         unit of length
 * @property Unit $KILOMETRES_PER_HOUR               unit of velocity
 * @property Unit $KNOT                              unit of velocity
 * @property Unit $KNOT_IMPERIAL                     unit of velocity
 * @property Unit $LAMBERT                           unit of illuminance
 * @property Unit $LIGHT_YEAR                        unit of length
 * @property Unit $LINE                              unit of length
 * @property Unit $LINGE                             unit of length
 * @property Unit $LINK_IMPERIAL                     unit of length
 * @property Unit $LINK_US                           unit of length
 * @property Unit $LITRE                             unit of volume
 * @property Unit $LONG_HUNDREDWEIGHT                unit of mass
 * @property Unit $LONG_TON                          unit of mass
 * @property Unit $LUMEN                             unit of luminous flux
 * @property Unit $LUX                               unit of illuminance
 * @property Unit $MAXWELL                           unit of magnetic flux
 * @property Unit $METRE                             unit of length
 * @property Unit $METRES_PER_SECOND                 unit of velocity
 * @property Unit $METRES_PER_SQUARE_SECOND          unit of acceleration
 * @property Unit $MILE                              unit of length
 * @property Unit $MILE_IMPERIAL                     unit of length
 * @property Unit $MILE_US                           unit of length
 * @property Unit $MILES_PER_HOUR                    unit of velocity
 * @property Unit $MILLIGRAM                         unit of mass
 * @property Unit $MILLIMETRE                        unit of length
 * @property Unit $MILLIMETRE_OF_MERCURY             unit of pressure
 * @property Unit $MINIM_IMPERIAL                    unit of volume
 * @property Unit $MINIM_US                          unit of volume
 * @property Unit $MINUTE                            unit of duration
 * @property Unit $MINUTE_ANGLE                      unit of angle
 * @property Unit $MOLE                              unit of amount of substance
 * @property Unit $MONTH                             unit of duration
 * @property Unit $MONTH_GREGORIAN                   unit of duration
 * @property Unit $MONTH_JULIAN                      unit of duration
 * @property Unit $MONTH_SYNODAL                     unit of duration
 * @property Unit $NAUTICAL_MILE                     unit of length
 * @property Unit $NAUTICAL_MILE_IMPERIAL            unit of length
 * @property Unit $NEPER                             unit of level
 * @property Unit $NEWTON                            unit of force
 * @property Unit $OHM                               unit of electric resistance
 * @property Unit $ONE                               constant
 * @property Unit $OUNCE                             unit of mass
 * @property Unit $OUNCE_APOTHECARY                  unit of mass
 * @property Unit $OUNCE_TROY                        unit of mass
 * @property Unit $PACE_IMPERIAL                     unit of length
 * @property Unit $PARSEC                            unit of length
 * @property Unit $PASCAL                            unit of pressure
 * @property Unit $PECK_IMPERIAL                     unit of volume
 * @property Unit $PECK_US                           unit of volume
 * @property Unit $PENNYWEIGHT_TROY                  unit of mass
 * @property Unit $PER_CENT_MILLE                    unit of ratio
 * @property Unit $PER_MILLE                         unit of ratio
 * @property Unit $PERCENT                           unit of ratio
 * @property Unit $PERMEABILITY_OF_VACUUM            unit of
 * @property Unit $PERMITTIVITY_OF_VACUUM            unit of
 * @property Unit $PI                                constant
 * @property Unit $PICA                              unit of length
 * @property Unit $PICA_PRINTER                      unit of length
 * @property Unit $PIED                              unit of length
 * @property Unit $PINT_IMPERIAL                     unit of volume
 * @property Unit $PINT_US                           unit of volume
 * @property Unit $PLANCK_CONSTANT                   unit of
 * @property Unit $POINT                             unit of length
 * @property Unit $POINT_PRINTER                     unit of length
 * @property Unit $POISE                             unit of dynamic viscosity
 * @property Unit $POUCE                             unit of length
 * @property Unit $POUND                             unit of mass
 * @property Unit $POUND_APOTHECARY                  unit of mass
 * @property Unit $POUND_FORCE                       unit of force
 * @property Unit $POUND_PER_SQUARE_INCH             unit of pressure
 * @property Unit $POUND_TROY                        unit of mass
 * @property Unit $PROTON_MASS                       unit of mass
 * @property Unit $QUART_IMPERIAL                    unit of volume
 * @property Unit $QUART_US                          unit of volume
 * @property Unit $RAD                               unit of radiation dose absorbed
 * @property Unit $RADIAN                            unit of angle
 * @property Unit $RANKINE                           unit of temperature
 * @property Unit $REM                               unit of radiation dose effective
 * @property Unit $REVOLUTION                        unit of angle
 * @property Unit $ROD_IMPERIAL                      unit of length
 * @property Unit $ROD_US                            unit of length
 * @property Unit $RUTHERFORD                        unit of radioactive activity
 * @property Unit $SCRUPLE_APOTHECARY                unit of mass
 * @property Unit $SECOND                            unit of duration
 * @property Unit $SECOND_ANGLE                      unit of angle
 * @property Unit $SECTION_US                        unit of area
 * @property Unit $SHORT_HUNDREDWEIGHT               unit of mass
 * @property Unit $SHORT_TON                         unit of mass
 * @property Unit $SIEMENS                           unit of electric conductance
 * @property Unit $SIEVERT                           unit of radiation dose effective
 * @property Unit $SPEED_OF_LIGHT                    unit of velocity
 * @property Unit $SPHERE                            unit of solid angle
 * @property Unit $SQUARE_CENTIMETRE                 unit of area
 * @property Unit $SQUARE_FOOT                       unit of area
 * @property Unit $SQUARE_INCH                       unit of area
 * @property Unit $SQUARE_METRE                      unit of area
 * @property Unit $SQUARE_MILE                       unit of area
 * @property Unit $SQUARE_MILE_US                    unit of area
 * @property Unit $SQUARE_MILLIMETRE                 unit of area
 * @property Unit $SQUARE_ROD_US                     unit of area
 * @property Unit $SQUARE_YARD                       unit of area
 * @property Unit $STERADIAN                         unit of solid angle
 * @property Unit $STOKE                             unit of kinematic viscosity
 * @property Unit $STONE                             unit of mass
 * @property Unit $TABLESPOON_US                     unit of volume
 * @property Unit $TEASPOON_US                       unit of volume
 * @property Unit $TESLA                             unit of magnetic flux density
 * @property Unit $THOU                              unit of length
 * @property Unit $THOU_US                           unit of length
 * @property Unit $TONNE                             unit of mass
 * @property Unit $TORR                              unit of pressure
 * @property Unit $TOWNSHIP_US                       unit of area
 * @property Unit $VOLT                              unit of electric potential
 * @property Unit $WATT                              unit of power
 * @property Unit $WEBER                             unit of magnetic flux
 * @property Unit $WEEK                              unit of duration
 * @property Unit $YARD                              unit of length
 * @property Unit $YARD_IMPERIAL                     unit of length
 * @property Unit $YARD_US                           unit of length
 * @property Unit $YEAR                              unit of duration
 * @property Unit $YEAR_CALENDAR                     unit of duration
 * @property Unit $YEAR_GREGORIAN                    unit of duration
 * @property Unit $YEAR_JULIAN                       unit of duration
 * @property Unit $YEAR_JULIEN                       unit of duration
 * @property Unit $YEAR_SIDEREAL                     unit of duration
 * @property Unit $YEAR_TROPICAL                     unit of duration
 */
class SystemOfUnits
{
    const AMPERE = 'AMPERE';
    const ACCELLERATION_OF_FREEFALL = 'ACCELLERATION_OF_FREEFALL';
    const ACRE_IMPERIAL = 'ACRE_IMPERIAL';
    const ACRE_US = 'ACRE_US';
    const ANGSTROM = 'ANGSTROM';
    const ARE = 'ARE';
    const ASTRONOMICAL_UNIT = 'ASTRONOMICAL_UNIT';
    const ATMOSPHERE_STANDARD = 'ATMOSPHERE_STANDARD';
    const ATMOSPHERE_TECHNICAL = 'ATMOSPHERE_TECHNICAL';
    const ATOMIC_MASS = 'ATOMIC_MASS';
    const AVOGADRO_CONSTANT = 'AVOGADRO_CONSTANT';
    const BAR = 'BAR';
    const BARREL_US = 'BARREL_US';
    const BASIS_POINT = 'BASIS_POINT';
    const BAUD = 'BAUD';
    const BECQUEREL = 'BECQUEREL';
    const BEL = 'BEL';
    const BIT = 'BIT';
    const BOLTZMAN_CONSTANT = 'BOLTZMAN_CONSTANT';
    const BTU_AT_39F = 'BTU_AT_39F';
    const BTU_AT_59F = 'BTU_AT_59F';
    const BTU_AT_60F = 'BTU_AT_60F';
    const BTU_TABLE = 'BTU_TABLE';
    const BTU_MEAN = 'BTU_MEAN';
    const BTU_THERMOCHEMICAL = 'BTU_THERMOCHEMICAL';
    const BUSHEL_IMPERIAL = 'BUSHEL_IMPERIAL';
    const BUSHEL_US = 'BUSHEL_US';
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
    const CHAIN_IMPERIAL = 'CHAIN_IMPERIAL';
    const CHAIN_US = 'CHAIN_US';
    const CICERO = 'CICERO';
    const CORD_US = 'CORD_US';
    const COULOMB = 'COULOMB';
    const CUBIC_FOOT = 'CUBIC_FOOT';
    const CUBIC_INCH = 'CUBIC_INCH';
    const CUBIC_METRE = 'CUBIC_METRE';
    const CUBIC_MILE = 'CUBIC_MILE';
    const CUBIC_YARD = 'CUBIC_YARD';
    const CUP_US = 'CUP_US';
    const CURIE = 'CURIE';
    const DAY = 'DAY';
    const DAY_SIDEREAL = 'DAY_SIDEREAL';
    const DECIBEL = 'DECIBEL';
    const DEGREE_ANGLE = 'DEGREE_ANGLE';
    const DIDOT = 'DIDOT';
    const DRAM = 'DRAM';
    const DRAM_APOTHECARY = 'DRAM_APOTHECARY';
    const DRY_PINT_US = 'DRY_PINT_US';
    const DRY_QUART_US = 'DRY_QUART_US';
    const DYNE = 'DYNE';
    const ELECTRON_MASS = 'ELECTRON_MASS';
    const ELECTRON_VOLT = 'ELECTRON_VOLT';
    const ELEMENTARY_CHARGE = 'ELEMENTARY_CHARGE';
    const ERG = 'ERG';
    const FAHRENHEIT = 'FAHRENHEIT';
    const FARAD = 'FARAD';
    const FARADAY_CONSTANT = 'FARADAY_CONSTANT';
    const FATHOM = 'FATHOM';
    const FATHOM_IMPERIAL = 'FATHOM_IMPERIAL';
    const FATHOM_US = 'FATHOM_US';
    const FEET_PER_SECOND = 'FEET_PER_SECOND';
    const FLUID_DRAM_IMPERIAL = 'FLUID_DRAM_IMPERIAL';
    const FLUID_DRAM_US = 'FLUID_DRAM_US';
    const FLUID_OUNCE_IMPERIAL = 'FLUID_OUNCE_IMPERIAL';
    const FLUID_OUNCE_US = 'FLUID_OUNCE_US';
    const FOOT = 'FOOT';
    const FOOT_IMPERIAL = 'FOOT_IMPERIAL';
    const FOOT_US = 'FOOT_US';
    const FRANKLIN = 'FRANKLIN';
    const FURLONG_US = 'FURLONG_US';
    const GALLON_IMPERIAL = 'GALLON_IMPERIAL';
    const GALLON_US = 'GALLON_US';
    const GALLON_WINCHESTER = 'GALLON_WINCHESTER';
    const GAUSS = 'GAUSS';
    const GILBERT = 'GILBERT';
    const GILL_IMPERIAL = 'GILL_IMPERIAL';
    const GILL_US = 'GILL_US';
    const GRADE = 'GRADE';
    const GRAIN = 'GRAIN';
    const GRAM = 'GRAM';
    const GRAM_FORCE = 'GRAM_FORCE';
    const GRAVITY_CONSTANT = 'GRAVITY_CONSTANT';
    const GRAY = 'GRAY';
    const HAND = 'HAND';
    const HECTARE = 'HECTARE';
    const HENRY = 'HENRY';
    const HERTZ = 'HERTZ';
    const HORSEPOWER_BOILER = 'HORSEPOWER_BOILER';
    const HORSEPOWER_ELECTRIC = 'HORSEPOWER_ELECTRIC';
    const HORSEPOWER_MECHANICAL = 'HORSEPOWER_MECHANICAL';
    const HORSEPOWER_METRIC = 'HORSEPOWER_METRIC';
    const HOUR = 'HOUR';
    const INCH = 'INCH';
    const INCH_OF_MERCURY = 'INCH_OF_MERCURY';
    const INCH_IMPERIAL = 'INCH_IMPERIAL';
    const INCH_US = 'INCH_US';
    const JOULE = 'JOULE';
    const KATAL = 'KATAL';
    const KELVIN = 'KELVIN';
    const KILOGRAM = 'KILOGRAM';
    const KILOGRAM_FORCE = 'KILOGRAM_FORCE';
    const KILOJOULE = 'KILOJOULE';
    const KILOMETRE = 'KILOMETRE';
    const KILOMETRES_PER_HOUR = 'KILOMETRES_PER_HOUR';
    const KNOT = 'KNOT';
    const KNOT_IMPERIAL = 'KNOT_IMPERIAL';
    const LAMBERT = 'LAMBERT';
    const LIGHT_YEAR = 'LIGHT_YEAR';
    const LINE = 'LINE';
    const LINGE = 'LINGE';
    const LINK_IMPERIAL = 'LINK_IMPERIAL';
    const LINK_US = 'LINK_US';
    const LITRE = 'LITRE';
    const LONG_HUNDREDWEIGHT = 'LONG_HUNDREDWEIGHT';
    const LONG_TON = 'LONG_TON';
    const LUMEN = 'LUMEN';
    const LUX = 'LUX';
    const MAXWELL = 'MAXWELL';
    const METRE = 'METRE';
    const METRES_PER_SECOND = 'METRES_PER_SECOND';
    const METRES_PER_SQUARE_SECOND = 'METRES_PER_SQUARE_SECOND';
    const MILE = 'MILE';
    const MILE_IMPERIAL = 'MILE_IMPERIAL';
    const MILE_US = 'MILE_US';
    const MILES_PER_HOUR = 'MILES_PER_HOUR';
    const MILLIGRAM = 'MILLIGRAM';
    const MILLIMETRE = 'MILLIMETRE';
    const MILLIMETRE_OF_MERCURY = 'MILLIMETRE_OF_MERCURY';
    const MINIM_IMPERIAL = 'MINIM_IMPERIAL';
    const MINIM_US = 'MINIM_US';
    const MINUTE = 'MINUTE';
    const MINUTE_ANGLE = 'MINUTE_ANGLE';
    const MOLE = 'MOLE';
    const MONTH = 'MONTH';
    const MONTH_GREGORIAN = 'MONTH_GREGORIAN';
    const MONTH_JULIAN = 'MONTH_JULIAN';
    const MONTH_SYNODAL = 'MONTH_SYNODAL';
    const NAUTICAL_MILE = 'NAUTICAL_MILE';
    const NAUTICAL_MILE_IMPERIAL = 'NAUTICAL_MILE_IMPERIAL';
    const NEPER = 'NEPER';
    const NEWTON = 'NEWTON';
    const OHM = 'OHM';
    const ONE = 'ONE';
    const OUNCE = 'OUNCE';
    const OUNCE_APOTHECARY = 'OUNCE_APOTHECARY';
    const OUNCE_TROY = 'OUNCE_TROY';
    const PACE_IMPERIAL = 'PACE_IMPERIAL';
    const PARSEC = 'PARSEC';
    const PASCAL = 'PASCAL';
    const PECK_IMPERIAL = 'PECK_IMPERIAL';
    const PECK_US = 'PECK_US';
    const PENNYWEIGHT_TROY = 'PENNYWEIGHT_TROY';
    const PER_CENT_MILLE = 'PER_CENT_MILLE';
    const PER_MILLE = 'PER_MILLE';
    const PERCENT = 'PERCENT';
    const PERMEABILITY_OF_VACUUM = 'PERMEABILITY_OF_VACUUM';
    const PERMITTIVITY_OF_VACUUM = 'PERMITTIVITY_OF_VACUUM';
    const PI = 'PI';
    const PICA = 'PICA';
    const PICA_PRINTER = 'PICA_PRINTER';
    const PIED = 'PIED';
    const PINT_IMPERIAL = 'PINT_IMPERIAL';
    const PINT_US = 'PINT_US';
    const PLANCK_CONSTANT = 'PLANCK_CONSTANT';
    const POINT = 'POINT';
    const POINT_PRINTER = 'POINT_PRINTER';
    const POISE = 'POISE';
    const POUCE = 'POUCE';
    const POUND = 'POUND';
    const POUND_APOTHECARY = 'POUND_APOTHECARY';
    const POUND_FORCE = 'POUND_FORCE';
    const POUND_PER_SQUARE_INCH = 'POUND_PER_SQUARE_INCH';
    const POUND_TROY = 'POUND_TROY';
    const PROTON_MASS = 'PROTON_MASS';
    const QUART_IMPERIAL = 'QUART_IMPERIAL';
    const QUART_US = 'QUART_US';
    const RAD = 'RAD';
    const RADIAN = 'RADIAN';
    const RANKINE = 'RANKINE';
    const REM = 'REM';
    const REVOLUTION = 'REVOLUTION';
    const ROD_IMPERIAL = 'ROD_IMPERIAL';
    const ROD_US = 'ROD_US';
    const RUTHERFORD = 'RUTHERFORD';
    const SCRUPLE_APOTHECARY = 'SCRUPLE_APOTHECARY';
    const SECOND = 'SECOND';
    const SECOND_ANGLE = 'SECOND_ANGLE';
    const SECTION_US = 'SECTION_US';
    const SHORT_HUNDREDWEIGHT = 'SHORT_HUNDREDWEIGHT';
    const SHORT_TON = 'SHORT_TON';
    const SIEMENS = 'SIEMENS';
    const SIEVERT = 'SIEVERT';
    const SPEED_OF_LIGHT = 'SPEED_OF_LIGHT';
    const SPHERE = 'SPHERE';
    const SQUARE_CENTIMETRE = 'SQUARE_CENTIMETRE';
    const SQUARE_FOOT = 'SQUARE_FOOT';
    const SQUARE_INCH = 'SQUARE_INCH';
    const SQUARE_METRE = 'SQUARE_METRE';
    const SQUARE_MILE = 'SQUARE_MILE';
    const SQUARE_MILE_US = 'SQUARE_MILE_US';
    const SQUARE_MILLIMETRE = 'SQUARE_MILLIMETRE';
    const SQUARE_ROD_US = 'SQUARE_ROD_US';
    const SQUARE_YARD = 'SQUARE_YARD';
    const STERADIAN = 'STERADIAN';
    const STOKE = 'STOKE';
    const STONE = 'STONE';
    const TABLESPOON_US = 'TABLESPOON_US';
    const TEASPOON_US = 'TEASPOON_US';
    const TESLA = 'TESLA';
    const THOU = 'THOU';
    const THOU_US = 'THOU_US';
    const TONNE = 'TONNE';
    const TORR = 'TORR';
    const TOWNSHIP_US = 'TOWNSHIP_US';
    const VOLT = 'VOLT';
    const WATT = 'WATT';
    const WEBER = 'WEBER';
    const WEEK = 'WEEK';
    const YARD = 'YARD';
    const YARD_IMPERIAL = 'YARD_IMPERIAL';
    const YARD_US = 'YARD_US';
    const YEAR = 'YEAR';
    const YEAR_CALENDAR = 'YEAR_CALENDAR';
    const YEAR_GREGORIAN = 'YEAR_GREGORIAN';
    const YEAR_JULIAN = 'YEAR_JULIAN';
    const YEAR_JULIEN = 'YEAR_JULIEN';
    const YEAR_SIDEREAL = 'YEAR_SIDEREAL';
    const YEAR_TROPICAL = 'YEAR_TROPICAL';

    /** @var array list of units grouped by quantity */
    private static $mapping = [
        ElectricCurrent::class => [
            self::AMPERE => 'A',
            self::GILBERT => 'Gb',
        ],
        Acceleration::class => [
            self::METRES_PER_SQUARE_SECOND => 'm/s²',
        ],
        Area::class => [
            self::ACRE_IMPERIAL => 'acr_imp',
            self::ACRE_US => 'acr_us',
            self::ARE => 'a',
            self::HECTARE => 'a*100',
            self::SECTION_US => 'mi_us²',
            self::SQUARE_CENTIMETRE => 'cm²',
            self::SQUARE_FOOT => 'ft²',
            self::SQUARE_INCH => 'in²',
            self::SQUARE_METRE => 'm²',
            self::SQUARE_MILE => 'mi²',
            self::SQUARE_MILE_US => 'mi_us²',
            self::SQUARE_MILLIMETRE => 'mm²',
            self::SQUARE_ROD_US => 'rod_us²',
            self::SQUARE_YARD => 'yd²',
            self::TOWNSHIP_US => 'twp',
        ],
        Length::class => [
            self::ANGSTROM => 'Å',
            self::ASTRONOMICAL_UNIT => 'AU',
            self::CENTIMETRE => 'cm',
            self::CHAIN_IMPERIAL => 'chain_imp',
            self::CHAIN_US => 'chain_us',
            self::CICERO => 'cicero',
            self::DIDOT => 'didot',
            self::FATHOM => 'ftm',
            self::FATHOM_IMPERIAL => 'ftm_imp',
            self::FATHOM_US => 'ftm_us',
            self::FOOT => 'ft',
            self::FOOT_IMPERIAL => 'ft_imp',
            self::FOOT_US => 'ft_us',
            self::FURLONG_US => 'fur_us',
            self::HAND => 'hand',
            self::INCH => 'in',
            self::INCH_IMPERIAL => 'in_imp',
            self::INCH_US => 'in_us',
            self::KILOMETRE => 'km',
            self::LIGHT_YEAR => 'ly',
            self::LINE => 'line',
            self::LINGE => 'linge',
            self::LINK_IMPERIAL => 'link_imp',
            self::LINK_US => 'link_us',
            self::METRE => 'm',
            self::MILE => 'mi',
            self::MILE_IMPERIAL => 'mi_imp',
            self::MILE_US => 'mi_us',
            self::MILLIMETRE => 'mm',
            self::NAUTICAL_MILE => 'nmi',
            self::NAUTICAL_MILE_IMPERIAL => 'nmi_imp',
            self::PACE_IMPERIAL => 'pace_imp',
            self::PARSEC => 'pc',
            self::PICA_PRINTER => 'pc_p',
            self::PICA => 'pc',
            self::PIED => 'pied',
            self::POINT_PRINTER => 'pt_p',
            self::POINT => 'pt',
            self::POUCE => 'pouce',
            self::ROD_IMPERIAL => 'rod_imp',
            self::ROD_US => 'rod_us',
            self::THOU => 'th',
            self::THOU_US => 'th_us',
            self::YARD => 'yd',
            self::YARD_IMPERIAL => 'yd_imp',
            self::YARD_US => 'yd_us',
        ],
        Pressure::class => [
            self::ATMOSPHERE_STANDARD => 'atm',
            self::ATMOSPHERE_TECHNICAL => 'at',
            self::BAR => 'bar',
            self::INCH_OF_MERCURY => 'inHg',
            self::MILLIMETRE_OF_MERCURY => 'mmHg',
            self::PASCAL => 'Pa',
            self::POUND_PER_SQUARE_INCH => 'psi',
            self::TORR => 'Torr',
        ],
        Mass::class => [
            self::CARAT_METRIC => 'ct',
            self::DRAM_APOTHECARY => 'dr_ap',
            self::DRAM => 'dr',
            self::GRAIN => 'gr',
            self::GRAM => 'g',
            self::KILOGRAM => 'kg',
            self::LONG_HUNDREDWEIGHT => 'cwt_imp',
            self::LONG_TON => 'ton_imp',
            self::MILLIGRAM => 'mg',
            self::OUNCE_APOTHECARY => 'oz_ap',
            self::OUNCE_TROY => 'oz_t',
            self::OUNCE => 'oz',
            self::PENNYWEIGHT_TROY => 'dwt',
            self::POUND_APOTHECARY => 'lb_ap',
            self::POUND_TROY => 'lb_t',
            self::POUND => 'lb',
            self::SCRUPLE_APOTHECARY => 's_ap',
            self::SHORT_HUNDREDWEIGHT => 'cwt_us',
            self::SHORT_TON => 'ton_us',
            self::STONE => 'st',
            self::TONNE => 't',
        ],
        AmountOfSubstance::class => [
            self::MOLE => 'mol',
        ],
        Volume::class => [
            self::BARREL_US => 'bbl',
            self::BUSHEL_IMPERIAL => 'bu_imp',
            self::BUSHEL_US => 'bu_us',
            self::CORD_US => 'ft³*128',
            self::CUBIC_FOOT => 'ft³',
            self::CUBIC_INCH => 'in³',
            self::CUBIC_METRE => 'm³',
            self::CUBIC_MILE => 'mi³',
            self::CUBIC_YARD => 'yd³',
            self::CUP_US => 'cp',
            self::DRY_PINT_US => 'pt',
            self::DRY_QUART_US => 'qt',
            self::FLUID_DRAM_IMPERIAL => 'dr oz_imp',
            self::FLUID_DRAM_US => 'fl dr',
            self::FLUID_OUNCE_IMPERIAL => 'fl oz_imp',
            self::FLUID_OUNCE_US => 'fl oz',
            self::GALLON_IMPERIAL => 'gal_imp',
            self::GALLON_US => 'gal_us',
            self::GALLON_WINCHESTER => 'gal_wi',
            self::GILL_IMPERIAL => 'gi_imp',
            self::GILL_US => 'gi_us',
            self::LITRE => 'l',
            self::MINIM_IMPERIAL => 'min_imp',
            self::MINIM_US => 'min_us',
            self::PECK_IMPERIAL => 'pk_imp',
            self::PECK_US => 'pk_us',
            self::PINT_IMPERIAL => 'pi_imp',
            self::PINT_US => 'pi_us',
            self::QUART_IMPERIAL => 'qt_imp',
            self::QUART_US => 'qt_us',
            self::TABLESPOON_US => 'Tbsp',
            self::TEASPOON_US => 'tsp',
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
            self::BTU_AT_39F => 'btu_39',
            self::BTU_AT_59F => 'btu_59',
            self::BTU_AT_60F => 'btu_60',
            self::BTU_TABLE => 'btu_it',
            self::BTU_MEAN => 'btu_mean',
            self::BTU_THERMOCHEMICAL => 'btu_th',
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
            self::POUND_FORCE => 'lbf',
        ],
        ElectricCapacitance::class => [
            self::FARAD => 'F',
        ],
        Velocity::class => [
            self::FEET_PER_SECOND => 'ft/s',
            self::KILOMETRES_PER_HOUR => 'km/h',
            self::KNOT => 'kn',
            self::KNOT_IMPERIAL => 'kn_imp',
            self::METRES_PER_SECOND => 'm/s',
            self::MILES_PER_HOUR => 'mi/h',
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

    /** @var Unit */
    private static $ONE;

    /**
     * @return Unit
     */
    public static function ONE()
    {
        if (!is_object(self::$ONE)) {
            self::$ONE = new CompoundUnit([], Constant::class, '1');
        }

        return self::$ONE;
    }

    /**
     * @param string $key
     *
     * @return Unit
     */
    public function __get($key)
    {
        return $this->build($key);
    }

    /**
     * Returns the codes of all units in this system.
     *
     * @return string[]
     */
    public function getUnits()
    {
        $result = [];
        foreach (self::$mapping as $units) {
            $result = array_merge($result, array_keys($units));
        }

        return $result;
    }

    /**
     * Returns the unit for the given code.
     *
     * @param string $code
     *
     * @return Unit
     */
    public function build($code)
    {
        if (isset($this->{$code})) {
            return $this->{$code};
        }

        if ($code == self::ONE) {
            return self::ONE();
        }

        foreach (self::$mapping as $quantity => $units) {
            if (isset($units[$code])) {
                $parts = explode('\\', $quantity);

                $creator = 'build'.$parts[count($parts) - 1];

                $this->{$code} = $this->{$creator}($code, $units[$code]);

                return $this->{$code};
            }
        }

        throw new \InvalidArgumentException(sprintf('Unknown unit code "%s".', $code));
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    private function buildElectricCurrent($code, $symbol)
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
    private function buildAcceleration($code, $symbol)
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
    private function buildArea($code, $symbol)
    {
        switch ($code) {
            case self::ACRE_IMPERIAL:
                return new TransformedUnit(
                    new CompoundUnit($this->YARD_IMPERIAL->pow(2), Area::class),
                    new RationalConverter(4840, 1),
                    $symbol
                );
            case self::ACRE_US:
                return new TransformedUnit(
                    new CompoundUnit($this->ROD_US->pow(2), Area::class),
                    new RationalConverter(160, 1),
                    $symbol
                );
            case self::ARE:
                return new TransformedUnit($this->SQUARE_METRE, new RationalConverter(100, 1), $symbol);
            case self::HECTARE:
                return new TransformedUnit($this->ARE, new RationalConverter(100, 1), $symbol);
            case self::SECTION_US:
                return new CompoundUnit($this->MILE_US->pow(2), Area::class, $symbol);
            case self::SQUARE_CENTIMETRE:
                return new CompoundUnit($this->CENTIMETRE->pow(2), Area::class, $symbol);
            case self::SQUARE_FOOT:
                return new CompoundUnit($this->FOOT->pow(2), Area::class, $symbol);
            case self::SQUARE_INCH:
                return new CompoundUnit($this->INCH->pow(2), Area::class, $symbol);
            case self::SQUARE_METRE:
                return new CompoundUnit($this->METRE->pow(2), Area::class, $symbol);
            case self::SQUARE_MILE:
                return new CompoundUnit($this->MILE->pow(2), Area::class, $symbol);
            case self::SQUARE_MILE_US:
                return new CompoundUnit($this->MILE_US->pow(2), Area::class, $symbol);
            case self::SQUARE_MILLIMETRE:
                return new CompoundUnit($this->MILLIMETRE->pow(2), Area::class, $symbol);
            case self::SQUARE_ROD_US:
                return new CompoundUnit($this->ROD_US->pow(2), Area::class, $symbol);
            case self::SQUARE_YARD:
                return new CompoundUnit($this->YARD->pow(2), Area::class, $symbol);
            case self::TOWNSHIP_US:
                return new TransformedUnit($this->SECTION_US, new RationalConverter(36, 1), $symbol);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    private function buildLength($code, $symbol)
    {
        switch ($code) {
            case self::ANGSTROM:
                return new TransformedUnit($this->METRE, new RationalConverter(1, 10000000000), $symbol);
            case self::ASTRONOMICAL_UNIT:
                return new TransformedUnit($this->METRE, new MultiplyConverter(1.49597870691E11), $symbol);
            case self::CENTIMETRE:
                return new TransformedUnit($this->METRE, new RationalConverter(1, 100), $symbol);
            case self::CHAIN_IMPERIAL:
                return new TransformedUnit($this->ROD_IMPERIAL, new RationalConverter(4, 1), $symbol);
            case self::CHAIN_US:
                return new TransformedUnit($this->ROD_US, new RationalConverter(4, 1), $symbol);
            case self::CICERO:
                return new TransformedUnit($this->DIDOT, new RationalConverter(12, 1), $symbol);
            case self::DIDOT:
                return new TransformedUnit($this->LINGE, new RationalConverter(1, 6), $symbol);
            case self::FATHOM:
                return new TransformedUnit($this->FOOT, new RationalConverter(6, 1), $symbol);
            case self::FATHOM_IMPERIAL:
                return new TransformedUnit($this->FOOT_IMPERIAL, new RationalConverter(6, 1), $symbol);
            case self::FATHOM_US:
                return new TransformedUnit($this->FOOT_US, new RationalConverter(6, 1), $symbol);
            case self::FOOT:
                return new TransformedUnit($this->INCH, new RationalConverter(12, 1), $symbol);
            case self::FOOT_IMPERIAL:
                return new TransformedUnit($this->INCH_IMPERIAL, new RationalConverter(12, 1), $symbol);
            case self::FOOT_US:
                return new TransformedUnit($this->METRE, new RationalConverter(1200, 3937), $symbol);
            case self::FURLONG_US:
                return new TransformedUnit($this->ROD_US, new RationalConverter(40, 1), $symbol);
            case self::HAND:
                return new TransformedUnit($this->INCH, new RationalConverter(4, 1), $symbol);
            case self::INCH:
                return new TransformedUnit($this->CENTIMETRE, new RationalConverter(254, 100), $symbol);
            case self::INCH_IMPERIAL:
                return new TransformedUnit($this->CENTIMETRE, new RationalConverter(2539998, 1000000), $symbol);
            case self::INCH_US:
                return new TransformedUnit($this->FOOT_US, new RationalConverter(1, 12), $symbol);
            case self::KILOMETRE:
                return new TransformedUnit($this->METRE, new RationalConverter(1000, 1), $symbol);
            case self::LIGHT_YEAR:
                return new TransformedUnit($this->METRE, new MultiplyConverter(9.460528405E15), $symbol);
            case self::LINE:
                return new TransformedUnit($this->INCH, new RationalConverter(1, 12), $symbol);
            case self::LINGE:
                return new TransformedUnit($this->POUCE, new RationalConverter(1, 12), $symbol);
            case self::LINK_IMPERIAL:
                return new TransformedUnit($this->CHAIN_IMPERIAL, new RationalConverter(1, 100), $symbol);
            case self::LINK_US:
                return new TransformedUnit($this->CHAIN_US, new RationalConverter(1, 100), $symbol);
            case self::METRE:
                return new BaseUnit($symbol, Length::class, new Dimension('L'));
            case self::MILE:
                return new TransformedUnit($this->FOOT, new RationalConverter(5280, 1), $symbol);
            case self::MILE_IMPERIAL:
                return new TransformedUnit($this->FOOT_IMPERIAL, new RationalConverter(5280, 1), $symbol);
            case self::MILE_US:
                return new TransformedUnit($this->FURLONG_US, new RationalConverter(8, 1), $symbol);
            case self::MILLIMETRE:
                return new TransformedUnit($this->METRE, new RationalConverter(1, 1000), $symbol);
            case self::NAUTICAL_MILE:
                return new TransformedUnit($this->METRE, new RationalConverter(1852, 1), $symbol);
            case self::NAUTICAL_MILE_IMPERIAL:
                return new TransformedUnit($this->FOOT_IMPERIAL, new RationalConverter(6080, 1), $symbol);
            case self::PACE_IMPERIAL:
                return new TransformedUnit($this->FOOT_IMPERIAL, new RationalConverter(5, 20), $symbol);
            case self::PARSEC:
                return new TransformedUnit($this->METRE, new MultiplyConverter(3.085677E16), $symbol);
            case self::PICA_PRINTER:
                return new TransformedUnit($this->POINT_PRINTER, new RationalConverter(12, 1), $symbol);
            case self::PICA:
                return new TransformedUnit($this->POINT, new RationalConverter(12, 1), $symbol);
            case self::PIED:
                return new TransformedUnit($this->CENTIMETRE, new RationalConverter(3248, 100), $symbol);
            case self::POINT_PRINTER:
                return new TransformedUnit($this->INCH, new RationalConverter(13837, 1000000), $symbol);
            case self::POINT:
                return new TransformedUnit($this->LINE, new RationalConverter(1, 6), $symbol);
            case self::POUCE:
                return new TransformedUnit($this->PIED, new RationalConverter(1, 12), $symbol);
            case self::ROD_IMPERIAL:
                return new TransformedUnit($this->FOOT_IMPERIAL, new RationalConverter(33, 2), $symbol);
            case self::ROD_US:
                return new TransformedUnit($this->FOOT_US, new RationalConverter(33, 2), $symbol);
            case self::THOU:
                return new TransformedUnit($this->INCH, new RationalConverter(1, 1000), $symbol);
            case self::THOU_US:
                return new TransformedUnit($this->INCH_US, new RationalConverter(1, 1000), $symbol);
            case self::YARD:
                return new TransformedUnit($this->FOOT, new RationalConverter(3, 1), $symbol);
            case self::YARD_IMPERIAL:
                return new TransformedUnit($this->FOOT_IMPERIAL, new RationalConverter(3, 1), $symbol);
            case self::YARD_US:
                return new TransformedUnit($this->FOOT_US, new RationalConverter(3, 1), $symbol);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    private function buildPressure($code, $symbol)
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
            case self::POUND_PER_SQUARE_INCH:
                return new CompoundUnit(
                    $this->POUND_FORCE->divide($this->SQUARE_INCH),
                    Pressure::class,
                    $symbol
                );
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
    private function buildMass($code, $symbol)
    {
        switch ($code) {
            case self::CARAT_METRIC:
                return new TransformedUnit($this->GRAM, new RationalConverter(1, 5), $symbol);
            case self::DRAM_APOTHECARY:
                return new TransformedUnit($this->SCRUPLE_APOTHECARY, new RationalConverter(3, 1), $symbol);
            case self::DRAM:
                return new TransformedUnit($this->OUNCE, new RationalConverter(1, 16), $symbol);
            case self::GRAIN:
                return new TransformedUnit($this->MILLIGRAM, new RationalConverter(6479891, 100000), $symbol);
            case self::GRAM:
                return new TransformedUnit($this->KILOGRAM, new RationalConverter(1, 1000), $symbol);
            case self::KILOGRAM:
                return new BaseUnit($symbol, Mass::class, new Dimension('M'));
            case self::LONG_HUNDREDWEIGHT:
                return new TransformedUnit($this->POUND, new RationalConverter(112, 1), $symbol);
            case self::LONG_TON:
                return new TransformedUnit($this->LONG_HUNDREDWEIGHT, new RationalConverter(20, 1), $symbol);
            case self::MILLIGRAM:
                return new TransformedUnit($this->GRAM, new RationalConverter(1, 1000), $symbol);
            case self::OUNCE_APOTHECARY:
                return new TransformedUnit($this->DRAM_APOTHECARY, new RationalConverter(8, 1), $symbol);
            case self::OUNCE_TROY:
                return new TransformedUnit($this->PENNYWEIGHT_TROY, new RationalConverter(24, 1), $symbol);
            case self::OUNCE:
                return new TransformedUnit($this->POUND, new RationalConverter(1, 16), $symbol);
            case self::PENNYWEIGHT_TROY:
                return new TransformedUnit($this->GRAIN, new RationalConverter(24, 1), $symbol);
            case self::POUND_APOTHECARY:
                return new TransformedUnit($this->OUNCE_APOTHECARY, new RationalConverter(12, 1), $symbol);
            case self::POUND_TROY:
                return new TransformedUnit($this->OUNCE_TROY, new RationalConverter(12, 1), $symbol);
            case self::POUND:
                return new TransformedUnit($this->GRAIN, new RationalConverter(7000, 1), $symbol);
            case self::SCRUPLE_APOTHECARY:
                return new TransformedUnit($this->GRAIN, new RationalConverter(20, 1), $symbol);
            case self::SHORT_HUNDREDWEIGHT:
                return new TransformedUnit($this->POUND, new RationalConverter(100, 1), $symbol);
            case self::SHORT_TON:
                return new TransformedUnit($this->SHORT_HUNDREDWEIGHT, new RationalConverter(20, 1), $symbol);
            case self::STONE:
                return new TransformedUnit($this->POUND, new RationalConverter(14, 1), $symbol);
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
    private function buildAmountOfSubstance($code, $symbol)
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
    private function buildVolume($code, $symbol)
    {
        switch ($code) {
            case self::BARREL_US:
                return new TransformedUnit($this->GALLON_US, new RationalConverter(42, 1), $symbol);
            case self::BUSHEL_IMPERIAL:
                return new TransformedUnit($this->PECK_IMPERIAL, new RationalConverter(4, 1), $symbol);
            case self::BUSHEL_US:
                return new TransformedUnit(
                    $this->CUBIC_INCH,
                    new RationalConverter(215042, 100),
                    $symbol
                );
            case self::CORD_US:
                return new TransformedUnit($this->CUBIC_FOOT, new RationalConverter(128, 1), $symbol);
            case self::CUBIC_FOOT:
                return new CompoundUnit($this->FOOT->pow(3), Volume::class, $symbol);
            case self::CUBIC_INCH:
                return new CompoundUnit($this->INCH->pow(3), Volume::class, $symbol);
            case self::CUBIC_METRE:
                return new CompoundUnit($this->METRE->pow(3), Volume::class, $symbol);
            case self::CUBIC_MILE:
                return new CompoundUnit($this->MILE->pow(3), Volume::class, $symbol);
            case self::CUBIC_YARD:
                return new CompoundUnit($this->YARD->pow(3), Volume::class, $symbol);
            case self::CUP_US:
                return new TransformedUnit($this->TABLESPOON_US, new RationalConverter(16, 1), $symbol);
            case self::DRY_PINT_US:
                return new TransformedUnit($this->DRY_QUART_US, new RationalConverter(1, 2), $symbol);
            case self::DRY_QUART_US:
                return new TransformedUnit($this->PECK_US, new RationalConverter(1, 8), $symbol);
            case self::FLUID_DRAM_IMPERIAL:
                return new TransformedUnit($this->FLUID_OUNCE_IMPERIAL, new RationalConverter(1, 8), $symbol);
            case self::FLUID_DRAM_US:
                return new TransformedUnit($this->FLUID_OUNCE_US, new RationalConverter(1, 8), $symbol);
            case self::FLUID_OUNCE_IMPERIAL:
                return new TransformedUnit($this->GILL_IMPERIAL, new RationalConverter(1, 5), $symbol);
            case self::FLUID_OUNCE_US:
                return new TransformedUnit($this->GILL_US, new RationalConverter(1, 4), $symbol);
            case self::GALLON_IMPERIAL:
                return new TransformedUnit($this->LITRE, new RationalConverter(454609, 100000), $symbol);
            case self::GALLON_US:
                return new TransformedUnit($this->CUBIC_INCH, new RationalConverter(231, 1), $symbol);
            case self::GALLON_WINCHESTER:
                return new TransformedUnit($this->BUSHEL_US, new RationalConverter(1, 8), $symbol);
            case self::GILL_IMPERIAL:
                return new TransformedUnit($this->PINT_IMPERIAL, new RationalConverter(1, 4), $symbol);
            case self::GILL_US:
                return new TransformedUnit($this->PINT_US, new RationalConverter(1, 4), $symbol);
            case self::LITRE:
                return new TransformedUnit($this->CUBIC_METRE, new RationalConverter(1, 1000), $symbol);
            case self::MINIM_IMPERIAL:
                return new TransformedUnit($this->FLUID_DRAM_IMPERIAL, new RationalConverter(1, 60), $symbol);
            case self::MINIM_US:
                return new TransformedUnit($this->FLUID_DRAM_US, new RationalConverter(1, 60), $symbol);
            case self::PECK_IMPERIAL:
                return new TransformedUnit($this->GALLON_IMPERIAL, new RationalConverter(2, 1), $symbol);
            case self::PECK_US:
                return new TransformedUnit($this->BUSHEL_US, new RationalConverter(1, 4), $symbol);
            case self::PINT_IMPERIAL:
                return new TransformedUnit($this->QUART_IMPERIAL, new RationalConverter(1, 2), $symbol);
            case self::PINT_US:
                return new TransformedUnit($this->QUART_US, new RationalConverter(1, 2), $symbol);
            case self::QUART_IMPERIAL:
                return new TransformedUnit($this->GALLON_IMPERIAL, new RationalConverter(1, 4), $symbol);
            case self::QUART_US:
                return new TransformedUnit($this->GALLON_US, new RationalConverter(1, 4), $symbol);
            case self::TABLESPOON_US:
                return new TransformedUnit($this->FLUID_OUNCE_US, new RationalConverter(1, 2), $symbol);
            case self::TEASPOON_US:
                return new TransformedUnit($this->TABLESPOON_US, new RationalConverter(1, 3), $symbol);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    private function buildDataRate($code, $symbol)
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
    private function buildRadioactiveActivity($code, $symbol)
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
    private function buildDataAmount($code, $symbol)
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
    private function buildConstant($code, $symbol)
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
    private function buildEnergy($code, $symbol)
    {
        switch ($code) {
            case self::BTU_AT_39F:
                return new TransformedUnit($this->KILOJOULE, new RationalConverter(105967, 100000), $symbol);
            case self::BTU_AT_59F:
                return new TransformedUnit($this->KILOJOULE, new RationalConverter(105480, 100000), $symbol);
            case self::BTU_AT_60F:
                return new TransformedUnit($this->KILOJOULE, new RationalConverter(105468, 100000), $symbol);
            case self::BTU_TABLE:
                return new TransformedUnit(
                    $this->KILOJOULE,
                    new RationalConverter(105505585262, 100000000000),
                    $symbol
                );
            case self::BTU_MEAN:
                return new TransformedUnit($this->KILOJOULE, new RationalConverter(105587, 100000), $symbol);
            case self::BTU_THERMOCHEMICAL:
                return new TransformedUnit($this->KILOJOULE, new RationalConverter(105735, 100000), $symbol);
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
    private function buildLuminousIntensity($code, $symbol)
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
    private function buildTemperature($code, $symbol)
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
    private function buildAngle($code, $symbol)
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
    private function buildElectricCharge($code, $symbol)
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
    private function buildDuration($code, $symbol)
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
    private function buildLevel($code, $symbol)
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
    private function buildRatio($code, $symbol)
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
    private function buildForce($code, $symbol)
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
            case self::POUND_FORCE:
                return new TransformedUnit(
                    $this->NEWTON,
                    new RationalConverter(44482216152605, 10000000000000),
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
    private function buildElectricCapacitance($code, $symbol)
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
    private function buildVelocity($code, $symbol)
    {
        switch ($code) {
            case self::FEET_PER_SECOND:
                return new CompoundUnit($this->FOOT->divide($this->SECOND), Velocity::class, $symbol);
            case self::KILOMETRES_PER_HOUR:
                return new CompoundUnit($this->KILOMETRE->divide($this->HOUR), Velocity::class, $symbol);
            case self::KNOT:
                return new CompoundUnit(
                    $this->NAUTICAL_MILE->divide($this->HOUR),
                    Velocity::class,
                    $symbol
                );
            case self::KNOT_IMPERIAL:
                return new CompoundUnit($this->NAUTICAL_MILE_IMPERIAL->divide($this->HOUR), Velocity::class, $symbol);
            case self::METRES_PER_SECOND:
                return new CompoundUnit($this->METRE->divide($this->SECOND), Velocity::class, $symbol);
            case self::MILES_PER_HOUR:
                return new CompoundUnit($this->MILE->divide($this->HOUR), Velocity::class, $symbol);
        }
    }

    /**
     * @param string $code
     * @param string $symbol
     *
     * @return Unit
     */
    private function buildMagneticFluxDensity($code, $symbol)
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
    private function buildRadiationDoseAbsorbed($code, $symbol)
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
    private function buildElectricInductance($code, $symbol)
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
    private function buildFrequency($code, $symbol)
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
    private function buildPower($code, $symbol)
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
    private function buildCatalyticActivity($code, $symbol)
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
    private function buildIlluminance($code, $symbol)
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
    private function buildLuminousFlux($code, $symbol)
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
    private function buildMagneticFlux($code, $symbol)
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
    private function buildElectricResistance($code, $symbol)
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
    private function buildDynamicViscosity($code, $symbol)
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
    private function buildRadiationDoseEffective($code, $symbol)
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
    private function buildElectricConductance($code, $symbol)
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
    private function buildSolidAngle($code, $symbol)
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
    private function buildKinematicViscosity($code, $symbol)
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
    private function buildElectricPotential($code, $symbol)
    {
        switch ($code) {
            case self::VOLT:
                return new AlternateUnit($this->WATT->divide($this->AMPERE), $symbol, ElectricPotential::class);
        }
    }
}
