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
        $five = new Dollar(5);
        $fiveFran = new Franc(5);
        $this->assertTrue($five->equals(Money::dollar(5)));
        $this->assertFalse($five->equals(Money::dollar(6)));
        $this->assertTrue($fiveFran->equals(new Franc(5)));
        $this->assertFalse($fiveFran->equals(new Franc(6)));
        $this->assertFalse($fiveFran->equals(Money::dollar(5)));
    }

    public function testFrancMultiplication()
    {
        $five = new Franc(5);
        $this->assertEquals(new Franc(10), $five->times(2));
        $this->assertEquals(new Franc(15), $five->times(3));
    }
}
