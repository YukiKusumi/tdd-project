<?php

use PHPUnit\Framework\TestCase;
use Vendor\PhpTdd\Money;
use Vendor\PhpTdd\Bank;
use Vendor\PhpTdd\Sum;
use Vendor\PhpTdd\WasRun;


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

    public function testPlusReturnsSum(){
        $five = Money::dollar(5);
        $result = $five->plus($five);
        $sum = $result;
        $this->assertTrue($five->equals($sum->augend));
        $this->assertTrue($five->equals($sum->addend));
    }

    public function testReduceSum(){
        $sum = new Sum(Money::dollar(3), Money::dollar(4));
        $bank = new Bank();
        $result = $bank->reduce($sum, "USD");
        $this->assertEquals(Money::dollar(7), $result);
    }

    public function testReduceMoney()
    {
        $bank = new Bank();
        $result = $bank->reduce(Money::dollar(1), "USD");

        $this->assertEquals(Money::dollar(1), $result);
    }

    public function testReduceMoneyDifferentCurrency(){
        $bank = new Bank();
        $bank->addRate("CHF", "USD", 2);

        $result = $bank->reduce(Money::franc(2), "USD");
        $this->assertEquals(Money::dollar(1), $result);
    }

    public function testIdentityRate(){
        $this->assertEquals(1, (new Bank())->rate("USD", "USD"));
    }

    public function testMixedAddition(){
        //Arrange
        $fiveBucks = Money::dollar(5);
        $tenFrancs = Money::franc(10);
        $bank = new Bank();
        $bank->addRate("CHF", "USD", 2);

        //Act
        $result = $bank->reduce($fiveBucks->plus($tenFrancs), "USD");

        //Assert
        $this->assertEquals(Money::dollar(10), $result);
    }

    public function testSumPlusMoney()
    {
        //Arrange
        $fiveBucks = Money::dollar(5);
        $tenFrancs = Money::franc(10);
        $bank = new Bank();
        $bank->addRate('CHF', 'USD', 2);

        //Act
        $sum = (new Sum($fiveBucks, $tenFrancs))->plus($fiveBucks);
        $result = $bank->reduce($sum, 'USD');

        //Assert
        $this->assertEquals(Money::dollar(15), $result);
    }

    public function testSumTimes()
    {
        $fiveBucks = Money::dollar(5);
        $tenFrancs = Money::franc(10);
        $bank = new Bank();
        $bank->addRate("CHF", "USD", 2);
        $sum = (new Sum($fiveBucks, $tenFrancs))->times(2);

        $result = $bank->reduce($sum, "USD");
        $this->assertEquals(Money::dollar(20), $result);
    }




    //WasRunクラスを対象としたテスト
    public function testRun() {
        $test = new WasRun("testMethod");

        $this->assertEquals(null, $test->wasRun);
        echo $test->wasRun ? 'true' : 'false';
        echo "\n";

        $test->run();

        $this->assertEquals(1, $test->wasRun);
        echo $test->wasRun;
    }
    public function testRunning()
    {
        $test = new WasRun("testMethod");
        $this->assertFalse($test->wasRun);
        $test->run();
        $this->assertTrue($test->wasRun);
    }
}
