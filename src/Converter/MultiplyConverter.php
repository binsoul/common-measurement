<?php

namespace BinSoul\Common\Measurement\Converter;

use BinSoul\Common\Measurement\Converter;

/**
 * Multiplies a value with a fixed factor.
 */
class MultiplyConverter extends Converter
{
    /** @var float */
    private $factor;

    /**
     * Constructs an instance of this class.
     *
     * @param float $factor
     */
    public function __construct($factor)
    {
        if ($factor == 1.0) {
            throw new \InvalidArgumentException('Would result in identity converter');
        }

        $this->factor = $factor;
    }

    /**
     * Returns the factor.
     *
     * @return float
     */
    public function getFactor()
    {
        return $this->factor;
    }

    public function isLinear()
    {
        return true;
    }

    public function concat(Converter $converter)
    {
        if (($converter instanceof self)) {
            $factor = $this->factor * $converter->getFactor();

            return $factor == 1.0 ? Converter::IDENTITY() : new self($factor);
        }

        return parent::concat($converter);
    }

    public function inverse()
    {
        return new self(1.0 / $this->factor);
    }

    public function convert($value)
    {
        return $value * $this->factor;
    }

    public function equals(Converter $that)
    {
        if (!($that instanceof self)) {
            return false;
        }

        return $this->factor == $that->getFactor();
    }

    public function __toString()
    {
        return '*'.$this->factor;
    }
}
