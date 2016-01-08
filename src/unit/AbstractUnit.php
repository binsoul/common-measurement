<?php

namespace BinSoul\Common\Measurement\Unit;

use BinSoul\Common\Measurement\Converter\AddConverter;
use BinSoul\Common\Measurement\Converter\MultiplyConverter;
use BinSoul\Common\Measurement\Converter\RationalConverter;
use BinSoul\Common\Measurement\Unit;
use BinSoul\Common\Measurement\Converter;
use BinSoul\Common\Measurement\SystemOfUnits;

/**
 * Provides an abstract base class for all units.
 */
abstract class AbstractUnit implements Unit
{
    /** @var string */
    private $quantity;

    /**
     * Constructs an instance of this class.
     *
     * @param string $quantity
     */
    public function __construct($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function isStandardUnit()
    {
        return $this->getStandardUnit()->equals($this);
    }

    public function getConverterTo(Unit $that)
    {
        if ($this->equals($that)) {
            return Converter::IDENTITY();
        }

        $thisSystemUnit = $this->getStandardUnit();
        $thatSystemUnit = $that->getStandardUnit();
        if ($thisSystemUnit->equals($thatSystemUnit)) {
            return $that->toStandardUnit()->inverse()->concat($this->toStandardUnit());
        }

        if (!$thisSystemUnit->getDimension()->equals($thatSystemUnit->getDimension())) {
            throw new \RuntimeException(
                sprintf(
                    'Dimension %s is not compatible with dimension %s.',
                    $thisSystemUnit->getDimension()->getSymbol(),
                    $thatSystemUnit->getDimension()->getSymbol()
                )
            );
        }

        $thisTransform = $this->toStandardUnit()->concat($thisSystemUnit->toBaseUnits());
        $thatTransform = $that->toStandardUnit()->concat($thatSystemUnit->toBaseUnits());

        return $thatTransform->inverse()->concat($thisTransform);
    }

    public function plus($offset)
    {
        if ($offset == 0.0) {
            return $this;
        }

        return $this->transform(new AddConverter($offset));
    }

    public function divide($divisor)
    {
        if ($divisor instanceof Unit) {
            return $this->times($divisor->inverse());
        }

        if ($divisor == 1) {
            return $this;
        }

        if (is_int($divisor)) {
            return $this->transform(new RationalConverter(1, $divisor));
        }

        return $this->transform(new MultiplyConverter(1.0 / $divisor));
    }

    public function times($factor)
    {
        if ($factor instanceof Unit) {
            return CompoundBuilder::getProductInstance($this, $factor);
        }

        if ($factor == 1) {
            return $this;
        }

        if (is_int($factor)) {
            return $this->transform(new RationalConverter($factor, 1));
        }

        return $this->transform(new MultiplyConverter($factor));
    }

    public function root($n)
    {
        if ($n > 0) {
            return CompoundBuilder::getRootInstance($this, $n);
        }

        if ($n == 0) {
            throw new \InvalidArgumentException('Expected root not equal to zero.');
        }

        return SystemOfUnits::ONE()->divide($this->root(-$n));
    }

    public function pow($n)
    {
        if ($n > 0) {
            return $this->times($this->pow($n - 1));
        }

        if ($n == 0) {
            return SystemOfUnits::ONE();
        }

        return SystemOfUnits::ONE()->divide($this->pow(-$n));
    }

    public function inverse()
    {
        return CompoundBuilder::getQuotientInstance(SystemOfUnits::ONE(), $this);
    }

    /**
     * Applies the given operation and returns a transformed unit.
     *
     * @param Converter $operation
     *
     * @return Unit
     */
    protected function transform(Converter $operation)
    {
        if ($operation->isIdentity()) {
            return $this;
        }

        return new TransformedUnit($this, $operation);
    }
}
