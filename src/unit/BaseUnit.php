<?php

namespace BinSoul\Common\Measurement\Unit;

use BinSoul\Common\Measurement\Dimension;
use BinSoul\Common\Measurement\Unit;
use BinSoul\Common\Measurement\Converter;

/**
 * Represents a unit adopted for measurement of a base quantity.
 */
class BaseUnit extends AbstractUnit
{
    /** @var string */
    private $symbol;
    /** @var Dimension */
    private $dimension;

    /**
     * Constructs an instance of this class.
     *
     * @param string    $symbol
     * @param string    $quantity
     * @param Dimension $dimension
     */
    public function __construct($symbol, $quantity, Dimension $dimension)
    {
        parent::__construct($quantity);
        $this->symbol = $symbol;
        $this->dimension = $dimension;
    }

    public function hasOwnSymbol()
    {
        return true;
    }

    /**
     * Returns the Symbol.
     *
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    public function equals(Unit $that)
    {
        if ($this == $that) {
            return true;
        }

        if (!($that instanceof self)) {
            return false;
        }

        return $this->symbol == $that->getSymbol();
    }

    public function getDimension()
    {
        return $this->dimension;
    }

    public function getStandardUnit()
    {
        return $this;
    }

    public function toStandardUnit()
    {
        return Converter::IDENTITY();
    }

    public function getBaseUnits()
    {
        return $this;
    }

    public function toBaseUnits()
    {
        return Converter::IDENTITY();
    }
}
