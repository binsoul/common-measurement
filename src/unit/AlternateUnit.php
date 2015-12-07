<?php

namespace BinSoul\Common\Measurement\Unit;

use BinSoul\Common\Measurement\Unit;
use BinSoul\Common\Measurement\Converter;

/**
 * Represents a unit used to distinguish between quantities of a different nature but of the same dimension.
 */
class AlternateUnit extends DerivedUnit
{
    /** @var string */
    private $symbol;
    /** @var Unit */
    private $parent;

    /**
     * Constructs an instance of this class.
     *
     * @param Unit   $parent
     * @param string $symbol
     * @param string $quantity
     */
    public function __construct(Unit $parent, $symbol, $quantity)
    {
        if (!$parent->isStandardUnit()) {
            throw new \InvalidArgumentException(
                sprintf('Parent unit "%s" is not a standard unit.', $parent->getSymbol())
            );
        }

        parent::__construct($quantity);

        $this->parent = $parent;
        $this->symbol = $symbol;
    }

    public function hasOwnSymbol()
    {
        return true;
    }

    /**
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @return Unit
     */
    public function getParent()
    {
        return $this->parent;
    }

    public function getDimension()
    {
        return $this->parent->getDimension();
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
        return $this->parent->getBaseUnits();
    }

    public function toBaseUnits()
    {
        return $this->parent->toBaseUnits();
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
}
