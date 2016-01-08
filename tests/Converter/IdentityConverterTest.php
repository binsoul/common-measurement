<?php

namespace BinSoul\Test\Common\Measurement;

use BinSoul\Common\Measurement\Converter\AddConverter;
use BinSoul\Common\Measurement\Converter\IdentityConverter;
use BinSoul\Common\Measurement\Converter\MultiplyConverter;

class IdentityConverterTest extends \PHPUnit_Framework_TestCase
{
    public function test_constructor()
    {
        $converter = new IdentityConverter();
        $this->assertTrue($converter->isLinear());
        $this->assertTrue($converter->isIdentity());
    }

    public function test_can_be_concatenated()
    {
        $converter1 = new IdentityConverter();
        $converter2 = new MultiplyConverter(100);

        $this->assertSame($converter2, $converter1->concat($converter2));
    }

    public function test_can_be_inverted()
    {
        $converter = new IdentityConverter();
        $this->assertSame($converter, $converter->inverse());
    }

    public function test_can_convert_values()
    {
        $converter = new IdentityConverter();
        $this->assertEquals(100, $converter->convert(100));
    }

    public function test_can_be_compared()
    {
        $converter1 = new IdentityConverter();
        $converter2 = new IdentityConverter();
        $converter3 = new AddConverter(5);

        $this->assertTrue($converter1->equals($converter1));
        $this->assertTrue($converter1->equals($converter2));
        $this->assertFalse($converter1->equals($converter3));
    }

    public function test_can_be_converted_to_string()
    {
        $converter = new IdentityConverter();

        $this->assertEquals('', $converter->__toString());
    }
}
