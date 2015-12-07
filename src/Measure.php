<?php

namespace BinSoul\Common\Measurement;

use BinSoul\Common\Measurement\Measure\MeasureBuilder;

/**
 * Represents the result of a measurement stated in a known unit.
 */
abstract class Measure implements Measurable, Quantity
{
    /** @var float */
    private $value;
    /** @var Unit */
    private $unit;

    /**
     * Returns a measure composed of the given value and the given unit.
     *
     * @param float $value
     * @param Unit  $unit
     *
     * @return Measurable|Quantity
     */
    public static function valueOf($value, Unit $unit)
    {
        return MeasureBuilder::build($value, $unit);
    }

    /**
     * Constructs an instance of this class.
     *
     * @param float $value
     * @param Unit  $unit
     */
    public function __construct($value, Unit $unit)
    {
        $this->value = $value;
        $this->unit = $unit;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getUnit()
    {
        return $this->unit;
    }

    public function to(Unit $unit)
    {
        if (($unit == $this->unit) || ($unit->equals($this->unit))) {
            return $this;
        }

        return self::valueOf($this->unit->getConverterTo($unit)->convert($this->value), $unit);
    }

    public function compareTo(Measurable $that)
    {
        $thisValue = $this->value;
        $thatValue = $that->to($this->unit)->getValue();

        return $thisValue == $thatValue ? 0 : ($thisValue < $thatValue ? -1 : 1);
    }

    public function equals(Measurable $that)
    {
        return $this->getUnit()->equals($that->getUnit()) && $this->getValue() == $that->getValue();
    }
}
