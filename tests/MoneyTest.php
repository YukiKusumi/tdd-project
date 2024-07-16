<?php

use PHPUnit\Framework\TestCase;
use Vendor\PhpTdd\Dollar;
use Vendor\PhpTdd\Franc;
use Vendor\PhpTdd\Money;


//memo: vendor/bin/phpunit tests

class MoneyTest extends TestCase
{
    public function testMultiplication()
    {
        $five = Money::dollar(5);
        $this->assertEquals(Money::dollar(10), $five->times(2));
        $this->assertEquals(Money::dollar(15), $five->times(3));
    }

    public function testEquality(){
        $five = Money::Dollar(5);
        $fiveFran = Money::franc(5);
        $this->assertTrue($five->equals(Money::dollar(5)));
        $this->assertFalse($five->equals(Money::dollar(6)));
        $this->assertTrue($fiveFran->equals(Money::franc(5)));
        $this->assertFalse($fiveFran->equals(Money::franc(6)));
        $this->assertFalse($fiveFran->equals(Money::dollar(5)));
    }

    public function testFrancMultiplication()
    {
        $five = Money::franc(5);
        $this->assertEquals(Money::franc(10), $five->times(2));
        $this->assertEquals(Money::franc(15), $five->times(3));
    }

    public function testCurrency(){
        $this->assertEquals("USD", Money::dollar(1)->currency());
        $this->assertEquals("CHF", Money::franc(1)->currency());
    }
}
