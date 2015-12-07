<?php

namespace BinSoul\Common\Measurement;

use BinSoul\Common\Measurement\Converter\CompoundConverter;
use BinSoul\Common\Measurement\Converter\IdentityConverter;

/**
 * Converts numeric values from one unit to another unit.
 */
abstract class Converter
{
    /** @var IdentityConverter */
    private static $identity;

    /**
     * Returns the identity converter.
     *
     * @return IdentityConverter
     */
    public static function IDENTITY()
    {
        if (!is_object(self::$identity)) {
            self::$identity = new IdentityConverter();
        }

        return self::$identity;
    }

    /**
     * Indicates if the converter is the identity converter.
     *
     * @return bool
     */
    public function isIdentity()
    {
        return false;
    }

    /**
     * Indicates if the conversion is linear.
     *
     * @return bool
     */
    abstract public function isLinear();

    /**
     * Returns the reverse converter of this class.
     *
     * @return Converter
     */
    abstract public function inverse();

    /**
     * Converts the given value.
     *
     * @param float $value
     *
     * @return float
     */
    abstract public function convert($value);

    /**
     * Indicates if this converter is equal to the given converter.
     *
     * @param Converter $that
     *
     * @return bool
     */
    abstract public function equals(Converter $that);

    /**
     * Concatenates the this converter and the given converter.
     *
     * @param Converter $converter
     *
     * @return Converter
     */
    public function concat(Converter $converter)
    {
        return $converter == self::IDENTITY() ? $this : new CompoundConverter($converter, $this);
    }

    /**
     * Returns a string representation of the applied operation.
     *
     * @return string
     */
    public function __toString()
    {
        return '?';
    }
}
