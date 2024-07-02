<?php

namespace Vendor\PhpTdd;

abstract class Money
{
    protected int $amount;
    abstract public function times(int $multiplier): Money;

    public function equals(Object $object){
        if (!($object instanceof Money)){
            return false;
        }
        return $this->amount === $object->amount && get_class($this) === get_class($object);
    }

    public static function dollar(int $amount): Money
    {
        return new Dollar($amount);
    }
}
