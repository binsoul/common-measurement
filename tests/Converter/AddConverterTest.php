<?php

namespace BinSoul\Test\Common\Measurement;

use BinSoul\Common\Measurement\Converter\AddConverter;
use BinSoul\Common\Measurement\Converter\CompoundConverter;
use BinSoul\Common\Measurement\Converter\IdentityConverter;
use BinSoul\Common\Measurement\Converter\MultiplyConverter;

class AddConverterTest extends \PHPUnit_Framework_TestCase
{
    public function test_constructor()
    {
        $converter = new AddConverter(100);
        $this->assertEquals(100, $converter->getOffset());
        $this->assertFalse($converter->isLinear());
        $this->assertFalse($converter->isIdentity());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_throws_exception_for_zero_add()
    {
        new AddConverter(0);
    }

    public function test_can_be_concatenated()
    {
        $converter = new AddConverter(100);

        $newConverter = $converter->concat(new AddConverter(100));
        $this->assertEquals(200, $newConverter->getOffset());

        $newConverter = $converter->concat(new AddConverter(-100));
        $this->assertInstanceOf(IdentityConverter::class, $newConverter);

        $newConverter = $converter->concat(new MultiplyConverter(5));
        $this->assertInstanceOf(CompoundConverter::class, $newConverter);
    }

    public function test_can_be_inverted()
    {
        $converter = new AddConverter(100);
        $newConverter = $converter->inverse();
        $this->assertEquals(-100, $newConverter->getOffset());
    }

    public function test_can_convert_values()
    {
        $converter = new AddConverter(100);
        $this->assertEquals(101, $converter->convert(1));

        $converter = new AddConverter(-100);
        $this->assertEquals(-99, $converter->convert(1));
    }

    public function test_can_be_compared()
    {
        $converter1 = new AddConverter(100);
        $converter2 = new AddConverter(100);
        $converter3 = new AddConverter(10);
        $converter4 = new MultiplyConverter(5);

        $this->assertTrue($converter1->equals($converter1));
        $this->assertTrue($converter1->equals($converter2));
        $this->assertFalse($converter1->equals($converter3));
        $this->assertFalse($converter1->equals($converter4));
    }

    public function test_can_be_converted_to_string()
    {
        $converter1 = new AddConverter(100);
        $converter2 = new AddConverter(-100);

        $this->assertEquals('+100', $converter1->__toString());
        $this->assertEquals('-100', $converter2->__toString());
    }
}
