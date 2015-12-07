<?php

namespace BinSoul\Common\Measurement\Converter;

use BinSoul\Common\Measurement\Converter;

/**
 * Adds a fixed offset to a value.
 */
class AddConverter extends Converter
{
    /** @var float */
    private $offset;

    /**
     * Constructs an instance of this class.
     *
     * @param float $offset
     */
    public function __construct($offset)
    {
        if ($offset == 0.0) {
            throw new \InvalidArgumentException('Expected an offset other than zero.');
        }

        $this->offset = $offset;
    }

    public function getOffset()
    {
        return $this->offset;
    }

    public function isLinear()
    {
        return false;
    }

    public function concat(Converter $converter)
    {
        if ($converter instanceof self) {
            $offset = $this->offset + $converter->getOffset();

            return $offset == 0.0 ? Converter::IDENTITY() : new self($offset);
        }

        return parent::concat($converter);
    }

    public function inverse()
    {
        return new self(-$this->offset);
    }

    public function convert($value)
    {
        return $value + $this->offset;
    }

    public function equals(Converter $that)
    {
        if (!($that instanceof self)) {
            return false;
        }

        return $this->offset == $that->getOffset();
    }

    public function __toString()
    {
        return '+'.$this->offset;
    }
}
