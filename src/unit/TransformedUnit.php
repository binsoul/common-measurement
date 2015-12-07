<?php

namespace BinSoul\Common\Measurement\Unit;

use BinSoul\Common\Measurement\Unit;
use BinSoul\Common\Measurement\Converter;

/**
 * Represents a unit which is transformed using a converter.
 */
class TransformedUnit extends DerivedUnit
{
    /** @var string */
    private $symbol;
    /** @var Unit */
    private $parent;
    /** @var Converter */
    private $toParent;

    /**
     * Constructs an instance of this class.
     *
     * @param Unit      $parent
     * @param Converter $toParent
     * @param string    $symbol
     * @param string    $quantity
     */
    public function __construct(Unit $parent, Converter $toParent, $symbol = '', $quantity = '')
    {
        if ($toParent->isIdentity()) {
            throw new \InvalidArgumentException('Cannot use an identity converter.');
        }

        parent::__construct($quantity != '' ? $quantity : $parent->getQuantity());

        $this->parent = $parent;
        $this->toParent = $toParent;
        $this->symbol = $symbol;
    }

    /**
     * @return Unit
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @return Converter
     */
    public function toParent()
    {
        return $this->toParent;
    }

    public function hasOwnSymbol()
    {
        return $this->symbol != '';
    }

    /**
     * @return string
     */
    public function getSymbol()
    {
        if ($this->symbol != '') {
            return $this->symbol;
        }

        $baseUnitName = $this->parent->getSymbol();
        if (strpos($baseUnitName, '·') || strpos($baseUnitName, '*') || strpos($baseUnitName, '/')) {
            $result = '('.$baseUnitName.')';
        } else {
            $result = $baseUnitName;
        }

        $result .= $this->toParent->__toString();

        return $result;
    }

    public function getDimension()
    {
        return $this->parent->getDimension();
    }

    public function equals(Unit $that)
    {
        if ($this == $that) {
            return true;
        }

        if (!($that instanceof self)) {
            return false;
        }

        return $this->parent->equals($that->getParent()) && $this->toParent->equals($that->toParent());
    }

    public function getStandardUnit()
    {
        return $this->parent->getStandardUnit();
    }

    public function isStandardUnit()
    {
        return $this->parent->isStandardUnit();
    }

    public function toStandardUnit()
    {
        return $this->parent->toStandardUnit()->concat($this->toParent);
    }

    public function getBaseUnits()
    {
        return $this->parent->getBaseUnits();
    }

    public function toBaseUnits()
    {
        return $this->parent->toBaseUnits()->concat($this->toParent);
    }

    protected function transform(Converter $operation)
    {
        $toParent = $this->toParent->concat($operation);
        if ($toParent->isIdentity()) {
            return $this->parent;
        }

        return new self($this->parent, $toParent);
    }
}
