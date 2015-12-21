<?php

namespace BinSoul\Common\Measurement\Converter;

use BinSoul\Common\Measurement\Converter;

/**
 * Multiplies a values with a rational number.
 */
class RationalConverter extends Converter
{
    /** @var int */
    private $dividend;
    /** @var int */
    private $divisor;

    /**
     * Constructs an instance of this class.
     *
     * @param int $dividend
     * @param int $divisor
     */
    public function __construct($dividend, $divisor)
    {
        if ($dividend <= 0) {
            throw new \InvalidArgumentException('Negative or zero dividend.');
        }

        if ($divisor <= 0) {
            throw new \InvalidArgumentException('Negative or zero divisor.');
        }

        if ($dividend == $divisor) {
            throw new \InvalidArgumentException('Would result in identity converter');
        }

        $this->dividend = $dividend;
        $this->divisor = $divisor;
    }

    /**
     * Returns the dividend.
     *
     * @return int
     */
    public function getDividend()
    {
        return $this->dividend;
    }

    /**
     * Returns the divisor.
     *
     * @return int
     */
    public function getDivisor()
    {
        return $this->divisor;
    }

    public function isLinear()
    {
        return true;
    }

    public function convert($value)
    {
        return $value * $this->dividend / $this->divisor;
    }

    public function concat(Converter $converter)
    {
        if (!($converter instanceof self)) {
            return parent::concat($converter);
        }

        $dividend = $this->dividend * $converter->getDividend();
        $divisor = $this->divisor * $converter->getDivisor();

        $gcd = $this->gcd($dividend, $divisor);

        $dividend = $dividend / $gcd;
        $divisor = $divisor / $gcd;

        if ($dividend == 1 && $divisor == 1) {
            return Converter::IDENTITY();
        }

        return new self($dividend, $divisor);
    }

    public function inverse()
    {
        if ($this->dividend < 0) {
            return new self(-$this->divisor, -$this->dividend);
        }

        return new self($this->divisor, $this->dividend);
    }

    public function equals(Converter $that)
    {
        if (!($that instanceof self)) {
            return false;
        }

        return $this->dividend == $that->getDividend() && $this->divisor == $that->getDivisor();
    }

    public function __toString()
    {
        if ($this->dividend != 1 && $this->divisor != 1) {
            return '*('.$this->dividend.'/'.$this->divisor.')';
        } elseif ($this->dividend != 1) {
            return '*'.$this->dividend;
        } elseif ($this->divisor != 1) {
            return '/'.$this->divisor;
        };

        return '';
    }

    /**
     * Calculates the greatest common divisor of two numbers.
     *
     * @param int $a
     * @param int $b
     *
     * @return int
     */
    private function gcd($a, $b)
    {
        if ($a == 0 || $b == 0) {
            return abs(max(abs($a), abs($b)));
        }

        while ($b != 0) {
            $t = fmod($a, $b);
            $a = $b;
            $b = $t;
        }

        return $a;
    }
}
