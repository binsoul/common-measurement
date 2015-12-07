<?php

namespace BinSoul\Common\Measurement\Unit;

use BinSoul\Common\Measurement\Dimension;
use BinSoul\Common\Measurement\Unit;
use BinSoul\Common\Measurement\Converter;
use BinSoul\Common\Measurement\SystemOfUnits;

/**
 * Represents a compound of other units.
 */
class CompoundUnit extends DerivedUnit
{
    /** @var CompoundElement[] */
    private $elements = [];
    /** @var string */
    private $symbol;

    /**
     * Constructs an instance of this class.
     *
     * @param CompoundElement[]|Unit $elements
     * @param string                 $quantity
     * @param string                 $symbol
     */
    public function __construct($elements, $quantity = '', $symbol = '')
    {
        parent::__construct($quantity);
        $this->symbol = $symbol;

        if ($elements instanceof self) {
            $this->elements = $elements->elements;
        } elseif (is_array($elements)) {
            $this->elements = $elements;
        } else {
            throw new \InvalidArgumentException(
                sprintf('Expected a ProductUnit or an array of CompoundElement but got "%s"', get_class($elements))
            );
        }
    }

    /**
     * @return CompoundElement[]
     */
    public function getElements()
    {
        return $this->elements;
    }

    public function hasOwnSymbol()
    {
        return $this->symbol != '';
    }

    public function getSymbol()
    {
        if ($this->symbol != '') {
            return $this->symbol;
        }

        $negativeCount = 0;

        $result = '';
        $isFirst = true;
        foreach ($this->elements as $element) {
            if ($element->pow >= 0) {
                if (!$isFirst) {
                    $result .= $element->unit->getStandardUnit() == SystemOfUnits::ONE() ? '*' : '·';
                }

                if ($element->unit->hasOwnSymbol()) {
                    $name = $element->unit->getSymbol();
                } else {
                    $name = $element->unit->getStandardUnit()->getSymbol();
                }

                $result .= $this->append($name, $element->pow, $element->root);
                $isFirst = false;
            } else {
                ++$negativeCount;
            }
        }

        if ($negativeCount > 0) {
            if ($isFirst) {
                $result .= '1';
            }

            $result .= '/';

            if ($negativeCount > 1) {
                $result .= '(';
            }

            $isFirst = true;
            foreach ($this->elements as $element) {
                if ($element->pow < 0) {
                    if (!$isFirst) {
                        $result .= $element->unit->getStandardUnit() == SystemOfUnits::ONE() ? '*' : '·';
                    }

                    if ($element->unit->hasOwnSymbol()) {
                        $name = $element->unit->getSymbol();
                    } else {
                        $name = $element->unit->getStandardUnit()->getSymbol();
                    }

                    $result .= $this->append($name, $element->pow, $element->root);
                    $isFirst = false;
                }
            }
            if ($negativeCount > 1) {
                $result .= ')';
            }
        }

        foreach ($this->elements as $element) {
            if ($element->unit->hasOwnSymbol()) {
                continue;
            }

            $result .= $element->unit->toStandardUnit()->__toString();
        }

        return $result;
    }

    public function getDimension()
    {
        $result = Dimension::NONE();
        foreach ($this->elements as $element) {
            $dimension = $element->unit->getDimension()->pow($element->pow)->root($element->root);
            $result = $result->times($dimension);
        }

        return $result;
    }

    public function equals(Unit $that)
    {
        if ($this == $that) {
            return true;
        }

        if (!($that instanceof self)) {
            return false;
        }

        $elements = $that->elements;
        if (count($this->elements) != count($elements)) {
            return false;
        }

        for ($i = 0; $i < count($this->elements); ++$i) {
            $unitFound = false;
            $e = $this->elements[$i];
            for ($j = 0; $j < count($elements); ++$j) {
                if ($e->unit->equals($elements[$j]->unit)) {
                    if (($e->pow != $elements[$j]->pow) || ($e->root != $elements[$j]->root)) {
                        return false;
                    }
                    $unitFound = true;
                    break;
                }
            }
            if (!$unitFound) {
                return false;
            }
        }

        return true;
    }

    public function getStandardUnit()
    {
        if ($this->hasOnlyStandardUnit()) {
            return $this;
        }

        $systemUnit = SystemOfUnits::ONE();
        foreach ($this->elements as $element) {
            $unit = $element->unit->getStandardUnit();
            $unit = $unit->pow($element->pow);
            $unit = $unit->root($element->root);
            $systemUnit = $systemUnit->times($unit);
        }

        return $systemUnit;
    }

    public function toStandardUnit()
    {
        if ($this->hasOnlyStandardUnit()) {
            return Converter::IDENTITY();
        }

        $result = Converter::IDENTITY();
        foreach ($this->elements as $element) {
            $converter = $element->unit->toStandardUnit();

            if (!$converter->isLinear()) {
                throw new \RuntimeException(get_class($element->unit).' is non-linear.');
            }
            if ($element->root != 1) {
                throw new \RuntimeException(get_class($element->unit).' holds a base unit with fractional exponent.');
            }

            $pow = $element->pow;
            if ($pow < 0) {
                $pow = -$pow;
                $converter = $converter->inverse();
            }

            for ($j = 0; $j < $pow; ++$j) {
                $result = $result->concat($converter);
            }
        }

        return $result;
    }

    public function getBaseUnits()
    {
        /** @var CompoundUnit $result */
        $result = SystemOfUnits::ONE();
        foreach ($this->elements as $element) {
            $unit = $element->unit->getBaseUnits();
            $unit = $unit->pow($element->pow);
            $unit = $unit->root($element->root);
            $result = $result->times($unit);
        }

        return $result;
    }

    public function toBaseUnits()
    {
        $result = Converter::IDENTITY();
        foreach ($this->elements as $element) {
            $unit = $element->unit;
            $converter = $unit->toBaseUnits();
            if (!$converter->isLinear()) {
                throw new \RuntimeException($unit->getSymbol().' is non-linear.');
            }

            if ($element->root != 1) {
                throw new \RuntimeException($unit->getSymbol().' holds a base unit with fractional exponent');
            }

            $pow = $element->pow;
            if ($pow < 0) {
                $pow = -$pow;
                $converter = $converter->inverse();
            }
            for ($j = 0; $j < $pow; ++$j) {
                $result = $result->concat($converter);
            }
        }

        return $result;
    }

    private function append($symbol, $pow, $root)
    {
        $pow = abs($pow);
        $result = $symbol;
        if ($pow > 1) {
            $chars = ['⁰', '¹', '²', '³', '⁴', '⁵', '⁶', '⁷', '⁸', '⁹'];
            foreach (str_split((string) $pow) as $digit) {
                $result .= $chars[(int) $digit];
            }
        }

        if ($root > 1) {
            $result .= ':'.$root;
        }

        return $result;
    }

    /**
     * @return bool
     */
    private function hasOnlyStandardUnit()
    {
        foreach ($this->elements as $element) {
            if (!$element->unit->isStandardUnit()) {
                return false;
            }
        }

        return true;
    }
}
