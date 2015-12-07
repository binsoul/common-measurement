<?php

namespace BinSoul\Common\Measurement;

/**
 * Describes the magnitude or quantity of a measurement.
 */
interface Unit
{
    /**
     * Indicates if the unit has a special symbol.
     *
     * @return bool
     */
    public function hasOwnSymbol();

    /**
     * Returns the symbol of the unit.
     *
     * @return string
     */
    public function getSymbol();

    /**
     * @return string
     */
    public function getQuantity();

    /**
     * Returns the dimension of the unit.
     *
     * @return Dimension
     */
    public function getDimension();

    /**
     * Indicates if this unit is equal to the given unit.
     *
     * @param Unit $that
     *
     * @return bool
     */
    public function equals(Unit $that);

    /**
     * @return Unit
     */
    public function getStandardUnit();

    /**
     * @return bool
     */
    public function isStandardUnit();

    /**
     * @return Converter
     */
    public function toStandardUnit();

    /**
     * @return Unit
     */
    public function getBaseUnits();

    /**
     * @return Converter
     */
    public function toBaseUnits();

    /**
     * Returns a converter of numeric values from this unit to another unit.
     *
     * @param Unit $that
     *
     * @return Converter
     */
    public function getConverterTo(Unit $that);

    /**
     * @param float $offset
     *
     * @return Unit
     */
    public function plus($offset);

    /**
     * @param int|float|Unit $factor
     *
     * @return Unit
     */
    public function times($factor);

    /**
     * @param int|float|Unit $divisor
     *
     * @return Unit
     */
    public function divide($divisor);

    /**
     * @param int $pow
     *
     * @return Unit
     */
    public function pow($pow);

    /**
     * @param int $root
     *
     * @return Unit
     */
    public function root($root);

    /**
     * @return Unit
     */
    public function inverse();
}
