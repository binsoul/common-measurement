<?php

namespace BinSoul\Test\Common\Measurement;

use BinSoul\Common\Measurement\Converter\AddConverter;
use BinSoul\Common\Measurement\Converter\CompoundConverter;
use BinSoul\Common\Measurement\Converter\IdentityConverter;
use BinSoul\Common\Measurement\Converter\MultiplyConverter;
use BinSoul\Common\Measurement\Measure;

class MultiplyConverterTest extends \PHPUnit_Framework_TestCase
{
    public function test_constructor()
    {
        $converter = new MultiplyConverter(100);
        $this->assertEquals(100, $converter->getFactor());
        $this->assertTrue($converter->isLinear());
        $this->assertFalse($converter->isIdentity());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_throws_exception_for_factor_zero()
    {
        new MultiplyConverter(0);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_throws_exception_for_factor_one()
    {
        new MultiplyConverter(1);
    }

    public function test_can_be_concatenated()
    {
        $converter = new MultiplyConverter(100);

        $newConverter = $converter->concat(new MultiplyConverter(100));
        $this->assertEquals(100*100, $newConverter->getFactor());

        $newConverter = $converter->concat(new MultiplyConverter(1/100));
        $this->assertInstanceOf(IdentityConverter::class, $newConverter);

        $newConverter = $converter->concat(new AddConverter(5));
        $this->assertInstanceOf(CompoundConverter::class, $newConverter);
    }

    public function test_can_be_inverted()
    {
        $converter = new MultiplyConverter(100);
        $newConverter = $converter->inverse();
        $this->assertEquals(1/100, $newConverter->getFactor());
    }

    public function test_can_convert_values()
    {
        $converter = new MultiplyConverter(100);
        $this->assertEquals(100, $converter->convert(1));

        $converter = new MultiplyConverter(-100);
        $this->assertEquals(-100, $converter->convert(1));
    }

    public function test_can_be_compared()
    {
        $converter1 = new MultiplyConverter(100);
        $converter2 = new MultiplyConverter(100);
        $converter3 = new MultiplyConverter(10);
        $converter4 = new AddConverter(5);

        $this->assertTrue($converter1->equals($converter1));
        $this->assertTrue($converter1->equals($converter2));
        $this->assertFalse($converter1->equals($converter3));
        $this->assertFalse($converter1->equals($converter4));
    }

    public function test_can_be_converted_to_string()
    {
        $converter1 = new MultiplyConverter(100);
        $converter2 = new MultiplyConverter(-100);

        $this->assertEquals('*100', $converter1->__toString());
        $this->assertEquals('*(-100)', $converter2->__toString());
    }
}
