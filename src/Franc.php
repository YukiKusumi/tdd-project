<?php

namespace Vendor\PhpTdd;

class Franc extends Money
{
    public function __construct($amount)
    {
        $this->amount = $amount;
        $this->currency = "CHF";
    }

    public function times(int $multiplier): Money
    {
        return new Franc($this->amount * $multiplier);
    }
}
