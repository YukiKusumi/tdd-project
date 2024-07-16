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
        $this->assertTrue(Money::dollar(10)->equals($five->times(2)));
        $this->assertTrue(Money::dollar(15)->equals($five->times(3)));
    }

    public function testEquality(){
        $five = Money::Dollar(5);
        $fiveFran = Money::franc(5);
        $this->assertTrue($five->equals(Money::dollar(5)));
        $this->assertFalse($five->equals(Money::dollar(6)));
        $this->assertFalse($fiveFran->equals(Money::dollar(5)));
    }

    public function testCurrency(){
        $this->assertEquals("USD", Money::dollar(1)->currency());
        $this->assertEquals("CHF", Money::franc(1)->currency());
    }
}
