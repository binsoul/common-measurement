<?php

namespace BinSoul\Common\Measurement\Converter;

use BinSoul\Common\Measurement\Converter;

/**
 * Combines to converters.
 */
class CompoundConverter extends Converter
{
    /** @var Converter */
    private $first;
    /** @var Converter */
    private $second;

    /**
     * Constructs an instance of this class.
     *
     * @param Converter $first
     * @param Converter $second
     */
    public function __construct(Converter $first, Converter $second)
    {
        $this->first = $first;
        $this->second = $second;
    }

    public function isLinear()
    {
        return $this->first->isLinear() && $this->second->isLinear();
    }

    public function inverse()
    {
        return new self($this->second->inverse(), $this->first->inverse());
    }

    public function convert($value)
    {
        return $this->second->convert($this->first->convert($value));
    }

    public function equals(Converter $that)
    {
        if ($this == $that) {
            return true;
        }

        if (!($that instanceof self)) {
            return false;
        }

        return ($this->first->equals($that->first)) && ($this->second->equals($that->second));
    }

    public function __toString()
    {
        return $this->first->__toString().$this->second->__toString();
    }
}
