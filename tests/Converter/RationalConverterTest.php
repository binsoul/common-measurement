<?php

namespace BinSoul\Test\Common\Measurement;

use BinSoul\Common\Measurement\Converter\AddConverter;
use BinSoul\Common\Measurement\Converter\CompoundConverter;
use BinSoul\Common\Measurement\Converter\IdentityConverter;
use BinSoul\Common\Measurement\Converter\RationalConverter;
use BinSoul\Common\Measurement\Measure;

class RationalConverterTest extends \PHPUnit_Framework_TestCase
{
    public function test_constructor()
    {
        $converter = new RationalConverter(2, 100);
        $this->assertEquals(2, $converter->getDividend());
        $this->assertEquals(100, $converter->getDivisor());
        $this->assertTrue($converter->isLinear());
        $this->assertFalse($converter->isIdentity());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_throws_exception_for_dividend_zero()
    {
        new RationalConverter(0, 1);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_throws_exception_for_divisor_zero()
    {
        new RationalConverter(1, 0);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_throws_exception_for_equal_dividend_and_divisor()
    {
        new RationalConverter(100, 100);
    }

    public function test_can_be_concatenated()
    {
        $converter = new RationalConverter(2, 100);

        $newConverter = $converter->concat(new RationalConverter(2, 100));
        $this->assertEquals(1, $newConverter->getDividend());
        $this->assertEquals(2500, $newConverter->getDivisor());

        $newConverter = $converter->concat(new RationalConverter(100, 2));
        $this->assertInstanceOf(IdentityConverter::class, $newConverter);

        $newConverter = $converter->concat(new AddConverter(5));
        $this->assertInstanceOf(CompoundConverter::class, $newConverter);
    }

    public function test_can_be_inverted()
    {
        $converter = new RationalConverter(2, 100);
        $newConverter = $converter->inverse();
        $this->assertEquals(100, $newConverter->getDividend());
        $this->assertEquals(2, $newConverter->getDivisor());
    }

    public function test_can_convert_values()
    {
        $converter = new RationalConverter(100, 1);
        $this->assertEquals(100, $converter->convert(1));

        $converter = new RationalConverter(1, 100);
        $this->assertEquals(1/100, $converter->convert(1));
    }

    public function test_can_be_compared()
    {
        $converter1 = new RationalConverter(1, 100);
        $converter2 = new RationalConverter(1, 100);
        $converter3 = new RationalConverter(10, 1);
        $converter4 = new AddConverter(5);

        $this->assertTrue($converter1->equals($converter1));
        $this->assertTrue($converter1->equals($converter2));
        $this->assertFalse($converter1->equals($converter3));
        $this->assertFalse($converter1->equals($converter4));
    }

    public function test_can_be_converted_to_string()
    {
        $converter1 = new RationalConverter(1, 100);
        $converter2 = new RationalConverter(100, 1);
        $converter3 = new RationalConverter(5, 7);

        $this->assertEquals('/100', $converter1->__toString());
        $this->assertEquals('*100', $converter2->__toString());
        $this->assertEquals('*(5/7)', $converter3->__toString());
    }
}
