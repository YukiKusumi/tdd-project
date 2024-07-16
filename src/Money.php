<?php

namespace Vendor\PhpTdd;

abstract class Money
{
    protected int $amount;
    abstract public function times(int $multiplier): Money;
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
        return $this->amount === $object->amount && get_class($this) === get_class($object);
    }

    public static function dollar(int $amount): Money
    {
        return new Dollar($amount, "USD");
    }

    public static function franc(int $amount): Money
    {
        return new Franc($amount, "CHF");
    }

    public function currency(): string
    {
        return $this->currency;
    }
}
