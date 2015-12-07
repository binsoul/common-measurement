<?php

namespace BinSoul\Common\Measurement\Unit;

use BinSoul\Common\Measurement\Unit;

/**
 * Represents an element of a compound unit.
 */
class CompoundElement
{
    /** @var Unit */
    public $unit;
    /** @var int */
    public $pow;
    /** @var int */
    public $root;

    /**
     * Constructs an instance of this class.
     *
     * @param Unit $unit
     * @param int  $pow
     * @param int  $root
     */
    public function __construct(Unit $unit, $pow, $root)
    {
        $this->unit = $unit;
        $this->pow = $pow;
        $this->root = $root;
    }
}
