<?php

namespace BinSoul\Common\Measurement\Converter;

use BinSoul\Common\Measurement\Converter;

/**
 * Calculates the logarithm of a value.
 */
class LogConverter extends Converter
{
    /** @var float */
    private $base;
    /** @var float */
    private $logBase;

    /**
     * Constructs an instance of this class.
     *
     * @param float $base
     */
    public function __construct($base)
    {
        $this->base = $base;
        $this->logBase = log($base);
    }

    /**
     * Returns the base.
     *
     * @return float
     */
    public function getBase()
    {
        return $this->base;
    }

    public function isLinear()
    {
        return false;
    }

    public function inverse()
    {
        return new ExpConverter($this->base);
    }

    public function equals(Converter $that)
    {
        if (!($that instanceof self)) {
            return false;
        }

        return $this->base == $that->getBase();
    }

    public function convert($amount)
    {
        return log($amount) / $this->logBase;
    }
}
