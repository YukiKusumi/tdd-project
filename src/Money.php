<?php

namespace Vendor\PhpTdd;

class Money implements Expression
{
    protected int $amount;
    protected string $currency;

    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function equals(Object $object){
        if (!($object instanceof Money)){
            return false;
        }
        return $this->amount === $object->amount && $this->currency == $object->currency;
    }

    public static function dollar(int $amount): Money
    {
        return new Money($amount, "USD");
    }

    public static function franc(int $amount): Money
    {
        return new Money($amount, "CHF");
    }

    public function currency(): string
    {
        return $this->currency;
    }

    public function times(int $multiplier): Money
    {
        return new Money($this->amount * $multiplier, $this->currency);
    }

    public function plus(Money $other): Expression
    {
        return new Money($this->amount + $other->amount, $this->currency);
    }
}
