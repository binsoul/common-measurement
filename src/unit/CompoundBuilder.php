<?php

namespace BinSoul\Common\Measurement\Unit;

use BinSoul\Common\Measurement\Unit;
use BinSoul\Common\Measurement\SystemOfUnits;

/**
 * Build compound units.
 */
abstract class CompoundBuilder
{
    /**
     * @param Unit   $left
     * @param Unit   $right
     * @param string $quantity
     * @param string $symbol
     *
     * @return CompoundUnit
     */
    public static function getProductInstance(Unit $left, Unit $right, $quantity = '', $symbol = '')
    {
        if (($left instanceof CompoundUnit)) {
            $leftElements = $left->getElements();
        } else {
            $leftElements = [new CompoundElement($left, 1, 1)];
        }

        if (($right instanceof CompoundUnit)) {
            $rightElements = $right->getElements();
        } else {
            $rightElements = [new CompoundElement($right, 1, 1)];
        }

        return self::getInstance($leftElements, $rightElements, $quantity, $symbol);
    }

    /**
     * @param Unit   $left
     * @param Unit   $right
     * @param string $quantity
     * @param string $symbol
     *
     * @return CompoundUnit
     */
    public static function getQuotientInstance(Unit $left, Unit $right, $quantity = '', $symbol = '')
    {
        if ($left instanceof CompoundUnit) {
            $leftElements = $left->getElements();
        } else {
            $leftElements = [new CompoundElement($left, 1, 1)];
        }

        if ($right instanceof CompoundUnit) {
            $rightElements = [];
            foreach ($right->getElements() as $element) {
                $rightElements[] = new CompoundElement($element->unit, -$element->pow, $element->root);
            }
        } else {
            $rightElements = [new CompoundElement($right, -1, 1)];
        }

        return self::getInstance($leftElements, $rightElements, $quantity, $symbol);
    }

    /**
     * @param Unit   $unit
     * @param int    $root
     * @param string $quantity
     * @param string $symbol
     *
     * @return CompoundUnit
     */
    public static function getRootInstance(Unit $unit, $root, $quantity = '', $symbol = '')
    {
        if ($unit instanceof CompoundUnit) {
            $elements = [];
            foreach ($unit->getElements() as $element) {
                $gcd = self::gcd(abs($element->pow), $element->root * $root);
                $elements[] = new CompoundElement($element->unit, $element->pow / $gcd, $element->root * $root / $gcd);
            }
        } else {
            $elements = [new CompoundElement($unit, 1, $root)];
        }

        return self::getInstance($elements, [], $quantity, $symbol);
    }

    /**
     * Returns the greatest common divisor.
     *
     * @param int $a
     * @param int $b
     *
     * @return int
     */
    private static function gcd($a, $b)
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

    /**
     * Merges the given elements.
     *
     * @param CompoundElement[] $leftElements
     * @param CompoundElement[] $rightElements
     * @param string            $quantity
     * @param string            $symbol
     *
     * @return CompoundUnit
     */
    private static function getInstance(array $leftElements, array $rightElements, $quantity = '', $symbol = '')
    {
        $result = [];

        foreach ($leftElements as $leftElement) {
            $pow1 = $leftElement->pow;
            $root1 = $leftElement->root;
            $pow2 = 0;
            $root2 = 1;
            foreach ($rightElements as $rightElement) {
                if ($leftElement->unit->equals($rightElement->unit)) {
                    $pow2 = $rightElement->pow;
                    $root2 = $rightElement->root;

                    break;
                }
            }

            $pow = $pow1 * $root2 + $pow2 * $root1;
            $root = $root1 * $root2;
            if ($pow != 0) {
                $gcd = self::gcd(abs($pow), $root);
                $result[] = new CompoundElement($leftElement->unit, $pow / $gcd, $root / $gcd);
            }
        }

        foreach ($rightElements as $rightElement) {
            $hasBeenMerged = false;
            foreach ($leftElements as $leftElement) {
                if ($rightElement->unit->equals($leftElement->unit)) {
                    $hasBeenMerged = true;
                    break;
                }
            }
            if (!$hasBeenMerged) {
                $result[] = $rightElement;
            }
        }

        if (count($result) == 0) {
            return SystemOfUnits::ONE();
        }

        if (count($result) == 1 && $result[0]->pow == $result[0]->root) {
            return $result[0]->unit;
        }

        return new CompoundUnit($result, $quantity, $symbol);
    }
}
