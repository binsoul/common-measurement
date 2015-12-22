<?php

namespace BinSoul\Test\Common\Measurement;

use BinSoul\Common\Measurement\Converter\AddConverter;
use BinSoul\Common\Measurement\Converter\CompoundConverter;
use BinSoul\Common\Measurement\Converter\MultiplyConverter;
use BinSoul\Common\Measurement\Measure;

class CompoundConverterTest extends \PHPUnit_Framework_TestCase
{
    public function test_constructor()
    {
        $converter = new CompoundConverter(new MultiplyConverter(2), new MultiplyConverter(3));
        $this->assertFalse($converter->isIdentity());
        $this->assertTrue($converter->isLinear());

        $converter = new CompoundConverter(new MultiplyConverter(2), new AddConverter(3));
        $this->assertFalse($converter->isLinear());
    }

    public function test_can_be_inverted()
    {
        $converter1 = new MultiplyConverter(2);
        $converter2 = new AddConverter(3);

        $converter = new CompoundConverter($converter1, $converter2);
        $newConverter = $converter->inverse();

        $this->assertSame(1/2, $newConverter->getSecond()->getFactor());
        $this->assertSame(-3, $newConverter->getFirst()->getOffset());
    }

    public function test_can_convert_values()
    {
        $converter = new CompoundConverter(new MultiplyConverter(2), new AddConverter(3));
        $this->assertEquals(203, $converter->convert(100));
    }

    public function test_can_be_compared()
    {
        $converter1 = new CompoundConverter(new MultiplyConverter(2), new MultiplyConverter(3));
        $converter2 = new CompoundConverter(new MultiplyConverter(2), new MultiplyConverter(3));
        $converter3 = new CompoundConverter(new MultiplyConverter(2), new AddConverter(3));
        $converter4 = new AddConverter(3);

        $this->assertTrue($converter1->equals($converter1));
        $this->assertTrue($converter1->equals($converter2));
        $this->assertFalse($converter1->equals($converter3));
        $this->assertFalse($converter1->equals($converter4));
    }

    public function test_can_be_converted_to_string()
    {
        $converter = new CompoundConverter(new MultiplyConverter(2), new AddConverter(3));

        $this->assertEquals('*2+3', $converter->__toString());
    }
}
