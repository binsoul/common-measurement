<?php

namespace BinSoul\Test\Common\Measurement\SystemOfUnits;

use BinSoul\Common\Measurement\Measure;
use BinSoul\Common\Measurement\SystemOfUnits\USCustomaryUnits;
use BinSoul\Common\Measurement\SystemOfUnits\StandardUnits;

class USCustomaryUnitsTest extends SystemOfUnitsTest
{
    protected function buildUnits()
    {
        return new USCustomaryUnits(new StandardUnits());
    }

    public function test_generates_correct_lengths()
    {
        $standardUnits = new StandardUnits();
        $units = new USCustomaryUnits($standardUnits);

        $this->assertEquals(0.352777778, round(Measure::valueOf(1, $units->POINT)->to($standardUnits->MILLIMETRE)->getValue(), 9));
        $this->assertEquals(4.233333, round(Measure::valueOf(1, $units->PICA)->to($standardUnits->MILLIMETRE)->getValue(), 6));
        $this->assertEquals(25.4, round(Measure::valueOf(1, $units->INCH)->to($standardUnits->MILLIMETRE)->getValue(), 1));
        $this->assertEquals(30.48, round(Measure::valueOf(1, $units->FOOT)->to($standardUnits->CENTIMETRE)->getValue(), 2));
        $this->assertEquals(91.44, round(Measure::valueOf(1, $units->YARD)->to($standardUnits->CENTIMETRE)->getValue(), 2));
        $this->assertEquals(1.609344, round(Measure::valueOf(1, $units->MILE)->to($standardUnits->KILOMETRE)->getValue(), 6));

        $this->assertEquals(0.2012, round(Measure::valueOf(1, $units->LINK_SURVEY)->to($standardUnits->METRE)->getValue(), 4));
        $this->assertEquals(0.30480061, round(Measure::valueOf(1, $units->FOOT_SURVEY)->to($standardUnits->METRE)->getValue(), 8));
        $this->assertEquals(5.02921, round(Measure::valueOf(1, $units->ROD_SURVEY)->to($standardUnits->METRE)->getValue(), 5));
        $this->assertEquals(20.11684, round(Measure::valueOf(1, $units->CHAIN_SURVEY)->to($standardUnits->METRE)->getValue(), 5));
        $this->assertEquals(201.1684, round(Measure::valueOf(1, $units->FURLONG_SURVEY)->to($standardUnits->METRE)->getValue(), 4));
        $this->assertEquals(1609.347, round(Measure::valueOf(1, $units->MILE_SURVEY)->to($standardUnits->METRE)->getValue(), 3));
        $this->assertEquals(4828.042, round(Measure::valueOf(1, $units->LEAGUE_SURVEY)->to($standardUnits->METRE)->getValue(), 3));

        $this->assertEquals(1.8288, round(Measure::valueOf(1, $units->FATHOM)->to($standardUnits->METRE)->getValue(), 4));
        $this->assertEquals(219.456, round(Measure::valueOf(1, $units->CABLE)->to($standardUnits->METRE)->getValue(), 3));
    }

    public function test_generates_correct_areas()
    {
        $si = new StandardUnits();
        $us = new USCustomaryUnits($si);

        $this->assertEquals(0.09290341, round(Measure::valueOf(1, $us->SQUARE_FOOT_SURVEY)->to($si->SQUARE_METRE)->getValue(), 8));
        $this->assertEquals(404.6873, round(Measure::valueOf(1, $us->SQUARE_CHAIN_SURVEY)->to($si->SQUARE_METRE)->getValue(), 4));
        $this->assertEquals(4046.873, round(Measure::valueOf(1, $us->ACRE)->to($si->SQUARE_METRE)->getValue(), 3));
        $this->assertEquals(2.589998, round(Measure::valueOf(1, $us->SECTION)->to($si->SQUARE_KILOMETRE)->getValue(), 6));
        $this->assertEquals(93.23994, round(Measure::valueOf(1, $us->TOWNSHIP)->to($si->SQUARE_KILOMETRE)->getValue(), 5));
    }

    public function test_generates_correct_volumes()
    {
        $si = new StandardUnits();
        $us = new USCustomaryUnits($si);

        $this->assertEquals(16.387064, round(Measure::valueOf(1, $us->CUBIC_INCH)->to($si->MILLILITRE)->getValue(), 6));
        $this->assertEquals(28.31685, round(Measure::valueOf(1, $us->CUBIC_FOOT)->to($si->LITRE)->getValue(), 5));
        $this->assertEquals(764.554857984, round(Measure::valueOf(1, $us->CUBIC_YARD)->to($si->LITRE)->getValue(), 9));
        $this->assertEquals(1233482, round(Measure::valueOf(1, $us->ACRE_FOOT)->to($si->LITRE)->getValue(), 0));

        $this->assertEquals(61.611519921875, round(Measure::valueOf(1000, $us->MINIM)->to($si->MILLILITRE)->getValue(), 12));
        $this->assertEquals(3696.6911953125, round(Measure::valueOf(1000, $us->FLUID_DRAM)->to($si->MILLILITRE)->getValue(), 10));
        $this->assertEquals(4928.92159375, round(Measure::valueOf(1000, $us->TEASPOON)->to($si->MILLILITRE)->getValue(), 8));
        $this->assertEquals(14786.76478125, round(Measure::valueOf(1000, $us->TABLESPOON)->to($si->MILLILITRE)->getValue(), 8));
        $this->assertEquals(29573.5295625, round(Measure::valueOf(1000, $us->FLUID_OUNCE)->to($si->MILLILITRE)->getValue(), 7));
        $this->assertEquals(44360.29434375, round(Measure::valueOf(1000, $us->SHOT)->to($si->MILLILITRE)->getValue(), 8));
        $this->assertEquals(118.29411825, round(Measure::valueOf(1, $us->GILL)->to($si->MILLILITRE)->getValue(), 8));
        $this->assertEquals(236.5882365, round(Measure::valueOf(1, $us->CUP)->to($si->MILLILITRE)->getValue(), 7));
        $this->assertEquals(473.176473, round(Measure::valueOf(1, $us->PINT)->to($si->MILLILITRE)->getValue(), 6));
        $this->assertEquals(9.46352946, round(Measure::valueOf(10, $us->QUART)->to($si->LITRE)->getValue(), 8));
        $this->assertEquals(37.85411784, round(Measure::valueOf(10, $us->GALLON)->to($si->LITRE)->getValue(), 8));
        $this->assertEquals(1192.40471196, round(Measure::valueOf(10, $us->BARREL)->to($si->LITRE)->getValue(), 8));
        $this->assertEquals(1589.87294928, round(Measure::valueOf(10, $us->OIL_BARREL)->to($si->LITRE)->getValue(), 8));
        $this->assertEquals(2384.80942392, round(Measure::valueOf(10, $us->HOGSHEAD)->to($si->LITRE)->getValue(), 8));

        $this->assertEquals(0.5506105, round(Measure::valueOf(1, $us->DRY_PINT)->to($si->LITRE)->getValue(), 7));
        $this->assertEquals(1.101221, round(Measure::valueOf(1, $us->DRY_QUART)->to($si->LITRE)->getValue(), 6));
        $this->assertEquals(4.404884, round(Measure::valueOf(1, $us->DRY_GALLON)->to($si->LITRE)->getValue(), 6));
        $this->assertEquals(8.809768, round(Measure::valueOf(1, $us->PECK)->to($si->LITRE)->getValue(), 6));
        $this->assertEquals(35.23907, round(Measure::valueOf(1, $us->BUSHEL)->to($si->LITRE)->getValue(), 5));
        $this->assertEquals(115.6271, round(Measure::valueOf(1, $us->DRY_BARREL)->to($si->LITRE)->getValue(), 4));
    }

    public function test_generates_correct_masses()
    {
        $si = new StandardUnits();
        $us = new USCustomaryUnits($si);

        $this->assertEquals(64.79891, round(Measure::valueOf(1, $us->GRAIN)->to($si->MILLIGRAM)->getValue(), 5));
        $this->assertEquals(1771.8451953125, round(Measure::valueOf(1000, $us->DRAM)->to($si->GRAM)->getValue(), 10));
        $this->assertEquals(28.349523125, round(Measure::valueOf(1, $us->OUNCE)->to($si->GRAM)->getValue(), 9));
        $this->assertEquals(453.59237, round(Measure::valueOf(1, $us->POUND)->to($si->GRAM)->getValue(), 5));
        $this->assertEquals(45.359237, round(Measure::valueOf(1, $us->SHORT_HUNDREDWEIGHT)->to($si->KILOGRAM)->getValue(), 6));
        $this->assertEquals(907.18474, round(Measure::valueOf(1, $us->SHORT_TON)->to($si->KILOGRAM)->getValue(), 5));
    }
}
