<?php

namespace BinSoul\Common\Measurement;

use BinSoul\Common\Measurement\Quantity\Constant;
use BinSoul\Common\Measurement\Unit\CompoundUnit;

/**
 * Represents a collection of units of measurement and rules relating them to each other.
 *
 * @property Unit $ONE constant
 */
abstract class SystemOfUnits
{
    const ONE = 'ONE';

    /** @var array list of units grouped by quantity */
    protected static $mapping = [
    ];

    /** @var Unit */
    private static $ONE;

    /**
     * @return Unit
     */
    public static function ONE()
    {
        if (!is_object(self::$ONE)) {
            self::$ONE = new CompoundUnit([], Constant::class, '1');
        }

        return self::$ONE;
    }

    /**
     * @param string $key
     *
     * @return Unit
     */
    public function __get($key)
    {
        return $this->build($key);
    }

    /**
     * Returns the codes of all units in this system.
     *
     * @return string[]
     */
    public function getUnits()
    {
        $result = [];
        foreach (static::$mapping as $units) {
            $result = array_merge($result, array_keys($units));
        }

        return $result;
    }

    /**
     * Returns the unit for the given code.
     *
     * @param string $code
     *
     * @return Unit
     */
    public function build($code)
    {
        if (isset($this->{$code})) {
            return $this->{$code};
        }

        if ($code == self::ONE) {
            return self::ONE();
        }

        foreach (static::$mapping as $quantity => $units) {
            if (isset($units[$code])) {
                $parts = explode('\\', $quantity);

                $creator = 'build'.$parts[count($parts) - 1];

                $this->{$code} = $this->{$creator}($code, $units[$code]);

                return $this->{$code};
            }
        }

        throw new \InvalidArgumentException(sprintf('Unknown unit code "%s".', $code));
    }
}
