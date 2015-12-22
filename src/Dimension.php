<?php

namespace BinSoul\Common\Measurement;

use BinSoul\Common\Measurement\Quantity\Dimensionless;
use BinSoul\Common\Measurement\Unit\BaseUnit;

/**
 * Defines the relationship between a set of related units.
 */
class Dimension
{
    /** @var Dimension */
    private static $none;
    /** @var Unit */
    private $unit;

    /**
     * Constructs an instance of this class.
     *
     * @param string $symbol
     */
    public function __construct($symbol)
    {
        if (!is_object($symbol)) {
            $this->unit = new BaseUnit($symbol, Dimensionless::class, new self(SystemOfUnits::ONE()));
        } else {
            $this->unit = $symbol;
        }
    }

    /**
     * Returns the dimensionless dimension.
     *
     * @return Dimension
     */
    public static function NONE()
    {
        if (!is_object(self::$none)) {
            self::$none = new self(SystemOfUnits::ONE());
        }

        return self::$none;
    }

    /**
     * Returns the symbol.
     *
     * @return string
     */
    public function getSymbol()
    {
        return $this->unit->getSymbol();
    }

    /**
     * Indicates if this dimension equals the given dimension.
     *
     * @param Dimension $that
     *
     * @return bool
     */
    public function equals(Dimension $that)
    {
        if ($this == $that) {
            return true;
        }

        return $this->unit->equals($that->unit);
    }

    public function times(Dimension $that)
    {
        return new self($this->unit->times($that->unit));
    }

    public function divide(Dimension $that)
    {
        return new self($this->unit->divide($that->unit));
    }

    public function pow($n)
    {
        return new self($this->unit->pow($n));
    }

    public function root($n)
    {
        return new self($this->unit->root($n));
    }
}
