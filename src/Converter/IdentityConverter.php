<?php

namespace BinSoul\Common\Measurement\Converter;

use BinSoul\Common\Measurement\Converter;

/**
 * Returns the same value.
 */
class IdentityConverter extends Converter
{
    public function isIdentity()
    {
        return true;
    }

    public function isLinear()
    {
        return true;
    }

    public function inverse()
    {
        return $this;
    }

    public function convert($value)
    {
        return $value;
    }

    public function concat(Converter $converter)
    {
        return $converter;
    }

    public function equals(Converter $that)
    {
        return $this == $that;
    }

    public function __toString()
    {
        return '';
    }
}
