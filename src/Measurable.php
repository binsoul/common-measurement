<?php

namespace BinSoul\Common\Measurement;

/**
 * Represents the measurable property or aspect of a thing.
 */
interface Measurable
{
    /**
     * Returns the value.
     *
     * @return float
     */
    public function getValue();

    /**
     * Returns the unit.
     *
     * @return Unit
     */
    public function getUnit();

    /**
     * Converts the measurement to the given unit.
     *
     * @param Unit $unit
     *
     * @return Measurable
     */
    public function to(Unit $unit);

    /**
     * Compares the measurement to the given measurement.
     *
     * @param Measurable $that
     *
     * @return int
     */
    public function compareTo(Measurable $that);

    /**
     * Indicates if this measurement is equal to the given measurement.
     *
     * @param Measurable $that
     *
     * @return bool
     */
    public function equals(Measurable $that);
}
