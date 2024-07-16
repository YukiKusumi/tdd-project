<?php

use PHPUnit\Framework\TestCase;
use Vendor\PhpTdd\Money;
use Vendor\PhpTdd\Bank;


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

    public function testSimpleAddition()
    {
        $bank = new Bank();
        $five = Money::dollar(5);
        $sum = $five->plus($five);
        $reduced = $bank->reduce($sum, "USD");
        $this->assertEquals(Money::dollar(10), $reduced);
    }
}
